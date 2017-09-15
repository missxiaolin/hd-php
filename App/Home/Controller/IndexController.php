<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//首页
class IndexController extends Controller{
//	文章表
	private $arcModel;
//	分类
	private $shopcateModel;
//	商品
	private $ShoplistModel;
	//构造函数
	public function __init()
	{
//		文章
		$this->arcModel = new \Common\Model\Arc;
//		分类
		$this->shopcateModel = new \Common\Model\Shopcate;
//		商品
		$this->ShoplistModel = new \Common\Model\Shoplist;
	}
	
    //首页
    public function index(){
//		文章数据
		$arcData = $this->arcModel->where("is_recycle=0")->orderBy("sendtime",'desc')->limit(14)->get();
		foreach ($arcData as $k => $v) {
			$arcData[$k]['cate'] = Db::table('arc_cate')
								->where("cid={$v['shop_arc_cate_cid']}")
								->pluck('cname');
		}
//		p($arcData);
//		楼层1
		View::with('arcData',$arcData);
		$cateData = $this->floor($this->shopcateModel->where("pid IN (9,11)")->orderBy('sort','asc')->get(),8);
		View::with('cateData',$cateData);
		// 楼层2
		$twoData = $this->floor($this->shopcateModel->where("pid=32")->orderBy('sort','asc')->limit(8)->get(),10);
		View::with('twoData',$twoData);
       View::make();
    }


	private function floor($cateData,$sum){
//		压入商品
		foreach ($cateData as $k => $v) {
			$type_id = [];
			$cid = $this->shopcateModel->where("pid={$v['cid']}")->limit($sum)->lists('cid');
			if($cid){
				$type_id[] = $cid;
				$cid = implode(',', $type_id[0]);
				$cateData[$k]['shop'] = $this->ShoplistModel->where("shop_category_cid IN (".$cid.")")->limit(8)->get();
			}

		}
		return $cateData;
	}






	public function Jimi(){

		$msg=urlencode(Q('post.text'));
		echo file_get_contents("http://www.tuling123.com/openapi/api?key=786eb210d4bf4466ae59636f10443e94&info=$msg");

		// 786eb210d4bf4466ae59636f10443e94
		//echo json_encode($res);
	}
	
	
	
}
