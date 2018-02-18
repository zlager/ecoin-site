<?php

/**
 * Theme slider content Section for our theme.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 ?>

<!-- #Admania-SliderSection  -## -->

<?php if(admania_get_option('hm_slideractive') != false):  ?>

<div class="admania_featuredslider" id="admania_owldemo1">
  <?php

    $admania_catidsoptn1 = admania_get_option('hm_sliderctgrsid');		
	$admania_ckthecatpst1 = admania_get_option('hm_sliderctgs');		
	$admania_ckthesldpst1 = admania_get_option('hm_sliderpstids');
	$admania_postperpage = admania_get_option('hm_sliderpostperpage');		
	$admania_latestpstck = admania_get_option('hm_sliderrandorlatst');


if($admania_latestpstck == 'Random'):

$admania_postorder = 'rand';

else:

$admania_postorder = 'date';

endif;

	



if(!empty($admania_ckthecatpst1) != ''):

$admaniaheaderslider_lay1args = array( 
'category_name' => $admania_ckthecatpst1,
'orderby'=>$admania_postorder,
'posts_per_page'=>$admania_postperpage,
'ignore_sticky_posts' => 1 
);

endif;

if(!empty($admania_ckthesldpst1) != ''):
$admania_ckthesldpst_id1 = explode(',',$admania_ckthesldpst1);
$admaniaheaderslider_lay1args = array( 
'post__in' => $admania_ckthesldpst_id1,
'orderby'=>$admania_postorder,
'posts_per_page'=>$admania_postperpage,
'ignore_sticky_posts' => 1
);

endif;

if(!empty($admania_catidsoptn1) != ''):	
  $admania_category_idopts1 = explode(',',$admania_catidsoptn1);
   $admaniaheaderslider_lay1args = array(
   'cat'=>$admania_category_idopts1,
   'orderby'=>$admania_postorder,
   'posts_per_page'=>$admania_postperpage,
   'ignore_sticky_posts' => 1
   );
  

endif;

if(((!empty($admania_ckthecatpst1) != '') || (!empty($admania_ckthesldpst1) != '') || (!empty($admania_catidsoptn1) != '') )){
 // the query  
   $admaniaheaderslider_lay1query = new WP_Query( $admaniaheaderslider_lay1args );

	
	while ( $admaniaheaderslider_lay1query->have_posts() ) : $admaniaheaderslider_lay1query->the_post();
		
	
	if(admania_get_option('layt4_cnt_frstlaytlstsdbr') == 1) {
	$admania_fwidth = '859';
	$admania_fheight = '450';
	}
	else {	
	$admania_fwidth = '653';
	$admania_fheight = '318';
	}
	
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";
	
	if(($admania_ytdimg == "")  && ($admania_image == "")){
	$admania_sliderwotimg = 'admania_sliderwotimg';
	}
	else {
	$admania_sliderwotimg = '';
	}
	?>
  <div class="admania_slider <?php echo esc_attr($admania_sliderwotimg); ?>">
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
	
	$admania_souncloudsng = preg_replace( $admania_souncloudmatchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admania_fwidth).'" height="'.absint($admania_fheight).'" scrolling="no" src="https://www.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_ytdimg); 
	
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
			  ?>
    <div class="admania_slidercontent">
	<?php
	if(admania_get_option('admania_ebylfp') != TRUE) { 
	if(admania_get_option('admania_pcategory') != TRUE) {
	?>	 
      <div class="admania_slidermeta">
        <div class="admania_slidercat">
          <?php the_category(' , '); ?>
        </div>
      </div>
	<?php } } ?>
	  <h2>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
	  </h2>
     
    </div>
  </div>
  <?php 
   endwhile; 
   wp_reset_postdata();
   }
   ?>
</div>
<?php endif; ?>

<!-- #Admania-FeaturedCategorySection  -## -->

<?php if(admania_get_option('admania_featuredactv') != false):  ?>
<div class="admania_featuredcategory">
  <?php
    $admania_catidsoptn2 = admania_get_option('admania_ftdcatid');	
	$admania_ckthecatpst2 = admania_get_option('admania_ftdcatgrs');		
	$admania_ckthesldpst2 = admania_get_option('admania_ftdpstid');		
	$admania_latestpstck1 = admania_get_option('admania_randorlatst1');


if($admania_latestpstck1 == 'Random'):

$admania_postorder1 = 'rand';

else:

$admania_postorder1 = 'date';

endif;





if(!empty($admania_ckthecatpst2) != ''):

$admaniaheaderslider_lay2args = array( 
'category_name' => $admania_ckthecatpst2,
'orderby'=>$admania_postorder1,
'posts_per_page'=>3,
'ignore_sticky_posts' => 1
);

endif;


if((!empty($admania_ckthesldpst2) != '')):

$admania_ckthesldpst_id2 = explode(',',$admania_ckthesldpst2);
$admaniaheaderslider_lay2args = array( 
'post__in' => $admania_ckthesldpst_id2,
'orderby'=>$admania_postorder1,
'posts_per_page'=>3,
'ignore_sticky_posts' => 1
);

endif;


	
if(!empty($admania_catidsoptn2) != ''):	
  $admania_category_idopts2 = explode(',',$admania_catidsoptn2);
   $admaniaheaderslider_lay2args = array(
   'cat'=>$admania_category_idopts2,
   'orderby'=>$admania_postorder1,
   'posts_per_page'=>3,
   'ignore_sticky_posts' => 1
   );
  

endif;

if(((!empty($admania_ckthecatpst2) != '') || (!empty($admania_ckthesldpst_id2) != '') || (!empty($admania_category_idopts2) != '') )){
 // the query  
   $admaniaheaderslider_lay2query = new WP_Query( $admaniaheaderslider_lay2args );

	
	while ( $admaniaheaderslider_lay2query->have_posts() ) : $admaniaheaderslider_lay2query->the_post();
	
	if(admania_get_option('layt4_cnt_frstlaytlstsdbr') == 1) {
	if(wp_is_mobile()) {	
	$admania_fwidth1 = '450';
	$admania_fheight1 = '250';		
	}
	else {
	$admania_fwidth1 = '260';
	$admania_fheight1 = '187';
	}
	}
	else {
	if(wp_is_mobile()) {
	
	$admania_fwidth1 = '450';
	$admania_fheight1 = '250';	
	
	}
	else {
	$admania_fwidth1 = '198';
	$admania_fheight1 = '142';	
	}
	}
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth1, $admania_fheight1, true ); //resize & crop img
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";
	
	if(($admania_ytdimg == "")  && ($admania_image == "")){
	$admania_sliderwotimg1 = 'admania_ftdcatwotimg';
	}
	else {
	$admania_sliderwotimg1 = '';
	}
	?>
  <div class="admania_featcatlist <?php echo esc_attr($admania_sliderwotimg1);  ?>">
    <?php
			  
			 
			  
			  	if(($admania_ytdimg != "")  || ($admania_image != "")){
	
	if($admania_ytdimg != "") {
	
	if(preg_match($admania_youtube_matchexp , $admania_ytdimg)) {	
	
	$admania_yuvid = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth1)."\" height=\"".absint($admania_fheight1)."\" src=\"//www.youtube.com/embed/$1\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_yuvid);
	
	}
	
	elseif(preg_match($admania_vimeomatchexp , $admania_ytdimg)) {
	
	$admania_vimeovideos = preg_replace( $admania_vimeomatchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth1)."\" height=\"".absint($admania_fheight1)."\" src=\"//player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_vimeovideos);
	
	}
	
	elseif(preg_match( $admania_souncloudmatchexp , $admania_ytdimg)) {	
	
	$admania_souncloudsng = preg_replace( $admania_souncloudmatchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admania_fwidth1).'" height="'.absint($admania_fheight1).'" scrolling="no" src="https://www.soundcloud.com/player/?url=https://soundcloud.com/$1&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_ytdimg); 
	
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
		
	if(admania_get_option('admania_ebylfp') != TRUE) { 
	if(admania_get_option('admania_pcategory') != TRUE) {
	?>	 

    <div class="admania_ftdcategorycontent">
      <div class="admania_ftdcategorymeta">
        <?php 
				
				$admania_catlist = get_the_category();
				
				if(!empty($admania_catlist)):	
				
				$admania_catsname = $admania_catlist[0]->name;				
				$admania_catsslug = $admania_catlist[0]->slug;				
				echo '<a href="'.esc_url(get_home_url()).'/category/'.esc_html($admania_catsslug).'" rel="category tag">'.esc_html($admania_catsname).'</a>';
				
				endif;
				
				?>
      </div>
    </div>
	<?php  } } ?>
  </div>
  <?php 
   endwhile; 
   wp_reset_postdata();
   }
   ?>
</div>
<?php endif; ?>
