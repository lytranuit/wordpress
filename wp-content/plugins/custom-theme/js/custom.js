jQuery(document).ready(function() {
    jQuery(document).on('change', '.post_tp', function() {  
        var parent = jQuery(this).val();
        var url = jQuery(this).attr('ajax');
        jQuery.ajax({
            url: url,
            type: 'post',
            data: {
                action: 'get_quan_huyen',
                parent: parent
            },
            success: function(data) {
                
                jQuery(".post_quan").html(data);
            }
        });
    })
})