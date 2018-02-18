<?php

/**
 * Theme Page Content Section Bottom Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
// Page Metabox Variables 
 
global $post;  

$admania_pgepstadenable4 = get_post_meta($post->ID, '_admania_pgepstadenable4', true);
$admania_bfpgepstadhtmlcd4 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd4', true);
$admania_bfpgepstadglecd4 = get_post_meta($post->ID, '_admania_bfpgepstadglecd4', true);
$admania_bfpgepstadimg4 = get_post_meta($post->ID, '_admania_bfpgepstadimg4', true);
$admania_bfpgepstadimglnk4 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk4', true); 
 
// ThemeOptions  
 
$admania_rmvcatids18 =  admania_get_option('ad_rmcatlist20');			
$admania_rmvcatids_extractids18 = explode(',',$admania_rmvcatids18);			
$admania_rmvtagids18 = admania_get_option('ad_rmtaglist20');
$admania_rmvtagids_extractids18 = explode(',',$admania_rmvtagids18);			
			
    if((!is_category($admania_rmvcatids_extractids18)) && (!is_tag($admania_rmvtagids_extractids18))) {
	
	if(($admania_pgepstadenable4 != false) || (admania_get_option('page_pstcntbtmad') != false)) {
	
	?>
 
	<div class="admania_singlepostbtmad admania_themead">
 
	<?php
	
		if((admania_get_lveditoption('hdr_lvedlhtmlad20') != false) || (admania_get_lveditoption('hdr_lvedlglead20') != false) || (admania_get_lveditoption('admania_lvedtimg_url20') != false)) {

			if(admania_get_lveditoption('hdr_lvedlhtmlad20') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad20'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead20') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead20'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url20') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url20') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url20')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url20') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url20')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	
            <?php					
			endif;
        }
	
	else {
	
	if($admania_pgepstadenable4 != false) {
	
 
 if($admania_bfpgepstadhtmlcd4 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadhtmlcd4);
			
			endif;
			
			if($admania_bfpgepstadglecd4 != false):
			
			echo wp_kses_stripslashes($admania_bfpgepstadglecd4);
			
			endif;
			
			if(($admania_bfpgepstadimg4 != false) || ($admania_bfpgepstadimglnk4 != false)):
			?>
			<a href="<?php echo esc_url($admania_bfpgepstadimglnk4); ?>">
			<?php if($admania_bfpgepstadimg4 != false) { ?>
			 <img src="<?php echo esc_url($admania_bfpgepstadimg4); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
		   <?php endif;   
 
	}
	
	else {	
	
 if(admania_get_option('page_pstcntbtmad') != false): 
 
 if(admania_get_option('page_pstcnthtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pstcnthtmlad'));
			
			endif;
			
			if(admania_get_option('page_pstcntgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('page_pstcntgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url21') != false) || (admania_get_option('admania_adimgtg_url21') != false) ):
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url21')); ?>">
			<?php if(admania_get_option('admania_adimg_url21') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url21')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
		   <?php endif;  
 

 endif;	
} 
}
	if(current_user_can('administrator')){			
	?>				
	<div class="admania_adeditablead1 admania_lvetresitem20">				
		<i class="fa fa-edit"></i>
		<?php esc_html_e('Edit','admania'); ?>
	</div>			 
   <?php } ?>
	</div>
	<?php
	}
}			
			
			
			
			
			
			
			
			
