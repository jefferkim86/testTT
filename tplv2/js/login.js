$(document).ready(function() {
	//$(":password").dPassword();
	$("#wrap").append("<div id='titlep'></div>");
	// $(".tip").each(function() {
	// 	var tipObj = $("#titlep");
	// 	var _this = $(this);
	// 	tipObj_height = tipObj.height();
	// 	_this.hover(function() {
	// 			p = $(this).offset();
	// 			pTop = p.top - tipObj_height;
	// 			pLeft = p.left;
	// 			tipObj.html(_this.attr("title")).css({
	// 				"top": pTop,
	// 				"left": pLeft
	// 			}).show()
	// 		},
	// 		function() {
	// 			tipObj.hide()
	// 		})
	// });
	$(".input").focus(function() {
		$(this).addClass("curr")
	}).blur(function() {
		$(this).removeClass("curr")
	});
	$("#loginForm").keydown(function(e) {
		if (e.keyCode == 13) {
			$("#loginSubmit").trigger("click")
		}
	});
	$("#regForm").keydown(function(e) {
		if (e.keyCode == 13) {
			$("#regSumbit").trigger("click")
		}
	});
	$("#findpwdForm").keydown(function(e) {
		if (e.keyCode == 13) {
			$("#findpwdSubmit").trigger("click")
		}
	});
	$('#loginSubmit').click(function() {

		    var emailReg = /^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+\.([a-zA-Z0-9_-])+/;
			var emailVal = $("#email").val();
			if(!emailReg.test(emailVal)){
				tips('登录邮箱格式不正确');
				return;
			}
			if($("#password").val() == ''){
				tips('请输入密码');
				return;
			}
			$("#loginForm").submit();

	});
	$('#regSumbit').click(function(e) {
		
		var target = e.currentTarget;

		$(target).val('注册中...');
		var emailReg = /^([a-zA-Z0-9_\-\.])+@([a-zA-Z0-9_-])+\.([a-zA-Z0-9_-])+/;
		var emailVal = $("#email2").val();
		if(!emailReg.test(emailVal)){
			tips('邮箱格式不正确');
			$(target).val('注册');
			return;
		}
		if($("#password2").val() == ''){
			tips('请输入密码');
			$(target).val('注册');
			return;
		}
		if($("#nick").val() == ''){
			tips('请输入昵称');
			$(target).val('注册');
			return;
		}
		$("#regForm").submit();
		//$(target).attr('disabled','disabled');
		// getApi('login', 'reg', $('#regForm').serialize(),
		// 	function(data) {
		// 		if (data.status != 1) {
		// 			reloadcode('vericode');
		// 			waring(data.msg)
		// 			$(target).val('注册');
		// 			$(target).removeAttr('disabled');
		// 		} else {
		// 			window.location.href = $('#regForm').attr('callback')
		// 		}
		// 	})
	});
	$('#findpwdSubmit').click(function() {
		getApi('login', 'findpwd', $('#findpwdForm').serialize(),
			function(data) {
				if (data.status != 1) {
					reloadcode('vericode');
					waring(data.msg)
				} else {
					waring(data.body)
				}
			})
	});
	$('#logOut').click(function() {
		$.ybAPI('login', 'logout', '',
			function(data) {
				window.location.reload()
			})
	})
});

function reloadcode(id) {
	var url = $('#' + id).attr('src') + '&nowtime=' + new Date().getTime();
	if ($('#' + id).attr('src') != undefined) {
		$('#' + id).attr('src', url)
	}
}