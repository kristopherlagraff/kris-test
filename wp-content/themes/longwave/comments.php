<?php
/**
 * @package WordPress
 * @subpackage tb_longwave_Theme
 */
?>

<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'tb_longwave' ); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
		<!-- Begin Comments -->
		<div id="comments">
	      <h3><?php comments_number( __('No Comments','tb_longwave'), __('1 Comment','tb_longwave'), __('% Comments','tb_longwave') ); ?> </h3>
	      <ol id="singlecomments" class="commentlist"><?php wp_list_comments( array( 'callback' => 'tb_longwave_comment' ) ); ?></ol>
	    </div>
	    
    <!-- End Comments -->
<?php endif;  ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
	<div>
		<div class="left marginbottom10"><?php previous_comments_link( __( 'Older Comments ', 'tb_longwave' ) ); ?></div>
		<div class="right marginbottom10"><?php next_comments_link( __( 'Newer Comments', 'tb_longwave' ) ); ?> </div>
	</div>
<?php endif;  ?>

<?php if ( !have_comments() && comments_open() ){?>
	<!--<div class="divide40"></div>-->
<?php } ?>

<?php if ( comments_open() ) :

		$comments_args = array(
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="name-field"><input type="text" name="author" title="'.__( 'Name', 'tb_longwave' ).'*" /></div>',
				'email'  => '<div class="email-field"><input type="text" name="email" title="'.__( 'Email', 'tb_longwave' ).'*" /></div>',
				'url'    => '<div class="website-field"><input type="text" id="url" name="url" title="'.__( 'Website', 'tb_longwave' ).'" /></div>')
			),
			'id_form' => 'comment-form',
	        'title_reply'=>__( '<div class="clear"></div>
	    <hr />Would you like to share your thoughts?', 'tb_longwave' ),
	        'comment_field' => ' <div class="message-field"><textarea id="message" name="comment" id="textarea" rows="5" cols="30" title="'.__( 'Enter your comment here...', 'tb_longwave' ).'"></textarea></div>',
			'label_submit' => __( 'Submit' , 'tb_longwave'),
			'id_submit' => 'btn-submit',
			'comment_notes_after' => ' ' //remove "You may use these HTML tags and attributes: ...."
		);
		comment_form($comments_args); 
    
    endif; ?>
    <script>jQuery("#btn-submit").addClass("btn-submit");</script>