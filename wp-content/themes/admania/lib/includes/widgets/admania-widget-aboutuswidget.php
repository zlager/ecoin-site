<?php
	/**
	* Custom Widget for displaying Aboutus text box
	*
	* @package WordPress
	* @subpackage admania
	* @since admania 1.0
	*/
	
	/*
    * Add function to widgets_init that'll load our widget.
   */
	
	
	if(! function_exists( 'admania_aboutus_widgets' )):
	function admania_aboutus_widgets() {
	register_widget( 'admania_aboutus_widgets' );
	}
	endif;
	add_action( 'widgets_init', 'admania_aboutus_widgets' );

	if(!class_exists('admania_aboutus_widgets')):
	class admania_aboutus_widgets extends WP_Widget { 
	
	function __construct() {
	parent::__construct(
	'admania_aboutus_widgets',
	esc_html__('Admania - About Us Widget', 'admania'), // Name
	array('description' => esc_html__('Admania About Us Widget', 'admania'),)
	);
	}
	
	
	public function form($admania_instance) {
	isset($admania_instance['title']) ? $admania_title = $admania_instance['title'] : null;  // get the default title for the widget
	empty($admania_instance['title']) ?$admania_title = 'About Us' : null;			 // get the customtitle for the widget	
	isset($admania_instance['abgimgurl']) ? $admania_abgimgurl = $admania_instance['abgimgurl'] : null;	// get the aboutus bg image url for the widget
	isset($admania_instance['apara']) ? $admania_apara = $admania_instance['apara'] : null;  		// get the paragraph for the widget	
	isset($admania_instance['authorurl']) ? $admania_authorurl = $admania_instance['authorurl'] : null; 		// check the box to get social share for the widget 
	
	isset($admania_instance['abgname']) ? $admania_abgname = $admania_instance['abgname'] : null; 		// check the box to get social share for the widget 
	
	isset($admania_instance['authorredtxt']) ? $admania_authorredtxt = $admania_instance['authorredtxt'] : null; 		// check the box to get social share for the widget 
	
	
	
	

	?>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
    <?php  esc_html_e ('Title:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($admania_title); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('abgimgurl')); ?>">
    <?php  esc_html_e ('Enter The About Us image Url:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('abgimgurl')); ?>" name="<?php echo esc_attr($this->get_field_name('abgimgurl')); ?>" type="text" value="<?php echo esc_url(isset($admania_abgimgurl) ? $admania_abgimgurl : ''); ?>">
 </p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('abgname')); ?>">
    <?php  esc_html_e ('Enter The About Us Name:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('abgname')); ?>" name="<?php echo esc_attr($this->get_field_name('abgname')); ?>" type="text" value="<?php echo esc_attr(isset($admania_abgname) ? $admania_abgname : ''); ?>" />
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('apara')); ?>">
    <?php  esc_html_e ('Enter The About Us Description:','admania'); ?>
  </label>
  <textarea class="widefat" rows="3"  id="<?php echo esc_attr($this->get_field_id('apara')); ?>" name="<?php echo esc_attr($this->get_field_name('apara')); ?>" type="text"><?php echo esc_attr(isset($admania_apara) ? $admania_apara : ''); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('authorredtxt')); ?>">
    <?php  esc_html_e ('ReadMore text:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('authorredtxt')); ?>" name="<?php echo esc_attr($this->get_field_name('authorredtxt')); ?>" type="text" value="<?php echo esc_attr(isset($admania_authorredtxt) ? $admania_authorredtxt : ''); ?>" />
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('authorurl')); ?>">
    <?php  esc_html_e ('ReadMore Url:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('authorurl')); ?>" name="<?php echo esc_attr($this->get_field_name('authorurl')); ?>" type="text" value="<?php echo esc_url(isset($admania_authorurl) ? $admania_authorurl : ''); ?>" />
</p>
<?php
	}
	
	public function update($admania_newinstance, $admania_oldinstance) {
	$admania_instance = array();
	$admania_instance['title'] = (!empty($admania_newinstance['title']) ) ? strip_tags($admania_newinstance['title']) : ''; 		// get the default title for the widget
	$admania_instance['abgimgurl'] = (!empty($admania_newinstance['abgimgurl']) ) ? strip_tags($admania_newinstance['abgimgurl']) : '';	// get the aboutusimage urlfor the widget
	$admania_instance['abgname'] = (!empty($admania_newinstance['abgname']) ) ? strip_tags($admania_newinstance['abgname']) : '';	// get the aboutusimage urlfor the widget
	$admania_instance['apara'] = (!empty($admania_newinstance['apara']) ) ? strip_tags($admania_newinstance['apara']) : '';		// get the paragraph for the widget
	$admania_instance['authorurl'] = (!empty($admania_newinstance['authorurl']) ) ? strip_tags($admania_newinstance['authorurl']) : '';  // check the box to get author url for the widget 
	
	$admania_instance['authorredtxt'] = (!empty($admania_newinstance['authorredtxt']) ) ? strip_tags($admania_newinstance['authorredtxt']) : '';  // check the box to get author url for the widget
	
	
	return $admania_instance;
	
	}
	
	
	
	public function widget($admania_args, $admania_instance) {
		
	 global $admania_options,$admania_loopcounter; 
 	$admania_options = get_option( 'theme_settings' );

	
	$admania_title = apply_filters('widget_title', $admania_instance['title']);	    //get the title to display
	$admania_abimg = $admania_instance['abgimgurl'];                                //get the image url to display
	$admania_abgimgurl = admania_autoresize($admania_abimg, 150, 150, true );   
	$admania_abtname = $admania_instance['abgname'];
	$admania_abgname = $admania_abtname;	          								// the image size to display
	$admania_apara = $admania_instance['apara'];								
	$admania_authorurl = $admania_instance['authorurl'];							//get the authorurl to display
	$admania_authorredtxt = $admania_instance['authorredtxt'];
	
	// social profile link
	
	$admania_abtimg = '<div class="admania_abtimg"><img itemprop="image" src="'.esc_url($admania_abgimgurl).'" alt="'.esc_html__( 'image', 'admania' ).'"/></div>';
	$admania_abtpara = '<div class="admania_abtpara"><p>'.esc_html($admania_apara).'</p></div>';
	
	echo wp_kses_stripslashes($admania_args['before_widget']);
	if (!empty($admania_title)) {
	echo wp_kses_stripslashes($admania_args['before_title']) . $admania_title .wp_kses_stripslashes( $admania_args['after_title']);
	}
	
	echo '<div class="admania_aboutus">';
	echo wp_kses_stripslashes((!empty($admania_abgimgurl) ) ? $admania_abtimg : null); 
	
	
	?>
<h4><?php echo esc_html((!empty($admania_abgname) ) ? $admania_abtname : null); ?></h4>
<?php
		
	echo wp_kses_stripslashes((!empty($admania_apara) ) ? $admania_abtpara : null);
  
	?>
<a href="<?php echo esc_url(!empty($admania_authorurl) ? $admania_authorurl : '');  ?>" class = "admania_aboutreadmore" rel="author"><span><?php echo wp_kses_stripslashes((!empty($admania_authorredtxt) ? $admania_authorredtxt:'')); ?></span></a>
</div>
<?php
	
	echo wp_kses_stripslashes($admania_args['after_widget']);
	}
	}	
		
	endif;
	
	


