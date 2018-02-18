<?php
/**
 * Custom template tags for Admania
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */



/*-----------------------------------------------------------------------------------*/
# Admania Previous/next post navigation.
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'admania_postnav' ) ) :

function admania_postnav() {

global $post;

$admania_prev_post = '';
$admania_nxt_post = '';

$admania_prev_post = get_previous_post();				 
$admania_next_post = get_next_post();


				 
	if(!empty($admania_prev_post) || !empty($admania_next_post) ):
	
	if(!empty($admania_prev_post) == ''):
	$admania_nxtpst_class = 'admania_nxtpst_dsgn';
	else:
	$admania_nxtpst_class = '';
	endif;
	
	?>

<div class="admania_prenext <?php echo esc_attr($admania_nxtpst_class); ?>"> <!--Single post prev/next-->
  
  <?php
  
  
  if(admania_get_option('admania_singleprevcontent') != false):
  
  $admania_prevpagicontent = admania_get_option('admania_singleprevcontent');
  
  else:
  
  $admania_prevpagicontent = 'Prev Post';
  
  endif;
  
  if(admania_get_option('admania_singlenextcontent') != false):
  
  $admania_nextpagicontent = admania_get_option('admania_singlenextcontent');
  
  else:
  
  $admania_nextpagicontent = 'Next Post';
  
  endif;
  
  the_post_navigation( array(
	'prev_text' => 
				'<span> <i class="fa fa-angle-double-left"></i> </span>'.
				'<div class="admania_snlgepdsg">'.esc_html($admania_prevpagicontent).'</div>'.
				'<div class="admania_snlgenpntit">%title</div>',
	'next_text' => 
				'<span> <i class="fa fa-angle-double-right"></i> </span>'.
				'<div class="admania_snlgepdsg">'.esc_html($admania_nextpagicontent).'</div>'.
				'<div class="admania_snlgenpntit">%title</div>',					
 ) );

  
 
?>
</div>
<!-- preview / next -->

<?php 				
	endif;
}

endif;

 

/*-----------------------------------------------------------------------------------*/
# Admania Get Theme Options
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'admania_get_option' ) ) :

function admania_get_option( $admania_optionname ) {
	
	$admania_get_options = get_option( 'admania_theme_settings' );
	
	if( !empty( $admania_get_options[$admania_optionname] ))
		 return htmlspecialchars_decode($admania_get_options[$admania_optionname]);
		
	return false ;
}

endif;

/*-----------------------------------------------------------------------------------*/
# Admania Live Editor Get Theme Options
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'admania_get_lveditoption' ) ) :

function admania_get_lveditoption( $admania_lvedtoptionname ) {
	
	$admania_get_lveditoptions = get_option( 'admania_frontliveeditor_settings' );
	
	if( !empty( $admania_get_lveditoptions[$admania_lvedtoptionname] ))
		 return wp_kses_stripslashes($admania_get_lveditoptions[$admania_lvedtoptionname]);
		
	return false ;
}

endif;

/*-----------------------------------------------------------------------------------*/
# Admania post count views 
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'admania_set_post_views' )):

function admania_set_post_views($postID) { 
$admaniacount_key = 'admania_post_views_count';
$admania_count = get_post_meta($postID, $admaniacount_key, true);
if($admania_count=='')
{
$admania_count = 0;
delete_post_meta($postID, $admaniacount_key);
add_post_meta($postID, $admaniacount_key, '0');
}else{
$admania_count++;
update_post_meta($postID, $admaniacount_key, $admania_count);
}
}

endif;

/*-----------------------------------------------------------------------------------*/
# Admania Track post views 
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'admania_track_post_views' )):

function admania_track_post_views ($post_id) {
if ( !is_single() ) return;
if ( empty ( $post_id) ) {
global $post;
$post_id = $post->ID;   
}
admania_set_post_views($post_id);

}

endif;

add_action( 'wp_head', 'admania_track_post_views'); // add action to load the data in wp-head

/*-----------------------------------------------------------------------------------*/
# Admania get the post count view 
/*-----------------------------------------------------------------------------------*/

if( ! function_exists( 'admania_get_post_views' )):

function admania_get_post_views($postID){
$admaniacount_key = 'admania_post_views_count';
$admaniacount = get_post_meta($postID, $admaniacount_key, true);
if($admaniacount==''){
delete_post_meta($postID, $admaniacount_key);
add_post_meta($postID, $admaniacount_key, '0');
return "0";
}
return $admaniacount;
}

endif;

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);	

/*-----------------------------------------------------------------------------------*/
# Admania Crop the wp post thumbnail image
/*-----------------------------------------------------------------------------------*/


/**
* Title : Aqua Resizer
* Description : Resizes WordPress images on the fly
* Version : 1.1.6
* Author : Syamil MJ
* Author URI : http://aquagraphite.com
* License : WTFPL - http://sam.zoy.org/wtfpl/
* Documentation : https://github.com/sy4mil/Aqua-Resizer/
*
* @param string $url - (required) must be uploaded using wp media uploader
* @param int $width - (required)
* @param int $height - (optional)
* @param bool $crop - (optional) default to soft crop
* @param bool $single - (optional) returns an array if false
* @uses wp_upload_dir()
* @uses image_resize_dimensions()
* @uses image_resize()
*
* @return str|array
*/

if( ! function_exists( 'admania_autoresize' )):

