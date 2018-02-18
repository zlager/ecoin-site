<?php

/**
 * Theme Single Post Before Content Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
//Single Post Metabox Variables 
 
global $post; 
$admania_pstadenable1 = get_post_meta($post->ID, '_admania_pstadenable1', true);
$admania_bfpstadhtmlcd1 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd1', true);
$admania_bfpstadglecd1 = get_post_meta($post->ID, '_admania_bfpstadglecd1', true);
$admania_bfpstadimg1 = get_post_meta($post->ID, '_admania_bfpstadimg1', true);
$admania_bfpstadimglnk1 = get_post_meta($post->ID, '_admania_bfpstadimglnk1', true);

//ThemeOptions Variables 
 
$admania_rmvcatids9 =  admania_get_option('ad_rmcatlist10');			
$admania_rmvcatids_extractids9 = explode(',',$admania_rmvcatids9);			
			
$admania_rmvtagids9 = admania_get_option('ad_rmtaglist10');
$admania_rmvtagids_extractids9 = explode(',',$admania_rmvtagids9);			
			
if((!is_category($admania_rmvcatids_extractids9)) && (!is_tag($admania_rmvtagids_extractids9))) {

if(($admania_pstadenable1 != false) || (admania_get_option('sngle_pstbfad') != false)) {
?>
<div class="admania_singlepostad admania_themead">
<?php
       	if((admania_get_lveditoption('hdr_lvedlhtmlad10') != false) || (admania_get_lveditoption('hdr_lvedlglead10') != false) || (admania_get_lveditoption('admania_lvedtimg_url10') != false)) {
			
			if(admania_get_lveditoption('hdr_lvedlhtmlad10') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad10'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead10') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead10'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url10') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url10') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url10')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url10') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url10')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
else {

if($admania_pstadenable1 != false) {

 
			if($admania_bfpstadhtmlcd1 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadhtmlcd1);
			
			endif;
			
			if($admania_bfpstadglecd1 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadglecd1);
			
			endif;
			
			if(($admania_bfpstadimg1 != false) || ($admania_bfpstadimglnk1 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpstadimglnk1); ?>">
  <?php if($admania_bfpstadimg1 != false) { ?>
  <img src="<?php echo esc_url($admania_bfpstadimg1); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			
}
else {

 if((admania_get_option('sngle_pstbfad') != false)):
  

 
			if(admania_get_option('sngle_pstbfhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pstbfhtmlad'));
			
			endif;
			
			if(admania_get_option('sngle_pstbfgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pstbfgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url11') != false) || (admania_get_option('admania_adimgtg_url11') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url11')); ?>">
  <?php if(admania_get_option('admania_adimg_url11') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url11')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php			
  endif; 			
  endif;
  }
  }
  if(current_user_can('administrator')){			
  ?>				
  <div class="admania_adeditablead1 admania_lvetresitem10">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
  </div>			 
  <?php }  ?>
  </div>
  <?php
	}
	}
