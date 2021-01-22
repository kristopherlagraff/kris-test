<?php
/*-----------------------------------------------------------------------------------

	Plugin Name: Latest Posts Widget Plugin
	Plugin URI: http://www.thunderbuddies.com
	Description: A widget that displays Latest Posts in a widget
	Version: 1.0
	Author: thunderbuddies
	Author URI: http://www.thunderbuddies.com

-----------------------------------------------------------------------------------*/	
	add_action( 'widgets_init', create_function('', 'return register_widget("tb_longwavePosts");') );
	class tb_longwavePosts extends WP_Widget {
		function tb_longwavePosts() {
			$widget_ops = array('classname' => 'tb_longwavePosts', 'description' => 'A popular/latest posts widget.');
	    	$this->WP_Widget('tb_longwavePosts', 'Longwave Popular/Latest Posts', $widget_ops);
		}
		
		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance ); ?>
	
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input type=text class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
	
	        <p><label for="<?php echo $this->get_field_id( 'postcount' ); ?>">Post Count:</label><br /><input type=text class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php if( isset($instance['postcount']) ) echo $instance['postcount']; ?>" /></p>
	        
	        <?php if( isset($instance['featuredimage']) ) $checked="checked";
	        	  else $checked = "";
	        ?>
	        <p><label for="<?php echo $this->get_field_id( 'poplatest' ); ?>">Latest or Popular:</label><br />
	        <select class="widefat" id="<?php echo $this->get_field_id( 'poplatest' ); ?>" name="<?php echo $this->get_field_name( 'poplatest' ); ?>">
	        	<option value="1" <?php 
	        		if( isset($instance['poplatest']) && $instance['poplatest']== 1 ) {
	        			echo "selected"; 
	        		}
	        	?>>Latest Posts</option>
	        	<option value="2" <?php 
	        		if( isset($instance['poplatest']) && $instance['poplatest']== 2 ) {
	        			echo "selected"; 
	        		}
	        	?>>Popular Posts</option>
	        </select>
	        </p>	        
	        <p><p><label for="<?php echo $this->get_field_id( 'category' ); ?>">Show Posts from that Category:</label><br />
	        <select  class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>"> 
				 <option value=""><?php echo 'All Categories'; ?></option> 
				 <?php 
				  $categories=  get_categories(''); 
				  foreach ($categories as $category) {
				  	if(isset($instance['category']) && $instance['category']==$category->cat_ID) $selected = "selected";
				  	else $selected = "";
				  	$option = '<option value="'.$category->cat_ID.'" '.$selected.'>';
					$option .= $category->cat_name;
					$option .= ' ('.$category->category_count.')';
					$option .= '</option>';
					echo $option;
				  }
				 ?>
				</select></p>	
	<?php }
	
		function widget( $args, $instance ) {
			extract( $args );
	
			$title = apply_filters('widget_title', $instance['title'] );
			if ( isset($instance['id']) ) $id = $instance['id'];
			if ( isset($instance['postcount']) ) $pcount = $instance['postcount']; else $pcount = 2;
			if ( isset($instance['poplatest']) ) $platest = $instance['poplatest']; else $platest = 1;
			if ( isset($instance['category']) ) $cat_id = $instance['category']; else $cat_id = "";
				
			echo $before_widget;
			if ( $title ) echo $before_title . $title . $after_title;
			
			if($platest==1){
				$popargs = array( 'numberposts' => $pcount, 'orderby' => 'post_date', 'category' => $cat_id );
			}else{
				$popargs = array( 'numberposts' => $pcount, 'orderby' => 'comment_count', 'category' => $cat_id );
			}
			$unique = uniqid();
			$poplist = get_posts( $popargs );
			echo '<ul class="post-list">';
			foreach ($poplist as $poppost) :  setup_postdata($poppost);
				$posttitle = $poppost->post_title;
                
				echo '<li>';	
				$image = get_post_thumbnail_id($poppost->ID);
				
				if(!empty($image)){
					//$posttitle = trim(substr($posttitle, 0,19));
					//if(strlen($poppost->post_title)>19) $posttitle=$posttitle."...";
					echo '<div class="frame"><a href="'.get_permalink($poppost->ID).'"><img src="' . aq_resize(wp_get_attachment_url( $image ),70,70,true,true,true) . '" alt="" /><div></div></a></div>';
				}
				echo'		<div class="meta">
				            	<h6><a href="'.get_permalink($poppost->ID).'" title="'.$poppost->post_title.'">'.$posttitle.'</a></h6>
				            	<em>'.date_i18n(get_option('date_format'), strtotime($poppost->post_date_gmt)).'</em>
				            </div> 
						</li>';
				
	      endforeach;
	      	echo '</ul>';
	
			echo $after_widget;
		}
	
	
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['postcount'] = $new_instance['postcount'];
			$instance['poplatest'] = $new_instance['poplatest'];
			$instance['category'] = $new_instance['category'];
			return $instance;
		}
	}

