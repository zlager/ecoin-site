<?php

/**
 * Theme After Header Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

 if(!is_404()) {
 
			$admania_rmvcatids2 =  admania_get_option('ad_rmcatlist3');			
			$admania_rmvcatids_extractids2 = explode(',',$admania_rmvcatids2);			
			
			$admania_rmvtagids2 = admania_get_option('ad_rmtaglist3');
			$admania_rmvtagids_extractids2 = explode(',',$admania_rmvtagids2);
			
			
			$admania_rmvcatids3 =  admania_get_option('ad_rmcatlist4');			
			$admania_rmvcatids_extractids3 = explode(',',$admania_rmvcatids3);			
			
			$admania_rmvtagids3 = admania_get_option('ad_rmtaglist4');
			$admania_rmvtagids_extractids3 = explode(',',$admania_rmvtagids3);			
			
			if((!is_category($admania_rmvcatids_extractids2)) && (!is_tag($admania_rmvtagids_extractids2))) {
 
 if(admania_get_option('hdr_adtplft_act1') != false): ?>

<div class="admanina_afterheaderadleft">
  <?php
     
							if((admania_get_lveditoption('hdr_lvedlhtmlad3') != false) || (admania_get_lveditoption('hdr_lvedlglead3') != false) || ((admania_get_lveditoption('admania_lvedtimg_url3') != false) || (admania_get_lveditoption('admania_lvedtimg_url3') != false))) {
			if(admania_get_lveditoption('hdr_lvedlhtmlad3') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad3'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead3') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead3'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url3') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url3') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url3')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url3') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url3')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			else {
			if(admania_get_option('hdr_adtplfthtmlcd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtplfthtmlcd1'));
			
			endif;
			
			if(admania_get_option('hdr_adtplftglecd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtplftglecd1'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url3') != false) || (admania_get_option('admania_adimgtg_url3') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url3')); ?>">
  <?php if(admania_get_option('admania_adimg_url3') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url3')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif;  
   }
    if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem3">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
	<?php } ?>
</div>
<?php endif;
}

if((!is_category($admania_rmvcatids_extractids3)) && (!is_tag($admania_rmvtagids_extractids3))) {

if(admania_get_option('hdr_adtprgt_act1') != false): ?>
<div class="admanina_afterheaderadright">
  <?php
           	if((admania_get_lveditoption('hdr_lvedlhtmlad4') != false) || (admania_get_lveditoption('hdr_lvedlglead4') != false) || ((admania_get_lveditoption('admania_lvedtimg_url4') != false) || (admania_get_lveditoption('admania_lvedtimg_url4') != false))) {
			if(admania_get_lveditoption('hdr_lvedlhtmlad4') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad4'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead4') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead4'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url4') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url4') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url4')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url4') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url4')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
          
			else {
			if(admania_get_option('hdr_adtprgthtmlcd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtprgthtmlcd1'));
			
			endif;
			
			if(admania_get_option('hdr_adtprgtglecd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtprgtglecd1'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url4') != false) || (admania_get_option('admania_adimgtg_url4') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url4')); ?>">
  <?php if(admania_get_option('admania_adimg_url4') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url4')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			
			}
			
			 if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem4">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
	<?php } ?>

</div>
<?php endif; 
}

}?>
