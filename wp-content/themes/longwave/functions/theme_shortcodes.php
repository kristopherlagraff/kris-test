<?php

/* ------------------------------------- */
/* SHORTCODES */
/* ------------------------------------- */


/* COLUMN 1/2 */

$template_uri_shortcodes = get_template_directory_uri();


//COLUMNS
	if (!function_exists('one_third_shortcode')) {
		function one_third_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="one-third' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('one-third', 'one_third_shortcode');
	}
	
	if (!function_exists('two_third_shortcode')) {
		function two_third_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="two-third' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('two-third', 'two_third_shortcode');
	}
	
	if (!function_exists('one_fourth_shortcode')) {
		function one_fourth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="one-fourth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('one-fourth', 'one_fourth_shortcode');
	}
	
	if (!function_exists('three_fourth_shortcode')) {
		function three_fourth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="three-fourth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('three-fourth', 'three_fourth_shortcode');
	}
	
	if (!function_exists('one_fifth_shortcode')) {
		function one_fifth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="one-fifth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('one-fifth', 'one_fifth_shortcode');
	}
	
	if (!function_exists('two_fifth_shortcode')) {
		function two_fifth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="two-fifth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('two-fifth', 'two_fifth_shortcode');
	}
	
	if (!function_exists('three_fifth_shortcode')) {
		function three_fifth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="three-fifth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('three-fifth', 'three_fifth_shortcode');
	}
	
	if (!function_exists('four_fifth_shortcode')) {
		function four_fifth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="four-fifth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('four-fifth', 'four_fifth_shortcode');
	}
	
	if (!function_exists('one_sixth_shortcode')) {
		function one_sixth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="one-sixth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('one-sixth', 'one_sixth_shortcode');
	}
	
	if (!function_exists('five_sixth_shortcode')) {
		function five_sixth_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="five-sixth' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('five-sixth', 'five_sixth_shortcode');
	}
	
	if (!function_exists('one_half_shortcode')) {
		function one_half_shortcode($atts, $content = null){
			$last = !empty($atts) ? ' ' . $atts[0] : '';
			$clear = !empty($atts) ? '<div class="clear"></div>' : ''; 
			$html = '<div class="one-half' . $last . '">' . do_shortcode($content) . '</div>'.$clear;
			return $html;
		}
		add_shortcode('one-half', 'one_half_shortcode');
	}
	
//INTRO
	if (!function_exists('introtext_shortcode')) {
		function introtext_shortcode($atts,$content = null){
			return '<div class="intro">' . do_shortcode($content) . '</div>';
		}
		add_shortcode('intro', 'introtext_shortcode');
	}	

//BUTTONS
	if (!function_exists('button_shortcode')) {
		function button_shortcode($atts, $content = null){
			$atts['target'] = empty($atts['target']) ? '_self' : $atts['target'];
			$atts['color'] = empty($atts['color']) ? '' : $atts['color'];
			$atts['link'] = empty($atts['link']) ? '#' : $atts['link'];
			$html = '<a class="button ' . $atts['color'] . '" href="' . $atts['link'] . '" target="' . $atts['target'] . '">' . $content . '</a>';
			return $html;
		}
		add_shortcode('button', 'button_shortcode');
	}

//DIVIDER
	if (!function_exists('divider_shortcode')) {
		function divider_shortcode(){
			return "<hr />";
		}
		add_shortcode('divider', 'divider_shortcode');
	}

