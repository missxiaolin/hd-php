		<dl>
			<dt>订单中心</dt>
			<dd {{if value="'ACTION' eq 'order'"}}class="active"{{endif}}><a href="order.html">已买到宝贝</a></dd>
			<!--<dd><a href="">退货管理</a></dd>-->
		</dl>
		<!-- <dl> -->
			<!-- <dt>关注中心</dt> -->
			<!-- <dd {{if value="'ACTION' eq 'follow'"}}class="active"{{endif}}><a href="{{U('Info/follow')}}">关注的商品</a></dd> -->
			<!--<dd><a href="">关注的店铺</a></dd>-->
		<!-- </dl> -->
		<dl>
			<dt>设置</dt>
			<dd {{if value="'ACTION' eq 'index' or 'ACTION' eq 'portrait'"}}class="active"{{endif}}><a href="my.html">个人信息</a></dd>
			<dd {{if value="'ACTION' eq 'address'"}}class="active"{{endif}}><a href="address.html">收货地址</a></dd>
			<!--<dd><a href="">我的金豆</a></dd>-->
		</dl>
		<!--<dl>
			<dt>我是商家</dt>
			<dd><a href="">商家中心</a></dd>
		</dl>-->