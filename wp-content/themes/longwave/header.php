<!DOCTYPE HTML>
<?php
	//Basic Info
		global $wp_query;
	    $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
	    	$post_id = $content_array->ID;
		}
		else $post_id=0;
		
		$template_uri = get_template_directory_uri();
	
	//Theme Options
		$themeoptions = getThemeOptions();
	
	//Page Options
		$pageoptions = getOptions($post_id);
	
	//Layout
		$layout = isset($themeoptions["tb_longwave_full_active"]) ? "full" : "box";
	
?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<?php if(isset($themeoptions["tb_longwave_responsive_active"])){ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } ?>
<meta http-equiv="Content-Type" content="<?php echo get_bloginfo('html_type'); ?>; charset=<?php echo get_bloginfo('charset'); ?>" />
<meta name="robots" content="index, follow" />
<!--meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" /-->
<!--meta http-equiv="X-UA-Compatible" content="IE=edge" /-->
<title><?php echo wp_title(" &raquo; ",1,'right'); ?><?php echo get_bloginfo('name'); ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $themeoptions["tb_longwave_favicon_icon"];?>" />
<?php wp_head(); ?>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo $template_uri; ?>/style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo $template_uri; ?>/style/css/ie9.css" media="all" />
<![endif]-->
<link rel="stylesheet" href="<?php echo $template_uri."/style/css/slider.css"; ?>" type="text/css" />
<?php
		//Responsive?
		if(isset($themeoptions["tb_longwave_responsive_active"])){
			?><link rel="stylesheet" href="<?php echo $template_uri."/style/css/slider-media-queries.css"; ?>" type="text/css" /><?php
		}
?>
</head>
<body <?php body_class($layout."-layout")?>>
<!-- Begin Top Wrapper -->
<!-- Begin Body Wrapper -->
<div class="body-wrapper"> 
  
  <!-- Begin Header Wrapper -->
  <div class="header-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner">
      <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $themeoptions["tb_longwave_header_logo"];?>" alt="" /></a> </div>
      <nav>
	    <!-- Begin Menu -->
	    <div class="menu" id="menu">
	    <?php $defaults = array(
			'theme_location'  => 'navigation',
			'container'       => '', 
			'container_class' => '', 
			'container_id'    => '',
			'menu_class'      => '', 
			'menu_id'    	  => 'tiny',
			'fallback_cb'     => 'wp_page_menu'
		);
		wp_nav_menu( $defaults ); ?>
	    </div>
	    <!-- End Menu -->
	  </nav>
      <div class="clear"></div>
    </div>
    <!-- End Inner --> 
  </div>

  <!-- End Header Wrapper --> 
    