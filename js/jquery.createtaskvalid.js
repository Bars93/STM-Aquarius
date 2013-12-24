(function ($) {
    jQuery.fn.createtaskvalid = function() {
        var valid_elem = function() {
            if($(this).val().length > 0) {
                return true;
            }
            return false;
        };
        var valid_all = function() {
            var check = $("#taskname").valid_elem() && $("#startdatetask").valid_elem()
        };







        return true;
    };
})(jQuery);