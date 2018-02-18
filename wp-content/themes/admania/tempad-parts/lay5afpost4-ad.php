<?php

/**
 * Theme Home Page5 Grid Post Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay5rmvcatids13 =  admania_get_option('ad_rmcatGrid45');			
$admania_lay5rmvcatids_extractids13 = explode(',',$admania_lay5rmvcatids13);
		
$admania_lay5rmvtagids13 = admania_get_option('ad_rmtagGrid45');
$admania_lay5rmvtagids_extractids13 = explode(',',$admania_lay5rmvtagids13);			
			
if((!is_category($admania_lay5rmvcatids_extractids13)) && (!is_tag($admania_lay5rmvtagids_extractids13))) {
 
  if(admania_get_option('hm_lay5_gridad4') != false):
  
  ?>

<div class="admania_layout5gridpst admania_layout5gridpstbdr admania_themead">
  <?php
  
     	if((admania_get_lveditoption('hdr_lay5lvedlhtmlad13') != false) || (admania_get_lveditoption('hdr_lay5lvedlglead13') != false) || (admania_get_lveditoption('admania_lvedtimg_url41') != false)) {
			if(admania_get_lveditoption('hdr_lay5lvedlhtmlad13') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlhtmlad13'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglead13') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglead13'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url41') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url41') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url41')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url41') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url41')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_lay5gridhtmlad4') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5gridhtmlad4'));
			
			endif;
			
			if(admania_get_option('hm_lay5gridgglead4') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5gridgglead4'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url45') != false) || (admania_get_option('admania_adimgtg_url45') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url45')); ?>">
  <?php if(admania_get_option('admania_adimg_url45') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url45')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
			
	if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem41">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
