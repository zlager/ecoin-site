<?php

/**
 * Theme Layout5 Home / Archives Before Content Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
   $admania_layt5arcrmvcatids14 =  admania_get_option('ad_rmcatGrid46');			
$admania_layt5rmvcatids_extractids14 = explode(',',$admania_layt5arcrmvcatids14);			
			
$admania_rmvarchtagids14 = admania_get_option('ad_rmtagGrid46');
$admania_rmvtagids_extractids14 = explode(',',$admania_rmvarchtagids14);			
			
if((!is_category($admania_layt5rmvcatids_extractids14)) && (!is_tag($admania_rmvtagids_extractids14))) {

if(admania_get_option('hm_lay5archad') != false):
  
?>

<div class="admania_afterslider admania_themead admania_layt5archivetopad">
  <?php
       	if((admania_get_lveditoption('hdr_lay5lvehtmladarc') != false) || (admania_get_lveditoption('hdr_lay5lvedlglearcad') != false) || (admania_get_lveditoption('admania_lvedtimg_url43') != false)) {
			
			if(admania_get_lveditoption('hdr_lay5lvehtmladarc') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvehtmladarc'));
			
			}
			if(admania_get_lveditoption('hdr_lay5lvedlglearcad') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lay5lvedlglearcad'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url43') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url43') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url43')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url43') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url43')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
 
 else {
			if(admania_get_option('hm_lay5archbfcnhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5archbfcnhtmlad'));
			
			endif;
			
			if(admania_get_option('hm_lay5bfarchcngglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hm_lay5bfarchcngglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url43') != false) || (admania_get_option('admania_adimgtg_url43') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url43')); ?>">
  <?php if(admania_get_option('admania_adimg_url43') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url43')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php
			
			endif; 
			}
				if(current_user_can('administrator')){			
?>				
<div class="admania_adeditablead1 admania_lvetresitem43">				
	<i class="fa fa-edit"></i>
	<?php esc_html_e('Edit','admania'); ?>
</div>			 
<?php } ?>	

</div>
<?php 
 endif;
 }
		
