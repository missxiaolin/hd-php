		<!--顶部区域-->
		<div id="top">
			<div class="top_middle">
				<div class="top_right">
					<ul>
						<li>
							
							{{if value="isset($_SESSION['user'])"}}
								<a href="my.html"><span style="margin-right: 5px;">{{$_SESSION['user']['username']}}</span>
								<a href="out.html" style="margin-right: 10px;">退出</a>
								{{else}}</a>
								<a href="login.html" class="dl">您好,请登录</a>
								<a href="register.html" class="zc">免费注册</a>
							{{endif}}
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
							<a href="{{U('Info/follow')}}" class="dd">我的收藏</a>
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
		
		