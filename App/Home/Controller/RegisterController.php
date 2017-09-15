<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//注册
class RegisterController extends Controller{
	private $userModel;
	//构造函数
	public function __init()
	{
		$this->userModel = new \Home\Model\User;
	}
	
    //个人用户
    public function index(){
		if(IS_POST){
//  		判断用户是否存在
	    	$account = Q('post.account');
			$data = $this->userModel->where("account",$account)->get();
			if($data) View::error('该用户已被注册！');
//			判断2个密码是否一样
			$password = Q('post.password','','md5');
			$oldpassword = Q('post.oldpassword','','md5');
			if($password!=$oldpassword) View::error('密码不一致！');
			if(!$this->userModel->stort()) View::error($this->userModel->getError());
			View::success('注册用户成功！',__ROOT__.'/index.html');
		}
       View::make();
    }
//	企业用户
	public function qe_index(){
       View::make();
    }
	
//	验证码
	public function code(){
	    Code::num(1)->height(40)->width(110)->make();
	}
	
//	验证用户账号是否存在
	public function user(){
		$account = Q('post.user');
		$data = $this->userModel->where("account",$account)->get();
		if($data){
			echo 1;
		}
	}
//	验证码验证
	public function codes(){
//		Q('获取post.code','默认值','作用函数' )
		$code = Q('post.code',NULL,'strtoupper');
		if($_SESSION['code']!=$code){
			echo 1;
		}
	}
	
}
