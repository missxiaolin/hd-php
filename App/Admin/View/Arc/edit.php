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
	    <script type="text/javascript" charset="utf-8" src="./Public/admin/ueditor1_4_3/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="./Public/admin/ueditor1_4_3/ueditor.all.min.js"> </script>
		<script type="text/javascript" charset="utf-8" src="./Public/admin/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
	</head>
	<body>
		<div class="alert alert-success">添加文章</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="exampleInputEmail1">文章标题</label>
				<input id="exampleInputEmail1" class="form-control" type="text" name="title" placeholder="请输入文章标题" value="{{$oldData['title']}}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">作者</label>
				<input id="exampleInputEmail1" class="form-control" type="text" name="author" placeholder="请输入文章作者" value="{{$oldData['author']}}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">所属分类</label>
				<select name="shop_arc_cate_cid" class="form-control">
					<option value="">请选择</option>
					<!--从Cate分类表获取标签数据-->
					{{foreach from="$cateData" value="$c"}}
						<option value="{{$c['cid']}}" {{if value="$c['cid'] eq $oldData['cid']"}}selected="selected"{{endif}}>{{$c['cname']}}</option>
					{{endforeach}}
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">缩略图</label>
				<input id="exampleInputEmail1" type="file" name="thumb">
				<img src="{{$oldData['thumb']}}"/>
				<input type="hidden" name="thumb" id="thumb" value="{{$oldData['thumb']}}" />
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章摘要</label>
				<textarea name="digest" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字">{{$oldData['digest']}}</textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章关键字</label>
				<textarea name="keywords" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字">{{$oldData['keywords']}}</textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章描述</label>
				<textarea name="des" rows="5" cols=""  class="form-control" placeholder="请输入文章描述">{{$oldData['des']}}</textarea>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章正文</label>
				<!--调用百度编辑器-->
				<script id="editor" type="text/plain" style="width:100%;height:500px;" name="content">{{$oldData['content']}}</script>
			    <script>
			        var ue = UE.getEditor('editor');
			    </script>
			</div>
			<input type="hidden" name="wid" id="wid" value="{{$oldData['wid']}}" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
