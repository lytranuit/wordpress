
jQuery(document).ready(function () {
    get_quan_huyen(jQuery(".post_tp").val());
    jQuery(document).on('change', '.post_tp', function () {
        var parent = jQuery(this).val();
        get_quan_huyen(parent);
    });
    jQuery("#media").click(function () {
        event.preventDefault(); // Prevent reload page when click the button

        // Initialize. 
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Images', // The title of frame
            library: {
            },
            button: {text: 'Select'},
            multiple: true // Enable select multiple
        });
        /* 
         * Select images if it is selected, after you click button "pick_images" again
         */
        file_frame.on('open', function () {
            var images = jQuery('#gallery_input').val();
            images = images.split(','); // Get all images id and split to an array

            // And select it
            var selection = file_frame.state().get('selection');
            jQuery.each(images, function (index, el) {
                var attachment = wp.media.attachment(el);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });
        });
        // Select images event
        file_frame.on('select', function () {
            var attachment_ids = [];
            attachment = file_frame.state().get('selection').toJSON();
            imgs_html = '';
            // Each selected image, push the id of image to an array and show image
            jQuery.each(attachment, function (index, item) {
                attachment_ids.push(item.url);
                imgs_html += '<li data-image-id="' + item.id + '">';
                imgs_html += '<img src="' + item.url + '" />';
                imgs_html += '</li>';
            });
            jQuery('#gallery_input').val(attachment_ids.join(',')); // List of all images
            jQuery('#display_gallery').html(imgs_html); // Show images
        });
        // Open media popup
        file_frame.open();
    });
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    jQuery('.gia,.dien-tich,.chieudai,.chieurong').autoNumeric("init", {
        aSep: ' ',
        aDec: ',',
        pSign: 's',
        mDec: 0
    });
    jQuery("#form-dang-tin").validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".parent").find(".error-place"));
        },
        submitHandler: function (form) {
            jQuery('.gia,.dien-tich,.chieudai,.chieurong').each(function () {
                var value = jQuery(this).autoNumeric('get');
                console.log(value);
                jQuery(this).val(value);
            });
            form.submit();
            return false;

        }
    });
});
function get_quan_huyen(parent) {
    jQuery(".post_quan").empty();
    jQuery.each(khuvuc, function (k1, v1) {
        if (v1['parent'] == parent) {
            jQuery(".post_quan").append("<option value='" + v1['term_taxonomy_id'] + "'>" + v1['name'] + "</option>");
        }
    });

}