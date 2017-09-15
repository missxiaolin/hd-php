<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>京东快报</title>
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
				<div class="count">
					
					{{$arcData['content']}}
					
				</div>
				<div class="fx">
			<!-- 多说评论框 start -->
			<div class="ds-thread" data-thread-key="{{$arcData['wid']}}" data-title="{{$arcData['title']}}" data-url="{{U('Arc/arccon',array('wid'=>$arcData['wid']))}}"></div>
			<!-- 多说评论框 end -->
			<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
			<script type="text/javascript">
			var duoshuoQuery = {short_name:"xiaolinouye"};
				(function() {
					var ds = document.createElement('script');
					ds.type = 'text/javascript';ds.async = true;
					ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
					ds.charset = 'UTF-8';
					(document.getElementsByTagName('head')[0] 
					 || document.getElementsByTagName('body')[0]).appendChild(ds);
				})();
				</script>
			<!-- 多说公共JS代码 end -->

				</div>
				
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
