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
	    <!-- 需要载入的文件 -->
   		<script type="text/javascript" src="./Public/uploadify/jquery-1.8.2.min.js"></script>
   		<script type="text/javascript" src="./Public/uploadify/jquery.uploadify.min.js"></script>
   		<link rel="stylesheet" type="text/css" href="./Public/uploadify/uploadify.css">
   		<!--载入百度编辑器-->
	    	<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/ueditor.config.js"></script>
    		<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/ueditor.all.min.js"> </script>
    		<script type="text/javascript" charset="utf-8" src="Public/Admin/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
	    <style type="text/css">
	    	.form-control{
	    		margin-bottom: 10px;
	    	}
	    	.alert{
	    		width: 95%;
	    		margin: 0 auto;
	    	}
	    	#from{
	    		width: 95%;
	    		margin: 0 auto;
	    	}
	    	#exampleInputEmail1{
	    		width: 40%;
	    	}
	    </style>
	    
	</head>
	<body>
		<div class="alert alert-success">添加商品</div>
		<form action="" id="from" method="post" enctype="multipart/form-data">
			<!--基本信息-->
			<label for="exampleInputEmail1">基本信息</label>
			<table class="table table-bordered">
			  <tbody>
			  	<tr>
			  		<td width="250">所属分类</td>
			  		<td>
			  			<select name="shop_category_cid" class="form-control cate" id="exampleInputEmail1">
			  				<option value="">请选择分类</option>
			  				<?php foreach ($cateData as $v){?>
			  					<option value="<?php echo $v['cid']?>" tid="<?php echo $v['shop_type_tid']?>" <?php if($v['cid']==$oldData['shop_category_cid']){?>
                selected="selected"
               <?php }?>><?php echo $v['_name']?></option>
			  				<?php }?>
			  			</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>所属品牌</td>
			  		<td>
			  			<select name="shop_brand_bid" class="form-control" id="exampleInputEmail1">
			  				<option value="">所属品牌</option>
			  				<?php foreach ($brandData as $v){?>
			  					<option value="<?php echo $v['bid']?>" <?php if($v['bid']==$oldData['shop_brand_bid']){?>
                selected="selected"
               <?php }?>><?php echo $v['bname']?></option>
			  				<?php }?>
			  			</select>
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>商品名称</td>
			  		<td><input type="text" name="gname" class="form-control" id="exampleInputEmail1" value="<?php echo $oldData['gname']?>" /></td>
			  	</tr>
			  	<tr>
			  		<td>单位</td>
			  		<td><input type="text" name="unit" class="form-control" id="exampleInputEmail1" value="<?php echo $oldData['unit']?>" /></td>
			  	</tr>
			  	<tr>
			  		<td>市场价</td>
			  		<td><input type="text" name="marketprice" class="form-control" id="exampleInputEmail1" value="<?php echo $oldData['marketprice']?>" /></td>
			  	</tr>
			  	<tr>
			  		<td>商城价</td>
			  		<td><input type="text" name="shopprice" class="form-control" id="exampleInputEmail1" value="<?php echo $oldData['shopprice']?>" /></td>
			  	</tr>
			  </tbody>
			</table>
			<!--商品属性-->
			<label for="exampleInputEmail1">商品属性</label>
			<table class="table table-bordered" id="sx">
			  <tbody>
			  		<?php foreach ($listattrData as $v){?>
			  		<tr>
			  			<td><?php echo $v['taname']?></td>
			  			<td>
			  				<select name="gavalue[<?php echo $v['taid']?>][]" class="form-control" id="exampleInputEmail1">
			  						<option value=''>请选择属性</option>
			  						<?php foreach ($v['tavalue'] as $ar){?>
			  							<option value"<?php echo $ar?>" <?php if($v['judge']==$ar){?>
                selected="selected"
               <?php }?>><?php echo $ar?></option>
			  						<?php }?>
							</select>
			  			</td>
			  		</tr>
			  		<?php }?>
			  </tbody>
			</table>
			<!--商品规格-->
			<label for="exampleInputEmail1">商品规格</label>
			<table class="table table-bordered" id="gg">
			  <tbody>
			  	<?php foreach ($specData as $k=>$v){?>
				  	<tr class="s<?php echo $v['shop_type_attr_taid']?>">
				  		<td><?php echo $v['taname']?></td>
				  		<td>
				  			<select name="gavalue[<?php echo $v['shop_type_attr_taid']?>][]" class="form-control bj" id="exampleInputEmail1">
				  				<option value=''>请选择规格</option>
				  				<?php foreach ($v['spce'] as $g){?>
				  					<option value="<?php echo $g?>" <?php if($v['gtvalue']==$g){?>
                selected="selected"
               <?php }?>><?php echo $g?></option>
				  				<?php }?>
				  			</select>
				  		</td>
				  		<td>
				  			附加价格<input type="text" name="added[<?php echo $v['shop_type_attr_taid']?>][]" class="form-control" id="exampleInputEmail1" value="<?php echo $v['added']?>" style="display: inline-block;" />
				  		</td>
				  		<td>
				  			<!--<a id="tian" class="btn btn-default" href="javascript:;">添加规格</a>-->
				  			<a class="btn btn-default shan" href="javascript:;">删除规格</a>
				  		</td>
				  	</tr>
			  	<?php }?>
			  </tbody>
			  <script type="text/javascript">
			  	$(function(){
	//	        	gavalue[6][]
		        	var bb = [];
		        	for(i=0;i<$("#gg tr").length;i++){
		        		var tid = $("#gg tr").eq(i).attr('class');
		        		bb.push(tid);
		        	}
//		        	alert(bb);
		        	for(i=0;i<bb.length;i++){
						$('.'+bb[i]).eq(0).find('td').last().html('<a id="tian" class="btn btn-default" href="javascript:;">添加规格</a>');
						
//						alert(i);
		        	}
			  	})
			  </script>
			</table>
			<!--列表图-->
			<label for="exampleInputEmail1">列表图</label>
			<table class="table table-bordered">
			  <tbody>
			  	<td width="250">
			  		上传图片
			  	</td>
			  	<td>
			  		<!--上传插件-->
			  		<div lab="uploadFile">
						<!-- file表单 -->
					    <input id="f" class="ff" type="file">
					    <span>类型: *.jpg,*.png 大小: 2000KB 数量: 1（如果选择上传就覆盖当前图片哦！）</span>
					    <div id="uploadList">
					        <ul>
								<li>
									<img src="<?php echo $oldData['pic']?>"/>
									<input type="hidden" name="new_pic" value="<?php echo $oldData['pic']?>" />
									<a id="self-closes" href="javascript:;">X</a>
								</li>
					        </ul>
					    </div>
					</div>
			  		
			  		
			  	</td>
			  </tbody>
			</table>
			<!--商品图册-->
			<label for="exampleInputEmail1">商品图册</label>
			<table class="table table-bordered">
			  <tbody>
			  	<td width="250">
			  		上传图片
			  	</td>
			  	<td>
			  		<!--上传插件-->
			  		<div lab="uploadFile">
						<!-- file表单 -->
					    <input id="d" type="file" multiple="true">
					    <span>类型: *.jpg,*.png 大小: 2000KB 数量: 4(跟换图片时最好删除不必要的图片哦！避免前台错误)</span>
					    <div id="uploadLists">
					        <ul>
					        	<?php foreach ($detailData['small'] as $v){?>
								<li>
									<img src="<?php echo $v?>"/>
									<input type="hidden" name="small[]" value="<?php echo $v?>" />
									<a id="self-closes" href="javascript:;">X</a>
								</li>
								<?php }?>
					        </ul>
					    </div>
					</div>
			  	</td>
			  </tbody>
			</table>
			<!--商品详情-->
			<label for="exampleInputEmail1">商品详情</label>
			<table class="table table-bordered">
			  <tbody>
			  	<!--调用百度编辑器-->
				<script id="editor" type="text/plain" style="width:100%;height:500px;" name="intro"><?php echo $detailData['intro']?></script>
		   		<script>
		        		var ue = UE.getEditor('editor');
		   		</script>
			  </tbody>
			</table>
			<input type="hidden" name="shop_type_tid" id="dle" value="<?php echo $oldData['shop_type_tid']?>" />
			<input type="hidden" name="gid" id="" value="<?php echo Q('get.gid')?>" />
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
		 <script type="text/javascript">
	        $(function() {

	        	
	        	
	        	
//	        	分类
				$(".cate").change(function(){
					var tid = $("option:selected").attr('tid');
					$("#dle").val(tid);
					var cid = $(this).val();
					$.ajax({
						//请求方式
						type:"post",
						//请求地址
						url:"<?php echo U('Shoplist/type')?>",
						//发送数据
						data:{cid : cid},
						//指定服务器返回的数据类型
						dataType:'json',
						//服务器返回数据
						success:function(phpData){
							$("#sx tbody").empty();
							$("#gg tbody").empty();
							if(phpData == 0){
								alert('顶级分类不能添加商品');
							}
							
							for(i=0;i<phpData.length;i++){
//								属性
								if(phpData[i]['class']==0){
									var html = "<tr><td>"+phpData[i]['taname']+"</td>"
				  					html+="<td>"+"<select name='gavalue["+phpData[i]['taid']+"][]' class='form-control' id='exampleInputEmail1'><option value=''>请选择属性</option>";
	//			  					alert(html);
	
				  					var opion = phpData[i]['tavalue'].split(',');
				  					for(j=0;j<opion.length;j++){
				  						html+="<option value='"+opion[j]+"'>"+opion[j]+"</option>";
	//			  						alert(opion[j]);
				  					}
				  					html+="</select></td></tr>";
//			  						alert(html);
			  						$("#sx tbody").append(html);
								}else{
										var html = "<tr><td>"+phpData[i]['taname']+"</td>";
				  						html+="<td>"+"<select name='gavalue["+phpData[i]['taid']+"][]' class='form-control' id='exampleInputEmail1'>";
	//			  						alert(html);
	
				  						var opion = phpData[i]['tavalue'].split(',');
				  						for(j=0;j<opion.length;j++){
				  							html+="<option value='"+opion[j]+"'>"+opion[j]+"</option>";
	//			  							alert(opion[j]);
				  						}

				  						html+="</select></td><td>附加价格<input type='text' name='added["+phpData[i]['taid']+"][]' class='form-control' id='exampleInputEmail1' style='display: inline-block;' />"+"</td><td><a id='tian' class='btn btn-default' href='javascript:;'>添加规格</a></td></tr>";
			  						
//			  						alert(html);
			  						$("#gg tbody").append(html);
								}
							}
						}
					});
					
				})




//	        	删除tr
				$(".shan").live('click',function(){
					$(this).parents('tr').remove();
				})
//	    		执行添加规格
	    		$('#tian').live('click',function(){
	    			var tr = $(this).parents('tr').html();
//	    			al
	    			tr = '<tr>'+tr+'</tr>';
	    			tr = tr.replace('<a id="tian" class="btn btn-default" href="javascript:;">添加规格</a>','<a class="btn btn-default shan" href="javascript:;">删除规格</a>');
	    			$(this).parents('tr').after(tr);
	    		})
	        	
	        	
	        	
	        	
	        	
	        	
//	        	列表图
	            $('#f').uploadify({
	                'formData'     : {//POST数据
	                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
	                },
	                'fileTypeExts' : '*.jpg;*.png',
	                'swf'      : '<?php echo __PUBLIC__?>/uploadify/uploadify.swf',
	                'uploader' : '<?php echo U('uploadList')?>',//指定服务器上传的方法
	                'buttonText':'选择文件',
	                'fileSizeLimit' : '2000KB',
	                'uploadLimit' : 1,//上传文件数
	                'width':65,
	                'height':25,
	                'successTimeout':10,//等待服务器响应时间
	                'removeTimeout' : 0.2,//成功显示时间
	                'onUploadSuccess' : function(file, data, response) {
	                    //把php返回的数据转为json
	                    data=$.parseJSON(data);
	                    //获得图片地址
	                    var imageUrl = data.url;
	                    var li="<li>";
	                    li += "<img src='"+imageUrl+"'/>";
	                    li += "<input type='hidden' name='pic' value='"+data.path+"'/><a href='javascript:;' id='self-closes'>X</a>";
	                    li += "</li>";
	                    $("#uploadList ul").prepend(li);
	                }
	            });
				//关闭图片
	            var i = 1;
	            $('#self-closes').live('click',function(){
	                $(this).parent('li').remove();
		                i++;
	                $('#f').uploadify('settings','uploadLimit',i);
	                 //获取删除图片的路径
					    var delImg=$(this).siblings('input').val();
//					    alert(delImg);
					    $.ajax({
						    	type:"post",
						    	url:"<?php echo U('Shoplist/delImg')?>",
						    	data:{delImg : delImg},
						    	dataType:'json',
					    });
	            })
	            
	            
	            
//	           	商品图册
				 $('#d').uploadify({
		                'formData'     : {//POST数据
		                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
		                },
		                'fileTypeExts' : '*.jpg;*.png',
		                'swf'      : '<?php echo __PUBLIC__?>/uploadify/uploadify.swf',
		                'uploader' : '<?php echo U('upload')?>',//指定服务器上传的方法
		                'buttonText':'选择文件',
		                'fileSizeLimit' : '2000KB',
		                'uploadLimit' : 4,//上传文件数
		                'width':65,
		                'height':25,
		                'successTimeout':10,//等待服务器响应时间
		                'removeTimeout' : 0.2,//成功显示时间
		                'onUploadSuccess' : function(file, data, response) {
		                    //把php返回的数据转为json
		                    data=$.parseJSON(data);
		                    //获得图片地址
		                    var imageUrl = data.url;
		                    var li="<li>";
		                    li += "<img src='"+imageUrl+"'/>";
		                    li += "<input type='hidden' name='small[]' value='"+data.path+"'/><a href='javascript:;' id='self-close'>X</a>";
		                    li += "</li>";
		                    $("#uploadLists ul").prepend(li);
		                }
		            });
		
					//关闭图片
		            var j = 1;
		            $('#self-close').live('click',function(){
		                $(this).parent('li').remove();
					        j++;
		                $('#d').uploadify('settings','uploadLimit',j);
		                var delImg=$(this).siblings('input').val();
//					    alert(delImg);
						
					    $.ajax({
						    	type:"post",
						    	url:"<?php echo U('Shoplist/delImgt')?>",
						    	data:{delImg : delImg},
						    	dataType:'json',
					    });
					    
		            })
	        });
	    </script>
	</body>
</html>
