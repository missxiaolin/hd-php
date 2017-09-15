<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
//			验证用户信息
			user = "{{U('Login/validate')}}";
		</script>
		<script src="./Public/index/js/Login.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b><img src="./Public/index/images/login/l-icon.png"/></b>
		</div>
		<div id="content">
			<div class="middle">
				<div class="login">
					<div class="login_form">
						<div class="mt">
							<h1>京东会员</h1>
							<a href="register.html"><b></b>立即注册</a>
						</div>
						<div class="msg_wrap">
							<b></b>公共场所不建议自动登录，以防账号丢失
						</div>
						<form action="login.html" method="post" id="from">
							<div class="item_fore1">
								<b></b>
								<input type="text" name="account" id="username" placeholder="用户名" />
							</div>
							<div class="item_fore1">
								<b class="fore_2"></b>
								<input type="password" name="password" id="password" placeholder="密码" />
							</div>
							<div class="safe">
								<!--<span>
									<input type="checkbox" name="" id="" value="" />自动登陆
								</span>-->
								<!-- <a href="">忘记密码?</a> -->
							</div>
							<input type="button" class="dl" value="登录" />
						</form>
						<p class="use">使用合作网站账号登录京东：</p>
						 <p class="gj">
							<a href="">QQ</a>
							<!--<span>|</span>-->
							<!--<a href="">微信</a>-->
						</p> 
					</div>
				</div>
			</div>
		</div>
		<div id="login_floor">
			<div class="ar">
				<a href="javascript:;"><b></b>欢迎登陆林林商城！</a>
			</div>
			<!--<div class="links">
				<a href="">关于我们</a>
				|
				<a href="">联系我们</a>
				|
				<a href="">商家入驻</a>
				|
				<a href="">营销中心</a>
				|
				<a href="">手机京东</a>
				|
				<a href="">友情链接</a>
				|
				<a href="">销售联盟</a>
				|
				<a href="">京东社区</a>
				|
				<a href="">京东公益</a>
				|
				<a href="">English Site</a>
				|
				<a href="">Contact Us</a>
			</div>-->
			<div class="bq">{{C('webSet.COPY_INFO')}}</div>
		</div>
	</body>
</html>