//TABS
	if (!function_exists('tabs_shortcode')) {
		function tabs_shortcode( $atts, $content = null ) {
			$defaults = array();
			extract( shortcode_atts( $defaults, $atts ) );
			$atts["align"] = empty($atts["align"]) || $atts["align"]=="top"  ? "" : $atts["align"]."-";
			// Extract the tab titles for use in the tab widget.
			preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
	
			$tab_titles = array();
			if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
	
			$html = '<div class="tabs '.$atts["align"].'tab-container">';
	
			$uniq = uniqid("tabs_");
	
			if( count($tab_titles) ){
			   $html .= '<ul id="'.$uniq.'" class="etabs">';
	
				foreach( $tab_titles as $tab ){
					$html .= '<li class="tab"><a href="#tab-'. str_replace("%","",sanitize_title( $tab[0] )) .'"  data-toggle="tab">' . $tab[0] . '</a></li>';
				}
	
			    $html .= '</ul><div class="panel-container">';
			    $html .= do_shortcode( $content );
			    $html .= '</div></div><script>jQuery("#myTabContent div:first , #'.$uniq.' li:first").addClass("active in");</script>';
			} else {
				$html .= do_shortcode( $content );
			}
	
			return $html;
		}
		add_shortcode( 'tabs', 'tabs_shortcode' );
	}
	
	if (!function_exists('tab_shortcode')) {
		function tab_shortcode( $atts, $content = null ) {
			$defaults = array( 'title' => 'Tab' );
			extract( shortcode_atts( $defaults, $atts ) );
	
			return '<div id="tab-'. str_replace("%","",sanitize_title( $title )) .'" class="tab-pane fade">'. do_shortcode( $content ) .'</div>';
		}
		add_shortcode( 'tab', 'tab_shortcode' );
	}

//TOGGLES
	if (!function_exists('toggle_shortcode')) {
		function toggle_shortcode( $atts, $content = null ) {
			$html = '<!-- Begin Toggle -->
			    <div class="toggle">
			      <h4 class="title">' . $atts["title"] . '</h4>
			      <div class="togglebox">
			        <div>
			          ' . do_shortcode($content) . '
			        </div>
			      </div>
			    </div>
		    <!-- End Toggle --> ';
		    return $html;
	    }
		add_shortcode( 'toggle', 'toggle_shortcode' );
	}    
	
//DROPCAP
	if (!function_exists('dropcap_shortcode')) {
		function dropcap_shortcode( $atts, $content = null ) {
			return '<span class="dropcap">'. $content .'</span>';
		}
		add_shortcode( 'dropcap', 'dropcap_shortcode' );
	}
	
//SOCIALBAR
	if (!function_exists('socialbar_shortcode')) {
		function socialbar_shortcode( $atts, $content = null ) {
			$html = '<div><ul class="social team">';
			foreach($atts as $social => $link){
				$html .= '<li><a href="'.$link.'" target="_blank" style="opacity: 1; "><i class="icon-s-'.$social.'"></i></a></li>';	
			}
			$html .= "</ul></div>";
			return $html;
		}
		add_shortcode( 'socialbar', 'socialbar_shortcode' );
	}

