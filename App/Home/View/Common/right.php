<?php
	$userModel = new \Home\Model\User;
	if(isset($_SESSION['user'])){
		$uid = $_SESSION['user']['uid'];
		$userData = $userModel->where('uid',$uid)
								->join('user_info','shop_user_uid','=','uid')
								->find();
		// 压入订单
		$orderModel = new \Common\Model\Order;
		$userData['count'] = $orderModel->where("shop_user_uid",$uid)
										->count('oid');
		// p($userData);
	}

	if(isset($_SESSION['cart']['goods'])){
		$count = cart::getTotalNums();
		$shopcartData = $_SESSION['cart']['goods'];
		if(!$shopcartData){
			$shopcartData =[];
		}
		// p($shopcartData);
		$num = Cart::getTotalNums();
		$numPic = Cart::getTotalPrice();
	}

?>

		<script type="text/javascript">
			// 发送JIMI位置
			var jimi_search = "{{U('Index/Jimi')}}";
//			删除用户 不想要的商品
			var shop = "{{U('Shopcart/indexdel')}}";
		</script>
		<script type="text/javascript">
			$(function(){
//				删除指定不要的商品
				var Adel = $('#right .right .man_1 .shop .shop_l .gift .p_del');
				Adel.click(function(){
					var session = $(this).attr('hd');
					var id = $("#right .right .man_1 .shop .shop_l .gift .p_del").index(this);
					// $("#right .right .man_1 .shop .shop_l .gift").eq(id).remove(id);
					// alert(id);
					// return false;
					$.ajax({
						type:"post",
						url:shop,
						data:{session:session},
						dataType:'text',
						async:true,
						success:function(phpData){
							$('#right .right .man_1 .jdm_tbar .jtc_sum strong span').html(phpData);
							$("#right .right .man_1 .shop .shop_l .gift").eq(id).remove();
							alert('删除成功！');
						}
					});
					
				})
			})
		</script>
		<!--右侧导航栏-->
		<div id="right">
			<div class="left">
				<!--线条-->
				<div class="bg"></div>
				<!--底部-->
				<div class="bottom" style="height:36px;">
					<div class="upper">
						<i></i>
						<em>顶部</em>
					</div>
				</div>
				<!--中间-->
				<div class="among">
					<div class="middle" hd="2">
						<i></i>
						<em>京东会员</em>
					</div>
					<div class="middle feed_1" hd="2">
						<i></i>
						<em>购物车</em>
					</div>
					<div class="middle feed_4" hd="2">
						<i></i>
						<em>咨询JIMI</em>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="man_1">
					<h3>
						<span>
							<b></b>
							<em>京东会员</em>
						</span>
					</h3>
					<div class="my">
						<div class="rt">
							<img src="{{if value="!empty($userData['user_thum'])"}}{{$userData['user_thum']}}{{else}}./Public/index/images/331.jpg{{endif}}"/>
						</div>
						<div class="xinxi">
							<div class="name">
							{{if value="isset($_SESSION['user'])"}}
								<a href="my.html">{{$_SESSION['user']['username']}}
							{{else}}</a>
								<a href="login.html">您好，请登录</a>
								<a href="register.html">免费注册</a>
							{{endif}}
							</div>
							<div class="tb" style="margin-top:5px;">
								<a href="my.html" class="tb_my"><i></i></a>
								<!-- <a href="javascript:;" class="hy"><i></i></a> -->
							</div>
						</div>
						<div class="get_dou">
							<span class="jd">欢迎来到京东！</span>
						</div>
						<div class="account">
							<a href="javascript:;" class="one">
								<div class="info">{{if value="isset($_SESSION['user'])"}}{{$userData['money']}}{{else}}0{{endif}}</div>
								<div class="info_name">京豆</div>
							</a>
							<a href="order.html">
								<div class="info">{{if value="isset($_SESSION['user'])"}}{{$userData['count']}}{{else}}0{{endif}}</div>
								<div class="info_name">我的订单</div>
							</a>
							<a href="cart.html" class="last">
								<div class="info">{{if value="isset($_SESSION['cart']['goods'])"}}{{$count}}{{else}}0{{endif}}</div>
								<div class="info_name">购物车</div>
							</a>
						</div>
					</div>
				</div>
				<div class="man_1 man_2">
					<h3>
						<span>
							<b></b>
							<em>购物车</em>
						</span>
					</h3>
					<div class="shop">
						<div class="shop_l">
							{{if value="isset($shopcartData)"}}
								<div class="wbj">
									{{foreach from="$shopcartData" key="$k" value="$v"}}
										<div class="gift">
											<span class="p_img">
												<a href="shop_{{$v['id']}}.html">
													<img src="{{$v['options']['picimg']}}" style="width:50px;height:50px;" />
												</a>
											</span>
											<div class="p_name">
												<a href="shop_{{$v['id']}}.html">{{$v['name']}}</a>
											</div>
											<div class="p_price">
												<strong>¥{{$v['price']}}.00</strong>*{{$v['num']}}
											</div>
											<a href="javascript:;" class="p_del" target="_blank" hd="{{$k}}">删除</a>
										</div>
									{{endforeach}}
								</div>
							{{else}}
								<div class="jdm">
									<div class="tip_inner">
										<i class="i_f"></i>
										<div class="tip_text">
											购物车空空如也~~
											<br />
											<a href="index.html">去首页看看</a>
										</div>
									</div>
								</div>
							{{endif}}
						</div>
					</div>
					<div class="jdm_tbar">
						<div class="gw">
							<div class="jtc_sum">
								共计：<strong>￥<span>{{if value="isset($shopcartData)"}}{{$numPic}}{{else}}0{{endif}}</span>.00</strong>
							</div>
							<a href="cart.html" class="jtc_btn">去结算</a>
						</div>
					</div>
				</div>
				<div class="man_1 man_5">
					<h3>
						<span>
							<b></b>
							<em> 咨询JIMI</em>
						</span>
					</h3>
					<div class="char" id="gundong">
						<ul class="chars">
							

							
						</ul>
					</div>
					<div class="zx">
						<textarea name="" rows="" cols="" class="wz"></textarea>
						<input type="button" id="" value="发送" class="fs" />
					</div>
				</div>
			</div>
		</div>