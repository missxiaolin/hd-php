<?php namespace Admin\Controller; 

//后台用户管理
class UserController extends CommonController{
//	权限管理
	private $nodeModel;
//	用户表
	private $userModel;
	public function __auto(){
	    $this->nodeModel = new \Admin\Model\Node;
		$this->userModel = new \Admin\Model\User;
	}
	
	
	
//	用户管理中心
	public function user(){
		$userData = $this->userModel->gain();
		View::with('userData',$userData);
	    View::make();
	}
		
//	添加新用户	
	public function useradd(){
		if(IS_POST){
			if(!$this->userModel->store()) $this->error($this->userModel->getError());
			$this->success('添加用户成功',U('user'));
		}
//		角色
		$roleModel = new \Admin\Model\Role;
		$roleData = $roleModel->allData();
		View::with('roleData',$roleData);
	    View::make();
	}
	
	
	
//	角色列表
	public function role(){
		$roleModel = new \Admin\Model\Role;
		$roleData = $roleModel->allData();
		View::with('roleData',$roleData);
	    View::make();
	}
	
//	添加角色
	public function roleadd(){
		if(IS_POST){
			$roleModel = new \Admin\Model\Role;
			if(!$roleModel->store()) $this->error($roleModel->getError());
			$this->success('添加角色成功',U('Role'));
		}
	    View::make();
	}
	
//	角色分配权限
	public function roleallot(){
//		echo Q('get.id');
//		执行添加
		if(IS_POST){
			$rolenodeModel = new \Admin\Model\Rolenode;
			if($rolenodeModel->store(Q('get.id',0,'intval'))) $this->success('添加权限成功',U('role'));
		}
		$nodeData = $this->nodeModel->layer();
	    View::with('nodeData',$nodeData)->make();
	}
//	权限列表
	public function Power(){
		$nodeData = $this->nodeModel->allData();
		View::with('nodeData',$nodeData);
	    View::make();
	}
		
//	权限添加
	public function Poweradd(){
		if(IS_POST){
			if(!$this->nodeModel->store()) $this->error($this->nodeModel->getError());
			$this->success('添加成功',U('Power'));
		}
		$nodeData = $this->nodeModel->allData();
		View::with('nodeData',$nodeData);
	    View::make();
	}
}
	