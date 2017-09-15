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
		<table class="table table-hover">
			<tr class="active">
			  <th width="30">tid</th>
			  <th>类型名称</th>
			  <th width="210">操作</th>
			</tr>
			{{foreach from="$typeData" value="$v"}}
			<tr>
				<td>{{$v['tid']}}</td>
				<td>{{$v['tname']}}</td>
				<td>
					<a href="{{U('Shoptype/attrlist',array('tid'=>$v['tid']))}}" class="btn btn-sm btn-primary">属性列表</a>
					<a href="{{U('Shoptype/edit',array('tid'=>$v['tid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<!--传参cid-->
					<a href="JavaScript:if(confirm('确定删除?')) location.href='{{U('Shoptype/del',array('tid'=>$v['tid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}

		</table>
	</body>
</html>