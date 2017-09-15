<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>购买成功</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<!--验证-->
		<script src="./Public/index/js/address.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!--顶部区域-->
		{{include file="../Common/header"}}
		
		<!--顶部区域结束-->
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images//login/login.png"/></a>
			<b class="man">结算页</b>
			<div class="stepflex">
				<div class="stepflex_l">
					<dl>
						<dt>1</dt>
						<dd>1.我的购物车</dd>
					</dl>
					<dl>
						<dt>2</dt>
						<dd>2.填写核对订单信息</dd>
					</dl>
					<dl>
						<dt>3</dt>
						<dd>3.成功提交订单</dd>
					</dl>
				</div>
			</div>
		</div>
		<!--购买成功-->
		<div id="success_wrap">
			<div class="result">
				<!--左边-->
				<div class="success_lcol">
					<div class="success_top">
						<b class="succ_icon"></b>
						<h3 class="ftx_02">提交订单成功！</h3>
					</div>
					{{foreach from="$shopData" value="$v"}}
						<div class="p_item">
							<div class="p_img">
								<a href="shop_{{$v['shop']['gid']}}.html"><img src="{{$v['shop']['pic']}}"/></a>
							</div>
							<div class="p_info">
								<div class="p_name">
									<a href="shop_{{$v['shop']['gid']}}.html">{{$v['shop']['gname']}}</a>
								</div>
								<div class="p_extra">
									{{foreach from="$v['glid']" value="$value"}}
										<span class="txt">{{$value['top']}}：{{$value['gtvalue']}}</span>
									{{endforeach}}
									<span class="txt">/  数量：{{$v['quantity']}}</span>
								</div>
							</div>
						</div>
					{{endforeach}}
				</div>
				<!--右边-->
				<div class="success_btns">
					<div class="clr">
						<a href="vipabc_{{$_GET['oid']}}.html" class="btn_tobback">去结算</a>
						<a href="order.html" class="GotoShoppingCart">
							<b></b>
							查看我的订单
						</a>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		<!--新增收货地址-->
		<div id="max_canva">
			
		</div>
		<form action="javascript:;" method="post" id="from">
			<div id="new_dz">
				<div class="top">
					<span>添加收货地址</span>
					<a href="javascript:;" id="hide"></a>
				</div>
				<div class="middle">
					<div class="item">
						<span class="label">*收货人：</span>
						<div class="fl">
							<input type="text" name="" id="" value="" class="user" />
							<span class="ts">请您填写收货人姓名</span>
						</div>
					</div>
					<div class="item">
						<span class="label">*所在地区：</span>
						<div class="fl">
							<input type="text" name="" id="" value="" />
						</div>
					</div>
					<div class="item">
						<span class="label">*详细地址：</span>
						<div class="fl">
							<input type="text" class="xx ressd" name="" id="" value="" />
							<span class="ts">请您填写收货人详细地址</span>
						</div>
					</div>
					<div class="item">
						<span class="label">*手机号码：</span>
						<span class="label lables">固定号码：</span>
						<div class="fl">
							<input type="text" name="" id="" value="" class="phone" />
							或
							<input type="text" name="" id="" value="" />
							<span class="ts">请您填写收货人手机号码</span>
						</div>
					</div>
					<div class="item">
						<span class="label">邮箱：</span>
						<div class="fl">
							<input type="text" class="xx" name="" id="" value="" />
						</div>
					</div>
					<div class="item">
						<span class="label">地址别名：</span>
						<div class="fl">
							<input type="text" name="" id="" value="" class="alias" />
							<span class="family">建议填写常用名称</span>
							<a href="javascript:;" class="dj" title="家里">家里</a>
							<a href="javascript:;" class="dj" title="父母家">父母家</a>
							<a href="javascript:;" class="dj" title="公司">公司</a>
						</div>
					</div>
					<div class="item">
						<span class="label">：</span>
						<div class="fl">
							<input type="submit" name="" class="bc" id="" value="保存收货地址" />
						</div>
					</div>
				</div>
			</div>
		</form>

		
		
		
		
		
		<!--底部区域-->
		{{include file="../Common/footer"}}
	</body>
</html>
