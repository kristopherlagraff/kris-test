<?php
// Array that holds all Page Options
// class is used to trigger some jQuery action

$custom_page_meta_fields = array(
		array(
			'label'	=> 'Hide Page Title Area?',
			'text' => 'Hidden',
			'desc'	=> 'Hide the Page Head?',
			'id'	=> $prefix.'activate_page_title',
			'type'	=> 'checkbox',
			'default' => 'checked',
			'class' => 'tp_options content default portfolio videocase gallery index contact social_timeline'
		),
		array(
			'label'	=> 'Alternative Page Title Text',
			'desc'	=> 'Intro Text appearing before the content default (Page Title Area) instead of the Page Title',
			'id'	=> $prefix.'page_intro',
			'type'	=> 'textarea',
			'class' => 'tp_options content default portfolio index gallery headline videocase home_page contact social_timeline'
		),
		array(
			'label'	=> 'Google Map Link',
			'text' => '',
			'desc'	=> 'Search your needed destination at maps.google.com and copy the URL from the window to this field',
			'id'	=> $prefix.'page_head_gmap',
			'type'	=> 'text',
			'default' => 'checked',
			'class' => 'tp_options contact gmap'
		),
		array(
			'label'	=> 'Select Sidebar',
			'desc'	=> 'Choose the Sidebar to this Page',
			'id'	=>  $prefix.'sidebar',
			'default' => 'Blog Sidebar',
			'type'	=> 'sidebar_list',
			'class' => 'tp_options content default index template_blog_sidebar contact'
		)
);

$custom_page_blog_meta_fields = array(
		array (
			'label'	=> 'Blog Display Style',
			'desc'	=> 'Decide whether you want the featured image to be displayed on top or left of the excerpt',
			'id'	=> $prefix.'blog_display_type',
			'type'	=> 'radio',
			'default' => 'full',
			'options' => array (
				'left' => array (
					'label' => 'left',
					'value'	=> 'left'
				),
				'top' => array (
					'label' => 'top',
					'value'	=> 'top'
				)
			),
			'class' => 'tp_options index'
		),	
		array(
			'label'	=> 'Blog Posts per Page',
			'text' => '',
			'desc'	=> 'In case you need to overwrite the normal WP input in the main <br>WP menu->Settings->Reading',
			'id'	=> $prefix.'posts_per_page',
			'type'	=> 'text',
			'default' => '',
			'class' => 'tp_options index'
		),
		array(
			'label'	=> 'Hide Categories?',
			'text' => 'Hidden',
			'desc'	=> 'Hide the category meta infos?',
			'id'	=> $prefix.'activate_blog_categories',
			'type'	=> 'checkbox',
			'default' => 'checked',
			'class' => 'tp_options index'
		),
		array(
			'label'	=> 'Hide Comment Count?',
			'text' => 'Hidden',
			'desc'	=> 'Hide the comments meta infos?',
			'id'	=> $prefix.'activate_blog_comments',
			'type'	=> 'checkbox',
			'default' => 'checked',
			'class' => 'tp_options index'
		),
		array(
			'label'	=> 'Excerpt Words',
			'text' => '',
			'desc'	=> 'How many words in the excerpt (Blank = 55)?',
			'id'	=> $prefix.'page_blog_excerpt',
			'type'	=> 'text',
			'default' => 'checked',
			'class' => 'tp_options index'
		),
		array(
			'label'	=> 'Preview Width',
			'text' => '',
			'desc'	=> 'The width of the displayed featured Image or Video',
			'id'	=> $prefix.'page_blog_image_width',
			'type'	=> 'text',
			'default' => 'checked',
			'class' => 'tp_options index left_column'
		),
		array(
			'label'	=> 'Preview Height',
			'text' => '',
			'desc'	=> 'The height of the displayed featured Image or Video (blank = auto)',
			'id'	=> $prefix.'page_blog_image_height',
			'type'	=> 'text',
			'default' => 'checked',
			'class' => 'tp_options index left_column'
		),
		
);

$custom_page_portfolio_meta_fields = array(
		array(
			'label'	=> 'Title',
			'text' => '',
			'desc'	=> 'Headline of the Portfolio',
			'id'	=> $prefix.'page_portfolio_title',
			'type'	=> 'text',
			'default' => 'checked',
			'class' => ''
		),
		array(
			'label'	=> 'Categories',
			'desc'	=> 'Choose all Categories you like to see in this overview (use shift,strg,cmd key for multiple selection)',
			'id'	=> $prefix.'portfolio_categories',
			'type'	=> 'portfolio_category_list',
			'class' => ''
		),
		array (
			'label'	=> 'Detail Style',
			'desc'	=> 'Decide how you want the detail page to appear',
			'id'	=> $prefix.'portfolio_display_type',
			'type'	=> 'radio',
			'default' => 'full',
			'options' => array (
				'slider' => array (
					'label' => 'Slider (in Page)',
					'value'	=> 'slider'
				),
				'page' => array (
					'label' => 'Link (Seperate Page)',
					'value'	=> 'link'
				)
			),
			'class' => ''
		),	
		array(
			'label'	=> 'Hide Social Sharing?',
			'text' => 'Hidden',
			'desc'	=> 'Hide the sharing icons (in the detail views)?',
			'id'	=> $prefix.'activate_portfolio_socials',
			'type'	=> 'checkbox',
			'default' => 'checked',
			'class' => ' '
		),
		array(
			'label'	=> 'Hide related Posts?',
			'text' => 'Hidden',
			'desc'	=> 'Hide the related Posts (in the detail page only, not slider view)?',
			'id'	=> $prefix.'activate_portfolio_related',
			'type'	=> 'checkbox',
			'default' => 'checked',
			'class' => ' '
		)
);
?>