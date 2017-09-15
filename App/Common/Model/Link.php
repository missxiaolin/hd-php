<?php namespace Common\Model;
use Hdphp\Model\Model;
//友情链接
class Link extends Model
{
//	表名
	protected $table = 'Link';
//	自动验证字段不存在时验证失败
	protected $validate = array(

//		名称
		array('lname','required','友情链接名称不能为空！',3,3),
		array('lname','maxlen:40','名称不能超过40个字符！',3,3),
//		url地址
		array('url','required','url地址不能为空！',3,3),
	);
	// 自动完成
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('addtime','time','function',3,1)
	);

	
//	添加
	public function store(){
//		检测验证是否通过
	    if(!$this->create()) return FALSE;
		$this->add();
		return TRUE;
	}
//	修改
	public function edit(){
//		检测验证是否通过
	    if(!$this->create()) return FALSE;
		$this->save();
		return TRUE;
	}
	
}