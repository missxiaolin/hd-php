		<!--顶部区域-->
		<div id="top">
			<div class="top_middle">
				<div class="top_right">
					<ul>
						<li>
							
							<?php if(isset($_SESSION['user'])){?>
                
								<span style="margin-right: 5px;"><?php echo $_SESSION['user']['username']?></span>
								<a href="<?php echo U('Login/out')?>" style="margin-right: 10px;">退出</a>
								<?php }else{?>
								<a href="<?php echo U('Login/index')?>" class="dl">您好,请登录</a>
								<a href="<?php echo U('Register/index')?>" class="zc">免费注册</a>
							
               <?php }?>
						</li>
						<li class="line"></li>
						<li>
							<a href="<?php echo U('Info/index')?>" class="dd">个人中心</a>
						</li>
						<li class="line"></li>
						<li>
							<a href="<?php echo U('Info/order')?>" class="dd">我的订单</a>
						</li>
						<li class="line"></li>
						<!-- <li>
							<a href="<?php echo U('Info/follow')?>" class="dd">我的收藏</a>
						</li> -->
						<!-- <li class="line"></li> -->
						<li>
							<p class="gy">
								<a href="" class="gb">关于京东<i class="iconfont">&#xe652;</i></a>
							</p>
							<div class="box gyjd">
								<img src="./Public/index/images/332.jpg"/>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		