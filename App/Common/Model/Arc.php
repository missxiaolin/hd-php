<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品分类
class Arc extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'arc';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		标题
		array('title','required','标题不能为空！',3,3),
		array('title','maxlen:150','标题不能超过150个字符！',3,3),
//		分类不能为空
		array('shop_arc_cate_cid','required','所属分类不能为空！',3,3),
//		作者不能为空
		array('author','required','文章作者不能为空！',3,3)
	);
//	自动完成
	protected $auto = array(
		//array(字段名,处理方法,方法类型,验证条件,处理时间) 
		array('sendtime','time','function',3,1),
		array('updatetime','time','function',3,3),
		array('shop_admin_uid','getUid','method',3,1),
		array('thumb','getThumb','method',3,3)
	);
//	是谁发表的文章id
	public function getUid(){
		return $_SESSION['info']['uid'];
	}
//	上传缩略图
	public function getThumb(){
		$oldImg = Q('post.thumb');
		if($_FILES['thumb']['error']){
			if($oldImg){
				return $oldImg;
			}
		}
//		执行上并传获取上传文件信息
		$files = Upload::type('jpg,jpeg,png,gif')->make();
//		如果上传成功返回数据
		if($files){
//			改变大小上传（265*160）	先重组一个缩略图地址
			$thumbImg = str_replace(".{$files[0]['ext']}", "_thumb.{$files[0]['ext']}", $files[0]['path']);
			$img = Image::thumb($files[0]['path'],$thumbImg,265,160,6);			//返回上传地址给数据
//			如果存在旧图片就删除
			if($oldImg){
//				旧缩略图
				unlink($oldImg);
				//删除原图
				$path = str_replace('_thumb', '', $oldImg);
				unlink($path);
			}
			return $img;
		}
//		如果上传失败	把错误压入模型
		$this->error = Upload::getError();
	}
	
	
	
//	执行添加
	public function store(){
		if(!$this->check()) return FALSE;
//		添加文章表
		$aid = $this->add();
//		文章内容表添加
		$arcData = new \Common\Model\Arcdata;
		$arcData->create();
		$arcData->data['shop_arc_wid']=$aid;
		$arcData->add();
		return TRUE;
	}
//	执行修改
	public function edit(){
//		先验证文章和文章内容表的自动验证
		if(!$this->check()) return FALSE;
//		执行文章修改
		$this->save();
//		文章内容表修改
		$wid = Q('post.wid',0,'intval');
		$arcData = new \Common\Model\Arcdata;
		$arcData->create();
		$arcData->where('shop_arc_wid',$wid)->save();
		return TRUE;
	}
	
//	要先验证文章内容表（如果先验证上传如果上传通过但是文章内容不填没有通过文件已经上传）
	private function check(){
//		先验证文章内容是否为空
		$arcData = new \Common\Model\Arcdata;
		if(!$arcData->create()){
			$this->error = $arcData->getError();
			return FALSE;
		}
//		再验证文章表
		if(!$this->create()) return FALSE;
		return TRUE;
	}
}