/*-----------------------------------------------------------------------------------

	Plugin Name: Latest Projects Widget Plugin
	Plugin URI: http://www.thunderbuddies.com
	Description: A widget that displays Latest Projects in a widget
	Version: 1.0
	Author: thunderbuddies
	Author URI: http://www.thunderbuddies.com

-----------------------------------------------------------------------------------*/	
	add_action( 'widgets_init', create_function('', 'return register_widget("tb_longwaveProjects");') );
	class tb_longwaveProjects extends WP_Widget {
		function tb_longwaveProjects() {
			$widget_ops = array('classname' => 'tb_longwaveProjects', 'description' => 'A latest Projects widget.');
	    	$this->WP_Widget('tb_longwaveProjects', 'Longwave Latest Projects', $widget_ops);
		}
		
		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance ); ?>
	
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input type=text class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
	
	        <p><label for="<?php echo $this->get_field_id( 'postcount' ); ?>">Post Count:</label><br /><input type=text class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php if( isset($instance['postcount']) ) echo $instance['postcount']; ?>" /></p>
	        
	        <?php if( isset($instance['featuredimage']) ) $checked="checked";
	        	  else $checked = "";
	        ?>
	        <?php
                
	
	 }
	
		function widget( $args, $instance ) {
			extract( $args );
	
			$title = apply_filters('widget_title', $instance['title'] );
			if ( isset($instance['id']) ) $id = $instance['id'];
			if ( isset($instance['postcount']) ) $pcount = $instance['postcount']; else $pcount = 2;
			if ( isset($instance['portfolio_category']) ) $cat_id = $instance['portfolio_category']; else $cat_id = "";
				
			echo $before_widget;
			if ( $title ) echo $before_title . $title . $after_title;
			$projectcount = $instance['postcount'];
			$portfolio_category = $instance['portfolio_category'];
			$pcat = "category_".$portfolio_category;
			$popargs=array(
				'post_type' => $portfolio_category,
				'posts_per_page' => $projectcount
			);
			$unique = uniqid();
			$poplist = get_posts( $popargs );
			echo '<ul class="post-list">';
			foreach ($poplist as $poppost) :  setup_postdata($poppost);
				$posttitle = $poppost->post_title;
                
				echo '<li>';	
				$image = get_post_thumbnail_id($poppost->ID);
				
				if(!empty($image)){
					//$posttitle = trim(substr($posttitle, 0,19));
					//if(strlen($poppost->post_title)>19) $posttitle=$posttitle."...";
					echo '<div class="frame"><a href="'.get_permalink($poppost->ID).'"><img src="' . aq_resize(wp_get_attachment_url( $image ),70,70,true) . '" alt="" /><div></div></a></div>';
				}
				echo'		<div class="meta portfolio">
				            	<h6><a href="'.get_permalink($poppost->ID).'" title="'.$poppost->post_title.'">'.$posttitle.'</a></h6>
				            </div> 
						</li>';
				
	      endforeach;
	      	echo '</ul>';
	
			echo $after_widget;
		}
	
	
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['postcount'] = $new_instance['postcount'];
			$instance['portfolio_category'] = $new_instance['portfolio_category'];
			return $instance;
		}
	}


/*-----------------------------------------------------------------------------------

	Plugin Name: Twitter Widget Plugin
	Plugin URI: http://www.thunderbuddies.com
	Description: A widget that displays a twitter feed
	Version: 1.0
	Author: thunderbuddies
	Author URI: http://www.thunderbuddies.com

-----------------------------------------------------------------------------------*/
add_action('widgets_init', 'tweets_load_widgets');

function tweets_load_widgets()
{
	register_widget('Tweets_Widget');
}

class Tweets_Widget extends WP_Widget {
	
