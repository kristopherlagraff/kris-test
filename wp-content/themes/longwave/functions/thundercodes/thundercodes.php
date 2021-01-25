<?php

if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

function thundercodes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'thundercodes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'thundercodes_register_mce_button' );
	}
}
add_action('admin_head', 'thundercodes_add_mce_button');


function thundercodes_add_tinymce_plugin( $plugin_array ) {
	
	$plugin_array['thundercodes_mce_button'] = get_template_directory_uri() . '/functions/thundercodes/thundercodes_plugin.js';
	return $plugin_array;
}


function thundercodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'thundercodes_mce_button' );
	return $buttons;
}

foreach ( array('post.php','post-new.php') as $hook ) {
	// add_action( "admin_head-$hook", 'my_admin_head' );
}

?>