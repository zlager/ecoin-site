<?php 


/**
 * Theme Home Page2 Top Header Ad.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 

			
			$admania_lay4rmvcatids =  admania_get_option('ad_rmcatlist21');			
			$admania_lay4rmvcatids_extractids = explode(',',$admania_lay4rmvcatids);			
			
			$admania_lay2rmvtagids = admania_get_option('ad_rmtaglist21');
			$admania_lay2rmvtagids_extractids = explode(',',$admania_lay2rmvtagids);
			
				
		
			if(((!is_category($admania_lay4rmvcatids_extractids)) && (!is_tag($admania_lay2rmvtagids_extractids)))) {
					
			
			if(admania_get_option('hdr_adtplay2_act') != false): ?>
			
			<div class="admania_lay2headertopad admania_themead">
			
			<?php
			
			if((admania_get_lveditoption('hdr_lay2lvedlhtmlad') != false) || (admania_get_lveditoption('hdr_lay2lvedlglead') != false) || ((admania_get_lveditoption('admania_lvedtimg_url22') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url22') != false))) {
			if(admania_get_lveditoption('hdr_lay2lvedlhtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlhtmlad'));
			
			}
			if(admania_get_lveditoption('hdr_lay2lvedlglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay2lvedlglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url22') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url22') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url22')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url22') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url22')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			
			else {

            if(admania_get_option('hdr_lay2htmlcd') != false) {			
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay2htmlcd'));	
			
            }

            if(admania_get_option('hdr_lay2glecd') != false){			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay2glecd'));
			}
			
			
			if((admania_get_option('admania_adimg_url23') != false) || (admania_get_option('admania_adimgtg_url23') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url23')); ?>">
			<?php if(admania_get_option('admania_adimg_url23') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url23')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}									
			
			if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem22">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
			 <?php } ?>
		
			 </div>
			 
			 <?php 
			 endif; 
			 
			 }
			 
			 
			 ?>