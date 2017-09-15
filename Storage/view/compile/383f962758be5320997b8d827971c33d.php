<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="./Public/admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="./Public/admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="./Public/admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="./Public/admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<div class="alert alert-success">添加子分类</div>
		<form action="" method="post">
			
			<div class="form-group">
				<label for="exampleInputEmail1">子分类名称</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称" required="" name="cname">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">子分类类型</label>
				<select name="shop_type_tid">
					<option value="0">请选择</option>
					<?php foreach ($typeData as $v){?>
						<option value="<?php echo $v['tid']?>"><?php echo $v['tname']?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">排序</label>
				<input id="exampleInputEmail1" class="form-control" type="text" value="0" required="" name="sort">
			</div>
			<input type="hidden" name="pid" id="pid" value="<?php echo Q('get.cid')?>" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
		
	</body>
</html>