//SHARE
	if (!function_exists('sharebar_shortcode')) {
		function sharebar_shortcode( $atts, $content = null ) {
			global $post;
			$uniq = rand(1234, 4321);
			$html = '<div class=""><ul class="share">';
			foreach($atts as $social){
				switch ($social){
					case "twitter":
						$html .= '<li><div data-url="'.get_permalink($post->ID).'" data-text="'.get_the_title($post->ID).' " id="tweet_'.$uniq.'" class="tweet">'.__("Tweet","tb_longwave").'</div></li>';
						break;
					case "pinterest":
						$html .= '<li><div class="pinterest" data-url="'.get_permalink($post->ID).'" data-text="'.get_the_title($post->ID).' ('.get_bloginfo('name').') '.get_permalink($post->ID).'" id="pinterest_'.$uniq.'">'.__("Pin It","tb_longwave").'</div></li>';
						break;
					case "google+":
						$html .= '<li><div class="google" data-url="'.get_permalink($post->ID).'" data-text="'.get_the_title($post->ID).' ('.get_bloginfo('name').') '.get_permalink($post->ID).'" id="google_'.$uniq.'">'.__("+1","tb_longwave").'</div></li>';
						break;
					default:
						$html .= '<li><div class="like" data-url="'.get_permalink($post->ID).'" data-text="'.get_the_title($post->ID).' ('.get_bloginfo('name').') '.get_permalink($post->ID).'" id="like_'.$uniq.'">'.__("Like","tb_longwave").'</div></li>';
						break;
				}
			}
			$html .= "</ul></div>";
			
			$blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			
			if(empty($blogimageurl)) {
				$themeoptions = getThemeOptions();
				$imageurl = $themeoptions["tb_longwave_header_logo"];
				echo "<script>jQuery('head').append('<meta property=\'og:image\' content=\'$imageurl\'/>');";
				echo "jQuery('head').append('<link rel=\'image_src\' href=\'$imageurl\'/>');</script>";
			}
			else{
				$imageurl = $blogimageurl;
			}
			
			$html .= "<script>
					jQuery(document).ready(function(){
						jQuery('#tweet_$uniq').sharrre({
						  share: {
						    twitter: true
						  },
						  template: '<a class=\"box tweet\" href=\"javascript:void();\">".__("Tweet","tb_longwave")."</a>',
						  enableHover: false,
						  enableTracking: true,
						  click: function(api, options){
						    api.simulateClick();
						    api.openPopup('twitter');
						  }
						});
						jQuery('#like_$uniq').sharrre({
				  share: {
				    facebook: true
				  },
				  template: '<a class=\"box like\" href=\"javascript:void();\">".__("Like","tb_longwave")."</a>',
				  enableHover: false,
				  enableTracking: true,
				  click: function(api, options){
				    api.simulateClick();
				    api.openPopup('facebook');
				  }
				});
				
				jQuery('#google_$uniq').sharrre({
				  share: {
				    googlePlus: true
				  },
				  template: '<a class=\"box google\" href=\"javascript:void();\">".__("+1","tb_longwave")."</a>',
				  enableHover: false,
				  enableTracking: true,
				  click: function(api, options){
				    api.simulateClick();
				    api.openPopup('googlePlus');
				  }
				});
				
				
				jQuery('#pinterest_$uniq').sharrre({
				  share: {
				    pinterest: true
				  },
				  template: '<a class=\"box pinterest\" href=\"javascript:void();\">".__("Pin It","tb_longwave")."</a>',
				  enableHover: false,
				  enableTracking: true,
				  buttons:{pinterest: {media: '$imageurl'}},
				  click: function(api, options){
				    api.simulateClick();
				    api.openPopup('pinterest');
				  }
				});

					});
					</script>";
			
			return $html;

		}
		add_shortcode( 'sharebar', 'sharebar_shortcode' );
	}

//HEADLINE
	if (!function_exists('headline_shortcode')) {
		function headline_shortcode( $atts, $content = null ) {
			return "<h2 class='colored'>$content</h2>";
		}
		add_shortcode( 'headline', 'headline_shortcode' );
	}
	
//HEADLINEwithSUBLINE
	if (!function_exists('subline_shortcode')) {
		function subline_shortcode( $atts, $content = null ) {
			return "<h5>$content <span>" . $atts['subline'] . "</span></h5>";
		}
		add_shortcode( 'headsubline', 'subline_shortcode' );
	}

//BOXES
	if (!function_exists('box_shortcode')) {
		function box_shortcode( $atts, $content = null ) {
			return '<div class="' . $atts["style"] . '-box">' . do_shortcode($content) . '</div>';
		}
		add_shortcode( 'box', 'box_shortcode' );
	}

//HIGHLIGHT
	if (!function_exists('highlight_shortcode')) {
		function highlight_shortcode( $atts, $content = null ) {
			$atts['style'] = empty($atts['style']) ? '1' : $atts['style'];
				return '<span class="lite' . $atts["style"] . '">' . do_shortcode($content) . '</span>';
		}
		add_shortcode( 'highlight', 'highlight_shortcode' );
	}

//CODEBOX
	if (!function_exists('codebox_shortcode')) {
		function codebox_shortcode( $atts, $content = null ) {
			return str_replace('<br />','','<pre><code>' . do_shortcode($content) . '</code></pre>');
		}
		add_shortcode( 'codebox', 'codebox_shortcode' );
	}
	
//SUP
	if (!function_exists('sup_shortcode')) {
		function sup_shortcode( $atts, $content = null ) {
			return '<sup>' . do_shortcode($content) . '</sup>';
		}
		add_shortcode( 'sup', 'sup_shortcode' );
	}

//SUB
	if (!function_exists('sub_shortcode')) {
		function sub_shortcode( $atts, $content = null ) {
			return '<sub>' . do_shortcode($content) . '</sub>';
		}
		add_shortcode( 'sub', 'sub_shortcode' );
	}
	
