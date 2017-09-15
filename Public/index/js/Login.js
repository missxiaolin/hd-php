$(function(){
//	alert(user)
//	错误验证
	function error(text){
		$(".login_form .msg_wrap").addClass('yz');
		$(".login_form .msg_wrap").html('<b></b>'+text);
		return false;
	}
	
	$('.dl').click(function(){
		if($("#username").val()==''){
			error('请填写用户名!');
			return false;
		}
		if($("#password").val()==''){
			error('请填写用户密码!');
			return false;
		}
//		$('#from').submit();
		var users = $('#from').serialize();
		$.ajax({
			type:"post",
			url:user,
			async:true,
			dataType:'text',
			data:users,
			success:function(phpData){
				
				if(phpData==0){
//					执行表单提交
					$('#from').submit();
					
				}
				if(phpData==1){
					error('账户名与密码不匹配，请重新输入!');
					
				}
			}
		})
		
	})
})
