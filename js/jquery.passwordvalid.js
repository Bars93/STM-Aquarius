(function ($) {
    jQuery.fn.passwordvalid = function() {
		var res = true;
		var valid = function() {
		if($("#login_cpw").val() != "")
				if($("#login_pw").val() == $("#login_cpw").val()) {
					$("#login_cpw").css("background-image", "url(img/ok.png)");
					$("#cpw_err").css("visibility","hidden");
					$("#cpw_err").css("height","1px");
					res = true;
				}
				else {
					$("#login_cpw").css("background-image", "url(img/err.png)");
					$("#cpw_err").css("visibility","visible");
					$("#cpw_err").css("height","40px");	
					res = false;
				}
			else {
				$("#login_cpw").css("background-image","none");
				$("#cpw_err").css("visibility","hidden");
				$("#cpw_err").css("height","1px");
				res = false;
			}
		};

        $("#login_pw").typing({
            stop: function(event, $elem) {
                if ($elem.val() != "") {
                    var regexp = /(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/;
                    if (regexp.test($elem.val())) {
                        $elem.css("background-image", "url(img/ok.png)");
                        $("#upw_err").css("visibility","hidden");
                        $("#upw_err").css("height","1px");
                        res = true;
                    }
                    else {
                        $elem.css("background-image", "url(img/err.png)");
                        $("#upw_err").css("visibility","visible");
                        $("#upw_err").css("height","40px");
                        res = false;
                    }
                    valid();
                }
                else {
                    $elem.css("background-image","none");
                    $("#upw_err").css("visibility","hidden");
                    $("#upw_err").css("height","1px");
                    res = false;
                    valid();
                }
            },
            delay: 600
        });


        $("#login_cpw").typing({
            stop: function(event, $elem) {
               valid();
            },
            delay: 600
        });



		
		return res;		
	};
})(jQuery);