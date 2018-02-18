<?php

/**
 * Theme Layout3 After Header Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

 if(!is_404()) {
 
			$admania_lay3rmvcatids2 =  admania_get_option('ad_rmcatGrid27');			
			$admania_lay3rmvcatids_extractids2 = explode(',',$admania_lay3rmvcatids2);			
			
			$admania_lay3rmvtagids2 = admania_get_option('ad_rmtagGrid27');
			$admania_lay3rmvtagids_extractids2 = explode(',',$admania_lay3rmvtagids2);	
			
			if((!is_category($admania_lay3rmvcatids_extractids2)) && (!is_tag($admania_lay3rmvtagids_extractids2))) {
 
 if(admania_get_option('hdr_adtplay3_act1') != false): ?>

<div class="admanina_lay3afterheader admania_themead">
  <?php
     
	if((admania_get_lveditoption('hdr_lay3lvedlhtmlad3') != false) || (admania_get_lveditoption('hdr_lay3lvedlglead3') != false) || ((admania_get_lveditoption('admania_lvedtimg_url28') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url28') != false))) {
			if(admania_get_lveditoption('hdr_lay3lvedlhtmlad3') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay3lvedlhtmlad3'));
			
			}
			if(admania_get_lveditoption('hdr_lay3lvedlglead3') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay3lvedlglead3'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url28') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url28') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url28')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url28') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url28')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			else {
			if(admania_get_option('hdr_lay3htmlcd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay3htmlcd1'));
			
			endif;
			
			if(admania_get_option('hdr_lay3glecd1') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay3glecd1'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url31') != false) || (admania_get_option('admania_adimgtg_url31') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url31')); ?>">
  <?php if(admania_get_option('admania_adimg_url31') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url31')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif;  
   }
    if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem28">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
	<?php } ?>
</div>
<?php endif;
}
}?>