function admania_autoresize( $url, $width, $height = null, $crop = null, $single = true ) {

//validate inputs
if(!$url OR !$width ) return false;

//define upload path & dir
$upload_info = wp_upload_dir();
$upload_dir = $upload_info['basedir'];
$upload_url = $upload_info['baseurl'];

//check if $admania_post_imgurl is local
if(strpos( $url, $upload_url ) === false) return false;

//define path of image
$rel_path = str_replace( $upload_url, '', $url);
$img_path = $upload_dir . $rel_path;

//check if img path exists, and is an image indeed
if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;

//get image info
$info = pathinfo($img_path);
$ext = $info['extension'];
list($orig_w,$orig_h) = getimagesize($img_path);

//get image size after cropping
$dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
$dst_w = $dims[4];
$dst_h = $dims[5];

//use this to check if cropped image already exists, so we can return that instead
$suffix = "{$dst_w}x{$dst_h}";
$dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

if(!$dst_h) {
//can't resize, so return original url
$admania_post_imgurl = $url;
$dst_w = $orig_w;
$dst_h = $orig_h;
}
//else check if cache exists
elseif(file_exists($destfilename) && getimagesize($destfilename)) {
$admania_post_imgurl = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
}
//else, we resize the image and return the new resized image url
else {

// Note: This pre-3.5 fallback check will edited out in subsequent version
if(function_exists('wp_get_image_editor')) {

$editor = wp_get_image_editor($img_path);

if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
return false;

$resized_file = $editor->save();

if(!is_wp_error($resized_file)) {
$resized_rel_path = str_replace( $upload_dir, '', $resized_file['path']);
$admania_post_imgurl = $upload_url . $resized_rel_path;
} else {
return false;
}

} else {

$resized_img_path = wp_get_image_editor( $img_path, $width, $height, $crop ); // Fallback foo
if(!is_wp_error($resized_img_path)) {
$resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
$admania_post_imgurl = $upload_url . $resized_rel_path;
} else {
return false;
}

}

}

//return the output
if($single) {
//str return
$image = $admania_post_imgurl;
} else {
//array return
$image = array (
0 => $admania_post_imgurl,
1 => $dst_w,
2 => $dst_h
);
}

return $image;
}

endif;


if(! function_exists( 'admania_catchthatimage' )):

function admania_catchthatimage() {
global $post;
$admania_firstimg = '';
ob_start();
ob_end_clean();
$admania_output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $admania_matches);
if(count($admania_matches [1]))
$admania_firstimg = $admania_matches[1][0];
return $admania_firstimg;}

endif;


/*-----------------------------------------------------------------------------------*/
# Admania RelatedPost
/*-----------------------------------------------------------------------------------*/


if(! function_exists( 'admania_relatedpost' ) ):

