<?php namespace Admin\Controller; 

//添加商品品牌
class BrandController extends CommonController{
//	构造函数
	private $brandModel;
	public function __auto(){
		$this->brandModel = new \Common\Model\Brand;
	}
	
//	显示品牌列表
	public function index(){
		if(IS_POST){
//			接收数据
			$data = Q('post.');
//			循环修改
			foreach ($data as $bid => $sort) {
//				执行修改
				$this->brandModel->where("bid",$bid)->save(array('sort'=>$sort));
			}
		}
		$brandData = $this->brandModel->orderBy('sort')->get();
		if(!$brandData) View::error('请先添加品牌！',U('add'));
//		p($brandData);
		View::with('brandData',$brandData)->make();
	}
	
//	添加品牌
	public function add(){
//		判断是否post发送过来
		if(IS_POST){
			if(!$this->brandModel->store()) View::error($this->brandModel->getError());
			View::success('添加成功！',U('index'));
		}
		View::make();
	}
	
//	修改品牌
	public function edit(){
		if(IS_POST){
			if(!$this->brandModel->edit()) View::error($this->brandModel->getError());
			View::success('修改成功！',U('index'));
		}
//		获取编号
		$bid = Q('get.bid');
//		返回旧数据
		$oldData = $this->brandModel->where("bid={$bid}")->find();
//		p($oldData);
		View::with('oldData',$oldData)->make();
	}
	
//	删除品牌
	public function del(){
		$bid = Q('get.bid');
		$this->brandModel->where("bid={$bid}")->delete();
		View::success('删除成功',U('index'));
	}
	
	
}