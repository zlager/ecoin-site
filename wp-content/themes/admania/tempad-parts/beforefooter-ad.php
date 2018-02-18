<?php

/**
 * Theme Home / Archives Before Footer Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
   $admania_rmvcatids8 =  admania_get_option('ad_rmcatlist9');			
$admania_rmvcatids_extractids8 = explode(',',$admania_rmvcatids8);			
			
$admania_rmvtagids8 = admania_get_option('ad_rmtaglist9');
$admania_rmvtagids_extractids8 = explode(',',$admania_rmvtagids8);			
			
if((!is_category($admania_rmvcatids_extractids8)) && (!is_tag($admania_rmvtagids_extractids8))) {

if(admania_get_option('hm_bfftrad') != false):
  
?>

<div class="admania_afterslider admania_themead">
  <?php
       	if((admania_get_lveditoption('hdr_lvedlhtmlad9') != false) || (admania_get_lveditoption('hdr_lvedlglead9') != false) || (admania_get_lveditoption('admania_lvedtimg_url9') != false)) {
			
			if(admania_get_lveditoption('hdr_lvedlhtmlad9') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad9'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead9') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead9'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url9') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url9') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url9')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url9') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url9')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
 else {
			if(admania_get_option('hm_bfftrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_bfftrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_bfftrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_bfftrgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url10') != false) || (admania_get_option('admania_adimgtg_url10') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url10')); ?>">
  <?php if(admania_get_option('admania_adimg_url10') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url10')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
				if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem9">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
		
