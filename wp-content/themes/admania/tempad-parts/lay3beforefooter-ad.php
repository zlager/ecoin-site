<?php

/**
 * Theme Layout3 Home / Archives Before Footer Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay3rmvcatids8 =  admania_get_option('ad_rmcatGrid30');			
$admania_lay3rmvcatids_extractids8 = explode(',',$admania_lay3rmvcatids8);			
			
$admania_lay3rmvtagids8 = admania_get_option('ad_rmtagGrid30');
$admania_lay3rmvtagids_extractids8 = explode(',',$admania_lay3rmvtagids8);			
			
if((!is_category($admania_lay3rmvcatids_extractids8)) && (!is_tag($admania_lay3rmvtagids_extractids8))) {

if(admania_get_option('hm_lay3bfftrad') != false):
  
?>

<div class="admania_lay3beforeftr admania_themead admania_sitefooterinner">
  <?php
       	if((admania_get_lveditoption('hm_lay3bfftrhtmlad') != false) || (admania_get_lveditoption('hm_lay3bfftrgglead') != false) || (admania_get_lveditoption('admania_lvedtimg_url30') != false)) {
			
			if(admania_get_lveditoption('hm_lay3bfftrhtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay3bfftrhtmlad'));
			
			}
			if(admania_get_lveditoption('hm_lay3bfftrgglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay3bfftrgglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url30') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url30') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url30')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url30') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url30')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
 else {
			if(admania_get_option('hm_lay3bfftrhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay3bfftrhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay3bfftrgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay3bfftrgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url30') != false) || (admania_get_option('admania_adimgtg_url30') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url30')); ?>">
  <?php if(admania_get_option('admania_adimg_url30') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url30')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
				if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem30">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
		
