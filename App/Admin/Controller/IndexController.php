<?php namespace Admin\Controller; 

//后台默认控制器
class IndexController extends CommonController{
	private $userModel;
	//构造函数
	public function __auto()
	{
		$this->userModel = new \Admin\Model\User;
	}
	
    //首页
    public function index(){
       View::make();
    }
	
	
//	欢迎页面
	public function welcome(){
//		p($_SESSION);
		View::make();
	}
	
	
//	修改密码
	public function changePassword(){
//		判断是否post提交
		if(IS_POST){
//			获取新密码判断是否大于5位
			$newPassword = Q('post.newPassword');
			if(strlen($newPassword) <5) View::error('新密码要大于5位！');
//			获取确认密码
			$confirmPassword = Q('post.confirmPassword');
			
			if($newPassword != $confirmPassword) View::error('两次密码不一致！');
//			判断原密码是否正确
			$uid = $_SESSION['info']['uid'];
			$data = $this->userModel->where("uid={$uid}")->find();
//			获取原密码(判断密码是否和数据库对的上)
			$oldPassword = Q('post.oldPassword','','md5');
			if($oldPassword != $data['userpassword']) View::error('原密码错误！');
//			p($data);exit;
//			执行修改
			$this->userModel->where("uid={$uid}")->save(array('userpassword'=>md5($newPassword)));
			
			session_unset();
			session_destroy();
			echo '<script>alert("修改成功！");parent.location.href="'.U('Login/index').'";</script>';			
			exit;
		}
		
		View::make();
		
	}
	
	
	
}
