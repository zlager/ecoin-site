<?php
/**
 * The template part for displaying page posts
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
if (class_exists( 'Woocommerce' )): 

echo '';

else:

/*
* Include the Before Page Content Section Ad Template.			
*/
			
get_template_part('tempad-parts/pagecontentbf','ad');

endif;  
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
		if (class_exists( 'Woocommerce' )):
		the_content();
		else:
		/*
		* Include the Before Page Content Section Ad Template.			
		*/
			
		get_template_part('tempad-parts/pagecontenttop','ad');
		
		
			the_content();

	        wp_link_pages( array(
				'before'      => '<div class="admania_pagelinks"><span class="admania_pagelinkstitle">' . esc_html__( 'Pages:', 'admania' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="admania_screenreadertext">' . esc_html__( 'Page', 'admania' ) . ' </span><span class="admania_pglnlksaf">%</span>',
				'separator'   => '<span class="admania_screenreadertext">, </span>',
			) );
		
			/*
			* Include the Before Page Content Section Bottom Ad Template.			
			*/

			get_template_part('tempad-parts/pagecontentbottm','ad');		
			endif;			
			?>
  </div>
  <!-- .entry-content --> 
  
</article>
<!-- #post-## -->