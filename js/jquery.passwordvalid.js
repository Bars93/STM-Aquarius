(function ($) {
    jQuery.fn.passwordvalid = function() {
		var valid = function() {
			if($("#login_cpw").val() != "")
				if($("#login_pw").val() == $("#login_cpw").val()) {
					$("#login_cpw").css("background-image", "url(img/ok.png)");
					$("#cpw_err").css("visibility","hidden");
					$("#cpw_err").css("height","1px");				
				}
				else {
					$("#login_cpw").css("background-image", "url(img/err.png)");
					$("#cpw_err").css("visibility","visible");
					$("#cpw_err").css("height","40px");	
				}
			else
				$("#login_cpw").css("background-image","none");
		};
		var event_action = function() {
			$(this).keyup(function() {
				if ($(this).val() != "") {
                        var regexp = /(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/;
                        if (regexp.test($(this).val())) {
							$(this).css("background-image", "url(img/ok.png)");
							$("#upw_err").css("visibility","hidden");
							$("#upw_err").css("height","1px");						
						}
						else {
							$(this).css("background-image", "url(img/err.png)");
							$("#upw_err").css("visibility","visible");
							$("#upw_err").css("height","40px");					
						}
						valid();
				}
				else {
					$(this).css("background-image","none");
					$("#upw_err").css("visibility","hidden");
					$("#upw_err").css("height","1px");
					valid();
				}		
			})
			$("#login_cpw").keyup( function() { valid() })
		};
		return this.each(event_action);		
	};
})(jQuery);