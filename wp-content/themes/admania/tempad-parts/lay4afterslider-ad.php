<?php

/**
 * Theme Home Page4 After Slider Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
  $admania_lay4rmvcatids6 =  admania_get_option('ad_rmcatGrid35');			
$admania_lay4rmvcatids_extractids6 = explode(',',$admania_lay4rmvcatids6);			
			
$admania_lay4rmvtagids6 = admania_get_option('ad_rmtagGrid35');
$admania_lay4rmvtagids_extractids6 = explode(',',$admania_lay4rmvtagids6);			
			
if((!is_category($admania_lay4rmvcatids_extractids6)) && (!is_tag($admania_lay4rmvtagids_extractids6))) {
 
 
  if(admania_get_option('hdr_adtplay4_act1') != false):
  
  ?>

<div class="admania_afterslider admania_themead admania_lay4afterslider">
  <?php
   
   	if((admania_get_lveditoption('hdr_lay4lvedlhtmlad7') != false) || (admania_get_lveditoption('hdr_lay4lvedlglead7') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url33') != false)) {
			if(admania_get_lveditoption('hdr_lay4lvedlhtmlad7') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay4lvedlhtmlad7'));
			
			}
			if(admania_get_lveditoption('hdr_lay4lvedlglead7') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay4lvedlglead7'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url33') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url33') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url33')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url33') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url33')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 else {
  
 
			if(admania_get_option('hdr_lay4htmlcd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay4htmlcd1'));
			
			endif;
			
			if(admania_get_option('hdr_lay4glecd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay4glecd1'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url35') != false) || (admania_get_option('admania_adimgtg_url35') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url35')); ?>">
  <?php if(admania_get_option('admania_adimg_url35') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url35')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php			
	endif; 
    }	
			
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem33">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	
			
</div>
<?php 
 endif;
 }
