<?php namespace Common\Model;
use Hdphp\Model\Model;
//类型属性
class Shopattr extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'type_attr';

//	自动验证字段不存在时验证失败
	protected $validate = array(
		array('taname','required','属性不能为空！',3,3),
//		array('tavalue','required','属性值不能为空！',3,3),
//		array('shop_type_tid','required','属性类型有误！',3,1)
	);
	
//	添加
	public function store(){
		if(!$this->create()) return FALSE;
//		把|替换成,
		$this->data['tavalue'] = str_replace('|', ',', $this->data['tavalue']);
		$this->add();
		return TRUE;
		
	}
	
//	修改
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->data['tavalue'] = str_replace('|', ',', $this->data['tavalue']);
		$this->save();
		return TRUE;
	}
	
	
	
	
	
		
}
?>