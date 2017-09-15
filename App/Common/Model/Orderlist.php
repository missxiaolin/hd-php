<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品订单列表
class Orderlist extends Model{
	
//	指定数据库里的表名(框架固定写法)
	protected $table = 'order_list';
	
	
	public function store(){
	    $this->create();
		if(empty($_POST['remark'])){
			$this->data['explain'] = '';
		}
		$this->add();
		return TRUE;
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
