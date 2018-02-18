<?php

/**
 * Theme layout1 header content.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 

         
?>
<div class="admania_headertopalt">
	<div class="admania_headerinner">
		<?php if(has_nav_menu('admania-secondary-menu')): ?>
		<div class="admania_headertopleftalt">		
		<nav class="admania_secondarymenu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu(array( 'menu' => 'admania-secondary-menu', 'theme_location' => 'admania-secondary-menu' ) );  ?>
	    </nav>	
		</div>
		<?php endif; ?>
		<div class="admania_headertoprightalt">
		<div class="admania_headertopsocial">
		<ul>
		<?php
		if(admania_get_option('admania_hdfacebook') != false){
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdfacebook')); ?>" class="admania_socialiconfb" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<?php } 
        if(admania_get_option('admania_hdtwitter') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdtwitter')); ?>" class="admania_socialicontwt" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<?php } 
		if(admania_get_option('admania_hdgoogleplus') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdgoogleplus')); ?>" class="admania_socialicongle" target="_blank"><i class="fa fa-google-plus"></i></a></li>
		<?php
		} 
		if(admania_get_option('admania_hdlinkedin') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdlinkedin')); ?>" class="admania_socialiconlnk" target="_blank"><i class="fa fa-linkedin"></i></a></li>
		<?php
		} 
		if(admania_get_option('admania_hdyoutube') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdyoutube')); ?>" class="admania_socialiconyt" target="_blank"><i class="fa fa-youtube"></i></a></li>
		<?php
		} 
		if(admania_get_option('admania_hdinstagram') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdinstagram')); ?>" class="admania_socialiconins" target="_blank"><i class="fa fa-instagram"></i></a></li>
		<?php
		} 
		if(admania_get_option('admania_hdpinterest') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdpinterest')); ?>" class="admania_socialiconpin" target="_blank"><i class="fa fa-pinterest"></i></a></li>
		<?php
		} 
		if(admania_get_option('admania_hdrss') != false) {
		?>
		<li><a href="<?php echo esc_url(admania_get_option('admania_hdrss')); ?>" class="admania_socialiconrss" target="_blank"><i class="fa fa-rss"></i></a></li>
		<?php
		} 		
		?>
		</ul>
		</div>
		</div>
		</div>
		</div>
		<div class="admania_headertop">
			<div class="admania_headerinner">			
			<?php 
			
			$admania_rmvcatids =  admania_get_option('ad_rmcatlist1');			
			$admania_rmvcatids_extractids = explode(',',$admania_rmvcatids);			
			
			$admania_rmvtagids = admania_get_option('ad_rmtaglist1');
			$admania_rmvtagids_extractids = explode(',',$admania_rmvtagids);
			
			if((!is_category($admania_rmvcatids_extractids)) && (!is_tag($admania_rmvtagids_extractids))) {
			
			if(admania_get_option('hdr_adtplft_act') != false): ?>
			
			<div class="admania_headertopleft">
			
			<?php
			
			if((admania_get_lveditoption('hdr_lvedlhtmlad') != false) || (admania_get_lveditoption('hdr_lvedlglead') != false) || ((admania_get_lveditoption('admania_lvedtimg_url1') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url1') != false))) {
			if(admania_get_lveditoption('hdr_lvedlhtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url1') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url1') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url1')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url1') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url1')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			
			else {

            if(admania_get_option('hdr_adtplfthtmlcd') != false) {			
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtplfthtmlcd'));	
			
            }

            if(admania_get_option('hdr_adtplftglecd') != false){			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtplftglecd'));
			}
			
			
			if((admania_get_option('admania_adimg_url1') != false) || (admania_get_option('admania_adimgtg_url1') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url1')); ?>">
			<?php if(admania_get_option('admania_adimg_url1') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url1')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}									
			
			if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem1">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
			 <?php } ?>
		
			 </div>
			 
			 <?php 
			 endif; 
			 
			 }
			 ?>
		<div class="admania_headertopmiddle">
			     <?php if(admania_get_option('admania_custom_logo_activestatus') != false) { 				
				    if(is_home()): ?>
					<h1 class="admania_sitetitle" itemprop="headline">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>">
					<img src="<?php echo esc_url(admania_get_option('admania_custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/>
					</a>
					</h1>
					<?php else: ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>" class="admania_fontstlye">
					<img src=" <?php echo esc_url(admania_get_option('admania_custom_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" itemprop="image"/>
					</a>
					<?php 
					
					endif;				
					}
				    elseif (is_home()) { ?>
					<h1 class="admania_sitetitle admania_restitle1" itemprop="headline">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo( 'name' ); ?>">
					<?php bloginfo( 'name' ); ?>
					</a>									
					</h1> 
                   <p><?php bloginfo( 'description' );  ?></p>						
					<?php } 				
					else { ?>
					<div class="admania_sitetitle admania_restitle" itemprop="headline"> 
					<a href="<?php echo esc_url(home_url('/'));  ?>" title="<?php bloginfo( 'name' ); ?>" class="admania_fontstlye">
					<?php bloginfo( 'name' ); ?>
					</a>  
					<p><?php bloginfo( 'description' );  ?></p>						
					</div>
					<?php }	?>
			 </div>
			 
			 <?php 
			 
			$admania_rmvcatids1 =  admania_get_option('ad_rmcatlist2');			
			$admania_rmvcatids_extractids1 = explode(',',$admania_rmvcatids1);			
			
			$admania_rmvtagids1 = admania_get_option('ad_rmtaglist2');
			$admania_rmvtagids_extractids1 = explode(',',$admania_rmvtagids1);
			
			if((!is_category($admania_rmvcatids_extractids1)) && (!is_tag($admania_rmvtagids_extractids1))) {
			 
			 
			 if(admania_get_option('hdr_adtprgt_act') != false): ?>
			 			 
			 <div class="admania_headertopright">
			 
			 		<?php
					
							if((admania_get_lveditoption('hdr_lvedlhtmlad1') != false) || (admania_get_lveditoption('hdr_lvedlglead1') != false) || ((admania_get_lveditoption('admania_lvedtimg_url2') != false) || (admania_get_lveditoption('admania_lvedtimg_url2') != false))) {
			if(admania_get_lveditoption('hdr_lvedlhtmlad1') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlhtmlad1'));
			
			}
			if(admania_get_lveditoption('hdr_lvedlglead1') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hdr_lvedlglead1'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url2') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url2') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url2')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url2') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url2')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
					
					else {
			
			if(admania_get_option('hdr_adtprgthtmlcd') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtprgthtmlcd'));
			
			endif;
			
			if(admania_get_option('hdr_adtprgtglecd') != false):
			
			echo wp_kses_stripslashes(admania_get_option('hdr_adtprgtglecd'));
			
			endif;
			
			if((admania_get_option('admania_adimg_url2') != false) || (admania_get_option('admania_adimgtg_url2') != false) ):
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url2')); ?>">
			<?php if(admania_get_option('admania_adimg_url2') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url2')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			endif; 	
}			
	
	        if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem2">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
			 <?php } ?>
			 
			 </div>
			 
			 <?php
			 endif; 			 
			 }
			 ?>
			 
			</div>
		</div>
		<div class="admania_headerbottom">
			<div class="admania_headerinner admania_headerinneralt">
			<?php if(has_nav_menu('admania-primary-menu')): ?>
			 <nav class="admania_menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu(array( 'menu' => 'admania-primary-menu', 'theme_location' => 'admania-primary-menu' ) );  ?>
			 </nav>	
			 <?php endif; 
			 
			 $admania_searchck = admania_get_option('admania_hdrsrch');
											
				if(   1 != (int) $admania_searchck ):	
				
				?>
             <div class="admania_headersearchform"> 
             <div class="admania_headersearchform_tab">			 
			 <?php get_search_form(); ?>
			 </div>
			 </div>
			 <?php endif; ?>
			</div>
		</div>
	 
