<?php
/**
 * Theme Right Sidebar Ad Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 $admania_rmvcatids5 =  admania_get_option('ad_rmcatlist6');			
$admania_rmvcatids_extractids5 = explode(',',$admania_rmvcatids5);			
			
$admania_rmvtagids5 = admania_get_option('ad_rmtaglist6');
$admania_rmvtagids_extractids5 = explode(',',$admania_rmvtagids5);			
			
if((!is_category($admania_rmvcatids_extractids5)) && (!is_tag($admania_rmvtagids_extractids5))) {
 
 if(admania_get_option('hdr_adtprgt_act2') != false):
      ?>
			<div class="admania_themead">
			<?php
 	if((admania_get_lveditoption('hdr_lvedlhtmlad6') != false) || (admania_get_lveditoption('hdr_lvedlglead6') != false) || (admania_get_lveditoption('admania_lvedtimg_url6') != false)) {
			
			if(admania_get_lveditoption('hdr_lvedlhtmlad6') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad6'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead6') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead6'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url6') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url6') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url6')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url6') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url6')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 else {
 
			if(admania_get_option('hdr_adtprgthtmlcd2') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtprgthtmlcd2'));
			
			endif;
			
			if(admania_get_option('hdr_adtprgtglecd2') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtprgtglecd2'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url6') != false) || (admania_get_option('admania_adimgtg_url6') != false) ):
			?>

<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url6')); ?>">
<?php if(admania_get_option('admania_adimg_url6') != false) { ?>
<img src="<?php echo esc_url(admania_get_option('admania_adimg_url6')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
<?php } ?>
</a>
<?php			
 endif; 
 }
 if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem6">				
	<i class="fa fa-edit"></i>
		 <?php esc_html_e('Edit','admania'); ?>
</div>	
			 
<?php } ?>
</div>
<?php	 
 endif;
 }
