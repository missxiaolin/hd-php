<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title>订单中心</title>
    <link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
	<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
</head>
<body>
    <div id="basicdata">
		<div class="downer">
			<div class="top">
				<ul class="mod_min">
					<li class="actibe"><a href="">全部订单</a></li>
				</ul>
			</div>
			<div class="tables">
				<div style="float:left;height:40px;line-height:40px;text-align:center;width:80px;">收货人</div>
				<div class="cell dd">订单号</div>
				<div class="cell one">宝贝</div>
				<div class="cell five">实际付款</div>
				<div class="cell six" style="width:150px;">地址</div>
				<div class="cell seven">交易操作</div>
			</div>

			<div class="shop_lists">
				{{foreach from="$orderData" value="$v"}}
					<div class="shop_list">
						<div style="float:left;height:40px;line-height:40px;text-align:center;width:80px;">
							{{$v['consignee']}}
						</div>
						<div class="cell dd" style="float:left;">
							{{$v['number']}}
						</div>
						<div style="float:left;min-height:125px;">
							{{foreach from="$v['shop']" value="$shop"}}
								<div class="cell one">
									<div class="goods_item">
										<div class="p_img">
											<img src="{{$shop['shops']['pic']}}"/>
										</div>
										<div class="item_msg">
											<div class="p_name">
												{{$shop['shops']['gname']}}
											</div>
											<div>
												数量：{{$shop['quantity']}}
											</div>
										</div>
									</div>
									<div class="cell p_props">
										{{foreach from="$shop['glid']" value="$h"}}
											<div class="props_txt">{{$h['top']}}：{{$h['gtvalue']}}</div>
										{{endforeach}}
									</div>
								</div>
							{{endforeach}}
						</div>
						<div class="cell five">
							<strong>{{$v['total']}}.00</strong>
						</div>
						<div class="cell six" style="width:150px;">
							<div>{{$v['address']}}</div>
						</div>
						<div class="cell seven" style="text-align:center;">
							{{if value="$v['status'] eq '待发货'"}}
								<a href="{{U('Shopcart/delivery',array('oid'=>$v['oid']))}}">发货</a>
							{{elseif value="$v['status'] eq '未付款'"}}
								<span>未付款</span>
							{{elseif value="$v['status'] eq '已发货'"}}
								<span>已发货</span>
							{{else}}
								<span>完成订单</span>
							{{endif}}
						</div>
					</div>
				{{endforeach}}
			</div>
		</div>
	</div>
</body>
</html>