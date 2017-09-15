<?php namespace Admin\Controller; 

//添加商品
class ShoplistController extends CommonController{
//	商品列表
	private $listModel;
//	构造函数
	public function __auto(){
	    $this->listModel = new \Common\Model\Shoplist;
	}
	
//	商品列表
	public function index(){
		$listsData = $this->listModel->get();
		if(!$listsData) View::error('您还没有商品，请先添加商品！',U('add'));
//		p($listsData);
	    View::with('listsData',$listsData)->make();
	}
	
//	修改商品
	public function edit(){
		if(IS_POST){
//			p(Q('post.'));
//			exit;
			if(!$this->listModel->edit()) View::error($this->listModel->getError());
			View::success('修改成功',U('index'));
			
		}
		$gid = Q('get.gid',0,'intval');				
//		获取分类和品牌信息
		$cateModel = new \Common\Model\Shopcate;
		$brandModel = new  \Common\Model\Brand;
//		获取分类信息
		$cateData = $cateModel->get();
//		p($cateData);
//		树状图分类
		$cateData = Data::tree($cateData,'cname');
//		p($cateData);
		View::with('cateData',$cateData);
//		获取品牌信息
		$brandData = $brandModel->get();
//		p($brandData);
		View::with('brandData',$brandData);
//		获得原来数据(商品表)
		$oldData = $this->listModel->where("gid={$gid}")->find();
		View::with('oldData',$oldData);
//		p($oldData);
//		商品详情表
		$shopdetailModel = new \Common\Model\Shopdetail;
		$detailData = $shopdetailModel->where("shop_lists_gid={$gid}")->find();
		$detailData['small'] = explode(',', $detailData['small']);
//		p($detailData);
		View::with('detailData',$detailData);
//		取出商品的属性
		$shoplistattrModel = new \Common\Model\Shoplistattr;
		$listattrData = Db::table('type_attr')
						->where("shop_type_tid={$oldData['shop_type_tid']} and class=0")->get();
		foreach ($listattrData as $key => $value) {
			$listattrData[$key]['tavalue'] = explode(',', $value['tavalue']);
			$listattrData[$key]['judge'] = Db::table('list_attr')
											->where("shop_lists_gid={$gid} and shop_type_attr_taid={$value['taid']}")
											->pluck('gtvalue');
		}
		
		View::with('listattrData',$listattrData);
//		p($listattrData);
//		取出商品的规格
		$spec = Db::table('type_attr')
						->where("shop_type_tid={$oldData['shop_type_tid']} and class=1")->lists('taid');
//		获取规格
		$spec = implode(',', $spec);
		
		$specData = Db::table('list_attr')
					->where("shop_lists_gid={$gid} and shop_type_attr_taid IN (".$spec.")")
					->get();
//		循环找出规格
		foreach ($specData as $key => $value) {
//			压入规格数组
			$specData[$key]['spce'] = Db::table('type_attr')
										->where("taid={$value['shop_type_attr_taid']}")
										->pluck('tavalue');
										
			$specData[$key]['taname'] = Db::table('type_attr')
										->where("taid={$value['shop_type_attr_taid']}")
										->pluck('taname');
		}
//		循环规格变数组
		foreach ($specData as $key => $value) {
//			echo $value['spce'];
			$specData[$key]['spce'] = explode(',', $value['spce']);
			
		}
		View::with('specData',$specData);
		
		
//		p($specData);
	
	    View::make();
	}	
	
//	添加商品
	public function add(){
		if(IS_POST){
			if(!$this->listModel->store()) View::error($this->listModel->getError());
			View::success('添加商品成功！',U('index'));
		}
//		获取分类和品牌信息
		$cateModel = new \Common\Model\Shopcate;
		$brandModel = new  \Common\Model\Brand;
//		获取分类信息
		$cateData = $cateModel->get();
//		p($cateData);
//		树状图分类
		$cateData = Data::tree($cateData,'cname');
//		p($cateData);
		View::with('cateData',$cateData);
//		获取品牌信息
		$brandData = $brandModel->get();
		View::with('brandData',$brandData);
//		p($brandData);
//		显示模板
	    View::make();
	}
	
