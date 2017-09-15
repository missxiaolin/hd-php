<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品属性表
class Shoplistattr extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'list_attr';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		array('addprice','required','商品附加价格必须填写',3,3)
	);
	
//	执行添加
	public function stores($gid){
//	    if(!$this->create()) return FALSE;
//		p(Q('post.'));exit;
		//获取商品属性  3维数组  
		$gavalue=Q('post.gavalue','arrray()');
		//获得商品价格
		$addprice=Q('post.added','array()');
		//添加字段信息  
		foreach ($gavalue as $k => $g) {
			foreach($g as $p=>$v){
				
//				$this->data['shop_type_attr_taid']=$k;
				$class = Db::table("type_attr")->where("taid",$k)->pluck('class');
				if($class==0){
					$data = [
						'shop_type_attr_taid'=>$k,
						'shop_lists_gid'=>$gid,
						'added'=>0,
						'gtvalue'=>$v
					];
				}else{
					$data = [
						'shop_lists_gid'=>$gid,
						'shop_type_attr_taid'=>$k,
						'added'=>$addprice[$k][$p],
						'gtvalue'=>$v
					];
				}
				
				$this->add($data);
			}
		}
	}
	
	
	
	
//	执行修改
	public function list_attr_edit($gid){
//		修改前删除货品
	    Db::table('lis')->where("shop_lists_gid={$gid}")->delete();
//		先删除所有属性在执行添加
		$this->where("shop_lists_gid={$gid}")->delete();
		$this->stores($gid);
	}
}