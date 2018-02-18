<?php

/**
 * Theme Single Post Content Inner Top Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
// Page Metabox Variables 
 
global $post;  

$admania_pgepstadenable2 = get_post_meta($post->ID, '_admania_pgepstadenable2', true);
$admania_bfpgepstadhtmlcd2 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd2', true);
$admania_bfpgepstadglecd2 = get_post_meta($post->ID, '_admania_bfpgepstadglecd2', true);
$admania_bfpgepstadimg2 = get_post_meta($post->ID, '_admania_bfpgepstadimg2', true);
$admania_bfpgepstadimglnk2 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk2', true); 
 
// ThemeOptions  
 
$admania_rmvcatids16 =  admania_get_option('ad_rmcatlist17');			
$admania_rmvcatids_extractids16 = explode(',',$admania_rmvcatids16);
$admania_rmvtagids16 = admania_get_option('ad_rmtaglist17');
$admania_rmvtagids_extractids16 = explode(',',$admania_rmvtagids16);			
			
    if((!is_category($admania_rmvcatids_extractids16)) && (!is_tag($admania_rmvtagids_extractids16))) {	
	
	if((admania_get_option('page_pstinrtpad') != false) || ($admania_pgepstadenable2 != false)) {
	?>
    <div class="admania_pageinnertopad1 admania_themead">
    <?php
		if((admania_get_lveditoption('hdr_lvedlhtmlad18') != false) || (admania_get_lveditoption('hdr_lvedlglead18') != false) || (admania_get_lveditoption('admania_lvedtimg_url18') != false)) {

			if(admania_get_lveditoption('hdr_lvedlhtmlad18') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad18'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead18') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead18'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url18') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url18') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url18')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url18') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url18')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	
            <?php					
			endif;
        }
	
	else {
 if($admania_pgepstadenable2 != false) {

 
			if($admania_bfpgepstadhtmlcd2 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadhtmlcd2);
			
			endif;
			
			if($admania_bfpgepstadglecd2 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadglecd2);
			
			endif;
			
			if(($admania_bfpgepstadimg2 != false) || ($admania_bfpgepstadimglnk2 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpgepstadimglnk2); ?>">
  <?php if($admania_bfpgepstadimg2 != false) { ?>
  <img src="<?php echo esc_url($admania_bfpgepstadimg2); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
  endif; 

 }
 else {
 
 if(admania_get_option('page_pstinrtpad') != false):
  

 
			if(admania_get_option('page_pstinrtphtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pstinrtphtmlad'));
			
			endif;
			
			if(admania_get_option('page_pstinrtpgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pstinrtpgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url19') != false) || (admania_get_option('admania_adimgtg_url19') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url19')); ?>">
  <?php if(admania_get_option('admania_adimg_url19') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url19')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			?>

<?php 
 endif;
 }
	}
	
	if(current_user_can('administrator')){			
	?>				
	<div class="admania_adeditablead1 admania_lvetresitem18">				
		<i class="fa fa-edit"></i>
		<?php esc_html_e('Edit','admania'); ?>
	</div>			 
   <?php } ?>
	</div>
	<?php
	}
	
}	
