$(function(){
//	性别
	for (i=0;i<$(".sex").length;i++) {
		$(".sex[value='"+sex+"']").attr('checked',true);
	}
//	婚姻
	for (i=0;i<$(".wedlock").length;i++) {
		$(".wedlock[value='"+wedlock+"']").attr('checked',true);
	}
//	年
	for (i=0;i<$(".datas option").length;i++) {
		$(".datas option[value='"+year+"']").attr('selected',true);
	}
//	月
	for (i=0;i<$(".yue option").length;i++) {
		$(".yue option[value='"+month+"']").attr('selected',true);
	}
//	日
	for (i=0;i<$(".ri option").length;i++) {
		$(".ri option[value='"+day+"']").attr('selected',true);
	}

//	收入
//	alert($(".shouru option").length)
	for (i=0;i<$(".shouru option").length;i++) {
		$(".shouru option[value='"+revenue+"']").attr('selected',true);
	}
	
//	教育
	for (i=0;i<$(".education option").length;i++) {
		$(".education option[value='"+education+"']").attr('selected',true);
	}
	
	
	
	
	
})
