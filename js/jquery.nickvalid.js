(function ($) {
    jQuery.fn.nickvalid = function() {
		var valid = function() {
			$(this).keyup(function() {
				if($(this).val() != "") {
					if($(this).val().length <= 25) {
						$(this).css("background-image","url(img/ok.png)");
						$("#uname_err").css("visibility","hidden");
						$("#uname_err").css("height","1px");					
					}
					else {
						$(this).css("background-image","url(img/err.png)");
						$("#uname_err").css("visibility","visible");
						$("#uname_err").css("height","40px");		
					}
				}
				else {
					$(this).css("background-image", "none");
					$("#uname_err").css("visibility","hidden");
					$("#uname_err").css("height","1px");
				}			
			});		
		};	
		return this.each(valid);
	};
})(jQuery);