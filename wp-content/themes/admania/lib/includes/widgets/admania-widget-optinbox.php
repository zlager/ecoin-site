<?php
	 /**
	 * admania optinbox widget
	 *
	 * @package WordPress
	 * @subpackage admania
	 * @since admania 1.0
	 */
	 
	/*
	 * Add function to widgets_init that'll load our widget.
	 */
	add_action( 'widgets_init', 'admania_optin_widgets' );
	if ( ! function_exists( 'admania_optin_widgets' ) ) :
	function admania_optin_widgets() {
	register_widget( 'admania_optin_box' );
	}
	endif;
	
	if(!class_exists('admania_optin_box')):
	
	class admania_optin_box extends WP_Widget { 
	
	function __construct() {
	parent::__construct(
	'admania_optin_box',
	esc_html__('Admania - Optin Box', 'admania'), // Name
	array('description' => esc_html__('Subscriber optin box', 'admania'),)
	);
	}
	
	
	public function form($admania_instance) {
	isset($admania_instance['title1']) ? $admania_title1 = $admania_instance['title1'] : null;
	empty($admania_instance['title1']) ? $admania_title1 = 'Subscriptions Title' : null;
	isset($admania_instance['subheading']) ? $subheading = $admania_instance['subheading'] : null;
	isset($admania_instance['name']) ? $admania_name = $admania_instance['name'] : null;
	isset($admania_instance['placeholder_wname']) ? $placeholder_wname = $admania_instance['placeholder_wname'] : 'Your Name';
	isset($admania_instance['email']) ? $admaniaesc_html_email = $admania_instance['email'] : null;
	isset($admania_instance['placeholder_wemail']) ? $placeholder_wemail = $admania_instance['placeholder_wemail'] : 'Your Email';
	isset($admania_instance['url']) ? $admania_url = $admania_instance['url'] : '#';
	isset($admania_instance['submit']) ? $admania_submit_btntxt = $admania_instance['submit'] : 'Go!';
	isset($admania_instance['hidden']) ? $admania_hidden = $admania_instance['hidden'] : null;
	isset($admania_instance['optinbox']) ? $admania_optinbox = $admania_instance['optinbox'] : null;
	?>
<script type="text/javascript" language="javascript">
		var $j = jQuery.noConflict();
		(function($j) {$j(document).ready(function() {$j(".html8").keyup(function() {var txt = $j(this).val();if (txt == "") {$j(".url8").val("");$j(".hidden8").val("");$j(".name8").val("");$j(".email8").val("");return false;}var pp = 0;var pp1 = 0;var pos1 = 0;var pos2 = 0;var i = 1;var hidden = "";while (1) {pos1 = txt.indexOf("<input", pos1);if (pos1 < 0) break;pos2 = txt.indexOf(">", pos1 + 1);var text = txt.substr(pos1, pos2 - pos1);pp = text.indexOf('type="hidden"');pp1 = text.indexOf('type="submit"');if (pp > 0) {hidden += text + ">";}if (pp < 0 && pp1 < 0) {pp = text.indexOf('name="');pp = pp + 6;pp1 = text.indexOf('"', pp + 1);var tt = text.substr(pp, pp1 - pp);if (tt == 'name' || tt == 'NAME' || tt =='FNAME' || tt =='fields_fname') {$j(".name8").val(tt);}else if(tt == 'email' || tt =='EMAIL' || tt =='fieldsesc_html_email') {$j(".email8").val(tt);}else{}i++;}pos1 = pos2 + 1;}pos1 = txt.indexOf("<form", 0);pos2 = txt.indexOf(">", pos1 + 1);text = txt.substr(pos1, pos2 - pos1);pp = text.indexOf('action="');pp = pp + 8;pp1 = text.indexOf('"', pp + 1);var tt = text.substr(pp, pp1 - pp);$j(".url8").val(tt);$j(".hidden8").val(hidden);});});})(jQuery); // optin detect code  
		
	</script>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title1')); ?>">
    <?php esc_html_e('Optin Title:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title1')); ?>" name="<?php echo esc_attr($this->get_field_name('title1')); ?>" type="text" value="<?php echo esc_html(!empty($admania_title1) ? $admania_title1 :''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('subheading')); ?>">
    <?php esc_html_e('Sub Heading:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subheading')); ?>" name="<?php echo esc_attr($this->get_field_name('subheading')); ?>" type="text" value="<?php echo esc_html(!empty($subheading) ? $subheading :''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('optinbox')); ?>">
    <?php esc_html_e('Paste your optin html code ( then press the tab key to autofill the respective fields )', 'admania'); ?>
  </label>
  <textarea class="widefat html8" id="<?php echo esc_attr($this->get_field_id('optinbox')); ?>" rows ="5" cols ="80" name="<?php echo esc_attr($this->get_field_name('optinbox')); ?>"><?php echo stripslashes(htmlspecialchars_decode(!empty($admania_optinbox) ? $admania_optinbox:'')); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('name')); ?>">
    <?php esc_html_e('Name:', 'admania'); ?>
  </label>
  <br />
  <input class="widefat name8" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_html (!empty($admania_name) ? $admania_name :''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('placeholder_wname')); ?>">
    <?php esc_html_e('Place holder name Text:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder_wname')); ?>" name="<?php echo esc_attr($this->get_field_name('placeholder_wname')); ?>" type="text" value="<?php echo esc_html (!empty($placeholder_wname) ? $placeholder_wname :''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('email')); ?>">
    <?php esc_html_e('E-mail:', 'admania'); ?>
  </label>
  <br />
  <input class="widefat email8" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_html(!empty($admaniaesc_html_email) ? $admaniaesc_html_email :''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('placeholder_wemail')); ?>">
    <?php esc_html_e('Place holder email Text:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder_wemail')); ?>" name="<?php echo esc_attr($this->get_field_name('placeholder_wemail')); ?>" type="text" value="<?php echo esc_html(!empty($placeholder_wemail) ? $placeholder_wemail:'' ); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('url')); ?>">
    <?php esc_html_e('Action Url:', 'admania'); ?>
  </label>
  <input class="widefat url8" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_url(!empty($admania_url) ? $admania_url:''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('submit')); ?>">
    <?php esc_html_e('Submit Button Text:', 'admania'); ?>
  </label>
  <textarea class="widefat submit8" id="<?php echo esc_attr($this->get_field_id('submit')); ?>" rows ="1" cols ="80" name="<?php echo esc_attr($this->get_field_name('submit')); ?>" type="text"><?php echo esc_html(!empty($admania_submit_btntxt) ? $admania_submit_btntxt:''); ?></textarea>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('hidden')); ?>">
    <?php esc_html_e('Hidden Fields:', 'admania'); ?>
  </label>
  <textarea class="widefat hidden8" id="<?php echo esc_attr($this->get_field_id('hidden')); ?>" rows ="5" cols ="80" name="<?php echo esc_attr($this->get_field_name('hidden')); ?>" type="text"><?php echo wp_kses_stripslashes(htmlspecialchars_decode(!empty($admania_hidden) ? $admania_hidden:'')); ?></textarea>
