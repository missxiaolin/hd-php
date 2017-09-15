<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//搜索后的页面
class SearchController extends Controller{
//	商品
	private $ShoplistModel;
//	品牌
	private $BrandModel;
//	属性表
	private $attrModel;
//	评论表
	private $remarkModel;
//	分类
	private $cateModel;
	//构造函数
	public function __init()
	{
//		商品
		$this->ShoplistModel = new \Common\Model\Shoplist;
//		品牌
		$this->BrandModel = new \Common\Model\Brand;
//		属性
		$this->attrModel = new \Common\Model\Shoplistattr;
//		评论表
		$this->remarkModel = new \Common\Model\Remark;
//		分类
		$this->cateModel = new \Common\Model\Shopcate;
	}
	
	
//	搜索后页面
	public function index(){
		$text = addslashes(Q('get.seach'));
		// 先找分类
		$cid = $this->cateModel->where("cname like '%{$text}%'")->pluck('cid');
		// 如果有分类就跳转
		if($cid){
			go(__ROOT__ . "/searchs_". $cid ."_". $text .".html");

		}
		$gid = $this->ShoplistModel->where("gname like '%{$text}%'")->lists('gid');
		if($gid){
			// 商品的属性
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
            // 分配到模板
            View::with('finalAttr',$finalAttr);
//			品牌
			$bids = $this->ShoplistModel->where("gid IN (". implode(',',$gid) .")")->lists('shop_brand_bid');
			// 传入品牌进行重组（带英文）并且按排序
			$brandData = $this->BrandModel->english($this->BrandModel->where("bid IN (". implode(',',$bids) .")")->get());
			// p($brandData);
			View::with('brand',$brandData);
//			筛选
			//1.地址栏效果0_0_...
			$num = count($finalAttr);
			$param = isset($_GET['param']) ? explode('_',$_GET['param']) : array_fill(0,$num,0);
            View::with("param",$param);
            $finalGids = $this->filter($param,$gid);
            
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
//				p($shopData);"gid IN (". implode(',',$gid) .")"
//				推广商品
				$spreadData = Db::select("select * from shop_lists where gid IN (". implode(',',$gid) .") order By rand() limit 10");
				foreach ($spreadData as $k => $v) {
					$img = pathinfo($v['pic']);
	//				p($img);
					$spreadData[$k]['pic'] = str_replace('.'.$img['extension'], '_list.'.$img['extension'], $v['pic']);
					$spreadData[$k]['count'] = $this->remarkModel->where("shop_lists_gid={$v['gid']}")->count('rid');
				}
	//			p($spreadData);
				View::with('spreadData',$spreadData);
			}else{
				View::with('shopData',array());
			}
		}
	    View::make();
	}
	


	// 筛选
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
//			p($finalAttr);
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
//			p($finalGids);
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
//			p($spreadData);
			View::with('spreadData',$spreadData);
		}else{
			View::with('finalAttr',[]);
		}
		
	    View::make();
	}
}