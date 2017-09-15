<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>京东商城</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
	<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="./Public/index/js/right.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/index/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./Public/index/js/index.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		{{include file="../Common/header"}}
		{{include file="../Common/seach"}}
		{{include file="../Common/right"}}
		<!--轮播图开始-->
		<div id="pic">
			<div class="jz">
				<div class="sy">
					<div class="pic_img">
						<img src="./Public/index/images/204.jpg" class="one"/>
						<img src="./Public/index/images/205.jpg"/>
						<img src="./Public/index/images/206.jpg"/>
						<img src="./Public/index/images/207.jpg"/>
						<img src="./Public/index/images/208.jpg"/>
						<img src="./Public/index/images/209.jpg"/>
						<ul class="dot">
							<li class="select">1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
							<li>5</li>
							<li>6</li>
						</ul>
						<a href="javascript:;" class="left"></a>
						<a href="javascript:;" class="right"></a>
					</div>
					<div class="notive">
						<div class="now">
							<div class="mt">
								<h2>今日快报</h2>
								<a href="arc.html">更多<i class="iconfont tb_2">&#xe677;</i></a>
							</div>
							<ul>
								{{foreach from="$arcData" value="$v"}}
									<li>
										<a href="arclist_{{$v['wid']}}.html">
											<span>[{{$v['cate']}}]</span>{{$v['title']}}
										</a>
									</li>
								{{endforeach}}
							</ul>
						</div>
						<div class="tg">
							<a href="{{U('Shop/shop',array('gid'=>12))}}"><img src="./Public/index/images/210.jpg"/></a>
						</div>
					</div>
				</div>
				
				
				
			</div>
		</div>
		
		
		<!--轮播图结束-->
		
		
		<!--一楼-->
		<div id="floor" class="fl_1">
			<div class="mt">
				<h2>
					<i>1F</i>
					<span>服装鞋包</span>
				</h2>
				
				<ul>
					{{foreach from="$cateData" key="$k" value="$v"}}
						<li {{if value="$k eq 0"}}class="active"{{endif}}>
							<a href="javascript:;">{{$v['cname']}}</a>
							<span></span>
						</li>
					{{endforeach}}
				</ul>
			</div>
			<div class="mc">
				<div class="mc_left">
					<div class="side">
						<img src="./Public/index/images/46.jpg" class="tg"/>
						<a href="javascript:;" class="lines">
							
						</a>
						<ul class="insider">
							<li class="fore1">
								<a href="{{U('Shop/shoplist',array('cid'=>28))}}">
									<i class="polo"></i>
									<span>男装</span>
								</a>
							</li>
							<li class="fore2">
								<a href="{{U('Shop/shoplist',array('cid'=>29))}}">
									<i></i>
									<span>女装</span>
								</a>
							</li>
							<li class="fore3">
								<a href="{{U('Shop/shoplist',array('cid'=>31))}}">
									<i></i>
									<span>内衣</span>
								</a>
							</li>
							<li class="fore4">
								<a href="{{U('Shop/shoplist',array('cid'=>35))}}">
									<i></i>
									<span>鞋靴</span>
								</a>
							</li>
							<li class="fore5">
								<a href="{{U('Shop/shoplist',array('cid'=>36))}}">
									<i class="polo"></i>
									<span>箱包</span>
								</a>
							</li>
							<li class="fore6">
								<a href="{{U('Shop/shoplist',array('cid'=>38))}}">
									<i class="polo"></i>
									<span>奢侈品</span>
								</a>
							</li>
						</ul>
						<ul class="two">
							<li>
								<a href="{{U('Shop/shoplist',array('cid'=>29))}}" class="jia">女装新品</a>
								<a href="{{U('Shop/shoplist',array('cid'=>35))}}">品质男鞋</a>
								<a href="{{U('Shop/shoplist',array('cid'=>9))}}">服装城</a>
								<a href="{{U('Shop/shoplist',array('cid'=>65))}}">太阳镜</a>
								<a href="{{U('Shop/shoplist',array('cid'=>66))}}">时尚女鞋</a>
								<a href="{{U('Shop/shoplist',array('cid'=>38))}}">奢侈品</a>
								<a href="{{U('Shop/shoplist',array('cid'=>67))}}">仿皮皮衣</a>
							</li>
							<li>
								<a href="{{U('Shop/shoplist',array('cid'=>36))}}">箱包</a>
								<a href="{{U('Shop/shoplist',array('cid'=>37))}}" class="jia">珠宝</a>
								<a href="{{U('Shop/shoplist',array('cid'=>30))}}">童装</a>
								<a href="{{U('Shop/shoplist',array('cid'=>62))}}">衬衫</a>
								<a href="{{U('Shop/shoplist',array('cid'=>63))}}">卫衣</a>
								<a href="{{U('Shop/shoplist',array('cid'=>64))}}" class="jia">T桖</a>
								<a href="{{U('Shop/shoplist',array('cid'=>68))}}">钱包</a>
								<a href="{{U('Shop/shoplist',array('cid'=>69))}}">服饰</a>
							</li>
						</ul>
					</div>
				</div>
				<!--男装-->
				{{foreach from="$cateData" key="$k" value="$v"}}
				<div class="mc_right" {{if value="$k eq 0"}}style="display: block;"{{endif}}>
					<ul class="p_list">
						{{if value="isset($v['shop'])"}}
						{{foreach from="$v['shop']" value="$shop"}}
							<li>
								<div class="p_img">
									<a href="{{U('Shop/shop',array('gid'=>$shop['gid']))}}"><img src="{{$shop['pic']}}"/></a>
								</div>
								<a href="{{U('Shop/shop',array('gid'=>$shop['gid']))}}" class="p_name">{{$shop['gname']}}</a>
								<span class="p_price"><span>￥</span>{{$shop['shopprice']}}.<span>00</span></span>
							</li>
						{{endforeach}}
						{{endif}}
					</ul>
				</div>
				{{endforeach}}
			</div>
		</div>
		<!-- 楼层2 -->
		<div id="floor" class="fl_2">
			<div class="mt">
				<h2>
					<i>2F</i>
					<span>个护美妆</span>
				</h2>
				<ul>
					<li class="active">
						<a href="">热门</a>
						<span></span>
					</li>
					{{foreach from="$twoData" key="$k" value="$v"}}
						<li>
							<a href="javascript:;">{{$v['cname']}}</a>
							<span></span>
						</li>
					{{endforeach}}
				</ul>
			</div>
			<div class="mc add">
				<div class="mc_left two_layer">
					<div class="side">
						<img src="./Public/index/images/216.jpg" class="tg"/>
						<a href="" class="lines">
							
						</a>
						<ul class="insider">
							<li class="fore1">
								<a href="{{U('Shop/shoplist',array('cid'=>274))}}">
									<i class="polo"></i>
									<span>美妆特卖</span>
								</a>
							</li>
							<li class="fore2">
								<a href="{{U('Shop/shoplist',array('cid'=>278))}}">
									<i></i>
									<span>个护清洁</span>
								</a>
							</li>
							<li class="fore3">
								<a href="{{U('Shop/shoplist',array('cid'=>265))}}">
									<i></i>
									<span>女士香水</span>
								</a>
							</li>
							<li class="fore4">
								<a href="{{U('Shop/shoplist',array('cid'=>281))}}">
									<i></i>
									<span>除虫用品</span>
								</a>
							</li>
						</ul>
						<ul class="two">
							<li><a href="{{U('Shop/shoplist',array('cid'=>266))}}">男士香水></a></li>
							<li><a href="{{U('Shop/shoplist',array('cid'=>274))}}">美妆工具></a></li>
						</ul>
						<ul class="two_2">
							<li>
								<a href="{{U('Shop/shoplist',array('cid'=>288))}}" class="zj">家居日用</a>
								<a href="{{U('Shop/shoplist',array('cid'=>277))}}">衣物清洁</a>
								<a href="{{U('Shop/shoplist',array('cid'=>282))}}">皮具护理</a>
								<a href="{{U('Shop/shoplist',array('cid'=>276))}}" class="zj">纸品</a>
								<a href="{{U('Shop/shoplist',array('cid'=>280))}}">一次性用品</a>
							</li>
						</ul>
					</div>
				</div>
				<!--内容1-->
				<div class="mc_right one tj">
					<div class="pic_2 pic_6" id="new_3">
						<ul class="fz">
								<li class="fist">
									<div class="floor_1">
										<img src="./Public/index/images/227.jpg"/>
									</div>
									<div class="floor_2">
										<img src="./Public/index/images/228.jpg"/>
									</div>
								</li>
								<li>
									<div class="floor_1">
										<img src="./Public/index/images/l2_1.jpg"/>
									</div>
									<div class="floor_2">
										<img src="./Public/index/images/l2_2.jpg"/>
									</div>
								</li>
								<li>
									<div class="floor_1">
										<img src="./Public/index/images/l2_3.jpg"/>
									</div>
									<div class="floor_2">
										<img src="./Public/index/images/l2_4.jpg"/>
									</div>
								</li>
								<li>
									<div class="floor_1">
										<img src="./Public/index/images/l2_5.jpg"/>
									</div>
									<div class="floor_2">
										<img src="./Public/index/images/l2_6.jpg"/>
									</div>
								</li>
							</ul>
							<a href="javascript:;" class="slider_prev left"></a>
							<a href="javascript:;" class="slider_next right"></a>
							<div class="dot">
								<span class="actibe"></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
					</div>
					<div class="right_2">
						<ul class="right2_one">
							<li><img src="./Public/index/images/229.jpg"/></li>
							<li><img src="./Public/index/images/230.jpg"/></li>
							<li><img src="./Public/index/images/231.jpg"/></li>
						</ul>
						<ul class="right2_two">
							<li><img src="./Public/index/images/232.jpg"/></li>
							<li><img src="./Public/index/images/233.jpg"/></li>
							<li><img src="./Public/index/images/234.jpg"/></li>
						</ul>
					</div>
				</div>
				<!--国际大牌-->
				{{foreach from="$twoData" key="$k" value="$v"}}
					<div class="mc_right tj">
						<ul class="p_list">
							{{if value="isset($v['shop'])"}}
								{{foreach from="$v['shop']" value="$shop"}}
									<li>
										<div class="p_img">
											<a href="{{U('Shop/shop',array('gid'=>$shop['gid']))}}"><img src="{{$shop['pic']}}"/></a>
										</div>
										<a href="{{U('Shop/shop',array('gid'=>$shop['gid']))}}" class="p_name">{{$shop['gname']}}</a>
										<span class="p_price"><span>￥</span>{{$shop['shopprice']}}.<span>00</span></span>
									</li>
								{{endforeach}}
							{{endif}}
						</ul>
					</div>
				{{endforeach}}
			</div>
		</div>
		
		
		<!--底部区域-->
		{{include file="../Common/footer"}}
	</body>
</html>
