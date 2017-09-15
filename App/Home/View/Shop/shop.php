<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>商品页面</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop_list.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/right.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
//			验证规格地址
			validate = "{{U('Shopcart/validate')}}";
//			商品价格
			price = "{{$shopData['shopprice']}}";
//			付款商品页面
			Jump = "{{U('Shopcart/session')}}";
//			购物车
			shopcar = "{{U('Shopcart/addcart')}}";
			payment = "{{U('Shopcart/index')}}";
		</script>
		<script src="./Public/index/js/enlarge.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<!--文本城市区域js-->
		<!--<script src="./Public/index/js/shop/cityJson.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop/citySet.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop/Popt.js" type="text/javascript" charset="utf-8"></script>-->
	</head>
	<body>
		{{include file="../Common/header"}}
		{{include file="../Common/seach"}}
		{{include file="../Common/right"}}
		<!--商品区域-->
		<div id="shop">
			<!--商品位置-->
			<div class="title">
				{{foreach from="$topCateData" key="$k" value="$v"}}
					{{if value="$k eq 0"}}
					<strong>
						{{$v['cname']}} 
					</strong>
					<span>> </span>
					{{else}}
					<span>
						<a href="shoplist_{{$v['cid']}}.html">{{$v['cname']}}</a> > 
					</span>
					{{endif}}
				{{endforeach}}
				<span>
					{{$shopData['brand']['bname']}}
					 > 
				</span>
			</div>
			<!--商品主图-->
			<dic class="pic">
				<!--左边-->
				<div class="left">
					<div class="box">
						<div class="pic_img">
							<img src="{{$shopData['small'][0][0]}}"/>
							<b></b>
							<div class="cover"></div>
						</div>
						<div class="min_pic">
							{{foreach from="$shopData['small']" value="$v"}}
							<img _bigsrc="{{$v[1]}}" src="{{$v[0]}}"/>
							{{endforeach}}
						</div>
						<div class="large">
							<img src="{{$shopData['small'][0][1]}}" class="max" />
						</div>
					</div>
					<div class="shop_bh">
						<div class="bh">
							<span>商品编号：</span>
							<span>{{$shopData['gnumber']}}</span>
						</div>
						<!--<div class="fx">
							<a href="" class="shop_fx"><b></b>分享</a>
							<a href="" class="shop_gz"><b></b>关注商品</a>
						</div>-->
					</div>
				</div>
				<!--中间-->
				<div class="middle">
					<h1>{{$shopData['gname']}}</h1>
					<div class="p_ad">正品保障！！！！！</div>
					<div class="summary">
						<div class="box">
							<div class="dt">京 东 价：</div>
							<div class="dd">
								<strong class="jdz">￥<span>{{$shopData['shopprice']}}</span>.00</strong>
								<span class="pricing"> [吊牌价：<div class="page_dpprice">￥{{$shopData['marketprice']}}.00</div>]</span>
								<!--<a href="">降价通知</a>-->
							</div>
						</div>
						<!--<div class="comment_count">
							<div class="p">累计评价</div>
							<div class="s">3178</div>
						</div>-->
					</div>
					<div class="city">
						
						<div class="fw">
							<div class="dt">
								服    务：
							</div>
							<div class="dd">
								由京东发货，并提供售后服务。
							</div>
						</div>
					</div>
					<div class="choose">
						<ul class="abroad">
							<li class="yf">
								<div class="dt">
									运费：
								</div>
								<div class="dd">
									卖家承担运费
								</div>
							</li>
							{{foreach from="$typeatrData" value="$v"}}
								<li class="spce" hd="0">
									<div class="dt">
										{{$v['taname']}}：
									</div>
									
									<div class="dd">
										<div class="tc">
											{{foreach from="$v['opt']" value="$value"}}
												<div gtid="{{$value['gtid']}}" class="tc_box">
													{{$value['gtvalue']}}
													<i></i>
												</div>
											{{endforeach}}
										</div>
									</div>
								</li>
							{{endforeach}}
							<li>
								<div class="dt">
									数量：
								</div>
								<div class="dd">
									<div class="number">
										<input type="text" name="" id="shuliang" value="1" maxlength="3" />
										<div class="add">
											<a href="javascript:;" class="jia">+</a>
											<a href="javascript:;" class="jian">-</a>
										</div>
									</div>
								</div>
								<span style="color:red;font-weight:700;font-size:14px;margin-left:5px;line-height:40px;" class="hy"></span>
							</li>
							<li class="gw">
								<div class="dt">
									
								</div>
								<div class="dd">
									<input type="hidden" name="" id="did" value="{{Q('get.gid')}}" />
									<a {{if value="isset($_SESSION['user'])"}}href="javascript:;" hd="0"{{else}} href="login.html"{{endif}} class="btn_append"></a>
									<a {{if value="isset($_SESSION['user'])"}}href="javascript:;" hd="0"{{else}} href="login.html"{{endif}} class="btn_easybuy"></a>
								</div>
							</li>
							<li class="yf">
								<div class="dt">
									温馨提示：
								</div>
								<div class="dd">
									1.支持7天无理由退货
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!--右边-->
				<div class="right">
					<div class="logo">
						<img src="{{$shopData['brand']['logo']}}"/>
					</div>
					<div class="zyy">
						<span>京东自营</span>
					</div>
					<dl class="zc">
						<dt>服务支持：</dt>
						<dd>
							<a href="javascript:;" class="cr"><img src="./Public/index/images/shop/2.png"/>次日达</a>
							<a href="javascript:;"><img src="./Public/index/images/shop/3.png"/>自提</a>
						</dd>
					</dl>
				</div>
			</dic>
		</div>
		<!--详情页-->
		<div id="w">
			<!--详情页左边-->
			<div class="left">
				<div class="dl">
					<div class="title">相关分类</div>
					<div class="pop_summary">
						{{foreach from="$typeData" value="$v"}}
							<a href="shoplist_{{$v['cid']}}.html">{{$v['cname']}}</a>
						{{endforeach}}
					</div>
				</div>
				<!--达人选购-->
				<div class="dr">
					<div class="title">达人选购</div>
					<div class="box">
						<ul>
							{{foreach from="$sonData" value="$v"}}
								<li>
									<div class="p-img">
										<a href="shop_{{$v['gid']}}.html"><img src="{{$v['pic']}}"/></a>
									</div>
									<div class="p-name">
										<a href="shop_{{$v['gid']}}.html">{{$v['gname']}}</a>
									</div>
									<div class="p-price">
										<strong>￥{{$v['shopprice']}}.00</strong>
									</div>
								</li>
							{{endforeach}}
						</ul>
					</div>
				</div>
			</div>
			<!--详情页右边-->
			<div class="right">
				<div class="box_right">
					<div class="right_top">
						<ul class="m1">
							<li class="cuur">商品介绍</li>
							<li>规格参数</li>
							<li>商品评价<span>({{$shopData['count']}})</span></li>
							<li>售后保障</li>
						</ul>
					</div>
				</div>
				
				<div class="right_middle">
					<div class="mc" style="display: block;">
						<div class="xqy">
							{{$shopData['intro']}}
							
						</div>
					</div>
					<div class="mc">
						<div class="p_parameter">
							<ul class="barand">
								<li>品牌：
									<span class="pinpai">{{$shopData['brand']['bname']}}</span>
									<!-- <a href="" class="gz"><b>♥</b>关注</a> -->
								</li>
							</ul>
							<ul class="parameter2">
								<li>商品名称：{{$shopData['gname']}}</li>
								<li>商品编号：{{$shopData['gnumber']}}</li>
								{{if value="isset($shopData['attr'])"}}
									{{foreach from="$shopData['attr']" value="$v"}}
										{{if value="!empty($v['gtvalue'])"}}
											<li>{{$v['taname']}}：{{$v['gtvalue']}}</li>
										{{endif}}
									{{endforeach}}
								{{endif}}
							</ul>
						</div>
					</div>
					<div class="mc">
						<div class="p_parameters">
							<ul>
								{{foreach from="$shopData['remark']" value="$v"}}
									<li>
										<div class="pl_left">
											<div class="grade_star" {{if value="$v['star'] eq 1"}}style="width:18px;"{{elseif value="$v['star'] eq 2"}}style="width:35px;"{{elseif value="$v['star'] eq 3"}}style="width:50px;"{{elseif value="$v['star'] eq 4"}}style="width:69px;"{{else}}style="width:85px;"{{endif}}></div>
											<div class="comment_time">{{date('Y-m-d',$v['time'])}} {{date('H:i:s',$v['time'])}}</div>
											<div>{{$v['uname']}}</div>
										</div>
										<div class="column">
											{{$v['content']}}
										</div>
									</li>
								{{endforeach}}
							</ul>
						</div>
					</div>
					<div class="mc">
						<img src="./Public/index/images/shop/shouhou.png"/>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		
		<!--底部区域-->
		{{include file="../Common/footer"}}
	</body>
</html>
