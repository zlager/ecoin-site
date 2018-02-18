<?php
/**
 * The template for displaying admania bloglayout5 content
 *
 * @package WordPress
 * @subpackage admania
 * @since admania 1.0
 */
 
get_header(); 


echo '<main id="admania_maincontent" class="admania_sitemaincontent">';

			
			/*
			* Include the After Header Section Ad content Template.			
			*/
			get_template_part('tempad-parts/lay5afterheader','ad');
			
			
			/*
			* Include the Slider Section content Template.			
			*/
			
			get_template_part('tempslider-parts/bly5sliderandfeatured','content'); // layout5 slider-content
		

			/*
			* Include the After Slider Section Ad content Template.			
			*/
			get_template_part('tempad-parts/lay5afterslider','ad');			
			
			?>

<div class="admania_contentarea admania_layt5_contentarea">
		   		
					
					<?php
				
						if ( have_posts() ) : 			
								
		  
						$admania_counter = 0;
		
						//Start the loop.
						while ( have_posts() ) : the_post();
						
						$admania_counter++;

						
				        if($admania_counter  == 3):
											
						/*
						* Include the After post Section Ad1 content Template.			
						*/
						get_template_part('tempad-parts/lay5afpost1','ad');
						
						endif;
						 if($admania_counter  == 7):
						/*
						* Include the After post Section Ad2 content Template.			
						*/
						get_template_part('tempad-parts/lay5afpost2','ad');
						
						endif;						
						if($admania_counter  == 9):
						
						/*
						* Include the After post Section Ad3 content Template.			
						*/
						get_template_part('tempad-parts/lay5afpost3','ad');
						endif;
						
						if($admania_counter  == 13):						
						/*
						* Include the After post Section Ad4 content Template.			
						*/
						get_template_part('tempad-parts/lay5afpost4','ad');
						endif;
						?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class('admania_layout5gridpst'); ?>>
							
							<?php admania_featuredimage(); ?>
	
                            <div class="admanialayt5_entrycontent">
							<p> 
								<?php 
										  
								echo wp_trim_words(get_the_excerpt(),30);  				  
														  
								 ?> 
							</p>
							<div class="admanialayt5_entryfooter">
								<a href="<?php esc_url(the_permalink()); ?>" class="admania_layt5rdmr">
									<?php  esc_html_e('Continue Reading','admania'); ?>
								</a>
							</div>								
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
												
												
					
				/*
				* Include the Before Footer Section Ad content Template.			
				*/
				get_template_part('tempad-parts/lay5beforefooter','ad');
				?>
				
	
		
		
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
 
 
