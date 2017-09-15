<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品评论
class Remark extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'remark';
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		标题
		array('title','required','标题不能为空！',3,3),
		array('title','maxlen:150','标题不能超过50个字符！',3,3),
//		星级
		array('star','required','星际！',3,3),
//		内容
		array('content','required','文章内容不能为空！',3,3)
	);
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('time','time','function',3,1),
		array('uname','getName','method',3,1),
		array('shop_user_uid','getUid','method',3,1),
	);
//	是谁发表的文章id
	public function getName(){
		return $_SESSION['user']['username'];
	}
	public function getUid(){
		return $_SESSION['user']['uid'];
	}


	public function store($gid){
		if(!$this->create()) return false;
		$this->data['shop_lists_gid'] = $gid;
		$this->add();
		return TRUE;
	}
	
	
}