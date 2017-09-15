<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品货号
class Shoplis extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'lis';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
		array('inventory','required','库存不能为空！',3,3)
	);
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('number','time','function',3,1)
	);
	public function store(){
	    if(!$this->create()) return FALSE;
		$combine = implode(',', Q('post.combine'));
		$this->data['combine'] = $combine;
		$this->add();
		return TRUE;
	}
	
	public function edit(){
	    if(!$this->create()) return FALSE;
		$combine = implode(',', Q('post.combine'));
		$this->data['combine'] = $combine;
	    $this->save();
		return TRUE;
	}
	
}