(function ($) {
    jQuery.fn.usersettings = function (user_id) {
        var get_data = function () {
            $.when($.ajax({
                    type: "POST",
                    dataType: "xml",
                    url: "getuserdata.php",
                    data: {uid: user_id},
                    caching: false
                })
                ).then(
                function (xmlResp) {
                    var err = $("error", xmlResp).map(function () {
                        return {
                            text: $("text", this).text()
                        };
                    }).get();
                    err = err[0].text;
                    if (err == "no") {
                        $("#error").innerHTML = "";
                        $("#error").attr("visibility", "hidden");
                        var userdata = $("userinfo", xmlResp).map(
                            function () {
                                return {
                                    user_id: $("user_id",this).text(),
                                    user_name: $("user_name",this).text(),
                                    full_name: $("full_name",this).text(),
                                    e_mail: $("e_mail",this).text(),
                                    avatar: $("avatar",this).text(),
                                    rows: $("rows",this).text()
                                };
                            }
                        ).get();
                        userdata = userdata[0];
                        var eu_art = document.createElement("article");
                        eu_art.className = "edituser";
                        eu_art.innerHTML = '<div class="eu_form"><label for="eu_uname">Имя пользователя</label><input type="text" class="eu_uname" value="'+ userdata.user_name+'"></div>';
                        $(eu_art).insertAfter("#showuser");
                    }
                    else {
                        $("#error").innerHTML = "";
                        $(err).appendTo("#error");
                        $("#error").attr("visibility", "visible");
                    }
                }
            );
        };
        $(this).click(function(){
            get_data();
        });
        var send_data = function () {

        };
    };
})(jQuery);