</p>
<?php
	}
	
	public function update($admania_new_instance, $admania_old_instance) {
	$admania_instance = array();
	$admania_instance['title1'] = (!empty($admania_new_instance['title1']) ) ? strip_tags($admania_new_instance['title1']) : 'My Optin Box';
	$admania_instance['subheading'] = (!empty($admania_new_instance['subheading']) ) ? strip_tags($admania_new_instance['subheading']) : '';
	$admania_instance['name'] = (!empty($admania_new_instance['name']) ) ? strip_tags($admania_new_instance['name']) : '';
	$admania_instance['placeholder_wname'] = (!empty($admania_new_instance['placeholder_wname']) ) ? strip_tags($admania_new_instance['placeholder_wname']) : 'Enter your Name';       
	$admania_instance['email'] = (!empty($admania_new_instance['email']) ) ? strip_tags($admania_new_instance['email']) : '';		
	$admania_instance['placeholder_wemail'] = (!empty($admania_new_instance['placeholder_wemail']) ) ? strip_tags($admania_new_instance['placeholder_wemail']) : 'Enter your email';		
	$admania_instance['url'] = (!empty($admania_new_instance['url']) ) ? strip_tags($admania_new_instance['url']) : '#';
	$admania_instance['submit'] = (!empty($admania_new_instance['submit']) ) ? strip_tags($admania_new_instance['submit']) : 'Go!';
	$admania_instance['hidden'] = (!empty($admania_new_instance['hidden']) ) ? esc_textarea($admania_new_instance['hidden']) : '';
	$admania_instance['optinbox'] = (!empty($admania_new_instance['optinbox']) ) ? esc_textarea($admania_new_instance['optinbox']) : '';
	
	return $admania_instance;
	}
	
	
	
	public function widget($args, $admania_instance) {
	
	
	$admania_title1 = $admania_instance['title1'];		
	$subheading = $admania_instance['subheading'];		
	
	$admania_name = $admania_instance['name'];
	$pname = $admania_instance['placeholder_wname'];
	$admaniaesc_html_email = $admania_instance['email'];
	$pemail = $admania_instance['placeholder_wemail'];
	$admania_url = $admania_instance['url'];
	$admania_hidden = $admania_instance['hidden'];
	$admania_submit_btntxt = $admania_instance['submit'];
	
	// social profile link
	
	$admania_name_profile = '<i class="admania_nicon"><input type="text" name="'.esc_html(!empty($admania_name) ? $admania_name:'').'" onfocus="if (this.value == \''.esc_html($pname).'\') {this.value = \'\' }" onblur ="if (this.value == \'\') {this.value = \''.esc_js($pname).'\'}" value="'.esc_html($pname).'"/></i>';
	$admaniaesc_html_email_profile = '<i class="admania_eicon"><input type="text" name="'.esc_html(!empty($admaniaesc_html_email) ? $admaniaesc_html_email :'').'" onfocus="if (this.value == \''.esc_html($pemail).'\') {this.value = \'\' }" onblur ="if (this.value == \'\') {this.value = \''.esc_js($pemail).'\'}" value="'.esc_html($pemail).'"/></i>';
	$submit_text ='<input type="submit" name="submit" value="'.esc_html(!empty($admania_submit_btntxt) ? $admania_submit_btntxt :'').'"/>';
	$admania_url_profile = esc_url(!empty($admania_url) ? $admania_url :'');
	$admania_hidden_profile = (!empty($admania_hidden) ? $admania_hidden :'');
	
	echo wp_kses_stripslashes($args['before_widget']);
	
	echo '<div class="admania_optin">';
	echo '<form class="admania-af-form-wrapperr" target="_blank" action="'.esc_url($admania_url_profile).'" method="post" enctype="multipart/form-data">';
	echo stripslashes ( htmlspecialchars_decode($admania_hidden_profile));
	echo '<p class="admania_postoptionboxheading"><span>'.esc_html(!empty($admania_title1)  ? $admania_title1 : null).'</span></p>';
	echo '<p>'.esc_html(!empty($subheading)  ? $subheading : null).'<p>';
	echo wp_kses_stripslashes($admania_name_profile);
	echo wp_kses_stripslashes($admaniaesc_html_email_profile);
	echo wp_kses_stripslashes($submit_text);
	echo '</form></div>';
	echo wp_kses_stripslashes($args['after_widget']);
	}
	
	} 
    endif;

