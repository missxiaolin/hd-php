<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>关注的商品</title>
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
				<div class="shop_follow">
					<div class="top">
						关注的商品
					</div>
					<ul class="shop_item">
						<li>
							<div class="p_img">
								<a href="">
									<img src="./Public/index/images/shop/14.jpg"/>
								</a>
							</div>
							<div class="p_name">
								<input type="checkbox" name="" id="" value="" />
								<a href="">惠普（HP）暗影精灵II代 15.6英寸游戏笔记本（i5-6300HQ 8G 128SSD+1T GTX965M 4G GDDR5 IPS屏 FHD）</a>
							</div>
							<div class="p_price">
								<strong>
									6999.00
								</strong>
							</div>
							<div class="p_comments">
								<span class="c_txt"><a href="">16044人评价</a></span>
								<span class="c_perc">好评度95%</span>
							</div>
							<div class="p_opbtns">
								<a href="">加入购物车</a>
								<a href="">取消关注</a>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		
		
		{{include file="../Common/footer"}}
		
		
		
		
	</body>
</html>
