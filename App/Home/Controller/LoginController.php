<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//登陆
class LoginController extends Controller{
	
	private $userModel;
	//构造函数
	public function __init()
	{
		$this->userModel = new \Home\Model\User;
	}
	
    //登陆
    public function index(){
    	if(IS_POST){
    		$account = Q('post.account');
//			判断用户是否存在
			$userData = $this->userModel->where("account",$account)->find();
			if(!$userData) View::error('用户名不存在！');
			$password = Q('post.password','','md5');
			if($password!=$userData['password']) View::error('密码错误！');
//			p($userData);
//			然后执行存入session[info]进入后台
			$_SESSION['user'] = [
				'uid'=>$userData['uid'],
				'username'=>$userData['username']
			];
			View::success('登陆成功！',__ROOT__.'/index.html');
			
    	}
    	
       View::make();
    }
	
	
//	退出登录
	public function out(){
	    session_unset($_SESSION['user']);
		session_destroy();
		View::success('退出成功！',__ROOT__.'/index.html');
		
	}
	
	
//	验证用户信息
	public function validate(){
//		判断用户是否存在
//		p(Q('post.'));die;
		$account = Q('post.account');
		$userData = $this->userModel->where("account",$account)->find();
		if(!$userData){
			echo 1;
			exit;
		}else{
//			判断密码
			$password = Q('post.password','','md5');
			if($password!=$userData['password']){
				echo 1;
				exit;
			}
		}

		
		echo 0;exit;
	}
}
