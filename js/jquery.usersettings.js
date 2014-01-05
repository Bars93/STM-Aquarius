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
                        eu_art.innerHTML = '<h1>Редактирование пользователя</h1><div class="eu_form">' +
                            '<input type="hidden" value="'+ userdata.user_id + '"><label for="eu_uname">Имя пользователя</label><br>' +
                            '<input type="text" class="eu_uname" id="eu_name" value="'+ userdata.user_name+'">' +
                            '<br><label for="eu_fullname">Полное имя</label><br><input type="text" class="eu_fullname" id="eu_fullname" value="'+ userdata.full_name +'"><br>' +
                            '<label for="eu_email">E-mail</label><br><input class="eu_email" id="eu_email" value="'+userdata.e_mail+'"><br>' +
                            '<!--<img src="'+userdata.avatar+'" id="eu_avatar_old"><input type="image" class="eu_avatar" id="eu_avatar"><br>-->' +
                            '<label for="row_count">Количество задач на странице</label><br><select id="row_count"><option value="1">1</option><option value="5">5</option><option value="10">10</option></select>'+
                            '<br><input type="button" value="Отправить!" id="sendbtn"></div>';
                        $(eu_art).insertAfter("#showuser");
                        $("#editbtn").css("visibility","hidden");
                        $("#row_count").val(userdata.rows);
                        $("#sendbtn").click(function(){alert('Not send yet!'); });
                        $("#showuser").remove();
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