function admania_relatedpost() {

if(is_single()) {
	
global $post;

$post_id = $post->ID;

$admania_bylineck = admania_get_option('admania_ebylfp');

if(admania_get_option('admania_choserd1') != false):
$admania_choserd1 = admania_get_option('admania_choserd1');
else:
$admania_choserd1 = 'latest';
endif;

if($admania_choserd1 == 'latest'):

$admania_orderbychs1 = 'date';

elseif($admania_choserd1 == 'random'):

$admania_orderbychs1 = 'rand';

endif;


if(admania_get_option('admania_choserd2') != false):
$admania_choserd2 = admania_get_option('admania_choserd2');
else:
$admania_choserd2 = 'latest';
endif;



if($admania_choserd2 == 'latest'):

$admania_orderbychs2 = 'date';

elseif($admania_choserd2 == 'random'):

$admania_orderbychs2 = 'rand';

endif;

	if((admania_get_option('admania-enable-related-post-by-tag')) != false) // related posts display by tag
	{
	
	
	if(admania_get_option('admania_relatedpostbytagcount') != false):
	
	$admania_rpbytag = admania_get_option('admania_relatedpostbytagcount');
	
	else:
	
	$admania_rpbytag = '3';
	
	endif;
	

		
	$admania_tags = wp_get_post_tags($post->ID);
	if ($admania_tags) {
	
	$admania_tag_ids = array();
	foreach($admania_tags as $individual_tag) $admania_tag_ids[] = $individual_tag->term_id;
	$admania_args=array(
	'tag__in' => $admania_tag_ids,
	'orderby'=>$admania_orderbychs2,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> $admania_rpbytag, // Number of related posts that will be displayed.
    'ignore_sticky_posts'=>1,	
	);
	$admania_my_query = new wp_query( $admania_args );
	if( $admania_my_query->have_posts() ) {				
	
	echo '<div class="admania_related_posts">
	<h5 class="admania_related_postsheading">'.esc_html__('You May Also Like','admania').'</h5><ul>';
	while( $admania_my_query->have_posts() ) {
	$admania_my_query->the_post(); 
	
	?>
<li>
  <?php			  
					  
		$admaniafeatured_imgwidth1 = 250;
		$admaniafeatured_imgheight1 = 150;

		$admania_postthumb1 = get_post_thumbnail_id();
		$admaniapost_imgsrc = wp_get_attachment_url( $admania_postthumb1,'full'); //get img URL	
		$admania_relatedimgurl = admania_autoresize($admaniapost_imgsrc,$admaniafeatured_imgwidth1,$admaniafeatured_imgheight1,true);					 
		$admania_featdvidurl = get_post_meta($post->ID, '_admania_featured_videourl', true); 
		$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
		$admania_vimeo_matchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
		$admania_souncloud_matchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
		$admania_framename = "iframe";  			  
						
			if($admania_featdvidurl != false) {

				if(preg_match($admania_youtube_matchexp , $admania_featdvidurl)) {
						
				$admania_featdvidurl = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admaniafeatured_imgwidth1)."\" height=\"".absint($admaniafeatured_imgheight1)."\" src=\"//www.youtube.com/embed/$1\"  allowfullscreen></iframe>",$admania_featdvidurl);
						
				echo wp_kses_stripslashes($admania_featdvidurl);					
						
			}
						
			elseif(preg_match($admania_vimeo_matchexp , $admania_featdvidurl)) {						
												
				$admania_vimeovideos = preg_replace( $admania_vimeo_matchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admaniafeatured_imgwidth1)."\" height=\"".absint($admaniafeatured_imgheight1)."\" src=\"//player.vimeo.com/video/$3\"  allowfullscreen></iframe>",$admania_featdvidurl);
						
				echo wp_kses_stripslashes($admania_vimeovideos);
						
			}
						
			elseif(preg_match( $admania_souncloud_matchexp , $admania_featdvidurl)) {
						
				$admania_souncloudsng = preg_replace( $admania_souncloud_matchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admaniafeatured_imgwidth1).'" height="'.absint($admaniafeatured_imgheight1).'" src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_featdvidurl); 
						
				echo wp_kses_stripslashes($admania_souncloudsng);	
						
			}					
				
			}
						
			elseif($admaniapost_imgsrc != false && $admania_featdvidurl == false ) { 
			?>
  <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_html(the_title()); ?>"> <img src="<?php echo esc_url($admania_relatedimgurl);  ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </a>
  <?php 
			}
		
	        ?>
  <div class="admania_rel_entry_meta">
    <?php the_title( sprintf( '<h2 class="admania_entry_title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
    <?php  if( 1 != (int) $admania_bylineck )  { ?>
    <div class="admania_entry_cat">
      <?php if(admania_get_option('admania_ppostedon') != TRUE) { ?>
      <span class="admania_date">
      <?php esc_html_e('On','admania'); ?>
      <?php the_time(get_option( 'date_format' )); ?>
      </span>
      <?php }
	 if(admania_get_option('admania_pcategory') != TRUE) { ?>
      <span class="admania_dividerlne">|</span> <span class="admania_catgory">
      <?php esc_html_e('In','admania'); ?>
      <?php  the_category(' ,');?>
      </span>
      <?php  } ?>
    </div>
    <?php  } ?>
  </div>
</li>
<?php		
	}
	echo '</ul></div>';
	} }
	
	wp_reset_postdata(); 
	}

if((admania_get_option('admania-enable-related-post-by-category')) == false) // related posts display by category
	{
		
		
		if(admania_get_option('admania_relatedpostbycategorycount') != false){
		
		$admania_rpbycategory = admania_get_option('admania_relatedpostbycategorycount');
		
		}
		else{
		
		$admania_rpbycategory = '3';
		
		}
		
	
	$admania_categories = get_the_category($post->ID);
	if ($admania_categories) {		
	
	$category_ids = array();
	foreach($admania_categories as $admania_individual_category) $admania_category_ids[] = $admania_individual_category->term_id;
	$admania_relargs=array(
	'category__in' => $category_ids,
	'orderby'=>$admania_orderbychs1,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> $admania_rpbycategory, // Number of related posts that will be displayed.
	'ignore_sticky_posts'=>1,	
	);
				
	$admania_my_query = new wp_query( $admania_relargs );
	
		
	if( $admania_my_query->have_posts() ) {
		
	 
	echo '<div class="admania_related_posts">
	<h5 class="admania_related_postsheading">'.esc_html__('You May Also Like','admania').'</h5><ul>';
	while( $admania_my_query->have_posts() ) {
	$admania_my_query->the_post(); 
	?>
<li>
  <?php			  
					  
		$admaniafeatured_imgwidth1 = 250;
		$admaniafeatured_imgheight1 = 150;

		$admania_postthumb1 = get_post_thumbnail_id();
		$admaniapost_imgsrc = wp_get_attachment_url( $admania_postthumb1,'full'); //get img URL	
		$admania_relatedimgurl = admania_autoresize($admaniapost_imgsrc,$admaniafeatured_imgwidth1,$admaniafeatured_imgheight1,true);		 
		$admania_featdvidurl = get_post_meta($post->ID, '_admania_featured_videourl', true); 
		$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
		$admania_vimeo_matchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
		$admania_souncloud_matchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
		$admania_framename = "iframe";  			  
						
			if($admania_featdvidurl != false) {

				if(preg_match($admania_youtube_matchexp , $admania_featdvidurl)) {
						
				$admania_featdvidurl = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admaniafeatured_imgwidth1)."\" height=\"".absint($admaniafeatured_imgheight1)."\" src=\"//www.youtube.com/embed/$1\"  allowfullscreen></iframe>",$admania_featdvidurl);
						
				echo wp_kses_stripslashes($admania_featdvidurl);					
						
			}
						
			elseif(preg_match($admania_vimeo_matchexp , $admania_featdvidurl)) {						
												
				$admania_vimeovideos = preg_replace( $admania_vimeo_matchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admaniafeatured_imgwidth1)."\" height=\"".absint($admaniafeatured_imgheight1)."\" src=\"//player.vimeo.com/video/$3\"  allowfullscreen></iframe>",$admania_featdvidurl);
						
				echo wp_kses_stripslashes($admania_vimeovideos);
						
			}
						
			elseif(preg_match( $admania_souncloud_matchexp , $admania_featdvidurl)) {
						
				$admania_souncloudsng = preg_replace( $admania_souncloud_matchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admaniafeatured_imgwidth1).'" height="'.absint($admaniafeatured_imgheight1).'"  src="https://w.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_featdvidurl); 
						
				echo wp_kses_stripslashes($admania_souncloudsng);	
						
			}					
				
			}
						
			elseif($admaniapost_imgsrc != false && $admania_featdvidurl == "" ) { 
			?>
  <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_html(the_title()); ?>"> <img src="<?php echo esc_url($admania_relatedimgurl);  ?>" alt="<?php esc_html_e('image','admania');?>"/> </a>
  <?php 
			}
				        
	        ?>
  <div class="admania_rel_entry_meta">
    <?php the_title( sprintf( '<h2 class="admania_entry_title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
    <?php  if( 1 != (int) $admania_bylineck )  {  ?>
    <div class="admania_entry_cat">
      <?php
	   if(admania_get_option('admania_ppostedon') != TRUE) { ?>
      <span class="admania_date">
      <?php  esc_html_e('On','admania'); ?>
      <?php the_time(get_option( 'date_format' )); ?>
      </span>
      <?php
	  }
	   if(admania_get_option('admania_pcategory') != TRUE) { ?>
      <span class="admania_dividerlne">|</span> <span class="admania_catgory">
      <?php  esc_html_e('In','admania'); ?>
      <?php  the_category(' ,');?>
      </span>
      <?php }  ?>
    </div>
    <?php }  ?>
  </div>
</li>
<?php

	}
	echo '</ul></div>';
	} 
	}
	
	wp_reset_postdata();
	
	}

}
}

