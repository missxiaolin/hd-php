<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>权限添加</title>
	<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
</head>
<body>
	<div style="margin-top: 10px;">
		<a href="<?php echo U('User/Power')?>" class="btn btn-primary">规则列表</a>
		<a href="<?php echo U('User/Poweradd')?>" class="btn btn-warning">添加规则</a>
	</div>
	<form role="form" method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1">权限标识：</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">权限名称：</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" name="title">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">顶级权限：</label>
	    <select class="form-control" name="pid">
		  <option value="0">顶级分类</option>
		  <?php foreach ($nodeData as $v){?>
		  	<option value="<?php echo $v['id']?>"><?php echo $v['_name']?></option>
		  <?php }?>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">权限排序：</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" name="sort" value="0">
	  </div>
	  <button type="submit" class="btn btn-default">提交</button>
	</form>
</body>
</html>