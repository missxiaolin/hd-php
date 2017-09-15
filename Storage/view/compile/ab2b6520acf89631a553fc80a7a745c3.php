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
			var add = "<?php echo U('Info/add')?>";
//			删除地址
			var delurl = "<?php echo U('Info/deladdress')?>";
//			修改地址原 数据
			var oldedit = "<?php echo U('Info/oldedit')?>";
//			修改地址
			var edit = "<?php echo U('Info/edit')?>";
//			删除用户 不想要的商品
			var shop = "<?php echo U('Shopcart/indexdel')?>";
		</script>
		<script src="./Public/index/js/zfaddress.js" type="text/javascript" charset="utf-8"></script>
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
								<?php foreach ($addressData as $k=>$v){?>
									<li <?php if($k==0){?>
                class="active"
               <?php }?>>
										
										<input type="radio" class="danxuan" name="addressid" id="<?php echo $v['did']?>" value="<?php echo $v['did']?>" <?php if($k==0){?>
                checked="checked"
               <?php }?> />
										<div class="consignee_item">
											<span><?php echo $v['name']?></span>
											<i></i>
										</div>
										<div class="addr_detail">
											
											<span><?php echo $v['name']?></span>
											<span><?php echo $v['region']?></span>
											<span><?php echo $v['telephone']?></span>
										</div>
										<div class="op_btns">
											<a href="javascript:;" class="bjdz" bj="<?php echo $v['did']?>">编辑</a>
											<a href="javascript:;" class="del" bj="<?php echo $v['did']?>">删除</a>
										</div>
									</li>
								<?php }?>
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
										<?php foreach ($shopData as $k=>$v){?>
										<div class="ls">
											<div class="p_name">
												<img src="<?php echo $v['options']['picimg']?>"/>
											</div>
											<div class="goods_msg">
												<div class="p_names">
													<a href="shop_<?php echo $v['id']?>.html" target="_blank"><?php echo $v['name']?></a>
												</div>
												<div class="p_price">
													<strong>￥<?php echo $v['price']?>.00</strong>
													<span class="p_num">x<?php echo $v['num']?></span>
													<a href="javascript:;" hd="<?php echo $k?>" class="shopdel">删除</a>
													<input type="hidden" name="id[]" value="<?php echo $k?>" />
												</div>
											</div>
											<div class="t">
												<i></i>
												7天无理由退货
											</div>
										</div>
										<?php }?>
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
							<em class="cell price">￥<i><?php echo $price?></i>.00</em>
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
						<span class="sumPayPriceId">￥<span><?php echo $price?></span>.00</span>
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
