<?php namespace Home\Controller; 

//添加商品品牌
class InfoController extends CommonController{
	
	public function __auto(){
	    
	}
	
//	个人中心
	public function index(){
		$uid = $_SESSION['user']['uid'];
		$infoModel = new \Home\Model\Userinfo;
		$userModel = new \Home\Model\User;
//		echo $uid;
//		检测是否post发送过来
		if(IS_POST){
			if(count(Q('post.birthday')) != 3){
				View::error('生日格式不正确');
			}
			if(!$infoModel->edit($uid)) View::error($infoModel->getError());
			$userphoneData = array(
				'cellphone'=>Q('post.cellphone'),
				'telphone'=>Q('post.telphone'),
				'username'=>Q('post.username')
			);
//			p($userphoneData);exit;
			$userModel->where("uid",$uid)->save($userphoneData);
			$_SESSION['user']['username'] = Q('post.username');
			View::success('保存成功',__ROOT__ . '/my.html');
		}
//		获取原来数据
		$oldData = $userModel
				->join('user_info','uid','=','shop_user_uid')
				->where('uid',$uid)
				->find();
		$oldData['birthday'] = explode('-', $oldData['birthday']);
		
		// p($oldData);
		// exit;
		if(!empty($oldData['user_thum'])){
			$img = pathinfo($oldData['user_thum']);
			// echo "string";
			$oldData['user_thum'] = str_replace(".{$img['extension']}", "_user.{$img['extension']}", $oldData['user_thum']);
		}
		
//		p($oldData);
		View::with('oldData',$oldData);
	    View::make();
	}
	
//	订单中心
	public function order(){
		$orderModel = new \Common\Model\Order;
		$attrModel = new \Common\Model\Shoplistattr;
		$ShoptypeattrModel = new \Common\Model\Shopattr;
		$orderlistModel = new \Common\Model\Orderlist;
		$ShoplistModel = new \Common\Model\Shoplist;
		$uid = $_SESSION['user']['uid'];
		$orderData = $orderModel
					->where("shop_user_uid={$uid}")
					->orderBy("time","DESC")
					->get();
		if($orderData){
			// 压入商品
			foreach ($orderData as $k => $v) {
				$orderData[$k]['shop'] = $orderlistModel->where("shop_order_oid={$v['oid']}")->get();

				foreach ($orderData[$k]['shop'] as $key => $value) {
					// 压入该商品
					$orderData[$k]['shop'][$key]['shops'] = $ShoplistModel->where("gid={$value['shop_lists_gid']}")->find();
					// 列表图转换格式
					$img = pathinfo($orderData[$k]['shop'][$key]['shops']['pic']);
					$orderData[$k]['shop'][$key]['shops']['pic'] = str_replace(".{$img['extension']}", "_list.{$img['extension']}", $orderData[$k]['shop'][$key]['shops']['pic']);
					// 先把规格变数组
					$orderData[$k]['shop'][$key]['glid'] = explode(',',$orderData[$k]['shop'][$key]['glid']);
					// 找出规格
					foreach ($orderData[$k]['shop'][$key]['glid'] as $h => $hv) {
						$orderData[$k]['shop'][$key]['glid'][$h] = $attrModel->where("gtid={$hv}")->find();
						$orderData[$k]['shop'][$key]['glid'][$h]['top'] = $ShoptypeattrModel
																		->where("taid={$orderData[$k]['shop'][$key]['glid'][$h]['shop_type_attr_taid']}")
																		->pluck('taname');
					}
				}
			}
			// 分配到模板
			View::with('orderData',$orderData);
		}else{
			View::with('orderData',[]);
		}
		
		
		// p($orderData);
	    View::make();
	}
	
	// 结算价格
	public function vipabc(){
		if(IS_POST){
			$uid = $_SESSION['user']['uid'];
			$userModel = new \Home\Model\User;
			$password = Q('post.password','','md5');
			$userData = $userModel->where("uid={$uid} and password='{$password}'")->find();
			if(!$userData){
				View::error('密码不正确');
			}
			$oid = Q('get.oid');
			$orderModel = new \Common\Model\Order;
			$price = $orderModel->where("oid={$oid}")->pluck('total');
			$money = $userData['money'] - $price;
			if($money<0){
				View::error('余额不足，请先充值');
			}
			$userModel->where("uid={$uid}")->save(array('money'=>$money));
			$orderModel->where("oid={$oid}")->save(array('status'=>'待发货'));
			View::success('付款成功',__ROOT__ . '/order.html');
		}
		View::make();
	}

