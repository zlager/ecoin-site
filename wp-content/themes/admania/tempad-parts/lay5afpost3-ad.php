<?php

/**
 * Theme Home Page5 Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay5rmvcatids9 =  admania_get_option('ad_rmcatGrid44');			
$admania_lay5rmvcatids_extractids9 = explode(',',$admania_lay5rmvcatids9);
		
$admania_lay5rmvtagids9 = admania_get_option('ad_rmtagGrid44');
$admania_lay5rmvtagids_extractids9 = explode(',',$admania_lay5rmvtagids9);			
			
if((!is_category($admania_lay5rmvcatids_extractids9)) && (!is_tag($admania_lay5rmvtagids_extractids9))) {
 
  if(admania_get_option('hm_lay5_gridad3') != false):
  
  ?>

<div class="admania_layout5gridpst admania_layout5gridpstbdr admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay5lvedlhtmlad12') != false) || (admania_get_lveditoption('hdr_lay5lvedlglead12') != false) || (admania_get_lveditoption('admania_lvedtimg_url40') != false)) {
			if(admania_get_lveditoption('hdr_lay5lvedlhtmlad12') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlhtmlad12'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglead12') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead12'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url40') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url40') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url40')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url40') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url40')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
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
			
			if((admania_get_option('admania_adimg_url44') != false) || (admania_get_option('admania_adimgtg_url44') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url44')); ?>">
  <?php if(admania_get_option('admania_adimg_url44') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url44')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem40">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
