jQuery(document).ready(function($){
	
	$('#accordion-panel-wp_default_panel').prepend(
		'<div class="user_sticky_note">'+
		'<h3 class="sticky_title">Need help?</h3>'+
		'<span class="sticky_info_row"><label class="row-element">View demo: </label> <a href="http://8degreethemes.com/demo/hamza-lite/" target="_blank">here</a>'+
		'<span class="sticky_info_row"><label class="row-element">View documentation: </label><a href="http://8degreethemes.com/documentation/hamza-lite/" target="_blank">here</a></span>'+
		'<span class="sticky_info_row"><label class="row-element">Support forum: </label><a href="https://8degreethemes.com/support/forum/hamza-lite/" target="_blnak">here</a></span>'+
		'<span class="sticky_info_row"><label class="row-element">Email us: </label><a href="mailto:support@8degreethemes.com">support@8degreethemes.com<a/></span>'+
		'<span class="sticky_info_row"><label class="more-detail row-element">More Details: </label><a href="https://8degreethemes.com/wordpress-themes/" target="_blank">here</a></span>'+
		'</div>'
		);

	var upgrade_notice = '<div class="notice-up"><a class="upgrade-pro" target="_blank" href="https://8degreethemes.com/wordpress-themes/hamza-pro/"><img src="http://8degreethemes.com/demo/upgrade-hamza-lite.jpg" alt="UPGRADE TO HAMZA PRO" /></a>';
	upgrade_notice += '<a class="upgrade-pro-demo" target="_blank" href="http://8degreethemes.com/demos/?theme=hamza-pro">HAMZA PRO DEMO</a></div>';
	jQuery('#customize-info').append(upgrade_notice);

});
