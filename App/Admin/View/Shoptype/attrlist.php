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
			  <th width="70">属性id</th>
			  <th width="150">属性名称</th>
			  <th width="150">属性类别</th>
			  <th>属性值</th>
			  <th width="210">操作</th>
			</tr>
			{{foreach from="$attrData" value="$v"}}
			<tr>
				<td>{{$v['taid']}}</td>
				<td>{{$v['taname']}}</td>
				<td>{{if value="$v['class'] eq 0"}}属性{{elseif value="$v['class'] eq 1"}}规格{{endif}}</td>
				<td>{{$v['tavalue']}}</td>
				<td>
					<a href="{{U('Shoptype/attredit',array('taid'=>$v['taid']))}}" class="btn btn-sm btn-warning">编辑</a>
					<!--传参cid-->
					<a href="JavaScript:if(confirm('确定删除?')) location.href='{{U('Shoptype/attrdel',array('taid'=>$v['taid']))}}';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			{{endforeach}}
		</table>
		<a href="{{U('Shoptype/attradd',array('tid'=>$tid))}}" class="btn btn-primary btn-lg active" role="button">添加属性</a>
	</body>
</html>