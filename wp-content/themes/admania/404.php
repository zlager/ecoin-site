<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

get_header(); 

echo '<main id="admania_maincontent" class="admania_sitemaincontent" role="main">';
?>

<div class="admania_404contentarea">
  <header class="admania_404header">
    <h1 class="admania_404title">
      <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'admania' ); ?>
    </h1>
  </header>
  <!-- .page-header -->
  
  <div class="admania_404content">
    <p>
      <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'admania' ); ?>
    </p>
    <?php get_search_form(); ?>
  </div>
  <!-- .page-content --> 
  
</div>
<?php
echo '</main>';  //site-main 
get_footer(); ?>