//CITE
	if (!function_exists('cite_shortcode')) {
		function cite_shortcode( $atts, $content = null ) {
			return '<cite>' . do_shortcode($content) . '</cite>';
		}
		add_shortcode( 'cite', 'cite_shortcode' );
	}

//ABBR
	if (!function_exists('abbr_shortcode')) {
		function abbr_shortcode( $atts, $content = null ) {
			return '<abbr title="' . $atts["title"] . '">' . do_shortcode($content) . '</abbr>';
		}
		add_shortcode( 'abbr', 'abbr_shortcode' );
	}

//LATEST POSTS
	if (!function_exists('latest_posts_shortcode')) {
		function latest_posts_shortcode($atts, $content){
			global $post; 
			$atts['number'] = isset($atts['number']) ? $atts['number'] : 2;
			$counter = 0;
			$excluded = "";
			if(!empty($atts['exclude'])){
				$excluded_array = explode(",", $atts["exclude"]);
				$counter = 0;
				foreach($excluded_array as $slug) {
					$slug = get_category_by_slug( $slug );
					if(!empty($slug))
						$excluded_array[$counter++] = "-".$slug->term_id;	
				}
				$excluded = implode(",", $excluded_array);
			}
			
			if($atts['number'] - 2 < 1) $latest = "latest";
		    else $latest = "";
			$html = '<div class="grid-wrapper latest_posts">
				        <div class="grid">';
			
			$posts = get_posts( array('numberposts' => $atts['number'],'category' => $excluded ));
			foreach($posts as $post) : setup_postdata($post);
				$category_links = "";
				foreach((get_the_category()) as $category) {
					$category_links .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
				}
				$category_links = substr($category_links, 2);
				$numOfComments = get_comments_number();
				$numOfComments = $numOfComments == 1 ? __("1 Comment","tb_longwave") : $numOfComments . __(" Comments","tb_longwave");
				
				//Like Button
				$tb_themeoptions = get_option("tb_longwave_theme_blog_options");

				//Category Output
				$category = !empty($atts["categories"]) ? '<span class="sep">|</span> <span class="comments">' . $category_links . '</span>' : '';
				
				//Comments Output
				$comments = !empty($atts["comments"]) ? '<span class="sep">|</span> <span class="comments"><a href="' . get_comments_link() . '">' . $numOfComments . '</a></span>' : ""; 

				$html .= '
							<div class="post">';
				$image = get_post_thumbnail_id();			
				if(!empty($image))
							$html .= '<div class="frame alignleft"> <a href="' . get_permalink() . '"><img src="' . aq_resize(wp_get_attachment_url( get_post_thumbnail_id() ),142,100,true) . '" alt="" />
									<div></div>
								</a> </div>';
				$html .=	'<div class="post-content">
									<h5><a href="' . get_permalink() . '">'.get_the_title().'</a></h5>
									<div class="meta"> <span class="date">' . date_i18n(get_option('date_format'), strtotime($post->post_date_gmt)) . '</span>'.$category.$comments.'</div>
									<p>' . excerpt(12) . '</p>
								</div>
							</div>
				';

		    endforeach;
					
			$html .= '</div></div>';
			return $html;
		}
		add_shortcode( 'latest_posts', 'latest_posts_shortcode' );
	}
	
//LATEST PROJECTS
	if (!function_exists('latest_projects_shortcode')) {	
		function latest_projects_shortcode($atts, $content){	
			global $post;
			$atts['number'] = isset($atts['number']) ? $atts['number'] : 4;
			$atts['cat_slugs'] = isset($atts['cat_slugs']) ? $atts['cat_slugs'] : '';
			$html = '<div class="grid-wrapper">
				        <ul class="items col4 latest">';

			$args = array( 'posts_per_page' => $atts['number'], 
				   'offset'=> 0,
				   'post_type' => 'portfolio',
				   'category_portfolio' => $atts['cat_slugs']);
			$all_posts = new WP_Query($args);
		
			while($all_posts->have_posts()) : $all_posts->the_post();
		
				$html .= '<li class="frame item artwork"><a href="' . get_permalink() . '"><img src="' . aq_resize(wp_get_attachment_url( get_post_thumbnail_id() ),257,200,true) . '" alt="" /><div></div></a> </li>';
			endwhile;
		
			$html .= '  </ul></div>';
			return $html;
			}
		add_shortcode( 'latest_projects', 'latest_projects_shortcode' );
	}
	
