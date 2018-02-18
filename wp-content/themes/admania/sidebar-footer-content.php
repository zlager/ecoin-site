<?php
/**
 * The template for the footer Content 
 *
 * @package WordPress
 * @subpackage Admaania
 * @since Admaania 1.0
 */

 ?>
  <div class="admania_sitefooterinner">
   <?php if((is_active_sidebar('admania-footer-widget1')) || (is_active_sidebar('admania-footer-widget2')) || (is_active_sidebar('admania-footer-widget3'))):  ?>
   <div class="admania_sitefooterinnertop">
   <?php if(is_active_sidebar('admania-footer-widget1')): ?>
			<div class="admania_footerwidgets">
				<?php dynamic_sidebar('admania-footer-widget1'); ?>
			</div>
	<?php endif; ?>
	 <?php if(is_active_sidebar('admania-footer-widget2')): ?>
			<div class="admania_footerwidgets">
				<?php dynamic_sidebar('admania-footer-widget2'); ?>
			</div>
	<?php endif; ?>
	 <?php if(is_active_sidebar('admania-footer-widget3')): ?>
			<div class="admania_footerwidgets">
				<?php dynamic_sidebar('admania-footer-widget3'); ?>
			</div>
	<?php endif; ?>
  </div>
  <?php endif; ?>
    <div class="admania_sitefooterlogo">
      <?php if(admania_get_option('admania_ftrcustom_logoactivestatus') != false) {  ?> 
      <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>"> <img src=" <?php echo esc_url(admania_get_option('admania_ftrcustomlogo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/> </a>
     <p>     
	 <?php 
		 bloginfo( 'description' ); 
     ?>
     </p>
     <?php	
		}
				   		
	else { 
	if(admania_get_option('admania_ftrsitetit_active') != true) {
	?>
      <div class="admania_sitetitle admania_restitle"> 
	    <a href="<?php echo esc_url(home_url('/'));  ?>" title="<?php bloginfo( 'name' ); ?>">
        <?php bloginfo( 'name' ); ?>
        </a>
        <p>
          <?php bloginfo( 'description' );  ?>
        </p>
      </div>
	<?php }}	?>
    </div>
	<!-- #Admania SiteFooter Logo-## --> 
    <div class="admania_sitefooterattribution"> 
	
      <div class="admania_ftrattbtontop">
	  
        <?php
		if(admania_get_option('admania_ftrfacebook') != false){
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrfacebook')); ?>" class="admania_fbflw" target="_blank"><i class="fa fa-facebook"></i></a>
        <?php } 
        if(admania_get_option('admania_ftrtwitter') != false) {
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrtwitter')); ?>" class="admania_twtflw" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php } 
		if(admania_get_option('admania_ftrgoogleplus') != false) {
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrgoogleplus')); ?>" class="admania_gleflw" target="_blank"><i class="fa fa-google-plus"></i></a>
        <?php
		} 
		if(admania_get_option('admania_ftrlinkedin') != false) {
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrlinkedin')); ?>" class="admania_lnkflw" target="_blank"><i class="fa fa-linkedin"></i></a>
        <?php
		} 		 
		if(admania_get_option('admania_ftrpinterest') != false) {
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrpinterest')); ?>" class="admania_pinflw" target="_blank"><i class="fa fa-pinterest"></i></a>
        <?php
		} 
		if(admania_get_option('admania_ftrstumble') != false) {
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrstumble')); ?>" class="admania_stumbleflw" target="_blank"><i class="fa fa-stumbleupon"></i></a>
        <?php
		} 
		if(admania_get_option('admania_ftrredit') != false) {
		?>
        <a href="<?php echo esc_url(admania_get_option('admania_ftrredit')); ?>" class="admania_redditflw" target="_blank"><i class="fa fa-reddit"></i></a>
        <?php
		} 			
		?>
		
      </div>
	  
	  <!-- #Admania SiteFooter Social Follow-## --> 
	  
      <div class="admania_ftrattbtonbottom">
	  
        <?php
		if(admania_get_option('admania_focopyrightscontent') != false):
		$admania_footertxt = admania_get_option('admania_focopyrightscontent');
		else:
		$admania_footertxt = 'Copyright at 2016. Admania Theme All Rights Reserved';
		endif;
  ?>
        <?php echo esc_textarea($admania_footertxt); ?> </div>
      <div class="admania_top" id="admania_top"> <a href="#top">&uarr;</a> </div>
	  
    </div><!-- #Admania SiteFooter Attribution-## --> 
	
  </div>
   <!-- #Admania SiteFooter Inner-## --> 

 