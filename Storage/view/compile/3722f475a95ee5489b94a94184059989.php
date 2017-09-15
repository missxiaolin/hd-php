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
			  <th width="30">cid</th>
			  <th>分类名称</th>
			  <th width="240">操作</th>
			</tr>
			<?php foreach ($cateData as $v){?>
			<tr>
				<td><?php echo $v['cid']?></td>
				<td><?php echo $v['cname']?></td>
				<td>
					<a href="<?php echo U('Arccate/edit',array('cid'=>$v['cid']))?>" class="btn btn-sm btn-warning">编辑</a>
					<!--传参cid-->
					<a href="JavaScript:if(confirm('确定删除?')) location.href='<?php echo U('Arccate/del',array('cid'=>$v['cid']))?>';" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr>
			<?php }?>

		</table>
	</body>
</html>