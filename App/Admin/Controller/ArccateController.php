<?php namespace Admin\Controller; 

//添加文章分类
class ArccateController extends CommonController{
	private $cateModel;
	private $arcModel;
//	构造函数
	public function __auto(){
		$this->cateModel = new \Common\Model\Arccate;
//		文章表
		$this->arcModel = new \Common\Model\Arc;
	}
//	分类列表
	public function index(){
		$cateData = $this->cateModel->get();
		if(!$cateData) View::error('您还没有添加分类，请先添加分类！',U('add'));
//		p($cateData);
		View::with('cateData',$cateData)->make();
	}
	
//	添加分类
	public function add(){
		if(IS_POST){
			if(!$this->cateModel->store()) View::error($this->cateModel->getError());
			View::success('添加文章分类成功！',U('index'));
		}
		View::make();
	}
	
//	分类修改
	public function edit(){
		if(IS_POST){
			if(!$this->cateModel->edit()) View::error($this->cateModel->getError());
			View::success('修改文章分类成功！',U('index'));
		}
//		获取原数据到模板
		$cid = Q('get.cid');
		$oldData = $this->cateModel->where("cid={$cid}")->find();
		p($oldData);
		View::with('oldData',$oldData)->make();
	}
	
//	删除分类
	public function del(){
		$cid = Q('get.cid');
//		检测该分类是否有文章有文章先删除文章
		$arcData = $this->arcModel->where("shop_arc_cate_cid={$cid}")->get();
		if($arcData) View::error('请先删除该分类下文章，再删除此分类！',U('index'));
		$this->cateModel->where("cid={$cid}")->delete();
		View::success('删除分类成功',U('index'));
	}
}