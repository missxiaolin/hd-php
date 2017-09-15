<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>个人用户注册</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
//			检测用户是否存在地址
			var userurl = "<?php echo U('Register/user')?>";
//			验证码
			var codeurl = "<?php echo U('Register/codes')?>";
		</script>
		<script src="./Public/index/js/register.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--注册顶部-->
		<div id="header">
			<div class="middle">
				<a href="index.html" class="log"><img src="./Public/index/images/login/login.png"/></a>
				<div class="logo_title">
					欢迎注册
				</div>
				<div class="have_account">
					已有账号
					<a href="login.html">请登录</a>
				</div>
			</div>
		</div>
		<!--注册开始-->
		<div id="container">
			<div class="left">
				<form action="register.html" method="post" id="from">
					<div class="bord">
						<div class="form_item">
							<label>用&nbsp;&nbsp;&nbsp;户&nbsp;&nbsp;&nbsp;名</label>
							<input type="text" name="account" id="username" placeholder="您的账户名和登录名" />
							<i class="i_status"></i>
						</div>
						<div class="input_tip">
							<i></i>
							<span></span>
						</div>
					</div>
					<div class="bord">
						<div class="form_item">
							<label>设&nbsp;置&nbsp;密&nbsp;码</label>
							<input type="password" name="password" id="password" placeholder="建议至少使用两种字符组合" />
							<i class="i_status"></i>
						</div>
						<div class="input_tip">
							<i></i>
							<span></span>
						</div>
					</div>
					<div class="bord">
						<div class="form_item">
							<label>确&nbsp;认&nbsp;密&nbsp;码</label>
							<input type="password" name="oldpassword" id="oldpassword" placeholder="请再次输入密码" />
							<i class="i_status"></i>
						</div>
						<div class="input_tip">
							<i></i>
							<span></span>
						</div>
					</div>
					<div class="bord">
						<div class="form_item">
							<label>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</label>
							<input type="text" name="email" id="email" placeholder="建议使用常用邮箱" />
							<i class="i_status"></i>
						</div>
						<div class="input_tip">
							<i></i>
							<span></span>
						</div>
					</div>
					
					<!--<div class="orPhone">或<a href="javascript:;">手机验证</a></div>-->
					<!--<div class="form_item">
						<label>中国 + 86</label>
						<input type="text" name="" id="" placeholder="建议使用常用手机" />
						<i class="i_status"></i>
					</div>
					<div class="input_tip">
						<i></i>
						<span>完成验证后,你可以用该手机登录和找回密码</span>
						<div class="orPhone">或<a href="javascript:;">邮箱验证</a></div>
					</div>-->
					<div class="bord">
						<div class="form_item">
							<label>验&nbsp;&nbsp;&nbsp;证&nbsp;&nbsp;&nbsp;码</label>
							<input type="text" name="cold" id="cold" placeholder="请输入验证码" style="display: inline-block;width: 176px;"/>
							<img src="<?php echo U('Register/code')?>" onclick="this.src='<?php echo U('Register/code')?>&i='+Math.random()" style="margin-top: 4px;" />
							<!--验证码-->
						</div>
						<div class="input_tip">
							<i></i>
							<span></span>
						</div>
					</div>
					
					<!--<div class="form_item">
						<label>手机验证码</label>
						<input class="shouji" type="text" name="" id="" placeholder="请输入手机验证码" />
						<input type="button" class="hq" name="" id="" value="获取验证码" />
					</div>-->
					<div class="input_tip">
						
					</div>
					
					<input type="submit" class="zc" value="立即注册"/>
				</form>
			</div>
			<div class="right">
				<div class="phone"></div>
				<div class="enter">
					<!--<a href="<?php echo U('Register/qe_index')?>"><b></b>企业用户注册</a>-->
				</div>
			</div>
		</div>
		<!--底部-->
		<div id="login_floor">
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
			<div class="bq"><?php echo C('webSet.COPY_INFO')?></div>
		</div>
	</body>
</html>