//Portfolio
	if (!function_exists('portfolio_shortcode')) {	
		function portfolio_shortcode($atts, $content){	
			global $post;
			$atts['number'] = isset($atts['number']) ? $atts['number'] : 4; 
			$atts['title'] = isset($atts['title']) ? $atts['title'] : "";
			$atts['cat_slugs'] = isset($atts['cat_slugs']) ? $atts['cat_slugs'] : '';
			$select_slugs = $atts['cat_slugs'];
			$post_id = $post->ID;
			
			$html = '<div id="portfolio">';
			
			if(!empty($atts["title"])) $html .='<h2 class="colored alignleft">'.$atts['title'].'</h2>';
			
			$html .='
				<ul class="filter alignright">';
			
			$atts['cat_slugs'] = explode(",", $atts['cat_slugs']);

			if (empty($select_slugs) || in_array("all", $atts['cat_slugs']) ){
				$html .= '<li><a class="active" href="#" data-filter="*">'.__("All","tb_longwave").'</a></li>';
				$tax_terms = get_terms("category_portfolio");
				foreach($tax_terms as $tax_term){	
					$html .= '<li><a href="#" data-filter=".'.$tax_term->slug.'">'.$tax_term->name.'</a></li>';
				}
			} elseif(sizeof($atts['cat_slugs'])>1){
					$html .= '<li><a class="active" href="#" data-filter="*">'.__("All","tb_longwave").'</a></li>';
					foreach($atts['cat_slugs'] as $category){
						$term = get_term_by('slug',$category,'category_portfolio');
						$html .= '<li><a href="#" data-filter=".'.$category.'">'.$term->name.'</a></li>';
					}
				} 
			
        	$html .= '</ul><ul class="items col4">';

        	$select_slugs = in_array("all", $atts['cat_slugs']) ? '' : $select_slugs ;

			$args = array( 'posts_per_page' => $atts['number'], 
				   'offset'=> 0,
				   'post_type' => 'portfolio',
				   'category_portfolio' => $select_slugs
			);
			$all_posts = new WP_Query($args);
		
			while($all_posts->have_posts()) : $all_posts->the_post();
				unset($category_names);
				unset($category_slugs);
				unset($tag_names);
				
				$tag_names = array();
				$category_slugs = array();
				$category_names = array();
				
				foreach(wp_get_post_terms($post->ID, 'category_portfolio') as $category) {
					$category_slugs[] = $category->slug;
					$category_names[] = $category->name;
				}
				
				$tags = wp_get_post_tags($post->ID);
				$count = 0;
				foreach($tags as $tag){
					if($count < 4) $tag_names[] = $tag->name;
					$count++;
				}
				
				//Permalink addition for Portfolio Backlink
				$permalink = get_permalink();
				if(empty($atts["type"]) || $atts["type"]=="slider" ){
					$link = "#";
					$permalink = strpos($permalink,"?") ? $permalink."&amp;fp=".$post_id : $permalink."?fp=".$post_id;
				} else {
					$permalink = strpos($permalink,"?") ? $permalink."&amp;tp=".$post_id : $permalink."?tp=".$post_id;
					$link = $permalink;
				}
				$subline = isset($atts["subline"]) && $atts["subline"]=="categories" ? implode(", ", $category_names) : implode(", ", $tag_names);
				
				$html .= ' <li class="item '.implode(" ", $category_slugs).'"> <a href="'.$link.'" data-contenturl="' . $permalink . '" data-callback="callPortfolioScripts();" data-contentcontainer=".pcw"><img src="' . aq_resize(wp_get_attachment_url( get_post_thumbnail_id() ),257,200,true) . '" alt="" />
            <div>
              <h5>'.get_the_title().'<span>'.$subline.'</span></h5>
            </div>
            </a> </li>';
			endwhile;
		
			$html .= '  </ul></div>';
			if(empty($atts["type"]) || $atts["type"]=="slider" )
			 	$html .= '<script>
			 			jQuery(document).ready(function() {
			 				var contentslideron=true;
			 				jQuery("body").addClass("useportfolioslider");
			 		});
			 	</script>';
			return $html;
			}
		add_shortcode( 'portfolio', 'portfolio_shortcode' );
	}	
	
