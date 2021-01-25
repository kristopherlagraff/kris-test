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
		$postoptions = $pageoptions;

	//Theme Options	
		$themeoptions = getThemeOptions(); 

	//Page Head Area
		if(isset($pageoptions['tb_longwave_activate_page_title'])){ 
			$headline = false;
		} 
		else {
			$headline = true;
		}
	
	//Sidebar
		if (!isset($pageoptions["tb_longwave_sidebar"]) || $pageoptions["tb_longwave_sidebar"]=="nosidebar"){	
			if(isset( $themeoptions["tb_longwave_blog_single_default_sidebar"]))
				$pageoptions["tb_longwave_sidebar"] = $themeoptions["tb_longwave_blog_single_default_sidebar"];
		}
		
		
	//Default Values
		$align = "";
		//Orientation
		
		if (isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"){
			$pageoptions["tb_longwave_page_blog_image_width"] = 730;
		}
		else {
			$pageoptions["tb_longwave_page_blog_image_width"] = 1040;
		}

	get_header();
?>

  <?php if($headline){
  			 if(empty($pageoptions["tb_longwave_page_intro"])){ ?>	
					<!-- Begin Gray Wrapper Title -->
					<div class="dark-wrapper page-title"> 
						<!-- Begin Inne -->
						<div class="inner">
							<h1 class="title" style="float:left;"><?php echo get_the_title($post_id); ?></h1>
							<div class="navigation alignright">
								<?php 
										
										$next_post = get_adjacent_post(false,"",true);
										
										if($next_post) : 
										$next_id = $next_post->ID;
										$next_title = $next_post->post_title;
										$next_link = get_permalink($next_id);
										echo '<a href="'.$next_link.'" id="gwi-prev" title="'.$next_title.'"><i class="icon-left-open-1"></i></a>';
								endif; ?><?php 
										
										
										$prev_post = get_adjacent_post(false,"",false);
										if($prev_post) : 
											$prev_id = $prev_post->ID;
											$prev_title = $prev_post->post_title;
											$prev_link = get_permalink($prev_id);
											echo '<a id="gwi-next" href="'.$prev_link.'" title="'.$prev_title.'"><i class="icon-right-open-1"></i></a>';
										endif; 

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
    <div class="inner post_content full">	    
		<?php if(isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"){ ?>
			 <article>
			 <!-- Begin Content -->
			 <div class="content full <?php post_class(); ?>">
		<?php } //Sidebar ?>
		
		<?php if(have_posts()) : 
				//Postcounter is for Linebreaks + Display
					$postcounter = 1;
					while(have_posts()) : the_post();	
						
			    			//Post Top
		        			$post_top="";
			        		if(isset($postoptions["tb_longwave_post_type"]))
								switch ($postoptions["tb_longwave_post_type"]) {
									case 'image':
												$featuredImage = get_post_thumbnail_id($post->ID);
							        			if(!empty($featuredImage)){
									        		$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),$pageoptions["tb_longwave_page_blog_image_width"]);
													$post_top = '<div class="frame"><img src="'.$blogimageurl.'" alt="'.get_the_title().'" /></div>';											
												}	
												if(empty($blogimageurl)) $post_top = "";
																						
												break;
									case 'video':
												if($postoptions["tb_longwave_video_type"]=="youtube"){
													$post_top = '<iframe src="http://www.youtube.com/embed/'.$postoptions["tb_longwave_youtube_id"].'?hd=1&amp;wmode=opaque&amp;autohide=1&amp;showinfo=0" width="'.$postoptions["tb_longwave_video_width"].'" height="'.$postoptions["tb_longwave_video_height"].'" style="border:0"></iframe>';
												}
												elseif ($postoptions["tb_longwave_video_type"]=="vimeo") {
													$post_top = '<iframe src="http://player.vimeo.com/video/'.$postoptions["tb_longwave_vimeo_id"].'?portrait=0&amp;title=0&amp;byline=0&amp;color='.$themeoptions["tb_longwave_highlight_color"].'" width="'.$postoptions["tb_longwave_video_width"].'" height="'.$postoptions["tb_longwave_video_height"].'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
												}
												break;
									case 'slider':
												if(get_revslider_property($postoptions["tb_longwave_slider"],'slider_type')=="fullwidth")
													echo '<style>.featured .fullwidthabanner{height:'.get_revslider_property($postoptions["tb_longwave_slider"],'height').'px;}</style>'; 
												
												$post_top = do_shortcode('[rev_slider '.$postoptions["tb_longwave_slider"].'][spacer height="30px"]');
												break;
									default:
												$post_top = "";
												break;	
								}
								
		        			
							//Categories
							$category_links = "";
							foreach((get_the_category()) as $category) {
								$category_links .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
							}
							$category_links = substr($category_links, 2);
							
							//Comments
							$numOfComments = get_comments_number();
							$numOfComments = $numOfComments == 0 ? "No" : $numOfComments;
							$numOfComments = $numOfComments == 1 ? __("1 Comment","tb_longwave") : $numOfComments . __(" Comments","tb_longwave");
							
							//Category Output
							$category = !isset($themeoptions["tb_longwave_activate_blog_categories"]) ? '<span class="sep">|</span> <span class="comments">' . $category_links . '</span>' : '';
							
							//Comments Output
							$comments = !isset($themeoptions["tb_longwave_activate_blog_comments"]) ? '<span class="sep">|</span> <span class="comments"><a href="' . get_comments_link() . '">' . $numOfComments . '</a></span>' : "";
							
							//The Title
							$the_title = get_the_title();
							if(!empty($postoptions["tb_longwave_page_head_alternative_title"])) $the_title = $postoptions["tb_longwave_page_head_alternative_title"];
									
							
		?>
							<div class="post">
					        	<?php echo $post_top; ?>
					            <div class="post-content">
						            <h2><?php echo $the_title; ?></h2>
						            <div class="meta"> <span class="date"><?php echo date_i18n(get_option('date_format'), strtotime($post->post_date_gmt)); ?></span> <?php echo $category;?> <?php echo $comments; ?> </div>
						            <?php the_content(); ?>
						        </div>
						        <div class="clear"></div>
						         <div class="clear"></div>
							      <?php if(has_tag()){?>
							      	<br>
							      	<p><?php _e("Tags","tb_longwave"); echo ": "; echo the_tags('', ', ', ''); ?></p>
							      <?php } ?>
						          <hr />
						          <h4 class="alignleft sharingwrapper"><?php _e("Share this article:","tb_longwave");?></h4>
						          <div class="alignright sharingwrapper"><?php echo do_shortcode("[sharebar facebook twitter google+ pinterest]"); ?></div>
						          <div class="clear"></div>

						    </div>
						<?php
		    		endwhile;  //have_posts 
		   endif;?>      
		   <?php if(!isset($pageoptions["tb_longwave_activate_related_posts"])) :
		   			if(!isset($pageoptions["tb_longwave_related_posts_attribute"])) $pageoptions["tb_longwave_related_posts_attribute"]="tags";
		   			
		   			$tags = wp_get_post_tags($post->ID);
		   			$columns = !empty($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar" ? 3 : 4;
		   			if($pageoptions["tb_longwave_related_posts_attribute"]!="category" && $tags){
		        		$tag_ids = array();
						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'showposts'=> $columns, 
							'ignore_sticky_posts'=>1,
						);
					}
					else {
						$cat = "";
						foreach((get_the_category()) as $category) { 
						    $cat .= ",".$category->cat_ID ;
						} 
						$cat = substr($cat, 1);
						$args=array(
							'cat' => $cat,
							'post__not_in' => array($post->ID),
							'showposts'=> $columns, 
							'ignore_sticky_posts'=>1,
						);
					}
					$temp = $wp_query; 
					$my_query = new wp_query($args);
					if( $my_query->have_posts() ) {						
					?>
					<!-- Begin Related Posts -->
					<div class="clear"></div>
					<div class="grid-wrapper">
						<div class="related">
							<?php
								while ($my_query->have_posts()) {
									$my_query->the_post();
									$postcustoms = getOptions($post->ID);
									$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),280,225,true);
									$the_title = get_the_title();
									$the_title = strlen($the_title)>25 ? trim(substr($the_title, 0, 25))."..." : $the_title;
									//Categories
									$category_links = "";
									foreach((get_the_category()) as $category) {
										$category_links .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
									}
									$category_links = substr($category_links, 2);
							?>
							
								<div class="post">
								  <?php if(!empty($blogimageurl)) { ?>
					                <div class="frame"> <a href="<?php the_permalink(); ?>"><img src="<?php echo $blogimageurl;?>" alt="" />
					                <div></div>
					                </a> </div>
					              <?php } ?>
					              <div class="post-content">
					                <h2><a href="<?php the_permalink(); ?>"><?php echo $the_title;?></a></h2>
					                <div class="meta"> <span class="date"><?php echo date_i18n(get_option('date_format'), strtotime($post->post_date_gmt)); ?></span> <span class="sep">|</span> <span class="comments"> <?php echo $category_links; ?> </span> <!-- span class="sep">|</span> <span class="comments"><?php comments_popup_link(__("0 Comments","tb_longwave"), __("1 Comment","tb_longwave"), '% '.__("Comments","tb_longwave")); ?></span--> </div>
					              </div>
					            </div>
					           
						        <?php
								}
									$wp_query = null; 
									$wp_query = $temp;
									wp_reset_query();
								?>
						</div>
					</div>
					<hr>
						<!-- End Related Posts -->
						<?php } //if have_posts()
		endif; //if related posts		
	?>
		<?php comments_template('', true); ?>
	
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