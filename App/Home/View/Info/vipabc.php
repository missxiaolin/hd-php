<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>订单结算</title>
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
			<b class="man">订单结算</b>
		</div>
		<div id="basicdata">
			<div class="upper">
				{{include file="../Common/infoleft"}}
			</div>
			<div class="downer">
			<div >
				<form action="vipabc_{{$_GET['oid']}}.html" method="post" id="from">
					用户密码：<input type="password" name="password">
					<input type="submit" value="结算订单">


				</form>
			</div>
				
			</div>
		</div>
		{{include file="../Common/footer"}}
		
	</body>
</html>