	// 确认收货
	public function ensure(){
		$orderModel = new \Common\Model\Order;
		$oid = Q('get.oid',0,'intval');
		$orderModel->where("oid={$oid}")->save(array('status'=>'已完成'));
		View::success('确认收货成功!',__ROOT__ . '/order.html');
	}

	// 商品评价
	public function assess(){
		$gid = Q('get.gid',0,'intval');
		// $ShoplistModel = new \Common\Model\Shoplist;//获得商品数据
		$remarkModel = new \Common\Model\Remark;
		if(IS_POST){
			if(!$remarkModel->store($gid )) View::error($remarkModel->getError());
			View::success('评论成功！',__ROOT__.'/order.html');
		}
		View::make();
	}




//	关注的商品
	public function follow(){
		
	    View::make();
	}
	
//	收货地址
	public function address(){
		$addressModel = new \Home\Model\Address;
		$addressData = $addressModel->where("shop_user_uid",$_SESSION['user']['uid'])->get();
//		p($addressData);
		View::with('addressData',$addressData);
	    View::make();
	}
	
//	添加地址
	public function add(){
//		p(Q('post.'));exit;
		$addressModel = new \Home\Model\Address;
		$did = $addressModel->adds();
		$_POST['did'] = $did;
//		p(Q('post.'));
		$_POST['region'] = implode(',', Q('post.region'));
		echo json_encode($_POST);
		exit;
	}
	
//	修改地址
	public function edit(){
		$addressModel = new \Home\Model\Address;
		$addressModel->edit();
//		p(Q('post.'));
//		exit;
		$did = Q('post.did');
//		echo $did;exit;
	    $addressData = $addressModel->where("did",$did)->find();
	    echo json_encode($addressData);
		exit;
	}
		
//	删除地址
	public function deladdress(){
		$addressModel = new \Home\Model\Address;
		$did = Q('post.did');
	    $addressModel->where("did",$did)->delete();
		echo 1;
		exit;
	}
	
//	修改的原数据
	public function oldedit(){
		$addressModel = new \Home\Model\Address;
		$did = Q('post.did');
	    $addressData = $addressModel->where("did",$did)->find();
		$addressData['region'] = explode(',', $addressData['region']);
//		p($addressData);
		echo json_encode($addressData);
		exit;
	    
	}

	

	
	
//	头像
	public function portrait(){
		$infoModel = new \Home\Model\Userinfo;
		$oldImg = $infoModel->where("shop_user_uid={$_SESSION['user']['uid']}")->pluck('user_thum');
		$img = pathinfo($oldImg);
//		p($img);
		if(!empty($oldImg)){
			$oldImg = str_replace(".{$img['extension']}", "_user.{$img['extension']}", $oldImg);
		}
		
//		echo $oldImg;
		View::with('oldImg',$oldImg);
		
		
	    View::make();
	}
	
    //uploadify异步上传（头像 ）
	public function uploadthum()
	{
	    $file = Upload::path('Upload/Content/' . date('y/m'))->make();
		
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {
	    	$infoModel = new \Home\Model\Userinfo;
			$oldImg = $infoModel->where("shop_user_uid={$_SESSION['user']['uid']}")->pluck('user_thum');
			if($oldImg){
				$img = pathinfo($oldImg);
				$oldImg_user = str_replace(".{$img['extension']}", "_user.{$img['extension']}", $oldImg);
				unlink($oldImg);
				unlink($oldImg_user);
			}
	    	$thumb_pic=str_replace(".{$file[0]['ext']}", "_user.{$file[0]['ext']}", $file[0]['path']);
			$thumb_pic=Image::thumb($file[0]['path'],$thumb_pic,100,100,6);

			$infoModel->where("shop_user_uid={$_SESSION['user']['uid']}")->save(array('user_thum'=>$file[0]['path']));
//	    	处理上传图片
	        /** $file内部就是以下这个数组
	            $file = array(
	                0 => array(
		                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
		                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
		                'image' => 1
	            ),
	        );**/
	        //上传成功，把上传好的信息返给js 也就是uploadify
	        $data = $file[0];
	        // 相当于：echo json_encode($data);exit;
	        $this->ajax($data);
	    }
	}
	
	
}