<?php 
/**
 * Template Name: Page Full Width
 *
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 

get_header(); 

echo '<main id="admania_maincontent" class="admania_sitemaincontent admania_nosidebar">';

    if ( have_posts() ) : 
		
			//Start the loop.
			while ( have_posts() ) : the_post();

				?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<header class="admania_entryheader">
				
						<?php 
		
							if(admania_get_option('admania_breadcrumb_pages') != '') {
							
							admania_breadcrumb(); // Admania-BreadCrumb
							
							}
					
							the_title( '<h1 class="admania_entrytitle" itemprop="headline">', '</h1>' ); 
							
							admania_entrymeta(); // Admania-EntryMeta
					
						?>
					</header>
			
					<!-- .entry-header -->
  
					<div class="admania_entrycontent">
						<?php	
				
						the_content();

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
			
					<!-- .entry-content --> 
  
			</article>
			
			<!-- #post-## -->
				
				<?php
					

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

	   
if($admania_blog_layout == 'amblyt2') {
	
	/*
	* Include the Before Footer Section Ad Template.			
	*/
			
	get_template_part('tempad-parts/lay2beforefooter','ad'); 
}

elseif($admania_blog_layout == 'amblyt3') {
	
	/*
	* Include the Before Footer Section Ad Template.			
	*/
			
	get_template_part('tempad-parts/lay3beforefooter','ad'); 
}
	 
		

echo '</main>';  //site-main 

get_footer(); 
