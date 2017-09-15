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
		<a href="{{U('User/role')}}" class="btn btn-primary">角色列表</a>
		<a href="{{U('User/roleallot')}}" class="btn btn-warning">设置权限</a>
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
					{{foreach from="$nodeData" value="$v"}}
						<tr>
							<td colspan="2">
								<label>
									<input type="checkbox" name="nodeid[]" value="{{$v['id']}}" checked="checked" />
									{{$v['title']}}
								</label>
							</td>
							
						</tr>
						{{foreach from="$v['_data']" value="$value"}}
							<tr>
								<td><input type="checkbox" name="nodeid[]" class="parent" value="{{$value['id']}}" />{{$value['title']}}</td>
								<td>
									{{foreach from="$value['_data']" value="$son"}}
										<label>
											<input type="checkbox" class="son" name="nodeid[]" value="{{$son['id']}}" />
											{{$son['title']}}
										</label>
									{{endforeach}}
								</td>
							</tr>
						{{endforeach}}
					{{endforeach}}
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