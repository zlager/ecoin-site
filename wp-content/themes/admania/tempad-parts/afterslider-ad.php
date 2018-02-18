<?php

/**
 * Theme Home Page After Slider Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 

 
 
  if(admania_get_option('hm_aftrsldrad') != false):
  
  ?>

<div class="admania_afterslider admania_themead">
  <?php
  
  
   	if((admania_get_lveditoption('hdr_lvedlhtmlad7') != false) || (admania_get_lveditoption('hdr_lvedlglead7') != false) || (admania_get_lveditoption('admania_lvedtimg_url7') != false)) {
			if(admania_get_lveditoption('hdr_lvedlhtmlad7') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad7'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead7') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead7'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url7') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url7') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url7')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url7') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url7')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 else {
  
 
			if(admania_get_option('hm_aftrsldrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_aftrsldrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_aftrsldrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_aftrsldrgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url7') != false) || (admania_get_option('admania_adimgtg_url7') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url7')); ?>">
  <?php if(admania_get_option('admania_adimg_url7') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url7')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
	endif; 
    }	
			
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem7">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	
			
</div>
<?php 
 endif;

