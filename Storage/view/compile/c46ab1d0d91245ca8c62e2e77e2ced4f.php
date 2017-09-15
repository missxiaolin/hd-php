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
				<!--顶部区域-->
		<div id="top">
			<div class="top_middle">
				<div class="top_right">
					<ul>
						<li>
							
							                
								<a href="my.html"><span style="margin-right: 5px;">admin888</span>
								<a href="out.html" style="margin-right: 10px;">退出</a>
														</li>
						<li class="line"></li>
						<li>
							<a href="my.html" class="dd">个人中心</a>
						</li>
						<li class="line"></li>
						<li>
							<a href="order.html" class="dd">我的订单</a>
						</li>
						<li class="line"></li>
						<!-- <li>
							<a href="http://localhost/shop/index.php?m=Home&c=Info&a=follow" class="dd">我的收藏</a>
						</li> -->
						<!-- <li class="line"></li> -->
						<li>
							<p class="gy">
								<a href="javascript:;" class="gb">联系我<i class="iconfont">&#xe652;</i></a>
							</p>
							<div class="box gyjd">
								<img src="./Public/index/images/332.jpg"/>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		
		<!--个人中心开始-->
		<div id="login_top">
			<a href="index.html"><img src="./Public/index/images/login/login.png"/></a>
			<b class="man">个人中心</b>
		</div>
		<div id="basicdata">
			<div class="upper">
						<dl>
			<dt>订单中心</dt>
			<dd ><a href="order.html">已买到宝贝</a></dd>
			<!--<dd><a href="">退货管理</a></dd>-->
		</dl>
		<!-- <dl> -->
			<!-- <dt>关注中心</dt> -->
			<!-- <dd ><a href="http://localhost/shop/index.php?m=Home&c=Info&a=follow">关注的商品</a></dd> -->
			<!--<dd><a href="">关注的店铺</a></dd>-->
		<!-- </dl> -->
		<dl>
			<dt>设置</dt>
			<dd                 class="active"
               ><a href="my.html">个人信息</a></dd>
			<dd ><a href="address.html">收货地址</a></dd>
			<!--<dd><a href="">我的金豆</a></dd>-->
		</dl>
		<!--<dl>
			<dt>我是商家</dt>
			<dd><a href="">商家中心</a></dd>
		</dl>-->
			</div>
			<div class="downer">
				<div class="man_top">
					<ul>
						<li><a href="my.html" <?php if('portrait'=='index'){?>
                class="cure"
               <?php }?>>基本信息</a></li>
						<li><a href="portrait.html" <?php if('portrait'=='portrait'){?>
                class="cure"
               <?php }?>>头像照片</a></li>
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
					        	<?php if(!empty($oldImg)){?>
                
					        		<li>
										<img src="<?php echo $oldImg?>"/>
									</li>
					        	<?php }else{?>
									<li>
										<img src="./Public/index/images/331.jpg"/>
									</li>
								
               <?php }?>
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
				                'swf'      : '<?php echo __PUBLIC__?>/uploadify/uploadify.swf',
				                'uploader' : '<?php echo U('uploadthum')?>',//指定服务器上传的方法
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
									    	url:"<?php echo U('Shoplist/delImg')?>",
									    	data:{delImg : delImg},
									    	dataType:'json',
								    });
				            })
						})
					</script>
				</div>
			</div>
		</div>
		
		

		<!--底部区域-->
		<div id="footer">
			<div class="slogen">
				<div class="img">
					<img src="./Public/index/images/16.png"/>
					<img src="./Public/index/images/17.png"/>
					<img src="./Public/index/images/18.png"/>
					<img src="./Public/index/images/19.png" class="last"/>
				</div>
			</div>
			
			<div class="jd">
				<span class="fist">京ICP备12048441号-3</span>
				|
				<span>Copyright © 2010-2015 houdunwang.com All Rights Reserved</span>
			</div>
			<div class="jd jd_1">
				                
																	<a href="http://www.baidu.com" target="_blank">百度</a>
											                
						|
						
               						<a href="http://www.sina.com.cn/" target="_blank">新浪</a>
									
               			</div>
			<div class="jd jd_2">
				<span>联系邮箱：462441355@qq.com</span>
				<span>联系电话：15728048627</span>
			</div>
			<div class="img">
				<img src="./Public/index/images/194.png"/>
				<img src="./Public/index/images/195.png"/>
				<img src="./Public/index/images/211.jpg"/>
				<img src="./Public/index/images/212.jpg"/>
				<img src="./Public/index/images/214.jpg"/>
			</div>
		</div>
	</body>
</html>
