<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>角色添加</title>
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
	<form class="form-horizontal" role="form" method="post" style="margin-top: 10px;">
	  <div class="form-group">
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputEmail3" placeholder="角色" name="name">
	    </div>
	  </div>
	  <input type="submit" id="" name="" class="btn btn-info" />
	</form>
</body>
</html>