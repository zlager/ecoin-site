<?php
/**
 * The template for the secondary sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Admaania
 * @since Admaania 1.0
 */
?>
<?php if ( is_active_sidebar( 'admania-secondary-sidebar' )  ) : ?>
<aside id="admania_secondarysidebar" class="admania_secondarysidebar widget-area">
  <?php dynamic_sidebar( 'admania-secondary-sidebar' ); ?>
</aside>
<!-- .sidebar .widget-area -->
<?php endif; ?>