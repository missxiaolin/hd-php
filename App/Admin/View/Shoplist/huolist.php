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
			    	{{foreach from="$typeatrData" value="$v"}}
			    		<th>{{$v['taname']}}</th>
			    	{{endforeach}}
			    	<th>库存</th>
			    	<th>货号</th>
			    	<th>操作</th>
			    </tr>
		  	</thead>
		    <tbody>
		    	<form action="" method="post">
		    		{{foreach from="$lisData" value="$v"}}
		    		<tr>
		    			<td>{{$v['glid']}}</td>
		    			{{foreach from="$v['type']" value="$attr"}}
		    				<td>{{$attr}}</td>
		    			{{endforeach}}
		    			<td>{{$v['inventory']}}</td>
		    			<td>{{$v['number']}}</td>
		    			<td>
		    				
			    			<a href="{{U('Shoplist/huoedit',array('glid'=>$v['glid'],'gid'=>Q('get.gid'),'tid'=>Q('get.tid')))}}" class="btn btn-info">修改</a>
			    			<a href="JavaScript:if(confirm('确定删除?')) location.href='{{U('Shoplist/huodel',array('glid'=>$v['glid'],'gid'=>Q('get.gid'),'tid'=>Q('get.tid')))}}';" class="btn btn-danger">删除</a>
		    			</td>
		    		</tr>
		    		{{endforeach}}
			    	<tr>
			    		<td>添加货品</td>
			    		{{foreach from="$typeatrData" value="$v"}}
			    			<td>
			    				<select name="combine[]" class="form-control" style="width: 80%;">
			    					<option value="">请选择</option>
				    				{{foreach from="$v['attr']" value="$ar"}}
				    					<option value="{{$ar['gtid']}}">{{$ar['gtvalue']}}</option>
				    				{{endforeach}}
			    				</select>
			    			</td>
			    		{{endforeach}}
			    		<td><input type="text" name="inventory" id="" value="" class="form-control" /></td>
			    		<td>现阶段还在测试中，先使用时间戳！</td>
			    		<td>
			    			<input type="hidden" name="shop_lists_gid" id="" value="{{Q('get.gid')}}" />
			    			<input type="submit" value="保存添加" class="btn btn-success"/>
			    		</td>
			    	</tr>
		    	</form>
		    </tbody>
		  </table>
		</div>
	</body>
</html>
