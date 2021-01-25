<?php

/**
 * This function introduces the theme options into the 'Appearance' menu and into a top-level menu.
 */
 
function tb_longwave_example_theme_menu() {
	global $theme_sections; 	// The Sections Array that defines the single Tabs later on
	
	add_theme_page(
		'tb_longwave Theme', 					// The title to be displayed in the browser window for this page.
		'Longwave Theme',						// The text to be displayed for this menu item
		'administrator',						// Which type of users can see this menu item
		'tb_longwave_theme_options',			// The unique ID - that is, the slug - for this menu item
		'tb_longwave_theme_display'				// The name of the function to call when rendering this menu's page
	);
	
	add_menu_page(
		'Longwave Options',						// The value used to populate the browser's title bar when the menu page is active
		'Longwave Options',						// The text of the menu in the administrator's sidebar
		'administrator',						// What roles are able to access the menu
		'tb_longwave_theme_menu',				// The ID used to bind submenu items to this menu 
		'tb_longwave_theme_display',			// The callback function used to render this menu
		get_template_directory_uri()."/style/images/favicon.png"				
	);
	
	$firstrun = true;
	foreach($theme_sections as $theme_section):
		if(!$firstrun){
			add_submenu_page(
				'tb_longwave_theme_menu',				// The ID of the top-level menu page to which this submenu item belongs
				$theme_section["label"],				// The value used to populate the browser's title bar when the menu page is active
				$theme_section["label"],				// The label of this submenu item displayed in the menu
				'administrator',						// What roles are able to access this submenu item
				'tb_longwave_theme_'.$theme_section["slug"].'_options',	// The ID used to represent this submenu item
				create_function( null, 'tb_longwave_theme_display( "'.$theme_section["slug"].'_options" );' )
			);
		}
		else{	
			add_submenu_page(
				'tb_longwave_theme_menu',				// The ID of the top-level menu page to which this submenu item belongs
				$theme_section["label"],				// The value used to populate the browser's title bar when the menu page is active
				$theme_section["label"],				// The label of this submenu item displayed in the menu
				'administrator',						// What roles are able to access this submenu item
				'tb_longwave_theme_'.$theme_section["slug"].'_options',	// The ID used to represent this submenu item
				'tb_longwave_theme_display'				// The callback function used to render the options for this submenu item
			);
			$firstrun = false;
		}
	endforeach;
} // end tb_longwave_example_theme_menu
add_action( 'admin_menu', 'tb_longwave_example_theme_menu' );


/**
 * Renders a simple page to display for the theme menu defined above.
 */
function tb_longwave_theme_display( $active_tab = '' ) {
	global $theme_sections;
?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">
	
		<div id="icon-themes" class="icon32"></div>
		<h2>Longwave Theme Options</h2>
		<?php settings_errors(); ?>
		
		<?php 
			if( isset( $_GET[ 'tab' ] ) ) {
				$active_tab = $_GET[ 'tab' ];
				$active_slug = str_replace("tb_longwave_theme_","",$_GET[ 'tab' ]);
				$active_slug = str_replace("_options","",$_GET[ 'tab' ]);
			} else {
				$active_tab = 'general_options';
				$active_slug = 'general';
			}
		?>
		
		<h2 class="nav-tab-wrapper">
		<?php foreach($theme_sections as $theme_section): ?>
			<a href="?page=tb_longwave_theme_options&tab=<?php echo $theme_section["slug"]; ?>_options" class="nav-tab <?php echo $active_tab == $theme_section["slug"].'_options' ? 'nav-tab-active' : ''; ?>"><?php echo $theme_section["label"]; ?></a>
		<?php endforeach;?>
		</h2>
		
		<form method="post" action="options.php">
			<?php
				settings_fields( 'tb_longwave_theme_'.$active_slug.'_options' );
				do_settings_sections( 'tb_longwave_theme_'.$active_slug.'_options' );				
				submit_button();
			?>
		</form>
		
	</div><!-- /.wrap -->
<?php
} // end tb_longwave_theme_display
?>
<?php
/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */ 
/**
 * Initializes the theme's display options page by registering the Sections,
 * Fields, and Settings.
 *
 * This function is registered with the 'admin_init' hook.
 */ 
function tb_longwave_initialize_theme_options() {
	global $theme_sections;
	foreach($theme_sections as $theme_section):

		// If the theme options don't exist, create them.
		if( false == get_option( 'tb_longwave_theme_'.$theme_section["slug"].'_options' ) ) {	
			add_option( 'tb_longwave_theme_'.$theme_section["slug"].'_options' );
		} // end if
	
		// First, we register a section. This is necessary since all future options must belong to a 
		add_settings_section(
			'tb_longwave_'.$theme_section["slug"].'_settings_section',			// ID used to identify this section and with which to register options
			'General Options',													// Title to be displayed on the administration page
			'',																	// Callback used to render the description of the section
			'tb_longwave_theme_'.$theme_section["slug"].'_options'				// Page on which to add this section of options
		);
		
		if(!empty($theme_section["fields"]))
			foreach($theme_section["fields"] as $field):
				$options = empty($field["options"]) ? "" : $field["options"]; 
				// Next, we'll introduce the fields for toggling the visibility of content elements.
				add_settings_field(	
					'tb_longwave_'.$field["id"],									// ID used to identify the field throughout the theme
					$field["label"],												// The label to the left of the option interface element
					'tb_longwave_'.$field["type"].'_callback',						// The name of the function responsible for rendering the option interface
					'tb_longwave_theme_'.$theme_section["slug"].'_options',			// The page on which this option will be displayed
					'tb_longwave_'.$theme_section["slug"].'_settings_section',		// The name of the section to which this field belongs
					array(															// The array of arguments to pass to the callback
						'tb_longwave_'.$field["id"],'tb_longwave_theme_'.$theme_section["slug"].'_options',$field["description"],$options
					)
				);
			endforeach;
		
		// Finally, we register the fields with WordPress
		register_setting(
			'tb_longwave_theme_'.$theme_section["slug"].'_options',
			'tb_longwave_theme_'.$theme_section["slug"].'_options'
		);
	endforeach;
} // end tb_longwave_initialize_theme_options
add_action( 'admin_init', 'tb_longwave_initialize_theme_options' );

$themeurl = get_template_directory_uri();
function add_tb_scripts()
{
	global $themeurl;
	if(is_admin() && isset($_GET["page"])){
		wp_enqueue_script( 'tb_colorpicker',$themeurl.'/functions/theme_options/jscolor/jscolor.js');
   }
}
add_action('admin_menu', 'add_tb_scripts');	
?>