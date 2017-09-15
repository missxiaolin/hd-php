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
		<div class="alert alert-success">添加品牌</div>
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="exampleInputEmail1">品牌名称</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称" required="" name="bname" value="{{$oldData['bname']}}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">品牌LOGO</label><span style="margin-left: 10px;">(建议你上传180*60像素的图片，保证图片不损坏)</span>
				<input type="file" name="logo" id="" value="" />
				<img src="{{$oldData['logo']}}"/>
				<input type="hidden" name="logo" id="" value="{{$oldData['logo']}}" />
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">排序</label>
				<input id="exampleInputEmail1" class="form-control" type="text" value="{{$oldData['sort']}}" required="" name="sort">
			</div>
			<input type="hidden" name="bid" id="" value="{{$oldData['bid']}}" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
		
	</body>
</html>