    //uploadify异步上传（处理列表页图片 ）
	public function uploadList()
	{
	    $file = Upload::path('Upload/Content/' . date('y/m'))->make();
		
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {
//	    	处理上传图片
			$thumb_pic=str_replace(".{$file[0]['ext']}", "_list.{$file[0]['ext']}", $file[0]['path']);
			$thumb_pic=Image::thumb($file[0]['path'],$thumb_pic,220,220,6);
	        /** $file内部就是以下这个数组
	            $file = array(
	                0 => array(
		                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
		                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
		                'image' => 1
	            ),
	        );**/
	        //上传成功，把上传好的信息返给js 也就是uploadify
	        $data = $file[0];
	        // 相当于：echo json_encode($data);exit;
	        $this->ajax($data);
	    }
	}
	
	
	//上传插件点击删除时 上传的图片要删除掉
	public function delImg(){
		$img=Q('post.delImg');//获得原图
		$path=pathinfo($img);//原图信息
		unlink($img);//删除原图
		$mid=str_replace(".{$path['extension']}", "_list.{$path['extension']}", $img);
		unlink($mid);//删除原图
	}
	
	
	
	//上传插件调用的方法
	public function upload(){        
		$file = Upload::path('Upload/Content/' . date('y/m'))->make();
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {
	    		//处理上传的图片
	    	$thumb_s=str_replace(".{$file[0]['ext']}", "_small.{$file[0]['ext']}", $file[0]['path']);
			$thumb_m=str_replace(".{$file[0]['ext']}", "_mid.{$file[0]['ext']}", $file[0]['path']);
			$thumb_b=str_replace(".{$file[0]['ext']}", "_mib.{$file[0]['ext']}", $file[0]['path']);
//			小
			Image::thumb($file[0]['path'],$thumb_s,60,60,6);
//			中
			Image::thumb($file[0]['path'],$thumb_m,400,400,6);
//			大
			Image::thumb($file[0]['path'],$thumb_b,800,800,6);
	        $data = $file[0];
	        // 相当于：echo json_encode($data);exit;
	        $this->ajax($data);
	    }
	}
	
//	删除商品（要点：删除商品的同时也要删除商品属性表和内容表）还要删除图片
	public function del(){
	    $gid = Q('get.gid');
//		获取列表原图
		$picImg = Db::table('lists')->where("gid",$gid)->pluck('pic');
		$img_list = pathinfo($picImg);
		$picImg_list = str_replace('.'.$img_list['extension'], '_list.'.$img_list['extension'], $picImg);
		unlink($picImg);
		unlink($picImg_list);
//		获取图册图片
		$small = Db::table('detail')->where("shop_lists_gid",$gid)->pluck('small');
		$tcImg = explode(',', $small);
		foreach ($tcImg as $v) {
			$img_tcs = pathinfo($v);
			$Ims_s = str_replace('.'.$img_tcs['extension'], '_small.'.$img_tcs['extension'], $v);
			$Ims_m = str_replace('.'.$img_tcs['extension'], '_mid.'.$img_tcs['extension'], $v);
			$Ims_b = str_replace('.'.$img_tcs['extension'], '_mib.'.$img_tcs['extension'], $v);
			unlink($Ims_s);
			unlink($Ims_m);
			unlink($Ims_b);
			unlink($v);
		}
		$lisModel = new \Common\Model\Shoplis;
		$lisModel->where("shop_lists_gid={$gid}")->delete();
		Db::table('lists')->where("gid",$gid)->delete();
		Db::table('detail')->where("shop_lists_gid",$gid)->delete();
		Db::table('list_attr')->where("shop_lists_gid",$gid)->delete();
		View::success('删除成功',U('index'));
	}
	
//	获取分类属性
	public function type(){
		$cid = (Q('post.cid'));
		$cateModel = new \Common\Model\Shopcate;
		$tid = $cateModel->where("cid",$cid)
					      ->pluck('shop_type_tid');
		if($tid==0){
			echo 0;
			exit;
		}
		$data = Db::table("type_attr")->where("shop_type_tid",$tid)->get();
//		p($data);
		View::ajax($data, $type = 'JSON');
	}
	
