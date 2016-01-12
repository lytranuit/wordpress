<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Hamza Lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				echo __( 'Comments', 'hamza-lite' );
			?>
		</h2>
	
		<ol class="comment-list clearfix">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
                    'callback'   => 'hamza_lite_theme_comment',
                    'avatar_size'=> 58,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'hamza-lite' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'hamza-lite' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'hamza-lite' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'hamza-lite' ); ?></p>
	<?php endif; ?>

	<?php 
        
        $hamza_lite_commenter = wp_get_current_commenter();
        $hamza_lite_req = get_option( 'require_name_email' );
        $hamza_lite_aria_req = ( $hamza_lite_req ? " aria-required='true'" : '' );
        
        $hamza_lite_fields =  array(
            'author' =>
                '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $hamza_lite_commenter['comment_author'] ) .
                '" size="30"' . $hamza_lite_aria_req . ' /></p>',
            'email' =>
                '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="Email Address" value="' . esc_attr(  $hamza_lite_commenter['comment_author_email'] ) .
                '" size="30"' . $hamza_lite_aria_req . ' /></p>',
            'url' =>
                '<p class="comment-form-url"><input id="url" name="url" type="text" placeholder="Website Url" value="' . esc_attr( $hamza_lite_commenter['comment_author_url'] ) .
                '" size="30" /></p>',
        );
        
        $hamza_lite_comment_arg = array(
            'id_form'           => 'commentform',
            'id_submit'         => 'submit',
            'class_submit'      => 'submit',
            'name_submit'       => 'submit',
            'title_reply'       => __( 'Add Your Comment', 'hamza-lite' ),
            'title_reply_to'    => __( 'Add Your Comment to %s', 'hamza-lite' ),
            'cancel_reply_link' => __( 'Cancel Reply', 'hamza-lite' ),
            'label_submit'      => __( 'Submit', 'hamza-lite' ),
            'format'            => 'xhtml',

            'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Message" cols="45" rows="8" aria-required="true">' .
                '</textarea></p>',

            'must_log_in' => '<p class="must-log-in">' .
            sprintf(
            __( 'You must be <a href="%s">logged in</a> to post a comment.', 'hamza-lite' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</p>',

            'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(
            __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'hamza-lite' ),
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',            

            'comment_notes_after' => '',

            'fields' => apply_filters( 'comment_form_default_fields', $hamza_lite_fields ),
        );
    
    comment_form($hamza_lite_comment_arg); ?>

</div><!-- #comments -->
