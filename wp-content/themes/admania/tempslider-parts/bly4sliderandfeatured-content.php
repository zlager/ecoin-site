<?php

/**
 * Theme slider content Section for Bloglayout4.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 ?>

<!-- #Admania-SliderSection  -## -->

<?php if(admania_get_option('hm_slideractive4') != false):  ?>

<div class="admania_featuredslider admania_bly4featuredslider" id="admania_owldemo3">
  <?php

    $admania_sld4catidsoptn4 = admania_get_option('hm_sliderctgrsid4') ;	
	
	$admania_sldckthecatpst4 = admania_get_option('hm_sliderctgs4');		
	$admania_ckthesldpst4 = admania_get_option('hm_sliderpstids4');		
	
	$admania_postperpage4 = admania_get_option('hm_sliderpostperpage4');		
	$admania_latestpstck4 = admania_get_option('hm_sliderrandorlatst4');


if($admania_latestpstck4 == 'Random'):

$admania_postorder4 = 'rand';

else:

$admania_postorder4 = 'date';

endif;


if((!empty($admania_sldckthecatpst4) != '')):

$admaniaheaderslider_lay4args = array( 
'category_name' => $admania_sldckthecatpst4,
'orderby'=>$admania_postorder4,
'posts_per_page'=>$admania_postperpage4,
'ignore_sticky_posts' => 1 
);
	
endif;

if((!empty($admania_ckthesldpst4) != '')):

$admania_ckthesldrpst_id4 = explode(',',$admania_ckthesldpst4);
$admaniaheaderslider_lay4args = array( 
'post__in' => $admania_ckthesldrpst_id4,
'orderby'=>$admania_postorder4,
'posts_per_page'=>$admania_postperpage4,
'ignore_sticky_posts' => 1
);

endif;


if((!empty($admania_sld4catidsoptn4) != '')):	
  $admania_sldcategory_idopts2 = explode(',',$admania_sld4catidsoptn4);	
   $admaniaheaderslider_lay4args = array(
   'cat'=>$admania_sldcategory_idopts2,
   'orderby'=>$admania_postorder4,
   'posts_per_page'=>$admania_postperpage4,
   'ignore_sticky_posts' => 1
   );
  

endif;


if(((!empty($admania_sldckthecatpst4) != '') || (!empty($admania_sld4catidsoptn4) != '') || (!empty($admania_ckthesldpst4) != '') )){
 // the query  
   $admaniaheaderslider_lay4query = new WP_Query( $admaniaheaderslider_lay4args );
  
 	
	while ( $admaniaheaderslider_lay4query->have_posts() ) : $admaniaheaderslider_lay4query->the_post();
	
	$admania_fwidth = '1200';
	$admania_fheight = '500';
	
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";
	
	if(($admania_ytdimg == "")  && ($admania_image == "")) {
		$admania_sliderlayt4img = 'admania_sliderlyt4ftimg';
	}
	else {
		$admania_sliderlayt4img = '';
	}
	?>
  <div class="admania_slider4 <?php echo esc_attr($admania_sliderlayt4img); ?>">
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
    <div class="admania_slidercontent4">
	  <div class="admania_slidercontent4_inner">
		<div class="admania_slidermeta4">
		<?php if(admania_get_option('admania_ebylfp') != TRUE) { ?>
        <div class="admania_slidercat4">		  
          <?php 
		  if(admania_get_option('admania_pcategory') != TRUE) {
		  
		  the_category(' , '); 
		  
		  }
		  ?>
        </div>
		<?php
		}
		?>
      </div>
		<h2><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a>
	  </h2>
	    <?php if(admania_get_option('admania_ebylfp') != TRUE) { ?>
		<div class="admania_slidermetaby4">
		    
			<?php
            if(admania_get_option('admania_ppostedby') != TRUE) {
			esc_html_e('By','admania'); 
			
			?>
			<?php  the_author_posts_link(); ?>
			-
			<?php  }
			if(admania_get_option('admania_ppostedon') != TRUE) {			
			esc_html_e('On','admania'); ?>
			<?php the_time(get_option( 'date_format')); 
			}
			?>
	   </div>
	   <?php
		}
		?>
	  </div>
    </div>
  </div>
  <?php 
   endwhile; 
   wp_reset_postdata();
   }
   ?>
</div>

<?php endif; ?>


