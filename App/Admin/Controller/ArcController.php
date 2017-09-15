<?php namespace Admin\Controller; 

//添加文章
class ArcController extends CommonController{
	private $cateModel;
	private $arcModel;
//	构造函数
	public function __auto(){
//		分类表
		$this->cateModel = new \Common\Model\Arccate;
//		文章表
		$this->arcModel = new \Common\Model\Arc;
	}
	
//	文章列表
	public function index(){
//		$data = Db::table('arc_data')->get();
//		p($data);
		$arcData = $this->arcModel->join('arc_cate','shop_arc_cate_cid','=','cid')->where("is_recycle=0")->get();
		if(!$arcData) View::error('您还没有文章，请先添加文章！',U('add'));
//		p($arcData);
		View::with('arcData',$arcData)->make();
	}
	
	
	
//	添加文章
	public function add(){
		if(IS_POST){
			if(!$this->arcModel->store()) View::error($this->arcModel->getError());
			View::success('添加成功！',U('index'));
		}
//		先把分类分配到模板
		$cateData = $this->cateModel->get();
		View::with('cateData',$cateData)->make();
	}
	
//	修改文章
	public function edit(){
		if(IS_POST){
			if(!$this->arcModel->edit()) View::error($this->arcModel->getError());
			View::success('修改成功！',U('index'));
		}
//		获取get
		$wid = Q('get.wid',0,'intval');
//		获取原数据
		$oldData = $this->arcModel
						->join('arc_cate','shop_arc_cate_cid','=','cid')
						->join('arc_data','shop_arc_wid','=','wid')
						->where('wid',$wid)
						->find();
//		p($oldData);
		View::with('oldData',$oldData);
//		先把分类分配到模板
		$cateData = $this->cateModel->get();
		View::with('cateData',$cateData)->make();
	}
	
//	删除文章到回收站
	public function rdel(){
		//获得数据wid 并转为整型
		$wid = Q('get.wid',0,'intval');
		//修改Arc表('is_recycle')为1
		$this->arcModel->where('wid',$wid)->save(['is_recycle'=>1]);
		View::success('删除成功',U('index'));
	}
	
//	回收站显示文章
	public function ViewRecycle(){
		$arcData = $this->arcModel->join('arc_cate','shop_arc_cate_cid','=','cid')->where("is_recycle=1")->get();
		View::with('arcData',$arcData)->make();
	}


//	删除文章
	public function del(){
		//获得数据wid 并转为整型
		$wid = Q('get.wid',0,'intval');
//		获取原先的图片
		$oldImg = $this->arcModel->where('wid',$wid)->pluck('thumb');
//		删除内容    文章表	 缩略图
		Db::table('arc_data')->where('shop_arc_wid',$wid)->delete();
		$this->arcModel->where('wid',$wid)->delete();
//		在删除图片
		if($oldImg){
			$oldImgs = str_replace("_thumb", '', $oldImg);
			unlink($oldImg);
			unlink($oldImgs);
		}
		View::success('已从数据库删除',U('ViewRecycle'));
	}
	
//	回复到文章列表
	public function restore(){
		//获得数据wid 并转为整型
		$wid = Q('get.wid',0,'intval');
//		还原
		$this->arcModel->where('wid',$wid)->save(['is_recycle'=>0]);
		View::success('删除成功',U('ViewRecycle'));
	}
}