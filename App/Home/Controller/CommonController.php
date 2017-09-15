<?php
namespace Home\Controller;
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
		//判断session是否有info ,没有的话跳转到登录页面
		if(!isset($_SESSION['user'])) go(U('Login/index'));
	}//authLogin
	
	
	
}//class
?>