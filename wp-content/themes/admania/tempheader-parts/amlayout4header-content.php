<?php

/**
 * Theme layout4 header content.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

         
?>

		<div class="admania_headertoplayt4">
		
			<div class="admania_headerinner">
						   
			<?php 
			
			$admania_lay4rmvcatids =  admania_get_option('ad_rmcatGrid34');			
			$admania_lay4rmvcatids_extractids = explode(',',$admania_lay4rmvcatids);			
			
			$admania_lay4rmvtagids = admania_get_option('ad_rmtagGrid34');
			$admania_lay4rmvtagids_extractids = explode(',',$admania_lay4rmvtagids);
			
				
		
			if(((!is_category($admania_lay4rmvcatids_extractids)) && (!is_tag($admania_lay4rmvtagids_extractids)))) {
					
			
			if(admania_get_option('hdr_adtplay4_act') != false): ?>
			
			<div class="admania_headertoplayt4ad admania_themead">
			
			<?php
			
			if((admania_get_lveditoption('hm_lay4sncnthtmlad') != false) || (admania_get_lveditoption('hm_lay4sngcntgglead') != false) || ((admania_get_lveditoption('admania_lvedtimg_url32') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url32') != false))) {
			if(admania_get_lveditoption('hm_lay4sncnthtmlad') != false) {
			
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay4sncnthtmlad'));
			
			}
			if(admania_get_lveditoption('hm_lay4sngcntgglead') != false ) {
			echo wp_kses_stripslashes(admania_get_lveditoption('hm_lay4sngcntgglead'));
			}
			
			if((admania_get_lveditoption('admania_lvedtimg_url32') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url32') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url32')); ?>">
			<?php if(admania_get_lveditoption('admania_lvedtimg_url32') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url32')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}
			
			else {

            if(admania_get_option('hdr_lay4htmlcd') != false) {			
			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay4htmlcd'));	
			
            }

            if(admania_get_option('hdr_lay4glecd') != false){			
			echo wp_kses_stripslashes(admania_get_option('hdr_lay4glecd'));
			}
			
			
			if((admania_get_option('admania_adimg_url33') != false) || (admania_get_option('admania_adimgtg_url33') != false) ){
			?>
			<a href="<?php echo esc_url(admania_get_option('admania_adimgtg_url33')); ?>">
			<?php if(admania_get_option('admania_adimg_url33') != false) { ?>
			 <img src="<?php echo esc_url(admania_get_option('admania_adimg_url33')); ?>" alt="<?php esc_html_e('adimage','admania'); ?>"/>
		    <?php } ?>
			 </a>
			<?php
			
			} 
			
			}									
			
			if(current_user_can('administrator')){			
			?>				
             <div class="admania_adeditablead1 admania_lvetresitem32">				
			 <i class="fa fa-edit"></i>
			 <?php esc_html_e('Edit','admania'); ?>
			 </div>			
			 
			 <?php } ?>
		
			 </div>
			 
			 <?php 
			 endif; 
			 
			 }
			 
			 
			 ?>
				
				<div class="admania_headerinnertop">
				   <?php if((admania_get_option('admania_hdfacebook') != false) || (admania_get_option('admania_hdtwitter') != false) || (admania_get_option('admania_hdgoogleplus') != false)): ?>
				    <div class="admania_lay4headerleft">
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
							}?>
                        </ul>						
					</div>
					<?php endif; ?>
					<div class="admania_lay4headermiddle">
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
						$admania_searchck = admania_get_option('admania_hdrsrch');											
						if(   1 != (int) $admania_searchck ):
                    ?>						
					<div class="admania_lay4headerright">
						<?php get_search_form(); ?>
					</div>
					<?php endif; ?>
            	</div>	
				
			</div>
		</div>
		<div class="admania_headermidlayt4">
		    <div class="admania_headerinner">            		
			
				<?php if(has_nav_menu('admania-primary-menu')): ?>
					<nav class="admania_menu admania_lay4_menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array( 'menu' => 'admania-primary-menu', 'theme_location' => 'admania-primary-menu' ) );  ?>
					</nav>	
				<?php endif; ?>
	
			</div>		
        </div>	