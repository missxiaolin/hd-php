<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>商品列表</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop_list.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/right.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		{{include file="../Common/header"}}
		{{include file="../Common/seach"}}
		{{include file="../Common/right"}}
		<!--筛选区域-->
		{{if value="isset($_GET['seach'])"}}
			{{if value="isset($shopData)"}}
				<div id="crumbs_nav">
					全部结果<i>></i><b>"{{Q('get.seach')}}"</b>
				</div>
			{{else}}
				<div id="crumbs_nav">
					<div class="ns_wrap">
						<span class="ns_icon"></span>
						<div class="ns_content">
							<span>
								抱歉，没有找到与“
								<em>{{Q('get.seach')}}</em>
								“相关的商品”
							</span>
						</div>
					</div>
				</div>
			{{endif}}
		{{endif}}
		<!--商品筛选-->
		<div id="J_selector">
			<!--第一个品牌-->
			{{if value="isset($brand)"}}
				<div class="sl_wrap">
					<div class="left">
						<div class="sl_key">
							<strong>品牌：</strong>
						</div>
					</div>
					<div class="middle">
						<!--按钮-->
						<a href="javascript:;" class="add" hd="2"><span>更多</span><i class="add_1"></i></a>
						<ul class="sx">
							<li data_initial="0" class="add_color">所有品牌</li>
							{{foreach from="$brand" key="$k" value="$v"}}
								<li data_initial="{{$k}}">{{$k}}</li>
							{{endforeach}}
						</ul>
						<div class="clr"></div>
						<div class="pp">
							<ul>
								<?php $bid = isset($_GET['bid'])?$_GET['bid']:0; ?>
								{{foreach from="$brand" key="$k" value="$v"}}
									{{foreach from="$v" value="$value"}}
										<li data_initial="{{$k}}">
												<a href="{{U('shoplist',array('cid'=>$_GET['cid'],'seach'=>$_GET['seach'],'param'=>Q('get.param'),'bid'=>$value['bid']))}}" {{if value="$bid eq $value['bid']"}}style="color:red;font-weight:700;"{{endif}}>{{$value['bname']}}</a>
										</li>
									{{endforeach}}
								{{endforeach}}
							</ul>
						</div>
					</div>
				</div>
			{{endif}}
			<!--第二个-->
			{{foreach from="$finalAttr" key="$k" value="$v"}}
        		<?php 
        			$temp = $param;
        			$temp[$k] = 0;
        			
        		?>
				<div class="sl_wrap two_wrap">
					<div class="left">
						<div class="sl_key">
							<strong>{{$v['name']}}：</strong>
						</div>
					</div>
					<div class="middle">
						<div class="pp">
							<ul>
								<?php $a=0;  ?>
								{{foreach from="$v['value']" value="$value"}}
									<?php 
										$a++;  
										$temp[$k] = $value['gtid'];
									?>
									<li>
										<a href="{{U('shoplist',['cid'=>$_GET['cid'],'seach'=>$_GET['seach'],'param'=>implode('_',$temp),'bid'=>isset($_GET['bid'])?$_GET['bid']:0])}}" {{if value="$value['gtid'] eq $param[$k]"}}style="color:red;font-weight:700;"{{endif}}>{{$value['gtvalue']}}</a>
									</li>
								{{endforeach}}
							</ul>
						</div>
						<?php if($a>7){ ?>
							<!--按钮-->
							<a href="javascript:;" class="add" hd="2"><span>更多</span><i class="add_1"></i></a>
						<?php } ?>
					</div>
				</div>
			{{endforeach}}
		</div>
		<!--商品列表区域-->
		<div id="shop_list">
			<!--商品列表左边-->
			<div class="shop_left">
				{{if value="isset($spreadData)"}}
				<div class="box">
					
					<div class="mt">
						<h3>推广商品</h3>
					</div>
					<div class="mc">
                        <ul>
                        	
                        	{{foreach from="$spreadData" value="$v"}}
	                        	<li>
	                        		<div class="p_img">
			                            <a href="shop_{{$v['gid']}}.html"><img src="{{$v['pic']}}"/></a>
			                        </div>
									<div class="p_price">
			                            <strong>
			                                <em>¥</em>
			                                <span>{{$v['shopprice']}}.00</span>
			                            </strong>
			                        </div>
									<div class="p_name">
										<a href="shop_{{$v['gid']}}.html">{{$v['gname']}}</a>
									</div>
									<div class="p_comm">
										已有<span>{{$v['count']}}</span>人评价 
									</div>
	                        	</li>
                        	{{endforeach}}
                        	
                        </ul>
					</div>

				</div>
				{{endif}}
			</div>
			<!--商品列表右边-->
			<div class="shop_right">
				<!--筛选-->
				<!-- <div class="f_line">
					<div class="f_sort">
						<a href="" class="active">综合排序</a>
						<a href="">销量</a>
						<a href="">价格</a>
						<a href="">评论数</a>
						<a href="">新品</a>
					</div>
				</div> -->
				<!--商品页面-->
				<div class="J_goodsList">
					<ul class="gl_warp">
						{{if value="isset($shopData)"}}
							{{foreach from="$shopData" value="$v"}}
								<li>
									<div class="gl_i_wrap">
										<!--图像-->
										<a href="shop_{{$v['gid']}}.html">
											<div class="p_img">
												<img src="{{$v['pic']}}"/>
											</div>
										</a>
										<div class="ps_wrap">
											<ul class="ps_main">
												<li>
													<a href="javascript:;">
														<img src="{{$v['pic']}}"/>
													</a>
												</li>
											</ul>
										</div>
										<div class="p_price">
											<span>￥</span><i>{{$v['shopprice']}}.00</i>
										</div>
										<div class="p_icons">
											<a href="shop_{{$v['gid']}}.html">{{$v['gname']}}</a>
										</div>
										<div class="p_commit">
											<strong>已有<a href="">{{$v['count']}}+</a>评价</strong>
										</div>
									</div>
								</li>
							{{endforeach}}
						{{endif}}
					</ul>
				</div>
				<!--分页-->
				
			</div>
		</div>
		
		<!--底部区域-->
		{{include file="../Common/footer"}}
	</body>
</html>
