$(function(){
	$('#froms').submit(function() {
		// alert(1);
		if(!$('input[name=addressid]').length){
			$('.shop_address').text('请填写地址！');
			return false;
		}
		var b=0;
		$('.danxuan').each(function(){
			// alert(3);
			if($('.danxuan').eq(i).attr('checked') == 'checked'){
				b=1;
			}else{
				b=0;
			}
		})
		// alert(b);
		if(b==0){
			$('.shop_address').text('您还没有勾选地址！');
			return false;
		}
		
	});


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
			$('.phone').next().next('.ts').show();
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
					var html = '<li><input type="radio" name="addressid" class="danxuan" id="'+phpData.did+'" value="'+phpData.did+'"><div class="consignee_item"><span>'+phpData.name+'</span>';
					html+='<i></i></div><div class="addr_detail">';
					html+='<span>'+phpData.name+'</span><span>'+phpData.region+'</span>';
					html+='<span>'+phpData.telephone+'</span></div><div class="op_btns">';
					html+='<a href="javascript:;" class="bjdz" bj="'+phpData.did+'">编辑</a>';
					html+='<a href="javascript:;" class="del" bj="'+phpData.did+'">删除</a>';
					html+='</div></li>';
					$("#dz").append(html);
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
					var html = '<div class="consignee_item"><span>'+phpData.name+'</span>';
					html+='<i></i></div><div class="addr_detail">';
					html+='<span>'+phpData.name+'</span><span>'+phpData.region+'</span>';
					html+='<span>'+phpData.telephone+'</span></div><div class="op_btns">';
					html+='<a href="javascript:;" class="bjdz" bj="'+phpData.did+'">编辑</a>';
					html+='<a href="javascript:;" class="del" bj="'+phpData.did+'">删除</a>';
					html+='</div>';
//					$(".new_fo").append(html);
					$("#dz li").eq(indexs).html(html);
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
					$("#dz li").eq(index).remove();
				}
			}
		});
	})
	
	
	
//	删除指定不要的商品
	$(".shopdel").click(function(){
		var session = $(this).attr('hd');
		var id = $(".shopdel").index(this);
		$.ajax({
			type:"post",
			url:shop,
			data:{session:session},
			dataType:'text',
			async:true,
			success:function(phpData){
				$(".list .price i").html(phpData);
				$(".fc_price_info .sumPayPriceId span").html(phpData);
				$(".shop_list .ls").eq(id).remove();
				alert('删除成功！');
				
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
	$('.consignee_item').live('click',function(){
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
	
	
	
	
	
	
	
	
	
	
	$("#main .steps .scroll ul li").live('click',function(){
		$(this).find('input').attr('checked',true);
	})
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
})
