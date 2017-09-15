<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
	</head>
	<body>
		<h2>商品列表</h2>
		<div class="table-responsive">
		  <table class="table table-bordered">
		  	<thead>
		  		<tr>
			    	<th>ID</th>
			    	<th>商品名称</th>
			    	<th>价格</th>
			    	<th>库存</th>
			    	<th>添加时间</th>
			    	<th>操作</th>
			    </tr>
		  	</thead>
		    <tbody>
		    	{{foreach from="$listsData" value="$v"}}
		    	<tr>
		    		<td>{{$v['gid']}}</td>
		    		<td>{{$v['gname']}}</td>
		    		<td>
		    			<div style="text-decoration: line-through;">市场价：{{$v['marketprice']}}</div>
		    			<div>商城价：{{$v['shopprice']}}</div>
		    		</td>
		    		<td>{{$v['inventory']}}</td>
		    		<td>{{$v['time']}}</td>
		    		<td>
		    			<a href="{{U('Shoplist/huolist',array('gid'=>$v['gid'],'tid'=>$v['shop_type_tid']))}}" class="btn btn-default">货品列表</a>
		    			<a href="{{U('Shoplist/edit',array('gid'=>$v['gid']))}}" class="btn btn-info">修改</a>
		    			<a href="JavaScript:if(confirm('确定删除?')) location.href='{{U('Shoplist/del',array('gid'=>$v['gid']))}}';" class="btn btn-danger">删除</a>
		    		</td>
		    	</tr>
		    	{{endforeach}}
		    </tbody>
		  </table>
		</div>
	</body>
</html>
