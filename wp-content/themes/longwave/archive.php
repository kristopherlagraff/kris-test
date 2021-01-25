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

	if(is_category()){
		$cur_cat_id = get_cat_id( single_cat_title("",false) );
		$current_cat = get_category($cur_cat_id);
		$htitle = __("Category","tb_longwave")." ".$current_cat->name;
	}
	elseif(is_archive()){
		wp_link_pages();
		$htitle = __('Archive', 'tb_longwave'). " " . get_the_date('F Y');
	}
	if(is_tag()) $htitle =  __('Tag Archive', 'tb_longwave');


	//Sidebar
		if(isset( $themeoptions["tb_longwave_blog_archive_sidebar"]))
			$pageoptions["tb_longwave_sidebar"] = $themeoptions["tb_longwave_blog_archive_sidebar"];

	//Default Values
		$align = "";
		//Orientation
		if(empty($pageoptions["tb_longwave_blog_display_type"])) $pageoptions["tb_longwave_blog_display_type"]="left";
		
		//Posts per Page
		//Default Setting WP
		$posts_per_page = get_option('posts_per_page');
		//Optional Setting Page Options
		if(!empty($pageoptions["tb_longwave_posts_per_page"]))
			$posts_per_page = trim($pageoptions["tb_longwave_posts_per_page"]);
		
		if($pageoptions["tb_longwave_blog_display_type"]=="left"){
			$pageoptions["tb_longwave_page_blog_image_width"] = !empty($pageoptions["tb_longwave_page_blog_image_width"]) ? $pageoptions["tb_longwave_page_blog_image_width"] : 250;
			$align = "alignleft";
			$full = "";
		}
		elseif (isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"){
			$pageoptions["tb_longwave_page_blog_image_width"] = 730;
			$full = "full";
		}
		else {
			$pageoptions["tb_longwave_page_blog_image_width"] = 1040;
			$full = "full";
		}
		
		//Excerpt Length
		$pageoptions["tb_longwave_page_blog_excerpt"] = empty($pageoptions["tb_longwave_page_blog_excerpt"]) ? 25 : $pageoptions["tb_longwave_page_blog_excerpt"];

	get_header();
?>

  <?php //if($headline){
  			 if(empty($pageoptions["tb_longwave_page_intro"])){ ?>	
					<!-- Begin Gray Wrapper Title -->
					<div class="dark-wrapper page-title"> 
						<!-- Begin Inne -->
						<div class="inner">
							<h1 class="title alignleft"><?php echo $htitle; ?>
							<?php if(!is_front_page()) 
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								else
									$paged = (get_query_var('page')) ? get_query_var('page') : 1;
								if($paged > 1) echo __(" - Page ","tb_longwave").$paged; 
							?>
							</h1>
							<?php if(!empty($paged)) head_pagination_arch($paged,$posts_per_page); ?>
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
  <?php// } ?>
  
  <!-- Begin White Wrapper -->
  <div class="light-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner blog_content <?php echo $full; ?>">	    
		<?php if(isset($pageoptions["tb_longwave_sidebar"]) && $pageoptions["tb_longwave_sidebar"]!="nosidebar"){ ?>
			 <article>
			 <!-- Begin Content -->
			 <div class="content <?php echo $full; ?>">
		<?php } //Sidebar ?>
		
		<?php if(have_posts()) : 
				//Postcounter is for Linebreaks + Display
					$postcounter = 1;
					while(have_posts()) : the_post();	
							//Single Post Options
			    			$postoptions = getOptions($post->ID);
		
			    			//Post Top
		        			$post_top="";
		        			
		        			$featuredImage = get_post_thumbnail_id($post->ID);
		        			
		        			
		        			if(!empty($featuredImage) && $pageoptions["tb_longwave_blog_display_type"]=="left"){
				        			if(!empty($pageoptions["tb_longwave_page_blog_image_width"])) $post_top_width = $pageoptions["tb_longwave_page_blog_image_width"];
									$blogimageurl = !empty($pageoptions["tb_longwave_page_blog_image_height"]) ? aq_resize(wp_get_attachment_url( $featuredImage ),$pageoptions["tb_longwave_page_blog_image_width"],$pageoptions["tb_longwave_page_blog_image_height"],true) : aq_resize(wp_get_attachment_url($featuredImage ),$pageoptions["tb_longwave_page_blog_image_width"]);
									$post_top = '<div class="frame '.$align.'"> <a href="'.get_permalink().'"><img src="'.$blogimageurl.'" alt="'.get_the_title().'" /><div></div></a> </div>';
							}
							else { 
		        				if(isset($postoptions["tb_longwave_post_type"]))
									switch ($postoptions["tb_longwave_post_type"]) {
										case 'image':
													$featuredImage = get_post_thumbnail_id($post->ID);
								        			if(!empty($featuredImage)){
										        		$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),$pageoptions["tb_longwave_page_blog_image_width"]);
														$post_top = '<div class="frame '.$align.'"> <a href="'.get_permalink().'"><img src="'.$blogimageurl.'" alt="'.get_the_title().'" /><div></div></a> </div>';
													}
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
													
													$post_top = '<div class="frame '.$align.'">'.do_shortcode('[rev_slider '.$postoptions["tb_longwave_slider"].']')."</div>";
													break;
										default:
													$post_top = "";
													break;	
									} //switch
							} //left or top view
							
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
							
		?>
							<div class="post">
					        	<?php echo $post_top;  ?>
					            <div class="post-content">
						            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
						            <div class="meta"> <span class="date"><?php echo date_i18n(get_option('date_format'), strtotime($post->post_date_gmt)); ?></span> <?php echo $category;?> <?php echo $comments; ?> </div>
						            <p><?php echo excerpt($pageoptions["tb_longwave_page_blog_excerpt"]); ?></p>
						            <a href="<?php the_permalink(); ?>" class="more"><?php _e("Continue reading","tb_longwave");?> →</a> 
						        </div>
						        <div class="clear"></div>
						    </div>
						<?php $postcounter++;	
		    		endwhile;  //have_posts 
		   endif;?>   
		
		<!-- Begin Page Navi -->
		<div style="clear:both"></div>
		<?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>    
	    <!-- End Page Navi -->   
		   
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