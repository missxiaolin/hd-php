<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>订单结算</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
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
		<!--验证-->
		<script type="text/javascript">
//			添加地址
			var add = "{{U('Info/add')}}";
//			删除地址
			var delurl = "{{U('Info/deladdress')}}";
//			修改地址原 数据
			var oldedit = "{{U('Info/oldedit')}}";
//			修改地址
			var edit = "{{U('Info/edit')}}";
//			删除用户 不想要的商品
			var shop = "{{U('Shopcart/indexdel')}}";
		</script>
		<script src="./Public/index/js/zfaddress.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		{{include file="../Common/header"}}
		<!--顶部区域结束-->
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.php"><img src="./Public/index/images/login/login.png"/></a>
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
		<form action="buysuccess.html" method="post" id="froms">
		
			<div id="main">
				<!--top-->
				<div class="checkout_tit">
					 填写并核对订单信息 
				</div>
				<div class="steps">
					<div class="step_tit">
						<h3 style="width:80px;display:inline-block;">收货人信息</h3><span style="color:red;font-weight:700;" class="shop_address" id="shop_address"></span>
						<a href="javascript:;" id="show">新增收货地址</a>
					</div>
					
					<div class="scroll">
						<div class="dz">
							<ul id="dz">
								{{foreach from="$addressData" key="$k" value="$v"}}
									<li {{if value="$k eq 0"}}class="active"{{endif}}>
										
										<input type="radio" class="danxuan" name="addressid" id="{{$v['did']}}" value="{{$v['did']}}" {{if value="$k eq 0"}}checked="checked"{{endif}} />
										<div class="consignee_item">
											<span>{{$v['name']}}</span>
											<i></i>
										</div>
										<div class="addr_detail">
											
											<span>{{$v['name']}}</span>
											<span>{{$v['region']}}</span>
											<span>{{$v['telephone']}}</span>
										</div>
										<div class="op_btns">
											<a href="javascript:;" class="bjdz" bj="{{$v['did']}}">编辑</a>
											<a href="javascript:;" class="del" bj="{{$v['did']}}">删除</a>
										</div>
									</li>
								{{endforeach}}
							</ul>
							<div class="zk">更多地址</div>
						</div>
					</div>
					<div class="step_tit">
						<h3>支付方式</h3>
					</div>
					<div class="scroll">
						<div class="dz">
							<div class="pay">
								<!--<a href="javascript:;" class="actibe">微信支付<i></i></a>-->
								<!--<a href="javascript:;">支付宝<i></i></a>-->
								<a href="javascript:;" class="actibe">在线支付<i></i></a>
							</div>
						</div>
					</div>
					<div class="step_tit">
						<h3>送货清单</h3>
					</div>
					<div class="scroll">
						<div class="dz">
							<div class="bk">
								<div class="left">
									配送方式
									<a href="">
										京东配送
										<i></i>
									</a>
								</div>
								<div class="right">
									<div class="goods_tit">
										<h4>商家：京东自营</h4>
									</div>
									<div class="shop_list">
										{{foreach from="$shopData" key="$k" value="$v"}}
										<div class="ls">
											<div class="p_name">
												<img src="{{$v['options']['picimg']}}"/>
											</div>
											<div class="goods_msg">
												<div class="p_names">
													<a href="shop_{{$v['id']}}.html" target="_blank">{{$v['name']}}</a>
												</div>
												<div class="p_price">
													<strong>￥{{$v['price']}}.00</strong>
													<span class="p_num">x{{$v['num']}}</span>
													<a href="javascript:;" hd="{{$k}}" class="shopdel">删除</a>
													<input type="hidden" name="id[]" value="{{$k}}" />
												</div>
											</div>
											<div class="t">
												<i></i>
												7天无理由退货
											</div>
										</div>
										{{endforeach}}
									</div>
								</div>
							</div>
							
							<div>备注： <input type="text" name="remark" id="" value="" style="width: 520px; height: 30px;" /></div>
						</div>
					</div>
				</div>
				
				<div class="order">
					<div class="fr">
						<div class="list">
							<span>
								总商品金额：
							</span>
							<em class="cell price">￥<i>{{$price}}</i>.00</em>
						</div>
						<div class="list">
							<span>
								运费：
							</span>
							<em class="cell price">￥00.00</em>
						</div>
					</div>
				</div>
				<div class="trade">
					<div class="fc_price_info">
						<span class="price_tit">应付总额：</span>
						<span class="sumPayPriceId">￥<span>{{$price}}</span>.00</span>
					</div>
				</div>
				<div class="tj">
					<input type="submit" class="tjdd" name="" id="" value="提交订单" />
				</div>
			</div>
		</form>
		
		
		
		
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
		{{include file="../Common/footer"}}
	</body>
</html>