endif;

/*-----------------------------------------------------------------------------------*/
# Admania Pagination
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'admania_paging_nav' ) ) :
/**
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function admania_paging_nav() {

 if(admania_get_option('admania_hmpgpaginationno') != true) {
	
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$admania_paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$admania_pagenum_link = html_entity_decode( get_pagenum_link() );
	$admania_query_args   = array();
	$admania_url_parts    = explode( '?', $admania_pagenum_link );

	if ( isset( $admania_url_parts[1] ) ) {
		wp_parse_str( $admania_url_parts[1], $admania_query_args );
	}

	$admania_pagenum_link = remove_query_arg( array_keys( $admania_query_args ), $admania_pagenum_link );
	$admania_pagenum_link = trailingslashit( $admania_pagenum_link ) . '%_%';

	$admania_format  = $wp_rewrite->using_index_permalinks() && ! strpos( $admania_pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$admania_format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$admania_pagenav_links = paginate_links( array(
		'base'     => $admania_pagenum_link,
		'format'   => $admania_format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $admania_paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $admania_query_args ),
		'prev_text' => esc_html__( '&larr; Previous', 'admania' ),
		'next_text' => esc_html__( 'Next &rarr;', 'admania' ),
	) );

	if ( $admania_pagenav_links ) :

	?>
<div class="admania_pagination"> <?php echo wp_kses_stripslashes($admania_pagenav_links); ?> </div>
<!-- .admania_pagination -->

<?php
	endif;
}
}
endif;


/*-----------------------------------------------------------------------------------*/
# Admania FeaturedImage
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'admania_featuredimage' ) ) :
 
