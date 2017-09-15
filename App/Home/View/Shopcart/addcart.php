<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>加入购物车</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop_list.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/right.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		
		<!--顶部区域-->
		{{include file="../Common/header"}}
		{{include file="../Common/seach"}}
		<!--加入购物车-->
		<div id="success_wrap">
			<div class="result">
				<!--左边-->
				<div class="success_lcol">
					<div class="success_top">
						<b class="succ_icon"></b>
						<h3 class="ftx_02">商品已成功加入购物车！</h3>
					</div>
					<div class="p_item">
						<div class="p_img">
							{{if value="!empty($typeatrData)"}}
								<a href="shop_{{$shopData['gid']}}.html"><img src="{{$shopData['pic']}}"/></a>
							{{endif}}
						</div>
						<div class="p_info">
							<div class="p_name">
								{{if value="!empty($typeatrData)"}}
									<a href="shop_{{$shopData['gid']}}.html">{{$shopData['gname']}}</a>
								{{endif}}
							</div>
							<div class="p_extra">
								{{if value="!empty($typeatrData)"}}
									{{foreach from="$typeatrData" value="$v"}}
										<span class="txt">{{$v['taname']}}：{{$v['spce']}}</span>
									{{endforeach}}
								{{endif}}
								{{if value="!empty($typeatrData)"}}<span class="txt">/  数量：{{$num}}</span>{{endif}}
							</div>
						</div>
					</div>
				</div>
				<!--右边-->
				<div class="success_btns">
					<div class="clr">
						<a href="index.html" class="btn_tobback">返回首页</a>
						<a href="cart.html" class="GotoShoppingCart">
							<b></b>
							去购物车结算
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<!--底部区域-->
		{{include file="../Common/footer"}}
	</body>
</html>
