(function ($) {
    jQuery.fn.emailvalid = function () {
        var res = false;
        if ($(this).val() != "") {
            var regexp = /.@./;
            if (regexp.test($(this).val())) {
                $(this).css("background-image", "url(img/ok.png)");
                $("#uemail_err").css("visibility", "hidden");
                $("#uemail_err").css("height", "1px");
                res = true;
            }
            else {
                $(this).css("background-image", "url(img/err.png)");
                $("#uemail_err").css("visibility", "visible");
                $("#uemail_err").css("height", "40px");
                res = false;
            }
        }
        else {
            $(this).css("background-image", "none");
            $("#uemail_err").css("visibility", "hidden");
            $("#uemail_err").css("height", "1px");
            res = false;
        }
        return res;
    };
})(jQuery);