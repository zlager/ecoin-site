<?php

/**
 * Theme Home Page3 Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay3rmvcatids7 =  admania_get_option('ad_rmcatGrid29');			
$admania_lay3rmvcatids_extractids7 = explode(',',$admania_lay3rmvcatids7);
		
$admania_lay3rmvtagids7 = admania_get_option('ad_rmtagGrid29');
$admania_lay3rmvtagids_extractids7 = explode(',',$admania_lay3rmvtagids7);			
			
if((!is_category($admania_lay3rmvcatids_extractids7)) && (!is_tag($admania_lay3rmvtagids_extractids7))) {
 
  if(admania_get_option('hm_lay3_grid') != false):
  
  ?>

<div class="admania_gridpstlayt3  admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay3lvedlhtmlad8') != false) || (admania_get_lveditoption('hdr_lay3lvedlglead8') != false) || (admania_get_lveditoption('admania_lvedtimg_url29') != false)) {
			if(admania_get_lveditoption('hdr_lay3lvedlhtmlad8') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay3lvedlhtmlad8'));
			
			}
			if(admania_get_lveditoption('hdr_lay3lvedlglead8') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay3lvedlglead8'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url29') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url29') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url29')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url29') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url29')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_lay3gridhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay3gridhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay3gridgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay3gridgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url29') != false) || (admania_get_option('admania_adimgtg_url29') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url29')); ?>">
  <?php if(admania_get_option('admania_adimg_url29') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url29')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem29">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
