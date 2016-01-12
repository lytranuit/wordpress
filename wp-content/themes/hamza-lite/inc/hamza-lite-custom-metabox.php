<?php
/**
 * Hamza Lite Post Meta Box
 *
 * @package Hamza Lite
 */

add_action('add_meta_boxes', 'hamza_lite_add_sidebar_layout_box');

function hamza_lite_add_sidebar_layout_box()
{    
    add_meta_box(
                 'hamza_lite_sidebar_layout', // $id
                 __('Sidebar Layout', 'hamza-lite' ), // $title
                 'hamza_lite_sidebar_layout_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'hamza_lite_sidebar_layout', // $id
                 __('Sidebar Layout', 'hamza-lite'), // $title
                 'hamza_lite_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority    
}


$hamza_lite_sidebar_layout = array(
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'hamza-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'hamza-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'both-sidebar' => array(
                        'value'     => 'both-sidebar',
                        'label'     => __( 'Both Sidebar', 'hamza-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'hamza-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   

    );

function hamza_lite_sidebar_layout_callback()
{ 
global $post , $hamza_lite_sidebar_layout;
wp_nonce_field( basename( __FILE__ ), 'hamza_lite_sidebar_layout_nonce' ); 
?>

<table class="form-table">
<tr>
<td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template', 'hamza-lite'); ?></em></td>
</tr>

<tr>
<td>
<?php  
   foreach ($hamza_lite_sidebar_layout as $hamza_lite_field) {  
                $hamza_lite_sidebar_metalayout = get_post_meta( $post->ID, 'hamza_lite_sidebar_layout', true ); ?>

                <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                <span><img src="<?php echo esc_url( $hamza_lite_field['thumbnail'] ); ?>" alt="" /></span></br>
                <input type="radio" name="hamza_lite_sidebar_layout" value="<?php echo $hamza_lite_field['value']; ?>" <?php checked( $hamza_lite_field['value'], $hamza_lite_sidebar_metalayout ); if(empty($hamza_lite_sidebar_metalayout) && $hamza_lite_field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo $hamza_lite_field['label']; ?>
                </label>
                </div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
</td>
</tr>
</table>

<?php } 

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function hamza_lite_save_sidebar_layout( $hamza_lite_post_id ) { 
    global $hamza_lite_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'hamza_lite_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'hamza_lite_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $hamza_lite_post_id ) )  
            return $hamza_lite_post_id;  
    } elseif (!current_user_can( 'edit_post', $hamza_lite_post_id ) ) {  
            return $hamza_lite_post_id;  
    }  
    

    foreach ($hamza_lite_sidebar_layout as $hamza_lite_field) {  
        //Execute this saving function
        $hamza_lite_old = get_post_meta( $hamza_lite_post_id, 'hamza_lite_sidebar_layout', true); 
        $hamza_lite_new = sanitize_text_field($_POST['hamza_lite_sidebar_layout']);
        if ($hamza_lite_new && $hamza_lite_new != $hamza_lite_old) {  
            update_post_meta($hamza_lite_post_id, 'hamza_lite_sidebar_layout', $hamza_lite_new);  
        } elseif ('' == $hamza_lite_new && $hamza_lite_old) {  
            delete_post_meta($hamza_lite_post_id,'hamza_lite_sidebar_layout', $hamza_lite_old);  
        } 
     } // end foreach   
     
}
add_action('save_post', 'hamza_lite_save_sidebar_layout'); 