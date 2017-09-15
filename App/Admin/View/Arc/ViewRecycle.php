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
		<table class="table table-hover">
			<h2>回收站</h2>
			<tr class="active">
			  <th width="30">wid</th>
			  <th>标题</th>
			  <th width="100">分类</th>
			  <th width="200">操作</th>
			</tr>
		{{foreach from="$arcData" value="$v"}}	
			<tr>
				<td>{{$v['wid']}}</td>
				<td>{{$v['title']}}</td>
				<td>{{$v['cname']}}</td>
				<td>
					<a href="{{U('restore',array('wid'=>$v['wid']))}}" class="btn btn-sm btn-warning">还原</a>
					<a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('wid'=>$v['wid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
		{{endforeach}}
		</table>
	</body>
</html>
