<?php
	/**
	* This template for adding the metaboxes
	*
	*
	* @package WordPress
	* @subpackage Admania
	* @since Admania 1.0
	*/
	
	
	
	if ( ! function_exists( 'admania_custom_metabox' ) ) :
	
	function admania_custom_metabox() {
		
	add_meta_box('admania-feature-video','Admania Featured Video','admania_feat_video_function','post','side','low');
	add_meta_box('admania-ad-settings','Admania Ad Settings','admania_ad_post_settings_function','post','normal','high');
    add_meta_box('admania-ad-settings','Admania Ad Settings','admania_ad_page_settings_function','page','normal','high');

	}
	endif;
	
	add_action('add_meta_boxes', 'admania_custom_metabox');
	
	
	if ( ! function_exists( 'admania_feat_video_function' ) ) :
	
	function admania_feat_video_function() { 
	  
	global $post;  
	// Get post Custom Document Description
	$admania_featdvidurl = get_post_meta($post->ID, '_admania_featured_videourl', true);
	wp_nonce_field( 'admania_meta_box_nonce', 'meta_box_nonce' );
	?>

<table>
  <tbody>
    <tr>
      <td><textarea type="text" name="admania-meta-featured-video" rows="3" cols="100"><?php echo esc_url($admania_featdvidurl); ?></textarea></td>
      <td><?php esc_html_e (' Note : Paste youtube video url,vimeo video url,soundcloud url only.','admania'); ?></td>
    </tr>
  <tbody>
</table>
<?php
	}
	endif;
	
	
	if ( ! function_exists( 'admania_ad_post_settings_function' ) ) :
	
	function admania_ad_post_settings_function() { 
	  
	global $post;  

	$admania_pstadenable1 = get_post_meta($post->ID, '_admania_pstadenable1', true);
	$admania_bfpstadhtmlcd1 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd1', true);
	$admania_bfpstadglecd1 = get_post_meta($post->ID, '_admania_bfpstadglecd1', true);
	$admania_bfpstadimg1 = get_post_meta($post->ID, '_admania_bfpstadimg1', true);
	$admania_bfpstadimglnk1 = get_post_meta($post->ID, '_admania_bfpstadimglnk1', true);
	
	$admania_pstadenable2 = get_post_meta($post->ID, '_admania_pstadenable2', true);
	$admania_bfpstadhtmlcd2 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd2', true);
	$admania_bfpstadglecd2 = get_post_meta($post->ID, '_admania_bfpstadglecd2', true);
	$admania_bfpstadimg2 = get_post_meta($post->ID, '_admania_bfpstadimg2', true);
	$admania_bfpstadimglnk2 = get_post_meta($post->ID, '_admania_bfpstadimglnk2', true);	
	
    $admania_pstadenable3 = get_post_meta($post->ID, '_admania_pstadenable3', true);
	$admania_bfpstadhtmlcd3 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd3', true);
	$admania_bfpstadglecd3 = get_post_meta($post->ID, '_admania_bfpstadglecd3', true);
	$admania_bfpstadimg3 = get_post_meta($post->ID, '_admania_bfpstadimg3', true);
	$admania_bfpstadimglnk3 = get_post_meta($post->ID, '_admania_bfpstadimglnk3', true);
	
	$admania_pstadenable4 = get_post_meta($post->ID, '_admania_pstadenable4', true);
	$admania_bfpstadhtmlcd4 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd4', true);
	$admania_bfpstadglecd4 = get_post_meta($post->ID, '_admania_bfpstadglecd4', true);
	$admania_bfpstadimg4 = get_post_meta($post->ID, '_admania_bfpstadimg4', true);
	$admania_bfpstadimglnk4 = get_post_meta($post->ID, '_admania_bfpstadimglnk4', true);
	
	$admania_pstadenable5 = get_post_meta($post->ID, '_admania_pstadenable5', true);
	$admania_bfpstadhtmlcd5 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd5', true);
	$admania_bfpstadglecd5 = get_post_meta($post->ID, '_admania_bfpstadglecd5', true);
	$admania_bfpstadimg5 = get_post_meta($post->ID, '_admania_bfpstadimg5', true);
	$admania_bfpstadimglnk5 = get_post_meta($post->ID, '_admania_bfpstadimglnk5', true);
	
	$admania_bfpstadhtmlcd51 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd51', true);
	$admania_bfpstadglecd51 = get_post_meta($post->ID, '_admania_bfpstadglecd51', true);
	$admania_bfpstadimg51 = get_post_meta($post->ID, '_admania_bfpstadimg51', true);
	$admania_bfpstadimglnk51 = get_post_meta($post->ID, '_admania_bfpstadimglnk51', true);
	
	$admania_pstadpstnslt1 = get_post_meta($post->ID, '_admania_pstadpstnslt1', true);
    $admania_pstadpstnslt2 = get_post_meta($post->ID, '_admania_pstadpstnslt2', true);
	$admania_pstadpstnbr1 = get_post_meta($post->ID, '_admania_pstadpstnbr1', true);   
	$admania_adpstsvalue = array('none','left','right');	

	$admania_pstadenable6 = get_post_meta($post->ID, '_admania_pstadenable6', true);
	$admania_bfpstadhtmlcd6 = get_post_meta($post->ID, '_admania_bfpstadhtmlcd6', true);
	$admania_bfpstadglecd6 = get_post_meta($post->ID, '_admania_bfpstadglecd6', true);
	$admania_bfpstadimg6 = get_post_meta($post->ID, '_admania_bfpstadimg6', true);
	$admania_bfpstadimglnk6 = get_post_meta($post->ID, '_admania_bfpstadimglnk6', true);
	
	
	wp_nonce_field( 'admania_meta_box_nonce', 'meta_box_nonce' );
	?>
<div class="admania_adminpoststngs">
  <div class="admania_pstetabs">
    <li class ="admaniapstlst_tab admaniapsttb_current"> <a href="#admaniapst_tabs11"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Before Content Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs12"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Inner Top Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs13"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Nth Para Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs14"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Bottom Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs15"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('After OptinBox Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs16"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Bot Sticky Ad','admania'); ?>
      </a> </li>
  </div>
  <div class="admaniapst_containertab">
    <div id="admaniapst_tabs11" class="admaniapstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Before Content Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Before Content Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Before Content Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pstadenable1" <?php if( $admania_pstadenable1 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd1"><?php echo esc_textarea($admania_bfpstadhtmlcd1); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd1"><?php echo esc_textarea($admania_bfpstadglecd1); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl1 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pstimgad1" value="<?php echo esc_url($admania_bfpstadimg1); ?>" />
            <input class="button-secondary admania_pstimgad_upload1" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload1"> <img class="admaniapst_imgad1" src="<?php echo esc_url($admania_bfpstadimg1); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pstimgadlnk1" value="<?php echo esc_url($admania_bfpstadimglnk1); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs12" class="admaniapstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Inner Top Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Inner Top Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Inner Top Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pstadenable2" <?php if( $admania_pstadenable2 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Ad Positions Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Choose the Ad Alignment Place','admania'); ?>
            </p>
            <select name="admania-pstadpstnslt1" class="admania_flddsc">
              <?php 				 
		foreach ($admania_adpstsvalue as $admania_option) { 
		$admania_selected = (($admania_pstadpstnslt1 == $admania_option ) ?  'selected="selected"' : ''); 
		?>
              <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : 'none'); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd2"><?php echo esc_textarea($admania_bfpstadhtmlcd2); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd2"><?php echo esc_textarea($admania_bfpstadglecd2); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl2 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pstimgad2" value="<?php echo esc_url($admania_bfpstadimg2); ?>" />
            <input class="button-secondary admania_pstimgad_upload2" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload2"> <img class="admaniapst_imgad2" src="<?php echo esc_url($admania_bfpstadimg2); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pstimgadlnk2" value="<?php echo esc_url($admania_bfpstadimglnk2); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs13" class="admaniapstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Nth Para Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Nth Para Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Nth Para Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pstadenable3" <?php if( $admania_pstadenable3 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Ad Positions Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enter the Ad Position Number','admania'); ?>
            </p>
            <input type="text" size="6" class="admania_flddsc" name="admania-pstadpstnbr1" value="<?php echo intval ($admania_pstadpstnbr1); ?>" />
          </div>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Choose the Ad Alignment Place','admania'); ?>
            </p>
            <select name="admania-pstadpstnslt2" class="admania_flddsc">
              <?php 				 
		foreach ($admania_adpstsvalue as $admania_option1) { 
		$admania_selected1 = (($admania_pstadpstnslt2 == $admania_option1 ) ?  'selected="selected"' : ''); 
		?>
              <option <?php echo esc_attr($admania_selected1); ?>><?php echo esc_html(!empty($admania_option1) ? $admania_option1 : 'none'); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd3"><?php echo esc_textarea($admania_bfpstadhtmlcd3); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd3"><?php echo esc_textarea($admania_bfpstadglecd3); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl3 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pstimgad3" value="<?php echo esc_url($admania_bfpstadimg3); ?>" />
            <input class="button-secondary admania_pstimgad_upload3" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload3"> <img class="admaniapst_imgad3" src="<?php echo esc_url($admania_bfpstadimg3); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pstimgadlnk3" value="<?php echo esc_url($admania_bfpstadimglnk3); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs14" class="admaniapstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Bottom Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Bottom Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Bottom Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pstadenable4" <?php if( $admania_pstadenable4 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd4"><?php echo esc_textarea($admania_bfpstadhtmlcd4); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd4"><?php echo esc_textarea($admania_bfpstadglecd4); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl4 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pstimgad4" value="<?php echo esc_url($admania_bfpstadimg4); ?>" />
            <input class="button-secondary admania_pstimgad_upload4" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload4"> <img class="admaniapst_imgad4" src="<?php echo esc_url($admania_bfpstadimg4); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pstimgadlnk4" value="<?php echo esc_url($admania_bfpstadimglnk4); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs15" class="admaniapstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('After OptinBox Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the After OptinBox Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the After OptinBox Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pstadenable5" <?php if( $admania_pstadenable5 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad1 Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad1 Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd5"><?php echo esc_textarea($admania_bfpstadhtmlcd5); ?></textarea>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad2 Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad2 Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd51"><?php echo esc_textarea($admania_bfpstadhtmlcd51); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad Ad1','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad Ad1','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd5"><?php echo esc_textarea($admania_bfpstadglecd5); ?></textarea>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad Ad2','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad Ad2','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd51"><?php echo esc_textarea($admania_bfpstadglecd51); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad1 Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad1 Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl5 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad1 Url','admania');?>"  name="admania-pstimgad5" value="<?php echo esc_url($admania_bfpstadimg5); ?>" />
            <input class="button-secondary admania_pstimgad_upload5" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload5"> <img class="admaniapst_imgad5" src="<?php echo esc_url($admania_bfpstadimg5); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad1 Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad1 Anchor Link','admania');?>"  name="admania-pstimgadlnk5" value="<?php echo esc_url($admania_bfpstadimglnk5); ?>" />
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad2 Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl51 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad2 Url','admania');?>"  name="admania-pstimgad51" value="<?php echo esc_url($admania_bfpstadimg51); ?>" />
            <input class="button-secondary admania_pstimgad_upload51" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload51"> <img class="admaniapst_imgad51" src="<?php echo esc_url($admania_bfpstadimg51); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad2 Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pstimgadlnk51" value="<?php echo esc_url($admania_bfpstadimglnk51); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs16" class="admaniapstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Bottom Sticky Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Bottom Sticky Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Bottom Sticky Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pstadenable6" <?php if( $admania_pstadenable6 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadhtmlcd6"><?php echo esc_textarea($admania_bfpstadhtmlcd6); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpstadglecd6"><?php echo esc_textarea($admania_bfpstadglecd6); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pstctmimageurl6 admania_pstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pstimgad6" value="<?php echo esc_url($admania_bfpstadimg6); ?>" />
            <input class="button-secondary admania_pstimgad_upload6" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapst_imgadupload6"> <img class="admaniapst_imgad6" src="<?php echo esc_url($admania_bfpstadimg6); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pstimgadlnk6" value="<?php echo esc_url($admania_bfpstadimglnk6); ?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	}
	endif;
	
	
	
	
	if ( ! function_exists( 'admania_ad_page_settings_function' ) ) :
	
	function admania_ad_page_settings_function() { 
	  
	global $post;  

	$admania_pgepstadenable1 = get_post_meta($post->ID, '_admania_pgepstadenable1', true);
	$admania_bfpgepstadhtmlcd1 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd1', true);
	$admania_bfpgepstadglecd1 = get_post_meta($post->ID, '_admania_bfpgepstadglecd1', true);
	$admania_bfpgepstadimg1 = get_post_meta($post->ID, '_admania_bfpgepstadimg1', true);
	$admania_bfpgepstadimglnk1 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk1', true);
	
	$admania_pgepstadenable2 = get_post_meta($post->ID, '_admania_pgepstadenable2', true);
	$admania_bfpgepstadhtmlcd2 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd2', true);
	$admania_bfpgepstadglecd2 = get_post_meta($post->ID, '_admania_bfpgepstadglecd2', true);
	$admania_bfpgepstadimg2 = get_post_meta($post->ID, '_admania_bfpgepstadimg2', true);
	$admania_bfpgepstadimglnk2 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk2', true);
	
    $admania_pgepstadenable3 = get_post_meta($post->ID, '_admania_pgepstadenable3', true);
	$admania_bfpgepstadhtmlcd3 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd3', true);
	$admania_bfpgepstadglecd3 = get_post_meta($post->ID, '_admania_bfpgepstadglecd3', true);
	$admania_bfpgepstadimg3 = get_post_meta($post->ID, '_admania_bfpgepstadimg3', true);
	$admania_bfpgepstadimglnk3 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk3', true);
	
    $admania_pgepstadpgepstnslt1 = get_post_meta($post->ID, '_admania_pgepstadpgepstnslt1', true);
    $admania_pgepstadpgepstnslt2 = get_post_meta($post->ID, '_admania_pgepstadpgepstnslt2', true);
	$admania_pgepstadpgepstnbr1 = get_post_meta($post->ID, '_admania_pgepstadpgepstnbr1', true);   
	$admania_adpgepstsvalue = array('none','left','right');
	
	$admania_pgepstadenable4 = get_post_meta($post->ID, '_admania_pgepstadenable4', true);
	$admania_bfpgepstadhtmlcd4 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd4', true);
	$admania_bfpgepstadglecd4 = get_post_meta($post->ID, '_admania_bfpgepstadglecd4', true);
	$admania_bfpgepstadimg4 = get_post_meta($post->ID, '_admania_bfpgepstadimg4', true);
	$admania_bfpgepstadimglnk4 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk4', true);	

	$admania_pgepstadenable5 = get_post_meta($post->ID, '_admania_pgepstadenable5', true);
	$admania_bfpgepstadhtmlcd5 = get_post_meta($post->ID, '_admania_bfpgepstadhtmlcd5', true);
	$admania_bfpgepstadglecd5 = get_post_meta($post->ID, '_admania_bfpgepstadglecd5', true);
	$admania_bfpgepstadimg5 = get_post_meta($post->ID, '_admania_bfpgepstadimg5', true);
	$admania_bfpgepstadimglnk5 = get_post_meta($post->ID, '_admania_bfpgepstadimglnk5', true);	

	
	
	wp_nonce_field( 'admania_meta_box_nonce', 'meta_box_nonce' );
	?>
<div class="admania_adminpoststngs">
  <div class="admania_pstetabs">
    <li class ="admaniapstlst_tab admaniapsttb_current"> <a href="#admaniapst_tabs21"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Before Content Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs22"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Inner Top Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs23"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Nth Para Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs24"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Bottom Ad','admania'); ?>
      </a> </li>
    <li class ="admaniapstlst_tab"> <a href="#admaniapst_tabs25"> <i class="dashicons dashicons-welcome-widgets-menus"></i>
      <?php esc_html_e('Content Bot Sticky Ad','admania'); ?>
      </a> </li>
  </div>
  <div class="admaniapgepst_containertab">
    <div id="admaniapst_tabs21" class="admaniapgepstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Before Content Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Before Content Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Before Content Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pgepstadenable1" <?php if( $admania_pgepstadenable1 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadhtmlcd1"><?php echo esc_textarea($admania_bfpgepstadhtmlcd1); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadglecd1"><?php echo esc_textarea($admania_bfpgepstadglecd1); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pgepstctmimageurl1 admania_pgepstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pgepstimgad1" value="<?php echo esc_url($admania_bfpgepstadimg1); ?>" />
            <input class="button-secondary admania_pgepstimgad_upload1" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapgepst_imgadupload1"> <img class="admaniapgepst_imgad1" src="<?php echo esc_url($admania_bfpgepstadimg1); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pgepstimgadlnk1" value="<?php echo esc_url($admania_bfpgepstadimglnk1); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs22" class="admaniapgepstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Inner Top Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Inner Top Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Inner Top Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pgepstadenable2" <?php if( $admania_pgepstadenable2 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Ad Positions Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Choose the Ad Alignment Place','admania'); ?>
            </p>
            <select name="admania-pgepstadpgepstnslt1" class="admania_flddsc">
              <?php 				 
		foreach ($admania_adpgepstsvalue as $admania_option2) { 
		$admania_selected2 = (($admania_pgepstadpgepstnslt1 == $admania_option2 ) ?  'selected="selected"' : ''); 
		?>
              <option <?php echo esc_attr($admania_selected2); ?>><?php echo esc_html(!empty($admania_option2) ? $admania_option2 : 'none'); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadhtmlcd2"><?php echo esc_textarea($admania_bfpgepstadhtmlcd2); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadglecd2"><?php echo esc_textarea($admania_bfpgepstadglecd2); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pgepstctmimageurl2 admania_pgepstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pgepstimgad2" value="<?php echo esc_url($admania_bfpgepstadimg2); ?>" />
            <input class="button-secondary admania_pgepstimgad_upload2" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapgepst_imgadupload2"> <img class="admaniapgepst_imgad2" src="<?php echo esc_url($admania_bfpgepstadimg2); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pgepstimgadlnk2" value="<?php echo esc_url($admania_bfpgepstadimglnk2); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs23" class="admaniapgepstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Nth Para Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Nth Para Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Nth Para Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pgepstadenable3" <?php if( $admania_pgepstadenable3 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Ad Positions Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enter the Ad Position Number','admania'); ?>
            </p>
            <input type="text" size="6" class="admania_flddsc" name="admania-pgepstadpgepstnbr1" value="<?php echo intval ($admania_pgepstadpgepstnbr1); ?>" />
          </div>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Choose the Ad Alignment Place','admania'); ?>
            </p>
            <select name="admania-pgepstadpgepstnslt2" class="admania_flddsc">
              <?php 				 
		foreach ($admania_adpgepstsvalue as $admania_option3) { 
		$admania_selected3 = (($admania_pgepstadpgepstnslt2 == $admania_option3 ) ?  'selected="selected"' : ''); 
		?>
              <option <?php echo esc_attr($admania_selected3); ?>><?php echo esc_html(!empty($admania_option3) ? $admania_option3 : 'none'); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadhtmlcd3"><?php echo esc_textarea($admania_bfpgepstadhtmlcd3); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadglecd3"><?php echo esc_textarea($admania_bfpgepstadglecd3); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pgepstctmimageurl3 admania_pgepstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pgepstimgad3" value="<?php echo esc_url($admania_bfpgepstadimg3); ?>" />
            <input class="button-secondary admania_pgepstimgad_upload3" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapgepst_imgadupload3"> <img class="admaniapgepst_imgad3" src="<?php echo esc_url($admania_bfpgepstadimg3); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pgepstimgadlnk3" value="<?php echo esc_url($admania_bfpgepstadimglnk3); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs24" class="admaniapgepstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Bottom Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Bottom Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Bottom Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pgepstadenable4" <?php if( $admania_pgepstadenable4 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadhtmlcd4"><?php echo esc_textarea($admania_bfpgepstadhtmlcd4); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadglecd4"><?php echo esc_textarea($admania_bfpgepstadglecd4); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pgepstctmimageurl4 admania_pgepstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pgepstimgad4" value="<?php echo esc_url($admania_bfpgepstadimg4); ?>" />
            <input class="button-secondary admania_pgepstimgad_upload4" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapgepst_imgadupload4"> <img class="admaniapgepst_imgad4" src="<?php echo esc_url($admania_bfpgepstadimg4); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pgepstimgadlnk4" value="<?php echo esc_url($admania_bfpgepstadimglnk4); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div id="admaniapst_tabs25" class="admaniapgepstb_tabmain">
      <div class="admania_field_style">
        <h3>
          <?php esc_html_e('Content Bottom Sticky Ad Settings','admania'); ?>
        </h3>
        <p>
          <?php esc_html_e('Note* : Please Choose Any One Of the Following AD Settings','admania'); ?>
        </p>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Active the Content Bottom Sticky Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des admania_field_deschk">
            <p>
              <?php esc_html_e('Enable the Content Bottom Sticky Ad Settings ?','admania'); ?>
            </p>
            <div class="admania_switch admania_switchstyle">
              <input type="checkbox" name="admania-pgepstadenable5" <?php if( $admania_pgepstadenable5 == true ) { ?>checked="checked"<?php } ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Html Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Ad Html Code','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Ad Html Code','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadhtmlcd5"><?php echo esc_textarea($admania_bfpgepstadhtmlcd5); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Google Responsive Code Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <textarea Placeholder="<?php esc_html_e('Paste the Google Responsive Code Ad','admania'); ?>" cols="80" rows="3"  class="meta-text" type="text" name="admania-bfpgepstadglecd5"><?php echo esc_textarea($admania_bfpgepstadglecd5); ?></textarea>
          </div>
        </div>
        <div class="admania_field_inner">
          <h4>
            <?php esc_html_e('Image Link Ad Settings','admania'); ?>
          </h4>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Choose the Ad Image','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" class="admania_pgepstctmimageurl5 admania_pgepstimgurlstngs" Placeholder="<?php esc_html_e('Choose the Image Ad Url','admania');?>"  name="admania-pgepstimgad5" value="<?php echo esc_url($admania_bfpgepstadimg5); ?>" />
            <input class="button-secondary admania_pgepstimgad_upload5" type="button" value="<?php esc_html_e('Upload Image','admania');?>" />
            <div class="admaniapgepst_imgadupload5"> <img class="admaniapgepst_imgad5" src="<?php echo esc_url($admania_bfpgepstadimg5); ?>" alt="<?php esc_html_e('UploadImage','admania'); ?>"/> </div>
          </div>
          <div class="admania_field_des">
            <p>
              <?php esc_html_e('Image Ad Anchor Link','admania'); ?>
            </p>
          </div>
          <div class="field_sec">
            <input type="text" size="67" Placeholder="<?php esc_html_e('Enter the Image Ad Anchor Link','admania');?>"  name="admania-pgepstimgadlnk5" value="<?php echo esc_url($admania_bfpgepstadimglnk5); ?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	}
	endif;
	

	
	if ( ! function_exists( 'admania_custommeta_save' ) ) :
	
	function admania_custommeta_save($post_id) {
		  
	global $post;	
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	return;
	// AJAX? Not used here
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) 
	return;
	// Check user permissions
	if ( ! current_user_can( 'edit_post', $post ) )
	return;
	// Return if it's a post revision
	if ( false !== wp_is_post_revision( $post ) )
	return;
	
	
	// Verify post meta box nonce
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'admania_meta_box_nonce' ) ) return;
	
		
	// Get our form field
	if( isset($_POST) ) : 
	
	//Featured Video Meta values Update 
	
	$admania_featdvidurl = sanitize_text_field( isset($_POST['admania-meta-featured-video']) ? $_POST['admania-meta-featured-video'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_featdvidurl ) ) {
      delete_post_meta( $post->ID, '_admania_featured_videourl' );
   } else {
     update_post_meta($post->ID, '_admania_featured_videourl', $admania_featdvidurl);
   }
		
   
    // Post Ad Settings Meta values Upadte
		
		
	$admania_pstadenable1 = sanitize_text_field( isset($_POST['admania-pstadenable1']) ? $_POST['admania-pstadenable1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_pstadenable1 ) ) {
      delete_post_meta( $post->ID, '_admania_pstadenable1' );
   } else {
      update_post_meta($post->ID, '_admania_pstadenable1', $admania_pstadenable1);
   }
	
	
	$admania_bfpstadhtmlcd1 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd1']) ? $_POST['admania-bfpstadhtmlcd1'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd1 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd1' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd1', $admania_bfpstadhtmlcd1);
   }

	
	$admania_bfpstadglecd1 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd1']) ? $_POST['admania-bfpstadglecd1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd1 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd1' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd1', $admania_bfpstadglecd1);
   }
		
	
	$admania_bfpstadimg1 = esc_url_raw( isset($_POST['admania-pstimgad1']) ? $_POST['admania-pstimgad1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg1 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg1' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg1', $admania_bfpstadimg1);
   }

		
	$admania_bfpstadimglnk1 = esc_url_raw( isset($_POST['admania-pstimgadlnk1']) ? $_POST['admania-pstimgadlnk1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk1 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk1' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk1', $admania_bfpstadimglnk1);
   }		
	
	
	
	$admania_pstadenable2 = sanitize_text_field( isset($_POST['admania-pstadenable2']) ? $_POST['admania-pstadenable2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_pstadenable2 ) ) {
      delete_post_meta( $post->ID, '_admania_pstadenable2' );
   } else {
      update_post_meta($post->ID, '_admania_pstadenable2', $admania_pstadenable2);
   }
	
	
	$admania_bfpstadhtmlcd2 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd2']) ? $_POST['admania-bfpstadhtmlcd2'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd2 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd2' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd2', $admania_bfpstadhtmlcd2);
   }

	
	$admania_bfpstadglecd2 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd2']) ? $_POST['admania-bfpstadglecd2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd2 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd2' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd2', $admania_bfpstadglecd2);
   }
		
	
	$admania_bfpstadimg2 = esc_url_raw( isset($_POST['admania-pstimgad2']) ? $_POST['admania-pstimgad2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg2 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg2' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg2', $admania_bfpstadimg2);
   }

		
	$admania_bfpstadimglnk2 = esc_url_raw( isset($_POST['admania-pstimgadlnk2']) ? $_POST['admania-pstimgadlnk2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk2 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk2' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk2', $admania_bfpstadimglnk2);
   }		
	
	
	$admania_pstadenable3 = sanitize_text_field( isset($_POST['admania-pstadenable3']) ? $_POST['admania-pstadenable3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_pstadenable3 ) ) {
      delete_post_meta( $post->ID, '_admania_pstadenable3' );
   } else {
      update_post_meta($post->ID, '_admania_pstadenable3', $admania_pstadenable3);
   }
	
	
	$admania_bfpstadhtmlcd3 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd3']) ? $_POST['admania-bfpstadhtmlcd3'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd3 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd3' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd3', $admania_bfpstadhtmlcd3);
   }

	
	$admania_bfpstadglecd3 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd3']) ? $_POST['admania-bfpstadglecd3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd3 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd3' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd3', $admania_bfpstadglecd3);
   }
		
	
	$admania_bfpstadimg3 = esc_url_raw( isset($_POST['admania-pstimgad3']) ? $_POST['admania-pstimgad3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg3 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg3' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg3', $admania_bfpstadimg3);
   }

		
	$admania_bfpstadimglnk3 = esc_url_raw( isset($_POST['admania-pstimgadlnk3']) ? $_POST['admania-pstimgadlnk3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk3 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk3' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk3', $admania_bfpstadimglnk3);
   }		
	
	
	
	$admania_pstadenable4 = sanitize_text_field( isset($_POST['admania-pstadenable4']) ? $_POST['admania-pstadenable4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_pstadenable4 ) ) {
      delete_post_meta( $post->ID, '_admania_pstadenable4' );
   } else {
      update_post_meta($post->ID, '_admania_pstadenable4', $admania_pstadenable4);
   }
	
	
	$admania_bfpstadhtmlcd4 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd4']) ? $_POST['admania-bfpstadhtmlcd4'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd4 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd4' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd4', $admania_bfpstadhtmlcd4);
   }

	
	$admania_bfpstadglecd4 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd4']) ? $_POST['admania-bfpstadglecd4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd4 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd4' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd4', $admania_bfpstadglecd4);
   }
   
	$admania_bfpstadimg4 = esc_url_raw( isset($_POST['admania-pstimgad4']) ? $_POST['admania-pstimgad4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg4 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg4' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg4', $admania_bfpstadimg4);
   }

		
	$admania_bfpstadimglnk4 = esc_url_raw( isset($_POST['admania-pstimgadlnk4']) ? $_POST['admania-pstimgadlnk4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk4 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk4' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk4', $admania_bfpstadimglnk4);
   }		
	
	
			
	$admania_pstadpstnslt1 = sanitize_text_field( isset($_POST['admania-pstadpstnslt1']) ? $_POST['admania-pstadpstnslt1'] : 'none' );
		
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pstadpstnslt1)) {
	delete_post_meta($post->ID,'_admania_pstadpstnslt1');
	}
	else {
	update_post_meta($post->ID, '_admania_pstadpstnslt1', $admania_pstadpstnslt1);
	}
	
	
	$admania_pstadpstnslt2 = sanitize_text_field( isset($_POST['admania-pstadpstnslt2']) ? $_POST['admania-pstadpstnslt2'] : 'none' );
		
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pstadpstnslt2)) {
	delete_post_meta($post->ID,'_admania_pstadpstnslt2');
	}
	else {
	update_post_meta($post->ID, '_admania_pstadpstnslt2', $admania_pstadpstnslt2);
	}

	
	$admania_pstadpstnbr1 = intval ( isset($_POST['admania-pstadpstnbr1']) ? $_POST['admania-pstadpstnbr1'] : '1' );
		
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pstadpstnbr1)) {
	delete_post_meta($post->ID,'_admania_pstadpstnbr1');
	}
	else {
	update_post_meta($post->ID, '_admania_pstadpstnbr1', $admania_pstadpstnbr1);
	}
		
	
	$admania_pstadenable5 = sanitize_text_field( isset($_POST['admania-pstadenable5']) ? $_POST['admania-pstadenable5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_pstadenable5 ) ) {
      delete_post_meta( $post->ID, '_admania_pstadenable5' );
   } else {
      update_post_meta($post->ID, '_admania_pstadenable5', $admania_pstadenable5);
   }
	
	
	$admania_bfpstadhtmlcd5 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd5']) ? $_POST['admania-bfpstadhtmlcd5'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd5 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd5' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd5', $admania_bfpstadhtmlcd5);
   }

	
	$admania_bfpstadglecd5 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd5']) ? $_POST['admania-bfpstadglecd5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd5 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd5' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd5', $admania_bfpstadglecd5);
   }
		
	
	$admania_bfpstadimg5 = esc_url_raw( isset($_POST['admania-pstimgad5']) ? $_POST['admania-pstimgad5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg5 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg5' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg5', $admania_bfpstadimg5);
   }

		
	$admania_bfpstadimglnk5 = esc_url_raw( isset($_POST['admania-pstimgadlnk5']) ? $_POST['admania-pstimgadlnk5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk5 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk5' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk5', $admania_bfpstadimglnk5);
   }		
	
	
   	$admania_bfpstadhtmlcd51 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd51']) ? $_POST['admania-bfpstadhtmlcd51'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd51 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd51' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd51', $admania_bfpstadhtmlcd51);
   }

	
	$admania_bfpstadglecd51 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd51']) ? $_POST['admania-bfpstadglecd51'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd51 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd51' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd51', $admania_bfpstadglecd51);
   }
		
	
	$admania_bfpstadimg51 = esc_url_raw( isset($_POST['admania-pstimgad51']) ? $_POST['admania-pstimgad51'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg51 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg51' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg51', $admania_bfpstadimg51);
   }

		
	$admania_bfpstadimglnk51 = esc_url_raw( isset($_POST['admania-pstimgadlnk51']) ? $_POST['admania-pstimgadlnk51'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk51 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk51' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk51', $admania_bfpstadimglnk51);
   }		
		
	
	$admania_pstadenable6 = sanitize_text_field( isset($_POST['admania-pstadenable6']) ? $_POST['admania-pstadenable6'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_pstadenable6 ) ) {
      delete_post_meta( $post->ID, '_admania_pstadenable6' );
   } else {
      update_post_meta($post->ID, '_admania_pstadenable6', $admania_pstadenable6);
   }
	
	
	$admania_bfpstadhtmlcd6 = wp_kses_stripslashes( isset($_POST['admania-bfpstadhtmlcd6']) ? $_POST['admania-bfpstadhtmlcd6'] : '' );
	
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadhtmlcd6 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadhtmlcd6' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadhtmlcd6', $admania_bfpstadhtmlcd6);
   }

	
	$admania_bfpstadglecd6 = wp_kses_stripslashes( isset($_POST['admania-bfpstadglecd6']) ? $_POST['admania-bfpstadglecd6'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadglecd6 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadglecd6' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadglecd6', $admania_bfpstadglecd6);
   }
		
	
	$admania_bfpstadimg6 = esc_url_raw( isset($_POST['admania-pstimgad6']) ? $_POST['admania-pstimgad6'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimg6 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimg6' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimg6', $admania_bfpstadimg6);
   }

		
	$admania_bfpstadimglnk6 = esc_url_raw( isset($_POST['admania-pstimgadlnk6']) ? $_POST['admania-pstimgadlnk6'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if ( empty( $admania_bfpstadimglnk6 ) ) {
      delete_post_meta( $post->ID, '_admania_bfpstadimglnk6' );
   } else {
      update_post_meta($post->ID, '_admania_bfpstadimglnk6', $admania_bfpstadimglnk6);
   }		
	
	
	// Page Ad Settings Meta values Upadte
	
	$admania_pgepstadenable1 = sanitize_text_field( isset($_POST['admania-pgepstadenable1']) ? $_POST['admania-pgepstadenable1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadenable1)) {
	delete_post_meta($post->ID,'_admania_pgepstadenable1');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadenable1', $admania_pgepstadenable1);
	}
		
	
	$admania_bfpgepstadhtmlcd1 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadhtmlcd1']) ? $_POST['admania-bfpgepstadhtmlcd1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadhtmlcd1)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadhtmlcd1');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadhtmlcd1', $admania_bfpgepstadhtmlcd1);
	}
			
	
	$admania_bfpgepstadglecd1 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadglecd1']) ? $_POST['admania-bfpgepstadglecd1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadglecd1)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadglecd1');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadglecd1', $admania_bfpgepstadglecd1);
	}
		
	
	$admania_bfpgepstadimg1 = esc_url_raw( isset($_POST['admania-pgepstimgad1']) ? $_POST['admania-pgepstimgad1'] : '' );
	
    // Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimg1)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimg1');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimg1', $admania_bfpgepstadimg1);
	}
	
	
		
	$admania_bfpgepstadimglnk1 = esc_url_raw( isset($_POST['admania-pgepstimgadlnk1']) ? $_POST['admania-pgepstimgadlnk1'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimglnk1)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimglnk1');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimglnk1', $admania_bfpgepstadimglnk1);
	}
	
	$admania_pgepstadenable2 = sanitize_text_field( isset($_POST['admania-pgepstadenable2']) ? $_POST['admania-pgepstadenable2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadenable2)) {
	delete_post_meta($post->ID,'_admania_pgepstadenable2');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadenable2', $admania_pgepstadenable2);
	}
		
	
	$admania_bfpgepstadhtmlcd2 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadhtmlcd2']) ? $_POST['admania-bfpgepstadhtmlcd2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadhtmlcd2)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadhtmlcd2');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadhtmlcd2', $admania_bfpgepstadhtmlcd2);
	}
			
	
	$admania_bfpgepstadglecd2 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadglecd2']) ? $_POST['admania-bfpgepstadglecd2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadglecd2)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadglecd2');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadglecd2', $admania_bfpgepstadglecd2);
	}
		
	
	$admania_bfpgepstadimg2 = esc_url_raw( isset($_POST['admania-pgepstimgad2']) ? $_POST['admania-pgepstimgad2'] : '' );
	
    // Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimg2)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimg2');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimg2', $admania_bfpgepstadimg2);
	}
	
	
		
	$admania_bfpgepstadimglnk2 = esc_url_raw( isset($_POST['admania-pgepstimgadlnk2']) ? $_POST['admania-pgepstimgadlnk2'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimglnk2)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimglnk2');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimglnk2', $admania_bfpgepstadimglnk2);
	}
	
	$admania_pgepstadenable3 = sanitize_text_field( isset($_POST['admania-pgepstadenable3']) ? $_POST['admania-pgepstadenable3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadenable3)) {
	delete_post_meta($post->ID,'_admania_pgepstadenable3');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadenable3', $admania_pgepstadenable3);
	}
		
	
	$admania_bfpgepstadhtmlcd3 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadhtmlcd3']) ? $_POST['admania-bfpgepstadhtmlcd3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadhtmlcd3)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadhtmlcd3');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadhtmlcd3', $admania_bfpgepstadhtmlcd3);
	}
			
	
	$admania_bfpgepstadglecd3 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadglecd3']) ? $_POST['admania-bfpgepstadglecd3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadglecd3)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadglecd3');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadglecd3', $admania_bfpgepstadglecd3);
	}
		
	
	$admania_bfpgepstadimg3 = esc_url_raw( isset($_POST['admania-pgepstimgad3']) ? $_POST['admania-pgepstimgad3'] : '' );
	
    // Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimg3)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimg3');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimg3', $admania_bfpgepstadimg3);
	}
	
	
		
	$admania_bfpgepstadimglnk3 = esc_url_raw( isset($_POST['admania-pgepstimgadlnk3']) ? $_POST['admania-pgepstimgadlnk3'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimglnk3)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimglnk3');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimglnk3', $admania_bfpgepstadimglnk3);
	}
	
	$admania_pgepstadenable4 = sanitize_text_field( isset($_POST['admania-pgepstadenable4']) ? $_POST['admania-pgepstadenable4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadenable4)) {
	delete_post_meta($post->ID,'_admania_pgepstadenable4');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadenable4', $admania_pgepstadenable4);
	}
		
	
	$admania_bfpgepstadhtmlcd4 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadhtmlcd4']) ? $_POST['admania-bfpgepstadhtmlcd4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadhtmlcd4)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadhtmlcd4');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadhtmlcd4', $admania_bfpgepstadhtmlcd4);
	}
			
	
	$admania_bfpgepstadglecd4 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadglecd4']) ? $_POST['admania-bfpgepstadglecd4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadglecd4)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadglecd4');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadglecd4', $admania_bfpgepstadglecd4);
	}
		
	
	$admania_bfpgepstadimg4 = esc_url_raw( isset($_POST['admania-pgepstimgad4']) ? $_POST['admania-pgepstimgad4'] : '' );
	
    // Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimg4)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimg4');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimg4', $admania_bfpgepstadimg4);
	}
	
	
		
	$admania_bfpgepstadimglnk4 = esc_url_raw( isset($_POST['admania-pgepstimgadlnk4']) ? $_POST['admania-pgepstimgadlnk4'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimglnk4)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimglnk4');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimglnk4', $admania_bfpgepstadimglnk4);
	}
				
    	$admania_pgepstadenable5 = sanitize_text_field( isset($_POST['admania-pgepstadenable5']) ? $_POST['admania-pgepstadenable5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadenable5)) {
	delete_post_meta($post->ID,'_admania_pgepstadenable5');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadenable5', $admania_pgepstadenable5);
	}
		
	
	$admania_bfpgepstadhtmlcd5 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadhtmlcd5']) ? $_POST['admania-bfpgepstadhtmlcd5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadhtmlcd5)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadhtmlcd5');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadhtmlcd5', $admania_bfpgepstadhtmlcd5);
	}
			
	
	$admania_bfpgepstadglecd5 = wp_kses_stripslashes( isset($_POST['admania-bfpgepstadglecd5']) ? $_POST['admania-bfpgepstadglecd5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadglecd5)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadglecd5');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadglecd5', $admania_bfpgepstadglecd5);
	}
		
	
	$admania_bfpgepstadimg5 = esc_url_raw( isset($_POST['admania-pgepstimgad5']) ? $_POST['admania-pgepstimgad5'] : '' );
	
    // Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimg5)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimg5');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimg5', $admania_bfpgepstadimg5);
	}
	
	
		
	$admania_bfpgepstadimglnk5 = esc_url_raw( isset($_POST['admania-pgepstimgadlnk5']) ? $_POST['admania-pgepstimgadlnk5'] : '' );
	
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_bfpgepstadimglnk5)) {
	delete_post_meta($post->ID,'_admania_bfpgepstadimglnk5');
	}
	else {
	update_post_meta($post->ID, '_admania_bfpgepstadimglnk5', $admania_bfpgepstadimglnk5);
	}
			
	$admania_pgepstadpgepstnslt1 = sanitize_text_field( isset($_POST['admania-pgepstadpgepstnslt1']) ? $_POST['admania-pgepstadpgepstnslt1'] : 'none' );
		
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadpgepstnslt1)) {
	delete_post_meta($post->ID,'_admania_pgepstadpgepstnslt1');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadpgepstnslt1', $admania_pgepstadpgepstnslt1);
	}
	
	
	$admania_pgepstadpgepstnslt2 = sanitize_text_field( isset($_POST['admania-pgepstadpgepstnslt2']) ? $_POST['admania-pgepstadpgepstnslt2'] : 'none' );
		
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadpgepstnslt2)) {
	delete_post_meta($post->ID,'_admania_pgepstadpgepstnslt2');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadpgepstnslt2', $admania_pgepstadpgepstnslt2);
	}

	
	$admania_pgepstadpgepstnbr1 = intval ( isset($_POST['admania-pgepstadpgepstnbr1']) ? $_POST['admania-pgepstadpgepstnbr1'] : '1' );
		
	// Update the meta fields in the database, or clean up after ourselves.
	
	if(empty($admania_pgepstadpgepstnbr1)) {
	delete_post_meta($post->ID,'_admania_pgepstadpgepstnbr1');
	}
	else {
	update_post_meta($post->ID, '_admania_pgepstadpgepstnbr1', $admania_pgepstadpgepstnbr1);
	}
		
	
	
	endif;
		
	
	}
	
	endif;
	
	add_action( 'save_post', 'admania_custommeta_save' );



