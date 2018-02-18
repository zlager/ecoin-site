<?php
/**
 * The template for displaying admania bloglayout1 content
 *
 * @package WordPress
 * @subpackage admania
 * @since Admania 1.0
 */
 
 

get_header(); 


echo '<main id="admania_maincontent" class="admania_sitemaincontent">';

?>

<div class="admania_contentarea">
  <div class="admania_contentareainner admania_layout1contentareainner">
    <?php
			 
			 if(is_home() && !is_paged()) {
			
                /*
				 * Include the Slider And Featured Content Template.			
				 */

				get_template_part('tempslider-parts/bly1sliderandfeatured','content');	
				
		      }
			  
			   /*
				 * Include the Home Page After Slider Section Ad Template.			
				 */
	             
			get_template_part('tempad-parts/afterslider','ad');			
         
            if ( have_posts() ) : 
		  
		    $admania_bylineck = admania_get_option('admania_ebylfp');
		
		    $admania_counter = 0;
		
			//Start the loop.
			while ( have_posts() ) : the_post();
			
			$admania_counter++;

				/*
				 * Include the Post-Format-specific template for the content.			
				 */
                
				if((1 == $admania_counter % 3)):
				
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <div class="admania_entry">
				  <?php admania_featuredimage(); ?>
					<div class="admania_entryheader">					
					  <?php the_title( sprintf( '<h2 class="admania_entrytitle" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
					  <?php   if( 1 != (int) $admania_bylineck )  { ?>
					  <div class="admania_entrybyline">
						<?php if(admania_get_option('admania_ppostedby') != TRUE) {	 ?>
						<?php  esc_html_e('By','admania'); ?>
						<?php the_author_posts_link(); ?>
						<div class="admania_entrybylinecd">|</div>
						<?php }
						if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<span class="admania_stickypost">
						<?php esc_html_e( 'Featured', 'admania' ); ?>
						</span>
						<div class="admania_entrybylinecd">|</div>
						<?php endif; 
					  
					  if( 1 != (int) $admania_bylineck )  {
						  
					  if(admania_get_option('admania_pcategory') != TRUE) {
					  esc_html_e('In','admania'); ?>
						<?php the_category(' , '); ?>						
						<div class="admania_entrybylinecd">|</div>
						<?php
					  
					  }
					  }
					  
					  ?>
						<?php if(admania_get_option('admania_ppostedon') != TRUE) { ?>
						<?php  esc_html_e('On','admania'); ?>
						<?php the_time(get_option( 'date_format')); ?>
						<?php } ?>
					  </div>
					  <?php } ?>
					</div>
					<!-- #entryheader -## -->
					
					<div class="admania_entrycontent">
					  
					 <?php 
					 $admania_contentlmt = get_the_excerpt(); 					 
					 echo wp_kses_stripslashes($admania_contentlmt);
					 wp_link_pages( array(
								'before'      => '<div class="admania_pagelinks"><span class="admania_pagelinkstitle">' . esc_html__( 'Pages:', 'admania' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="admania_screenreadertext">' . esc_html__( 'Page', 'admania' ) . ' </span><span class="admania_pglnlksaf">%</span>',
								'separator'   => '<span class="admania_screenreadertext">, </span>',
							) );
					  ?>
					</div>
					<!-- #entrycontent -## -->
					<div class="admania_entryfooter">
					  <div class="admania_readmorelink"> <a href="<?php esc_url(the_permalink()); ?>">
						<?php  esc_html_e('Continue Reading','admania'); ?>
						</a> </div>
					  <div class="admania_entryftrscl"> <a href="//www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank" class="admania_fbshare"> <i class="fa fa-facebook"></i> </a> <a href="//twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;url=<?php esc_url(the_permalink()); ?>" target="_blank" class="admania_twtshare"> <i class="fa fa-twitter"></i></a> <a href="//plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" target="_blank" title="<?php esc_html_e('Click to share','admania'); ?>" class="admania_gleshare"> <i class="fa fa-google-plus"></i></a> <a  href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>" target="_blank" class="admania_lnkshare"> <i class="fa fa-linkedin"></i></a> <a  href="//www.stumbleupon.com/submit?url=<?php esc_url(the_permalink()); ?>" class="admania_stumpleshare" target="_blank"> <i class="fa fa-stumbleupon"></i> </a> </div>
					</div>
					<!-- #entryfooter -## --> 
				  </div>
				</article>
				<!-- #post-## -->

				<?php

				elseif(($admania_counter % 3 == 2) || ($admania_counter % 3 == 0)):
                
                $admania_thumb = get_post_thumbnail_id();
				$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	
				$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
				$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
				$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
				$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
				$admania_framename = "iframe";	
                if(admania_get_option('layt4_cnt_frstlaytlstsdbr') == 1) {				
				$admania_fwidth = '408';
	            $admania_fheight = '260';
				}
				else {
				$admania_fwidth = '310';
	            $admania_fheight = '199';	
				}				
								
				$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	            
				if(($admania_ytdimg == "")  && ($admania_image == "")){
					$admania_wotftimg = 'admania_entryimagewot';
				}
				else {
				$admania_wotftimg = '';
				}
				
				if ($admania_counter % 3 == 0):
					 
					 $admania_classgrid = 'admania_gridsecondentry';
					 
					 else:
					 
					 $admania_classgrid = '';	 

				endif;
				
				?>
				
				<div class="admania_gridentry <?php echo esc_attr($admania_classgrid); ?>">
				    
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="admania_entryimage <?php echo esc_attr($admania_wotftimg); ?>">
						
						<?php
							
							if(($admania_ytdimg != "")  || ($admania_image != "")){
		
							if($admania_ytdimg != "") {
							
							if(preg_match($admania_youtube_matchexp , $admania_ytdimg)) {	
							
							$admania_yuvid = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth)."\" height=\"".absint($admania_fheight)."\" src=\"//www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admania_ytdimg);
							
							echo wp_kses_stripslashes($admania_yuvid);
							
							}
	
							elseif(preg_match($admania_vimeomatchexp , $admania_ytdimg)) {
							
							$admania_vimeovideos = preg_replace( $admania_vimeomatchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth)."\" height=\"".absint($admania_fheight)."\" src=\"//player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admania_ytdimg);
							
							echo wp_kses_stripslashes($admania_vimeovideos);
							
							}
	
							elseif(preg_match( $admania_souncloudmatchexp , $admania_ytdimg)) {	
							
							$admania_souncloudsng = preg_replace( $admania_souncloudmatchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admania_fwidth).'" height="'.absint($admania_fheight).'" scrolling="no" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_ytdimg); 
							
							echo wp_kses_stripslashes($admania_souncloudsng);
							
							}
	
						} 		
	
						elseif($admania_image != "" && $admania_ytdimg == "" ) { 
						?>
						<a href="<?php the_permalink(); ?>">							
							<img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admania'); ?>" />
						</a>
						<?php 
						}

						elseif($admania_image == "" && $admania_ytdimg == "" ) { 
					   
					   the_post_thumbnail(); 

						} 	 	

						}
	
	
					    if(admania_get_option('admania_ebylfp') != TRUE) {
						if(admania_get_option('admania_pcategory') != TRUE) {
						?>
						<div class="admania_entrymeta admania_entrymetablne"> 
						    <span class="admania_cat">							
							<?php the_category(' , '); ?>
							</span> 
						</div>
						<?php } } ?>
					</div>  
					
					<div class="admania_entryheader">
					  <?php the_title( sprintf( '<h2 class="admania_entrytitle" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
					  <div class="admania_entrybyline">
						<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<span class="admania_stickypost">
						<?php esc_html_e( 'Featured', 'admania' ); ?>
						</span>
						<div class="admania_entrybylinecd">|</div>
						<?php endif; ?>
						<?php
					  if( 1 != (int) $admania_bylineck )  { 
					   if(admania_get_option('admania_ppostedby') != TRUE) {	
					  esc_html_e('By','admania'); ?>
						<?php the_author_posts_link(); ?>
						<div class="admania_entrybylinecd">|</div>
						<?php  }
					   if(admania_get_option('admania_ppostedon') != TRUE) {
					  ?>
						<?php esc_html_e('On','admania'); ?>
						<?php the_time(get_option( 'date_format'));	  	  
					  }
					  }
					  ?>
					  </div>
					</div>
					<!-- #entryheader -## -->
					<div class="admania_entrycontent">
					<?php 
					$admania_limitexceprt = get_the_excerpt(); 	
					$admania_limitexceprt_words = substr($admania_limitexceprt,0,200);
					?>
					  <p> <?php echo wp_kses_stripslashes($admania_limitexceprt_words);  ?> </p>
					  <?php
					wp_link_pages( array(
								'before'      => '<div class="admania_pagelinks"><span class="admania_pagelinkstitle">' . esc_html__( 'Pages:', 'admania' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="admania_screenreadertext">' . esc_html__( 'Page', 'admania' ) . ' </span><span class="admania_pglnlksaf">%</span>',
								'separator'   => '<span class="admania_screenreadertext">, </span>',
							) );
							?>
					</div>
					<!-- #entrycontent -## -->
					
					<div class="admania_entryfooter">
					  <div class="admania_readmorelink"> <a href="<?php esc_url(the_permalink()); ?>">
						<?php  esc_html_e('Continue Reading','admania'); ?>
						</a> </div>
					</div>
					<!-- #entryfooter -## --> 
					
				  </article>
				</div>
				<?php		

				endif;
				
				if($admania_counter % 3 == 0):

				/*
				* Include the Right Sidebar Section Ad Template.			
				*/
					
				get_template_part('tempad-parts/aftergridpost','ad');
				
				endif;
				
			    // End the loop.
			    endwhile;			

			    // If no content, include the "No posts found" template.
			    else :
		
			    esc_html_e('Sorry No Posts Were Found','admania');		

			    endif;
			
			    admania_paging_nav(); // admania-pagination
						
			    /*
			     * Include the Before Footer Section Ad Template.			
			    */
			
			    get_template_part('tempad-parts/beforefooter','ad');
			
			?>
  </div>
  <!-- .content-area-inner -->
  <?php  if(admania_get_option('layt4_cnt_frstlaytlstsdbr') != 1) {	?>
  <div class="admania_secondarycontentarea">
  
		<?php	  
	    
		 /*
		 * Include the Left Sidebar Section Ad Template.			
		 */
				
	    get_template_part('tempad-parts/leftsidebar','ad');	

		get_sidebar('left');   // Theme Left Sidebar

		?>
  </div>
  <?php } ?>
  <div class="admania_contentareafooter">
	<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
  </div>
  </div>
<!-- .content-area -->

<div class="admania_primarycontentarea">


        <?php
		
		 /*
		 * Include the Right Sidebar Section Ad Template.			
		 */
		
		get_template_part('tempad-parts/rightsidebar','ad');

		get_sidebar('right'); // Theme Right Sidebar

		?>
</div>


<?php 

echo '</main>';  //site-main 

get_footer(); 