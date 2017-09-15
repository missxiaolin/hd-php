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
 		
		<!--顶部区域结束-->
		<!--搜索栏部分-->
		<div id="search">
			<div class="logo">
				<a href="index.html"><img src="./Public/index/images/24.png"/></a>
			</div>
			<input type="text" name="" id="search_shop_list" placeholder="闪购" class="text" />
			<input type="submit" name="" id="search_shop" value="搜索" class="tj" />
			<p class="tg">
				<!--放点热门点击的产品分类链接-->
				<a href=""></a>
			</p>
			<div class="shop">
				<i class="tb_1"></i>
				<a href="cart.html">我的购物车</a>
				<i class="iconfont tb_2">&#xe677;</i>
				<div class="sum">{{if value="isset($num)"}}{{$num}}{{else}}0{{endif}}</div>
			</div>
		</div>
		<!--搜索栏结束-->
		<!--导航开始-->
		<div id="nav">
			<div class="center">
				<div class="dh">
					<a href="javascript:;" class="whole">全部商品分类</a>
					<div class="shop_title {{if value="'CONTROLLER' neq 'Index'"}}shop_list{{endif}}" {{if value="'CONTROLLER' neq 'Index'"}}style="display: none;"{{endif}}>
						<ul>
							
							{{foreach from="$cateData" value="$v"}}
							<li  class="nav_list">
								<div class="xz">
									{{foreach from="$v['one']" value="$one"}}
										<a href="shoplist_{{$v['cid']}}.html">{{$one['cname']}}</a><span>、</span>
									{{endforeach}}
									<i class="iconfont tb">&#xe677;</i>
								</div>
								<div class="box">
									<div class="box_left">
										{{foreach from="$v['one']" value="$one"}}
												<dl class="first">
													<dt>{{$one['cname']}}<i>></i></dt>
													<dd>
														{{foreach from="$one['two']" value="$two"}}
															<a href="shoplist_{{$two['cid']}}.html">{{$two['cname']}}</a>
														{{endforeach}}
													</dd>
												</dl>
											
										{{endforeach}}
									</div>
								</div>
							</li>

							
							{{endforeach}}
							
						</ul>
					</div>
				</div>
				<ul class="lead">
					{{foreach from="$topcateData" value="$v"}}
					<li>
						<a href="shoplist_{{$v['cid']}}.html">{{$v['cname']}}</a>
					</li>
					{{endforeach}}
				</ul>
			</div>
		</div>
		<!--导航 结束-->