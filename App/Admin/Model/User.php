<?php namespace Admin\Model;
use Hdphp\Model\Model;
class User extends Model{
	//指定表名
	protected $table = 'admin';
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		标题
		array('user','required','用户不能为空！',3,3),
		array('userpassword','required','用户密码不能为空！',3,3),
	);
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('username','postuser','method',3,3),
		array('userpassword','setPassword','method',3,3)
	);
//	用户密码加密
	public function setPassword(){
	    return Q('post.userpassword','','md5');
	}
//	用户名称
	public function postuser(){
	    return Q('post.user');
	}
	
//	添加
	public function store(){
	    if(!$this->create()) return FALSE;
		$uid = $this->add();
		$userroleModel = new \Admin\Model\Userrole;
		$userroleModel->stores($uid,Q('post.roleid'));
		return TRUE;
	}

//	获取所有用户
	public function gain(){
	    return $this->where("user != 'admin'")->get();
	}

	
}

 ?>