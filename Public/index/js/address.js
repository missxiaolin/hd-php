$(function(){
//	收货地址
	
	$('.user').blur(function(){
		if($(this).val()==''){
			$(this).next('.ts').show();
		}else{
			$(this).next('.ts').hide();
		}
	})
	
	$('.ressd').blur(function(){
		if($(this).val()==''){
			$(this).next('.ts').show();
		}else{
			$(this).next('.ts').hide();
		}
	})
	
	$('.phone').blur(function(){
		if($(this).val()==''){
			$(this).next().next('.ts').show();
		}else{
			$(this).next().next('.ts').hide();
		}
	})
	
//	编辑
//	alert(1);
	$('.bjdz').live('click',function(){
		
		
		$('#new_dz').attr('hd',0);
		$("#new_dz .top span").html('编辑收货地址');
		$('#max_canva').show();
		$('#new_dz').show();
		$(".middle .item .tj").html('<input type="hidden" name="did" class="did" value="" /><input type="submit" name="" class="bc" value="保存收货地址" />');
		var did = $(this).attr('bj');
		indexs = $(".bjdz").index(this);
//		$(".new_dz").eq(indexs).html(1);
//		alert(indexs);
		
//		获取原来数据
		$.ajax({
			type:"post",
			url:oldedit,
			dataType:'json',
			data:{did:did},
			success:function(phpData){
//				收货人
				$('input[name=name]').val(phpData.name);
//				地区
				var ress = phpData.region;
				//初始化方法
				area.init('area');
				//修改的时候默认被选中效果
				area.selected(phpData.region[0],phpData.region[1],phpData.region[2]);
//				详细地址
				$('input[name=address]').val(phpData.address);
//				手机号码
				$('input[name=telephone]').val(phpData.telephone);
//				电话号码
				$('input[name=cellphone]').val(phpData.cellphone);
//				邮箱
				$('input[name=emil]').val(phpData.emil);
//				地址别名
				$('input[name=addressname]').val(phpData.addressname);
//				修改那一条
				$('input[name=did]').val(phpData.did);
			}
		});
		
	})
	var city = 0;
	$("#from").submit(function(){
//		收货人
		if($('.user').val()==''){
			$('.user').next('.ts').show();
			return false;
		}
		// alert($('.xialakuang').length);
		$.each($('.xialakuang'),function(){
            if($(this).val() == 0){
            	$('.city').html("请填写收货地址！");
            	return false;
            }else{
            	$('.city').html("");
            	city = 1;
            }
        })
        if(city == 0){
        	return false;
        }
//		详细地址
		if($('.ressd').val()==''){
			$('.ressd').next('.ts').show();
			return false;
		}
		if($('.phone').val()==''){
			$('.phone').next().next('.ts').html('请填写收货人手机号码').show();
			return false;
		}
		var tel = $('.phone').val();
		 var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
		 if (reg.test(tel)) {
		     $('.phone').next().next('.ts').html('').hide();
		 }else{
		     $('.phone').next().next('.ts').html('手机号码不正确！').show();
		     return false;
		 };



		if($('#new_dz').attr('hd')==1){
			var address = $('#from').serialize();
//			添加收货地址
			$.ajax({
				type:"post",
				url:add,
				dataType:'json',
				data:address,
				success:function(phpData){
					var html = '<div class="new_dz"><h3>'+phpData.name+'</h3>';
					html+= '<div class="smc"><div class="item_lcol"><div class="item">';
					html+='<span>收货人：</span><div class="fl">'+phpData.name+'</div></div>';
					html+='<div class="item"><span>所在地区：</span><div class="fl">'+phpData.region+'</div></div>';
					html+='<div class="item"><span>地址：</span><div class="fl">'+phpData.address+'</div></div>';
					html+='<div class="item"><span>手机：</span><div class="fl">'+phpData.telephone+'</div></div>';
					if(phpData.cellphone){
						html+='<div class="item"><span>固定电话：</span><div class="fl">'+phpData.cellphone+'</div></div>';
					}
					if(phpData.emil){
						html+='<div class="item"><span>电子邮箱：</span><div class="fl">'+phpData.emil+'</div></div></div>';
					}
					html+='<div class="item_rcol"><div class="dd">';
					html+='<a href="javascript:;" class="bjdz" bj="'+phpData.did+'">编辑</a>';
					html+='<a href="javascript:;" class="del" bj="'+phpData.did+'">删除</a></div></div></div></div>';
					$(".new_fo").append(html);
					$('#max_canva').hide();
					$('#new_dz').hide();
					//初始化方法
					area.init('area');
					//修改的时候默认被选中效果
					area.selected('0','0','0');
					$('#from')[0].reset();
				}
			});
		}
		if($('#new_dz').attr('hd')==0){
			var exitress = $('#from').serialize();
//			修改收货地址
			$.ajax({
				type:"post",
				url:edit,
				dataType:'json',
				data:exitress,
				success:function(phpData){
					var html = '<h3>'+phpData.name+'</h3>';
					html+= '<div class="smc"><div class="item_lcol"><div class="item">';
					html+='<span>收货人：</span><div class="fl">'+phpData.name+'</div></div>';
					html+='<div class="item"><span>所在地区：</span><div class="fl">'+phpData.region+'</div></div>';
					html+='<div class="item"><span>地址：</span><div class="fl">'+phpData.address+'</div></div>';
					html+='<div class="item"><span>手机：</span><div class="fl">'+phpData.telephone+'</div></div>';
					if(phpData.cellphone){
						html+='<div class="item"><span>固定电话：</span><div class="fl">'+phpData.cellphone+'</div></div>';
					}
					if(phpData.emil){
						html+='<div class="item"><span>电子邮箱：</span><div class="fl">'+phpData.emil+'</div></div></div>';
					}
					html+='<div class="item_rcol"><div class="dd">';
					html+='<a href="javascript:;" class="bjdz" bj="'+phpData.did+'">编辑</a>';
					html+='<a href="javascript:;" class="del" bj="'+phpData.did+'">删除</a></div></div></div>';
//					$(".new_fo").append(html);
					$(".new_dz").eq(indexs).html(html);
					$('#max_canva').hide();
					$('#new_dz').hide();
					//初始化方法
					area.init('area');
					//修改的时候默认被选中效果
					area.selected('0','0','0');
					$('#from')[0].reset();
				}
			});
		}
	})
	

	
//	删除收货地址
	$(".del").live('click',function(){
		var did = $(this).attr('bj');
		var index = $(".del").index(this);
		$.ajax({
			type:"post",
			url:delurl,
			data:{did:did},
			dataType:'text',
			async:true,
			success:function(phpData){
				if(phpData==1){
					$(".new_dz").eq(index).remove();
				}
			}
		});
	})
	
	
	
	
	
	$('.dj').click(function(){
		var value = $(this).attr('title');
		$('.alias').val(value);
	})
	
	
	
	function max(){
		var w = $(window).width();
		var h = $(window).height();
		var he = window.screen.availHeight;
		
		$('#max_canva').css({
			'height':h+'px',
			'width':w+'px',
		});
		
		l = (w-$('#new_dz').width())/2;
		t = (he-$('#new_dz').height())/4;
		$('#new_dz').css({
			'left':l+'px',
			'top':t+'px'
		});
	}
	max();
	$(window).resize(function(){
		max();
	})
	
	
	
//	点击显示
	$('#show').click(function(){
		$("#new_dz .top span").html('添加收货地址');
		$(".did").remove();
		$('#new_dz').attr('hd',1);
		$('#max_canva').show();
		$('#new_dz').show();
	})
	
//	点击隐藏
	$('#hide').click(function(){
		$('#max_canva').hide();
		$('#new_dz').hide();
		//初始化方法
		area.init('area');
		//修改的时候默认被选中效果
		area.selected('0','0','0');
		$('#from')[0].reset();
	})

	
	
//	点击选中
	$('.consignee_item').click(function(){
		$('#main .steps .scroll ul li').removeClass('active');
		$(this).parent('li').addClass('active')
	})
//	大于0隐藏
	$('#main .steps .scroll ul li:gt(0)').hide();
//	点击判断文本内容进行切换
	$('#main .steps .scroll .zk').click(function(){
		if($(this).html()=='更多地址'){
			$(this).html('收起地址');
			$('#main .steps .scroll ul li').show();
		}else if($(this).html()=='收起地址'){
			$(this).html('更多地址');
			$('#main .steps .scroll ul li:gt(0)').hide();
		}
		
	})
	
//	支付方式
	$('#main .steps .scroll .pay a').click(function(){
		$('#main .steps .scroll .pay a').removeClass('actibe');
		$(this).addClass('actibe');
	})
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
})
