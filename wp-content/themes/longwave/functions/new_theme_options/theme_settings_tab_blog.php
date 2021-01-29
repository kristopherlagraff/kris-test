<?php
/**
 * Initializes the theme's input example by registering the Sections,
 * Fields, and Settings. This particular group of options is used to demonstration
 * validation and sanitization.
 *
 * This function is registered with the 'admin_init' hook.
 */ 
function tb_longwave_theme_initialize_blog_options() {

	if( false == get_option( 'tb_longwave_theme_blog_options' ) ) {	
		add_option( 'tb_longwave_theme_blog_options' );
	} // end if

	add_settings_section(
		'tb_longwave_blog_options_section',
		'Blog Options',
		'tb_longwave_blog_options_callback',
		'tb_longwave_theme_blog_options'
	);
	
	add_settings_field(	
		'tb_longwave_related_posts_active',						// ID used to identify the field throughout the theme
		'Show Related Posts?',							// The label to the left of the option interface element
		'tb_longwave_checkbox_callback',	// The name of the function responsible for rendering the option interface
		'tb_longwave_theme_blog_options',	// The page on which this option will be displayed
		'tb_longwave_blog_options_section',			// The name of the section to which this field belongs
		array(								// The array of arguments to pass to the callback. In this case, just a description.
			'tb_longwave_related_posts_active','tb_longwave_theme_blog_options','Show related Posts in Blog Posts (this overrules the single post option)?'
		)
	);
	
	add_settings_field(	
		'tb_longwave_cut_overview_title',						// ID used to identify the field throughout the theme
		'Cut overview title',							// The label to the left of the option interface element
		'tb_longwave_checkbox_callback',	// The name of the function responsible for rendering the option interface
		'tb_longwave_theme_blog_options',	// The page on which this option will be displayed
		'tb_longwave_blog_options_section',			// The name of the section to which this field belongs
		array(								// The array of arguments to pass to the callback. In this case, just a description.
			'tb_longwave_cut_overview_title','tb_longwave_theme_blog_options','Cut the Grid View Post Title so that it fits in one line(cleaner design)?'
		)
	);
		
	add_settings_field(	
		'tb_longwave_cut_overview_image_height',						
		'Force Grid Image Height',							
		'tb_longwave_checkbox_callback',	
		'tb_longwave_theme_blog_options',	
		'tb_longwave_blog_options_section',
		array(
			'tb_longwave_cut_overview_image_height','tb_longwave_theme_blog_options','Cut all the Grid View Post Featured Images(cleaner design)?'
		)			
	);
	
	add_settings_field(	
		'tb_longwave_blog_excerpt',						
		'Excerpt Words',							
		'tb_longwave_input_callback',	
		'tb_longwave_theme_blog_options',	
		'tb_longwave_blog_options_section',
		array(
			'tb_longwave_blog_excerpt','tb_longwave_theme_blog_options','How many words to be displayed in the blog overview and related posts excerpt.'
		)			
	);
	add_settings_field(	
		'tb_longwave_blog_single_default_sidebar',						
		'Default Post Sidebar',							
		'tb_longwave_sidebar_choose_callback',	
		'tb_longwave_theme_blog_options',	
		'tb_longwave_blog_options_section',
		array(
			'tb_longwave_blog_single_default_sidebar','tb_longwave_theme_blog_options','Choose the sidebar to display for the posts (if set it overwrites the "No Sidebar" value of the single posts)?'
		)			
	);
				
	register_setting(
		'tb_longwave_theme_blog_options',
		'tb_longwave_theme_blog_options',
		'tb_longwave_theme_validate_blog_options'
	);

} // end tb_longwave_theme_initialize_blog_options
add_action( 'admin_init', 'tb_longwave_theme_initialize_blog_options' );


/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 
/**
 * This function provides a simple description for the Input Examples page.
 *
 * It's called from the 'tb_longwave_theme_intialize_blog_options_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function tb_longwave_blog_options_callback() {
	echo '<p>Certain options that influence the appearance of the blog part of Glisseo.</p>';
} // end tb_longwave_general_options_callback


/* ------------------------------------------------------------------------ *
 * Setting Callbacks
 * ------------------------------------------------------------------------ */ 
 
 /**
 * Sanitization callback for the social options. Since each of the social options are text inputs,
 * this function loops through the incoming option and strips all tags and slashes from the value
 * before serializing it.
 *	
 * @params	$input	The unsanitized collection of options.
 *
 * @returns			The collection of sanitized values.
 */
function tb_longwave_theme_validate_blog_options( $input ) {

	// Create our array for storing the validated options
	$output = array();
	
	// Loop through each of the incoming options
	foreach( $input as $key => $value ) {
		
		// Check to see if the current option has a value. If so, process it.
		if( isset( $input[$key] ) ) {
		
			// Strip all HTML and PHP tags and properly handle quoted strings
			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
			
		} // end if
		
	} // end foreach
	
	// Return the array processing any additional functions filtered by this action
	return apply_filters( 'tb_longwave_theme_validate_blog_options', $output, $input );

} // end tb_longwave_theme_validate_blog_options
