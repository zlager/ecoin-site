<?php
/**
 * Theme Page Content Bottom Sticky Ad Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 


// Page Metabox Variables 
 
global $post;  

$admania_pgepstadenable5 = get_post_meta($post->ID, '_admania_pgepstadenable5', true);
$admania_bfpgepstadhtmlcd5 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd5', true);
$admania_bfpgepstadglecd5 = get_post_meta($post->ID, '_admania_bfpgepstadglecd5', true);
$admania_bfpgepstadimg5 = get_post_meta($post->ID, '_admania_bfpgepstadimg5', true);
$admania_bfpgepstadimglnk5 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk5', true); 
 
// ThemeOptions  
 
$admania_rmvcatids19 =  admania_get_option('ad_rmcatlist19');			
$admania_rmvcatids_extractids19 = explode(',',$admania_rmvcatids19);			
$admania_rmvtagids19 = admania_get_option('ad_rmtaglist19');
$admania_rmvtagids_extractids19 = explode(',',$admania_rmvtagids19);			
			
    if((!is_category($admania_rmvcatids_extractids19)) && (!is_tag($admania_rmvtagids_extractids19))) {
		
	if(($admania_pgepstadenable5 != false) || (admania_get_option('page_pststkyad') != false)) {
	
	?>

	<div id="admania_sdfcsad" class="admania_stylishad admania_themead"> 
	<span class="admania_ftrbtmwdgt"><i class="fa fa-close"></i></span>
  
    <?php

		if((admania_get_lveditoption('hdr_lvedlhtmlad21') != false) || (admania_get_lveditoption('hdr_lvedlglead21') != false) || (admania_get_lveditoption('admania_lvedtimg_url21') != false)) {

			if(admania_get_lveditoption('hdr_lvedlhtmlad21') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad21'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead21') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead21'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url21') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url21') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url21')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url21') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url21')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	
            <?php					
			endif;
        }
	else {
	
	if($admania_pgepstadenable5 != false) {

 
 if($admania_bfpgepstadhtmlcd5 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadhtmlcd5);
			
			endif;
			
			if($admania_bfpgepstadglecd5 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadglecd5);
			
			endif;
			
			if(($admania_bfpgepstadimg5 != false) || ($admania_bfpgepstadimglnk5 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpgepstadimglnk5); ?>">
  <?php if($admania_bfpgepstadimg5 != false) { ?>
  <img src="<?php echo esc_url($admania_bfpgepstadimg5); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif; 

	}
	else {
	
	if(admania_get_option('page_pststkyad') != false):
 
 
 if(admania_get_option('page_pststkyhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pststkyhtmlad'));
			
			endif;
			
			if(admania_get_option('page_pststkygglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pststkygglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url22') != false) || (admania_get_option('admania_adimgtg_url22') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url22')); ?>">
  <?php if(admania_get_option('admania_adimg_url22') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url22')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif;  

 endif;
} 
}	
if(current_user_can('administrator')){			
	?>				
<div class="admania_adeditablead1 admania_lvetresitem21">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>
</div>
<?php
}
}	
