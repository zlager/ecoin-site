<?php

/**
 * Theme Layout5 Home / Archives Before Footer Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
   $admania_layt5rmvcatids14 =  admania_get_option('ad_rmcatGrid42');			
$admania_layt5rmvcatids_extractids14 = explode(',',$admania_layt5rmvcatids14);			
			
$admania_rmvtagids14 = admania_get_option('ad_rmtagGrid42');
$admania_rmvtagids_extractids14 = explode(',',$admania_rmvtagids14);			
			
if((!is_category($admania_layt5rmvcatids_extractids14)) && (!is_tag($admania_rmvtagids_extractids14))) {

if(admania_get_option('hm_lay5bfftrad') != false):
  
?>

<div class="admania_afterslider admania_themead admania_layt5afterslider">
  <?php
       	if((admania_get_lveditoption('hdr_lay5lvedlglead14') != false) || (admania_get_lveditoption('hdr_lay5lvedlglead9') != false) || (admania_get_lveditoption('admania_lvedtimg_url42') != false)) {
			
			if(admania_get_lveditoption('hdr_lay5lvedlglead14') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead14'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglead9') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead9'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url42') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url42') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url42')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url42') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url42')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
 else {
			if(admania_get_option('hm_lay5bfftrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5bfftrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay5bfftrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5bfftrgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url42') != false) || (admania_get_option('admania_adimgtg_url42') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url42')); ?>">
  <?php if(admania_get_option('admania_adimg_url42') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url42')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
				if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem42">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
		
