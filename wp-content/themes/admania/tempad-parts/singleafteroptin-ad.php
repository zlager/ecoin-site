<?php

/**
 * Theme Single Post After Optin Box Ad Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
//Single Post Metabox Variables 
 
global $post;  
$admania_pstadenable5 = get_post_meta($post->ID, '_admania_pstadenable5', true);
$admania_bfpstadhtmlcd5 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd5', true);
$admania_bfpstadglecd5 = get_post_meta($post->ID, '_admania_bfpstadglecd5', true);
$admania_bfpstadimg5 = get_post_meta($post->ID, '_admania_bfpstadimg5', true);
$admania_bfpstadimglnk5 = get_post_meta($post->ID, '_admania_bfpstadimglnk5', true);

$admania_bfpstadhtmlcd51 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd51', true);
$admania_bfpstadglecd51 = get_post_meta($post->ID, '_admania_bfpstadglecd51', true);
$admania_bfpstadimg51 = get_post_meta($post->ID, '_admania_bfpstadimg51', true);
$admania_bfpstadimglnk51 = get_post_meta($post->ID, '_admania_bfpstadimglnk51', true);

//ThemeOptions Variables   
 
 
$admania_rmvcatids13 =  admania_get_option('ad_rmcatlist14');			
$admania_rmvcatids_extractids13 = explode(',',$admania_rmvcatids13);			
$admania_rmvtagids13 = admania_get_option('ad_rmtaglist14');
$admania_rmvtagids_extractids13 = explode(',',$admania_rmvtagids13);			
			
if((!is_category($admania_rmvcatids_extractids13)) && (!is_tag($admania_rmvtagids_extractids13))) {	

if($admania_pstadenable5 != false) {
?>

<div class="admania_postbottomad">
  
    <?php 
  
   if((admania_get_lveditoption('hdr_lvedlhtmlad14') != false) || (admania_get_lveditoption('hdr_lvedlglead14') != false) || (admania_get_lveditoption('admania_lvedtimg_url14') != false)) {
	
	?>
	
	<div class="admania_postbtminnerad admania_themead">
	
	<?php
			if(admania_get_lveditoption('hdr_lvedlhtmlad14') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad14'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead14') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead14'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url14') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url14') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url14')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url14') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url14')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	

            <?php			
					
			endif;
			
			if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem14">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  	
			</div>
			<?php

        }
  else {
  
  if(($admania_bfpstadhtmlcd5 != false) || ($admania_bfpstadglecd5 != false) || (($admania_bfpstadimg5 != false) || ($admania_bfpstadimglnk5 != false))){
		?>
		<div class="admania_postbtminnerad admania_themead">
		<?php		
		if($admania_bfpstadhtmlcd5 != false):
	
        echo wp_kses_stripslashes($admania_bfpstadhtmlcd5); 
 
			endif;
	
			if($admania_bfpstadglecd5 != false):
			 echo wp_kses_stripslashes($admania_bfpstadglecd5);  
			endif;
			
			if(($admania_bfpstadimg5 != false) || ($admania_bfpstadimglnk5 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpstadimglnk5); ?>">
    <?php if($admania_bfpstadimg5 != false) { ?>
    <img src="<?php echo esc_url($admania_bfpstadimg5); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
    <?php } ?>
    </a> 
	
  <?php  endif; 
  
  	if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem14">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  

  </div> 
  <?php } }
  
 
		
	if((admania_get_lveditoption('hdr_lvedlhtmlad15') != false) || (admania_get_lveditoption('hdr_lvedlglead15') != false) || (admania_get_lveditoption('admania_lvedtimg_url15') != false)) {
	?>
	<div class="admania_postbtminnerad admania_themead">
	<?php
			if(admania_get_lveditoption('hdr_lvedlhtmlad15') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad15'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead15') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead15'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url15') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url15') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url15')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url15') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url15')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	

            <?php			
					
			endif;
			
			if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem15">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  
			</div>
			<?php
        }
		  
       else {
      if(($admania_bfpstadhtmlcd51 != false)||($admania_bfpstadglecd51 != false) || (($admania_bfpstadimg51 != false) || ($admania_bfpstadimglnk51 != false))) {
		?>
		 <div class="admania_postbtminnerad admania_themead">
		<?php
		if($admania_bfpstadhtmlcd51 != false):
		
		echo wp_kses_stripslashes($admania_bfpstadhtmlcd51);  
			endif;
	
			if($admania_bfpstadglecd51 != false):
			 echo wp_kses_stripslashes($admania_bfpstadglecd51);  
			endif;
			
			if(($admania_bfpstadimg51 != false) || ($admania_bfpstadimglnk51 != false) ):
			?>
  <a href="<?php echo esc_url($admania_bfpstadimglnk51); ?>">
    <?php if($admania_bfpstadimg51 != false) { ?>
    <img src="<?php echo esc_url($admania_bfpstadimg51); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
    <?php } ?>
    </a>
  <?php 
			endif;  
			
			if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem15">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  
		
			</div>
			<?php } }	?>
</div>
<?php

}

else {	

	if(admania_get_option('sngle_pstafroptnad') != false){
 
 ?>
<div class="admania_postbottomad">
    <?php 
	  
   if((admania_get_lveditoption('hdr_lvedlhtmlad14') != false) || (admania_get_lveditoption('hdr_lvedlglead14') != false) || (admania_get_lveditoption('admania_lvedtimg_url14') != false)) {
	
	?>
	
	<div class="admania_postbtminnerad admania_themead">
	
	<?php
			if(admania_get_lveditoption('hdr_lvedlhtmlad14') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad14'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead14') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead14'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url14') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url14') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url14')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url14') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url14')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	

            <?php			
					
			endif;
			
			if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem14">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  	
			</div>
			<?php

        }
  else {
    if((admania_get_option('sngle_pstafroptnhtmlad1') != false)||(admania_get_option('sngle_pstafroptngglead1') != false) || ((admania_get_option('admania_adimg_url15') != false) || (admania_get_option('admania_adimgtg_url15') != false))) {
	?>
    <div class="admania_postbtminnerad admania_themead"> 
    <?php
		if(admania_get_option('sngle_pstafroptnhtmlad1') != false):
		
			 echo wp_kses_stripslashes(admania_get_option('sngle_pstafroptnhtmlad1'));  
			endif;
	
			if(admania_get_option('sngle_pstafroptngglead1') != false):
			 echo wp_kses_stripslashes(admania_get_option('sngle_pstafroptngglead1'));  
			endif;
			
			if((admania_get_option('admania_adimg_url15') != false) || (admania_get_option('admania_adimgtg_url15') != false) ):
			?>
  <a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url15')); ?>">
    <?php if(admania_get_option('admania_adimg_url15') != false) { ?>
    <img src="<?php echo esc_url(admania_get_option('admania_adimg_url15')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
    <?php } ?>
    </a> 
  <?php endif; 
  
  	if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem14">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  
  
  </div>
  <?php
  }
  }
 
 if((admania_get_lveditoption('hdr_lvedlhtmlad15') != false) || (admania_get_lveditoption('hdr_lvedlglead15') != false) || (admania_get_lveditoption('admania_lvedtimg_url15') != false)) {
	?>
	<div class="admania_postbtminnerad admania_themead">
	<?php
			if(admania_get_lveditoption('hdr_lvedlhtmlad15') != false):			
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad15'));			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead15') != false):
		

			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead15'));				
			
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url15') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url15') != false) ):
			
			?>
			
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url15')); ?>">
			
			<?php if(admania_get_lveditoption('admania_lvedtimg_url15') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url15')); ?>" alt="<?php esc_html_e('adimage','admania');?>"/>
			<?php } ?>
			
			</a>	

            <?php			
					
			endif;
			
			if(current_user_can('administrator')){			
			?>				
			  <div class="admania_adeditablead1 admania_lvetresitem15">				
				<i class="fa fa-edit"></i>
				<?php esc_html_e('Edit','admania'); ?>
			  </div>			 
			<?php } ?>  
			</div>
			<?php
        }
 else{
 
if((admania_get_option('sngle_pstafroptnhtmlad2') != false) || (admania_get_option('sngle_pstafroptngglead2') != false) || ((admania_get_option('admania_adimg_url16') != false) || (admania_get_option('admania_adimgtg_url16') != false))){
?>
  <div class="admania_postbtminnerad admania_themead"> 
  <?php
		if((admania_get_option('sngle_pstafroptnhtmlad2') != false)):
		 echo wp_kses_stripslashes(admania_get_option('sngle_pstafroptnhtmlad2'));  

			endif;
	
			if(admania_get_option('sngle_pstafroptngglead2') != false):
			 echo wp_kses_stripslashes(admania_get_option('sngle_pstafroptngglead2'));  
			endif;
			
			if((admania_get_option('admania_adimg_url16') != false) || (admania_get_option('admania_adimgtg_url16') != false) ):
			?>
<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url16')); ?>">
    <?php if(admania_get_option('admania_adimg_url16') != false) { ?>
    <img src="<?php echo esc_url(admania_get_option('admania_adimg_url16')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
    <?php } ?>
    </a> 
  <?php 
			endif; 
			
	if(current_user_can('administrator')){			
	?>				
	<div class="admania_adeditablead1 admania_lvetresitem15">				
		<i class="fa fa-edit"></i>
		<?php esc_html_e('Edit','admania'); ?>
	</div>			 
	<?php } ?>  
</div>
<?php
}
}			
?>
</div>
<?php
}
} 
}

