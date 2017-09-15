		<dl>
			<dt>订单中心</dt>
			<dd <?php if('address'=='order'){?>
                class="active"
               <?php }?>><a href="order.html">已买到宝贝</a></dd>
			<!--<dd><a href="">退货管理</a></dd>-->
		</dl>
		<!-- <dl> -->
			<!-- <dt>关注中心</dt> -->
			<!-- <dd <?php if('address'=='follow'){?>
                class="active"
               <?php }?>><a href="<?php echo U('Info/follow')?>">关注的商品</a></dd> -->
			<!--<dd><a href="">关注的店铺</a></dd>-->
		<!-- </dl> -->
		<dl>
			<dt>设置</dt>
			<dd <?php if('address'=='index' or 'address'=='portrait'){?>
                class="active"
               <?php }?>><a href="my.html">个人信息</a></dd>
			<dd <?php if('address'=='address'){?>
                class="active"
               <?php }?>><a href="address.html">收货地址</a></dd>
			<!--<dd><a href="">我的金豆</a></dd>-->
		</dl>
		<!--<dl>
			<dt>我是商家</dt>
			<dd><a href="">商家中心</a></dd>
		</dl>-->