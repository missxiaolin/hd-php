<?php
namespace Admin\Controller;
/*
 * 判断是否存在session,否则跳转到login登录
 */
use Hdphp\Controller\Controller;
class CommonController extends Controller
{
	//自动执行
	public function __init()
	{
		//调用验证登录状态
		$this->authLogin();
		
		//检测是否有__auto方法,如果有的话就调用执行   (类似于自动执行)
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
	}//__init
	
	
	//验证登录状态
	public function authLogin(){
		//判断是否登陆
		if(!Rbac::isLogin()) go(U('Login/index'));
		//权限验证
		if(!Rbac::verify()){
//			 View::error('抱歉,您没有权限,请联系管理员');
			echo '<script type="text/javascript">alert("抱歉,您没有权限,请联系管理员!");parent.location.href="index.php?m=Admin&c=Index&a=index";</script>';
			die();
		}
		//判断session是否有info ,没有的话跳转到登录页面
//		if(!isset($_SESSION['info'])) go(U('Login/index'));
	}//authLogin
	
	
	
}//class
?>