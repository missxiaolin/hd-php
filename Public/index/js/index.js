$(function(){
//	全部商品菜单栏
//	获取大框div






	var oDiv = $('#nav .center .dh .shop_title');
//	获取大框离顶部的距离
	var oTop = oDiv.offset().top;
//	alert(oTop);
//	获取li
	var left_cd = $('#nav .center .dh .shop_title ul li');
//	移到LI上显示隐藏
	function yl(){
		left_cd.hover(function(){
//			移入显示对应的DIV
			$(this).children('.box').show();
			$(this).children('.box').css({
				top: 0
			})
		},function(){
//			移开隐藏
			$(this).children('.box').hide();
		})
	}
	yl();
	$(window).scroll(function(){
		var top = $(window).scrollTop();
//		document.title = top;
//		当大于大框的时候改变内容的值
		if(top>oTop){
			left_cd.hover(function(){
//				当前的显示
				$(this).children('.box').show();
				$(this).children('.box').css({
					top: top-oTop
				})
			},function(){
//				否者隐藏
				$(this).children('.box').hide();
			})
		}else{
//			否者top值不变
			yl();
		}
	})
//	加载的时候先把菜单栏隐藏算出离顶部的距离专用


//	轮播图
//	取元素
	var c = 0;
	var img = $('#pic .pic_img img');
	var pLi = $('#pic .pic_img .dot li');
//	左边按钮
	var lb_1 = 1;
	$('#pic .pic_img .left').click(function(){
		
		if(lb_1==1){
			lb_1=2;
			c--;
			if(c<0){
				c=5;
			}
			img.eq(c).fadeIn(300)
					.siblings('img').fadeOut(300);
			pLi.eq(c).addClass('select')
					.siblings('li').removeClass('select');
		}
		setTimeout(function(){
			lb_1=1;
		},500)
		
	})
//	右边按钮
	$('#pic .pic_img .right').click(function(){
		run();
	})
	function run(){
		if(lb_1==1){
			lb_1=2;
			c++;
			c = (c==6)?0:c;
			img.eq(c).fadeIn(300)
					.siblings('img').fadeOut(300);
			pLi.eq(c).addClass('select')
					.siblings('li').removeClass('select');
		}
		setTimeout(function(){
			lb_1=1;
		},500)
	}
//	设置定时器
	timer = setInterval(run,3000);
	pLi.hover(function(){
		var oSelect = $(this);
		t = setTimeout(function(){
			c = oSelect.index();
			img.eq(c).stop().fadeIn(500)
					.siblings('img').stop().fadeOut(500);
			pLi.eq(c).addClass('select')
				.siblings('li').removeClass('select');
		},300)
	},function(){
		clearTimeout(t);
	})
	
	$('#pic .pic_img').mouseenter(function(){
		clearInterval(timer);
		$('#pic .pic_img .left').show();
		$('#pic .pic_img .right').show();
	})
	$('#pic .pic_img').mouseleave(function(){
		timer = setInterval(run,3000);
		$('#pic .pic_img .left').hide();
		$('#pic .pic_img .right').hide();
	})
	


	
//封装开始	
	
//	获取宽度
//	今日推荐
	var obj = new Object();
	obj.sum = 0;
	obj.node = $('#new_1');
	side(obj);
	
//	一楼
	var objA = new Object();
	objA.sum = 0;
	objA.node = $('#new_2');
	side(objA);
//	二楼
	var objB = new Object();
	objB.sum = 0;
	objB.node = $('#new_3');
	side(objB);
//	三楼
	var objC = new Object();
	objC.sum = 0;
	objC.node = $('#new_4');
	side(objC);
//	四楼
	var objD = new Object();
	objD.sum = 0;
	objD.node = $('#new_5');
	side(objD);
//	五楼
	var objE = new Object();
	objE.sum = 0;
	objE.node = $('#new_6');
	side(objE);
//	六楼
	var objF = new Object();
	objF.sum = 0;
	objF.node = $('#new_11');
	side(objF);
//	七楼
	var objG = new Object();
	objG.sum = 0;
	objG.node = $('#new_12');
	side(objG);
//	八楼
	var objH = new Object();
	objH.sum = 0;
	objH.node = $('#new_13');
	side(objH);
//	九楼
	var objI = new Object();
	objI.sum = 0;
	objI.node = $('#new_14');
	side(objI);
//	十楼
	var objJ = new Object();
	objJ.sum = 0;
	objJ.node = $('#new_7');
	side(objJ);
//	十一楼
	var objK = new Object();
	objK.sum = 0;
	objK.node = $('#new_8');
	side(objK);
//	十二楼_1	
	var objF = new Object();
	objF.sum = 0;
	objF.node = $('#new_9');
	side(objF);
//	十二楼_12
	var objG = new Object();
	objG.sum = 0;
	objG.node = $('#new_10');
	side(objG);
	function side(obj){
//		获取高宽
		var oWidh = $(obj.node).width();
//		创建一个Li
		$(obj.node).find('.fz').append("<li class='cr'></li>");
		//把第一个LI的内容给最后的LI
		$($($(obj.node).find('.fist')).html()).clone().prependTo($(obj.node).find('.cr'));
//		给UL定义一个宽度
		var oLi = $(obj.node).find('.fz li');
		$(obj.node).children('.fz').css({
			width:(oLi.length)*oWidh,
		})
//		移动按钮的出现
		$(obj.node).hover(function(){
			$(obj.node).find('.slider_prev').stop().animate({left:0},150);
			$(obj.node).find('.slider_next').stop().animate({right:-1},150);
		},function(){
			$(obj.node).find('.slider_prev').stop().animate({left:-39},150);
			$(obj.node).find('.slider_next').stop().animate({right:-40},150);
		})	
		
		sra = 1;
		//	点击切换图片
		$(obj.node).find('.slider_prev').click(function(){
			if(sra!=1){
				return;
			}
			sra =0;
			obj.sum++;
			move(obj);
		})
		$(obj.node).find('.slider_next').click(function(){
			if(sra!=1){
				return;
			}
			sra =0;
			obj.sum--;
			move(obj);
		})
		
//		移到span改变class和切换图片
		$(obj.node).find('.dot span').hover(function(){
			$(this).addClass('actibe')
					.siblings('span').removeClass('actibe');
			var index = $(this).index();
			obj.sum = index;
			move(obj);
		})
//		打开定时器
		time(obj);
//		移入删除定时器    移除打开定时器
		$(obj.node).hover(function(){
			clearInterval(obj.t);
		},function(){
			time(obj);
		})
	}
	
//	公用的一个函数
	function move(obj){
		var dle = obj.sum;
		var oLi = $(obj.node).find('.fz li');
		var oWidh = $(obj.node).width();
		if(dle>oLi.length-1){
			$(obj.node).find('.fz').css({
				left:0
			})
			dle = 1;
			obj.sum = dle;
		}
		if(dle<0){
			$(obj.node).find('.fz').css({
				left:-(oLi.length)*oWidh
			})
			dle=oLi.length-2;
			obj.sum = dle;
		}
		var sum = obj.sum*oWidh;
		$(obj.node).find('.fz').stop().animate({left:-sum},500,function(){
			sra =1;
		});
//		判断span的位置先做循环删除所有再去增加class
		for(var i=0;i<$(obj.node).find('.dot span').length;i++){
			$(obj.node).find('.dot span')[i].className = '';
		}
		if(dle == $(obj.node).find('.dot span').length){
			$(obj.node).find('.dot span').eq(0).addClass('actibe');
		}else{
			$(obj.node).find('.dot span').eq(dle).addClass('actibe');
		}
	}
//	创建一个定时器
	function time(obj){
		obj.t=setInterval(function(){
			obj.sum++;
			move(obj);
		},3000)
	}

//封装结束





//楼层选项卡
	var options = $('#floor .mt ul li');
	
//		鼠标移入
		options.hover(function(){
			$(this).addClass('active')
					.siblings().removeClass('active');
//			获得所有LI标签移上去的序号      然后显示当前序号的元素       隐藏兄弟元素
			var options_index = options.index(this);
//			alert(options_index);
			$('#floor .mc .mc_right').eq(options_index).show()
						.siblings('#floor .mc .mc_right').hide();

		})


})