	function Tweets_Widget()
	{
		$widget_ops = array('classname' => 'tweets', 'description' => '');

		$control_ops = array('id_base' => 'tweets-widget');

		$this->WP_Widget('tweets-widget', 'Longwave Twitter 1.1', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$consumer_key = $instance['consumer_key'];
		$consumer_secret = $instance['consumer_secret'];
		$access_token = $instance['access_token'];
		$access_token_secret = $instance['access_token_secret'];
		$twitter_id = $instance['twitter_id'];
		$count = $instance['count'];

		echo $before_widget;
		
		if($title) {
			echo $before_title.$title.$after_title;
		}
		
		if($twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count) { 
		$transName = 'list_tweets_'.$args['widget_id'];
		$cacheTime = 10;
		delete_transient($transName);
		if(false === ($twitterData = get_transient($transName))) {
		     // require the twitter auth class
		     @require_once 'twitteroauth/twitteroauth.php';
		     $twitterConnection = new TwitterOAuth(
							$consumer_key,	// Consumer Key
							$consumer_secret,   	// Consumer secret
							$access_token,       // Access token
							$access_token_secret    	// Access token secret
							);
		    $twitterData = $twitterConnection->get(
							  'statuses/user_timeline',
							  array(
							    'screen_name'     => $twitter_id,
							    'count'           => $count,
							    'exclude_replies' => false
							  )
							);
		     if($twitterConnection->http_code != 200)
		     {
		          $twitterData = get_transient($transName);
		     }

		     // Save our new transient.
		     set_transient($transName, $twitterData, 60 * $cacheTime);
		};
		$twitter = get_transient($transName);
		if($twitter && is_array($twitter)) {
			//var_dump($twitter);
		?>
		
		
				<div id="twitter-footer"><div class="twitter" id="twitter_<?php echo $args['widget_id']; ?>"><ul>
							<?php foreach($twitter as $tweet): ?>
								<?php
								$latestTweet = $tweet->text;
								$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet);
								$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet);
								?>
								<?php
								$twitterTime = strtotime($tweet->created_at);
								$timeAgo = $this->ago($twitterTime);
								?>
								<li><span class="twitterPrefix"><span class="twitterStatus"><?php echo $latestTweet; ?></span><em class="twitterTime"><a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>"><?php echo $timeAgo; ?></a></em></span></li>
							<?php endforeach; ?>
				</ul></div></div>
		<?php }}
		
		echo $after_widget;
	}
	
	function ago($time)
	{
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

	       $difference     = $now - $time;
	       $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	       $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
	       $periods[$j].= "s";
	   }

	   return "$difference $periods[$j] ago ";
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['consumer_key'] = $new_instance['consumer_key'];
		$instance['consumer_secret'] = $new_instance['consumer_secret'];
		$instance['access_token'] = $new_instance['access_token'];
		$instance['access_token_secret'] = $new_instance['access_token_secret'];
		$instance['twitter_id'] = $new_instance['twitter_id'];
		$instance['count'] = $new_instance['count'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Tweets', 'twitter_id' => '', 'count' => 3);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p><a href="http://dev.twitter.com/apps">Find or Create your Twitter App</a></p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('consumer_key'); ?>">Consumer Key:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" value="<?php echo $instance['consumer_key']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('consumer_secret'); ?>">Consumer Secret:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" value="<?php echo $instance['consumer_secret']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('access_token'); ?>">Access Token:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" value="<?php echo $instance['access_token']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('access_token_secret'); ?>">Access Token Secret:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" value="<?php echo $instance['access_token_secret']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitter_id'); ?>">Twitter ID:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" value="<?php echo $instance['twitter_id']; ?>" />
		</p>

			<label for="<?php echo $this->get_field_id('count'); ?>">Number of Tweets:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" value="<?php echo $instance['count']; ?>" />
		</p>

	<?php
	}
}


