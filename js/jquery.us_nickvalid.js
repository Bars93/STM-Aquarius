(function ($) {
    jQuery.fn.us_nickvalid = function () {
        var res = false;
        if ($(this).val() != "") {
            if ($(this).val().length <= 25) {
                $.when($.ajax({
                    url: "getuser.php?user_name=" + encodeURI($(this).val()),
                    caching: false,
                    dataType: "xml"
                }))
                .then(function(xmlResponse) {
                        var res = $("result",xmlResponse).map(function() {
                            return {
                                taken: $("taken", this).text()
                            };
                        }).get();
                        if(res[0].taken == "true") {
                            $("#eu_uname").css("background-image","url(img/err.png)");
                            nickok = false;

                        }
                        else {
                            $("#eu_uname").css("background-image","url(img/ok.png)");
                            nickok = true;

                        }
                    }
                )
            }
            else {
                $(this).css("background-image", "url(img/err.png)");
                if($("#uname_err")) {
                    $("#uname_err").css("visibility", "visible");
                    $("#uname_err").css("height", "40px");
                }
                res = false;
            }
        }
        else {
            $(this).css("background-image", "none");
            if($("#uname_err")) {
                $("#uname_err").css("visibility", "hidden");
                $("#uname_err").css("height", "1px");
            }
            res = false;
        }
        return res;
    };
})(jQuery);