<?php
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
<!-- Begin Portfolio Content Wrapper -->
  <div class="pcw"> 
  <?php if($headline){
  			 if(empty($pageoptions["tb_longwave_page_intro"])){ ?>	
					<!-- Begin Gray Wrapper Title -->
					<div class="dark-wrapper page-title"> 
						<!-- Begin Inne -->
						<div class="inner">
							<h1 class="title alignleft"><?php the_title(); ?></h1>
							<div class="navigation alignright">
								<?php 
								if(isset($_GET["tp"])){ ?>
								<a href="<?php echo get_permalink($_GET["tp"]);?>" id="gwi-thumbs" title="<?php _e("All Items","tb_longwave"); ?>"><i class='icon-th'></i></a>
								<?php
									$excluded_categories = get_excluded_portfolio_categories($_GET["tp"]);
							
									$next_post = get_adjacent_portfolio_post( false, $excluded_categories,false );
									
									if($next_post) : 
									$next_id = $next_post->ID;
									$next_title = $next_post->post_title;
									$next_link = get_permalink($next_id);
									$next_link = strpos($next_link,"?") ? $next_link."&tp=".$_GET["tp"] : $next_link."?tp=".$_GET["tp"];
									echo '<a href="'.$next_link.'" id="gwi-prev" title="'.$next_title.'"><i class="icon-left-open-1"></i></a>';
							endif; ?><?php 
									
									
									$prev_post = get_adjacent_portfolio_post( false, $excluded_categories ,true );
									if($prev_post) : 
										$prev_id = $prev_post->ID;
										$prev_title = $prev_post->post_title;
										$prev_link = get_permalink($prev_id);
										$prev_link = strpos($prev_link,"?") ? $prev_link."&tp=".$_GET["tp"] : $prev_link."?tp=".$_GET["tp"];
										echo '<a id="gwi-next" href="'.$prev_link.'" title="'.$prev_title.'"><i class="icon-right-open-1"></i></a>';
									endif; 
								} //if get->tp
							?>
							</div>
							<div class="clear"></div>
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
		<?php 
			if(isset($_GET["tp"])) $portfolio_options = getOptions($_GET["tp"]);
			if(isset($_GET["fp"])) $portfolio_options = getOptions($_GET["fp"]);
			if(!isset($portfolio_options["tb_longwave_activate_portfolio_socials"]) ) : ?>          
	          <hr />
	          <h4 class="alignleft sharingwrapper"><?php _e("Share this article:","tb_longwave");?></h4>
	          <div class="alignright sharingwrapper"><?php echo do_shortcode("[sharebar facebook twitter google+ pinterest]"); ?></div>
	          <div class="clear"></div>
	    <?php endif; ?>   
          
	      <?php	if(isset($_GET["tp"])) :
			   		if(!isset($portfolio_options["tb_longwave_activate_portfolio_related"])){	
			   			$terms = get_the_terms($post->ID, 'category_portfolio');
			   			foreach($terms as $term){
			   				$category_list[] = $term->slug;
			   			}
			   			
			   			$columns = !empty($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar" ? 3 : 4;
			   			
			   			if(!isset($pageoptions["tb_longwave_related_posts_attribute"])) $pageoptions["tb_longwave_related_posts_attribute"]="category";
		   			
			   			$tags = wp_get_post_tags($post->ID);
			   			
			   			if($pageoptions["tb_longwave_related_posts_attribute"]!="category" && $tags){
			        		$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
								'post_type' => get_post_type( $post_id),
								'tag__in' => $tag_ids,
								'post__not_in' => array($post->ID),
								'showposts'=> $columns, 
								'ignore_sticky_posts'=>1,
							);
						}
						else {
							$args=array(
								'post_type' => get_post_type( $post_id),
								'post__not_in' => array($post_id),
								'showposts'=> $columns, 
								'ignore_sticky_posts'=>1,
								'category_portfolio' =>  implode(",", $category_list)
							);
						}
						
						$temp = $wp_query; 
						$my_query = new wp_query($args);
						if( $my_query->have_posts() ) {						
						?>
						<!-- Begin Related Posts -->
						<div class="clear"></div>
						 <!-- Begin Inner --> 
					    </div>
					    <!-- End White Wrapper --> 
					  </div>
					  <!-- End Portfolio Content Wrapper --> 
					  
					  <!-- Begin Gray Wrapper -->
					  <div class="dark-wrapper"> 
					    <!-- Begin Inner -->
					   <div class="inner">
					    <h2 class="colored"><?php _e("Related Works","tb_longwave"); ?></h2>
						
						<div class="grid-wrapper">
							<ul class="items col4 latest">
								<?php
									while ($my_query->have_posts()) {
										$my_query->the_post();
										$postcustoms = getOptions($post->ID);
										$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),280,225,true);
										//$the_title = get_the_title();
										//$the_title = strlen($the_title)>25 ? trim(substr($the_title, 0, 25))."..." : $the_title;
										$tags = wp_get_post_tags($post->ID);
										$count = 0;
										$tag_names = array();
										foreach($tags as $tag){
											if($count < 4) $tag_names[] = $tag->name;
											$count++;
										}
										
								?>
								
								<?php if(!empty($blogimageurl)) { ?>
									<li class="item artwork"> <a href="<?php the_permalink(); ?>"><img src="<?php echo $blogimageurl;?>" alt="" />
							            <div>
							              <h5><?php the_title();?><span><?php echo implode(", ", $tag_names); ?></span></h5>
							            </div>
							            </a> 
							        </li>
								<?php
									} //if
								} //while
									$wp_query = null; 
									$wp_query = $temp;
									wp_reset_query();
								?>
							</ul>
						</div>
					<!-- End Related Posts -->
				</div>
				</div> <!-- Begin White Wrapper -->
				<div class="light-wrapper"><div class="inner"><?php } //if have_posts()
			} //if portfolio option
		endif; //if related posts		
		?>
		   
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
</div>
<!-- End Portfolio Wrapper -->
<script>
jQuery(document).ready(function ($) {
    jQuery(".share li div").css("opacity", "1.0");
    jQuery(".share li div").hover(function () {
        jQuery(this).stop().animate({
            opacity: 0.80
        }, "fast");
    },

    function () {
        jQuery(this).stop().animate({
            opacity: 1.0
        }, "fast");
    });
});
</script>
<?php get_footer(); ?>