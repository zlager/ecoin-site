<?php
	/**
	* Admania Social Follow Widget
	*
	* @package WordPress
	* @subpackage Admania
	* @since Admania 1.0
	*/
	
add_action( 'widgets_init', 'admania_socialfollow_widget' );

if ( ! function_exists( 'admania_socialfollow_widget' ) ) :
function admania_socialfollow_widget() {
	register_widget( 'admania_socialfollow_widget' );
}

endif;
	
	
	if(!class_exists('admania_socialfollow_widget')):
	
	class admania_socialfollow_widget extends WP_Widget { 
	
	function __construct() {
	parent::__construct('admania_socialfollow_widget',esc_html__('Admania - Social Follow', 'admania'), // Name
	array('description' => esc_html__('Social Follow', 'admania'),)
	);
	}
	
	
	
	public function form($admania_instance) {
	
	isset($admania_instance['title']) ? $admania_title = $admania_instance['title'] : null;
	empty($admania_instance['title']) ? $admania_title = 'Social Media' : null;		
	isset($admania_instance['sdfblnk']) ? $sdfblnk = $admania_instance['sdfblnk'] : null;
	isset($admania_instance['sdtwtlnk']) ? $sdtwtlnk = $admania_instance['sdtwtlnk'] : null;
	isset($admania_instance['sdlnkdlnk']) ? $sdlnkdlnk = $admania_instance['sdlnkdlnk'] : null;
	isset($admania_instance['sdinstlnk']) ? $sdinstlnk = $admania_instance['sdinstlnk'] : null;
	isset($admania_instance['sdytlnk']) ? $sdytlnk = $admania_instance['sdytlnk'] : null;
	isset($admania_instance['sdgglelnk']) ? $sdgglelnk = $admania_instance['sdgglelnk'] : null;
	isset($admania_instance['sdpntlnk']) ? $sdpntlnk = $admania_instance['sdpntlnk'] : null;
	isset($admania_instance['sdrsslnk']) ? $sdrsslnk = $admania_instance['sdrsslnk'] : null;
	
	
	?>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
    <?php  esc_html_e ('Title:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($admania_title); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdfblnk')); ?>">
    <?php  esc_html_e ('Facebook Link Url:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdfblnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdfblnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdfblnk) ? $sdfblnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdtwtlnk')); ?>">
    <?php  esc_html_e ('Twitter Link Url:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdtwtlnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdtwtlnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdtwtlnk) ? $sdtwtlnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdgglelnk')); ?>">
    <?php  esc_html_e ('Google Link Url:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdgglelnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdgglelnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdgglelnk) ? $sdgglelnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdlnkdlnk')); ?>">
    <?php  esc_html_e ('Likedin Link Url:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdlnkdlnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdlnkdlnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdlnkdlnk) ? $sdlnkdlnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdytlnk')); ?>">
    <?php  esc_html_e ('Youtube Link Url:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdytlnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdytlnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdytlnk) ? $sdytlnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdinstlnk')); ?>">
    <?php  esc_html_e ('Instagram Link Url Code:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdinstlnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdinstlnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdinstlnk) ? $sdinstlnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdpntlnk')); ?>">
    <?php  esc_html_e ('Pinterest Link Url Code:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdpntlnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdpntlnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdpntlnk) ? $sdpntlnk:''))); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('sdrsslnk')); ?>">
    <?php  esc_html_e ('Rss Link Url Code:', 'admania'); ?>
  </label>
  <textarea class="widefat" rows="2" cols="2" id="<?php echo esc_attr($this->get_field_id('sdrsslnk')); ?>" name="<?php echo esc_attr($this->get_field_name('sdrsslnk')); ?>" type="text"><?php echo esc_url(stripslashes(htmlspecialchars_decode(!empty($sdrsslnk) ? $sdrsslnk:''))); ?></textarea>
</p>
<?php
	}
	
	public function update($admania_newinstance, $admania_oldinstance) {
	$admania_instance = array();
	$admania_instance['title'] = ( ($admania_newinstance['title'])  ? strip_tags($admania_newinstance['title']) : '');		
	$admania_instance['sdfblnk'] = ( ($admania_newinstance['sdfblnk'])  ? esc_textarea($admania_newinstance['sdfblnk']) : '');
		$admania_instance['sdtwtlnk'] = ( ($admania_newinstance['sdtwtlnk'])  ? esc_textarea($admania_newinstance['sdtwtlnk']) : '');

	$admania_instance['sdgglelnk'] = ( ($admania_newinstance['sdgglelnk'])  ? esc_textarea($admania_newinstance['sdgglelnk']) : '');

	$admania_instance['sdlnkdlnk'] = ( ($admania_newinstance['sdlnkdlnk'])  ? esc_textarea($admania_newinstance['sdlnkdlnk']) : '');

	$admania_instance['sdytlnk'] = ( ($admania_newinstance['sdytlnk'])  ? esc_textarea($admania_newinstance['sdytlnk']) : '');

	$admania_instance['sdinstlnk'] = ( ($admania_newinstance['sdinstlnk'])  ? esc_textarea($admania_newinstance['sdinstlnk']) : '');
		$admania_instance['sdpntlnk'] = ( ($admania_newinstance['sdpntlnk'])  ? esc_textarea($admania_newinstance['sdpntlnk']) : '');
			$admania_instance['sdrsslnk'] = ( ($admania_newinstance['sdrsslnk'])  ? esc_textarea($admania_newinstance['sdrsslnk']) : '');

	return $admania_instance;
	}
	
	
	
	public function widget($admania_args, $admania_instance) {
	
	$admania_title = apply_filters('widget_title', $admania_instance['title']);	       	
	$sdfblnk = $admania_instance['sdfblnk'];
	$sdtwtlnk = $admania_instance['sdtwtlnk'];
	$sdgglelnk = $admania_instance['sdgglelnk'];
	$sdlnkdlnk = $admania_instance['sdlnkdlnk'];
	$sdytlnk = $admania_instance['sdytlnk'];
	$sdinstlnk = $admania_instance['sdinstlnk'];
	$sdrsslnk = $admania_instance['sdrsslnk'];
	$sdpntlnk = $admania_instance['sdpntlnk'];
	
	
	
	
	// social profile link
	
	
	echo wp_kses_stripslashes($admania_args['before_widget']);
	if (!empty($admania_title)) {
	echo wp_kses_stripslashes($admania_args['before_title']) . $admania_title . wp_kses_stripslashes($admania_args['after_title']);
	}
	?>
<div class="admania_widgetsocial">
  <?php if(!empty($sdfblnk)): ?>
  <a class="admania_socialiconfb" title="<?php esc_html_e('Facebook','admania');?>" href="<?php echo esc_url($sdfblnk ? $sdfblnk : '#'); ?>" target="_blank"> <i class="fa fa-facebook"></i> </a>
  <?php
   endif;
    
   if(!empty($sdtwtlnk)): ?>
  <a class="admania_socialicontwt" title="<?php esc_html_e('Twitter','admania');?>" href="<?php echo esc_url($sdtwtlnk ? $sdtwtlnk : '#'); ?>" target="_blank"> <i class="fa fa-twitter"></i> </a>
  <?php 
endif;

if(!empty($sdgglelnk)): ?>
  <a class="admania_socialicongle" title="<?php esc_html_e('Googleplus','admania');?>" href="<?php echo esc_url($sdgglelnk ? $sdgglelnk : '#'); ?>" target="_blank"> <i class="fa fa-google-plus"></i> </a>
  <?php 
endif;

if(!empty($sdlnkdlnk)): ?>
  <a class="admania_socialiconlnk" title="<?php esc_html_e('linkedin','admania');?>" href="<?php echo esc_url($sdlnkdlnk ? $sdlnkdlnk : '#'); ?>" target="_blank"
><i class="fa fa-linkedin"></i> </a>
  <?php 
endif;

if(!empty($sdytlnk)): ?>
  <a class="admania_socialiconyt" title="<?php esc_html_e('youtube','admania');?>" href="<?php echo esc_url($sdytlnk ? $sdytlnk : '#'); ?>" target="_blank"
><i class="fa fa-youtube"></i> </a>
  <?php 
endif;

if(!empty($sdinstlnk)): ?>
  <a class="admania_socialiconins" title="<?php esc_html_e('instagram','admania');?>" href="<?php echo esc_url($sdinstlnk ? $sdinstlnk : '#'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
  <?php 
endif;

if(!empty($sdpntlnk)): ?>
  <a class="admania_socialiconpin" title="<?php esc_html_e('Pinterest','admania');?>" href="<?php echo esc_url($sdpntlnk ? $sdpntlnk : '#'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
  <?php 
 endif;
 
 if(!empty($sdrsslnk)): ?>
  <a class="admania_socialiconrs" title="<?php esc_html_e('rss','admania');?>" href="<?php echo esc_url($sdrsslnk ? $sdrsslnk : '#'); ?>" target="_blank"><i class="fa fa-rss"></i></a>
  <?php 
 endif;
 ?>
</div>
<?php echo wp_kses_stripslashes($admania_args['after_widget']);
	}
	}
	endif;
