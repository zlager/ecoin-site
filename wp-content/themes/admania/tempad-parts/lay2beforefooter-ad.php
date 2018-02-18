<?php

/**
 * Theme Layout2 Home / Archives Before Footer Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
   $admania_lay4rmvcatids8 =  admania_get_option('ad_rmcatlist25');			
$admania_lay4rmvcatids_extractids8 = explode(',',$admania_lay4rmvcatids8);			
			
$admania_rmvtagids8 = admania_get_option('ad_rmtaglist25');
$admania_rmvtagids_extractids8 = explode(',',$admania_rmvtagids8);			
			
if((!is_category($admania_lay4rmvcatids_extractids8)) && (!is_tag($admania_rmvtagids_extractids8))) {

if(admania_get_option('hm_lay2bfftrad') != false):
  
?>

<div class="admania_lay2beforeftr admania_themead admania_sitefooterinner">
  <?php
       	if((admania_get_lveditoption('hdr_lay2lvedlhtmlad9') != false) || (admania_get_lveditoption('hdr_lay2lvedlglead9') != false) || (admania_get_lveditoption('admania_lvedtimg_url26') != false)) {
			
			if(admania_get_lveditoption('hdr_lay2lvedlhtmlad9') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlhtmlad9'));
			
			}
			if(admania_get_lveditoption('hdr_lay2lvedlglead9') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlglead9'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url26') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url26') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url26')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url26') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url26')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
 else {
			if(admania_get_option('hm_lay2bfftrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay2bfftrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay2bfftrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay2bfftrgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url27') != false) || (admania_get_option('admania_adimgtg_url27') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url27')); ?>">
  <?php if(admania_get_option('admania_adimg_url27') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url27')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
				if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem26">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
		