	//上传插件点击删除时 上传的图片要删除掉
	public function delImgt(){
		$img=Q('post.delImg');//获得原图
		$path=pathinfo($img);//原图信息
		unlink($img);//删除原图
		$Ims_s = str_replace('.'.$path['extension'], '_small.'.$path['extension'], $img);
		$Ims_m = str_replace('.'.$path['extension'], '_mid.'.$path['extension'], $img);
		$Ims_b = str_replace('.'.$path['extension'], '_mib.'.$path['extension'], $img);
		unlink($Ims_s);
		unlink($Ims_m);
		unlink($Ims_b);
	}
	
	
	

	
//	货品列表
	public function huolist(){
//		获取该商品数据到模板
		$gid = Q('get.gid',0,'intval');
		$tid = Q('get.tid',0,'intval');
//		货号
		$lisModel = new \Common\Model\Shoplis;
		
		if(IS_POST){
//			先验证
			$this->is_exist();
//			在进行验证
			if(!$lisModel->store()) View::error($lisModel->getError());
//			添加成功之前还要改变商品表的数据总库存
			$price = $lisModel->where("shop_lists_gid={$gid}")->sum('inventory');
			$this->listModel->where("gid={$gid}")->save(array('inventory'=>$price));
			View::success('添加货品成功！',U('huolist',array('gid'=>$gid,'tid'=>$tid)));
		}			
		
//		获取该商品的货号列表

//		类型属性
		$listattrModel = new \Common\Model\Shoplistattr;
//		类型
		$ShoptypeattrModel = new \Common\Model\Shopattr;
//		echo $tid;
//		获取该商品规格
		$typeatrData = $ShoptypeattrModel->where("shop_type_tid={$tid} and class=1")->get();
//		p($typeatrData);
//		压入改商品选择了的规格
		foreach ($typeatrData as $key => $value) {
			$typeatrData[$key]['attr'] = $listattrModel
										->join('type_attr','taid','=','shop_type_attr_taid')
										->where("shop_type_attr_taid={$value['taid']} and shop_lists_gid=$gid")
										->get();
		}
//		p($typeatrData);
		$lisData = $lisModel->where("shop_lists_gid={$gid}")->get();
		foreach ($lisData as $k => $v) {
			$lisData[$k]['combine'] = explode(',', $v['combine']);
			foreach ($lisData[$k]['combine'] as $key => $value) {
					$lisData[$k]['type'][$key] = $listattrModel
												->where("gtid={$value}")
												->pluck('gtvalue');
			}
		}
//		p($lisData);
//		分配到模板
		View::with('lisData',$lisData);
//		该商品的规格分配到模板
		View::with('typeatrData',$typeatrData);
	    View::make();
	}
	
//	检测货品是否存在或者是规格是否填写
	public function is_exist(){
		foreach (Q('post.combine') as $key => $value) {
			if(!$value) View::error("先填写规格");
		}
		$combine = implode(',', Q('post.combine'));
		$data = Db::table('lis')->where("combine='{$combine}'")->get();
	    if($data) View::error('已有该货品');
		
	}
	
	
//	删除货品
	public function huodel(){
//		获取get数据
	    $glid = Q('get.glid',0,'intval');
		$gid = Q('get.gid',0,'intval');
		$tid = Q('get.tid',0,'intval');
//		货号
		$lisModel = new \Common\Model\Shoplis;
		$lisModel->where("glid={$glid}")->delete();
//		添加成功之前还要改变商品表的数据总库存
		$price = $lisModel->where("shop_lists_gid={$gid}")->sum('inventory');
		$this->listModel->where("gid={$gid}")->save(array('inventory'=>$price));
		View::success("删除成功",U('huolist',array('gid'=>$gid,'tid'=>$tid)));
	}

//	编辑货品
	public function huoedit(){
//		获取该商品数据到模板
		$gid = Q('get.gid',0,'intval');
		$tid = Q('get.tid',0,'intval');
		$glid = Q('get.glid',0,'intval');
//		货号
		$lisModel = new \Common\Model\Shoplis;
		if(IS_POST){
//			先验证
			$this->is_exists();
			if(!$lisModel->edit()) View::error($lisModel->getError());
//			添加成功之前还要改变商品表的数据总库存
			$price = $lisModel->where("shop_lists_gid={$gid}")->sum('inventory');
			$this->listModel->where("gid={$gid}")->save(array('inventory'=>$price));
			View::success('修改成功',U('huolist',array('gid'=>$gid,'tid'=>$tid)));
		}

		
//		获取该商品的货号列表

//		类型属性
		$listattrModel = new \Common\Model\Shoplistattr;
//		类型
		$ShoptypeattrModel = new \Common\Model\Shopattr;
//		echo $tid;
//		获取该商品规格
		$typeatrData = $ShoptypeattrModel->where("shop_type_tid={$tid} and class=1")->get();
//		压入改商品选择了的规格
		foreach ($typeatrData as $key => $value) {
			$typeatrData[$key]['attr'] = $listattrModel
										->join('type_attr','taid','=','shop_type_attr_taid')
										->where("shop_type_attr_taid={$value['taid']} and shop_lists_gid=$gid")
										->get();
		}
//		分配到模板(该商品选择了的规格)
		View::with('typeatrData',$typeatrData);
//		p($typeatrData);
//		echo $glid;
//		获取改货品的原来数据
		$oldData = $lisModel->where("glid={$glid}")->find();
		$oldData['combine'] = explode(',', $oldData['combine']);
//		p($oldData);
		View::with('oldData',$oldData);
	    View::make();
	}
//	检测货品是否存在或者是规格是否填写
	public function is_exists(){
		foreach (Q('post.combine') as $key => $value) {
			if(!$value) View::error("先填写规格");
		}
		
	}
}