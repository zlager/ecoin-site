<?php

/**
 * Theme Home Page After Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_rmvcatids7 =  admania_get_option('ad_rmcatlist8');			
$admania_rmvcatids_extractids7 = explode(',',$admania_rmvcatids7);			
			
$admania_rmvtagids7 = admania_get_option('ad_rmtaglist8');
$admania_rmvtagids_extractids7 = explode(',',$admania_rmvtagids7);			
			
if((!is_category($admania_rmvcatids_extractids7)) && (!is_tag($admania_rmvtagids_extractids7))) {
 
  if(admania_get_option('hm_aftrgridad') != false):
  
  ?>

<div class="admania_afterslider admania_aftergridpst admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lvedlhtmlad8') != false) || (admania_get_lveditoption('hdr_lvedlglead8') != false) || (admania_get_lveditoption('admania_lvedtimg_url8') != false)) {
			if(admania_get_lveditoption('hdr_lvedlhtmlad8') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad8'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead8') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead8'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url8') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url8') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url8')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url8') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url8')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_aftrgridhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_aftrgridhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_aftrgridgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_aftrgridgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url8') != false) || (admania_get_option('admania_adimgtg_url8') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url8')); ?>">
  <?php if(admania_get_option('admania_adimg_url8') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url8')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem8">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
