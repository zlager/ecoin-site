<?php

/**
 * Theme Single Post Content Inner Top Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
 
//Single Post Metabox Variables 
 
global $post; 
$admania_pstadenable2 = get_post_meta($post->ID, '_admania_pstadenable2', true);
$admania_bfpstadhtmlcd2 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd2', true);
$admania_bfpstadglecd2 = get_post_meta($post->ID, '_admania_bfpstadglecd2', true);
$admania_bfpstadimg2 = get_post_meta($post->ID, '_admania_bfpstadimg2', true);
$admania_bfpstadimglnk2 = get_post_meta($post->ID, '_admania_bfpstadimglnk2', true);

//ThemeOptions Variables  
 
$admania_rmvcatids10 =  admania_get_option('ad_rmcatlist11');			
$admania_rmvcatids_extractids10 = explode(',',$admania_rmvcatids10);			
			
$admania_rmvtagids10 = admania_get_option('ad_rmtaglist11');
$admania_rmvtagids_extractids10 = explode(',',$admania_rmvtagids10);			
			
if((!is_category($admania_rmvcatids_extractids10)) && (!is_tag($admania_rmvtagids_extractids10))) {
 
if((admania_get_option('sngle_pstinrtpad') != false) || ($admania_pstadenable2 != false)) {
  ?>
<div class="admania_postinnerad1 admania_themead">
  <?php
  
         	if((admania_get_lveditoption('hdr_lvedlhtmlad11') != false) || (admania_get_lveditoption('hdr_lvedlglead11') != false) || (admania_get_lveditoption('admania_lvedtimg_url11') != false)) {
			
			if(admania_get_lveditoption('hdr_lvedlhtmlad11') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad11'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead11') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead11'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url11') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url11') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url11')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url11') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url11')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
  else {
if($admania_pstadenable2 != false) {

 
			if($admania_bfpstadhtmlcd2 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadhtmlcd2);
			
			endif;
			
			if($admania_bfpstadglecd2 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadglecd2);
			
			endif;
			
			if(($admania_bfpstadimg2 != false) || ($admania_bfpstadimglnk2 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpstadimglnk2); ?>">
  <?php if($admania_bfpstadimg2 != false) { ?>
  <img src="<?php echo esc_url($admania_bfpstadimg2); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
		
}
 
 else {
 if(admania_get_option('sngle_pstinrtpad') != false):
  

 
			if(admania_get_option('sngle_pstinrtphtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pstinrtphtmlad'));
			
			endif;
			
			if(admania_get_option('sngle_pstinrtpgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pstinrtpgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url12') != false) || (admania_get_option('admania_adimgtg_url12') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url12')); ?>">
  <?php if(admania_get_option('admania_adimg_url12') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url12')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
  endif; 		
  endif;
 }
}
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem11">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	
</div>
<?php 
 }
 }	
