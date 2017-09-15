<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品表
class Shopdetail extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'detail';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		商品详情页
		array('intro','required','商品详情不能为空！',3,3)
	);
	
//	执行添加
	public function stores($gid){
	    if(!$this->create()) return FALSE;
		$this->data['shop_lists_gid'] = $gid;
		$this->data['small'] = implode(',', $this->data['small']);
		$this->add();
		return TRUE;
	}
	
//	执行修改
	public function listedit($gid){
	    if(!$this->create()) return FALSE;
		$this->data['small'] = implode(',', $this->data['small']);
		$this->where("shop_lists_gid={$gid}")->save();
		return TRUE;
	}
}