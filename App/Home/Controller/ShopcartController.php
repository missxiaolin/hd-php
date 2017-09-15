<?php namespace Home\Controller; 

//添加购物车
class ShopcartController extends CommonController{
//	购物车
	private $carModel;
//	商品
	private $ShoplistModel;
//	类型
	private $ShoptypeattrModel;
//	属性表
	private $attrModel;
	public function __auto(){
//		购物车
	    $this->carModel = new \Home\Model\Shopcar;
//		商品
		$this->ShoplistModel = new \Common\Model\Shoplist;
//		类型
		$this->ShoptypeattrModel = new \Common\Model\Shopattr;
//		属性
		$this->attrModel = new \Common\Model\Shoplistattr;
	}
	
//	加入购物车
	public function addcart(){
//		p($_SESSION);
		$data = $_SESSION['cart']['goods'];
		if($data){
			//		array_pop拿出最后一个数组值并且删除
			$datas = array_pop($data);
			
	//		p($datas);
	//		获取加入商品的数据
			$shopData = $this->ShoplistModel->where("gid",$datas['id'])->find();
			
			$img_list = pathinfo($shopData['pic']);
			$shopData['pic'] = str_replace('.'.$img_list['extension'], '_list.'.$img_list['extension'], $shopData['pic']);
			View::with("shopData",$shopData);
	//		数量
			View::with("num",$datas['num']);
	//		获取类型
	//		exit;
			$typeatrData = $this->ShoptypeattrModel
									->where("shop_type_tid={$shopData['shop_type_tid']} and class=1")
									->get();
			$gid = $datas['id'];
			$combine = explode(',', $datas['options']['hp']);
			
			foreach ($combine as $k => $v) {
				$typeatrData[$k]['spce'] = $this->attrModel
												->where("shop_lists_gid={$gid} and gtid={$v}")
												->pluck('gtvalue');
			}
	//		p($combine);
	//		p($typeatrData);
			View::with('typeatrData',$typeatrData);
		}else{
			View::with('typeatrData',[]);
		}

	    View::make();
	}
	
//	验证规格
	public function validate(){
		
		$gid = Q('post.gid',0,'intval');
		$data = Q('post.data');
	    $lisModel = new \Common\Model\Shoplis;
		$lisData = $lisModel->where("shop_lists_gid={$gid} and combine='{$data}'")->find();
		if(!$lisData){
			echo 0;
			exit;
		}
		if($lisData['inventory']==0){
			echo 0;
			exit;
		}else{
			$ShoplisattrModel = new \Common\Model\Shoplistattr;
			$combine = explode(',', $lisData['combine']);
			foreach ($combine as $k => $v) {
				$combine[$k] = $ShoplisattrModel->where("gtid={$v}")->pluck('added');
				
			}
			
			echo json_encode($combine);
			exit;
		}
	}
	
	
	
//	提交订单
	public function index(){
		if(IS_POST){//购物车过来的
//			p($_POST);
			$list = Q('post.id');
			$shopData = [];
			if($list){
				foreach ($_SESSION['cart']['goods'] as $k => $v) {
					foreach ($list as $value) {
						if($value==$k){
							$shopData[$k] = $v;
						}
					}
				}
	//			p($shopData);
				View::with('shopData',$shopData);
				$price = 0;
				foreach ($shopData as $k => $v) {
					$price = $v['total'] + $price;
				}
	//			$price = Cart::getTotalPrice();
				View::with('price',$price);
			}else{
				View::with('shopData',[]);
				View::with('price',0);
			}
			
		}else{//一键购过来的
			$shopData = $_SESSION['cart']['goods'];
			if($shopData){
				//		p($shopData);
				View::with('shopData',$shopData);
				$price = Cart::getTotalPrice();
				View::with('price',$price);
			}else{
				View::with('shopData',[]);
				View::with('price',0);
			}
	
		}

//		获取用户的收获地址
		$addressModel = new \Home\Model\Address;
		$addressData = $addressModel->where("shop_user_uid",$_SESSION['user']['uid'])->get();
//		p($addressData);
//		分配到页面
		View::with('addressData',$addressData);
	    View::make();
	}
	
	

//	提交订单成功
	public function buysuccess(){

		$orderModel = new \Common\Model\Order;
		$orderlistModel = new \Common\Model\Orderlist;
		$shoplisModel = new \Common\Model\Shoplis;
		if(IS_POST){
			$did = Q('post.addressid');
			if(!$did){
				View::error('请填写收货地址');
			}
//			商品数据
			$list = Q('post.id');
			$shopData = [];
			$hpid = [];
			foreach ($_SESSION['cart']['goods'] as $k => $v) {
				foreach ($list as $value) {
					if($value==$k){
						$shopData[$k] = $v;
						$hpid[$k] = $v;
					}
				}
			}
//			获取类型
			$price = 0;
			foreach ($shopData as $k => $v) {
				$price = $price + $v['total'];
			}
//			第一张表
			$addressModel = new \Home\Model\Address;
			
			$addressData = $addressModel->where("did=$did")->find();
//			p($addressData);
//			订单表数据
			$_POST = [
				'consignee' => $addressData['name'],
				'address' => $addressData['region'] . ',' . $addressData['address'],
				'mobile' => $addressData['telephone'],
				'total' =>$price,
				'remark'=>Q('post.remark'),
				
				'explain' => Q('post.remark'),
			];
			$oid = $orderModel->store();
			
			foreach ($hpid as $key => $value) {
				$_POST['subtotal'] = $value['total'];
				$_POST['glid'] = $value['options']['hp'];
				$_POST['glnumber'] = $shoplisModel
								->where("combine='{$value['options']['hp']}' and shop_lists_gid='{$value['id']}'")
								->pluck('number');
				$_POST['shop_lists_gid'] = $value['id'];
				$_POST['shop_order_oid'] = $oid;
				$_POST['quantity'] = $value['num'];
				$orderlistModel->store();
			}
			foreach ($list as $k => $v) {
				unset($_SESSION['cart']['goods'][$v]);
			}
			go(__ROOT__ . '/buysuccess_' . $oid . '.html');
		}
		if(isset($_GET['oid'])){
			$oid = Q('get.oid');
			$shopData = $orderModel->join("order_list",'shop_order_oid','=','oid')
					   ->where("oid={$oid}")
					   ->get();

			foreach ($shopData as $k => $v) {
//				压入商品 数据
				$shopData[$k]['shop'] = $this->ShoplistModel->where("gid = {$v['shop_lists_gid']}")->find();
//				压入货号
				$shopData[$k]['glid'] = explode(',', $shopData[$k]['glid']);
				foreach ($shopData[$k]['glid'] as $key => $value) {
					$shopData[$k]['glid'][$key] = $this->attrModel->where("gtid={$value}")->find();
					$shopData[$k]['glid'][$key]['top'] = $this->ShoptypeattrModel
																	->where("taid={$shopData[$k]['glid'][$key]['shop_type_attr_taid']}")
																	->pluck('taname');
				}
			}
			// p($shopData);
//			exit;
			View::with('shopData',$shopData);
			View::make();
		}
	    
	}	

//	一键购删除用户不要的商品
	public function indexdel(){
		$session = Q('post.session');
	    unset($_SESSION['cart']['goods'][$session]);
		$price = Cart::getTotalPrice();
		echo $price;
		exit;
	}
	
//	存入session
	public function session(){
//	    p(Q('post.'));
		$data = [
			'id' => Q('post.gid'),
			'name' => Q('post.title'),
			'num' => Q('post.num'),
			'options'=>[
				'hp'=>Q('post.zh'),
				'picimg'=>Q('post.img')
			],
			'price' => Q('post.prines')
		];
//		$_SESSION['cart'] = array();
//		Cart::flush();
		Cart::add($data); // 添加到购物车 
//		p($_SESSION);
		echo 1;
	}
	
	
	
	
	
	

	
//	购物车页面
	public function carindex(){
		if(isset($_SESSION['cart'])){
			$shopData = $_SESSION['cart']['goods'];
	//		获取类型
			foreach ($shopData as $k => $v) {
				$shopData[$k]['options']['hp'] = explode(',', $shopData[$k]['options']['hp']);
				foreach ($shopData[$k]['options']['hp'] as $key => $value) {
					$shopData[$k]['options']['hp'][$key] = $this->attrModel->where("gtid={$value}")->find();
					$shopData[$k]['options']['hp'][$key]['top'] = $this->ShoptypeattrModel
																	->where("taid={$shopData[$k]['options']['hp'][$key]['shop_type_attr_taid']}")
																	->pluck('taname');
				}
			}
	//		p($shopData);
			View::with('shopData',$shopData);
			$price = Cart::getTotalPrice();
	//		echo $price;
			View::with('price',$price);
		}else{
			View::with('shopData',[]);
		}

	    View::make();
	}
	
//	改变session中商品的值(增加)
	public function change(){
	    $session = Q('post.session');
		$data = [
			'sid' => $session,
			'num' => $_SESSION['cart']['goods'][$session]['num'] + 1
		];
		Cart::update($data);
//		p($_SESSION['cart']['goods'][$session]);
		echo json_encode($_SESSION['cart']['goods'][$session]);
	}
//	改变session中商品的值(减少)
	public function jianchange(){
	    $session = Q('post.session');
//		p($_SESSION['cart']['goods'][$session]);
		if($_SESSION['cart']['goods'][$session]['num']>1){
			$data = [
				'sid' => $session,
				'num' => $_SESSION['cart']['goods'][$session]['num'] - 1
			];
			Cart::update($data);
			echo json_encode($_SESSION['cart']['goods'][$session]);
		}
		
	}
	
	
}