<?php namespace Admin\Controller; 

//添加商品分类
class ShopcateController extends CommonController{
	private $CateModel;
	private $TypeModel;
//	构造函数
	public function __auto(){
		$this->CateModel = new \Common\Model\Shopcate;
//		类型
		$this->TypeModel = new \Common\Model\Shoptype;
	}
	
//	分类列表
	public function index(){
		$cateData = $this->CateModel->get();
		if(!$cateData) View::error('您还没有添加分类，请先添加分类！',U('add'));
//		树状图分类
		$cateData = Data::tree($cateData,'cname');
//		p($cateData);
		View::with('cateData',$cateData)->make();
	}
	
//	分类添加
	public function add(){
//		检测是否post发送
		if(IS_POST){
			if(!$this->CateModel->store()) View::error($this->CateModel->getError());
			View::success('添加分类成功！',U('add'));
		}
		
		
		View::make();
	}
	
//	子分类添加
	public function sanadd(){
//		获取原数据
//		$cid = Q('get.cid');
		if(IS_POST){
			if(!$this->CateModel->store()) View::error($this->CateModel->getError());
			View::success('添加分类成功！',U('index'));
		}
//		获取类型
		$typeData = $this->TypeModel->get();
//		p($typeData);
		View::with('typeData',$typeData)->make();
	}
	
//	分类编辑
	public function edit(){
		$cid = Q('get.cid');
//		检测是否post发送过来
		if(IS_POST){
			if(!$this->CateModel->edit()) View::error($this->CateModel->getError());
			View::success('修改分类成功！',U('index'));
		}
//		获取类型
		$typeData = $this->TypeModel->get();
		View::with('typeData',$typeData);
//		获取原数据
		$oldData = $this->CateModel->where("cid={$cid}")->find();
//		p($oldData);
		View::with('oldData',$oldData)->make();
	}
	
//	分类删除	要点：（1.有子分类情况 2.分类下有商品情况）
	public function del(){
//		获取到cid
		$cid = Q('get.cid');
//		检测是否有子分类
		$sanData = $this->CateModel->where("pid={$cid}")->get();
		if($sanData) View::error('改分类下还有子分类，请先删除子分类！');
//		在检测是否有商品
		
		$this->CateModel->where("cid={$cid}")->delete();
		View::success('删除成功！',U('index'));
	}
}
	