<?php
/**
 * The template for displaying search forms in Hamza Lite
 *
 * @package Hamza Lite
 */
 ?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" class="s" placeholder="<?php _e('Search','hamza-lite') ?>" />
		<button type="submit" name="submit" class="searchsubmit"><i class="fa fa-search"></i></button>
	</form>
