<?php

/**
 * Theme slider content Section for Bloglayout3.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 ?>

<!-- #Admania-SliderSection  -## -->

<?php if(admania_get_option('hm_slideractive2') != false):  ?>

<div class="admania_featuredslider admania_bly3featuredslider" id="admania_owldemo2">
  <?php

    $admania_sld2catidsoptn2 = admania_get_option('hm_sliderctgrsid2') ;	
	
	$admania_sldckthecatpst2 = admania_get_option('hm_sliderctgs2');		
	$admania_ckthesldpst2 = admania_get_option('hm_sliderpstids2');		
	
	$admania_postperpage3 = admania_get_option('hm_sliderpostperpage2');		
	$admania_latestpstck3 = admania_get_option('hm_sliderrandorlatst2');


if($admania_latestpstck3 == 'Random'):

$admania_postorder2 = 'rand';

else:

$admania_postorder2 = 'date';

endif;


if((!empty($admania_sldckthecatpst2) != '')):

$admaniaheaderslider_lay3args = array( 
'category_name' => $admania_sldckthecatpst2,
'orderby'=>$admania_postorder2,
'posts_per_page'=>$admania_postperpage3,
'ignore_sticky_posts' => 1 
);
	
endif;

if((!empty($admania_ckthesldpst2) != '')):

$admania_ckthesldrpst_id2 = explode(',',$admania_ckthesldpst2);
$admaniaheaderslider_lay3args = array( 
'post__in' => $admania_ckthesldrpst_id2,
'orderby'=>$admania_postorder2,
'posts_per_page'=>$admania_postperpage3,
'ignore_sticky_posts' => 1
);

endif;


if((!empty($admania_sld2catidsoptn2) != '')):	
  $admania_sldcategory_idopts2 = explode(',',$admania_sld2catidsoptn2);	
   $admaniaheaderslider_lay3args = array(
   'cat'=>$admania_sldcategory_idopts2,
   'orderby'=>$admania_postorder2,
   'posts_per_page'=>$admania_postperpage3,
   'ignore_sticky_posts' => 1
   );
  

endif;


if(((!empty($admania_sldckthecatpst2) != '') || (!empty($admania_sld2catidsoptn2) != '') || (!empty($admania_ckthesldpst2) != '') )){
 // the query  
   $admaniaheaderslider_lay3query = new WP_Query( $admaniaheaderslider_lay3args );
  
 	
	while ( $admaniaheaderslider_lay3query->have_posts() ) : $admaniaheaderslider_lay3query->the_post();
	
	$admania_fwidth = '480';
	$admania_fheight = '600';
	
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";
	
	if(($admania_ytdimg == "")  && ($admania_image == "")) {
		$admania_sliderlayt3img = 'admania_sliderlyt3ftimg';
	}
	else {
		$admania_sliderlayt3img = '';
	}
	?>
  <div class="admania_slider3 <?php echo esc_attr($admania_sliderlayt3img); ?>">
    <?php			  
	if(($admania_ytdimg != "")  || ($admania_image != "")){
	
	if($admania_ytdimg != "") {
	
	if(preg_match($admania_youtube_matchexp , $admania_ytdimg)) {	
	
	$admania_yuvid = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth)."\" height=\"".absint($admania_fheight)."\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_yuvid);
	
	}
	
	elseif(preg_match($admania_vimeomatchexp , $admania_ytdimg)) {
	
	$admania_vimeovideos = preg_replace( $admania_vimeomatchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admania_fwidth)."\" height=\"".absint($admania_fheight)."\" src=\"//player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_vimeovideos);
	
	}
	
	elseif(preg_match( $admania_souncloudmatchexp , $admania_ytdimg)) {	
	
	$admania_souncloudsng = preg_replace( $admania_souncloudmatchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admania_fwidth).'" height="'.absint($admania_fheight).'" scrolling="no" src="https://www.soundcloud.com/player/?url=https://soundcloud.com/$2&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_ytdimg); 
	
	echo wp_kses_stripslashes($admania_souncloudsng);
	
	}
	
	} 		
	
	elseif($admania_image != "" && $admania_ytdimg == "" ) { 
	?>
    <img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admania'); ?>" />
    <?php 
	}
	} 	
	?>
    <div class="admania_slidercontent2">
	<?php
	if(admania_get_option('admania_ebylfp') != TRUE) { 
	if(admania_get_option('admania_pcategory') != TRUE) {
	?>	 
      <div class="admania_slidermeta2">
        <div class="admania_slidercat2">		  
          <?php the_category(' , '); ?>
        </div>
      </div>
	<?php } } ?>
      <h2><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a>
	  </h2>
	  <?php if(admania_get_option('admania_ebylfp') != TRUE) { ?>
	  <div class="admania_slidermetaby2">
	  <?php  if(admania_get_option('admania_ppostedby') != TRUE) { ?>
			<?php esc_html_e('By','admania'); ?>
			<?php  the_author_posts_link(); ?>
			-
	  <?php } if(admania_get_option('admania_ppostedon') != TRUE) { ?>
			<?php esc_html_e('On','admania'); ?>
	  <?php the_time(get_option( 'date_format')); } ?>
	   </div>
	  <?php } ?>
    </div>
  </div>
  <?php 
   endwhile; 
   wp_reset_postdata();
   }
   ?>
</div>

<?php endif; ?>


