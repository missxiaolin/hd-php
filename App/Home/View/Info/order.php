<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>订单中心</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		{{include file="../Common/header"}}
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">个人中心</b>
		</div>
		<div id="basicdata">
			<div class="upper">
				{{include file="../Common/infoleft"}}
			</div>
			<div class="downer">
				<div class="top">
					<ul class="mod_min">
						<li class="actibe"><a href="">全部订单</a></li>
						<!-- <li><a href="">待付款</a></li>
						<li><a href="">待收货</a></li>
						<li><a href="">待评价</a></li> -->
					</ul>
				</div>
				<div class="tables">
					<div class="cell dd">订单号</div>
					<div class="cell one">宝贝</div>
					<div class="cell five">实际付款</div>
					<div class="cell six">交易状态</div>
					<div class="cell seven">交易操作</div>
				</div>

				<div class="shop_lists">
					{{foreach from="$orderData" value="$v"}}
						<div class="shop_list">
							<div class="cell dd" style="float:left;">
								{{$v['number']}}
							</div>
							<div style="float:left;min-height:125px;">
								{{foreach from="$v['shop']" value="$shop"}}
									<div class="cell one">
										<div class="goods_item">
											<div class="p_img">
												<a href="shop_{{$shop['shops']['gid']}}.html">
													<img src="{{$shop['shops']['pic']}}"/>
												</a>
											</div>
											<div class="item_msg">
												<div class="p_name">
													<a href="shop_{{$shop['shops']['gid']}}.html">{{$shop['shops']['gname']}}</a>
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
							<div class="cell six">
								<a href="javascript:;">{{$v['status']}}</a>
								<!-- <a href="">订单详情</a>
								<a href="">查看物流</a> -->
							</div>
							<div class="cell seven">
								<!-- <a href="">评价</a> -->
								{{if value="$v['status'] eq '未付款'"}}
									<a href="vipabc_{{$v['oid']}}.html">去结算</a>
								{{elseif value="$v['status'] eq '待发货'"}}
									<a href="javascript:;">待发货</a>
								{{elseif value="$v['status'] eq '已发货'"}}
									<a href="ensure_{{$v['oid']}}.html">确认收货</a>
								{{else}}
									{{foreach from="$v['shop']" value="$shops"}}
									<a href="assess_{{$shops['shop_lists_gid']}}.html" style="height:110px;display:block;">我要评价</a>
									{{endforeach}}
								{{endif}}
							</div>
						</div>
					{{endforeach}}
				</div>
			</div>
		</div>
		{{include file="../Common/footer"}}
		
	</body>
</html>
