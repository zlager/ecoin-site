<?php
/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
$admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1'); 

if($admania_blog_layout == 'amblyt4')  {
	$admania_lay4maincnt = 'admania_ly4maininner';
}
else {
	$admania_lay4maincnt = '';
}

get_header(); 

echo '<main id="admania_maincontent" class="admania_sitemaincontent '.esc_attr($admania_lay4maincnt).'">';


if($admania_blog_layout == 'amblyt4')  {
	$admania_lay4class = 'admania_layout4contentarea';
}
elseif($admania_blog_layout == 'amblyt5') {
	$admania_lay4class = 'admania_layt5_contentarea';
}
else {
	$admania_lay4class = '';
}

?>


<div class="admania_contentarea <?php echo esc_attr($admania_lay4class);?>">

<?php
if($admania_blog_layout == 'amblyt4')  {
?>
<div class="admania_layout4post">	
	
	<div class="admania_layout4postright">			
		<div class="admania_layout4postrightleft">
					
<?php
}
if($admania_blog_layout == 'amblyt1')  {
?>
  <div class="admania_contentareainner admania_layout1contentareainner">
    <?php
}
		
		if($admania_blog_layout == 'amblyt1') {  
		        /*
				 * Include the Home Page After Slider Section Ad Template.			
				 */
	             
			get_template_part('tempad-parts/afterslider','ad');	
		
		}
		elseif($admania_blog_layout == 'amblyt2') {
			   /*
				 * Include the Home Page After Slider Section Ad Template.			
				 */
	             
			get_template_part('tempad-parts/lay2afterslider','ad');	
		
		}
		
	   if ( have_posts() ) : 
	   
	   
	   
	   ?>
    <header class="admania_archiveheader">
      <?php   
		the_archive_title( '<h1 class="admania_archivetitle">', '</h1>' );
		the_archive_description( '<div class="admania_taxonomydescription">', '</div>' );
		?>
    </header>
    <!-- .archive-header -->
    
    <?php
		if(is_author()):	
        
			echo'<div class="admania_authorpg">';		
        
				get_template_part( 'author','bio' );
		
			echo'</div>';
		
		endif;
		
		 if(admania_get_option('admania_breadcrumb_archives') != '') {
		
		admania_breadcrumb(); // Admania-BreadCrumb
		
		}
		if($admania_blog_layout == 'amblyt3') {
		?>
		
		<div class="admania_layout3post">
		
		<?php
		}
		
		if($admania_blog_layout == 'amblyt5') {
			
		  if(is_category() || is_tag()):
		  			
			/*
			* Include the Archive Before Content Section Ad content Template.			
			*/
			get_template_part('tempad-parts/lay5archive','ad');
		  
		  endif;
		?>
		
		<div class="admania_layout5post">
		
		<?php
		}
		
		
		
		  $admania_counter = 0;
		  
		
		
			//Start the loop.
			while ( have_posts() ) : the_post();
			
			$admania_counter++;

				/*
				 * Include the Post-Format-specific template for the content.			
				 */
				get_template_part( 'content' );

			// End the loop.
			endwhile;			

			// If no content, include the "No posts found" template.
			else :
					
            echo '<p class="admania_searchpst">';
				esc_html_e('Sorry No Posts Were Found','admania');	
            echo '</p>';				

			endif;
			
			if((($admania_blog_layout == 'amblyt3') || ($admania_blog_layout == 'amblyt5'))) {
			?>
		
			</div>
		
			<?php			
			}
			
			admania_paging_nav(); // admania-pagination
						
			if($admania_blog_layout == 'amblyt5') {				
			/*
			* Include the Before Footer Section Ad content Template.			
			*/
			get_template_part('tempad-parts/lay5beforefooter','ad');
			
			?>
			<div class="admania_contentareafooter">
				<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
		    </div>
			<?php
			}
			
			if($admania_blog_layout == 'amblyt4') {	
			?>
			
			</div>
							
			<?php  
			if(admania_get_option('layt4_cnt_rgtsdbr') != 1):	
			get_sidebar('middle');   // Theme alt secondary Sidebar 
			endif;
			?>
			
			
			<div class="admania_layt4contentareafooter">
				<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
			</div>
			
			<?php
		   
			/*
			* Include the Before Footer Section Ad content Template.			
			*/
			get_template_part('tempad-parts/lay4beforefooter','ad');
			
			?>			
			
			</div>			
			
			<?php
			}
			/*
			* Include the Before Footer Section Ad Template.			
			*/
			
			if($admania_blog_layout == 'amblyt1') {	
			
			get_template_part('tempad-parts/beforefooter','ad');
		

	?>
	
  </div>
  
 
  <!-- .content-area-inner -->
   <?php if((admania_get_option('layt4_cnt_lstsdbr') != 1) || (admania_get_option('layt4_cnt_frstlaytlstsdbr') != 1)) { ?>
  <div class="admania_secondarycontentarea admania_testsidbar">
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
	<?php } if($admania_blog_layout == 'amblyt4') {	
	if(admania_get_option('layt4_cnt_lstsdbr') != 1):	?>
	 <div class="admania_layout4postleft">
			<?php
			
				/*
				* Include the Right Sidebar Section Ad Template.			
				*/
			
				get_template_part('tempad-parts/leftsidebar','ad');

				get_sidebar('left'); // Theme Right Sidebar

			?>
	</div>
	<?php endif; ?>
	</div>
 <div class="admania_contentareafooter">
		<div class="screen-reader-text"><?php esc_html_e('It is main inner container footer text','admania'); ?></div>
	 </div>	
	<?php } ?>
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

 
 
