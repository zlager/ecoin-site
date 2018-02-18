<?php
	/**
	* Custom Widget for displaying sticky text box
	*
	* @package WordPress
	* @subpackage admania
	* @since admania 1.0
	*/
	
	/*
    * Add function to widgets_init that'll load our widget.
   */
	
	
	if(! function_exists( 'admania_sticky_widgets' )):
	function admania_sticky_widgets() {
	register_widget( 'admania_sticky_widgets' );
	}
	endif;
	add_action( 'widgets_init', 'admania_sticky_widgets' );

	if(!class_exists('admania_sticky_widgets')):
	class admania_sticky_widgets extends WP_Widget { 
	
	function __construct() {
	parent::__construct(
	'admania_sticky_widgets',
	esc_html__('Admania - Sticky Widget', 'admania'), // Name
	array('description' => esc_html__('Admania Sticky Widget', 'admania'),)
	);
	}
	
	
	public function form($admania_instance) {
	isset($admania_instance['title']) ? $admania_title = $admania_instance['title'] : null;  // get the default title for the widget
	empty($admania_instance['title']) ?$admania_title = 'Sticky Ad' : null;			 // get the customtitle for the widget	
	isset($admania_instance['admania_stickyadcode']) ? $admania_stickyadcode = $admania_instance['admania_stickyadcode'] : null;	// get the sticky bg image url for the widget
	
	
	

	?>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
    <?php  esc_html_e ('Title:','admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($admania_title); ?>">
</p>
<p>
	<label for="<?php echo esc_attr($this->get_field_id('admania_stickyadcode')); ?>">
		<?php  esc_html_e ('Paste The Sticky Ad Code:','admania'); ?>
	</label>
	<textarea class="widefat" rows="3"  id="<?php echo esc_attr($this->get_field_id('admania_stickyadcode')); ?>" name="<?php echo esc_attr($this->get_field_name('admania_stickyadcode')); ?>" type="text"><?php echo esc_attr(isset($admania_stickyadcode) ? $admania_stickyadcode : ''); ?></textarea>
</p>

<?php
	}
	
	public function update($admania_newinstance, $admania_oldinstance) {
	$admania_instance = array();
	$admania_instance['title'] = (!empty($admania_newinstance['title']) ) ? strip_tags($admania_newinstance['title']) : ''; 		// get the default title for the widget
	$admania_instance['admania_stickyadcode'] = (!empty($admania_newinstance['admania_stickyadcode']) ) ? wp_kses_stripslashes($admania_newinstance['admania_stickyadcode']) : '';	// get the stickyimage url for the widget
		
	return $admania_instance;
	
	}
	
	
	
	public function widget($admania_args, $admania_instance) {
		

	
	$admania_title = apply_filters('widget_title', $admania_instance['title']);	    //get the title to display
	$admania_stickyadcode = $admania_instance['admania_stickyadcode'];                                //get the image url to display

	
	echo wp_kses_stripslashes($admania_args['before_widget']);
	if (!empty($admania_title)) {
	echo wp_kses_stripslashes($admania_args['before_title']) . $admania_title .wp_kses_stripslashes( $admania_args['after_title']);
	}
	?>
	
	<div class="admania_sidebar_sticky">
		<?php
			echo wp_kses_stripslashes((!empty($admania_stickyadcode) ) ? $admania_stickyadcode : null); 
		?>	
	</div>
	<?php
	
	echo wp_kses_stripslashes($admania_args['after_widget']);
	}
	}	
		
	endif;
	
	