function admania_featuredimage() { 

    global $post,$admania_counter;
	
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";
	
	$admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1');
	
	if($admania_blog_layout == 'amblyt1') {
	
	if(admania_get_option('layt4_cnt_frstlaytlstsdbr') == 1) {
	$admania_fwidth = '859';
	$admania_fheight = '450';
	}
	else {	
	$admania_fwidth = '653';
	$admania_fheight = '393';
	}
		
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img

	if(($admania_ytdimg != "")  || ($admania_image != "")){
	
	if($admania_ytdimg != "") {
	
	if(preg_match($admania_youtube_matchexp , $admania_ytdimg)) {	
	
	$admania_yuvid = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth)."\" height=\"".absint($admania_fheight)."\" src=\"https://www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_yuvid);
	
	}
	
	elseif(preg_match($admania_vimeomatchexp , $admania_ytdimg)) {
	
	$admania_vimeovideos = preg_replace( $admania_vimeomatchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth)."\" height=\"".absint($admania_fheight)."\" src=\"https://player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admania_ytdimg);
	
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

	}

    }

    elseif($admania_blog_layout == 'amblyt2') {	
	
    if(((!is_single()) && (!is_page()))) {
	$admania_fwidth = '370';
	$admania_fheight = '240';
	}
	else{
	$admania_fwidth = '864';
	$admania_fheight = '450';	
	}
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	?>
	
	<div class="admania_entryimage">
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
	?>	 
	</div>
    <?php	
    }
    elseif($admania_blog_layout == 'amblyt3') {	
	$admania_ftdimgclass = '';
    if(((!is_single()) && (!is_page()))) {
	$admania_fwidth = '259';
	$admania_fheight = '168';
	$admania_ftdimgclass = 'admania_gridpostimg';
	}
	else{
	$admania_fwidth = '864';
	$admania_fheight = '450';	
	}
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	?>
	
	<div class="admania_entryimage <?php echo esc_attr($admania_ftdimgclass); ?>">
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
	?>	 
	</div>
<?php	
}
elseif($admania_blog_layout == 'amblyt4') {	

    if(is_single() || is_page()) {
	if(admania_get_option('layt4_cnt_lstsdbr') == 1) {
	$admania_fwidth = '859';
	$admania_fheight = '450';
	}
	elseif(admania_get_option('layt4_cnt_rgtsdbr') == 1){
	$admania_fwidth = '680';
	$admania_fheight = '408';	
	}	
	else {
	$admania_fwidth = '653';
	$admania_fheight = '408';
	}
	}
	else {
		if((admania_get_option('layt4_cnt_rgtsdbr') == 1) && (admania_get_option('layt4_cnt_lstsdbr') == 1)) {
		$admania_fwidth = '871';
	$admania_fheight = '453';		
		}
		else {
    if(admania_get_option('layt4_cnt_lstsdbr') == 1) {
	$admania_fwidth = '611';
	$admania_fheight = '382';
	}
	elseif(admania_get_option('layt4_cnt_rgtsdbr') == 1){
	$admania_fwidth = '680';
	$admania_fheight = '408';	
	}	
	else {
	$admania_fwidth = '472';
	$admania_fheight = '295';
	}
		}	
	}
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img

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

	}
}

elseif($admania_blog_layout == 'amblyt5') {	

    $admania_bylineck = admania_get_option('admania_ebylfp');

    if(is_single() || is_page()) {
	$admania_fwidth = '859';
	$admania_fheight = '447';
	}
	else {
	$admania_fwidth = '418';
	$admania_fheight = '261';	
	}
	
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	if(!is_single() && !is_page()) {
		
		if(($admania_image == "") && ($admania_ytdimg == "")):
		$admania_wotftdimage = 'admania_layt5wotftimg';
		else:
		$admania_wotftdimage = '';
		endif;
    ?>
   	<div class="admanialayt5_entryheader <?php echo esc_attr($admania_wotftdimage); ?>">
	
	<?php	
	}   
	
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
	}

if(!is_single() && !is_page()) { 	
	?>
	
	<div class="admanialayt5_entrymeta_ads">
            <?php							
				if(admania_get_option('admania_ebylfp') != TRUE) {
				if(admania_get_option('admania_pcategory') != TRUE) {
			?>
			<div class="admania_entrymeta admanialayt5_entrymeta"> 
				<?php esc_html_e('In','admania'); ?>
				<?php the_category(' , '); ?>
			</div>				
			<?php } } ?>
			<div class="admania_entryheader admania_layt4entryheader">
				<?php the_title( sprintf( '<h2 class="admania_entrytitle" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
					<div class="admania_entrybyline admania_layt5entrybyline">
						<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="admania_stickypost">
						<?php esc_html_e( 'Featured', 'admania' ); ?>
					</span>
					<div class="admania_entrybylinecd">|</div>
						<?php endif; ?>
						<?php
										if( 1 != (int) $admania_bylineck )  { 
										   if(admania_get_option('admania_ppostedby') != TRUE) {
                                            echo get_avatar( get_the_author_meta( 'user_email' ), 15 );											   
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
	</div>
	<?php
	}
	if(!is_single() && !is_page()) { 	
	?>
</div>
<?php
}
}
}
endif;


/*-----------------------------------------------------------------------------------*/
# Admania Breadcrumb
/*-----------------------------------------------------------------------------------*/



if ( ! function_exists( 'admania_breadcrumb' ) ) :

function admania_breadcrumb() {
global $post;
	$admania_delimiter = '/';	
	echo '<div class="admania_breadcrumb">';	
	$admania_homeLink = home_url();
	echo '<a href="' . esc_url($admania_homeLink) . '" class="bcb">'.esc_html__('Home','admania').'</a> ' . esc_attr($admania_delimiter) . ' ';
	

if ( is_single() && !is_attachment() ) {

	if ( get_post_type() != 'post' ) {
	
		$admania_post_type = get_post_type_object(get_post_type());
		$admania_slug = $admania_post_type->rewrite;
		echo '<a href="' . esc_url($admania_homeLink) . '/' . esc_html($admania_slug['slug']) . '/">' . esc_html($admania_post_type->labels->singular_name) . '</a>' . esc_attr($admania_delimiter) . ' ';
		echo esc_html(get_the_title());
	
	} 

else {

	$admania_cat = get_the_category(); 
	$admania_cat = $admania_cat[0];
	echo get_category_parents($admania_cat, TRUE, ' ' . $admania_delimiter . ' ');
	echo esc_html(get_the_title());
	
}
} 


elseif ( is_attachment() ) {

	$admania_parent_id  = $post->post_parent;
	$admania_breadcrumbs = array();
	while ($admania_parent_id) {
	$admania_page = get_page($admania_parent_id);
	$admania_breadcrumbs[] = '<a href="' . esc_url(get_permalink($admania_page->ID)) . '">' . esc_html(get_the_title($admania_page->ID)) . '</a>';
	$admania_parent_id    = $admania_page->post_parent;
	}
	$admania_breadcrumbs = array_reverse($admania_breadcrumbs);
	foreach ($admania_breadcrumbs as $admania_crumb) echo ' ' . wp_kses_stripslashes($admania_crumb) . ' ' . wp_kses_stripslashes($admania_delimiter) . ' ';
	echo esc_html(get_the_title());

} 

elseif ( is_page() && !$post->post_parent ) {

	echo esc_html(get_the_title());
	
} 

elseif ( is_page() && $post->post_parent ) {

	$admania_parent_id  = $post->post_parent;
	$admania_breadcrumbs = array();
	while ($admania_parent_id) {
	$admania_page = get_page($admania_parent_id);
	$admania_breadcrumbs[] = '<a href="' . esc_url(get_permalink($admania_page->ID)) . '">' . esc_html(get_the_title($admania_page->ID)) . '</a>';
	$admania_parent_id    = $admania_page->post_parent;
	
}

$admania_breadcrumbs = array_reverse($admania_breadcrumbs);
foreach ($admania_breadcrumbs as $admania_crumb) 
echo ' ' . wp_kses_stripslashes($admania_crumb) . ' ' . wp_kses_stripslashes($admania_delimiter) . ' ';
echo esc_html(get_the_title());

} 

if ( get_query_var('paged') ) {
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '(';
echo ('Page') . ' ' . get_query_var('paged');
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}

echo '</div>';

}

endif;

	
/*-----------------------------------------------------------------------------------*/
# Adds Admania post content ad
/*-----------------------------------------------------------------------------------*/	
	
	if(! function_exists( 'admania_adcontent' )):
	function admania_adcontent($admania_content){
		
	 if ( class_exists( 'Woocommerce' ) ):
	 
	 return $admania_content;
	 
	 else:
	 
	 global $post,$admania_options,$admania_posttype;
	 
     $admania_posttypes = get_post( $post->ID );
	 
     $admania_posttype = $admania_posttypes->post_type; // post type 	
	 
 	 if (((!is_single()) && (!is_page()))) return $admania_content;
	       	
	if($admania_posttype == 'post') {
	
	 //Single Post Metabox Variables 
 
	$admania_pstadenable3 = get_post_meta($post->ID, '_admania_pstadenable3', true);
	$admania_bfpstadhtmlcd3 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd3', true);
	$admania_bfpstadglecd3 = get_post_meta($post->ID, '_admania_bfpstadglecd3', true);
	$admania_bfpstadimg3 = get_post_meta($post->ID, '_admania_bfpstadimg3', true);
	$admania_bfpstadimglnk3 = get_post_meta($post->ID, '_admania_bfpstadimglnk3', true);
	$admania_pstadpstnbr1 = get_post_meta($post->ID, '_admania_pstadpstnbr1', true); 
	
	if($admania_pstadenable3 != false) {
	$admania_paragraphAfter = $admania_pstadpstnbr1;
	}
	else {
	
	$admania_paragraphAfter = admania_get_option('snglepst_aftrnthparano'); //Enter number of paragraphs to display ad after.

	}
	
	$admania_content = explode("</p>", $admania_content);
	$admania_newcontent = '';
	for ($i = 0; $i < count($admania_content); $i++) {
	if ($i == $admania_paragraphAfter) {
	
	    $admania_rmvcatids11 =  admania_get_option('ad_rmcatlist12');			
$admania_rmvcatids_extractids11 = explode(',',$admania_rmvcatids11);			
			
$admania_rmvtagids11 = admania_get_option('ad_rmtaglist12');
$admania_rmvtagids_extractids11 = explode(',',$admania_rmvtagids11);			
			
    if((!is_category($admania_rmvcatids_extractids11)) && (!is_tag($admania_rmvtagids_extractids11))) {
	
		if(($admania_pstadenable3 != false) || (admania_get_option('sngle_pstinrnthad') != false)) { 
		 
		$admania_newcontent.= '<div class="admania_aftrnthprad admania_themead">';
	   
  	    if((admania_get_lveditoption('hdr_lvedlhtmlad12') != false) || (admania_get_lveditoption('hdr_lvedlglead12') != false) || (admania_get_lveditoption('admania_lvedtimg_url12') != false)) {
						
 
			if(admania_get_lveditoption('hdr_lvedlhtmlad12') != false):			
			
			$admania_newcontent.= admania_get_lveditoption('hdr_lvedlhtmlad12');			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead12') != false):

			$admania_newcontent.= admania_get_lveditoption('hdr_lvedlglead12');	
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url12') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url12') != false) ):
			
			$admania_newcontent.= '<a href="'.esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url12')).'">';	
			
			$admania_newcontent.= ' <img src="'.esc_url(admania_get_lveditoption('admania_lvedtimg_url12')).'" alt="'.esc_html__('adimage','admania').'"/>';
			
			$admania_newcontent.= '</a>';			
					
			endif; 	
	
	        
			
			}
	else {
	if($admania_pstadenable3 != false) {
	
		
 
			if($admania_bfpstadhtmlcd3 != false):			
			
			$admania_newcontent.= $admania_bfpstadhtmlcd3;			
			
			endif;
			
			if($admania_bfpstadglecd3 != false):

			$admania_newcontent.= $admania_bfpstadglecd3;	
			
			endif;
			
			if(($admania_bfpstadimg3 != false) || ($admania_bfpstadimglnk3 != false) ):
			
			$admania_newcontent.= '<a href="'.esc_url($admania_bfpstadimglnk3).'">';	
			
			$admania_newcontent.= ' <img src="'.esc_url($admania_bfpstadimg3).'" alt="'.esc_html__('adimage','admania').'"/>';
			
			$admania_newcontent.= '</a>';			
					
			endif; 
	
	
	
	
	}
	
	else {
	if (admania_get_option('sngle_pstinrnthad') != '') {		
	
 
			if(admania_get_option('sngle_pstinrnthhtmlad') != false):			
			
			$admania_newcontent.= admania_get_option('sngle_pstinrnthhtmlad');			
			
			endif;
			
			if(admania_get_option('sngle_pstinrnthgglead') != false):

			$admania_newcontent.= admania_get_option('sngle_pstinrnthgglead');	
			
			endif;
			
			if((admania_get_option('admania_adimg_url13') != false) || (admania_get_option('admania_adimgtg_url13') != false) ):
			
			$admania_newcontent.= '<a href="'.esc_url(admania_get_option('admania_adimgtg_url13')).'">';	
			
			$admania_newcontent.= ' <img src="'.esc_url(admania_get_option('admania_adimg_url13')).'" alt="'.esc_html__('adimage','admania').'"/>';
			
			$admania_newcontent.= '</a>';			
					
			endif; 
	
	
	
	}
	}
	}	
	if(current_user_can('administrator')){			
    $admania_newcontent.= '<div class="admania_adeditablead1 admania_lvetresitem12">';				
	$admania_newcontent.= '<i class="fa fa-edit"></i>';
	$admania_newcontent.= ''.esc_html__('Edit','admania').'';
    $admania_newcontent.= '</div>';			 
    } 
	$admania_newcontent.= '</div>';
	}
	}
	}	
	
	$admania_newcontent.= $admania_content[$i];
	}
	
	return $admania_newcontent;
	
	}

	elseif($admania_posttype == 'page') {	
	
	// Page Metabox Variables  

	$admania_pgepstadenable3 = get_post_meta($post->ID, '_admania_pgepstadenable3', true);
	$admania_bfpgepstadhtmlcd3 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd3', true);
	$admania_bfpgepstadglecd3 = get_post_meta($post->ID, '_admania_bfpgepstadglecd3', true);
	$admania_bfpgepstadimg3 = get_post_meta($post->ID, '_admania_bfpgepstadimg3', true);
	$admania_bfpgepstadimglnk3 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk3', true); 
    $admania_pgepstadpgepstnbr1 = get_post_meta($post->ID, '_admania_pgepstadpgepstnbr1', true); 
	
	if($admania_pgepstadenable3 != false) {
	$admania_pgeparagraphAfter = $admania_pgepstadpgepstnbr1;
	}
	else {
	$admania_pgeparagraphAfter = admania_get_option('pagepst_aftrnthparano'); //Enter number of paragraphs to display ad after.
	}
	$admania_content = explode("</p>", $admania_content);
	$admania_pgnewcontent = '';
	for ($pi = 0; $pi < count($admania_content); $pi++) {
	if ($pi == $admania_pgeparagraphAfter) {
	$admania_rmvcatids17 =  admania_get_option('ad_rmcatlist18');			
	$admania_rmvcatids_extractids17 = explode(',',$admania_rmvcatids17);			
	$admania_rmvtagids17 = admania_get_option('ad_rmtaglist18');
	$admania_rmvtagids_extractids17 = explode(',',$admania_rmvtagids17);			
			
    if((!is_category($admania_rmvcatids_extractids17)) && (!is_tag($admania_rmvtagids_extractids17))) {	
	
	if(($admania_pgepstadenable3 != false) || (admania_get_option('page_pstinrnthad') != '')) {
	
		$admania_pgnewcontent.= '<div class="admania_pgaftrnthprad admania_themead">';
	   
  	    if((admania_get_lveditoption('hdr_lvedlhtmlad19') != false) || (admania_get_lveditoption('hdr_lvedlglead19') != false) || (admania_get_lveditoption('admania_lvedtimg_url19') != false)) {
					 
			if(admania_get_lveditoption('hdr_lvedlhtmlad19') != false):			
			
			$admania_pgnewcontent.= admania_get_lveditoption('hdr_lvedlhtmlad19');			
			
			endif;
			
			if(admania_get_lveditoption('hdr_lvedlglead19') != false):

			$admania_pgnewcontent.= admania_get_lveditoption('hdr_lvedlglead19');	
			
			endif;
			
			if((admania_get_lveditoption('admania_lvedtimg_url19') != false) || (admania_get_lveditoption('admania_lvedtrimgtg_url19') != false) ):
			
			$admania_pgnewcontent.= '<a href="'.esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url19')).'">';	
			
			$admania_pgnewcontent.= ' <img src="'.esc_url(admania_get_lveditoption('admania_lvedtimg_url19')).'" alt="'.esc_html__('adimage','admania').'"/>';
			
			$admania_pgnewcontent.= '</a>';			
					
			endif; 	
	   }
	
	else {
	
	if($admania_pgepstadenable3 != false) {		
 
			if($admania_bfpgepstadhtmlcd3 != false):			
			
			$admania_pgnewcontent.= $admania_bfpgepstadhtmlcd3;			
			
			endif;
			
			if($admania_bfpgepstadglecd3 != false):

			$admania_pgnewcontent.= $admania_bfpgepstadglecd3;	
			
			endif;
			
			if(($admania_bfpgepstadimg3 != false) || ($admania_bfpgepstadimglnk3 != false) ):
			
			$admania_pgnewcontent.= '<a href="'.esc_url($admania_bfpgepstadimglnk3).'">';	
			
			$admania_pgnewcontent.= ' <img src="'.esc_url($admania_bfpgepstadimg3).'" alt="'.esc_html__('adimage','admania').'"/>';
			
			$admania_pgnewcontent.= '</a>';			
					
			endif; 
	
	
	}
	else {
	if (admania_get_option('page_pstinrnthad') != '') {		
	 
			if(admania_get_option('page_pstinrnthhtmlad') != false):			
			
			$admania_pgnewcontent.= admania_get_option('page_pstinrnthhtmlad');			
			
			endif;
			
			if(admania_get_option('page_pstinrnthgglead') != false):

			$admania_pgnewcontent.= admania_get_option('page_pstinrnthgglead');	
			
			endif;
			
			if((admania_get_option('admania_adimg_url20') != false) || (admania_get_option('admania_adimgtg_url20') != false) ):
			
			$admania_pgnewcontent.= '<a href="'.esc_url(admania_get_option('admania_adimgtg_url20')).'">';	
			
			$admania_pgnewcontent.= ' <img src="'.esc_url(admania_get_option('admania_adimg_url20')).'" alt="'.esc_html__('adimage','admania').'"/>';
			
			$admania_pgnewcontent.= '</a>';			
					
			endif; 
	
	
	
	}
	}
	}
	if(current_user_can('administrator')){			
    $admania_pgnewcontent.= '<div class="admania_adeditablead1 admania_lvetresitem19">';				
	$admania_pgnewcontent.= '<i class="fa fa-edit"></i>';
	$admania_pgnewcontent.= ''.esc_html__('Edit','admania').'';
    $admania_pgnewcontent.= '</div>';			 
    } 
	$admania_pgnewcontent.= '</div>';
	}
	}
	}
	$admania_pgnewcontent.= $admania_content[$pi];
	}
		
	return $admania_pgnewcontent;
	
	}
	
	else {
	return $admania_content;
	}
   
    endif;
	
	}
	

    endif;
	
	add_filter('the_content', 'admania_adcontent');
	
