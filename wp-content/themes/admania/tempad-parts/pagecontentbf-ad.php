<?php

/**
 * Theme Before Page Content Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
// Page Metabox Variables 
 
global $post;  

$admania_pgepstadenable1 = get_post_meta($post->ID, '_admania_pgepstadenable1', true);
$admania_bfpgepstadhtmlcd1 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd1', true);
$admania_bfpgepstadglecd1 = get_post_meta($post->ID, '_admania_bfpgepstadglecd1', true);
$admania_bfpgepstadimg1 = get_post_meta($post->ID, '_admania_bfpgepstadimg1', true);
$admania_bfpgepstadimglnk1 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk1', true); 
 
// ThemeOptions 
 
$admania_rmvcatids15 =  admania_get_option('ad_rmcatlist16');			
$admania_rmvcatids_extractids15 = explode(',',$admania_rmvcatids15);			
			
$admania_rmvtagids15 = admania_get_option('ad_rmtaglist16');
$admania_rmvtagids_extractids15 = explode(',',$admania_rmvtagids15);			
			
    if((!is_category($admania_rmvcatids_extractids15)) && (!is_tag($admania_rmvtagids_extractids15))) {	
	
	 if(($admania_pgepstadenable1 != false) || (admania_get_option('page_pstbfad') != false)) {
	 
	 ?>

	<div class="admania_singlepostad admania_pagead admania_themead">
	
    <?php
			if((admania_get_lveditoption('hdr_lvedlhtmlad17') != false) || (admania_get_lveditoption('hdr_lvedlglead17') != false) || (admania_get_lveditoption('admania_lvedtimg_url17') != false)) {

			if(admania_get_lveditoption('hdr_lvedlhtmlad17') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad17'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead17') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead17'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url17') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url17') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url17')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url17') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url17')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	
            <?php					
			endif;
        }
		
	else {
	
 if($admania_pgepstadenable1 != false) {
  

			if($admania_bfpgepstadhtmlcd1 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadhtmlcd1);
			
			endif;
			
			if($admania_bfpgepstadglecd1 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadglecd1);
			
			endif;
			
			if(($admania_bfpgepstadimg1 != false) || ($admania_bfpgepstadimglnk1 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpgepstadimglnk1); ?>">
  <?php if($admania_bfpgepstadimg1 != false) { ?>
  <img src="<?php echo esc_url($admania_bfpgepstadimg1); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 

 }
 else {
 if(admania_get_option('page_pstbfad') != false):

			if(admania_get_option('page_pstbfhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pstbfhtmlad'));
			
			endif;
			
			if(admania_get_option('page_pstbfgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pstbfgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url18') != false) || (admania_get_option('admania_adimgtg_url18') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url18')); ?>">
  <?php if(admania_get_option('admania_adimg_url18') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url18')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			
 endif;
 }
}
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem17">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>
</div>
<?php 
}
}	
