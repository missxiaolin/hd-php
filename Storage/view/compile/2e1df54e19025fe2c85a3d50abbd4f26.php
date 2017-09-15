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
				<!--顶部区域-->
		<div id="top">
			<div class="top_middle">
				<div class="top_right">
					<ul>
						<li>
							
							                
								<a href="my.html"><span style="margin-right: 5px;">admin888</span>
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
		
		
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">个人中心</b>
		</div>
		<div id="basicdata">
			<div class="upper">
						<dl>
			<dt>订单中心</dt>
			<dd                 class="active"
               ><a href="order.html">已买到宝贝</a></dd>
			<!--<dd><a href="">退货管理</a></dd>-->
		</dl>
		<!-- <dl> -->
			<!-- <dt>关注中心</dt> -->
			<!-- <dd ><a href="http://localhost/shop/index.php?m=Home&c=Info&a=follow">关注的商品</a></dd> -->
			<!--<dd><a href="">关注的店铺</a></dd>-->
		<!-- </dl> -->
		<dl>
			<dt>设置</dt>
			<dd ><a href="my.html">个人信息</a></dd>
			<dd ><a href="address.html">收货地址</a></dd>
			<!--<dd><a href="">我的金豆</a></dd>-->
		</dl>
		<!--<dl>
			<dt>我是商家</dt>
			<dd><a href="">商家中心</a></dd>
		</dl>-->
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
					<?php foreach ($orderData as $v){?>
						<div class="shop_list">
							<div class="cell dd" style="float:left;">
								<?php echo $v['number']?>
							</div>
							<div style="float:left;min-height:125px;">
								<?php foreach ($v['shop'] as $shop){?>
									<div class="cell one">
										<div class="goods_item">
											<div class="p_img">
												<a href="shop_<?php echo $shop['shops']['gid']?>.html">
													<img src="<?php echo $shop['shops']['pic']?>"/>
												</a>
											</div>
											<div class="item_msg">
												<div class="p_name">
													<a href="shop_<?php echo $shop['shops']['gid']?>.html"><?php echo $shop['shops']['gname']?></a>
												</div>
												<div>
													数量：<?php echo $shop['quantity']?>
												</div>
											</div>
										</div>
										<div class="cell p_props">
											<?php foreach ($shop['glid'] as $h){?>
												<div class="props_txt"><?php echo $h['top']?>：<?php echo $h['gtvalue']?></div>
											<?php }?>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="cell five">
								<strong><?php echo $v['total']?>.00</strong>
							</div>
							<div class="cell six">
								<a href="javascript:;"><?php echo $v['status']?></a>
								<!-- <a href="">订单详情</a>
								<a href="">查看物流</a> -->
							</div>
							<div class="cell seven">
								<!-- <a href="">评价</a> -->
								<?php if($v['status']=='未付款'){?>
                
									<a href="vipabc_<?php echo $v['oid']?>.html">去结算</a>
								<?php }else if($v['status']=='待发货'){?>
									<a href="javascript:;">待发货</a>
								<?php }else if($v['status']=='已发货'){?>
									<a href="ensure_<?php echo $v['oid']?>.html">确认收货</a>
								<?php }else{?>
									<?php foreach ($v['shop'] as $shops){?>
									<a href="assess_<?php echo $shops['shop_lists_gid']?>.html" style="height:110px;display:block;">我要评价</a>
									<?php }?>
								
               <?php }?>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
		

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
