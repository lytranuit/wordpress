
jQuery(document).ready(function () {
    jQuery(document).on('change', '.post_tp', function () {
        var parent = jQuery(this).val();
        var url = jQuery(this).attr('ajax');
        jQuery.ajax({
            url: url,
            type: 'post',
            data: {
                action: 'get_quan_huyen',
                parent: parent
            },
            success: function (data) {

                jQuery(".post_quan").html(data);
            }
        });
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
    })
})