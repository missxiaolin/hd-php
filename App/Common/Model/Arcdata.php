<?php namespace Common\Model;
use Hdphp\Model\Model;
//文章内容
class Arcdata extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'arc_data';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		标题
		array('content','required','文章内容不能为空！',3,3)
	);
}