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
		<div class="alert alert-success">添加文章</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="exampleInputEmail1">文章标题</label>
				<input id="exampleInputEmail1" class="form-control" type="text" name="title" placeholder="请输入文章标题" >
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">作者</label>
				<input id="exampleInputEmail1" class="form-control" type="text" name="author" placeholder="请输入文章作者" >
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">所属分类</label>
				<select name="shop_arc_cate_cid" class="form-control">
					<option value="">请选择</option>
					<!--从Cate分类表获取标签数据-->
					<?php foreach ($cateData as $c){?>
						<option value="<?php echo $c['cid']?>"><?php echo $c['cname']?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">缩略图</label>
				<input id="exampleInputEmail1" type="file" name="thumb">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章摘要</label>
				<textarea name="digest" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章关键字</label>
				<textarea name="keywords" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字"></textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章描述</label>
				<textarea name="des" rows="5" cols=""  class="form-control" placeholder="请输入文章描述"></textarea>
			</div>
			 <script type="text/javascript" charset="utf-8" src="./Public/ueditor/ueditor.config.js"></script>
		    <script type="text/javascript" charset="utf-8" src="./Public/ueditor/ueditor.all.min.js"> </script>
		    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
		    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
		    <script type="text/javascript" charset="utf-8" src="./Public/ueditor/lang/zh-cn/zh-cn.js"></script>
			<div class="form-group">
				<label for="exampleInputEmail1">文章正文</label>
				<!--调用百度编辑器-->
				<script id="editor" type="text/plain" style="width:100%;height:500px;" name="content"></script>
			    <script>
			        var ue = UE.getEditor('editor');
			        
			    </script>
			</div>
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
