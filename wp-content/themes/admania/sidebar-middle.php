<?php
/**
 * The template for the alt secondary sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Admaania
 * @since Admaania 1.0
 */
?>
<?php if ( is_active_sidebar( 'admania-altsecondary-sidebar' )  ) : ?>
<aside id="admania_altsecondarysidebar admania_secondarysidebar" class="admania_altsecondarysidebar admania_secondarysidebar admania_layout4postright2 widget-area">
  <?php dynamic_sidebar( 'admania-altsecondary-sidebar' ); ?>
</aside>
<!-- .sidebar .widget-area -->
<?php endif; ?>