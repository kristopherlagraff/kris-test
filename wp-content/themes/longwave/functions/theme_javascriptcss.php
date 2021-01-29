<?php
/* ------------------------------------- */
/* ENQUEUE JAVASCRIPTS + CSS */
/* ------------------------------------- */
function loadJSCSS() {
	if (!is_admin()) {
		wp_enqueue_script( 'jquery' );
	
	// Load Theme Options
		$themeoptions = array_merge(get_option("tb_longwave_theme_general_options"),get_option("tb_longwave_theme_header_options"));	
		
	
	// Enqueue the Theme Styles

		 
		//Basic 
		wp_enqueue_style( 'tb_base_style',get_stylesheet_directory_uri().'/style.css');
		
		//Responsive?
		if(isset($themeoptions["tb_longwave_responsive_active"])){
			wp_enqueue_style( 'tb_mediaquery_style',T_CSS.'/media-queries.css');
		}
		

		//Google Font
		$google_font = $themeoptions["tb_longwave_main_font"];
	    if(!empty($google_font)) wp_enqueue_style( 'tb_googlefont_style',$google_font);
	    
	    //Fontello Icons
	    wp_enqueue_style( 'tb_fontello_style',T_TYPE.'/fontello.css');
	    
	    //Main Color Style
		if(!empty($themeoptions["tb_longwave_main_style"])) wp_enqueue_style( 'tb_longwave_main_style',T_CSS."/".$themeoptions["tb_longwave_main_style"].".css");
		 
	    
	// Enqueue the Theme JS  
		
		//Navigation
		wp_enqueue_script('tb_ddsmoothmenu_script', T_JS."/ddsmoothmenu.js", array('jquery'),false,true);
		wp_enqueue_script('tb_selectnav_script', T_JS."/selectnav.js", array('jquery'),false,true);
		
		//Basics
		wp_enqueue_script('tb_easytabs_script', T_JS."/jquery.easytabs.min.js", array('jquery'),false,true);
		wp_enqueue_script('tb_hoverdir_script', T_JS."/jquery.hoverdir.min.js", array('jquery'),false,true);
		wp_enqueue_script('tb_isotope_script', T_JS."/jquery.isotope.min.js", array('jquery'),false,true);
		wp_enqueue_script('tb_twitter_script', T_JS."/twitter.min.js", array('jquery'),false,true);
		wp_enqueue_script('tb_fitvids_script', T_JS."/jquery.fitvids.js", array('jquery'),false,true);
		wp_enqueue_script('tb_jribble_script', T_JS."/jquery.jribbble-0.11.0.ugly.js", array('jquery'),false,true);		
		wp_enqueue_script('tb_sharrre_script', T_JS."/jquery.sharrre-1.3.3.php", array('jquery'),false,true);		
		wp_enqueue_script('tb_portfolio_script', T_JS."/jquery.sliderportfolio.js", array('jquery'),false,true);
		wp_enqueue_script('tb_retina_script', T_JS."/retina.js", array('jquery'),false,true);	
					
		//Main Script
		wp_enqueue_script('tb_longwave_script', T_JS."/scripts.js", array('jquery'),false,true);
		
		//Comments
		if(is_singular() && get_option("thread_comments")) wp_enqueue_script("comment-reply");
		
	}
}
add_action('wp_enqueue_scripts', 'loadJSCSS');
?>
