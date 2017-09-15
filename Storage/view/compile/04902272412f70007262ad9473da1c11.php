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
			var shop = "<?php echo U('Shopcart/indexdel')?>";
//			增加减少数量
			var addsum = "<?php echo U('Shopcart/change')?>";
			var jiansum = "<?php echo U('Shopcart/jianchange')?>";
		</script>
		<script src="./Public/index/js/cart.js" type="text/javascript" charset="utf-8"></script>

		
	</head>
	<body>
		<!--顶部区域-->
				<!--顶部区域-->
		<div id="top">
			<div class="top_middle">
				<div class="top_right">
					<ul>
						<li>
							
							                
								<a href="my.html"><span style="margin-right: 5px;">admin9999</span>
								<a href="out.html" style="margin-right: 10px;">退出</a>
														</li>
						<li class="line"></li>
						<li>
							<a href="my.html" class="dd">个人中心</a>
						</li>
						<li class="line"></li>
						<li>
							<a href="order.html" class="dd">我的订单</a>
						</li>
						<li class="line"></li>
						<!-- <li>
							<a href="http://localhost/shop/index.php?m=Home&c=Info&a=follow" class="dd">我的收藏</a>
						</li> -->
						<!-- <li class="line"></li> -->
						<li>
							<p class="gy">
								<a href="javascript:;" class="gb">联系我<i class="iconfont">&#xe652;</i></a>
							</p>
							<div class="box gyjd">
								<img src="./Public/index/images/332.jpg"/>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		
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
						<?php if(!empty($shopData)){?>
                
							<?php foreach ($shopData as $k=>$v){?>
							<div class="shop_list">
								<div class="item_list">
									<div class="cell p_checkbox">
										<input type="checkbox" class="xz" name="id[]" value="<?php echo $k?>" checked="checked" />
									</div>
									<div class="cell p_goods">
										<div class="goods_item">
											<div class="p_img">
												<a href="shop_<?php echo $v['id']?>.html">
													<img src="<?php echo $v['options']['picimg']?>"/>
												</a>
											</div>
											<div class="item_msg">
												<div class="p_name">
													<a href="shop_<?php echo $v['id']?>.html"><?php echo $v['name']?></a>
												</div>
											</div>
										</div>
										
									</div>
									<div class="cell p_props">
										<?php foreach ($v['options']['hp'] as $value){?>
											<div class="props_txt"><?php echo $value['top']?>：<?php echo $value['gtvalue']?></div>
										<?php }?>
									</div>
									<div class="cell p_price">
										<strong><?php echo $v['price']?>.00</strong>
									</div>
									<div class="quantity_form">
										<div class="dd">
											<div class="number">
												<div class="add">
													<a href="javascript:;" class="jian" hd="<?php echo $k?>">-</a>
													<input type="text" name="" class="texts" value="<?php echo $v['num']?>" maxlength="3" />
													<a href="javascript:;" class="jia" hd="<?php echo $k?>">+</a>
												</div>
											</div>
										</div>
									</div>
									<div class="cell p_sum">
										<strong><span><?php echo $v['total']?></span>.00</strong>
									</div>
									<div class="cell p_ops">
										<a href="javascript:;" hd="<?php echo $k?>" class="shopdel">删除</a>
									</div>
								</div>
								
								
							</div>
							<?php }?>
						<?php }else{?>
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
						
               <?php }?>
					</div>
					<div class="options_box">
						<div class="toolbar_right">
							<div class="btn_area">
								<input type="submit" class="jiesun" name="" value="去结算" />
							</div>
							<div class="price_sum">
								<span class="tex">总价（不含运费）：</span>
								<span class="price sumPrice">
									<em>¥<span><?php if(isset($price)){?>
                <?php echo $price?><?php }else{?>0
               <?php }?></span>.00</em>
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
		

		<!--底部区域-->
		<div id="footer">
			<div class="slogen">
				<div class="img">
					<img src="./Public/index/images/16.png"/>
					<img src="./Public/index/images/17.png"/>
					<img src="./Public/index/images/18.png"/>
					<img src="./Public/index/images/19.png" class="last"/>
				</div>
			</div>
			
			<div class="jd">
				<span class="fist">京ICP备12048441号-3</span>
				|
				<span>Copyright © 2010-2015 houdunwang.com All Rights Reserved</span>
			</div>
			<div class="jd jd_1">
				                
																	<a href="http://www.baidu.com" target="_blank">百度</a>
											                
						|
						
               						<a href="http://www.sina.com.cn/" target="_blank">新浪</a>
									
               			</div>
			<div class="jd jd_2">
				<span>联系邮箱：462441355@qq.com</span>
				<span>联系电话：15728048627</span>
			</div>
			<div class="img">
				<img src="./Public/index/images/194.png"/>
				<img src="./Public/index/images/195.png"/>
				<img src="./Public/index/images/211.jpg"/>
				<img src="./Public/index/images/212.jpg"/>
				<img src="./Public/index/images/214.jpg"/>
			</div>
		</div>
	</body>
</html>
