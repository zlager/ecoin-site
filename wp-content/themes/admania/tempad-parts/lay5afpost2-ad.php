<?php

/**
 * Theme Home Page5 Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay5rmvcatids11 =  admania_get_option('ad_rmcatGrid43');			
$admania_lay5rmvcatids_extractids11 = explode(',',$admania_lay5rmvcatids11);
		
$admania_lay5rmvtagids11 = admania_get_option('ad_rmtagGrid43');
$admania_lay5rmvtagids_extractids11 = explode(',',$admania_lay5rmvtagids11);			
			
if((!is_category($admania_lay5rmvcatids_extractids11)) && (!is_tag($admania_lay5rmvtagids_extractids11))) {
 
  if(admania_get_option('hm_lay5_gridad2') != false):
  
  ?>

<div class="admania_layout5gridpst admania_layout5gridpstbdr admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay5lvedlhtmlad11') != false) || (admania_get_lveditoption('hdr_lay5lvedlglead11') != false) || (admania_get_lveditoption('admania_lvedtimg_url39') != false)) {
			if(admania_get_lveditoption('hdr_lay5lvedlhtmlad11') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlhtmlad11'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglead11') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead11'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url39') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url39') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url39')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url39') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url39')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_lay5gridhtmlad2') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5gridhtmlad2'));
			
			endif;
			
			if(admania_get_option('hm_lay5gridgglead2') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5gridgglead2'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url43') != false) || (admania_get_option('admania_adimgtg_url43') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url43')); ?>">
  <?php if(admania_get_option('admania_adimg_url43') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url43')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem39">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
