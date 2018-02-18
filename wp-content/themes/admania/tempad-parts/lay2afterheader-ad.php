<?php

/**
 * Theme Layout2 After Header Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

 if(!is_404()) {
 
			$admania_lay4rmvcatids2 =  admania_get_option('ad_rmcatlist22');			
			$admania_lay4rmvcatids_extractids2 = explode(',',$admania_lay4rmvcatids2);			
			
			$admania_lay2rmvtagids2 = admania_get_option('ad_rmtaglist22');
			$admania_lay2rmvtagids_extractids2 = explode(',',$admania_lay2rmvtagids2);	
			
			if((!is_category($admania_lay4rmvcatids_extractids2)) && (!is_tag($admania_lay2rmvtagids_extractids2))) {
 
 if(admania_get_option('hdr_adtplay2_act1') != false): ?>

<div class="admanina_lay2afterheader admania_themead">
  <?php
     
	if((admania_get_lveditoption('hdr_lay2lvedlhtmlad3') != false) || (admania_get_lveditoption('hdr_lay2lvedlglead3') != false) || ((admania_get_lveditoption('admania_lvedtimg_url23') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url23') != false))) {
			if(admania_get_lveditoption('hdr_lay2lvedlhtmlad3') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlhtmlad3'));
			
			}
			if(admania_get_lveditoption('hdr_lay2lvedlglead3') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlglead3'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url23') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url23') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url23')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url23') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url23')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			else {
			if(admania_get_option('hdr_lay2htmlcd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay2htmlcd1'));
			
			endif;
			
			if(admania_get_option('hdr_lay2glecd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay2glecd1'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url24') != false) || (admania_get_option('admania_adimgtg_url24') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url24')); ?>">
  <?php if(admania_get_option('admania_adimg_url24') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url24')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif;  
   }
    if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem23">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
	<?php } ?>
</div>
<?php endif;
}
}?>
