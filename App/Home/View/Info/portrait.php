<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>上传头像</title>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/index.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/man.css"/>
		<link rel="stylesheet" type="text/css" href="./Public/index/css/login.css"/>
		<script src="./Public/index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="./Public/index/js/top.js" type="text/javascript" charset="utf-8"></script>
		 <!-- 需要载入的文件 -->
   		<script type="text/javascript" src="./Public/uploadify/jquery-1.8.2.min.js"></script>
   		<script type="text/javascript" src="./Public/uploadify/jquery.uploadify.min.js"></script>
   		<link rel="stylesheet" type="text/css" href="./Public/uploadify/uploadify.css">
	</head>
	<body>
		{{include file="../Common/header"}}
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">个人中心</b>
		</div>
		<div id="basicdata">
			<div class="upper">
				{{include file="../Common/infoleft"}}
			</div>
			<div class="downer">
				<div class="man_top">
					<ul>
						<li><a href="my.html" {{if value="'ACTION' eq 'index'"}}class="cure"{{endif}}>基本信息</a></li>
						<li><a href="portrait.html" {{if value="'ACTION' eq 'portrait'"}}class="cure"{{endif}}>头像照片</a></li>
					</ul>
				</div>
				<div class="up_img">
					<!--上传头像-->
					<!--上传插件-->
			  		<div lab="uploadFile">
						<!-- file表单 -->
					    <input id="f" type="file">
					    <span>仅支持JPG、PNG格式，文件小于4M</span>
					    <div id="uploadList">
					        <ul>
					        	{{if value="!empty($oldImg)"}}
					        		<li>
										<img src="{{$oldImg}}"/>
									</li>
					        	{{else}}
									<li>
										<img src="./Public/index/images/331.jpg"/>
									</li>
								{{endif}}
					        </ul>
					    </div>
					</div>
					<script type="text/javascript">
						$(function(){
//	        				列表图
				            $('#f').uploadify({
				                'formData'     : {//POST数据
				                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
				                },
				                'fileTypeExts' : '*.jpg;*.png',
				                'swf'      : '{{__PUBLIC__}}/uploadify/uploadify.swf',
				                'uploader' : '{{U('uploadthum')}}',//指定服务器上传的方法
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
				                    var li="<li style='z-index: 6'>";
				                    li += "<img src='"+imageUrl+"'/>";
//				                    li += "<input type='hidden' name='pic' value='"+data.path+"'/><a href='javascript:;' id='self-closes'>X</a>";
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
									    	url:"{{U('Shoplist/delImg')}}",
									    	data:{delImg : delImg},
									    	dataType:'json',
								    });
				            })
						})
					</script>
				</div>
			</div>
		</div>
		
		{{include file="../Common/footer"}}
	</body>
</html>
