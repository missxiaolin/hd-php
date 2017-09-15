$(function(){
//	全选全不选
	$(".che").toggle(function(){
		$('.shop_list :checkbox').removeAttr('checked');
		var a= 0;
		for (i=0;i<$('.shop_list :checkbox').length;i++) {
					
			if($('.xz').eq(i).attr('checked')){
//						alert(i);
				a = Number($(".p_sum strong span").eq(i).html()) + Number(a);
//						alert(a);
			}
		}
		$(".price_sum .price em span").html(a);
	},function(){
		$('.shop_list :checkbox').attr('checked','checked');
		var a= 0;
		for (i=0;i<$('.shop_list :checkbox').length;i++) {
					
			if($('.xz').eq(i).attr('checked')){
//						alert(i);
				a = Number($(".p_sum strong span").eq(i).html()) + Number(a);
//						alert(a);
			}
		}
		$(".price_sum .price em span").html(a);
	});
	
	
	
	
//	复选框单机事件
	$('.xz').click(function(){
		var a= 0;
		for (i=0;i<$('.shop_list :checkbox').length;i++) {
					
			if($('.xz').eq(i).attr('checked')){
//						alert(i);
				a = Number($(".p_sum strong span").eq(i).html()) + Number(a);
//						alert(a);
			}
		}
		$(".price_sum .price em span").html(a);
	})
	
	
	var input = $('.dd .number input');
	
	
	$('.jia').click(function(){
		index = $('.jia').index(this);
		session = $(this).attr('hd');
		$.ajax({
			type:"post",
			url:addsum,
			async:true,
			dataType:'json',
			data:{session : session},
			success:function(phpData){
				input.eq(index).val(phpData.num);
				$(".p_sum strong span").eq(index).html(phpData.total);
				var a=0;
				for (i=0;i<$('.shop_list :checkbox').length;i++) {
					
					if($('.xz').eq(i).attr('checked')){
//						alert(i);
						a = Number($(".p_sum strong span").eq(i).html()) + Number(a);
//						alert(a);
					}
				}
				$(".price_sum .price em span").html(a);
			}
		});
	})
	
	$('.jian').click(function(){
		index = $('.jian').index(this);
		session = $(this).attr('hd');
		$.ajax({
			type:"post",
			url:jiansum,
			async:true,
			dataType:'json',
			data:{session : session},
			success:function(phpData){
				input.eq(index).val(phpData.num);
				$(".p_sum strong span").eq(index).html(phpData.total);
				var a=0;
				for (i=0;i<$('.shop_list :checkbox').length;i++) {
					
					if($('.xz').eq(i).attr('checked')){
//						alert(i);
						a = Number($(".p_sum strong span").eq(i).html()) + Number(a);
//						alert(a);
					}
				}
				$(".price_sum .price em span").html(a);
			}
		});
	})
	
//	当文本框改变val值得时候的时候触发以下代码
	input.keyup(function(){
//		做一个正则表达式如果写入除数组以外的字符全部删除    然后给文本框赋值
		var re = /\D/g;
		var str = input.val();
		var r = str.replace(re,'');
		input.val(r);
//		如果是空返回一个值1
		if(input.val()==''){
			input.val(1);
		}
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
				$(".shop_list").eq(id).remove();
				alert('删除成功！');
				
			}
		});
		
	})
})
