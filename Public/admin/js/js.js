<script type="text/javascript">
	    	$(function(){
//	    		删除tr
				$(".shan").live('click',function(){
					$(this).parents('tr').remove();
				})
//	    		执行添加规格
	    		$('#tian').live('click',function(){
	    			var tr = $(this).parents('tr').html();
	    			tr = '<tr>'+tr+'</tr>';
	    			tr = tr.replace('<a id="tian" class="btn btn-default" href="javascript:;">添加规格</a></td></tr>','<a class="btn btn-default shan" href="javascript:;">删除规格</a></td></tr>');
	    			$(this).parents('tr').after(tr);
	    		})
//	    		发送ajax
	    		$(".cate").change(function(){
	    			var cid = $(this).val();
	    			$.ajax({
	    				type:"post",
	    				url:"{{U('Shoplist/type')}}",
	    				data:{cids:cid},
	    				dataType:'json',
	    				success:function(phpData){
//	    					alert(phpData);
							$("#sx tbody").empty();
							$("#gg tbody").empty();
							if(phpData == 0){
								alert('顶级分类不能添加商品');
							}
							$("#dle").val(phpData[0]['shop_type_tid']);
//							alert(phpData.length);
							for(i=0;i<phpData.length;i++){
	    						
			  					if(phpData[i]['class']==0){
			  						var html = "<tr><td>"+phpData[i]['taname']+"</td>"
				  					html+="<td>"+"<select name='shop_category_cid' class='form-control cate' id='exampleInputEmail1'>";
	//			  					alert(html);
	
				  					var opion = phpData[i]['tavalue'].split(',');
				  					for(j=0;j<opion.length;j++){
				  						html+="<option value=''>"+opion[j]+"</option>";
	//			  						alert(opion[j]);
				  					}
				  					html+="</select></td></tr>";
//			  						alert(html);
			  						$("#sx tbody").append(html);
			  					}else{
			  						if(phpData[i]['taname']=='颜色'){
			  							var html = "<tr><td>"+phpData[i]['taname']+"<input type='text' name='gname' class='form-control' id='exampleInputEmail1' style='display: inline-block;' /></td>";

				  						html+="</select></td><td>附加价格<input type='text' name='gname' class='form-control' id='exampleInputEmail1' style='display: inline-block;' />";
				  						html+="</td><td><a id='tian' class='btn btn-default' href='javascript:;'>添加规格</a></td></tr>";
			  						}else{
			  							var html = "<tr><td>"+phpData[i]['taname']+"</td>";
				  						html+="<td>"+"<select name='shop_category_cid' class='form-control cate' id='exampleInputEmail1'>";
	//			  						alert(html);
	
				  						var opion = phpData[i]['tavalue'].split(',');
				  						for(j=0;j<opion.length;j++){
				  							html+="<option value=''>"+opion[j]+"</option>";
	//			  							alert(opion[j]);
				  						}

				  						html+="</select></td><td>附加价格<input type='text' name='gname' class='form-control' id='exampleInputEmail1' />"+"</td><td><a id='tian' class='btn btn-default' href=''>添加规格</a></td></tr>";
			  						}
			  						
//			  						alert(html);
			  						$("#gg tbody").append(html);
			  					}
							}
	    				}
	    			});
	    		})
	    	})
	    </script>