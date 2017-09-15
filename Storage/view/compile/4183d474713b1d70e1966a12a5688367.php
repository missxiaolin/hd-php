<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>收货地址</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/area.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				//初始化方法
				area.init('area');
				//修改的时候默认被选中效果
				area.selected('0','0','0');
				
			})
		</script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
//			添加地址
			var add = "<?php echo U('Info/add')?>";
//			删除地址
			var delurl = "<?php echo U('Info/deladdress')?>";
//			修改地址原 数据
			var oldedit = "<?php echo U('Info/oldedit')?>";
//			修改地址
			var edit = "<?php echo U('Info/edit')?>";
		</script>
		<script src="./Public/index/js/address.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
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
		
		
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">个人中心</b>
		</div>
		<div id="basicdata">
			<div class="upper">
						<dl>
			<dt>订单中心</dt>
			<dd ><a href="order.html">已买到宝贝</a></dd>
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
			<dd                 class="active"
               ><a href="address.html">收货地址</a></dd>
			<!--<dd><a href="">我的金豆</a></dd>-->
		</dl>
		<!--<dl>
			<dt>我是商家</dt>
			<dd><a href="">商家中心</a></dd>
		</dl>-->
			</div>
			<div class="downer">
				<!--收货地址-->
				<div class="new_fo">
					<div class="zj">
						<a href="javascript:;" id="show">新增收货地址</a>
						<span class="z">最多可创建<span>20</span>个</span>
					</div>
					<?php foreach ($addressData as $v){?>
					<div class="new_dz">
						<div>
							<h3><?php echo $v['name']?></h3>
							<div class="smc">
								<div class="item_lcol">
									<div class="item">
										<span>收货人：</span>
										<div class="fl"><?php echo $v['name']?></div>
									</div>
									<div class="item">
										<span>所在地区：</span>
										<div class="fl"><?php echo $v['region']?></div>
									</div>
									<div class="item">
										<span>地址：</span>
										<div class="fl"><?php echo $v['address']?></div>
									</div>
									<div class="item">
										<span>手机：</span>
										<div class="fl"><?php echo $v['telephone']?></div>
									</div>
									<?php if(isset($v['cellphone'])){?>
                
									<div class="item">
										<span>固定电话：</span>
										<div class="fl"><?php echo $v['cellphone']?></div>
									</div>
									
               <?php }?>
									<?php if(isset($v['emil'])){?>
                
									<div class="item">
										<span>电子邮箱：</span>
										<div class="fl"><?php echo $v['emil']?></div>
									</div>
									
               <?php }?>
								</div>
								<div class="item_rcol">
									<div class="dd">
										<a href="javascript:;" class="bjdz" bj="<?php echo $v['did']?>">编辑</a>
										<a href="javascript:;" class="del" bj="<?php echo $v['did']?>">删除</a>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
		
		
		
		<!--新增收货地址-->
		<div id="max_canva">
			
		</div>
		<form action="javascript:;" method="post" id="from">
			<div id="new_dz" hd="1">
				<div class="top">
					<span></span>
					<a href="javascript:;" id="hide"></a>
				</div>
				<div class="middle">
					<div class="item">
						<span class="label">*收货人：</span>
						<div class="fl">
							<input type="text" name="name" id="" value="" class="user" />
							<span class="ts">请您填写收货人姓名</span>
						</div>
					</div>
					<div class="item">
						<span class="label">*所在地区：</span>
						<div class="fl">
							<select name="region[]" id="area1" class="xialakuang">
		
							</select>
							<select name="region[]" id="area2" class="xialakuang">
								
							</select>
							<select name="region[]" id="area3" class="xialakuang">
								
							</select>
							<span style="display:inline-block;color:red;" class="city"></span>
						</div>

					</div>
					<div class="item">
						<span class="label">*详细地址：</span>
						<div class="fl">
							<input type="text" class="xx ressd" name="address" id="" value="" />
							<span class="ts">请您填写收货人详细地址</span>
						</div>
					</div>
					<div class="item">
						<span class="label">*手机号码：</span>
						<span class="label lables">固定号码：</span>
						<div class="fl">
							<input type="text" name="telephone" id="" value="" class="phone" />
							或
							<input type="text" name="cellphone" id="" value="" />
							<span class="ts">请您填写收货人手机号码</span>
						</div>
					</div>
					<div class="item">
						<span class="label">邮箱：</span>
						<div class="fl">
							<input type="text" class="xx" name="emil" id="" value="" />
						</div>
					</div>
					<div class="item">
						<span class="label">地址别名：</span>
						<div class="fl">
							<input type="text" name="addressname" id="" value="" class="alias" />
							<span class="family">建议填写常用名称</span>
							<a href="javascript:;" class="dj" title="家里">家里</a>
							<a href="javascript:;" class="dj" title="父母家">父母家</a>
							<a href="javascript:;" class="dj" title="公司">公司</a>
						</div>
					</div>
					<div class="item">
						<span class="label">：</span>
						<div class="fl tj">
							<input type="hidden" name="did" class="did" value="" />
							<input type="submit" name="" class="bc" value="保存收货地址" />
						</div>
					</div>
				</div>
			</div>
		</form>

		
		

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
