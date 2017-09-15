<?php namespace Home\Model;
use Hdphp\Model\Model;
//用户信息表
class Userinfo extends Model{
	//指定表名
	protected $table = 'user_info';

//	自动验证字段不存在时验证失败
	protected $validate = array(
//		账号密码邮箱
		array('idcard','identity','身份证格式不正确！',3,1)
	);
	
	
//	修改
	public function edit($uid){
		if(!$this->create()) return FALSE;
		
		$this->data['birthday'] = implode('-', Q('post.birthday'));
//		p($this->data);exit;
		$this->where("shop_user_uid",$uid)->save();
		return TRUE;
	}
	
}

 ?>