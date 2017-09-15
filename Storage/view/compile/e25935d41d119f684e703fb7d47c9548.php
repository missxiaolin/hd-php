<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"/>
<title>商城管理系统</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="./Public/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="./Public/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="./Public/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="./Public/admin/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>

<link href="./Public/admin/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="./Public/admin/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>


<link rel="shortcut icon" href="favicon.ico"/>
 <base target="iframe"/>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo U('Index/welcome')?>">
			<img src="./Public/admin/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>


		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="./Public/admin/assets/admin/layout/img/avatar3_small.jpg"/>
					<span class="username username-hide-on-mobile"><?php echo $_SESSION['info']['username']?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="<?php echo U('Index/changePassword')?>">
							<i class="icon-key"></i>修改密码</a>
						</li>
						<li>
							<a href="<?php echo U('Login/out')?>" target="_self">
							<i class="icon-key"></i>退出</a>
						</li>

					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper" style="margin: 10px 0px;">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="start active open">
					<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">后台操作</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('Index/welcome')?>">
							后台欢迎</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-list"></i>
					<span class="title">商品管理</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('Shoptype/add')?>">
							添加类型</a>
						</li>
						<li>
							<a href="<?php echo U('Shoptype/index')?>">
							类型列表</a>
						</li>
						<li>
							<a href="<?php echo U('Shopcate/add')?>">
							添加分类</a>
						</li>
						<li>
							<a href="<?php echo U('Shopcate/index')?>">
							分类列表</a>
						</li>
						<li>
							<a href="<?php echo U('Brand/add')?>">
							添加品牌</a>
						</li>
						<li>
							<a href="<?php echo U('Brand/index')?>">
							品牌列表</a>
						</li>
						<li>
							<a href="<?php echo U('Shoplist/add')?>">
							添加商品</a>
						</li>
						<li>
							<a href="<?php echo U('Shoplist/index')?>">
							商品列表</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">文章管理</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('Arccate/add')?>">
								添加分类
							</a>
						</li>
						<li>
							<a href="<?php echo U('Arccate/index')?>">
								文章分类
							</a>
						</li>
						<li>
							<a href="<?php echo U('Arc/add')?>">
								添加文章
							</a>
						</li>
						<li>
							<a href="<?php echo U('Arc/index')?>">
								文章列表
							</a>
						</li>
						<li>
							<a href="<?php echo U('Arc/ViewRecycle')?>">
								回收站
							</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">站点配置</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('Config/index')?>">
							站点配置</a>
						</li>
						<li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">友情链接</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('Link/add')?>">
							添加友链</a>
						</li>
						<li>
							<a href="<?php echo U('Link/index')?>">
							友链列表</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">订单中心</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('Shopcart/index')?>">
							全部订单</a>
						</li>
						<!-- <li>
							<a href="">
							友链列表</a>
						</li> -->
						
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">系统管理</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo U('User/user')?>">用户中心</a>
						</li>
						<li>
							<a href="<?php echo U('User/Role')?>">添加角色</a>
						</li>
						<li>
							<a href="<?php echo U('User/Power')?>">添加权限</a>
						</li>
					</ul>
				</li>
			</ul>
			
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<iframe src="<?php echo U('Index/welcome')?>" frameborder="0" style="height:100%;width:100%;" name="iframe"></iframe>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2014 &copy; Metronic by keenthemes. <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<script src="./Public/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>


<script src="./Public/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./Public/admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="./Public/admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>

<script src="./Public/admin/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="./Public/admin/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>


<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
  
   
});
</script>
<script type="text/javascript">
	var height = $(document).height();
	$('iframe').height(height + 50);
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>