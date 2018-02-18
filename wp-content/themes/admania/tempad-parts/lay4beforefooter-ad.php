<?php

/**
 * Theme Layout4 Home / Archives Before Footer Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
   $admania_layt4rmvcatids8 =  admania_get_option('ad_rmcatGrid37');			
$admania_layt4rmvcatids_extractids8 = explode(',',$admania_layt4rmvcatids8);			
			
$admania_rmvtagids8 = admania_get_option('ad_rmtagGrid37');
$admania_rmvtagids_extractids8 = explode(',',$admania_rmvtagids8);			
			
if((!is_category($admania_layt4rmvcatids_extractids8)) && (!is_tag($admania_rmvtagids_extractids8))) {

if(admania_get_option('hm_lay4bfftrad') != false):
  
?>

<div class="admania_afterslider admania_themead admania_layt4afterslider">
  <?php
       	if((admania_get_lveditoption('hdr_lay4lvedlhtmlad9') != false) || (admania_get_lveditoption('hdr_lay4lvedlglead9') != false) || (admania_get_lveditoption('admania_lvedtimg_url35') != false)) {
			
			if(admania_get_lveditoption('hdr_lay4lvedlhtmlad9') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay4lvedlhtmlad9'));
			
			}
			if(admania_get_lveditoption('hdr_lay4lvedlglead9') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay4lvedlglead9'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url35') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url35') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url35')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url35') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url35')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
 else {
			if(admania_get_option('hm_lay4bfftrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay4bfftrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay4bfftrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay4bfftrgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url34') != false) || (admania_get_option('admania_adimgtg_url34') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url34')); ?>">
  <?php if(admania_get_option('admania_adimg_url34') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url34')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
				if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem35">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
		
