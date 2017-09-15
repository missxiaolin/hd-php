<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品类型
class Shoptype extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'type';

//	自动验证字段不存在时验证失败
	protected $validate = array(
		array('tname','required','类型不能为空！',3,3)
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
//		p($this->data);
//		exit;
		$this->save();
		return TRUE;
	}
	
	
	
	
		
}
?>