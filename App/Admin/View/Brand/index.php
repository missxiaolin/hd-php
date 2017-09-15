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
	</head>
	<body>
		<form action="" method="post">
		<table class="table table-hover">
			<tr class="active">
			  <th width="70">品牌ID</th>
			  <th>品牌名称</th>
			  <th>LOGO</th>
			  <th width="100">排序</th>
			  <th width="240">操作</th>
			</tr>
			{{foreach from="$brandData" value="$v"}}
			<tr>
				<td>{{$v['bid']}}</td>
				<td>{{$v['bname']}}</td>
				<td><img src="{{$v['logo']}}"/></td>
				<td><input type="text" name="{{$v['bid']}}" value="{{$v['sort']}}" style="width: 25px; height: 25px;"/></td>
				<td>
					<a href="{{U('Brand/edit',array('bid'=>$v['bid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<!--传参cid-->
					<a href="JavaScript:if(confirm('确定删除?')) location.href='{{U('Brand/del',array('bid'=>$v['bid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}

		</table>
			<input class="btn btn-primary" type="submit" value="排序"/>
		</form>
	</body>
</html>