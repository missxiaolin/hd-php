<?php namespace Admin\Controller; 

//站点配置
class ConfigController extends CommonController{
//	构造函数
	public function index(){
		$configModel = new \Common\Model\Config;
		if(IS_POST){
//			修改数据库值
			foreach (Q('post.') as $name => $value) {
				$configModel->where('name',$name)->save(array('value'=>$value));
				
			}
//			修改配置文件
			file_put_contents('./Config/webSet.php', "<?php\r\nreturn " . var_export(Q('post.'),true) . ";");
			View::success('修改成功',U('index'));
		}
		$data = $configModel->get();
	    View::with('data',$data)->make();
	}
}