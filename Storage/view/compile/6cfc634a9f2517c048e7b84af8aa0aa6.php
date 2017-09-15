<?php 
//  	获取分类
		$cateModel = new \Common\Model\Shopcate;
		$cateData = $cateModel->where("pid=0")->get();
		foreach ($cateData as $k=>$v) {
			$cateData[$k]['one'] = $cateModel->where("pid={$v['cid']}")->get();
//			如果有顶级分类的数据就循环再压入
			if($cateData[$k]['one']){
//				如果有二级分类的数据再压入	
				foreach ($cateData[$k]['one'] as $key => $value) {
					$cateData[$k]['one'][$key]['two'] = $cateModel->where("pid={$value['cid']}")->get();
				}		
				
			}
		}

//		p($cateData);

		$topcateData = $cateModel->where("pid = 0")->orderBy('sort','asc')->limit(6)->get();
//		p($topcateData);
		if(isset($_SESSION['cart'])){
			$num =  Cart::getTotalNums();
		}
		


 ?>
 		<script type="text/javascript">
			// 搜索位置
			var search = "<?php echo U('Search/index')?>";
		</script>
		<!--顶部区域结束-->
		<!--搜索栏部分-->
		<div id="search">
			<div class="logo">
				<a href="index.php"><img src="./Public/index/images/24.png"/></a>
			</div>
			<input type="text" name="" id="search_shop_list" placeholder="闪购" class="text" />
			<input type="submit" name="" id="search_shop" value="搜索" class="tj" />
			<p class="tg">
				<!--放点热门点击的产品分类链接-->
				<a href=""></a>
			</p>
			<div class="shop">
				<i class="tb_1"></i>
				<a href="<?php echo U('Shopcart/carindex')?>">我的购物车</a>
				<i class="iconfont tb_2">&#xe677;</i>
				<div class="sum"><?php if(isset($num)){?>
                <?php echo $num?><?php }else{?>0
               <?php }?></div>
			</div>
		</div>
		<!--搜索栏结束-->
		<!--导航开始-->
		<div id="nav">
			<div class="center">
				<div class="dh">
					<a href="" class="whole">全部商品分类</a>
					<div class="shop_title <?php if('Arc'!='Index'){?>
                shop_list
               <?php }?>" <?php if('Arc'!='Index'){?>
                style="display: none;"
               <?php }?>>
						<ul>
							
							<?php foreach ($cateData as $v){?>
							<li  class="nav_list">
								<div class="xz">
									<?php foreach ($v['one'] as $one){?>
										<a href="<?php echo U('Shop/shoplist',array('cid'=>$v['cid']))?>"><?php echo $one['cname']?></a><span>、</span>
									<?php }?>
									<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
										<?php foreach ($v['one'] as $one){?>
										
											
												<dl class="first">
													<dt><?php echo $one['cname']?><i>></i></dt>
													<dd>
														<?php foreach ($one['two'] as $two){?>
															<a href="<?php echo U('Shop/shoplist',array('cid'=>$two['cid']))?>"><?php echo $two['cname']?></a>
														<?php }?>
													</dd>
												</dl>
											
										<?php }?>
											

									</div>
									<div class="box_right">
										<ul class="gg">
											<li><img src="./Public/index/images/gg1.jpg"/></li>
											<li><img src="./Public/index/images/gg2.jpg"/></li>
											<li><img src="./Public/index/images/gg3.jpg"/></li>
											<li><img src="./Public/index/images/gg4.jpg"/></li>
											<li><img src="./Public/index/images/gg5.jpg"/></li>
											<li><img src="./Public/index/images/gg6.jpg"/></li>
											<li><img src="./Public/index/images/gg7.jpg"/></li>
											<li><img src="./Public/index/images/gg8.jpg"/></li>
										</ul>
										<div class="gg9">
											<img src="./Public/index/images/gg9.jpg"/>
										</div>
										<div class="gg10">
											<img src="./Public/index/images/gg10.jpg"/>
										</div>
									</div>
									
									
									
									
								</div>
							</li>

							
							<?php }?>
							
						</ul>
					</div>
				</div>
				<ul class="lead">
					<?php foreach ($topcateData as $v){?>
					<li>
						<a href="<?php echo U('Shop/shoplist',array('cid'=>$v['cid']))?>"><?php echo $v['cname']?></a>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<!--导航 结束-->