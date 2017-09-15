<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>角色</title>
	<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
</head>
<body>
	<div style="margin-top: 10px;">
		<a href="{{U('User/role')}}" class="btn btn-primary">角色列表</a>
		<a href="{{U('User/roleadd')}}" class="btn btn-warning">添加角色</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>角色名称</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			{{foreach from="$roleData" value="$v"}}
				<tr>
					<td>{{$v['id']}}</td>
					<td>{{$v['name']}}</td>
					<td>
						<a href="{{U('roleallot',array('id'=>$v['id']))}}" class="btn btn-sm btn-warning" style="background-color: #3071A9;">分配权限</a>
						<a href="" class="btn btn-sm btn-warning" style="background-color: #CCCCCC;">修改</a>
						<a href="" class="btn btn-sm btn-danger">删除</a>
					</td>
				</tr>
			{{endforeach}}
		</tbody>
	</table>
</body>
</html>