<?php
/**
 * The template for displaying admania bloglayout2 content
 *
 * @package WordPress
 * @subpackage admania
 * @since Admania 1.0
 */
 
get_header(); 

echo '<main id="admania_maincontent" class="admania_sitemaincontent">';

?>

<div class="admania_contentarea">

<div class= "admania_ly2ftsection">

		<?php
 
		 if(is_home() && !is_paged()) {
			
            /*
			* Include the Slider And Featured Content Template.			
			*/

			get_template_part('tempslider-parts/bly2sliderandfeatured','content');	
				
		}
		
		?>
		
</div>


    <?php
			
			  
			   /*
				 * Include the Home Page After Slider Section Ad Template.			
				 */
	             
			get_template_part('tempad-parts/lay2afterslider','ad');	
			
         
			
          if ( have_posts() ) : 
	
	      $admania_bylineck = admania_get_option('admania_ebylfp');
		
		  $admania_counter = 0;
		
			//Start the loop.
			while ( have_posts() ) : the_post();
			
			$admania_counter++;

			?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('admania_listpst'); ?>>
				<?php admania_featuredimage();  ?>
				<div class="admania_entryftcontent">
				<?php
				  if(admania_get_option('admania_ebylfp') != TRUE) {
					if(admania_get_option('admania_pcategory') != TRUE) {
					?>
				 <div class="admania_entrymeta"> 
				<?php esc_html_e('In','admania'); ?>
				<?php the_category(' , '); ?>
				 </div>
				<?php } } ?>
				<div class="admania_entryheader">
				  <?php the_title( sprintf( '<h2 class="admania_entrytitle" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
				  <div class="admania_entrybyline">
					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="admania_stickypost">
					<?php esc_html_e( 'Featured', 'admania' ); ?>
					</span>
					<div class="admania_entrybylinecd">|</div>
					<?php endif; ?>
					<?php
				  if( 1 != (int) $admania_bylineck )  { 
				   if(admania_get_option('admania_ppostedby') != TRUE) {	
				  esc_html_e('By','admania'); ?>
					<?php the_author_posts_link(); ?>
					<div class="admania_entrybylinecd">|</div>
					<?php  }
				   if(admania_get_option('admania_ppostedon') != TRUE) {
				  ?>
					<?php esc_html_e('On','admania'); ?>
					<?php the_time(get_option( 'date_format'));	  	  
				  }
				  }
				  ?>
				  </div>
				</div>
				<!-- #entryheader -## -->
				<div class="admania_entrycontent">
				
				  <p> <?php 
				  
				  $admania_contineread = '<a href="'.esc_url(get_the_permalink()).'" class="admania_pstcnt">
				  '.esc_html__('Continue Reading','admania').'
					</a> ';
				  echo wp_trim_words(get_the_excerpt(),27,''. $admania_contineread.'');  ?> </p>
				  <?php
				wp_link_pages( array(
							'before'      => '<div class="admania_pagelinks"><span class="admania_pagelinkstitle">' . esc_html__( 'Pages:', 'admania' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="admania_screenreadertext">' . esc_html__( 'Page', 'admania' ) . ' </span><span class="admania_pglnlksaf">%</span>',
							'separator'   => '<span class="admania_screenreadertext">, </span>',
						) );
						?>
				</div>
				<!-- #entrycontent -## -->
				
				
				</div>
			  </article>
			
			<?php
				
			if($admania_counter % 4 == 0):
			
				/*
				* Include the Right Sidebar Section Ad Template.			
				*/
					
				get_template_part('tempad-parts/afterlistpost','ad');

			endif;
				
			// End the loop.
			endwhile;			

			// If no content, include the "No posts found" template.
			else :
		
			esc_html_e('Sorry No Posts Were Found','admania');		

			endif;
			
			admania_paging_nav(); // admania-pagination
			
			?>



</div>
<!-- .content-area -->

<div class="admania_primarycontentarea">


        <?php
		
		 /*
		 * Include the Right Sidebar Section Ad Template.			
		 */
		
		get_template_part('tempad-parts/rightsidebar','ad');

		get_sidebar('right'); // Theme Right Sidebar

		?>
</div>

<?php


echo '</main>';  //site-main 

get_footer(); 
 
 
