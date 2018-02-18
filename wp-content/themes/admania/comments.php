<?php 

/* admania : Comment Tempplate page
*
* @package WordPress
* @subpackage admania
* @since Admania 1.0
*/

?>

<div id="admania_commentbox" class="admania_commentbox admania_comment_section"> <!--Comment section-->
  
  <?php
	
	$admania_commenter = wp_get_current_commenter();
	$admania_commentreq = get_option( 'require_name_email' );
	$admania_aria_req = ( $admania_commentreq ? " aria-required='true'" : '' ); 


	$admania_commentfields =  array(
	'author' => '<p class="admania-comment-form-author"><label for="author">' . esc_html__( 'Name', 'admania' ) . '</label> ' . ( $admania_commentreq ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $admania_commenter['comment_author'] ) . '" size="30"' . @$admania_aria_req . ' /></p>',
	'email' => '<p class="admania-comment-form-email"><label for="email">' . esc_html__( 'Email', 'admania' ) . '</label> ' . ( $admania_commentreq ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $admania_commenter['comment_author_email'] ) . '" size="30"' . @$admania_aria_req . ' /></p>',
	'url' => '<p class="admania-comment-form-url"><label for="url">' . esc_html__( 'Website', 'admania' ) . '</label><input id="url" name="url" type="text" value="' . esc_url( $admania_commenter['comment_author_url'] ) . '" size="30" /></p>'
	); 


	$admania_comment_args = array(
	'id_form' => 'commentform',
	'id_submit' => esc_html__( 'submit', 'admania' ),
	'title_reply' => esc_html__( 'Leave a Reply' , 'admania' ),
	'title_reply_to' => esc_html__( 'Leave a Reply to %s' , 'admania' ),
	'cancel_reply_link' => esc_html__( 'Cancel Reply' , 'admania' ),
	'label_submit' => esc_html__( 'Post Comment' , 'admania' ),
	'comment_field' => '<p class="admania-comment-form-comment"><textarea id="comment" name="comment" rows="20" cols="100" aria-required="true"></textarea></p>',
	'must_log_in' => '<p class="must-log-in">'.wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'admania' ), wp_login_url( apply_filters( 'the_permalink', esc_url(get_permalink( ) ) )) ).'
	</p>',
	'logged_in_as' => '<p class="logged-in-as">
	
	'.wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'admania' ), esc_url(admin_url( 'profile.php' )), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url(get_permalink( ))))).'
	
	</p>',
	'comment_notes_before' => '<p class="comment-notes">
	' . esc_html__( 'Your email address will not be published.' , 'admania' ).  '</p>',
	'comment_notes_after' => '<p class="form-allowed-tags">
	'.wp_kses( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'admania' ), ' <code>' .esc_attr(allowed_tags()). '</code>').'
</p>',
	'fields' => apply_filters( 'comment_form_default_fields', array(
	'author' => '<p class="admania-comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'admania' ) . '</label> ' . ( $admania_commentreq ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $admania_commenter['comment_author'] ) . '" size="30"' . @$admania_aria_req . ' /></p>',
	'email' => '<p class="admania-comment-form-email"><label for="email">' . esc_html__( 'Email', 'admania' ) . '</label> ' . ( $admania_commentreq ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $admania_commenter['comment_author_email'] ) . '" size="30"' . @$admania_aria_req . ' /></p>',
	'url' => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'admania' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $admania_commenter['comment_author_url'] ) . '" size="30" /></p>' ) ) ); ?>
  <div class="admania_total_comments">
    <h3>
      <?php $admania_snlg = get_post_field('comment_count',get_the_ID());
				if ($admania_snlg >= 1):
				echo ''.absint($admania_snlg).' <span> '.esc_html__('Comments','admania').'</span>';			
				else:
				echo ''; 
				endif;
			?>
    </h3>
  </div>
  <?php
	
	if(get_comments_number()):
	
	the_comments_navigation(); 
	
	?>
  <ol class="admania_commentlist" itemscope="itemscope" itemtype="http://schema.org/UserComments">
    <?php
			// show regular comments
			wp_list_comments(
			array (
				'type'     => 'comment',
				'style'    => 'ul',
				'avatar_size' => '60'
				)
			);
		?>
  </ol>
  <?php
	
	the_comments_navigation();
	
	endif;
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
  <p class="admania_nocomments">
    <?php esc_html_e( 'Comments are closed.', 'admania' ); ?>
  </p>
  <?php endif; ?>
  <?php $admania_comments_args = array(

		// change the title of send button 
		'label_submit'=> esc_html__('Submit Your Comments','admania'),

		// change the title of the reply section
		'title_reply'=> esc_html__('Leave a Comment','admania'),

		// remove "Text or HTML to be displayed after the set of comment fields"
		'comment_notes_after' => '',

		// redefine your own textarea (the comment body)
		'comment_field' => '<p class="admania-comment-form-comment"><textarea id="comment" name="comment" rows="10" cols="100" aria-required="true"></textarea></p>',
	);

	comment_form($admania_comments_args); 
	
   ?>
</div>
<!--End of the Comment section--> 
<?php


