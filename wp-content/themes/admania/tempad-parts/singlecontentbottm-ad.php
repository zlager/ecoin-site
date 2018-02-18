<?php

/**
 * Theme Single Content Section Bottom Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
 
 
//Single Post Metabox Variables 
 
global $post;  
$admania_pstadenable4 = get_post_meta($post->ID, '_admania_pstadenable4', true);
$admania_bfpstadhtmlcd4 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd4', true);
$admania_bfpstadglecd4 = get_post_meta($post->ID, '_admania_bfpstadglecd4', true);
$admania_bfpstadimg4 = get_post_meta($post->ID, '_admania_bfpstadimg4', true);
$admania_bfpstadimglnk4 = get_post_meta($post->ID, '_admania_bfpstadimglnk4', true);

//ThemeOptions Variables  
 
$admania_rmvcatids12 =  admania_get_option('ad_rmcatlist13');			
$admania_rmvcatids_extractids12 = explode(',',$admania_rmvcatids12);			
			
$admania_rmvtagids12 = admania_get_option('ad_rmtaglist13');
$admania_rmvtagids_extractids12 = explode(',',$admania_rmvtagids12);			
			
if((!is_category($admania_rmvcatids_extractids12)) && (!is_tag($admania_rmvtagids_extractids12))) {	

if(($admania_pstadenable4 != false) || (admania_get_option('sngle_pstcntbtmad') != false)) {
  
       ?>
       <div class="admania_singlepostbtmad admania_themead">
      <?php

  	    if((admania_get_lveditoption('hdr_lvedlhtmlad13') != false) || (admania_get_lveditoption('hdr_lvedlglead13') != false) || (admania_get_lveditoption('admania_lvedtimg_url13') != false)) {
	
			if(admania_get_lveditoption('hdr_lvedlhtmlad13') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad13'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead13') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead13'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url13') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url13') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url13')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url13') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url13')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	

            <?php			
					
			endif;

        }			

		else {

	if($admania_pstadenable4 != false) {

 
			if($admania_bfpstadhtmlcd4 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadhtmlcd4);
			
			endif;
			
			if($admania_bfpstadglecd4 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadglecd4);
			
			endif;
			
			if(($admania_bfpstadimg4 != false) || ($admania_bfpstadimglnk4 != false) ):
			?>
			<a href="<?php echo esc_url($admania_bfpstadimglnk4); ?>">
			<?php if($admania_bfpstadimg4 != false) { ?>
			 <img src="<?php echo esc_url($admania_bfpstadimg4); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			endif; 
			
}

else {	

 if(admania_get_option('sngle_pstcntbtmad') != false):
 

 
 if(admania_get_option('sngle_pstcnthtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pstcnthtmlad'));
			
			endif;
			
			if(admania_get_option('sngle_pstcntgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pstcntgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url14') != false) || (admania_get_option('admania_adimgtg_url14') != false) ):
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url14')); ?>">
			<?php if(admania_get_option('admania_adimg_url14') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url14')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
		   <?php endif;  

 endif;			
}
}
if(current_user_can('administrator')){			
  ?>				
  <div class="admania_adeditablead1 admania_lvetresitem13">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
  </div>			 
  <?php }  ?>
</div>
 <?php 
}			
}			
			
			
			
			
			
			
			
