<?php
	//Post ID
		global $wp_query;
	    $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
	    	$post_id = $content_array->ID;
		}
		else $post_id=0;

	$template_uri = get_template_directory_uri();

	//Language Options
		$tb_longwave_readmore = __('Read More', 'tb_longwave');
		$tb_longwave_sharethis = __('Share This', 'tb_longwave');
		$tb_longwave_archive = __('Archive', 'tb_longwave');
		$tb_longwave_tags = __('Tag Archive', 'tb_longwave');
		$tb_longwave_category = __('Category', 'tb_longwave');

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
		
	//Search
		$allsearch = &new WP_Query("s=$s&showposts=-1");
		$count = $allsearch->post_count;
		wp_reset_query();
		$hits = $count == 1 ? $count." ".__("hit for","tb_longwave") : $count." ".__("hits for","tb_longwave");

	get_header();
?>

<?php if(!isset($themeoptions["tb_longwave_full_active"])){?>
<!-- Begin Box Wrapper -->
<div class="box-wrapper"> 
<?php } ?>
	<!-- Begin White Wrapper -->
	<div class="white-wrapper"> 
	<section>
	  <!-- Begin Inner -->
	  <div class="inner">
	    <?php if($headline){?>
			<div class="page-intro line clearfix">
		      <h1 class="page-title"><?php _e("Search","tb_longwave"); ?></h1>
		    </div>
		<?php } ?>
	    
	    <div class="intro"><?php echo $hits; ?> "<?php the_search_query(); ?>"</div>
		
		<?php if(isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"){ ?>
			 <!-- Begin Content -->
			 <div class="content">
		<?php } //Sidebar ?>
		
		<?php 
		    			$paged =
		    				( get_query_var('paged') && get_query_var('paged') > 1 )
		    				? get_query_var('paged')
		    				: 1;
		    			$args = array(
		    				'posts_per_page' => 10,
		    				'paged' => $paged
		    			);
		    			$args =
		    				( $wp_query->query && !empty( $wp_query->query ) )
		    				? array_merge( $wp_query->query , $args )
		    				: $args;
		    			query_posts( $args );
		    			?>

		
		<?php if (have_posts()) : ?>
		    		    <?php while (have_posts()) : the_post(); ?>
		    		
		    			<?php
		    			$timevar = get_post_time('F jS,Y', true); 

		    				if(get_post_type()!="post" && get_post_type()!="page"){
			    					$post_content_org = do_shortcode(get_the_content());
					    			$post_content = strip_tags(substr($post_content_org, 0 , 250));
					    			if(strlen($post_content_org)>250) $post_content .= "...";
			    					$post_link = '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
			    			}
			    			else{
				    			$post_content_org = do_shortcode(get_the_content());
				    			$post_content = strip_tags(substr($post_content_org, 0 , 250));
				    			if(strlen($post_content_org)>250) $post_content .= "...";
				    			 $post_link = '<a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
				    		} 
			    		
		    			//
		    			?>
		    					<article>
		    		                <h5 style="padding:0"><?php echo $post_link; ?></h5>
		    		                <p><?php echo $post_content;?></p>
		    		                <hr/>
		    					</article>
		    					<?php endwhile; ?>
					<?php else : ?>
					<h1>
					        <?php echo $searchnotfound ?>
					   </h1>
					<div style="clear:both"></div>
					<?php  endif; ?>   
		
		<?php if(isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"):?>
			</div><!-- End Content --> 
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
		    </aside>
		    <div class="clear"></div>
		    <!-- End Sidebar --> 
		<?php endif; //Sidebar ?>	 
	  </div>
	  <!-- End Inner --> 
	</section> 
	</div>
	<!-- End White Wrapper --> 
	<div class="divider white-wrapper"></div>
<?php get_footer(); ?>