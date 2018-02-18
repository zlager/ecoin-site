<?php

/**
 * Theme layout5 header content.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
         
?>
			<div class="admania_headertoplayt5">
            <div class="admania_headertoplayt5_top">			
				<div class="admania_headerinner">									
					<div class="admania_lay5headerleft">					
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
					<div class="admania_lay5headerright">
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
			<div class="admania_headertoplayt5_bottom">
			<div class="admania_headerinner">            
				<?php if(has_nav_menu('admania-primary-menu')): ?>
				<nav class="admania_menu admania_lay4_menu admania_lay5_menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu(array( 'menu' => 'admania-primary-menu', 'theme_location' => 'admania-primary-menu' ) );  ?>
				</nav>	
				<?php endif; ?>	
                <?php 
				$admania_searchck = admania_get_option('admania_hdrsrch');											
				if(   1 != (int) $admania_searchck ):
                ?>						
				<div class="admania_lay5headerright">
                    <span class="admania-la5searchicon">				
					<i class="fa fa-search"></i>
					</span>
				</div>
				<div class="admania_lay5headersearchouter">
				<?php get_search_form(); ?>
				</div>
				<?php endif; ?>				
			</div>			
			</div>
			</div>
	