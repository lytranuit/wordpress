<?php
/*
Plugin Name: TeachingYou Front End Posting With Custom Post Type
Plugin URI: http://teachingyou.net
Description: This plugin is based on a tutorial from teachingyou.net. 
Version: 1.0
Author: Morne Zeelie
Author URI: http://teachingyou.net
License: GPL2
*/

function ty_front_end_form() {

	?>
	<form id="custom-post-type" name="custom-post-type" method="post" action="">
 
	<p><label for="title">Post Title</label><br />
	 
	<input type="text" id="title" value="" tabindex="1" size="20" name="title" />
	 
	</p>
	 
	<p><label for="description">Post Description</label><br />
	 
	<textarea id="description" tabindex="3" name="description" cols="50" rows="6"></textarea>
	 
	</p>
	 
	<p><?php wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?></p>
	 
	<p><label for="post_tags">Post Tags</label>
	 
	<input type="text" value="" tabindex="5" size="16" name="post-tags" id="post-tags" /></p>
	 
	<p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>
	 
	<input type="hidden" name="post-type" id="post-type" value="dang-tin" />
	 
	<input type="hidden" name="action" value="custom_posts" />
	 
	<?php wp_nonce_field( 'name_of_my_action','name_of_nonce_field' ); ?>
	 
	</form>
	<?php

	if($_POST){
		ty_save_post_data();
	}
	
}
add_shortcode('custom-post','ty_front_end_form');

function ty_save_post_data() {

	if ( empty($_POST) || !wp_verify_nonce($_POST['name_of_nonce_field'],'name_of_my_action') )
	{
	   print 'Sorry, your nonce did not verify.';
	   exit;

	}else{ 
 
		// Do some minor form validation to make sure there is content
		if (isset ($_POST['title'])) {
			$title =  $_POST['title'];
		} else {
			echo 'Please enter a title';
			exit;
		}
		if (isset ($_POST['description'])) {
			$description = $_POST['description'];
		} else {
			echo 'Please enter the content';
			exit;
		}

		if(isset($_POST['post_tags'])){
		$tags = $_POST['post_tags'];
		}else{
		$tags = "";
		}
	 
		// Add the content of the form to $post as an array
		$post = array(
			'post_title' => wp_strip_all_tags( $title ),
			'post_content' => $description,
			'post_category' => $_POST['cat'],  // Usable for custom taxonomies too
			'tags_input' => $tags,
			'post_status' => 'publish',			// Choose: publish, preview, future, etc.
			'post_type' => $_POST['post-type']  // Use a custom post type if you want to
		);
		wp_insert_post($post);  // http://codex.wordpress.org/Function_Reference/wp_insert_post
		
		$location = home_url(); // redirect location, should be login page 

        echo "<meta http-equiv='refresh' content='0;url=$location' />"; exit;
	} // end IF
	 
}
?>