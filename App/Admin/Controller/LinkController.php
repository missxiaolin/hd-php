<?php namespace Admin\Controller; 

//添加友情链接
class LinkController extends CommonController{
	private $linkModel;
	public function __auto(){
	    $this->linkModel = new \Common\Model\Link;
	}

//	显示友情链接(审核通过的显示)
	public function index(){
		$linkData = $this->linkModel->where("is_verify=0")->get();
//		判断是否有数据没有先添加
		if(!$linkData) View::error('请先添加友情链接！',U('add'));
//		显示分配到模板
//		p($linkData);
	    View::with('linkData',$linkData)->make();
	}
	
	
//	添加友情链接
	public function add(){
//		判断是否post发送过来
		if(IS_POST){
			if(!$this->linkModel->store()) View::error($this->linkModel->getError());
			View::success('添加成功',U('index'));
		}
	    View::make();
	}

//	编辑友情链接
	public function edit(){
		if(IS_POST){
			if(!$this->linkModel->edit()) View::error($this->linkModel->getError());
			View::success('修改成功',U('index'));
		}
//		获得lid
		$lid = Q('get.lid',0,'intval');
		$oldData = $this->linkModel->where("lid",$lid)->find();
		View::with('oldData',$oldData)->make();
	}
	
	public function del(){
//		获得lid
		$lid = Q('get.lid',0,'intval');
		$this->linkModel->where("lid",$lid)->delete();
		View::success('删除成功！',U('index'));
	}
	
	
	
}