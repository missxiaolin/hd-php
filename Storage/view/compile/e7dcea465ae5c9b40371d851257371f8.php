<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>分配权限</title>
	<link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
    <!--载入hdjs-->
	<link rel="stylesheet" href="./Public/hdjs/hdjs.css">
	<script src="./Public/hdjs/jquery-1.8.2.min.js"></script>
	<script src="./Public/hdjs/hdjs.min.js"></script>
</head>
<body>
	<div style="margin-top: 10px;margin-bottom: 10px;">
		<a href="<?php echo U('User/role')?>" class="btn btn-primary">角色列表</a>
		<a href="<?php echo U('User/roleallot')?>" class="btn btn-warning">设置权限</a>
	</div>
	<form action="" method="post">
		<div class="code">
			<table class="hd-table hd-table-list">
				<thead>
					<tr>
						<td width="150">分配权限</td>
						<td></td>
					</tr>
					
				</thead>
				<tbody>
					<?php foreach ($nodeData as $v){?>
						<tr>
							<td colspan="2">
								<label>
									<input type="checkbox" name="nodeid[]" value="<?php echo $v['id']?>" checked="checked" />
									<?php echo $v['title']?>
								</label>
							</td>
							
						</tr>
						<?php foreach ($v['_data'] as $value){?>
							<tr>
								<td><input type="checkbox" name="nodeid[]" class="parent" value="<?php echo $value['id']?>" /><?php echo $value['title']?></td>
								<td>
									<?php foreach ($value['_data'] as $son){?>
										<label>
											<input type="checkbox" class="son" name="nodeid[]" value="<?php echo $son['id']?>" />
											<?php echo $son['title']?>
										</label>
									<?php }?>
								</td>
							</tr>
						<?php }?>
					<?php }?>
				</tbody>
			</table>
		</div>
		<input type="submit" value="提交" style="margin-top: 10px;" class="hd-btn hd-btn-primary hd-btn-lg"/>
	</form>
	<script type="text/javascript">
		$(function(){
			$(".parent").click(function(){
				if($(this).parent().siblings('td').find('.active').length==0){
					$(this).parent().siblings('td').find('.son').attr('checked',true).addClass('active');
				}else{
					$(this).parent().siblings('td').find('.son').attr('checked',false).removeClass('active');
				}
				
			})
		})
	</script>
</body>
</html>