$(function(){

	// 搜索框
	$('#search_shop').click(function() {
		jump();
	});
	$('#search_shop_list').keyup(function(event) {
		 if(event.keyCode == 13){
		 	jump();
		 }
		
	});

	function jump(){
		
		var texts = $('#search_shop_list').val();
		if(texts != ''){
			var href = "search_" + texts +".html";
			// alert(href);
			// return false;
			location.href = href;
		}
		
	}

	var jimiUl = $('#right .right .man_1 .char .chars');
	var mondel = $('#right .right .man_5 .zx .wz');
	function jimi(){
		var text = mondel.val();

		if(text != ''){
			var my = '<li class="one"><div class="my_name">我</div>';
			my+='<div class="msg">'+text+'</div></li><li></li>';
			jimiUl.append(my);
			// 让滚动条一直处于最底部
			$('#gundong').scrollTop($('#gundong')[0].scrollHeight);
			// alert(search);
			mondel.val('');
			$.ajax({
				type:"post",
				url:jimi_search,
				async:true,
				dataType:'json',
				data:{text:text},
				success:function(phpData){
					var html = '<li class="two"><div class="my_name">JIMI</div>';
					html+='<div class="msg">'+phpData.text+'</div></li>';
					jimiUl.append(html);
					$('#gundong').scrollTop($('#gundong')[0].scrollHeight);
				}
			})
		}
	}
	$('#right .right .man_5 .zx .fs').click(function() {
		jimi();
	});
	mondel.keyup(function(event) {
		 if(event.keyCode == 13){
		 	jimi();
		 }
		
	});


	
//	全部菜单span
	var nav_li = $("#nav .nav_list");
	for (i=0;i<nav_li.length;i++) {
		nav_li.eq(i).find('.xz').find('span').last().html('');
	}
	
	
//	顶部地区区域

//	获取外面大边框和里面的内容
	var tick = $('#top .top_middle .top_left');
	var oA = $('#top .top_middle .top_left .left_box a');
	var oSpan = $('#top .top_middle .top_left .region span');
//	移入大边框显示隐藏的DIV
	tick.mouseover(function(){
		$('#top .top_middle .top_left .region').addClass('zj');
		$('#top .top_middle .top_left .left_box').show();
//		单击A标签的时候删除span的内容增加A标签的内容
		oA.click(function(){
			oA.removeClass('tick');
			$(this).addClass('tick');
			var ble = $(this).html();
//			oSpan.empty();
			oSpan.html(ble);
			$('#top .top_middle .top_left .left_box').hide();
		})
	})
	tick.mouseout(function(){
		$('#top .top_middle .top_left .region').removeClass('zj');
		$('#top .top_middle .top_left .left_box').hide();
	})
	
//	顶部右侧下拉
	var dLi = $('#top .top_middle .top_right ul li');
	dLi.hover(function(){
		$(this).find('.gb').addClass('zj');
		$(this).children('.box').show();
	},function(){
		$(this).find('.gb').removeClass('zj');
		$(this).children('.box').hide();
	})
	
	
	
	
	
	
	
	
	
	
	
	
})
