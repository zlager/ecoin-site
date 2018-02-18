<?php

/**
 * Theme Layout5 After Header Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */


			
			$admania_lay5rmvcatids =  admania_get_option('ad_rmcatGrid40');			
			$admania_lay5rmvcatids_extractids = explode(',',$admania_lay5rmvcatids);			
			
			$admania_lay5rmvtagids = admania_get_option('ad_rmtagGrid40');
			$admania_lay5rmvtagids_extractids = explode(',',$admania_lay5rmvtagids);
			
				
		
			if(((!is_category($admania_lay5rmvcatids_extractids)) && (!is_tag($admania_lay5rmvtagids_extractids)))) {
					
			
			if(admania_get_option('hdr_adtplay5_act') != false): ?>
			
			<div class="admania_headertoplayt5ad admania_themead">
			
			<?php
			
			if((admania_get_lveditoption('hm_lay5sncnthtmlad') != false) || (admania_get_lveditoption('hm_lay5sngcntgglead') != false) || ((admania_get_lveditoption('admania_lvedtimg_url36') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url36') != false))) {
			if(admania_get_lveditoption('hm_lay5sncnthtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay5sncnthtmlad'));
			
			}
			if(admania_get_lveditoption('hm_lay5sngcntgglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay5sngcntgglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url36') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url36') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url36')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url36') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url36')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			
			else {

            if(admania_get_option('hdr_lay5htmlcd') != false) {			
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay5htmlcd'));	
			
            }

            if(admania_get_option('hdr_lay5glecd') != false){			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay5glecd'));
			}
			
			
			if((admania_get_option('admania_adimg_url46') != false) || (admania_get_option('admania_adimgtg_url46') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url46')); ?>">
			<?php if(admania_get_option('admania_adimg_url46') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url46')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}									
			
			if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem36">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
			 <?php } ?>
		
			 </div>
			 
			 <?php 
			 endif; 
			 
			 }