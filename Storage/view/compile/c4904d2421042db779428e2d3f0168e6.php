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
		<div class="table-responsive">
		  <table class="table table-bordered">
		  	<thead>
		  		<tr>
			    	<th>货品ID</th>
			    	<?php foreach ($typeatrData as $v){?>
			    		<th><?php echo $v['taname']?></th>
			    	<?php }?>
			    	<th>库存</th>
			    	<th>货号</th>
			    	<th>操作</th>
			    </tr>
		  	</thead>
		    <tbody>
		    	<form action="" method="post">
		    		<?php foreach ($lisData as $v){?>
		    		<tr>
		    			<td><?php echo $v['glid']?></td>
		    			<?php foreach ($v['type'] as $attr){?>
		    				<td><?php echo $attr?></td>
		    			<?php }?>
		    			<td><?php echo $v['inventory']?></td>
		    			<td><?php echo $v['number']?></td>
		    			<td>
		    				
			    			<a href="<?php echo U('Shoplist/huoedit',array('glid'=>$v['glid'],'gid'=>Q('get.gid'),'tid'=>Q('get.tid')))?>" class="btn btn-info">修改</a>
			    			<a href="JavaScript:if(confirm('确定删除?')) location.href='<?php echo U('Shoplist/huodel',array('glid'=>$v['glid'],'gid'=>Q('get.gid'),'tid'=>Q('get.tid')))?>';" class="btn btn-danger">删除</a>
		    			</td>
		    		</tr>
		    		<?php }?>
			    	<tr>
			    		<td>添加货品</td>
			    		<?php foreach ($typeatrData as $v){?>
			    			<td>
			    				<select name="combine[]" class="form-control" style="width: 80%;">
			    					<option value="">请选择</option>
				    				<?php foreach ($v['attr'] as $ar){?>
				    					<option value="<?php echo $ar['gtid']?>"><?php echo $ar['gtvalue']?></option>
				    				<?php }?>
			    				</select>
			    			</td>
			    		<?php }?>
			    		<td><input type="text" name="inventory" id="" value="" class="form-control" /></td>
			    		<td>现阶段还在测试中，先使用时间戳！</td>
			    		<td>
			    			<input type="hidden" name="shop_lists_gid" id="" value="<?php echo Q('get.gid')?>" />
			    			<input type="submit" value="保存添加" class="btn btn-success"/>
			    		</td>
			    	</tr>
		    	</form>
		    </tbody>
		  </table>
		</div>
	</body>
</html>
