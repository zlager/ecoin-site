<?php

/**
 * Theme slider content Section for Bloglayout5.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 ?>

<!-- #Admania-SliderSection  -## -->

<?php if(admania_get_option('hm_slideractive5') != false):  ?>

<div class="admania_featuredslider admania_bly5featuredslider">
  
    <div class="admania_siteinner" id="admania_owldemo5">

    <?php

    $admania_sld5catidsoptn5 = admania_get_option('hm_sliderctgrsid5') ;	
	$admania_sldckthecatpst5 = admania_get_option('hm_sliderctgs5');		
	$admania_ckthesldpst5 = admania_get_option('hm_sliderpstids5');
	$admania_postperpage5 = admania_get_option('hm_sliderpostperpage5');		
	$admania_latestpstck5 = admania_get_option('hm_sliderrandorlatst5');


	if($admania_latestpstck5 == 'Random'):

	$admania_postorder5 = 'rand';

	else:

	$admania_postorder5 = 'date';

	endif;

if((!empty($admania_sld5catidsoptn5) != '')):	
  $admania_sldcategory_idopts5 = explode(',',$admania_sld5catidsoptn5);	
   $admaniaheaderslider_lay5args = array(
   'cat'=>$admania_sldcategory_idopts5,
   'orderby'=>$admania_postorder5,
   'posts_per_page'=>$admania_postperpage5,
   'ignore_sticky_posts' => 1
   );
  

endif;
	
	
if((!empty($admania_sldckthecatpst5) != '')):

$admaniaheaderslider_lay5args = array( 
'category_name' => $admania_sldckthecatpst5,
'orderby'=>$admania_postorder5,
'posts_per_page'=>$admania_postperpage5,
'ignore_sticky_posts' => 1 
);
	
endif;

if((!empty($admania_ckthesldpst5) != '')):

$admania_ckthesldrpst_id5 = explode(',',$admania_ckthesldpst5);
$admaniaheaderslider_lay5args = array( 
'post__in' => $admania_ckthesldrpst_id5,
'orderby'=>$admania_postorder5,
'posts_per_page'=>$admania_postperpage5,
'ignore_sticky_posts' => 1
);

endif;





if(((!empty($admania_sldckthecatpst5) != '') || (!empty($admania_ckthesldpst5) != '') || (!empty($admania_sld5catidsoptn5) != '') )){
 // the query  
 
    $admaniaheaderslider_lay5query = new WP_Query( $admaniaheaderslider_lay5args ); 	
	while ( $admaniaheaderslider_lay5query->have_posts() ) : $admaniaheaderslider_lay5query->the_post();
	
	$admania_fwidth = '600';
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
		$admania_sliderlayt5img = 'admania_sliderlyt5ftimg';
	}
	else {
		$admania_sliderlayt5img = '';
	}
	if($admania_image != "" && $admania_ytdimg == "" ) { 
	$admania_laysl_bgimg = $admania_image; 
	}
	else {
		$admania_laysl_bgimg = '';
	}
	
	?>
  <div class="admania_slider5 <?php echo esc_attr($admania_sliderlayt5img); ?>" style="background-image:url('<?php echo esc_url($admania_laysl_bgimg); ?>');">
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
	
	} 	
	?>
    <div class="admania_slidercontent5">
	  <div class="admania_slidercontent5_inner">
		<div class="admania_slidermeta5">
		<?php if(admania_get_option('admania_ebylfp') != TRUE) { ?>
        <div class="admania_slidercat5">		  
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
		<div class="admania_slidermetaby5">
		    
			<?php
            if(admania_get_option('admania_ppostedby') != TRUE) {
			 echo get_avatar( get_the_author_meta( 'user_email' ), 20 );
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
</div>
<?php endif; ?>


