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
			    	<tr>
			    		<td>
			    			<?php echo $oldData['glid']?>
			    			<input type="hidden" name="glid" id="glid" value="<?php echo $oldData['glid']?>" />
			    		</td>
			    		<?php foreach ($typeatrData as $k=>$v){?>
			    			<td>
			    				<select name="combine[]" class="form-control" style="width: 80%;">
			    					<option value="">请选择</option>
				    				<?php foreach ($v['attr'] as $ar){?>
				    					<option value="<?php echo $ar['gtid']?>" <?php if($ar['gtid']==$oldData['combine'][$k]){?>
                selected="selected"
               <?php }?>><?php echo $ar['gtvalue']?></option>
				    				<?php }?>
			    				</select>
			    			</td>
			    		<?php }?>
			    		<td><input type="text" name="inventory" class="form-control" value="<?php echo $oldData['inventory']?>" /></td>
			    		<td><?php echo $oldData['number']?></td>
			    		<td>
			    			
			    			<input type="submit" value="确认修改" class="btn btn-success"/>
			    		</td>
			    	</tr>
		    	</form>
		    </tbody>
		  </table>
		</div>
	</body>
</html>
