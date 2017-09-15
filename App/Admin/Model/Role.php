<?php namespace Admin\Model;
use Hdphp\Model\Model;
class Role extends Model{
	//指定表名
	protected $table = 'role';
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		标题
		array('name','required','角色不能为空！',3,3)
	);
	
//	实行添加
	public function store(){
		if(!$this->create()) return FALSE;
	    $this->add();
		return TRUE;
		
	}
	
//	获取数据
	public function allData(){
//		旧数据
		$oldData = $this->get();
		if($oldData) return $oldData;
		return [];
	}


	
}

 ?>