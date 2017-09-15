<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>添加用户</title>
	<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
</head>
<body>
	<div style="margin-top: 10px;margin-bottom: 10px;">
		<a href="{{U('User/user')}}" class="btn btn-primary">用户列表</a>
		<a href="{{U('User/useradd')}}" class="btn btn-warning">添加用户</a>
	</div>
	<form class="form" method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1">用户</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="用户" name="user">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">密码</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="密码" name="userpassword">
	  </div>
	  <div class="checkbox">
	  	状态：
	    <label style="padding-left: 0px;">
	      <input type="radio" name="islock" checked="checked" value="0">启用
	      <input type="radio" name="islock" value="1">禁止
	    </label>
	  </div>
	  <div class="checkbox">
	  	角色：
	  	{{foreach from="$roleData" value="$v"}}
	    <label style="padding-left: 0px;">
	      	<input type="checkbox" name="roleid[]" value="{{$v['id']}}" style="margin:9px 0 0;position: relative;">{{$v['name']}}
	    </label>
	    {{endforeach}}
	  </div>
	  <button type="submit" class="btn btn-default">添加用户</button>
	</form>
</body>
</html>