<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>后台用户</title>
	<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
</head>
<body>
	<div style="margin-top: 10px;">
		<a href="{{U('User/user')}}" class="btn btn-primary">用户列表</a>
		<a href="{{U('User/useradd')}}" class="btn btn-warning">添加用户</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>用户名</th>
				<th>别名</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			{{foreach from="$userData" value="$v"}}
				<tr>
					<td>{{$v['user']}}</td>
					<td>{{$v['username']}}</td>
					<td>
						<a href="" class="btn btn-sm btn-warning">禁用</a>
						<a href="" class="btn btn-sm btn-danger">删除用户</a>
						
					</td>
				</tr>
			{{endforeach}}
		</tbody>
		
	</table>
</body>
</html>