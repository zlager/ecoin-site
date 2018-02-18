<?php

/**
 * Theme Left Sidebar Ad Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
$admania_rmvcatids4 =  admania_get_option('ad_rmcatlist5');			
$admania_rmvcatids_extractids4 = explode(',',$admania_rmvcatids4);			
			
$admania_rmvtagids4 = admania_get_option('ad_rmtaglist5');
$admania_rmvtagids_extractids4 = explode(',',$admania_rmvtagids4);			
			
if((!is_category($admania_rmvcatids_extractids4)) && (!is_tag($admania_rmvtagids_extractids4))) {
 
 if(admania_get_option('hdr_adtplft_act2') != false):
 ?>
			<div class="admania_themead">
			<?php
        	if((admania_get_lveditoption('hdr_lvedlhtmlad5') != false) || (admania_get_lveditoption('hdr_lvedlglead5') != false) || (admania_get_lveditoption('admania_lvedtimg_url5') != false)) {
			
			if(admania_get_lveditoption('hdr_lvedlhtmlad5') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad5'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead5') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead5'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url5') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url5') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url5')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url5') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url5')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			}
		
			
			}
 else {
 
 if(admania_get_option('hdr_adtplfthtmlcd2') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtplfthtmlcd2'));
			
			endif;
			
			if(admania_get_option('hdr_adtplftglecd2') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtplftglecd2'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url5') != false) || (admania_get_option('admania_adimgtg_url5') != false) ):
			?>

<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url5')); ?>">
<?php if(admania_get_option('admania_adimg_url5') != false) { ?>
<img src="<?php echo esc_url(admania_get_option('admania_adimg_url5')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
<?php } ?>
</a>
<?php endif;  
 }
 
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem5">				
	<i class="fa fa-edit"></i>
		 <?php esc_html_e('Edit','admania'); ?>
</div>	
			 
<?php }
?>
</div>
<?php	 
 endif;
 }
