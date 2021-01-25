<?php
/* 
Template Name: Content
*/
	//Post ID
		global $wp_query;
	    $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
	    	$post_id = $content_array->ID;
		}
		else $post_id=0;

	$template_uri = get_template_directory_uri();

	//Page Options
		if(have_posts()) $pageoptions = getOptions($post_id);	

	//Theme Options	
		$themeoptions = getThemeOptions(); 

	//Page Head Area
		if(isset($pageoptions['tb_longwave_activate_page_title'])){ 
			$headline = false;
		} 
		else {
			$headline = true;
		}

	get_header();
?>

  <?php if($headline){
  			 if(empty($pageoptions["tb_longwave_page_intro"])){ ?>	
					<!-- Begin Gray Wrapper Title -->
					<div class="dark-wrapper page-title"> 
						<!-- Begin Inne -->
						<div class="inner">
							<h1 class="title"><?php the_title(); ?></h1>
						</div>
						<!-- End Inner --> 
					</div>
					<!-- End Gray Wrapper --> 
	  		<?php } else { ?>	
					<!-- Begin Gray Wrapper Intro -->
					<div class="dark-wrapper intro"> 
						<!-- Begin Inne -->
						<div class="inner">
						    <p><?php echo do_shortcode($pageoptions["tb_longwave_page_intro"]); ?></p>
						</div>
						<!-- End Inner --> 
					</div>
					<!-- End Gray Wrapper --> 
			<?php } ?>
  <?php } ?>
  
  <!-- Begin White Wrapper -->
  <div class="light-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner">	    
		<?php if(isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"){ ?>
			 <article>
			 <!-- Begin Content -->
			 <div class="content full">
		<?php } //Sidebar ?>
		
		<?php if(have_posts()) : 
		    	while(have_posts()) : the_post();	
		    		the_content();	
		    	endwhile;  //have_posts 
		    	
		   endif;?>   
		   <div class="clear"></div>
		<?php if(isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"):?>
			</div><!-- End Content --> 
			 </article>
			 <aside>
		    <div class="sidebar">
		    <!-- Begin Sidebar --> 
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($pageoptions["tb_longwave_sidebar"]) ) : ?>
			    
				    <div class="sidebox">
				      <h3>Sidebar Widget</h3>
				      Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
				    </div>
			<?php endif; ?>
			</div>
		    <div class="clear"></div>
		    <!-- End Sidebar --> 
			 </aside>
		<?php endif; //Sidebar ?>	 
    </div>
    <!-- Begin Inner --> 
  </div>
  <!-- End White Wrapper -->
<?php get_footer(); ?>