(function ($) {
	jQuery.fn.emailvalid = function() {
		var valid = function() {
			if($("#login_email").val() != "") {
				var regexp = /.@./;
				if(regexp.test($("#login_email").val())) {
					$("#login_email").css("background-image","url(img/ok.png)");
					$("#uemail_err").css("visibility","hidden")	;
					$("#uemail_err").css("height","1px");
				}
				else {
					$("#login_email").css("background-image","url(img/err.png)");
					$("#uemail_err").css("visibility","visible");
					$("#uemail_err").css("height","40px");
				}
			}
			else {
				$("#login_email").css("background-image","none");
				$("#uemail_err").css("visibility","hidden")	;
				$("#uemail_err").css("height","1px");			
			}
		};
		var event_action = function() {
			$(this).keyup(function() { valid() })
			$(this).blur(function() { valid() })
		};
		return this.each(event_action);	
	};
})(jQuery);