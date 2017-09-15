<?php namespace Admin\Controller; 

use Hdphp\Controller\Controller;

//后台 登录 控制器
class LoginController extends Controller{
	
	private $userModel;
	//自动执行
	public function __init()
	{
		$this->userModel = new \Admin\Model\User;
	}//__init
	
	
	
	//登录动作	
	public function index(){
		//判断post提交
		if(IS_POST){
//			一,首先第一步判断验证码是否正确
//			Q('获取post.code','默认值','作用函数' )
			$code = Q('post.code',NULL,'strtoupper');
//			判断如果post过来的code值与session值不同,显示验证码错误
			if($code != $_SESSION['code'] ) View::error('验证码错咯~');
//			判断用户名是否存在
			$username = Q('post.username');
			$data = $this->userModel->where("user='{$username}'")->find();
//			检索是否被锁定
			if($data['islock'] != 0) View::error('没有匹配的账户信息~');
			if(!$data) View::error('没有匹配的账户信息~');
//			判断密码是否正确
			$password = Q('post.password','','md5');
			if($password != $data['userpassword']) View::error('没有匹配的账户信息~');

			
//			通过验证执行修改
			$this->userModel->where("uid={$data['uid']}")->save(array('logintime'=>time(),'loginip'=>$_SERVER['REMOTE_ADDR']));
//			[REMOTE_ADDR] => 127.0.0.1(客户端)
			
//			然后执行存入session[info]进入后台
			$_SESSION['uid'] = $data['uid'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['info'] = [
				'uid'=>$data['uid'],
				'username'=>$data['username']
			];
//			显示登陆成功并跳转到首页
			View::success('登陆成功',U('Index/index'));
		}
//		p($_SERVER);
//		echo md5('admin');
//		显示登录界面
		View::make();
	}//index
	
	
//	显示验证码
	public function code(){
	    Code::num(1)->height(40)->width(110)->make();
	}//code
	
	
//	退出账号
	public function out(){
		session_unset($_SESSION['info']);
		session_destroy();
		//跳转到登陆页面
		go(U('index'));
	}//out
	
	
	//**************************
//	public function jumpTop(){
//		echo "<script> window.parent.loaction.href='index.php?m=Admin&c=Login&a=out'; </script>";
//	}
	
}
	