$(function(){
//	左边的楼层
//	创建一个函数
	function left(){
//		获取浏览器宽度
		var w = $(window).width();
//		计算左边的left值赋值给left
		var left = (w-1210)/2-40;
		$('#left').css('left',left+'px');
		
//		执行楼层的函数
		floor();
	}
//	执行函数
	left();
//	创建楼层函数
	function floor(){
//		获取离顶部距离
		left_top = $(window).scrollTop();
//		document.title = left_top;
//		获取1-12楼的距离
		f1 = $('.fl_1').offset().top;
		f2 = $('.fl_2').offset().top;
		f3 = $('.fl_3').offset().top;
		f4 = $('.fl_4').offset().top;
		f5 = $('.fl_5').offset().top;
		f6 = $('.fl_6').offset().top;
		f7 = $('.fl_7').offset().top;
		f8 = $('.fl_8').offset().top;
		f9 = $('.fl_9').offset().top;
		f10 = $('.fl_10').offset().top;
		f11 = $('.fl_11').offset().top;
		f12 = $('.fl_12').offset().top;
	}
//	执行楼层的函数
	floor();
//	单击1-12楼到指定位置	
//	1楼
	$('#left ul .f_1').click(function(){
		$('html,body').stop().animate({
			scrollTop:f1
		},500,'easeOutExpo')
	})
//	2楼
	$('#left ul .f_2').click(function(){
		$('html,body').stop().animate({
			scrollTop:f2
		},500,'easeOutExpo')
	})
//	3楼
	$('#left ul .f_3').click(function(){
		$('html,body').stop().animate({
			scrollTop:f3
		},500,'easeOutExpo')
	})
//	4楼
	$('#left ul .f_4').click(function(){
		$('html,body').stop().animate({
			scrollTop:f4
		},500,'easeOutExpo')
	})
//	5楼
	$('#left ul .f_5').click(function(){
		$('html,body').stop().animate({
			scrollTop:f5
		},500,'easeOutExpo')
	})
//	6楼
	$('#left ul .f_6').click(function(){
		$('html,body').stop().animate({
			scrollTop:f6
		},500,'easeOutExpo')
	})
//	7楼
	$('#left ul .f_7').click(function(){
		$('html,body').stop().animate({
			scrollTop:f7
		},500,'easeOutExpo')
	})
//	8楼
	$('#left ul .f_8').click(function(){
		$('html,body').stop().animate({
			scrollTop:f8
		},500,'easeOutExpo')
	})
//	9楼
	$('#left ul .f_9').click(function(){
		$('html,body').stop().animate({
			scrollTop:f9
		},500,'easeOutExpo')
	})
//	10楼
	$('#left ul .f_10').click(function(){
		$('html,body').stop().animate({
			scrollTop:f10
		},500,'easeOutExpo')
	})
//	11楼
	$('#left ul .f_11').click(function(){
		$('html,body').stop().animate({
			scrollTop:f11
		},500,'easeOutExpo')
	})
//	12楼
	$('#left ul .f_12').click(function(){
		$('html,body').stop().animate({
			scrollTop:f12
		},500,'easeOutExpo')
	})
	
//	如果浏览器发生变化改变
	$(window).resize(function(){
		left();
	})
	
//	当滚动条发生变化的时候执行
	$(window).scroll(function(){
//		执行楼层的函数
		floor();
//		定义一个变量在接近一楼的时候给他显示
		xs = f1 - 580;
//		alert(xs);
		if(left_top<xs){
			$('#left').hide();
			le=100;
		}
		if(left_top>xs){
			$('#left').show();
		}
		if(left_top>=xs && left_top<(f2-250)){
			le=0;
		}
		if(left_top>=(f2-250) && left_top<(f3-250)){
			le=1;
		}
		if(left_top>=(f3-250) && left_top<(f4-250)){
			le=2;
		}
		if(left_top>=(f4-250) && left_top<(f5-250)){
			le=3;
		}
		if(left_top>=(f5-250) && left_top<(f6-250)){
			le=4;
		}
		if(left_top>=(f6-250) && left_top<(f7-250)){
			le=5;
		}
		if(left_top>=(f7-250) && left_top<(f8-250)){
			le=6;
		}
		if(left_top>=(f8-250) && left_top<(f9-250)){
			le=7;
		}
		if(left_top>=(f9-250) && left_top<(f10-250)){
			le=8;
		}
		if(left_top>=(f10-250) && left_top<(f11-250)){
			le=9;
		}
		if(left_top>=(f11-250) && left_top<(f12-250)){
			le=10;
		}
//		判断是否到天天低价的位置大于就隐藏
		day = $('#day').offset().top;
		if(left_top>=(f12-250) && left_top<(day-250)){
			le=11;
		}
		if(left_top>(day-250)){
			$('#left').hide();
		}
		setTimeout(function(){
			$('#left ul li').eq(le).addClass('oli')
						.siblings('li').removeClass('oli');
		},400)
		

	})	
	
	
	//	顶部推广栏
	var tA = $('#gg .tg a');
	tA.click(function(){
		$('#gg').hide();
		oTop = oDiv.offset().top;
		floor();
	})
	

	

	
	
	
	
	
	
//	话费机票电影票游戏区域
	var fh = true;
//	获取Li
	var hLi = $('#pic .notive .lifeserv .jh li');
//	获取中间内容
	var nr = $('#pic .notive .lifeserv .fq');
//	鼠标移到话费机票电影票游戏上改变内容和LI
	hLi.slice(0,4).mouseenter(function(){
//		判断是否是前面4个不然不执行
		a = $(this).index();
		if(fh==true){
			hLi.stop().animate({
				'height':26
			},400)

//			A标签给一个动画移动上来
			$('.yb').stop().animate({
				'padding-top':0
			},400);
//			A标签里面的I移走
			$('.yb .ydtop').stop().animate({
				top:-30
			},400);
			
//			把下面的内容移上来
			nr.stop().animate({
				top: 27
			},300,"linear",function(){
//				给Li增加一个css
				hLi.removeClass('fle');
				hLi.eq(a).addClass('fle');
				
			})
//			显示下面内容
			$('.box_zx').hide();
			$('.box_zx').eq(a).show();
		}
		
		
	})
//	获取内容里面的关闭按钮
	var guanbi = $('#pic .notive .lifeserv .fq .box_zx .guanbi');
//	点击关闭返回原来位置
	guanbi.click(function(){
		fh=false;
//		li高度变回原来,样式删除
		hLi.css({
			height:70
		})
		hLi.removeClass('fle');
//		底部内容
		nr.stop().animate({
			top: 210
		},300,"linear",function(){
			setTimeout(function(){
				fh=true;
			},500)
			
		})
//		A标签给一个动画移动上来
		$('.yb').css({
			'padding-top':40
		});
//		A标签里面的I移走
		$('.yb .ydtop').css({
			top:13
		});
		
	})
	
//		获取话费机票电影票游戏元素
		var oLi = $('.box_zx .money a');
		oLi.hover(function(){
//			移入先删除所有添加当前改变A标签class
			$(this).addClass('ablct')
					.siblings().removeClass('ablct');
//			控制内容的隐藏显示
			var this_index = oLi.index(this);
			$('.box_hf .box_1').eq(this_index).show()
								.siblings('.box_hf .box_1').hide();
	
		})	
	


		
		
		
//	楼层线性效果 
	tb = 1;
	$('.tg').mouseenter(function(){
		if(tb!=1){
			return;
		}
		tb = 2;
		$(this).next('.lines').stop().animate({
			'left':300
		},600,function(){
			tb = 1;
		})
	})
	$('.tg').mouseout(function(){
		$(this).next('.lines').css('left','-150'+'px');
	})
	
	
	
	
	
	

	
	











//	天天低价图片效果
	$('#day .mc .shop .shop_left').hover(function(){
		$(this).find('img').stop().animate({
			'left': -10
		},300)
	},function(){
		$(this).stop().find('img').animate({
			'left': 0
		},300)
	})
	$('#day .mc .shop .shop_right li').hover(function(){
		$(this).find('img').stop().animate({
			'left':0
		},300)
	},function(){
		$(this).find('img').stop().animate({
			'left':10
		},300)
	})


//	热门晒单
	var gross = $('#day .mc .pj ul');
	
	setInterval(function(){
//		选中最后一个LI高度变成0
		$('#day .mc .pj ul li').last().animate({
			'height':0
		},500,function(){
//			动画结束后执行
//			将最后一个li追加到ul头部
			$("#day .mc .pj ul").prepend($("#day .mc .pj ul li").last());
//			然后把第一个LI的高度变回原来的
			$('#day .mc .pj ul li').first().css('height','108px');
		})
	},3000)
	
	
})
