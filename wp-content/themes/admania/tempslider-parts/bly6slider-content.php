<?php

/**
 * Theme slider content Section for woocommerce product.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 ?>

<!-- #Admania-SliderSection  -## -->

<?php 

if(is_shop()):

if(admania_get_option('hm_slideractive6') != false):  

if (class_exists( 'Woocommerce' )): 

?>

<div class="admania_featuredslider admania_bly6featuredslider">
  
    <div class="admania_siteinner" id="admania_owldemo6">

    <?php

    $admania_sld6catidsoptn6 = admania_get_option('hm_sliderctgrsid6');	
	$admania_sldckthecatpst6 = admania_get_option('hm_sliderctgs6');		
	$admania_ckthesldpst6 = admania_get_option('hm_sliderpstids6');
	$admania_postperpage6 = admania_get_option('hm_sliderpostperpage6');		
	$admania_latestpstck6 = admania_get_option('hm_sliderrandorlatst6');


	if($admania_latestpstck6 == 'Random'):

	$admania_postorder6 = 'rand';

	else:

	$admania_postorder6 = 'date';

	endif;
	
	if((!empty($admania_sldckthecatpst6) != '')):

$admaniaheaderslider_lay6args = array( 
'post_type' => 'product', 
'stock' => 1,
'product_cat' => $admania_sldckthecatpst6,
'orderby'=>$admania_postorder6,
'posts_per_page'=>$admania_postperpage6,
);
	
endif;


	


if((!empty($admania_ckthesldpst6) != '')):

$admania_ckthesldrpst_id6 = explode(',',$admania_ckthesldpst6);
$admaniaheaderslider_lay6args = array( 
'post_type' => 'product', 
'post__in' => $admania_ckthesldrpst_id6,
'orderby'=>$admania_postorder6,
'posts_per_page'=>$admania_postperpage6,
);

endif;


if((!empty($admania_sld6catidsoptn6) != '')):	
    $admania_sldcategory_idopts6 = explode(',',$admania_sld6catidsoptn6);
	$admaniaheaderslider_lay6args = array( 
	'post_type' => 'product', 
	'stock' => 1, 
	'posts_per_page' => $admania_postperpage6, 
	'cat' => get_product_category_by_id($admania_sldcategory_idopts6), 
	'orderby' =>$admania_postorder6
	);
            
endif;
	

if(((!empty($admania_sldckthecatpst6) != '') || (!empty($admania_sld6catidsoptn6) != '') || (!empty($admania_ckthesldpst6) != '') )){
 // the query  
   
    	
    $admaniaheaderslider_lay6query = new WP_Query( $admaniaheaderslider_lay6args );  	
	while ( $admaniaheaderslider_lay6query->have_posts() ) : $admaniaheaderslider_lay6query->the_post();
	 global $product,$post;
	?>
    <div class="admania_slider3 admania_slider6">
		<?php 		
		if (has_post_thumbnail( $admaniaheaderslider_lay6query->post->ID )):
			echo get_the_post_thumbnail($admaniaheaderslider_lay6query->post->ID,array(271,332)); 
		else:
			echo '<img src="'.woocommerce_placeholder_img_src().'" alt="'.esc_html__('productimg','admania').'"/>'; 
		endif;
		?> 
		<div class="admania_slidercontent2 admania_slidercontent6">
			<h4><?php the_title(); ?></h4>
	            <div class="admania_slidermetaby2 admania_slidermetaby6">
				
				<div class="admania_product_price">
					<span class="admania_pdtprice"><?php echo wp_kses_stripslashes($product->get_price_html()); ?> </span>
				</div>
				
				<div class="admania_product_rating">
					<span class="admania_pdtrating"><?php echo wp_kses_stripslashes($product->get_rating_html()); ?></span>
				</div>
				
                </div>
				
				<div class="admania_sliderentryfooter6">
				
				 <?php woocommerce_template_loop_add_to_cart( $admaniaheaderslider_lay6query->post, $product ); ?>
				
				</div>
	
    </div>
   </div>
  <?php 
   endwhile; 
   wp_reset_postdata();
   }
   ?>
</div>
</div>

<?php 
endif;
endif;
endif;
 ?>


