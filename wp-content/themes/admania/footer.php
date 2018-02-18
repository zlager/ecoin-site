<?php
/**
 * The template for displaying the footer
 *
 * 
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
?>
</div>
<!-- .site-inner -->

<footer class="admania_sitefooter">


<?php 

    $admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1'); 

    if($admania_blog_layout == 'amblyt2') {
	
	/*
	* Include the Before Footer Section Ad Template.			
	*/
			
	get_template_part('tempad-parts/lay2beforefooter','ad'); 
	
	}

	elseif($admania_blog_layout == 'amblyt3') {
	
	/*
	* Include the Before Footer Section Ad Template.			
	*/
			
	get_template_part('tempad-parts/lay3beforefooter','ad'); 
	
	}

	/*
	* Include the Footer instagram Content template.			
	*/		

	get_sidebar('content-adminstagram'); 	
	
	/*
	* Include the Footer logo,attribution,social follow Content template.			
	*/	
	
	get_sidebar('footer-content'); 

?>

 
</footer>
<!-- .site-footer -->

</div>
<!-- .site container -->

<?php wp_footer();

if( false != admania_get_option('admania_footer_script')): 	
	echo wp_kses_stripslashes(admania_get_option('admania_footer_script'));	
endif;

?>

</body>

</html>