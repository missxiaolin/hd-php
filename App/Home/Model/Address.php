<?php namespace Home\Model;
use Hdphp\Model\Model;
//地址
class Address extends Model{
	//指定表名
	protected $table = 'address';
	
	public function adds(){
	    $this->create();
		$this->data['region'] = implode(',', Q('post.region'));
		$this->data['shop_user_uid'] = $_SESSION['user']['uid'];
		$did = $this->add();
		return $did;
	}
	
	
	public function edit(){
		$this->create();
		$this->data['region'] = implode(',', Q('post.region'));
		$this->save();
		return TRUE;
	}
	
	
}