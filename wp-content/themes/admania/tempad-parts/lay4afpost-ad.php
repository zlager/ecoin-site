<?php

/**
 * Theme Home Page4 Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay4rmvcatids7 =  admania_get_option('ad_rmcatGrid36');			
$admania_lay4rmvcatids_extractids7 = explode(',',$admania_lay4rmvcatids7);
		
$admania_lay4rmvtagids7 = admania_get_option('ad_rmtagGrid36');
$admania_lay4rmvtagids_extractids7 = explode(',',$admania_lay4rmvtagids7);			
			
if((!is_category($admania_lay4rmvcatids_extractids7)) && (!is_tag($admania_lay4rmvtagids_extractids7))) {
 
  if(admania_get_option('hm_lay4_grid') != false):
  
  ?>

<div class="admania_postlay4ad  admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay4lvedlhtmlad8') != false) || (admania_get_lveditoption('hdr_lay4lvedlglead8') != false) || (admania_get_lveditoption('admania_lvedtimg_url34') != false)) {
			if(admania_get_lveditoption('hdr_lay4lvedlhtmlad8') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay4lvedlhtmlad8'));
			
			}
			if(admania_get_lveditoption('hdr_lay4lvedlglead8') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay4lvedlglead8'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url34') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url34') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url34')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url34') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url34')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_lay4gridhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay4gridhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay4gridgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay4gridgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url36') != false) || (admania_get_option('admania_adimgtg_url36') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url36')); ?>">
  <?php if(admania_get_option('admania_adimg_url36') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url36')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem34">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
