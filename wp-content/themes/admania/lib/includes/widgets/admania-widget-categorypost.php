<?php
	/**
	* Custom Widget for displaying Category Post text box
	*
	* @package WordPress
	* @subpackage admania
	* @since admania 1.0
	*/
	
	/*
    * Add function to widgets_init that'll load our widget.
   */
	
	
	if(! function_exists( 'admania_catpost_widgets' )):
	function admania_catpost_widgets() {
	register_widget( 'admania_catpost_widgets' );
	}
	endif;
	add_action( 'widgets_init', 'admania_catpost_widgets' );

	if(!class_exists('admania_catpost_widgets')):
	class admania_catpost_widgets extends WP_Widget { 
	
	function __construct() {
	parent::__construct(
	'admania_catpost_widgets',
	esc_html__('Admania - Category Post Widget', 'admania'), // Name
	array('description' => esc_html__('Admania Category Post Widget', 'admania'),)
	);
	}
	
	
	public function form($admania_instance) {
	isset($admania_instance['title']) ? $admania_title = $admania_instance['title'] : null;  // get the default title for the widget
	empty($admania_instance['title']) ?$admania_title = 'Category Post' : null;			 // get the customtitle for the widget	
	isset($admania_instance['admania_wdgtcatname']) ? $admania_apara = $admania_instance['admania_wdgtcatname'] : null;  	
	isset($admania_instance['admania_tbnailwidth']) ? $admania_apara = $admania_instance['admania_tbnailwidth'] : null;  	
	isset($admania_instance['admania_tbnailheight']) ? $admania_abgname = $admania_instance['admania_tbnailheight'] : null; 	
	isset($admania_instance['admania_wdgtcatpstorder']) ? $admania_apara = $admania_instance['admania_wdgtcatpstorder'] : null;  	
	isset($admania_instance['admania_wdgtpostperpage']) ? $admania_abgname = $admania_instance['admania_wdgtpostperpage'] : null; 		
	
	?>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
    <?php  esc_html_e ('Title:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($admania_title); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('admania_wdgtcatname')); ?>">
    <?php  esc_html_e ('Select the category name to display the post','admania'); ?>
  </label>

	<select  class="widefat" name="<?php echo esc_attr($this->get_field_name('admania_wdgtcatname')); ?>" id="<?php echo esc_attr($this->get_field_name('admania_wdgtcatname')); ?>">
    <option value="">
    <?php  esc_html_e ('select the category name','admania'); ?>
    </option>
    <?php
    $admania_wdgtargs = array(
	'orderby' => 'name',
	'order' => 'ASC'
	);
	$admania_catwdgttypes = get_categories($admania_wdgtargs);	
	foreach ($admania_catwdgttypes as $admania_wdgtoption){
		$admania_wdgtselected = (($admania_instance['admania_wdgtcatname'] == $admania_wdgtoption->slug ) ?  'selected="selected"' : ''); 
	?>
    <option value="<?php echo esc_attr($admania_wdgtoption->slug); ?>" <?php echo esc_attr($admania_wdgtselected); ?>><?php echo esc_attr(!empty($admania_wdgtoption->slug ) ? $admania_wdgtoption->slug : ''); ?></option>
    <?php }?>
     </select>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('admania_tbnailwidth')); ?>">
    <?php  esc_html_e ('Enter the thumbnail width:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('admania_tbnailwidth')); ?>" name="<?php echo esc_attr($this->get_field_name('admania_tbnailwidth')); ?>" type="text" value="<?php echo esc_attr(!empty($admania_tbnailwidth) ? $admania_tbnailwidth : '190'); ?>">
 </p>
 <p>
  <label for="<?php echo esc_attr($this->get_field_id('admania_tbnailheight')); ?>">
    <?php  esc_html_e ('Enter the thumbnail height:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('admania_tbnailheight')); ?>" name="<?php echo esc_attr($this->get_field_name('admania_tbnailheight')); ?>" type="text" value="<?php echo esc_attr(!empty($admania_tbnailheight) ? $admania_tbnailheight : '154'); ?>">
 </p>
  <p>
  <label for="<?php echo esc_attr($this->get_field_id('admania_wdgtcatpstorder')); ?>">
    <?php  esc_html_e ('Select the category post order by:','admania'); ?>
  </label>
  <select  class="widefat" name="<?php echo esc_attr($this->get_field_name('admania_wdgtcatpstorder')); ?>" id="<?php echo esc_attr($this->get_field_name('admania_wdgtcatpstorder')); ?>">
    <option value="">
    <?php  esc_html_e ('select the category post order by','admania'); ?>
    </option>
	<option value="<?php esc_html_e('date','admania')?>" <?php selected( $admania_instance["admania_wdgtcatpstorder"], "date" ); ?>><?php esc_html_e('date','admania')?></option>
    <option value="<?php esc_html_e('rand','admania')?>" <?php selected( $admania_instance["admania_wdgtcatpstorder"], "rand" ); ?>><?php esc_html_e('rand','admania')?></option>
  </select>
 </p>
  <p>
  <label for="<?php echo esc_attr($this->get_field_id('admania_wdgtpostperpage')); ?>">
    <?php  esc_html_e ('Enter the number count to display the post :','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('admania_wdgtpostperpage')); ?>" name="<?php echo esc_attr($this->get_field_name('admania_wdgtpostperpage')); ?>" type="text" value="<?php echo esc_attr(!empty($admania_wdgtpostperpage) ? $admania_wdgtpostperpage : '6'); ?>">
 </p>
<?php
	}
	
	public function update($admania_newinstance, $admania_oldinstance) {
	$admania_instance = array();
	$admania_instance['title'] = (!empty($admania_newinstance['title']) ) ? strip_tags($admania_newinstance['title']) : ''; 		// get the default title for the widget
	$admania_instance['admania_wdgtcatname'] = (!empty($admania_newinstance['admania_wdgtcatname']) ) ? strip_tags($admania_newinstance['admania_wdgtcatname']) : '';	// get the categoryname urlfor the widget
	$admania_instance['admania_tbnailwidth'] = (!empty($admania_newinstance['admania_tbnailwidth']) ) ? strip_tags($admania_newinstance['admania_tbnailwidth']) : '';	// get the category postimage width for the widget
	$admania_instance['admania_tbnailheight'] = (!empty($admania_newinstance['admania_tbnailheight']) ) ? strip_tags($admania_newinstance['admania_tbnailheight']) : ''; // get the category postimage height for the widget
	$admania_instance['admania_wdgtcatpstorder'] = (!empty($admania_newinstance['admania_wdgtcatpstorder']) ) ? strip_tags($admania_newinstance['admania_wdgtcatpstorder']) : '';	// get the category post order
	$admania_instance['admania_wdgtpostperpage'] = (!empty($admania_newinstance['admania_wdgtpostperpage']) ) ? strip_tags($admania_newinstance['admania_wdgtpostperpage']) : ''; // get the category post limit
		
	return $admania_instance;
	
	}
	
	
	
	public function widget($admania_args, $admania_instance) {
		
		
	$admania_title = apply_filters('widget_title', $admania_instance['title']);	    
	$admania_wdgtcatname = $admania_instance['admania_wdgtcatname'];                               
	$admania_tbnailwidth = $admania_instance['admania_tbnailwidth'];         								
	$admania_tbnailheight = $admania_instance['admania_tbnailheight'];	
	$admania_wdgtcatpstorder = $admania_instance['admania_wdgtcatpstorder'];         								
	$admania_wdgtpostperpage = $admania_instance['admania_wdgtpostperpage'];	
    $admania_wdgtcatpstorderdft = !empty($admania_wdgtcatpstorder) ? $admania_wdgtcatpstorder : 'date';
	
	
		echo wp_kses_stripslashes($admania_args['before_widget']);
	if (!empty($admania_title)) {
	echo wp_kses_stripslashes($admania_args['before_title']) . $admania_title .wp_kses_stripslashes( $admania_args['after_title']);
	}

    $admania_catwidgetpostargs = array( 
	'category_name' => $admania_wdgtcatname,
	'orderby'=>$admania_wdgtcatpstorderdft,
	'posts_per_page'=>$admania_wdgtpostperpage,
	'ignore_sticky_posts' => 1 	);
	$admania_catwidgetpostquery = new WP_Query( $admania_catwidgetpostargs );
	
    if ( $admania_catwidgetpostquery->have_posts() ) : 
	
	?>
	<div class="admania_widgetcatlist_post">
	<?php
	
	while ( $admania_catwidgetpostquery->have_posts() ) : $admania_catwidgetpostquery->the_post(); 

		global $post;
		    $admania_tbnailwidthdft = !empty($admania_tbnailwidth) ? $admania_tbnailwidth: '150';
		    $admania_tbnailheightdft = !empty($admania_tbnailheight) ? $admania_tbnailheight: '70';
			$admania_thumb = get_post_thumbnail_id();
			$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
			$admania_image = admania_autoresize( $admania_imgurl, $admania_tbnailwidthdft, $admania_tbnailheightdft, true ); //resize & crop img
            $admania_ytdimg = get_post_meta($post->ID, '_admania_featured_videourl', true); 
			$admania_youtube_matchexp = "/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i";  
			$admania_vimeomatchexp = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
			$admania_souncloudmatchexp = "%(?:https?://)(?:www\.)?soundcloud\.com/([\-a-z0-9_]+/[\-a-z0-9_]+)%im";
			$admania_framename = "iframe";
			if(($admania_ytdimg == "")  && ($admania_image == "")) {
		$admania_widgetcatpostclass = 'admania_widgetwotpostclassimg';
	}
	else {
		$admania_widgetcatpostclass = '';
	}
	
	?>
	
	<div class="admania_catentry <?php echo esc_attr($admania_widgetcatpostclass); ?>">
	
		<div class="admania_catentryimg">
		<?php 
	
	if(($admania_ytdimg != "")  || ($admania_image != "")){
	
	if($admania_ytdimg != "") {
	
	if(preg_match($admania_youtube_matchexp , $admania_ytdimg)) {	
	
	$admania_yuvid = preg_replace($admania_youtube_matchexp,"<".esc_attr($admania_framename)." width=\"".absint($admania_tbnailwidthdft)."\" height=\"".absint($admania_tbnailheight)."\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_yuvid);
	
	}
	
	elseif(preg_match($admania_vimeomatchexp , $admania_ytdimg)) {
	
	$admania_vimeovideos = preg_replace( $admania_vimeomatchexp ,"<".esc_attr($admania_framename)." width=\"".absint($admania_tbnailwidthdft)."\" height=\"".absint($admania_tbnailheight)."\" src=\"//player.vimeo.com/video/$3\" allowfullscreen></iframe>",$admania_ytdimg);
	
	echo wp_kses_stripslashes($admania_vimeovideos);
	
	}
	
	elseif(preg_match( $admania_souncloudmatchexp , $admania_ytdimg)) {	
	
	$admania_souncloudsng = preg_replace( $admania_souncloudmatchexp ,'<'.esc_attr($admania_framename).' width="'.absint($admania_tbnailwidthdft).'" height="'.absint($admania_tbnailheight).'" scrolling="no" src="https://www.soundcloud.com/player/?url=https://soundcloud.com/$2&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>',$admania_ytdimg); 
	
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
		<?php if(admania_get_option('admania_ebylfp') != TRUE) { ?>
		<div class="admania_catentrymeta">
		 <?php  if(admania_get_option('admania_ppostedby') != TRUE) { ?>
		 <?php esc_html_e('By','admania'); ?> <?php the_author_posts_link(); ?>
		 <div class="admania_entrybylinecd">|</div>
		 <?php } ?>
		 <?php if(admania_get_option('admania_pcategory') != TRUE) { ?>
		 <?php esc_html_e('In','admania'); ?> <?php the_category(' , '); ?> 
		 <?php } ?>
		</div>
		<?php } ?>
		</div>
	    <div class="admania_catentryheader">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    </div>
	</div>
	<?php endwhile; ?>
	<?php  wp_reset_postdata(); ?>
	<?php else : ?>
	<p>
	<?php esc_html_e('Sorry, no posts were found.','admania'); ?>
	</p>
	</div>
	<?php endif; 
echo wp_kses_stripslashes($admania_args['after_widget']);
	}
	}	
		
	endif;
	
	


