jQuery(document).ready(function(){

    jQuery(".send").submit(function(e) {

        e.preventDefault();

        var it = jQuery(this);

        var str = jQuery(this).serializeArray();
        jQuery.ajax({
            type: "POST",
            url: it.attr("action"),
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(msg) {
                if(msg == 'Incorrect file type - chose PNG or JPG' || msg == 'Failed to Submit Your Comment'){
                    alert(msg);
                }else{
                    if (window.location.pathname == '/editcomment.php'){
                        alert(msg);
                        window.location.replace("/admin.php");
                    }else {
                        jQuery('.comments').append(msg);
                    }
                }
            }
        });
    });

});
