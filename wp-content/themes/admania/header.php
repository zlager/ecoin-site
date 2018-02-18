<?php
/**
 * The template for displaying the header
 *
 * 
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope="itemscope" itemtype="http://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if( true != admania_get_option('admania_responsive')): ?>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif;		
	/**
	* This hook is important for wordpress plugins and other many things
	*/
	wp_head();
	
	if( false != admania_get_option('admania_header_script')): 	
		echo wp_kses_stripslashes(admania_get_option('admania_header_script'));	
	endif;

?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<div class="admania_sitecontainer">

	<?php
	/*
	*  Include the front-end liveeditor options template.			
	*/		
	get_template_part('lib/includes/admania','frontliveeditor');
	
	?>  
	
	<header class="admania_siteheader" itemscope="" itemtype="http://schema.org/WPHeader">
		<?php 
		$admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1');
		
		$admania_header_type = ((admania_get_option('admania_headertype_scheme')) ? admania_get_option('admania_headertype_scheme') : 'amheader1');
		
		
		if($admania_header_type == 'amheader1') { 
		
			get_template_part('tempheader-parts/amlayout1header','content'); // layout1 header content
	   
	    }  
		elseif($admania_header_type == 'amheader2') { 
	   
			get_template_part('tempad-parts/lay2headertop','ad'); // layout2 header ad
	   
			get_template_part('tempheader-parts/amlayout2header','content'); // layout2 header content
			
		}
	    elseif($admania_header_type == 'amheader3') {  
		
			get_template_part('tempheader-parts/amlayout3header','content'); // layout3 header content
			
	    }
		
		elseif($admania_header_type == 'amheader4') {  
		
			get_template_part('tempheader-parts/amlayout4header','content'); // layout4 header content
			
	    }
		
		elseif($admania_header_type == 'amheader5') {  
		
			get_template_part('tempheader-parts/amlayout5header','content'); // layout5 header-content
			
	    }
		
		?>
	</header>
	


<div class="admania_siteinner">

<?php if(($admania_blog_layout != 'amblyt3') && ($admania_blog_layout != 'amblyt4') && ($admania_blog_layout != 'amblyt5')) { ?>
	
<div class="admanina_afterheaderad">

<?php if($admania_blog_layout == 'amblyt1') { 
/*
 *  Include the after header Ad template.			
*/
		
get_template_part('tempad-parts/afterheader','ad');

}
elseif($admania_blog_layout == 'amblyt2') {

/*
 *  Include the after header Ad template.			
*/
		
get_template_part('tempad-parts/lay2afterheader','ad');

}

?>
</div>

<?php
}
?>


