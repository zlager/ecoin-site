<?php

/**
 * Theme Home Page2 After Slider Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
  $admania_lay4rmvcatids6 =  admania_get_option('ad_rmcatlist7');			
$admania_lay4rmvcatids_extractids6 = explode(',',$admania_lay4rmvcatids6);			
			
$admania_lay2rmvtagids6 = admania_get_option('ad_rmtaglist7');
$admania_lay2rmvtagids_extractids6 = explode(',',$admania_lay2rmvtagids6);			
			
if((!is_category($admania_lay4rmvcatids_extractids6)) && (!is_tag($admania_lay2rmvtagids_extractids6))) {
 
 
  if(admania_get_option('hm_lay2_aftrsldrad') != false):
  
  ?>

<div class="admania_afterslider admania_themead">
  <?php
  
  
   	if((admania_get_lveditoption('hdr_lay2lvedlhtmlad7') != false) || (admania_get_lveditoption('hdr_lay2lvedlglead7') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url24') != false)) {
			if(admania_get_lveditoption('hdr_lay2lvedlhtmlad7') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlhtmlad7'));
			
			}
			if(admania_get_lveditoption('hdr_lay2lvedlglead7') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlglead7'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url24') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url24') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url24')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url24') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url24')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 else {
  
 
			if(admania_get_option('hm_lay2_aftrsldrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay2_aftrsldrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay2_aftrsldrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay2_aftrsldrgglead'));
			
			endif;
			
			if((admania_get_option('admania_lay2_adimg_url25') != false) || (admania_get_option('admania_lay2adimgtg_url25') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_lay2adimgtg_url25')); ?>">
  <?php if(admania_get_option('admania_lay2_adimg_url25') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_lay2_adimg_url25')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php			
	endif; 
    }	
			
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem24">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	
			
</div>
<?php 
 endif;
 }
