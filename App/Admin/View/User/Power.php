<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>权限列表</title>
	<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
</head>
<body>
	<div style="margin-top: 10px;">
		<a href="{{U('User/Power')}}" class="btn btn-primary">规则列表</a>
		<a href="{{U('User/Poweradd')}}" class="btn btn-warning">添加规则</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>规则标识</th>
				<th>规则名称</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			{{foreach from="$nodeData" value="$v"}}
				<tr>
					<td>{{$v['id']}}</td>
					<td>{{$v['name']}}</td>
					<td>{{$v['_name']}}</td>
					<td>
						<a href="" class="btn btn-sm btn-warning" style="background-color: #CCCCCC;">修改</a>
						<a href="" class="btn btn-sm btn-danger">删除权限</a>
						
					</td>
				</tr>
			{{endforeach}}
		</tbody>
		
	</table>
</body>
</html>