//PORTFOLIO INFO
	if (!function_exists('portfolio_info_set_shortcode')) {	
		function portfolio_info_set_shortcode($atts, $content){	
			$html = '<ul class="item-info">'.do_shortcode($content).'</ul>';
			return $html;
		}
		add_shortcode( 'portfolio_info_set', 'portfolio_info_set_shortcode' );
	}
	if (!function_exists('portfolio_info_shortcode')) {	
		function portfolio_info_shortcode($atts, $content){	
			$html = '<li><strong>'.$atts['title'].'</strong> '.do_shortcode($content).'</li>';
			return $html;
		}
		add_shortcode( 'portfolio_info', 'portfolio_info_shortcode' );
	}

//TWITTER FEED
	if (!function_exists('twitter_shortcode')) {
		function twitter_shortcode( $atts) {
			$uniq = 'twitter_'.rand(1234, 4321);
			$html = '<div id="'.$uniq.'" class="twitter_shortcode"></div>'; 
			$html .= '<script>jQuery(document).ready(function(){
					getTwitters("'.$uniq.'", {
					        id: "'.$atts['user'].'", 
					        count: '.$atts['number'].', 
					        enableLinks: true, 
					        ignoreReplies: false,
					        template: "<span class=\"twitterPrefix\"><span class=\"twitterStatus\">%text%</span><br /><em class=\"twitterTime\"><a href=\"http://twitter.com/%user_screen_name%/statuses/%id%\">%time%</a></em>",
					        newwindow: true
					});});</script>';
			return $html;
		}
		add_shortcode( 'twitter', 'twitter_shortcode' );
	}
	
//FACEBOOK PAGE
	if (!function_exists('facebook_page_shortcode')) {
		function facebook_page_shortcode( $atts) {
			$html = ' <div class="facebook">
						              <script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=188724541225101";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, "script", "facebook-jssdk"));</script>
						              <div class="fb-like-box" data-href="'.$atts['url'].'" data-width="430" data-show-faces="true" data-border-color="#dadada" data-stream="false" data-header="false"></div>
						            </div>
						';
			return $html;
		}
		add_shortcode( 'facebook_page', 'facebook_page_shortcode' );
	}

//DRIBBBLE STREAM
	if (!function_exists('dribbble_shortcode')) {
		function dribbble_shortcode( $atts) {
			$html = '<ul class="dribbble feed"></ul>';
			$html .= '<script>jQuery(document).ready(function () {		
						jQuery.jribbble.getShotsByPlayerId("'.$atts["user"].'", function (playerShots) {
							var html = [];
							
							jQuery.each(playerShots.shots, function (i, shot) {
								html.push(\'<li class="frame"><a href="\' + shot.url + \'" target="_blank">\');
								html.push(\'<span class="more"></span><img class="round" src="\' + shot.image_teaser_url + \'" \');
								html.push(\'alt="\' + shot.title + \'"></a></li>\');
							});
							
							jQuery(".dribbble.feed").html(html.join(""));
							
							jQuery(".feed .frame").mouseenter(function(e) {
					
					            jQuery(this).children("a").children("span").fadeIn(200);
					        }).mouseleave(function(e) {
					
					            jQuery(this).children("a").children("span").fadeOut(200);
					        });
					
						}, {page: 1, per_page: '.$atts["number"].'});
						
						
					});</script>';
			return $html;
		}
		add_shortcode( 'dribbble', 'dribbble_shortcode' );
	}

//FLICKR
	if (!function_exists('flickr_shortcode')) {
		function flickr_shortcode( $atts) {
			$html = ' <ul class="flickr feed"></ul>';
			$html .= '	<script>jQuery(document).ready(function($){
							jQuery(".flickr.feed").dcFlickr({
								limit: '.$atts['number'].', 
						        q: { 
						            id: "'.$atts['user_id'].'",
									lang: "en-us",
									format: "json",
									jsoncallback: "?"
						        },
								onLoad: function(){
									jQuery(".feed .frame a").prepend(\'<span class="more"></span>\');
									jQuery(".feed .frame").mouseenter(function(e) {
						
						            jQuery(this).children("a").children("span").fadeIn(300);
						        }).mouseleave(function(e) {
						
						            jQuery(this).children("a").children("span").fadeOut(200);
						        });
								}
							});
						});	</script>';

			return $html;
		}
		add_shortcode( 'flickr', 'flickr_shortcode' );
	}

