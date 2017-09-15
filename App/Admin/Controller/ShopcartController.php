<?php namespace Admin\Controller; 

//商品订单中心
class ShopcartController extends CommonController{

	public function index(){
		$orderModel = new \Common\Model\Order;
		$attrModel = new \Common\Model\Shoplistattr;
		$ShoptypeattrModel = new \Common\Model\Shopattr;
		$orderlistModel = new \Common\Model\Orderlist;
		$ShoplistModel = new \Common\Model\Shoplist;
		$orderData = $orderModel
					->orderBy("time","DESC")
					->get();
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
		// p($orderData);
		// 分配到模板
		View::with('orderData',$orderData);
		View::make();
	}



	// 发货
	public function delivery(){
		$orderModel = new \Common\Model\Order;
		$oid = Q('get.oid',0,'intval');
		$orderModel->where("oid={$oid}")->save(array('status'=>'已发货'));
		View::success('发货成功!',U('index'));
	}






}




















?>