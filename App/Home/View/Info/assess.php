<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>商品评价</title>
		<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			.pj form div{
				margin-top: 10px;
			}
			.pj form div input{
				width:200px;
				display: inline-block;
			}
		</style>
	</head>
	<body>
		{{include file="../Common/header"}}
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">商品评价</b>
		</div>
		<div id="basicdata">
			<div class="upper">
				{{include file="../Common/infoleft"}}
			</div>
			<div class="downer">
				<div class="pj">
					<form action="assess_{{$_GET['gid']}}.html" method="post" id="from">
						<div>
							标题：<input type="text" class="form-control" name="title">
						</div>
						<div>
							星级：
							<select class="form-control" style="width:200px;display: inline-block;" name="star">
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							</select>
						</div>
						<div>
							内容：<textarea class="form-control" name="content" rows="3" style="width:400px;display: inline-block;resize:none;"></textarea>
						</div>
						<input type="submit" value="提交评论" class="btn btn-primary" style="margin-top:10px;">
					</form>
				</div>
				
			</div>
		</div>
		{{include file="../Common/footer"}}
		
	</body>
</html>
