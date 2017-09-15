<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//商品页面
class ShopController extends Controller{
//	商品
	private $ShoplistModel;
//	品牌
	private $BrandModel;
//	分类
	private $cateModel;
//	属性表
	private $attrModel;
//	评论表
	private $remarkModel;
	public function __init(){
//		商品
		$this->ShoplistModel = new \Common\Model\Shoplist;
//		品牌
		$this->BrandModel = new \Common\Model\Brand;
//		分类
		$this->cateModel = new \Common\Model\Shopcate;
//		属性
		$this->attrModel = new \Common\Model\Shoplistattr;
//		评论表
		$this->remarkModel = new \Common\Model\Remark;
	}
	
	public function shop(){
		$gid = Q('get.gid',0,'intval');
		$shopData = $this->ShoplistModel
						->join("detail",'shop_lists_gid',"=","gid")
						->where('gid',$gid)->find();
		$shopData['small'] = explode(',', $shopData['small']);
		foreach ($shopData['small'] as $k => $v) {
			$imgData = [];
			$img = pathinfo($v);
//			$shopData['small'][$k] = $img;
//			压入大小图
			$imgData[] = str_replace(".{$img['extension']}", "_mid.{$img['extension']}", $v);
			$imgData[] = str_replace(".{$img['extension']}", "_mib.{$img['extension']}", $v);
			$shopData['small'][$k] = $imgData;
		}
		
//		压入品牌
		$shopData['brand'] = $this->BrandModel
								->where('bid',$shopData['shop_brand_bid'])
								->find();
//		找出父级分类cid
		$cid = $shopData['shop_category_cid'];
		$pid=$this->cateModel->where("cid={$cid}")->pluck("pid");
		$cids = $this->cateModel->getFather($this->cateModel->get(),$pid);
		$cids[] = $cid;
		
		$topCateData = $this->cateModel->where("cid IN (" . implode(',', $cids) . ")")->get();
//		面包屑
		array_reverse($topCateData);
		View::with('topCateData',$topCateData);
//		p($topCateData);
//		exit;
//		压入商品属性
		
		$shopData['attr'] = $this->attrModel
								->join("type_attr",'taid','=','shop_type_attr_taid')
								->where("shop_lists_gid={$gid} and class=0")
								->get();
		// p($shopData['attr']);
//		商品规格
//		评论
		$shopData['count'] = $this->remarkModel->where("shop_lists_gid={$shopData['gid']}")->count('rid');
		// 压入评论
		$remarkModel = new \Common\Model\Remark;
		$shopData['remark'] = $remarkModel
							->where("shop_lists_gid={$shopData['gid']}")
							->orderBy('time','desc')
							->get();
		// p($shopData['remark']);
//		类型
		$ShoptypeattrModel = new \Common\Model\Shopattr;
		$typeatrData = $ShoptypeattrModel
								->where("shop_type_tid={$shopData['shop_type_tid']} and class=1")
								->get();
		foreach ($typeatrData as $k => $v) {
			$typeatrData[$k]['opt'] = Db::table("list_attr")
										->where("shop_type_attr_taid={$v['taid']} and shop_lists_gid={$gid}")
										->get();
		}
//		p($shopData);
//		分配类型
		View::with("typeatrData",$typeatrData);
		View::with('shopData',$shopData);
		
//		相关分类
		$typeData = $this->cateModel->where("pid={$topCateData[0]['cid']}")->limit(20)->get();
		View::with('typeData',$typeData);
//		达人选购
		$sonData = $this->ShoplistModel->where("shop_category_cid = {$shopData['shop_category_cid']}")->orderBy('num','desc')->limit(10)->get();
//		p($sonData);
		View::with('sonData',$sonData);
			
	    View::make();
	}

	
	
//	商品列表
	public function shoplist(){
//		获取子集
		$cid = Q('get.cid',0,'intval');
		$cids = $this->cateModel->getSon($this->cateModel->get(),$cid);
		$cids[]=$cid;
		
//		获取商品的cid		
		$gid = $this->ShoplistModel->where("shop_category_cid IN (". implode(',',$cids) .")")->lists('gid');
		if($gid){
//			通过$gid找到商品的属性		
			$shopAttr = $this->attrModel->where("shop_lists_gid IN (". implode(',',$gid) .")")->groupBy('gtvalue')->get();
			$sameTemp = [];
			foreach ($shopAttr as $v) {
				$sameTemp[$v['shop_type_attr_taid']][] = $v;
			}
			//组合名字和值
            $finalAttr = [];
			$typeattrModel = new \Common\Model\Shopattr;
			foreach ($sameTemp as $taid => $v){
                $finalAttr[] = [
                    'name' => $typeattrModel->where("taid={$v[0]['shop_type_attr_taid']}")->pluck('taname'),
                    'value'=> $v
                ];
            }
			// p($finalAttr);
			View::with('finalAttr',$finalAttr);
//			品牌
			$bids = $this->ShoplistModel->where("shop_category_cid IN (". implode(',',$cids) .")")->lists('shop_brand_bid');
			// 传入品牌进行重组（带英文）并且按排序
			$brandData = $this->BrandModel->english($this->BrandModel->where("bid IN (". implode(',',$bids) .")")->get());
			// p($brandData);
			View::with('brand',$brandData);
//			改分类下的商品
//			筛选
			//1.地址栏效果0_0_...
			$num = count($finalAttr);
			$param = isset($_GET['param']) ? explode('_',$_GET['param']) : array_fill(0,$num,0);
            View::with("param",$param);
			$finalGids = $this->filter($param,$gid);
			// p($finalGids);
//			exit;
			if($finalGids){
				if(isset($_GET['bid']) && $_GET['bid'] != 0){
					$bid = $_GET['bid'];
					$shopData = $this->ShoplistModel->where("shop_brand_bid = {$bid} and gid IN (". implode(',',$finalGids) .")")->get();
				}else{
					$shopData = $this->ShoplistModel->where("gid IN (". implode(',',$finalGids) .")")->get();
				}
				if($shopData){
					foreach ($shopData as $k => $v) {
						$img = pathinfo($v['pic']);
						$shopData[$k]['pic'] = str_replace('.'.$img['extension'], '_list.'.$img['extension'], $v['pic']);
						$shopData[$k]['count'] = $this->remarkModel->where("shop_lists_gid={$v['gid']}")->count('rid');
					}
					View::with('shopData',$shopData);
				}else{
					View::with('shopData',[]);
				}
//				p($shopData);
				
			}else{
				View::with('shopData',array());
			}





//			推广商品
			$spreadData = Db::select("select * from shop_lists where shop_category_cid IN (".implode(',',$cids).") order By rand() limit 10");
			foreach ($spreadData as $k => $v) {
				$img = pathinfo($v['pic']);
//				p($img);
				$spreadData[$k]['pic'] = str_replace('.'.$img['extension'], '_list.'.$img['extension'], $v['pic']);
				$spreadData[$k]['count'] = $this->remarkModel->where("shop_lists_gid={$v['gid']}")->count('rid');
			}
			View::with('spreadData',$spreadData);
		}else{
			View::with('finalAttr',[]);
		}
		
	    View::make();
	}
	
	
	private function filter($param,$cidGids){
	    $gidArr = [];
		foreach ($param as $gtid) {
			//如果点击的不是"不限"的时候
            //根据gtid得到商品的gid
            if($gtid){
                //查询到商品属性的名称
                $gtvalue = $this->attrModel->where("gtid={$gtid}")->pluck('gtvalue');
                //通过名称查询到gid
                $gidArr[] = $this->attrModel->where("gtvalue='{$gtvalue}'")->lists('shop_lists_gid');
				
            }
		}
		//如果$gidArr有值的时候,也就是用户不是全部"不限"的时候
		if($gidArr){
			$gid = $gidArr[0];
			foreach ($gidArr as $v) {
				$gid = array_intersect($v,$gid);
			}
			$finalGids = array_intersect($gid,$cidGids);
		}else{
			$finalGids = $cidGids;
		}
		return $finalGids;
	}

}