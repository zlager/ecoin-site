<?php
/**
 * The default template for displaying woocommerce content
 *
 *
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

get_header(); 
?>
<!--Begin to post area-->

<div class="clear"></div>
<?php echo '<main class="admania_maincontent" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Shop">';?>
    <?php 
	
	if(is_single()):
		$admania_wcmsnglclass = 'admania_contentarea';
	else:
		$admania_wcmsnglclass = '';
	endif;
  
    /*
	* Include the After Slider Section Ad content Template.			
	*/
	get_template_part('tempslider-parts/bly6slider','content');
	
   ?>
  
 <div class="admania_woocomrc <?php echo esc_attr($admania_wcmsnglclass); ?>">  
      <?php woocommerce_content(); // woocommerce content ?>
  </div>
    <?php 	
	if ( class_exists( 'Woocommerce' ) ) {
	if(!is_shop() && !is_cart()): 
    get_sidebar('shop');   // Woocommerce Sidebar 
    endif;	
	} ?>
  
  <?php
  echo '</main>';  //site-main 
  ?>
<!--right side blockof the post area-->

<?php get_footer(); ?>
