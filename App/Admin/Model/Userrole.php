<?php namespace Admin\Model;
use Hdphp\Model\Model;
class Userrole extends Model{
	//指定表名
	protected $table = 'role_has_shop_admin';
	
	
//	添加
	public function stores($uid,$data){
	    if($data){
	    	foreach ($data as $k => $v) {
	    		$this->add(array('role_id'=>$v,'admin_uid'=>$uid));
	    	}
	    }
	}



	
}

 ?>