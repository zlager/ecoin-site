<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

$admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1'); 


/*
* Include the Before Single Post Content Section Ad Template.			
*/
			
get_template_part('tempad-parts/singlepostbf','ad');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php  if(admania_get_option('admania_dsftdimg') != 1) { ?>
	<?php admania_featuredimage(); ?>	
	<?php } ?>
	
	<header class="admania_entryheader">
	
	   	<?php
		
        if(admania_get_option('admania_breadcrumb_post') != '') {
		
		admania_breadcrumb(); // Admania-BreadCrumb
		
		}

		the_title( '<h1 class="admania_entrytitle" itemprop="headline">', '</h1>' ); 
		
		admania_entrymeta(); // Admania-EntryMeta
		?>
		
	 
	</header><!-- .entry-header -->


	<div class="admania_entrycontent">
	
		<?php
		if($admania_blog_layout == 'amblyt3') {
			
	    get_template_part('tempad-parts/singlelay3sticky','ad');
		
		}
		?>	

		<?php
		if($admania_blog_layout == 'amblyt3') {
		?>
		<div class="admania_lay3entrycontentright">
		<?php
		}
		?>	
	
	
		<?php
		
		/*
		* Include the Before Single Post Content Section Ad Template.			
		*/
			
		get_template_part('tempad-parts/singlecontenttop','ad');
		
		 the_content();

	      wp_link_pages( array(
				'before'      => '<div class="admania_pagelinks"><span class="admania_pagelinkstitle">' . esc_html__( 'Pages:', 'admania' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="admania_screenreadertext">' . esc_html__( 'Page', 'admania' ) . ' </span><span class="admania_pglnlksaf">%</span>',
				'separator'   => '<span class="admania_screenreadertext">, </span>',
			) );
			
			
			?>
			<div class="admania_tag">
	
				<span class="admania_tagslinks">
					<?php the_tags('');?>
				</span>
					
		    </div>
			
			<?php
			
			/*
			* Include the Before Single Post Content Section Bottom Ad Template.			
			*/

			get_template_part('tempad-parts/singlecontentbottm','ad');
			
			
		if($admania_blog_layout == 'amblyt3') {
		?>	
        </div>
		<?php
		}
		?>

	</div><!-- .entry-content -->

	<footer class="admania_entryfooter admania_entrypgfooter">
		
		
		   <div class="admania_postsharecnt">
    
    <?php
					
				if(admania_get_option('admania_active_postsocialshare') != true) {	
				
				?>
				
				<div class="admania_singleshare">					
				  
					<ul class="admania_postsocial admania_socialsharecount">
						
					                     		  
						<?php if(admania_get_option('admania_postsocialfb') != true){ ?>
						<li class="admania_share_fb"> <a href="//www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank"> <i class="fa fa-facebook"></i><span class="admania_sharetext"><?php esc_html_e('Facebook','admania'); ?></span></a>
						</li>
						<!--facebook-->
						<?php						
						}
						if(admania_get_option('admania_postsocialtwitter') != true) {?>
						  <li class="admania_share_tweet"><a href="//twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;url=<?php esc_url(the_permalink()); ?>" target="_blank"> <i class="fa fa-twitter"></i><span class="admania_sharetext"><?php esc_html_e('Twitter','admania'); ?></span></a>
						  </li>
						<!--twitter-->	
						<?php }if(admania_get_option('admania_postsocialgplus') != true){ ?>
						<li class="admania_share_plus"> <a href="//plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" target="_blank" title="<?php esc_html_e('Click to share','admania'); ?>"> <i class="fa fa-google-plus"></i><span class="admania_sharetext"><?php esc_html_e('Google+','admania'); ?></span>
						</a> 
						</li>
						<!--gplus-->
						  
						<?php }if(admania_get_option('admania_postsociallinkedin') != true){ ?>
						<li class="admania_share_linkedin"> <a target="_blank" href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>"> <i class="fa fa-linkedin"></i><span class="admania_sharetext"><?php esc_html_e('Linkedin','admania'); ?></span></a> 
						</li>
						<!--linkedin--> 
						  
						<?php }if(admania_get_option('admania_postsocialpinterest') != true){
											
						$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						$pinImage = $pinterestimage[0];
						?>
						<li class="admania_share_pintrest"> <a target="_blank" href="//pinterest.com/pin/create/bookmarklet/?url=<?php echo urlencode(esc_url(get_permalink( $post->ID ))).'&amp;media='. $pinImage .'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title( $post->ID )), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');?>"> <i class="fa fa-pinterest"></i><span class="admania_sharetext"><?php esc_html_e('Pinterest','admania'); ?></span></a>
						
						</li>
						 <!--pinterest-->
						  
						<?php } 
						
						if(admania_get_option('admania_postsocialbuffer') != false){ 
						?>
                        
                        <li class="admania_share_buffer">      
 <a target="_blank" href="//bufferapp.com/add?url=<?php esc_url(the_permalink()); ?>&amp;text=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&amp;utm_source=<?php esc_url(the_permalink()); ?>&amp;utm_medium=<?php esc_url(the_permalink()); ?>&amp;utm_campaign=buffer&amp;source=button">
<i class="fa-stack-exchange fa"></i>
<span class="admania_sharetext"><?php esc_html_e('Buffer','admania'); ?></span>
</a>
</li>
<?php } if(admania_get_option('admania_postsocialpocket') != false){ ?>
 <li class="admania_share_pocket">       
      <a target="_blank" href="//getpocket.com/save?title=<?php echo 
	 esc_html(get_the_title()); ?>&amp;url=<?php esc_url(the_permalink()); ?>">
     <i class="admania-icon-pckt fa"></i>
	 <span class="admania_sharetext"><?php esc_html_e('Pocket','admania'); ?></span>
     </a>     
    </li>
    <?php }
    if(admania_get_option('admania_postsocialstumble') != false){ ?>
     <li class="admania_share_stumble"> 
	 <a target="_blank" href="//www.stumbleupon.com/submit?url=<?php esc_url(the_permalink()); ?>"> <i class="fa fa-stumbleupon"></i><span class="admania_sharetext"><?php esc_html_e('stumbleupon','admania'); ?></span></a> </li>
    
    
            <?php }
			if(admania_get_option('admania_postsocialredit') != false) {
				?>
		 <li class="admania_share_reddit"> <a target="_blank" href="//www.reddit.com/submit?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(esc_html(get_the_title()), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>"> <i class="fa-reddit fa"></i><span class="admania_sharetext"><?php esc_html_e('Reddit','admania'); ?></span></a> </li>
        <?php
			
				}
			 if(admania_get_option('admania_postsocialwhatsapp') != false && wp_is_mobile()){ ?>            
                        
                        <div class="admania_whatsup"> <a href="whatsapp://send?text=<?php echo esc_html(the_title());?> <?php echo urlencode(esc_url(get_permalink())); ?>" data-action="share/whatsapp/share"><i class="icon fa fa-whatsapp"></i><span class="admania_sharetext"><?php esc_html_e('Whatsapp','admania'); ?></span></a></div>
						<?php } ?>  
						</ul>					
				

				</div>

				<!--End of the Single post social share section--> 
				  <?php } ?>

    </div>
	
	</footer><!-- .entry-footer -->
		
		<?php
		
        /*
		 *  Include the author bio template		
		 */
		
		get_template_part( 'author','bio' );

        if(admania_get_option('admania_snglpaginationpn') != true) {		
				
		admania_postnav(); // single post nav
		
		}
						
		admania_relatedpost(); // Related post 		  
		
		if(admania_get_option('admania_postoptincodechk') != '') {
		?>
	
	 <div class="admania_postoptionbox">
				
					<h4 class="admania_postoptionboxheading"><?php  echo esc_html(admania_get_option('admania_postoptinheading')); ?></h4>
					<p class="admania_subheading"><?php echo esc_html(admania_get_option('admania_postoptinheading2')); ?></p>
					<form class="admania_afformwrapperr" target="_blank" action="<?php echo esc_url(admania_get_option('admania_postoptintypeurl')); ?>" method="post" >
						<?php echo stripslashes(html_entity_decode(admania_get_option('admania_postoptintypehidden'))); ?> 
                    
                      <i class="admania_nicon">
                      
                      <?php
					  if(admania_get_option('admania_postoptintypeplaceholdername') != false):
					  $postopt_name = admania_get_option('admania_postoptintypeplaceholdername');
					  else:
					  $postopt_name = 'Your Name';
					  endif;
					  
					  
					  if(admania_get_option('admania_postoptintypeplaceholderemail') != false):
					  $postopt_placeholderemail = admania_get_option('admania_postoptintypeplaceholderemail');
					  else:
					  $postopt_placeholderemail = 'Your Email';
					  endif;
					  
					  
					  if(admania_get_option('admania_postoptintypesubmit') != false):
					  $postopt_submit = admania_get_option('admania_postoptintypesubmit');
					  else:
					  $postopt_submit = 'Go!';
					  endif;
					  
					 
					  
					  ?>
                      
						<input type="text" name="<?php echo esc_attr(admania_get_option('admania_postoptintypename')); ?>" onfocus="if (this.value == '<?php echo esc_attr($postopt_name); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo esc_attr($postopt_name); ?>';}" value="<?php echo esc_attr($postopt_name); ?>">
						</i>
						
						 <i class="admania_eicon">
						<input type="text"  name="<?php echo esc_attr(admania_get_option('admania_postoptintypeemail')); ?>" onfocus="if(this.value == '<?php echo esc_attr($postopt_placeholderemail); ?>') {this.value= '';}" onblur="if(this.value == '') {this.value = '<?php echo esc_attr($postopt_placeholderemail); ?>';}" value="<?php echo esc_attr($postopt_placeholderemail); ?>">
						</i> 
                     <i class="admania_sub_before">
				<input type="submit" name="submit" value="<?php echo esc_html($postopt_submit); ?>">
						</i>
					</form>
					
				</div>
				
			<?php	
				}	
			/*
			* Include the Single Post After Optin Box Section Ad Template.			
			*/
			
			get_template_part('tempad-parts/singleafteroptin','ad');
			
			?>
		
	
</article><!-- #post-## -->
