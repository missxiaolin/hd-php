<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title></title>
    <!-- Loading Bootstrap -->
    <link href="./Public/admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/admin/Flat/img/favicon.ico">
</head>
<body>
		<div class="alert alert-success">修改属性名称</div>
		<form action="" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">属性名称</label>
				<input id="exampleInputEmail1" required="" class="form-control" name="taname" type="text" placeholder="请输入分类名称" value="{{$attrData['taname']}}">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">属性类别</label>
				<label class="radio-inline">
				  <input type="radio" name="class" id="inlineRadio1" value="0" {{if value="$attrData['class'] eq 0"}}checked="checked" {{endif}}>属性
				</label>
				<label class="radio-inline">
				  <input type="radio" name="class" id="inlineRadio2" value="1" {{if value="$attrData['class'] eq 1"}}checked="checked" {{endif}}>规格
				</label>
				
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">类型属性值（多个属性可以用|分割）</label>
				<div>
					<textarea required="" name="tavalue" rows="" cols="" style="width: 100%; height: 300px;resize: none;">{{$attrData['tavalue']}}</textarea>
				</div>
			</div>
			<input type="hidden" name="taid" id="" value="{{$attrData['taid']}}" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
</body>
</html>