//TESTIMONIALS
	if (!function_exists('testimonials_shortcode')) {
		function testimonials_shortcode( $atts, $content) {
			$html = ' <ul class="testimonials">'.do_shortcode($content).'</ul>';
			return $html;
		}
		add_shortcode( 'testimonials', 'testimonials_shortcode' );
	}
	
	$oddeven = "even";
	
	if (!function_exists('quote_shortcode')) {
		function quote_shortcode( $atts, $content) {
			global $oddeven;
			
			$oddeven = $oddeven=="even" ? "odd" : "even";
			
			$html = ' <li class="'.$oddeven.'">
				          <div class="quote">
				            <p>'.$content.'</p>
				          </div>
				          <span class="author">'.$atts["author"].'</span> </li>';
			return $html;
		}
		add_shortcode( 'quote', 'quote_shortcode' );
	}

//GOOGLE MAP	
	if (!function_exists('contact_info_build')) {
		function contact_info_build( $atts ) {
		$html = '<div class="map"><iframe width="'.$atts["width"].'" height="'.$atts["height"].'" style="border:0;overflow:hidden;margin:0;" scrolling="no" src="'.$atts["link"].'"></iframe></div>';
		if(!empty($atts["location"])) $info[] = '<i class="icon-location contact"></i>'.$atts["location"];
		if(!empty($atts["phone"])) $info[] = '<i class="icon-phone contact"></i>'.$atts["phone"];
		if(!empty($atts["mail"])) $info[] = '<i class="icon-mail contact"></i><a href="mailto:'.$atts["mail"].'">'.$atts["mail"]."</a>";
		$html .= implode("<br>", $info);
		return $html;
		}
		add_shortcode('contact_info', 'contact_info_build');
	}
	
//CLIENT LIST
	if (!function_exists('client_list_shortcode')) {
		function client_list_shortcode( $atts, $content) {
			$html = '<div class="grid-wrapper"><ul class="client-list">'.do_shortcode($content).'</ul></div>';
			return $html;
		}
		add_shortcode( 'client_list', 'client_list_shortcode' );
	}
	
	if (!function_exists('client_shortcode')) {
		function client_shortcode( $atts) {
			$atts['link'] = isset($atts['link']) ? $atts['link'] : '#';
			$atts['target'] = isset($atts['target']) ? $atts['target'] : '_self';
			$atts['image'] = isset($atts['image']) ? $atts['image'] : '';
			$html = ' <li class="frame"><a href="'.$atts["link"].'" target="'.$atts["target"].'"><img src="'.$atts["image"].'" alt="" /></a></li>';
			return $html;
		}
		add_shortcode( 'client', 'client_shortcode' );
	}

// SPACER
	if (!function_exists('spacer_build')) {
		function spacer_build( $atts ) {
		   return '<div style="display:block;clear:both;height:'.$atts["height"].'"></div>';
		}
		add_shortcode('spacer', 'spacer_build');
	}	

//CHECKLIST
	if (!function_exists('checklist_build')) {
		function checklist_build( $atts , $content = "" ) {
		   return '<div class="unordered">'.$content.'</div>';
		}
		add_shortcode('checklist', 'checklist_build');
	}

