(function ($) {
	jQuery.fn.emailvalid = function() {
        var res = false;
		var valid = function() {
			if($("#login_email").val() != "") {
				var regexp = /.@./;
				if(regexp.test($("#login_email").val())) {
					$("#login_email").css("background-image","url(img/ok.png)");
					$("#uemail_err").css("visibility","hidden")	;
					$("#uemail_err").css("height","1px");
                    res = true;
				}
				else {
					$("#login_email").css("background-image","url(img/err.png)");
					$("#uemail_err").css("visibility","visible");
					$("#uemail_err").css("height","40px");
                    res = false;
				}
			}
			else {
				$("#login_email").css("background-image","none");
				$("#uemail_err").css("visibility","hidden")	;
				$("#uemail_err").css("height","1px");
                res = false;
			}
		};

        $(this).typing({
            stop: function(event, $elem) {
                valid();
            },
            delay: 600
        });


		return res ;
	};
})(jQuery);