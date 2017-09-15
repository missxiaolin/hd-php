<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>购物车</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<!--点击增加-->
		<script type="text/javascript">
//			删除用户 不想要的商品
			var shop = "{{U('Shopcart/indexdel')}}";
//			增加减少数量
			var addsum = "{{U('Shopcart/change')}}";
			var jiansum = "{{U('Shopcart/jianchange')}}";
		</script>
		<script src="./Public/index/js/cart.js" type="text/javascript" charset="utf-8"></script>

		
	</head>
	<body>
		<!--顶部区域-->
		{{include file="../Common/header"}}
		<!--顶部区域结束-->
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">购物车</b>
		</div>
		<div id="main" ng-app="app" ng-controller='shop_num'>
			<!--top-->
			<div class="all">
				<div class="midd">
					<em>全部商品</em>
				</div>
			</div>
			<!--内容-->
			<form action="shopcart.html" method="post">
			
				<div class="cart_warp">
					<div class="shop_top">
						<!--全部勾选商品-->
						<div class="one">
							<input type="checkbox" name="" class="che" />
							全选
						</div>
						<div class="two">
							商品
						</div>
						<div class="three"></div>
						<div class="four">单价（元）</div>
						<div class="five">数量</div>
						<div class="six">小计（元）</div>
						<div class="seven">操作</div>
					</div>
					<!--商品购物车列表-->
					<div class="shop_lists">
						{{if value="!empty($shopData)"}}
							{{foreach from="$shopData" key="$k" value="$v"}}
							<div class="shop_list">
								<div class="item_list">
									<div class="cell p_checkbox">
										<input type="checkbox" class="xz" name="id[]" value="{{$k}}" checked="checked" />
									</div>
									<div class="cell p_goods">
										<div class="goods_item">
											<div class="p_img">
												<a href="shop_{{$v['id']}}.html">
													<img src="{{$v['options']['picimg']}}"/>
												</a>
											</div>
											<div class="item_msg">
												<div class="p_name">
													<a href="shop_{{$v['id']}}.html">{{$v['name']}}</a>
												</div>
											</div>
										</div>
										
									</div>
									<div class="cell p_props">
										{{foreach from="$v['options']['hp']" value="$value"}}
											<div class="props_txt">{{$value['top']}}：{{$value['gtvalue']}}</div>
										{{endforeach}}
									</div>
									<div class="cell p_price">
										<strong>{{$v['price']}}.00</strong>
									</div>
									<div class="quantity_form">
										<div class="dd">
											<div class="number">
												<div class="add">
													<a href="javascript:;" class="jian" hd="{{$k}}">-</a>
													<input type="text" name="" class="texts" value="{{$v['num']}}" maxlength="3" />
													<a href="javascript:;" class="jia" hd="{{$k}}">+</a>
												</div>
											</div>
										</div>
									</div>
									<div class="cell p_sum">
										<strong><span>{{$v['total']}}</span>.00</strong>
									</div>
									<div class="cell p_ops">
										<a href="javascript:;" hd="{{$k}}" class="shopdel">删除</a>
									</div>
								</div>
								
								
							</div>
							{{endforeach}}
						{{else}}
							<div class="message">
								<ul>
									<li class="txt">
										购物车空空的哦~，去看看心仪的商品吧~
									</li>
									<li>
										<a href="index.php" class="ftx_05">去购物></a>
									</li>
								</ul>
							</div>
						{{endif}}
					</div>
					<div class="options_box">
						<div class="toolbar_right">
							<div class="btn_area">
								<input type="submit" class="jiesun" name="" value="去结算" />
							</div>
							<div class="price_sum">
								<span class="tex">总价（不含运费）：</span>
								<span class="price sumPrice">
									<em>¥<span>{{if value="isset($price)"}}{{$price}}{{else}}0{{endif}}</span>.00</em>
								</span>
							</div>
						</div>
					</div>
					
				</div>
				
			</form>

		</div>
		<script type="text/javascript">
			$(function(){
				$('#main form').submit(function() {
					if(!$('.xz').length){
						return false;
					}
					var b = 1;
					$('.xz').each(function(){
						// alert(3);
						if($(this).attr('checked') == 'checked'){
							b=1;
							return false;
						}else{
							b=0;
							
						}
					})
					if(b==0){
						return false;
					}
					
				});
				
			})
		</script>
		
		
		
		
		
		
		
		
		
		
		<!--底部区域-->
		{{include file="../Common/footer"}}
	</body>
</html>
