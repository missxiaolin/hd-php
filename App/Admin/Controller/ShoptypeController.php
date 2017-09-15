<?php namespace Admin\Controller; 

//添加商品类型
class ShoptypeController extends CommonController{
	private $shop_model;
	private $attr_model;
//	构造函数
	public function __auto(){
//		类型表
		$this->shop_model = new \Common\Model\Shoptype;
//		属性表
		$this->attr_model = new \Common\Model\Shopattr;
	}
	
	
//	显示所有类型
	public function index(){
//		发送获取数据
		$typeData = $this->shop_model->get();
		if(!$typeData) View::error('您还没添加类型，请先添加类型！',U('add'));
//		分布信息到模板
		View::with('typeData',$typeData)->make();
	}
	
//	添加类型
	public function add(){
//		判断是否post发送
		if(IS_POST){
			if($this->shop_model->store()){
				View::success('添加类型成功！',U('index'));
			}
			View::error($this->shop_model->getError());
		}
		View::make();
	}
	
//	删除类型
	public function del(){
		$tid = Q('get.tid');
//		先检查是否有属性存在
		$attrData = $this->attr_model->where("shop_type_tid={$tid}")->get();
		if($attrData){
			View::error('该分类下还有属性值，请先删除属性！');
//			p($attrData);
		}
//		属性没有执行删除
		$this->shop_model->where("tid={$tid}")->delete();
		View::success('删除类型成功！',U('index'));
	}
	
	
//	编辑类型
	public function edit(){
//		获取tid
		$tid = Q('get.tid');
		if(IS_POST){
//			执行模型中的edit方法
			if($this->shop_model->edit()){
				View::success('修改成功',U('index'));
			}
			View::error($this->shop_model->getError());
		}
//		获取数据
		$data = $this->shop_model->where("tid={$tid}")->find();
//		旧数据分配到模板
		View::with('data',$data)->make();
	}


	
	
	
//	属性列表
	public function attrlist(){
//		获取tid
		$tid = Q('get.tid');
//		获取数据分配数据到模板
		$attrData = $this->attr_model->where("shop_type_tid={$tid}")->get();
//		p($attrData);
		View::with('tid',$tid);
		View::with('attrData',$attrData)->make();
	}
	
	
//	添加属性
	public function attradd(){
//		获取tid
		$tid = Q('get.tid');
//		判断自动验证
		if(IS_POST){
			if(!$this->attr_model->store()) View::error($this->attr_model->getError());
			View::success('添加属性成功',U('attrlist',array('tid'=>$tid)));
		}
//		分配
		View::with('tid',$tid);
		View::make();
	}
	
//	编辑属性
	public function attredit(){
//		获取tid
		$taid = Q('get.taid');
		
		$attrData = $this->attr_model->where("taid={$taid}")->find();
		if(IS_POST){
			if(!$this->attr_model->edit()) View::error($this->attr_model->getError());
			View::success('修改成功',U('attrlist',array('tid'=>$attrData['shop_type_tid'])));
		}
		$attrData['tavalue'] = str_replace(',', '|', $attrData['tavalue']);
//		p($attrData);
		View::with('attrData',$attrData)->make();
	}
	
	
//	属性删除
	public function attrdel(){
//		获取tid
		$taid = Q('get.taid');
//		先拿到tid好返回
		$tid = $this->attr_model->where("taid={$taid}")->pluck('shop_type_tid');
//		执行删除
		$this->attr_model->where("taid={$taid}")->delete();
		View::success('删除成功',U('attrlist',array('tid'=>$tid)));
	}
	
	
	
	
	
	
}