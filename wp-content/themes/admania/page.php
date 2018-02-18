<?php
/**
 * The Template for displaying all page content
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
$admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1'); 
 
get_header(); 

if($admania_blog_layout == 'amblyt5') {
	$admania_lay5class = 'admania_layt5_contentarea';
}
else {
	$admania_lay5class = '';
}
echo '<main id="admania_maincontent" class="admania_sitemaincontent">';

if (class_exists( 'Woocommerce' )):

if ( have_posts() ) : 
		
			//Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 *  Include the page content template.			
				 */
				get_template_part( 'content', 'page' );	
				
				endwhile;			

		// If no content, include the "No posts found" template.
		else :
			
		?>
    <p class="admania_nocntpost">
      <?php esc_html_e('Sorry No Posts were Found..!','admania');  ?>
    </p>
    <?php
	endif;
	
else:

?>
<div class="admania_contentarea <?php echo esc_attr($admania_lay5class); ?>">
<?php
if(($admania_blog_layout == 'amblyt1')) {
?>
  <div class="admania_contentareainner admania_layout1contentareainner">
    <?php 
}

if(($admania_blog_layout == 'amblyt4')) {
?>
  <div class="admania_contentareainner admania_layout4contentareainner">
    <?php 
}
	if ( have_posts() ) : 
		
			//Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 *  Include the page content template.			
				 */
				get_template_part( 'content', 'page' );	

				//	End the loop.
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
				 if(admania_get_option('admania_commentspage') != true) {
					comments_template();
				}
		        }
			endwhile;			

		// If no content, include the "No posts found" template.
		else :
			
		?>
    <p class="admania_nocntpost">
      <?php esc_html_e('Sorry No Posts were Found..!','admania');  ?>
    </p>
    <?php
	endif;
	if(($admania_blog_layout == 'amblyt1') || ($admania_blog_layout == 'amblyt4')) {
	?>
  </div>
  <!-- .content-area-inner -->
  <?php if(((admania_get_option('layt4_cnt_lstsdbr') != 1) || (admania_get_option('layt4_cnt_frstlaytlstsdbr') != 1))): ?>
  <div class="admania_secondarycontentarea">
    <?php
		
		
		/*
		 *  Include the left sidebar Ad template.			
		 */
		
		get_template_part('tempad-parts/leftsidebar','ad');

		get_sidebar('left'); 

		?>
  </div>
  <?php endif; ?>
    <div class="admania_contentareafooter">
		<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
	</div>
		<?php } ?>
</div>
<!-- .content-area -->

<div class="admania_primarycontentarea">

        <?php
		
		get_template_part('tempad-parts/rightsidebar','ad');

		get_sidebar('right'); 

		?>
		
</div>
<?php 

		/*
		 * Include the Page Content Bottom Section Sticky Ad Template.			
		 */
				
	   get_template_part('tempad-parts/pagesticky','ad');

endif;

if(($admania_blog_layout == 'amblyt1') || ($admania_blog_layout == 'amblyt4')) {
	
	/*
	* Include the Before Footer Section Ad Template.			
	*/			
	get_template_part('tempad-parts/beforefooter','ad'); 
	
}

	   

echo '</main>';  //site-main 

get_footer(); 
