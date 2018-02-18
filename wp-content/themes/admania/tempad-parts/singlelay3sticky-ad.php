<?php

/**
 * Theme Home Page3 Single Post Content Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
$admania_lay3rmvcatids20 =  admania_get_option('ad_rmcatGrid33');			
$admania_lay3rmvcatids_extractids20 = explode(',',$admania_lay3rmvcatids20);
		
$admania_lay3rmvtagids20 = admania_get_option('ad_rmtagGrid33');
$admania_lay3rmvtagids_extractids20 = explode(',',$admania_lay3rmvtagids20);			
			
if((!is_category($admania_lay3rmvcatids_extractids20)) && (!is_tag($admania_lay3rmvtagids_extractids20))) {
 
  if(admania_get_option('hm_lay3sglstkyad') != false):
  
  ?>
<div class="admania_lay3entrycontentleft">

	<div class="admania_lay3entryleftad admania_themead">
		
    <?php
  
     	if((admania_get_lveditoption('hm_lay3sncnthtmlad') != false) || (admania_get_lveditoption('hm_lay3sngcntgglead') != false) || (admania_get_lveditoption('admania_lvedtimg_url31') != false)) {
			if(admania_get_lveditoption('hm_lay3sncnthtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay3sncnthtmlad'));
			
			}
			if(admania_get_lveditoption('hm_lay3sngcntgglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay3sngcntgglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url31') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url31') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url31')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url31') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url31')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
  else {
 
			if(admania_get_option('hm_lay3slcnthmtlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay3slcnthmtlad'));
			
			endif;
			
			if(admania_get_option('hm_lay3slsntgglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay3slsntgglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url32') != false) || (admania_get_option('admania_adimgtg_url32') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url32')); ?>">
  <?php if(admania_get_option('admania_adimg_url32') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url32')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
	endif; 
	}
			
if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem31">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
</div>
<?php 
 endif;
 }
