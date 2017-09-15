<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品分类
class Arccate extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'arc_cate';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
		array('cname','required','文章分类不能为空！',3,3)
	);
//	执行添加
	public function store(){
		if(!$this->create()) return FALSE;
		$this->add();
		return TRUE;
	}
//	执行修改
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->save();
		return TRUE;
	}
}