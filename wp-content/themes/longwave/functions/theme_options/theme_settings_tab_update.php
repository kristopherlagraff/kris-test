<?php
/**
 * Initializes the theme's input example by registering the Sections,
 * Fields, and Settings. This particular group of options is used to demonstration
 * validation and sanitization.
 *
 * This function is registered with the 'admin_init' hook.
 */ 
function tb_longwave_theme_initialize_update_options() {

	if( false == get_option( 'tb_longwave_theme_update_options' ) ) {	
		add_option( 'tb_longwave_theme_update_options' );
	} // end if

	add_settings_section(
		'tb_longwave_update_options_section',
		'',
		'tb_longwave_update_options_callback',
		'tb_longwave_theme_update_options'
	);
	
	add_settings_field(	
		'tb_longwave_updates_active',						// ID used to identify the field throughout the theme
		'Automatically Update the Theme?',							// The label to the left of the option interface element
		'tb_longwave_checkbox_callback',	// The name of the function responsible for rendering the option interface
		'tb_longwave_theme_update_options',	// The page on which this option will be displayed
		'tb_longwave_update_options_section',			// The name of the section to which this field belongs
		array(								// The array of arguments to pass to the callback. In this case, just a description.
			'tb_longwave_updates_active','tb_longwave_theme_update_options','Update the theme files automatically (will overwrite all files but no options entered in the backend or content)?'
		)
	);

	add_settings_field(	
		'tb_longwave_update_user',						
		'ThemeForest User',							
		'tb_longwave_input_callback',	
		'tb_longwave_theme_update_options',	
		'tb_longwave_update_options_section',
		array(
			'tb_longwave_update_user','tb_longwave_theme_update_options','Your Username in the ThemeForest.'
		)			
	);
	
	add_settings_field(	
		'tb_longwave_update_api',						
		'ThemeForest API key',							
		'tb_longwave_input_callback',	
		'tb_longwave_theme_update_options',	
		'tb_longwave_update_options_section',
		array(
			'tb_longwave_update_api','tb_longwave_theme_update_options','One API Key of your ThemeForest Profile (see an <a  target="_blank" href="http://www.thunderbuddies4life.com/skybox_blank/wp-content/uploads/2013/02/apikey.png">example</a>).'
		)			
	);
				
	register_setting(
		'tb_longwave_theme_update_options',
		'tb_longwave_theme_update_options',
		'tb_longwave_theme_validate_update_options'
	);

} // end tb_longwave_theme_initialize_update_options
add_action( 'admin_init', 'tb_longwave_theme_initialize_update_options' );


/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 
/**
 * This function provides a simple description for the Input Examples page.
 *
 * It's called from the 'tb_longwave_theme_intialize_update_options_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function tb_longwave_update_options_callback() {
	echo '<p>You could let your theme automatically search for updates and install them. None of your backend options or your content will be touched. If you need to update plugins inside you still need to update them manually (Revolution Slider in this theme). Follow us on twitter to get the news -> <a href="http://www.twitter.com/tbthemes" target="_blank">http://www.twitter.com/tbthemes</a></p>';
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
function tb_longwave_theme_validate_update_options( $input ) {

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
	return apply_filters( 'tb_longwave_theme_validate_update_options', $output, $input );

} // end tb_longwave_theme_validate_update_options
