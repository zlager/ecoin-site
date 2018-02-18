<?php
/**
 * The template for displaying admania bloglayout4 content
 *
 * @package WordPress
 * @subpackage admania
 * @since admania 1.0
 */
 
get_header(); 

echo '<main id="admania_maincontent" class="admania_sitemaincontent admania_ly4maininner">';

?>

<div class= "admania_ly4ftsection">

		<?php
 
		 if(is_home() && !is_paged()) {
			
            /*
			* Include the Slider And Featured Content Template.			
			*/

			get_template_part('tempslider-parts/bly4sliderandfeatured','content');	
				
		}
		
	?>
		
		
		
</div>

			<?php

			/*
			* Include the After Slider Section Ad content Template.			
			*/
			get_template_part('tempad-parts/lay4afterslider','ad');
			
			?>

<div class="admania_contentarea admania_layout4contentarea">
		   
		<div class="admania_layout4post">	
			
			<div class="admania_layout4postright">
			
				<div class="admania_layout4postrightleft">
					
					<?php
				
						if ( have_posts() ) : 
						
						$admania_bylineck = admania_get_option('admania_ebylfp');		
		  
						$admania_counter = 0;
		
						//Start the loop.
						while ( have_posts() ) : the_post();
						
						$admania_counter++;

						
				        if($admania_counter % 3 == 0):
											
						/*
						* Include the After post Section Ad content Template.			
						*/
						get_template_part('tempad-parts/lay4afpost','ad');
					
						endif;
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('admania_layout4listpst'); ?>>
							<?php admania_featuredimage();  
							if(admania_get_option('admania_ebylfp') != TRUE) {
							if(admania_get_option('admania_pcategory') != TRUE) {
							?>
							<div class="admania_entrymeta"> 
								<?php esc_html_e('In','admania'); ?>
								<?php the_category(' , '); ?>
							 </div>
							<?php } } ?>
							<div class="admania_entryheader admania_layt4entryheader">
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
											<div class="admania_entrycontent">
										
										  <p> 
										  <?php 
										  
										  echo wp_trim_words(get_the_excerpt(),27);  				  
														  
										  ?> 
										  </p>
										 
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
						</article>

						<?php
						
						//	End the loop.
						
						endwhile;			

						// If no content, include the "No posts found" template.
						else :
			
						?>
						<p class="admania_nocntpost">
							<?php esc_html_e('Sorry No Posts were Found..!','admania');  ?>
						</p>
						<?php	

						endif;
				
						admania_paging_nav(); // admania-pagination
												
												
					
						?>
						
						
				</div>
				   <?php if(admania_get_option('layt4_cnt_rgtsdbr') != 1):						
			       get_sidebar('middle'); // middle sidebar
				   endif;
				   ?>
					
	            <div class="admania_layt4contentareafooter">
					<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
				</div>
					
				<?php
				/*
				* Include the Before Footer Section Ad content Template.			
				*/
				get_template_part('tempad-parts/lay4beforefooter','ad');
				?>
				
			
				
			</div>
			<?php if(admania_get_option('layt4_cnt_lstsdbr') != 1): ?>
			<div class="admania_layout4postleft">
			
				<?php
			
				/*
				* Include the Right Sidebar Section Ad Template.			
				*/
			
				get_template_part('tempad-parts/leftsidebar','ad');

				get_sidebar('left'); // Theme Right Sidebar

				?>
            
			</div>
			<?php endif; ?>
		</div>
		
		<div class="admania_contentareafooter">
	<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
  </div>
			
</div>
<!-- .content-area -->

<div class="admania_primarycontentarea admania_layt4primarycontentarea">


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
 
 
