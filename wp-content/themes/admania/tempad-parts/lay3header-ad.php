<?php 


/**
 * Theme Home Page3 Header Ad.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 

			
			$admania_lay3rmvcatids =  admania_get_option('ad_rmcatGrid32');			
			$admania_lay3rmvcatids_extractids = explode(',',$admania_lay3rmvcatids);			
			
			$admania_lay3rmvtagids = admania_get_option('ad_rmtagGrid32');
			$admania_lay3rmvtagids_extractids = explode(',',$admania_lay3rmvtagids);
			
				
		
			if(((!is_category($admania_lay3rmvcatids_extractids)) && (!is_tag($admania_lay3rmvtagids_extractids)))) {
					
			
			if(admania_get_option('hdr_adtplay3_act') != false): ?>
			
			<div class="admania_lay3headerright admania_themead">
			
			<?php
			
			if((admania_get_lveditoption('hdr_lay3lvedlhtmlad') != false) || (admania_get_lveditoption('hdr_lay3lvedlglead') != false) || ((admania_get_lveditoption('admania_lvedtimg_url27') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url27') != false))) {
			if(admania_get_lveditoption('hdr_lay3lvedlhtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay3lvedlhtmlad'));
			
			}
			if(admania_get_lveditoption('hdr_lay3lvedlglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay3lvedlglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url27') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url27') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url27')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url27') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url27')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			
			else {

            if(admania_get_option('hdr_lay3htmlcd') != false) {			
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay3htmlcd'));	
			
            }

            if(admania_get_option('hdr_lay3glecd') != false){			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay3glecd'));
			}
			
			
			if((admania_get_option('admania_adimg_url28') != false) || (admania_get_option('admania_adimgtg_url28') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url28')); ?>">
			<?php if(admania_get_option('admania_adimg_url28') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url28')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}									
			
			if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem27">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
			 <?php } ?>
		
			 </div>
			 
			 <?php 
			 endif; 
			 
			 }
			 
			 
			 ?>