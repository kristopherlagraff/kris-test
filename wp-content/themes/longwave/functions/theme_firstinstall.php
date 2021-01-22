<?php
/* ------------------------------------- */
/* OPTION TREE INSTALL NOTICE */
/* ------------------------------------- */

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
require_once( $path_to_wp.'/wp-includes/functions.php');

$template_url_first = get_template_directory_uri();

if(get_option('tb_longwave_first_import')!="on"){
	tb_longwave_first_import_check();
}


function tb_longwave_first_import_check(){
	global $template_url_first;
	update_option('tb_longwave_first_import','on');

	update_option('tb_longwave_theme_general_options',array("tb_longwave_responsive_active" => "1", "tb_longwave_main_style" => "light", "tb_longwave_highlight_color" => "88D5C2", "tb_longwave_highlight_hover_color" => "CD5465", "tb_longwave_main_font" => "http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic", "tb_longwave_main_fontfamily" => "font-family: 'Lato', sans-serif;", "tb_longwave_favicon_icon" => $template_url_first."/style/images/favicon.png", "tb_longwave_css" => "", "tb_longwave_analytics" => ""));
	
	
	update_option('tb_longwave_theme_header_options',array("tb_longwave_header_logo" => $template_url_first."/style/images/logo.png", "tb_longwave_header_logo_responsive" => $template_url_first."/style/images/logo@2x.png"));
	
	
	update_option('tb_longwave_theme_body_options',array("tb_longwave_body_background_image" => $template_url_first."/style/bg/bg7.jpg"));
	
	
	update_option('tb_longwave_theme_footer_options',array("tb_longwave_footer" => "1", "tb_longwave_subfooter" => "1"));
	
	update_option('tb_longwave_theme_sidebar_options',array("sidebar_builder_name-0" => "Blog Sidebar", "sidebar_builder_slug-0" => "sidebar_508e8d92f34d8", "sidebar_builder_name-1" => "Page Sidebar", "sidebar_builder_slug-1" => "sidebar_1351519948", "sidebar_builder_name-2" => "Contact Sidebar", "sidebar_builder_slug-2" => "sidebar_1359577781"));
	
	update_option('tb_longwave_theme_blog_options',array("tb_longwave_blog_single_default_sidebar" => "nosidebar", "tb_longwave_blog_archive_style" => "left", "tb_longwave_blog_archive_sidebar" => "nosidebar", "tb_longwave_blog_category_style" => "left", "tb_longwave_blog_category_sidebar" => "nosidebar"));
	
	
	update_option('tb_longwave_theme_update_options',array("tb_longwave_update_user" => "", "tb_longwave_update_api" => ""));
}
?>