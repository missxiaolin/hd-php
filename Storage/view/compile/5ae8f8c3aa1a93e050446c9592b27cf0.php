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
			var jimi_search = "<?php echo U('Index/Jimi')?>";
//			删除用户 不想要的商品
			var shop = "<?php echo U('Shopcart/indexdel')?>";
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
							<img src="<?php if(!empty($userData['user_thum'])){?>
                <?php echo $userData['user_thum']?><?php }else{?>./Public/index/images/331.jpg
               <?php }?>"/>
						</div>
						<div class="xinxi">
							<div class="name">
							<?php if(isset($_SESSION['user'])){?>
                
								<a href="my.html"><?php echo $_SESSION['user']['username']?>
							<?php }else{?></a>
								<a href="login.html">您好，请登录</a>
								<a href="register.html">免费注册</a>
							
               <?php }?>
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
								<div class="info"><?php if(isset($_SESSION['user'])){?>
                <?php echo $userData['money']?><?php }else{?>0
               <?php }?></div>
								<div class="info_name">京豆</div>
							</a>
							<a href="order.html">
								<div class="info"><?php if(isset($_SESSION['user'])){?>
                <?php echo $userData['count']?><?php }else{?>0
               <?php }?></div>
								<div class="info_name">我的订单</div>
							</a>
							<a href="cart.html" class="last">
								<div class="info"><?php if(isset($_SESSION['cart']['goods'])){?>
                <?php echo $count?><?php }else{?>0
               <?php }?></div>
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
							<?php if(isset($shopcartData)){?>
                
								<div class="wbj">
									<?php foreach ($shopcartData as $k=>$v){?>
										<div class="gift">
											<span class="p_img">
												<a href="shop_<?php echo $v['id']?>.html">
													<img src="<?php echo $v['options']['picimg']?>" style="width:50px;height:50px;" />
												</a>
											</span>
											<div class="p_name">
												<a href="shop_<?php echo $v['id']?>.html"><?php echo $v['name']?></a>
											</div>
											<div class="p_price">
												<strong>¥<?php echo $v['price']?>.00</strong>*<?php echo $v['num']?>
											</div>
											<a href="javascript:;" class="p_del" target="_blank" hd="<?php echo $k?>">删除</a>
										</div>
									<?php }?>
								</div>
							<?php }else{?>
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
							
               <?php }?>
						</div>
					</div>
					<div class="jdm_tbar">
						<div class="gw">
							<div class="jtc_sum">
								共计：<strong>￥<span><?php if(isset($shopcartData)){?>
                <?php echo $numPic?><?php }else{?>0
               <?php }?></span>.00</strong>
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