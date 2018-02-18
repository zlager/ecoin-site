
<?php

/**
 * Theme layout2 header content.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 

         
?>


		<div class="admania_headerbtm">
		
			<div class="admania_headerbtminner">
			
				<div class="admania_lay2headerleft">
			
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
				
				<div class="admania_lay2headerright">
				<?php if(has_nav_menu('admania-primary-menu')): ?>
					<nav class="admania_menu admania_lay2_menu" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array( 'menu' => 'admania-primary-menu', 'theme_location' => 'admania-primary-menu' ) );  ?>
					</nav>	
				<?php endif; ?>
				</div>
				
			</div>
		</div>