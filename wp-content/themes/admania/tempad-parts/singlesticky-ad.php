<?php
/**
 * Theme Single Post Bottom Sticky Ad Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
 
//Single Post Metabox Variables 
 
global $post;  
$admania_pstadenable6 = get_post_meta($post->ID, '_admania_pstadenable6', true);
$admania_bfpstadhtmlcd6 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd6', true);
$admania_bfpstadglecd6 = get_post_meta($post->ID, '_admania_bfpstadglecd6', true);
$admania_bfpstadimg6 = get_post_meta($post->ID, '_admania_bfpstadimg6', true);
$admania_bfpstadimglnk6 = get_post_meta($post->ID, '_admania_bfpstadimglnk6', true);

//ThemeOptions Variables   
 
 
$admania_rmvcatids14 =  admania_get_option('ad_rmcatlist15');			
$admania_rmvcatids_extractids14 = explode(',',$admania_rmvcatids14);			
			
$admania_rmvtagids14 = admania_get_option('ad_rmtaglist15');
$admania_rmvtagids_extractids14 = explode(',',$admania_rmvtagids14);			
			
    if((!is_category($admania_rmvcatids_extractids14)) && (!is_tag($admania_rmvtagids_extractids14))) {	
	
	if(($admania_pstadenable6 != false) || (admania_get_option('sngle_pststkyad') != false) || ((admania_get_lveditoption('hdr_lvedlhtmlad16') != false) || (admania_get_lveditoption('hdr_lvedlglead16') != false) || (admania_get_lveditoption('admania_lvedtimg_url16') != false))) {	
	
	?>
	
	<div id="admania_sdfcsad" class="admania_stylishad admania_themead"> 
	
	<span class="admania_ftrbtmwdgt"><i class="fa fa-close"></i></span>
    
	<?php
			 
	if((admania_get_lveditoption('hdr_lvedlhtmlad16') != false) || (admania_get_lveditoption('hdr_lvedlglead16') != false) || (admania_get_lveditoption('admania_lvedtimg_url16') != false)) {

			if(admania_get_lveditoption('hdr_lvedlhtmlad16') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad16'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead16') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead16'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url16') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url16') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url16')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url16') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url16')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	
            <?php					
			endif;
        }
	else {
	if($admania_pstadenable6 != false) {
 
 if($admania_bfpstadhtmlcd6 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadhtmlcd6);
			
			endif;
			
			if($admania_bfpstadglecd6 != false):
			
			echo wp_kses_stripslashes($admania_bfpstadglecd6);
			
			endif;
			
			if(($admania_bfpstadimg6 != false) || ($admania_bfpstadimglnk6 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpstadimglnk6); ?>">
  <?php if($admania_bfpstadimg6 != false) { ?>
  <img src="<?php echo esc_url($admania_bfpstadimg6); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif;  

	}
	else {
	
	if(admania_get_option('sngle_pststkyad') != false):

 
 if(admania_get_option('sngle_pststkyhtmlad') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pststkyhtmlad'));
			
			endif;
			
			if(admania_get_option('sngle_pststkygglead') != false):
			
			echo wp_kses_stripslashes(admania_get_option('sngle_pststkygglead'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url17') != false) || (admania_get_option('admania_adimgtg_url17') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url17')); ?>">
  <?php if(admania_get_option('admania_adimg_url17') != false) { ?>
  <img src="<?php echo esc_url(admania_get_option('admania_adimg_url17')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
  <?php } ?>
  </a>
  <?php endif;  

 endif;		
 } 
 }
 
if(current_user_can('administrator')){			
	?>				
	<div class="admania_adeditablead1 admania_lvetresitem16">				
		<i class="fa fa-edit"></i>
		<?php esc_html_e('Edit','admania'); ?>
	</div>			 
<?php } ?>
</div>
<?php 
 }
 }
