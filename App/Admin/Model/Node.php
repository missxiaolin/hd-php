<?php namespace Admin\Model;
use Hdphp\Model\Model;
class Node extends Model{
	//指定表名
	protected $table = 'node';
//	自动验证字段不存在时验证失败
	protected $validate = array(
//		标题
		array('name','required','权限标识不能为空！',3,3),
		array('title','required','权限名称不能为空！',3,3),
	);
	
//	实行添加
	public function store(){
		if(!$this->create()) return FALSE;
		
		$pid = Q('post.pid',0,'intval');
		if($pid==0){
			$this->data['level']=1;
		}else{
			$this->data['level'] = $this->where('id',$pid)->pluck('level') + 1;
		}

	    $this->add();
		return TRUE;
		
	}
	
//	获取数据
	public function allData(){
//		旧数据
		$oldData = $this->get();
//		树状图分类
		$oldData = Data::tree($oldData,'title','id','pid');
		if($oldData) return $oldData;
		return [];
	}


//	目录列表
	public function layer(){
		$nodeData = Data::channelLevel($this->get(), $pid = 0, $html = "&nbsp;", $fieldPri = 'id', $fieldPid = 'pid');
		if($nodeData){
			return $nodeData;
		}else{
			return [];
		}
	}
	
	
	
}

 ?>