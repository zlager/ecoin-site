<?php 
 /**
 * The Sidebar Shop
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
?>
 
 
<?php if ( is_active_sidebar( 'admania-shoppagewidget' )  ) : ?>
<aside id="admania_primarycontentarea" class="admania_primarycontentarea admania_woocmesidebar widget-area">
  <?php dynamic_sidebar( 'admania-shoppagewidget' ); ?>
</aside>
<!-- .sidebar .widget-area -->
<?php endif; ?>