/*-----------------------------------------------------------------------------------*/
# Admania Post/Page Entry Meta
/*-----------------------------------------------------------------------------------*/


if ( ! function_exists( 'admania_entrymeta' ) ) :

function admania_entrymeta() {	
global $post;
      if(is_single()) {	
		
		if(admania_get_option('admania_ebylfp') != TRUE) { ?>
<div class="admania_entrybyline admania_entrypgbyline">
  <?php  if(admania_get_option('admania_ppostedby') != TRUE) {	  ?>
  <div class="admania_entryauthor">
    <?php
		echo get_avatar( get_the_author_meta( 'user_email' ), 20 );
		?>
    <?php
	   esc_html_e('By','admania');
	   ?>
    <?php the_author_posts_link(); ?>
  </div>
  <div class="admania_entryline"> / </div>
  <?php  }     
	if(admania_get_option('admania_ppostedon') != TRUE) {
	 ?>
  <div class="admania_entrydate">
    <?php
	   esc_html_e('On','admania');
	   ?>
    <?php the_time(get_option( 'date_format')); ?>
  </div>
  <div class="admania_entryline"> / </div>
  <?php  }
   if(admania_get_option('admania_ppostedtime') != TRUE) {
   ?>
    <div class="admania_entrydate">
    <?php
	   esc_html_e('At','admania');
	?>
    <?php the_time(get_option( 'time_format')); ?>
    </div>   
    <div class="admania_entryline"> / </div>
   <?php
   }
   if(admania_get_option('admania_pcategory') != TRUE) {
   ?>
  <div class="admania_entrycategory">
    <?php
	   esc_html_e('In','admania');
	   ?>
    <?php the_category(' , '); ?>
  </div>
  <?php  }
	 $admania_postformat = get_post_format();
	
	 if(!empty($admania_postformat)) { ?>
  <div class="admania_entryline"> / </div>
  <div class="admania_entry_format"> <i class="fa admania_fontaws"></i> <a href="<?php echo esc_url( get_post_format_link( $admania_postformat ));?>">
    <?php  echo esc_html($admania_postformat); ?>
    </a> </div>
  <?php
			
	 }
	 if(admania_get_option('admania_dsebyvw') != TRUE) {	 
	 ?>
  <div class="admania_viewcnt"> <?php echo admania_get_post_views($post->ID); ?> <span class="admania_view_text">
    <?php esc_html_e('Views','admania'); ?>
    </span> </div>
  <?php  } ?>
</div>
<?php  }
}

if(is_page()) {
		if(admania_get_option('admania_ebylfpage') != '') {
		?>
<div class="admania_entrybyline admania_entrypgbyline">
  <?php if(admania_get_option('padmania_ppostedby') != '') {  ?>
  <div class="admania_entryauthor">
    <?php
		echo get_avatar( get_the_author_meta( 'user_email' ), 20 );
		?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author_posts_link(); ?>
  </div>
  <div class="admania_entryline"> / </div>
  <?php  } 
	 if(admania_get_option('padmania_ppostedon') != '') {
	 ?>
  <div class="admania_entrydate">
    <?php esc_html_e('On','admania'); ?>
    <?php the_time(get_option( 'date_format')); ?>
  </div>
  <?php  }
	
	 if(admania_get_option('padmania_ppview') != '') {
	 ?>
  <div class="admania_viewcnt"> <?php echo admania_get_post_views($post->ID); ?> <span class="admania_view_text">
    <?php esc_html_e('Views','admania'); ?>
    </span> </div>
  <?php  } ?>
</div>
<?php } 
}	 
}	
endif;
	

	
	
