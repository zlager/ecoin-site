<?php

/**
 * Theme Home Page5 After Slider Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
  $admania_lay5rmvcatids6 =  admania_get_option('ad_rmcatGrid40');			
$admania_lay5rmvcatids_extractids6 = explode(',',$admania_lay5rmvcatids6);			
			
$admania_lay5rmvtagids6 = admania_get_option('ad_rmtagGrid40');
$admania_lay5rmvtagids_extractids6 = explode(',',$admania_lay5rmvtagids6);			
			
if((!is_category($admania_lay5rmvcatids_extractids6)) && (!is_tag($admania_lay5rmvtagids_extractids6))) {
 
 
  if(admania_get_option('hdr_adtplay5_act1') != false):
  
  ?>

<div class="admania_afterslider admania_themead admania_lay5afterslider">
  <?php

   	if((admania_get_lveditoption('hdr_lay5lvedlhtmlad7') != false) || (admania_get_lveditoption('hdr_lay5lvedlglead7') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url37') != false)) {
			
			 
			if(admania_get_lveditoption('hdr_lay5lvedlhtmlad7') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlhtmlad7'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglead7') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead7'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url37') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url37') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url37')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url37') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url37')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 else {
 
 
			if(admania_get_option('hdr_lay5htmlcd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay5htmlcd1'));
			
			endif;
			
			if(admania_get_option('hdr_lay5glecd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay5glecd1'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url40') != false) || (admania_get_option('admania_adimgtg_url40') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url40')); ?>">
  <?php if(admania_get_option('admania_adimg_url40') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url40')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  
  <?php 
  } ?>
  </a>
  <?php			
	endif; 
	
    }	
	
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem37">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	
			
</div>
<?php 
 endif;
 }
