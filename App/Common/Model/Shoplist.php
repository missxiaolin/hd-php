<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品表
class Shoplist extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'lists';
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		分类
		array('shop_category_cid','required','所属分类不能为空！',3,3),
//		品牌
		array('shop_brand_bid','required','所属品牌不能为空！',3,3),
//		商品名称
		array('gname','required','商品名称不能为空！',3,3),
//		单位
		array('unit','required','单位不能为空！',3,3),
//		市场价
		array('marketprice','required','市场价格不能为空！',3,3),
//		商城价
		array('shopprice','required','商城价格不能为空！',3,3),
//		商品列表图不能为空
//		array('pic','required','商品列表图不能为空！',3,3)
	);
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('gnumber','time','function',3,1),
		array('time','time','function',3,1),
		array('shop_admin_uid','getUid','method',3,1)
	);
//	是谁发表的商品id
	public function getUid(){
		return $_SESSION['info']['uid'];
	}

//	执行添加
	public function store(){
//		p(Q('post.'));exit;
	    if(!$this->check()) return FALSE;
		$gid = $this->add();
//		添加商品详细
		$detailModel = new \Common\Model\Shopdetail;
		$detailModel->stores($gid);
		$attrModel = new \Common\Model\Shoplistattr;
		$attrModel->stores($gid);
		return TRUE;
	}
	
	
	
	
//	验证信息
	public function check(){
//		验证商品表
	    if(!$this->create()) return FALSE;
//		验证商品详细
		$detailModel = new \Common\Model\Shopdetail;
		if(!$detailModel->create()){
			$this->error = $detailModel->getError();
			return FALSE;
		}
		return TRUE;
	}
	
//	修改
	public function edit(){
	    if(!$this->check()) return FALSE;
		$gid = Q('post.gid',0,'intval');
//		如果不存在列表图pic但存在new_pic就返回原图
		if(!Q('post.pic')){
			if(Q('post.new_pic')){
				$this->data['pic'] = Q('post.new_pic');
			}
		}else{//如果存在就删除原图(在存在条件下)
			if(Q('post.new_pic')){
				$img=Q('post.new_pic');//获得原图
				$path=pathinfo($img);//原图信息
				unlink($img);//删除原图
				$mid=str_replace(".{$path['extension']}", "_list.{$path['extension']}", $img);
				unlink($mid);//删除原图
			}

		}
		$this->data['inventory'] = 0;
//		执行修改
		$this->save();
//		修改商品详情页
		$detailModel = new \Common\Model\Shopdetail;
		$detailModel->listedit($gid);
//		修改属性
		$attrModel = new \Common\Model\Shoplistattr;
		$attrModel->list_attr_edit($gid);
		
		return TRUE;
	}
	
	
	
}