<?php namespace Admin\Model;
use Hdphp\Model\Model;
class Rolenode extends Model{
	//指定表名
	protected $table = 'role_has_shop_node';
	
//	实行添加
	public function store($id){
		$this->create();
		foreach (Q('post.nodeid') as $k => $v) {
			$this->add(array('role_id'=>$id,'node_id'=>$v));
		}
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