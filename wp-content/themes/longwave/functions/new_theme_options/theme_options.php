<?php
	// Theme Options		
		$theme_sections = array(
			array(
				'label' => 'General',
				'desc' => '',
				'slug' => 'general',
				'fields' => array(
								array(
									'id' => 'responsive_active',
									'label' => 'Responsive Active?',
									'description' => 'Turn on responsive behaviour',
									'type' => 'checkbox'
								),
								array(
									'id' => 'full_active',
									'label' => 'Full Layout?',
									'description' => 'Turn on the full view of the theme?',
									'type' => 'checkbox'
								),
								array(
									'id' => 'main_style',
									'label' => 'Theme Main Style?',
									'description' => 'The basic theme style.',
									'type' => 'select',
									'options' => array(array('light','light'),array('dark','dark')) 
								),
								array(
									'id' => 'highlight_color',
									'label' => 'Theme Highlight Color',
									'description' => 'The highlight color used throughout the theme.',
									'type' => 'color'
								),
								array(
									'id' => 'highlight_hover_color',
									'label' => 'Theme Highlight Hover Color',
									'description' => 'The highlight hover color used throughout the theme.',
									'type' => 'color'
								),
								array(
									'id' => 'main_fontfamily',
									'label' => 'Main Font Family',
									'description' => 'The font family of the font used for the main menu (<a href=http://www.version-four.com/themeforest/onetouch/wp-content/uploads/2012/09/google_web_fonts.jpg target=_blank>Quick Help if you use Google Fonts</a>).',
									'type' => 'input'
								),
								array(
									'id' => 'css',
									'label' => 'Custom CSS',
									'description' => 'Add Custom CSS here that will work in the theme. We recommend using a child theme anyway, this is only a quick workaround.',
									'type' => 'textarea'
								),
								array(
									'id' => 'analytics',
									'label' => 'Google Analytics',
									'description' => 'Insert your Google Analytics code here, it will be put in the footer. But we recommend using a plugin for doing that, this is only a quick workaround!',
									'type' => 'textarea'
								)
				) 
			),
			array(
				'label' => 'Header',
				'desc' => '',
				'slug' => 'header'
			),
			array(
				'label' => 'Body',
				'desc' => '',
				'slug' => 'body'
			),
			array(
				'label' => 'Footer',
				'desc' => '',
				'slug' => 'footer'
			),
			array(
				'label' => 'Sidebars',
				'desc' => '',
				'slug' => 'sidebars'
			),
			array(
				'label' => 'Update',
				'desc' => '',
				'slug' => 'update'
			),
			array(
				'label' => 'Support',
				'desc' => '',
				'slug' => 'support'
			)
		);
?>