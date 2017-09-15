<?php namespace Home\Model;
use Hdphp\Model\Model;
class User extends Model{
	//指定表名
	protected $table = 'user';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		账号密码邮箱
		array('account','required','用户名不能为空！',3,3),
		array('password','required','用户名不能为空！',3,3),
		array('email','required','用户名不能为空！',3,3),
		array('email','email','邮箱格式不正确！',3,3)
	);
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('username','getuer','method',3,1),
		
	);
	
//	添加的时候默认给一个 用户名字
	public function getuer(){
	    return Q('account');
	}
	
//	注册用户
	public function stort(){
	    if(!$this->create()) return FALSE;
		$uid = $this->add();
		$infoModel = new \Home\Model\Userinfo;
		$infoModel->add(array('shop_user_uid'=>$uid));
		return TRUE;
	}

//	修改

}

 ?>