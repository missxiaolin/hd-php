<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品订单
class Order extends Model{
	
//	指定数据库里的表名(框架固定写法)
	protected $table = 'order';
	
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('number','time','function',3,1),
		array('time','time','function',3,1),
		array('shop_user_uid','getUid','method',3,1)
	);
//	是谁的订单
	public function getUid(){
		return $_SESSION['user']['uid'];
	}
	
	
	
	
	public function store(){
	    $this->create();
		if(empty($_POST['remark'])){
			$this->data['remark'] = '';
		}
		$oid = $this->add();
		return $oid;
	}
	
	
	
	
	
	
	
}
