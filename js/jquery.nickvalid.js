(function ($) {
    jQuery.fn.nickvalid = function () {
        var res = false;
        if ($(this).val() != "") {
            if ($(this).val().length <= 25) {
                $(this).css("background-image", "url(img/ok.png)");
                $("#uname_err").css("visibility", "hidden");
                $("#uname_err").css("height", "1px");
                res = true;
            }
            else {
                $(this).css("background-image", "url(img/err.png)");
                $("#uname_err").css("visibility", "visible");
                $("#uname_err").css("height", "40px");
                res = false;
            }
        }
        else {
            $(this).css("background-image", "none");
            $("#uname_err").css("visibility", "hidden");
            $("#uname_err").css("height", "1px");
            res = false;
        }
        return res;
    };
})(jQuery);