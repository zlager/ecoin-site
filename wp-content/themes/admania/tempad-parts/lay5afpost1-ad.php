<?php

/**
 * Theme Home Page5 Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay5rmvcatids7 =  admania_get_option('ad_rmcatGrid41');			
$admania_lay5rmvcatids_extractids7 = explode(',',$admania_lay5rmvcatids7);
		
$admania_lay5rmvtagids7 = admania_get_option('ad_rmtagGrid41');
$admania_lay5rmvtagids_extractids7 = explode(',',$admania_lay5rmvtagids7);			
			
if((!is_category($admania_lay5rmvcatids_extractids7)) && (!is_tag($admania_lay5rmvtagids_extractids7))) {
 
  if(admania_get_option('hm_lay5_grid') != false):
  
  ?>

<div class="admania_layout5gridpst admania_layout5gridpstbdr admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay5lvedlhtmlad8') != false) || (admania_get_lveditoption('hdr_lay5lvedlglead8') != false) || (admania_get_lveditoption('admania_lvedtimg_url38') != false)) {
			if(admania_get_lveditoption('hdr_lay5lvedlhtmlad8') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlhtmlad8'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglead8') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead8'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url38') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url38') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url38')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url38') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url38')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_lay5gridhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5gridhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay5gridgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5gridgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url41') != false) || (admania_get_option('admania_adimgtg_url41') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url41')); ?>">
  <?php if(admania_get_option('admania_adimg_url41') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url41')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem38">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
