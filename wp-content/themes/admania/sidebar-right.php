<?php
/**
 * The template for the primary sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Admaania
 * @since Admaania 1.0
 */
?>
<?php if ( is_active_sidebar( 'admania-primary-sidebar' )  ) : ?>
<aside id="admania_primarysidebar" class="admania_primarysidebar widget-area">
  <?php dynamic_sidebar( 'admania-primary-sidebar' ); ?>
</aside>
<!-- .sidebar .widget-area -->
<?php endif; ?>