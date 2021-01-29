<?php

if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

function thundercolumns_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'thundercolumns_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'thundercolumns_register_mce_button' );
	}
}
add_action('admin_head', 'thundercolumns_add_mce_button');


function thundercolumns_add_tinymce_plugin( $plugin_array ) {
	print_r(get_template_directory_uri());
	$plugin_array['thundercolumns_mce_button'] = get_template_directory_uri() . '/functions/thundercodes/thundercolumns_plugin.js';
	return $plugin_array;
}


function thundercolumns_register_mce_button( $buttons ) {
	array_push( $buttons, 'thundercolumns_mce_button' );
	return $buttons;
}


function thundercolumns_mce_css() {
	wp_enqueue_style('thunderbuddies-tc', get_template_directory_uri() .'/functions/thundercodes/css/thunderbuddies_tinymce_style.css');
}
add_action( 'admin_enqueue_scripts', 'thundercolumns_mce_css' );

?>