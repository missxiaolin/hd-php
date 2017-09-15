<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>京东快报列表</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/shop.css"/>
		<script src="./Public/index/js/jquery.easing.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/shop_list.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/right.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/enlarge.js" type="text/javascript" charset="utf-8"></script>
		<!--文章-->
		<link rel="stylesheet" type="text/css" href="./Public/index/css/active.css"/>
	</head>
	<body>
		{{include file="../Common/header"}}
		{{include file="../Common/seach"}}
		<div id="clearfix">
			<div class="left">
				{{foreach from="$arcData" value="$v"}}
				<div class="item">
					
					<a href="arclist_{{$v['wid']}}.html" class="thumb">
						<img src="{{$v['thumb']}}"/>
					</a>
					<div class="txt">
						<a href="arclist_{{$v['wid']}}.html" class="tt">{{$v['title']}}</a>
						<div class="def">
							<span class="author">{{$v['author']}}</span>
						</div>
						<div class="des">{{$v['des']}}</div>
					</div>
				</div>
				{{endforeach}}
			</div>
			<div class="right">
				<div class="rec">
					<div class="tit">
						<div class="inner">
							热门推荐
						</div>
					</div>
					<div class="tc">
						{{foreach from="$hotData" value="$v"}}
							<div class="item">
								<a href="arclist_{{$v['wid']}}.html" class="tt">{{$v['title']}}</a>
								<a href="arclist_{{$v['wid']}}.html" class="des">{{$v['des']}}</a>
							</div>
						{{endforeach}}
					</div>
					
				</div>
			</div>
		</div>
		
		{{include file="../Common/footer"}}
		
	</body>
</html>
