<?php

/**
 * Theme slider content Section for Bloglayout2.
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 ?>

<!-- #Admania-SliderSection  -## -->

<?php if(admania_get_option('hm_slideractive1') != false):  ?>

<div class="admania_featuredslider admania_bly2featuredslider" id="admania_owldemo1">
  <?php

    $admania_sld1catidsoptn1 = admania_get_option('hm_sliderctgrsid1') ;	
	$admania_sldcategory_idopts2 = explode(',',$admania_sld1catidsoptn1);	
	$admania_sldckthecatpst2 = admania_get_option('hm_sliderctgs1');		
	$admania_ckthesldpst2 = admania_get_option('hm_sliderpstids1');		
	$admania_ckthesldrpst_id2 = explode(',',$admania_ckthesldpst2);
	$admania_postperpage1 = admania_get_option('hm_sliderpostperpage1');		
	$admania_latestpstck1 = admania_get_option('hm_sliderrandorlatst1');


if($admania_latestpstck1 == 'Random'):

$admania_postorder1 = 'rand';

else:

$admania_postorder1 = 'date';

endif;


if((!empty($admania_sldckthecatpst2) != '')):

$admaniaheaderslider_lay2args = array( 
'category_name' => $admania_sldckthecatpst2,
'orderby'=>$admania_postorder1,
'posts_per_page'=>$admania_postperpage1,
'ignore_sticky_posts' => 1 
);
	

if((!empty($admania_ckthesldrpst_id2) != '') && (!empty($admania_sldcategory_idopts2) == '')):


$admaniaheaderslider_lay2args = array( 
'post__in' => $admania_ckthesldrpst_id2,
'orderby'=>$admania_postorder1,
'posts_per_page'=>$admania_postperpage1,
'ignore_sticky_posts' => 1
);

endif;

endif;

if((!empty($admania_sldcategory_idopts2) != '')):	
  
   $admaniaheaderslider_lay2args = array(
   'cat'=>$admania_sldcategory_idopts2,
   'orderby'=>$admania_postorder1,
   'posts_per_page'=>$admania_postperpage1,
   'ignore_sticky_posts' => 1
   );
  

endif;


if(((!empty($admania_sldckthecatpst2) != '') || (!empty($admania_ckthesldrpst_id2) != '') || (!empty($admania_sldcategory_idopts2) != '') )){
 // the query  
   $admaniaheaderslider_lay1query = new WP_Query( $admaniaheaderslider_lay2args );
  
 	
	while ( $admaniaheaderslider_lay1query->have_posts() ) : $admaniaheaderslider_lay1query->the_post();
	
	$admania_fwidth = '536';
	$admania_fheight = '261';
	
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth, $admania_fheight, true ); //resize & crop img
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";
	
	
	?>
  <div class="admania_slider2">
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
    <img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admania'); ?>" />
    <?php 
	}

} 	
			  ?>
    <div class="admania_slidercontent1">
	   <?php if(admania_get_option('admania_ebylfp') != TRUE) { ?>
      <div class="admania_slidermeta1">
        <div class="admania_slidercat1">
		  <?php if(admania_get_option('admania_ppostedby') != TRUE) { ?>
		  <?php esc_html_e('By','admania'); ?>
		  <?php  the_author_posts_link(); ?>
		  -
		  <?php } if(admania_get_option('admania_pcategory') != TRUE) {	 ?>
		  <?php esc_html_e('In','admania'); ?>
          <?php the_category(' , '); } ?>
        </div>
      </div>
	   <?php } ?>
      <h2><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></h2>
		<p>
      <?php echo  wp_trim_words( get_the_excerpt(), 20, '..' );  ?> 
	  </p>
	
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

<?php if(admania_get_option('admania_featuredactv1') != false):  ?>
<div class="admania_featuredcategory1">
  <?php
    $admania_catidsftdoptn2 = admania_get_option('admania_ftdcatid1');			
	$admania_ckftdcatpst2 = admania_get_option('admania_ftdcatgrs1');		
	$admania_cktheftdpst2 = admania_get_option('admania_ftdpstid1');	
	$admania_latestpstck2 = admania_get_option('admania_randorlatst2');


if($admania_latestpstck2 == 'Random'):

$admania_postorder2 = 'rand';

else:

$admania_postorder2 = 'date';

endif;

if(!empty($admania_ckftdcatpst2) != ''):

$admaniaftdquery_lay2args = array( 
'category_name' => $admania_ckftdcatpst2,
'orderby'=>$admania_postorder2,
'posts_per_page'=>2,
'ignore_sticky_posts' => 1
);

endif;


if(!empty($admania_cktheftdpst2) != ''):
$admania_cktheftdpst_id2 = explode(',',$admania_cktheftdpst2);
$admaniaftdquery_lay2args = array( 
'post__in' => $admania_cktheftdpst_id2,
'orderby'=>$admania_postorder2,
'posts_per_page'=>2,
'ignore_sticky_posts' => 1
);

endif;


if(!empty($admania_catidsftdoptn2) != ''):	
  $admania_ctftd_idopts2 = explode(',',$admania_catidsftdoptn2);
   $admaniaftdquery_lay2args = array(
   'cat'=>$admania_ctftd_idopts2,
   'orderby'=>$admania_postorder2,
   'posts_per_page'=>2,
   'ignore_sticky_posts' => 1
   );
  
endif;


if(((!empty($admania_ckftdcatpst2) != '') || (!empty($admania_cktheftdpst_id2) != '') || (!empty($admania_ctftd_idopts2) != '') )){
    // the query  
    $admaniaftdquery_lay2query = new WP_Query( $admaniaftdquery_lay2args );
   
	while ( $admaniaftdquery_lay2query->have_posts() ) : $admaniaftdquery_lay2query->the_post();
	
	$admania_fwidth1 = '312';
	$admania_fheight1 = '170';
	
	$admania_thumb = get_post_thumbnail_id();
 	$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
	$admania_image = admania_autoresize( $admania_imgurl, $admania_fwidth1, $admania_fheight1, true ); //resize & crop img
	
	$admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
	$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
	$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
	$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
	$admania_framename = "iframe";

	?>
  <div class="admania_featcatlist1">
  
    <?php
						  
	if(($admania_ytdimg != "")  || ($admania_image != "")) {
	
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
    <img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>" alt="<?php esc_html_e('img','admania'); ?>" />
    <?php 
	}
    } 	
	?>
	
    <div class="admania_ftdcategorycontent1">
	 <?php  if(admania_get_option('admania_ebylfp') != TRUE) { 
	if(admania_get_option('admania_pcategory') != TRUE) { ?>
      <div class="admania_ftdcategorymeta1">
        <?php 
				
				$admania_catlist = get_the_category();
				
				if(!empty($admania_catlist)):	
				echo '<span>';
				esc_html_e('In','admania');
				echo '</span>';
				$admania_catsname = $admania_catlist[0]->name;				
				$admania_catsslug = $admania_catlist[0]->slug;				
				echo '<a href="'.esc_url(get_home_url()).'/category/'.esc_html($admania_catsslug).'" rel="category tag">'.esc_html($admania_catsname).'</a>';
				
				endif;
				
				?>
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
