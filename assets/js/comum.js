$(document).ready(function(){

    $('.onlynumbers').keyup(function(e)
                                {
        if (/\D/g.test(this.value)){
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });

    $.fn.ajax_send = function(url, options){

        return $.ajax(url,options);
    };

    $.fn.sweet_alert = function(option){
        Swal.fire(option);
    }

});
