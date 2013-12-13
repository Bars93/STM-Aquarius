(function ($) {
    jQuery.fn.validate = function () {
        var check = false;
        var valid = function () {
            check = $("#login_name").nickvalid();
            check = $("#login_email").emailvalid() && check;
            check = $("#login_pw").passwordvalid() && check;
            if (check) {
                $("#reg_btn").attr("type", "submit");
                $("#reg_btn").attr("onclick", "");
            }
            else {
                $("#reg_btn").attr("type", "button");
                $("#reg_btn").attr("onclick", "alert('Пожалуйста, заполните все поля правильно!');");
            }
        };
        valid();
        $("#login_name").typing({
            stop:function() {valid();},
            delay: 400
        });
        $("#login_email").keyup(function () {
            valid();
        }).blur(function () {
            valid();
        });
        $("#login_pw").typing({
            stop: function(){valid();},
            delay: 500
        });
        $("#login_cpw").keyup(function () {
            valid();
        }).blur(function () {
            valid();
        });
        return true;
    };
})(jQuery);
