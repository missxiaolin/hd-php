<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品分类
class Shopcate extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'category';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
		array('cname','required','分类不能为空！',3,3),
//		array('pid','required','添加失败！',4,3),
//		array('shop_type_tid','required','请选择类型！',4,3)
	);
	

//	添加
	public function store(){
		if(!$this->create()) return FALSE;
		$this->add();
		return TRUE;
	}
//	修改
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->save();
		return TRUE;
	}
	
	
	
//	获得分类和子分类数据
	public function getSon($data,$cid){
	    $temp = [];
		foreach ($data as $v) {
			if($v['pid']==$cid){
				$temp[] =$v['cid'];
				$temp = array_merge($temp,$this->getSon($data,$v['cid']));			
			}
		}
		return $temp;
	}
	
	//	获得分类和子分类数据
	public function getFather($data,$pid){
	    $temp = [];
//		p($pid);
//		exit;
		foreach ($data as $v) {
			
			if($v['cid']==$pid){
				$temp[] =$v['cid'];
				$temp = array_merge($temp,$this->getFather($data,$v['pid']));			
			}
		}
		return $temp;
	}
	
}