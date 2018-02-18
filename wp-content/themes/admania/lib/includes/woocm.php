<?php

/*
Theme Name: admania
Description: woocommerce customtemptags.
*/

/**
 * Change html output of archive product in woocommerce
 *
 * @since 1.0
 */

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function admania_wc_category_title_archive_products(){
$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
if ( $product_cats && ! is_wp_error ( $product_cats ) ){
$single_cat = array_shift( $product_cats ); ?>
<?php }
}

add_action( 'woocommerce_after_shop_loop_item', 'admania_wc_category_title_archive_products', 5 );
/*This function is to add category name using category id for woocommerce*/
function get_product_category_by_id( $admania_category_id ) {
$admania_term = get_term_by( 'id', $admania_category_id, 'product_cat', 'ARRAY_A' );
return $admania_term['name'];
}

/**
 * Add social share bar to single products
 *
 * @see   admania_wcm_social_share()
 * @since 1.0
 */
add_action( 'woocommerce_single_product_summary', 'admania_wcm_social_share', 60 );


/**
 * Function social share
 * 
 */
if ( ! function_exists( 'admania_wcm_social_share' ) ) {
	function admania_wcm_social_share() {
		global $post;
		
	?>
    
		<div class="admania-single-share">
			<ul class="admania_social">
			    <li><span class="admania_share_txt"><?php esc_html_e('Share this','admania'); ?></span></i>
				<li>
					<a class= "admania_fbk" title="<?php esc_html_e('Facebook','admania');?>" href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-facebook-square"></i>						
					</a>
				</li>
				<li>
					<a class= "admania_twtk" title="<?php esc_html_e('Twitter','admania');?>" href="https://twitter.com/share?url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-twitter-square"></i>						
					</a>
				</li>
				<li>
					<a class= "admania_gglpl" title="<?php esc_html_e('Googleplus','admania');?>" href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-google-plus-square"></i>						
					</a>
				</li>
				<li>
					<a class= "admania_pntr" title="<?php esc_html_e('Pinterest','admania');?>" href="//pinterest.com/pin/create/button/?url=<?php esc_url(the_permalink()); ?>&description=<?php esc_html(the_title()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<i class="fa fa-pinterest-square"></i>						
					</a>
				</li>
			</ul>
		</div>
        
	<?php
	}
}