//PRICE TABLE
	if (!function_exists('pricetable_build')) {
		function pricetable_build( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'columns' => 3
			), $atts));
			
			$columns = $columns == 3 ? "three" : "four" ;
			
			return '<div class="pricing '.$columns.'">'.do_shortcode($content).'</div>';
		}
		add_shortcode('pricetable', 'pricetable_build');
		
		function pricetable_column_build( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'color' => 'blue', 
				'title' => '',
				'price' => '',
				'price_prefix' => '',
				'price_subfix' => '',
				'price_subline' => '',
				'button_url' => '',
				'button_text' => '',
				'button_color' => ''
			), $atts));
			global $pricetable_column_count;
			global $pricetable_columns;
		
			$pricetable_column_count++;
			
			switch($color){
				case 'green':
					$color = "1";
					break;
				case 'blue':
					$color = "2";
					break;
				case 'orange':
					$color = "3";
					break;
				case 'brown':
					$color = "4";
					break;
				case 'yellow':
					$color = "5";
					break;
				case 'purple':
					$color = "6";
					break;
				case 'green':
					$color = "7";
					break;
				case 'red':
					$color = "8";
					break;
				case 'aqua':
					$color = "9";
					break;
				case 'lime':
					$color = "10";
					break;
			}
		
			// Column Head
			$return_list = '<div class="plan p'.$color.'">
		    <h3>'.$title.'</h3>
		    <h4><span class="amount"><span>'.$price_prefix.'</span>'.$price.'<span>'.$price_subfix.'</span></span>';
			// Subline
			if($price_subline!="")
			$return_list .='<span class="interval">'.$price_subline.'</span>';
			//Content
			$return_list .= '</h4><div class="features">'.do_shortcode($content).'</div>';
			// Button
			if($button_text!=""){
				$return_list .= '<div class="select">
						          <div> <a href="'.$button_url.'" class="button '.$button_color.'"><span>'.$button_text.'</span></a> </div>
						        </div>';
			}
			// Footer
			$return_list .='</div>';
			return $return_list;
		}
		add_shortcode('pricetable_column', 'pricetable_column_build');
	}

//ICONS
	if (!function_exists('tbicon_build')) {
		function tbicon_build( $atts ) {
			$atts["class"] = empty($atts["class"]) ? "" : $atts["class"];
			$size = !empty($atts["size"]) && !empty($atts["class"]) ? 'font-size:'.$atts["size"].';' : "";
			
		   return '<i class="'.$atts["icon"].' '.$atts["class"].'" style="'.$size.'" ></i>';
		}
		add_shortcode('tbicon', 'tbicon_build');
	}

//DARK FRAME
	if (!function_exists('darkframe_build')) {
		function darkframe_build( $atts, $content = "" ) {
			return ' </div>
					    <!-- End Inner --> 
					  </div>
					  <!-- End White Wrapper --> 
					  
					  <!-- Begin Gray Wrapper -->
					  <div class="dark-wrapper"> 
					    <!-- Begin Inner -->
					    <div class="inner">
					'.do_shortcode($content).'</div>
					</div> <!-- Begin White Wrapper -->
  <div class="light-wrapper"> 
    <!-- Begin Inner -->
    <div class="inner"> ';
		}
		add_shortcode('darkframe', 'darkframe_build');
	}

//GOOGLE MAP
	if (!function_exists('gmap_build')) {
		function gmap_build( $atts ) {
			$atts["height"] = empty($atts["height"]) ? "450" : $atts["height"];
			$atts["width"] = empty($atts["width"]) ? "100%" : $atts["width"];
			$atts["link"] = empty($atts["link"]) ? "https://maps.google.com/maps?source=embed&amp;hl=en-US&amp;ie=UTF8&amp;ll=41.525287,-87.450485&amp;spn=0.099472,0.263844&amp;t=m&amp;z=13&amp;output=embed" : $atts["link"];
			
			
		   return '<div class="map"><iframe width="'.$atts["width"].'" height="'.$atts["height"].'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$atts["link"].'&amp;output=embed"></iframe></div>';
		}
		add_shortcode('gmap', 'gmap_build');
	}
	
//PROGRESS
	if (!function_exists('progress_build')) {
		function progress_build( $atts , $content = "") {
			return '<ul class="progress-bar">'.do_shortcode($content).'</ul>';
		}
		add_shortcode('progress', 'progress_build');
	}
	 
//PROGRESS BAR
	if (!function_exists('progbar_build')) {
		function progbar_build( $atts , $content = "") {
			$atts["width"] = empty($atts["width"]) ? "50%" : $atts["width"];
			return '<li><p>'.$content.'</p><div class="meter"><span style="width: '.$atts["width"].'"></span></div></li>';
		}
		add_shortcode('progbar', 'progbar_build');
	}
?>