/*-----------------------------------------------------------------------------------*/
# ADMANIA REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */
/*-----------------------------------------------------------------------------------*/	

if (class_exists( 'Woocommerce' )):

/*STEP 1 - REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */
if ( ! function_exists( 'admania_remove_loop_button' ) ) :
function admania_remove_loop_button(){	
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}
endif;

add_action('init','admania_remove_loop_button');

/*-----------------------------------------------------------------------------------*/
# ADMANIA REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */
/*-----------------------------------------------------------------------------------*/	

/*STEP 2 -ADD NEW BUTTON THAT LINKS TO PRODUCT PAGE FOR EACH PRODUCT   */

add_action('woocommerce_before_shop_loop_item_title','admania_replace_add_to_cart',10);
if ( ! function_exists( 'admania_replace_add_to_cart' ) ) :
function admania_replace_add_to_cart() {
global $product;
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-quantity="1" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s ajax_add_to_cart admania_add_to_cart"><i class="fa fa-shopping-cart"></i> %s</a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->id ),
        esc_attr( $product->get_sku() ),
        $product->is_purchasable() ? 'add_to_cart_button' : '',
        esc_attr( $product->product_type ),
        esc_html( $product->add_to_cart_text() )
    ),
$product);

}
endif;

/*-----------------------------------------------------------------------------------*/
# ADMANIA REMOVE ADD TO CART BUTTON ON PRODUCT ARCHIVE (SHOP) */
/*-----------------------------------------------------------------------------------*/	

add_action('woocommerce_shop_loop_item_title', 'admania_add_star_rating');
if ( ! function_exists( 'admania_add_star_rating' ) ) :
function admania_add_star_rating()
{
global $woocommerce, $product;
$admania_average = $product->get_average_rating();

echo '<div class="star-rating"><span style="width:'.( ( $admania_average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.esc_attr($admania_average).'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>';
}
endif;
endif;

