<?php namespace Home\Controller; 

use Hdphp\Controller\Controller;

//文章控制器
class ArcController extends Controller{

	//构造函数
	public function __init()
	{
	}
	
    //显示文章
    public function index(){
//		文章数据
		$arcModel = new \Common\Model\Arc;
		$arcData = $arcModel
				->join("arc_data",'shop_arc_wid','=','wid')
				->where("is_recycle=0")
				->orderBy("sendtime",'desc')
				->limit(10)
				->get();
		
//		p($arcData);
		View::with('arcData',$arcData);
//		热门文章（点击次数）
		$arcModel = new \Common\Model\Arc;
		$hotData = $arcModel
						->join("arc_data",'shop_arc_wid','=','wid')
						->where("is_recycle=0")
						->orderBy("click",'desc')
						->limit(5)
						->get();
//		p($hotData);
		View::with('hotData',$hotData);	
       View::make();
    }
	
	
	
	
	
	
//	显示文章内容
	public function arccon(){
//		当前文章内容
		$wid = Q('get.wid',0,'intval');
		$arcdataModel = new \Common\Model\Arcdata;
		$arcData = $arcdataModel
				->join("arc",'shop_arc_wid','=','wid')
				->where("shop_arc_wid={$wid}")
				->find();
//		p($arcData);
		View::with('arcData',$arcData);
//		热门文章（点击次数）
		$arcModel = new \Common\Model\Arc;
		$arcModel->where("wid={$wid}")->increment('click',1);
		$hotData = $arcModel
						->join("arc_data",'shop_arc_wid','=','wid')
						->where("is_recycle=0")
						->orderBy("click",'desc')
						->limit(5)
						->get();
//		p($hotData);
		View::with('hotData',$hotData);			
	    View::make();
	}
}
