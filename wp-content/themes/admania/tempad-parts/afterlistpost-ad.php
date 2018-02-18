<?php

/**
 * Theme Home Page After list Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay4rmvcatids7 =  admania_get_option('ad_rmcatlist24');			
$admania_lay4rmvcatids_extractids7 = explode(',',$admania_lay4rmvcatids7);
		
$admania_lay2rmvtagids7 = admania_get_option('ad_rmtaglist24');
$admania_lay2rmvtagids_extractids7 = explode(',',$admania_lay2rmvtagids7);			
			
if((!is_category($admania_lay4rmvcatids_extractids7)) && (!is_tag($admania_lay2rmvtagids_extractids7))) {
 
  if(admania_get_option('hm_aftrListad') != false):
  
  ?>

<div class="admania_afterslider admania_afterlistpst admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay2lvedlhtmlad8') != false) || (admania_get_lveditoption('hdr_lay2lvedlglead8') != false) || (admania_get_lveditoption('admania_lvedtimg_url25') != false)) {
			if(admania_get_lveditoption('hdr_lay2lvedlhtmlad8') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlhtmlad8'));
			
			}
			if(admania_get_lveditoption('hdr_lay2lvedlglead8') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlglead8'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url25') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url25') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url25')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url25') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url25')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_aftrListhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_aftrListhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_aftrListgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_aftrListgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url26') != false) || (admania_get_option('admania_adimgtg_url26') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url26')); ?>">
  <?php if(admania_get_option('admania_adimg_url26') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url26')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem25">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