/*-----------------------------------------------------------------------------------

	Plugin Name: Social Buttons Widget Plugin
	Plugin URI: http://www.thunderbuddies.com
	Description: A widget that displays a simple list of social profile icons
	Version: 1.0
	Author: thunderbuddies
	Author URI: http://www.thunderbuddies.com

-----------------------------------------------------------------------------------*/	
	add_action( 'widgets_init', create_function('', 'return register_widget("tb_longwaveSocials");') );
	class tb_longwaveSocials extends WP_Widget {
	
		function tb_longwaveSocials() {
			$widget_ops = array('classname' => 'tb_longwaveSocials', 'description' => 'Simple list of Social Profile icons');
	    	$this->WP_Widget('tb_longwaveSocials', 'Longwave Socials Widget', $widget_ops);
		}
		
		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance ); ?>
	        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" />
	        <label>Socials:</label><hr><br>
		    <div>
		        <div style="display:none;">
		        	<select class="widefat" data-name="<?php echo $this->get_field_name( 'socialicon' ); ?>[]">
		        		<option value="appnet">Appnet</option>
		        		<option value="dribbble">Behance</option>
		        		<option value="blogger">Blogger</option>		        		
		        		<option value="delicious">Delicious</option>
		        		<option value="digg">Digg</option>
			        	<option value="dribbble">Dribbble</option>
			        	<option value="dropbox">Dropbox</option>
			        	<option value="evernote">Evernote</option>
			        	<option value="facebook">Facebook</option>
			        	<option value="flickr">Flickr</option>
			        	<option value="forrst">Forrst</option>
			        	<option value="github">Github</option>
			        	<option value="gplus">Google+</option>
			        	<option value="grooveshark">Grooveshark</option>
			        	<option value="instagram">Instagram</option>
			        	<option value="klout">Klout</option>
			        	<option value="lastfm">LastFM</option>
			        	<option value="linkedin">LinkedIn</option>
			        	<option value="paypal">Paypal</option>
			        	<option value="picasa">Picasa</option>
			        	<option value="pinterest">Pinterest</option>
			        	<option value="posterous">Posterous</option>
			        	<option value="rss">RSS</option>
			        	<option value="skype">Skype</option>
			        	<option value="songkick">Songkick</option>
			        	<option value="soundcloud">Soundcloud</option>
			        	<option value="spotify">Spotify</option>
			        	<option value="stumbleupon">Stumbleupon</option>
			        	<option value="tumblr">Tumblr</option>
			        	<option value="twitter">Twitter</option>
			        	<option value="vimeo">Vimeo</option>
			        	<option value="youtube">Youtube</option>
			        	<option value="500px">500px</option>
			        </select>
			        <label for="<?php echo $this->get_field_name( 'link' ); ?>[]">URL Link:</label>
			        <input type="text" class="widefat" data-name="<?php echo $this->get_field_name( 'link' ); ?>[]"/>
			        <br><a href="#" class="tb_longwave_delete_social">Delete Social</a>
		        </div>
		        <?php 
		        	$social_count=0;
		        	$social_selected="";
		        	$uniq = uniqid();
		        	if(isset($instance['socialicon'])){
			        	foreach($instance['socialicon'] as $socialicon){
				        	if(!empty($socialicon))
				        		echo '<div><select class="widefat" name="'.$this->get_field_name( 'socialicon' ).'[]">';
				        		
				        		if($socialicon=="appnet") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="appnet" '.$social_selected.'>Appnet</option>'; 
					        	
					        	if($socialicon=="blogger") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="blogger" '.$social_selected.'>Blogger</option>';
					        	
					        	if($socialicon=="dribbble") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="dribbble" '.$social_selected.'>Dribbble</option>';
					        	
					        	if($socialicon=="delicious") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="delicious" '.$social_selected.'>Delicious</option>';
					        	
					        	if($socialicon=="digg") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="digg" '.$social_selected.'>Digg</option>';
					        	
					        	if($socialicon=="dribbble") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="dribbble" '.$social_selected.'>Dribbble</option>';
					        	
					        	if($socialicon=="dropbox") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="dropbox" '.$social_selected.'>Dropbox</option>';
					        	
					        	if($socialicon=="evernote") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="evernote" '.$social_selected.'>Evernote</option>';
					        	
					        	if($socialicon=="facebook") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="facebook" '.$social_selected.'>Facebook</option>';
					        	
					        	if($socialicon=="flickr") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="flickr" '.$social_selected.'>Flickr</option>';
					        	
					        	if($socialicon=="forrst") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="forrst" '.$social_selected.'>Forrst</option>';
					        	
					        	if($socialicon=="github") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="github" '.$social_selected.'>Github</option>';
					        	
					        	if($socialicon=="gplus") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="gplus" '.$social_selected.'>Google+</option>';
					        	
					        	if($socialicon=="grooveshark") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="grooveshark" '.$social_selected.'>Grooveshark</option>';
					        	
					        	if($socialicon=="instagram") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="instagram" '.$social_selected.'>Instagram</option>';
					        	
					        	if($socialicon=="klout") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="klout" '.$social_selected.'>Klout</option>';
					        	
					        	if($socialicon=="lastfm") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="lastfm" '.$social_selected.'>LastFM</option>';
					        	
					        	if($socialicon=="linkedin") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="linkedin" '.$social_selected.'>LinkedIn</option>';
					        	
					        	if($socialicon=="paypal") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="paypal" '.$social_selected.'>Paypal</option>';
					        	
					        	if($socialicon=="picasa") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="picasa" '.$social_selected.'>Picasa</option>';
					        	
					        	if($socialicon=="pinterest") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="pinterest" '.$social_selected.'>Pinterest</option>';
					        	
					        	if($socialicon=="posterous") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="posterous" '.$social_selected.'>Posterous</option>';
					        	
					        	if($socialicon=="rss") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="rss" '.$social_selected.'>RSS</option>';
					        	
					        	if($socialicon=="skype") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="skype" '.$social_selected.'>Skype</option>';
					        	
					        	if($socialicon=="songkick") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="songkick" '.$social_selected.'>Songkick</option>';
					        	
					        	if($socialicon=="soundcloud") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="soundcloud" '.$social_selected.'>Soundcloud</option>';
					        	
					        	if($socialicon=="spotify") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="spotify" '.$social_selected.'>Spotify</option>';
					        	
					        	if($socialicon=="stumbleupon") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="stumbleupon" '.$social_selected.'>Stumbleupon/option>';
					        	
					        	if($socialicon=="tumblr") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="tumblr" '.$social_selected.'>Tumblr</option>';
					        	
					        	if($socialicon=="twitter") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="twitter" '.$social_selected.'>Twitter</option>';
					        	
					        	if($socialicon=="vimeo") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="vimeo" '.$social_selected.'>Vimeo</option>';
					        	
					        	if($socialicon=="youtube") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="youtube" '.$social_selected.'>Youtube</option>';
					        	
					        	if($socialicon=="500px") $social_selected="selected"; else $social_selected ="";
					        	echo '<option value="500px" '.$social_selected.'>500px</option>';
						        
						        echo '</select>';
						        
						        $link = "";
						        if( isset($instance['link'][$social_count]) ) $link = $instance['link'][$social_count++]; 
						        echo '<label for="'.$this->get_field_name( 'link' ).'">URL Link:</label><input type="text" class="widefat" name="'.$this->get_field_name( 'link' ).'[]" value="'.$link.'" />';

						        echo '<br><a href="#" class="tb_longwave_delete_social">Delete Social</a></div><br>';
			        	}
			        }?>
	        	<span></span>
	        	<br><hr><a href='#' class="tb_longwave_add_social_<?php echo $uniq;?>">Add Social</a>
	        </div>
	        
	        <script>
		       
		        	jQuery(".tb_longwave_add_social_<?php echo $uniq;?>").live("click",function(){
		        		$parent = jQuery(this).closest("div");
		        		$field = $parent.find("div:first").clone(true);
			        	$field.find("select,input").each(function(){
				        	$this = jQuery(this);
				        	$this.attr("name",$this.data("name"));
				        	});
			        	$field.css("display","");
			        	$parent.find("span").before($field);
			        	return false;
			        });
		        	jQuery(".tb_longwave_delete_social").live("click",function(){
			        	jQuery(this).closest("div").remove();	
			        	return false;
		        	});

	        </script>
	    <?php
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['socialicon'] = $new_instance['socialicon'];
			$instance['link'] = $new_instance['link'];

			return $instance;
		}
	
		function widget( $args, $instance ) {
			extract( $args );
	
			$title = apply_filters('widget_title', $instance['title'] );
			if ( isset($instance['id']) ) $id = $instance['id'];

						
			echo $before_widget;
		   	if ( !empty($title) ) echo $before_title . $title . $after_title;
			echo '<ul class="social">';
				$social_count = 0;
				foreach($instance['socialicon'] as $class){
					echo '<li><a href="'.$instance['link'][$social_count++].'"><i class="icon-s-'.$class.'"></i></a></li>';
				}
			echo '</ul>';
			echo $after_widget;	
		}
	}	
?>