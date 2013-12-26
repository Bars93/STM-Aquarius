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
                        var expdata = 'User_id = ' + userdata.user_id + '<br> user_name = ' + userdata.user_name;
                        expdata = expdata + '<br> Full name = ' + userdata.full_name + '<br> user e-mail = ' + userdata.e_mail;
                        $("#showuser").after("<article id=\"edituser\">"+ expdata+"</article>");
                        $("#showuser").remove();
                    }
                    else {
                        $("#error").innerHTML = "";
                        $(err).appendTo("#error");
                        $("#error").attr("visibility", "visible");
                    }
                },
                function() {
                    window.alert("ajax failed!")
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