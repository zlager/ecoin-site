<?php

/*-----------------------------------------------------------------------------------*/
# Front-End Live Editor Panel Page
/*-----------------------------------------------------------------------------------*/

	/* admania : Front-End Live Editor Options
	*
	* Contains all the function related to Front-End Live Editor options.
	* @package WordPress
	* @subpackage admania
	* @since Admania 1.0
	*/

	

if (isset($_POST['admania_frontliveeditor_settings']) && isset($_POST['action']) && $_POST['action'] == "admania_fnrlvedt_updateoption"){
if (wp_verify_nonce($_POST['admania_frontendlvedt'],'admania_frnendlv_updateoptions')){ 
update_option('admania_frontliveeditor_settings',$_POST['admania_frontliveeditor_settings']);

}

}

if(current_user_can('administrator')){

$admanialvedt_floattype = '';

$admanialvedt_floattype = array('none','left','right');	

$admania_frontlvedtpostadalign = $admanialvedt_floattype;

?>
<div class="admania_frontendpanel">
<form id="admania_frontlvedtr_saveoptions" name="admania_frontlvedtr_saveoptions" action="" method="post">	
<?php wp_nonce_field('admania_frnendlv_updateoptions','admania_frontendlvedt'); ?>	
<div class="admania_frontlveditorupdate">
<input type="submit" name="admania_frnendlv_updateoptions" value="<?php esc_html_e('Save','admania'); ?>" class="admania_lvedtsubmtbtn admania_lvedtsubmtpbtn">
<div class="admania_frtlvedtclsbtn">
<i class="fa fa-close"></i>
</div>
</div>

<div class="admania_lvedtoptinosstngslist">

<div class="admania_adsstngsnotes">
  <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
</div>
			  

 <!-- .Header Ad Left Section -->			  

	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion1"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash1" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash2" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash3" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash1">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash2">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead]" name="admania_frontliveeditor_settings[hdr_lvedlglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash3">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url1]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url1 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url1]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url1')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld1 admania_adimg_lvetmdupldbtn1" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk1"> <img class="admania_lvedtimgshw1" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url1')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url1]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url1]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url1')); ?>" />
                </div>             
              </div>
 </div>

<!-- .Header Ad Right Section -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion2"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash4" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash5" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash6" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash4">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad1]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad1]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad1')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash5">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead1]" name="admania_frontliveeditor_settings[hdr_lvedlglead1]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead1')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash6">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url2]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url2 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url2]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url2')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld2 admania_adimg_lvetmdupldbtn2" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk2 admania_lvedtimglnk"> <img class="admania_lvedtimgshw2" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url2')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url2]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url2]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url2')); ?>" />
                </div>             
              </div>
			  </div>

 <!-- .After Header Left Ad Section -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion3"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash7" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash8" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash9" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash7">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad3]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad3]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad3')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash8">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead3]" name="admania_frontliveeditor_settings[hdr_lvedlglead3]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead3')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash9">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url3]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url3 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url3]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url3')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld3 admania_adimg_lvetmdupldbtn3" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk3 admania_lvedtimglnk"> <img class="admania_lvedtimgshw3" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url3')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url3]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url3]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url3')); ?>" />
                </div>             
              </div>
			  </div>		

 <!-- .After Header Right Ad Section -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion4"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash10" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash11" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash12" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash10">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad4]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad4]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad4]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad4')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash11">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead4]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead4]" name="admania_frontliveeditor_settings[hdr_lvedlglead4]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead4')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash12">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url4]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url4 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url4]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url4')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld4 admania_adimg_lvetmdupldbtn4" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk4 admania_lvedtimglnk"> <img class="admania_lvedtimgshw4" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url4')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url4]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url4]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url4')); ?>" />
                </div>             
              </div>
			  </div>	
			  
 <!-- .Left Sidebar Ad Section -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion5"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash13" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash14" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash15" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash13">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad5]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad5]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad5]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad5')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash14">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead5]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead5]" name="admania_frontliveeditor_settings[hdr_lvedlglead5]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead5')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash15">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url5]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url5 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url5]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url5')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld5 admania_adimg_lvetmdupldbtn5" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk5 admania_lvedtimglnk"> <img class="admania_lvedtimgshw5" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url5')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url5]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url5]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url5')); ?>" />
                </div>             
              </div>
			  </div>	
			  
	 <!-- .Right Sidebar Ad Section -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion6"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash16" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash17" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash18" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash16">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad6]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad6]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad6]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad6')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash17">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead6]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead6]" name="admania_frontliveeditor_settings[hdr_lvedlglead6]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead6')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash18">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url6]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url6 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url6]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url6')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld6 admania_adimg_lvetmdupldbtn6" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk6 admania_lvedtimglnk"> <img class="admania_lvedtimgshw6" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url6')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url6]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url6]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url6')); ?>" />
                </div>             
              </div>
			  </div>	


<!-- .After Slider Section Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion7"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash19" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash20" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash21" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash19">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad7]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad7')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash20">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead7]" name="admania_frontliveeditor_settings[hdr_lvedlglead7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead7')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash21">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url7]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url7 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url7]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url7')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld7 admania_adimg_lvetmdupldbtn7" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk7 admania_lvedtimglnk"> <img class="admania_lvedtimgshw7" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url7')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url7]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url7]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url7')); ?>" />
                </div>             
              </div>
			  </div>	
			  
<!-- .After Grid Post Section Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion8"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash22" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash23" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash24" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash22">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad8]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash23">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead8]" name="admania_frontliveeditor_settings[hdr_lvedlglead8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash24">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url8]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url8 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url8]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url8')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld8 admania_adimg_lvetmdupldbtn8" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk8 admania_lvedtimglnk"> <img class="admania_lvedtimgshw8" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url8')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url8]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url8]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url8')); ?>" />
                </div>             
              </div>
			  </div>	
	
<!-- .Before Footer Section Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion9"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash25" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash26" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash27" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash25">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad9]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad9]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad9]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad9')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash26">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead9]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead9]" name="admania_frontliveeditor_settings[hdr_lvedlglead9]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead9')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash27">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url9]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url9 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url9]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url9')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld9 admania_adimg_lvetmdupldbtn9" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk9 admania_lvedtimglnk"> <img class="admania_lvedtimgshw9" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url9')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url9]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url9]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url9')); ?>" />
                </div>             
              </div>
			  </div>	

	
<!-- .Before Single Post Section Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion10"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash28" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash29" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash30" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash28">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad10]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad10]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad10]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad10')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash29">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead10]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead10]" name="admania_frontliveeditor_settings[hdr_lvedlglead10]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead10')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash30">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url10]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url10 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url10]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url10')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld10 admania_adimg_lvetmdupldbtn10" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk10 admania_lvedtimglnk"> <img class="admania_lvedtimgshw10" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url10')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url10]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url10]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url10')); ?>" />
                </div>             
              </div>
			  </div>
	
<!-- .Before Single Post Section Inner Top Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion11"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash31" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash32" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash33" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash31">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad11]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad11]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad11]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad11')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash32">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead11]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead11]" name="admania_frontliveeditor_settings[hdr_lvedlglead11]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead11')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash33">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url11]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url11 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url11]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url11')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld11 admania_adimg_lvetmdupldbtn11" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk11 admania_lvedtimglnk"> <img class="admania_lvedtimgshw11" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url11')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url11]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url11]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url11')); ?>" />
                </div> 
                <div class="admania_lvedoptnfileds admania_lvedoptnfldopt">
				<div class="admania_lvedttbfsttit"><?php esc_html_e('Please Setup the Ad Align','admania'); ?></div>
				 <label for="admania_frontliveeditor_settings[frnt_lvedtralignpsttp]">
                    <?php  esc_html_e ( 'Choose the Ad Alignment', 'admania' ); ?>
                  </label>
                <select name="admania_frontliveeditor_settings[frnt_lvedtralignpsttp]">
                    <?php
                    				
				foreach ($admania_frontlvedtpostadalign as $admania_lvoption){
				$admania_frntlvselected1 = ((admania_get_lveditoption('frnt_lvedtralignpsttp') == $admania_lvoption ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_frntlvselected1); ?>><?php echo (!empty($admania_lvoption) ? $admania_lvoption : ''); ?></option>
                    <?php } ?>
                </select>
				</div> 
				
              </div>
			  </div>				  
		
<!-- .Single Post Section NthPara Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion12"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash34" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash35" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash36" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash34">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad12]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad12]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad12]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad12')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash35">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead12]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead12]" name="admania_frontliveeditor_settings[hdr_lvedlglead12]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead12')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash36">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url12]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url12 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url12]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url12')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld12 admania_adimg_lvetmdupldbtn12" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk12 admania_lvedtimglnk"> <img class="admania_lvedtimgshw12" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url12')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url12]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url12]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url12')); ?>" />
                </div>   

                <div class="admania_lvedoptnfileds admania_lvedoptnfldopt">
				<div class="admania_lvedttbfsttit"><?php esc_html_e('Please Setup the Ad Align','admania'); ?></div>
				 <label for="admania_frontliveeditor_settings[frnt_lvedtralignpsttp1]">
                    <?php  esc_html_e ( 'Choose the Ad Alignment', 'admania' ); ?>
                  </label>
                <select name="admania_frontliveeditor_settings[frnt_lvedtralignpsttp1]">
                    <?php
                    				
				foreach ($admania_frontlvedtpostadalign as $admania_lvoption1){
				$admania_frntlvselected2 = ((admania_get_lveditoption('frnt_lvedtralignpsttp1') == $admania_lvoption1 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_frntlvselected2); ?>><?php echo (!empty($admania_lvoption1) ? $admania_lvoption1 : ''); ?></option>
                    <?php } ?>
                </select>
				</div> 
				
              </div>
			  </div>		

<!-- .Single After Post Content Section Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion13"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash37" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash38" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash39" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash37">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad13]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad13]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad13]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad13')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash38">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead13]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead13]" name="admania_frontliveeditor_settings[hdr_lvedlglead13]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead13')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash39">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url13]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url13 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url13]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url13')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld13 admania_adimg_lvetmdupldbtn13" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk13 admania_lvedtimglnk"> <img class="admania_lvedtimgshw13" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url13')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url13]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url13]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url13')); ?>" />
                </div>  
 
				
              </div>
			  </div>	
			  
<!-- .Single After Post Optin Box Ad1 -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion14"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash40" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash41" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash42" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash40">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad14]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad14]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad14]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad14')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash41">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead14]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead14]" name="admania_frontliveeditor_settings[hdr_lvedlglead14]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead14')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash42">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url14]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url14 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url14]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url14')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld14 admania_adimg_lvetmdupldbtn14" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk14 admania_lvedtimglnk"> <img class="admania_lvedtimgshw14" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url14')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url14]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url14]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url14')); ?>" />
                </div>  
 
				
              </div>
			  </div>	
			  
			  
	<!-- .Single After Post Optin Box Ad2 -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion15"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash43" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash44" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash45" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash43">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad15]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad15]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad15]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad15')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash44">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead15]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead15]" name="admania_frontliveeditor_settings[hdr_lvedlglead15]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead15')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash45">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url15]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url15 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url15]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url15')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld15 admania_adimg_lvetmdupldbtn15" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk15 admania_lvedtimglnk"> <img class="admania_lvedtimgshw15" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url15')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url15]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url15]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url15')); ?>" />
                </div>  
 
				
              </div>
			  </div>	
			  
		<!-- .Single Bottom Sticky Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion16"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash46" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash47" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash48" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash46">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad16]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad16]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad16]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad16')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash47">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead16]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead16]" name="admania_frontliveeditor_settings[hdr_lvedlglead16]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead16')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash48">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url16]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url16 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url16]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url16')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld16 admania_adimg_lvetmdupldbtn16" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk16 admania_lvedtimglnk"> <img class="admania_lvedtimgshw16" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url16')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url16]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url16]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url16')); ?>" />
                </div>  
 
				
              </div>
			  </div>			  
			<!-- .Page Before Content Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion17"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash49" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash50" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash51" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash49">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad17]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad17]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad17]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad17')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash50">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead17]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead17]" name="admania_frontliveeditor_settings[hdr_lvedlglead17]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead17')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash51">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url17]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url17 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url17]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url17')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld17 admania_adimg_lvetmdupldbtn17" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk17 admania_lvedtimglnk"> <img class="admania_lvedtimgshw17" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url17')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url17]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url17]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url17')); ?>" />
                </div>  
 
				
              </div>
			  </div>	
			  
	<!-- .Page Content Top Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion18"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash52" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash53" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash54" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">



  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash52">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad18]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad18]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad18]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad18')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash53">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead18]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead18]" name="admania_frontliveeditor_settings[hdr_lvedlglead18]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead18')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash54">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url18]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url18 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url18]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url18')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld18 admania_adimg_lvetmdupldbtn18" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk18 admania_lvedtimglnk"> <img class="admania_lvedtimgshw18" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url18')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url18]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url18]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url18')); ?>" />
                </div>  


		<div class="admania_lvedoptnfileds admania_lvedoptnfldopt">
				<div class="admania_lvedttbfsttit"><?php esc_html_e('Please Setup the Ad Align','admania'); ?></div>
				 <label for="admania_frontliveeditor_settings[frnt_lvedtralignpsttp3]">
                    <?php  esc_html_e ( 'Choose the Ad Alignment', 'admania' ); ?>
                  </label>
                <select name="admania_frontliveeditor_settings[frnt_lvedtralignpsttp3]">
                    <?php
                    				
				foreach ($admania_frontlvedtpostadalign as $admania_lvoption2){
				$admania_frntlvselected3 = ((admania_get_lveditoption('frnt_lvedtralignpsttp3') == $admania_lvoption2 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_frntlvselected3); ?>><?php echo (!empty($admania_lvoption2) ? $admania_lvoption2 : ''); ?></option>
                    <?php } ?>
                </select>
				</div>  				
              </div>
			  
	
			  
			  </div>	


    	<!-- .Page Content Nth Para Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion19"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash55" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash56" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash57" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash55">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad19]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad19]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad19]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad19')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash56">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead19]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead19]" name="admania_frontliveeditor_settings[hdr_lvedlglead19]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead19')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash57">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url19]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url19 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url19]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url19')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld19 admania_adimg_lvetmdupldbtn19" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk19 admania_lvedtimglnk"> <img class="admania_lvedtimgshw19" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url19')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url19]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url19]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url19')); ?>" />
                </div>  
 
				<div class="admania_lvedoptnfileds admania_lvedoptnfldopt">
				<div class="admania_lvedttbfsttit"><?php esc_html_e('Please Setup the Ad Align','admania'); ?></div>
				 <label for="admania_frontliveeditor_settings[frnt_lvedtralignpsttp4]">
                    <?php  esc_html_e ( 'Choose the Ad Alignment', 'admania' ); ?>
                  </label>
                <select name="admania_frontliveeditor_settings[frnt_lvedtralignpsttp4]">
                    <?php
                    				
				foreach ($admania_frontlvedtpostadalign as $admania_lvoption3){
				
				$admania_frntlvselected4 = ((admania_get_lveditoption('frnt_lvedtralignpsttp4') == $admania_lvoption3 ) ?  'selected="selected"' : ''); 
				
				?>
                    <option <?php echo esc_attr($admania_frntlvselected4); ?>><?php echo (!empty($admania_lvoption3) ? $admania_lvoption3 : ''); ?></option>
                    <?php } ?>
                </select>
				</div> 
              </div>
			  </div>	


    	<!-- .Page Content Bottom Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion20"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash58" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash59" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash60" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash58">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad20]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad20]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad20]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad20')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash59">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead20]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead20]" name="admania_frontliveeditor_settings[hdr_lvedlglead20]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead20')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash60">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url20]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url20 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url20]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url20')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld20 admania_adimg_lvetmdupldbtn20" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk20 admania_lvedtimglnk"> <img class="admania_lvedtimgshw20" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url20')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url20]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url20]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url20')); ?>" />
                </div> 		
              </div>
			  </div>	



    	<!-- .Page Content Bottom Sticky Ad -->
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion21"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash61" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash62" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash63" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash61">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlhtmlad21]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlhtmlad21]" name="admania_frontliveeditor_settings[hdr_lvedlhtmlad21]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlhtmlad21')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash62">
                  <label for="admania_frontliveeditor_settings[hdr_lvedlglead21]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lvedlglead21]" name="admania_frontliveeditor_settings[hdr_lvedlglead21]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lvedlglead21')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash63">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url21]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url21 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url21]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url21')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld21 admania_adimg_lvetmdupldbtn21" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk21 admania_lvedtimglnk"> <img class="admania_lvedtimgshw21" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url21')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url21]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url21]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url21')); ?>" />
                </div> 		
              </div>
			  </div>

<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion22"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash64" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash65" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash66" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash64">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad]" name="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlhtmlad')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash65">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlglead]" name="admania_frontliveeditor_settings[hdr_lay2lvedlglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlglead')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash66">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url22]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url22 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url22]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url22')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld22 admania_adimg_lvetmdupldbtn22" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk22"> <img class="admania_lvedtimgshw22" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url22')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url22]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url22]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url22')); ?>" />
                </div>             
              </div>
 </div>	
	

<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion23"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash67" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash68" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash69" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash67">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad3]" name="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad3]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlhtmlad3')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash68">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlglead3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlglead3]" name="admania_frontliveeditor_settings[hdr_lay2lvedlglead3]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlglead3')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash69">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url23]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url23 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url23]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url23')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld23 admania_adimg_lvetmdupldbtn23" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk23"> <img class="admania_lvedtimgshw23" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url23')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url23]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url23]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url23')); ?>" />
                </div>             
              </div>
 </div>	
 
 
 <div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion24"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash70" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash71" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash72" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash70">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad7]" name="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlhtmlad7')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash71">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlglead7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlglead7]" name="admania_frontliveeditor_settings[hdr_lay2lvedlglead7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlglead7')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash72">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url24]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url24 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url24]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url24')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld24 admania_adimg_lvetmdupldbtn24" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk24 admania_lvedtimglnk"> <img class="admania_lvedtimgshw24" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url24')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url24]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url24]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url24')); ?>" />
                </div>             
              </div>
			  </div>	
		<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion25"> 
			<div class="admania_lvedttblst">
				<a href="#admania_adacordnhash73" class="admania_lvedtlst admanialvedt_current">
				<i class="fa fa-html5"></i>
					<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash74" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash75" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash73">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad8]" name="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash74">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlglead8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlglead8]" name="admania_frontliveeditor_settings[hdr_lay2lvedlglead8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash75">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url25]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url25 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url25]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url25')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld25 admania_adimg_lvetmdupldbtn25" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk25 admania_lvedtimglnk"> <img class="admania_lvedtimgshw25" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url25')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url25]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url25]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url25')); ?>" />
                </div>             
              </div>
    </div>	
	
	<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion26"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash76" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash77" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash78" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash76">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad9]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad9]" name="admania_frontliveeditor_settings[hdr_lay2lvedlhtmlad9]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlhtmlad9')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash77">
                  <label for="admania_frontliveeditor_settings[hdr_lay2lvedlglead9]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay2lvedlglead9]" name="admania_frontliveeditor_settings[hdr_lay2lvedlglead9]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay2lvedlglead9')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash78">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url26]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url26 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url26]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url26')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld26 admania_adimg_lvetmdupldbtn26" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk26 admania_lvedtimglnk"> <img class="admania_lvedtimgshw26" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url26')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url26]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url26]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url26')); ?>" />
                </div>             
              </div>
	</div>	
	
	<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion27"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash79" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash80" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash81" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash79">
                  <label for="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad]" name="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay3lvedlhtmlad')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash80">
                  <label for="admania_frontliveeditor_settings[hdr_lay3lvedlglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay3lvedlglead]" name="admania_frontliveeditor_settings[hdr_lay3lvedlglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay3lvedlglead')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash81">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url27]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url27 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url27]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url27')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld27 admania_adimg_lvetmdupldbtn22" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk27"> <img class="admania_lvedtimgshw27" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url27')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url27]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="80" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url27]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url27')); ?>" />
                </div>             
              </div>
 </div>	
	
		<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion28"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash82" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash83" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash84" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash82">
                  <label for="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad3]" name="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad3]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay3lvedlhtmlad3')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash83">
                  <label for="admania_frontliveeditor_settings[hdr_lay3lvedlglead3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay3lvedlglead3]" name="admania_frontliveeditor_settings[hdr_lay3lvedlglead3]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay3lvedlglead3')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash84">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url28]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url28 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url28]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url28')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld28 admania_adimg_lvetmdupldbtn28" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk28"> <img class="admania_lvedtimgshw28" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url28')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url28]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url28]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url28')); ?>" />
                </div>             
              </div>
 </div>	
		
		<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion29"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash85" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash86" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash87" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash85">
                  <label for="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad8]" name="admania_frontliveeditor_settings[hdr_lay3lvedlhtmlad8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay3lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash86">
                  <label for="admania_frontliveeditor_settings[hdr_lay3lvedlglead8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay3lvedlglead8]" name="admania_frontliveeditor_settings[hdr_lay3lvedlglead8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay3lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash87">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url29]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url29 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url29]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url29')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld29 admania_adimg_lvetmdupldbtn29" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk29"> <img class="admania_lvedtimgshw29" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url29')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url29]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url29]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url29')); ?>" />
                </div>             
              </div>
 </div>	
 
 
 		<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion30"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash88" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash89" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash90" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash88">
                  <label for="admania_frontliveeditor_settings[hm_lay3bfftrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay3bfftrhtmlad]" name="admania_frontliveeditor_settings[hm_lay3bfftrhtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hm_lay3bfftrhtmlad')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash89">
                  <label for="admania_frontliveeditor_settings[hm_lay3bfftrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay3bfftrgglead]" name="admania_frontliveeditor_settings[hm_lay3bfftrgglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hm_lay3bfftrgglead')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash90">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url30]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url30 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url30]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url30')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld30 admania_adimg_lvetmdupldbtn30" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk30"> <img class="admania_lvedtimgshw30" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url30')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url30]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url30]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url30')); ?>" />
                </div>             
              </div>
 </div>	
 
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion31"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash91" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash92" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash93" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash91">
                  <label for="admania_frontliveeditor_settings[hm_lay3sncnthtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay3sncnthtmlad]" name="admania_frontliveeditor_settings[hm_lay3sncnthtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hm_lay3sncnthtmlad')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash92">
                  <label for="admania_frontliveeditor_settings[hm_lay3sngcntgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay3sngcntgglead]" name="admania_frontliveeditor_settings[hm_lay3sngcntgglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hm_lay3sngcntgglead')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash93">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url31]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url31 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url31]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url31')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld31 admania_adimg_lvetmdupldbtn31" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk31"> <img class="admania_lvedtimgshw31" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url31')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url31]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url31]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url31')); ?>" />
                </div>             
              </div>
 </div>	
  
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion32"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash94" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash95" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash96" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash94">
                  <label for="admania_frontliveeditor_settings[hm_lay4sncnthtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay4sncnthtmlad]" name="admania_frontliveeditor_settings[hm_lay4sncnthtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hm_lay4sncnthtmlad')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash95">
                  <label for="admania_frontliveeditor_settings[hm_lay4sngcntgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay4sngcntgglead]" name="admania_frontliveeditor_settings[hm_lay4sngcntgglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hm_lay4sngcntgglead')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash96">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url32]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url32 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url32]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url32')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld32 admania_adimg_lvetmdupldbtn32" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk32"> <img class="admania_lvedtimgshw32" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url32')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url32]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url32]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url32')); ?>" />
                </div>             
              </div>
 </div>	
 
 <div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion33"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash97" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash98" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash99" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash97">
                  <label for="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad7]" name="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad7')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash98">
                  <label for="admania_frontliveeditor_settings[hdr_lay4lvedlglead7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay4lvedlglead7]" name="admania_frontliveeditor_settings[hdr_lay4lvedlglead7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead7')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash99">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url33]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url33 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url33]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url33')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld33 admania_adimg_lvetmdupldbtn33" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk33"> <img class="admania_lvedtimgshw33" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url33')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url33]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url33]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url33')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion34"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash100" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash101" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash102" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash100">
                  <label for="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad8]" name="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash101">
                  <label for="admania_frontliveeditor_settings[hdr_lay4lvedlglead8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay4lvedlglead8]" name="admania_frontliveeditor_settings[hdr_lay4lvedlglead8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash102">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url34]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url34 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url34]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url34')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld34 admania_adimg_lvetmdupldbtn34" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk34"> <img class="admania_lvedtimgshw34" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url34')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url34]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url34]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url34')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion35"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash103" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash104" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash105" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash103">
                  <label for="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad9]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad9]" name="admania_frontliveeditor_settings[hdr_lay4lvedlhtmlad9]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash104">
                  <label for="admania_frontliveeditor_settings[hdr_lay4lvedlglead9]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay4lvedlglead9]" name="admania_frontliveeditor_settings[hdr_lay4lvedlglead9]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash105">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url35]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url35 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url35]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url35')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld35 admania_adimg_lvetmdupldbtn35" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk35"> <img class="admania_lvedtimgshw35" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url35')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url35]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url35]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url35')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion36"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash106" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash107" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash108" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash106">
                  <label for="admania_frontliveeditor_settings[hm_lay5sncnthtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay5sncnthtmlad]" name="admania_frontliveeditor_settings[hm_lay5sncnthtmlad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash107">
                  <label for="admania_frontliveeditor_settings[hm_lay5sngcntgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hm_lay5sngcntgglead]" name="admania_frontliveeditor_settings[hm_lay5sngcntgglead]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash108">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url36]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url36 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url36]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url36')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld36 admania_adimg_lvetmdupldbtn36" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk36"> <img class="admania_lvedtimgshw36" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url36')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url36]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url36]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url36')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion37"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash109" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash110" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash111" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash109">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad7]" name="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash110">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglead7]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglead7]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglead7]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash111">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url37]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url37 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url37]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url37')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld37 admania_adimg_lvetmdupldbtn37" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk37"> <img class="admania_lvedtimgshw37" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url37')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url37]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url37]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url37')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion38"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash112" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash113" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash114" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash112">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad8]" name="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash113">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglead8]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglead8]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglead8]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash114">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url38]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url38 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url38]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url38')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld38 admania_adimg_lvetmdupldbtn38" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk38"> <img class="admania_lvedtimgshw38" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url38')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url38]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url38]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url38')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion39"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash115" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash116" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash117" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash115">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad11]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad11]" name="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad11]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash116">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglead11]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglead11]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglead11]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash117">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url39]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url39 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url39]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url39')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld39 admania_adimg_lvetmdupldbtn39" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk39"> <img class="admania_lvedtimgshw39" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url39')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url39]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url39]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url39')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion40"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash118" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash119" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>
		
                </a>  

<a href="#admania_adacordnhash120" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash118">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad12]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad12]" name="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad12]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash119">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglead12]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglead12]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglead12]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash120">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url40]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url40 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url40]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url40')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld40 admania_adimg_lvetmdupldbtn40" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk40"> <img class="admania_lvedtimgshw40" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url40')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url40]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url40]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url40')); ?>" />
                </div>             
              </div>
 </div>	
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion41"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash121" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash122" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>		
        </a>  

<a href="#admania_adacordnhash123" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash121">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad13]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad13]" name="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad13]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash122">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglead13]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglead13]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglead13]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash123">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url41]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url41 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url41]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url41')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld41 admania_adimg_lvetmdupldbtn41" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk41"> <img class="admania_lvedtimgshw41" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url41')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url41]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url41]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url41')); ?>" />
                </div>             
              </div>
 </div>	 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion42"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash124" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash125" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>		
        </a>  

<a href="#admania_adacordnhash126" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash124">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad14]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad14]" name="admania_frontliveeditor_settings[hdr_lay5lvedlhtmlad14]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlhtmlad8')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash125">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglead14]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglead14]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglead14]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay4lvedlglead8')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash126">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url42]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url42 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url42]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url42')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld42 admania_adimg_lvetmdupldbtn42" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk42"> <img class="admania_lvedtimgshw42" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url42')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url42]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url42]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url42')); ?>" />
                </div>             
              </div>
</div>	
 
<div id="admania_lvedtadaccordion" class="admania_lvedtadaccordion admania_lvedtadaccordion43"> 
<div class="admania_lvedttblst">
<a href="#admania_adacordnhash127" class="admania_lvedtlst admanialvedt_current">
<i class="fa fa-html5"></i>
<?php  esc_html_e ( 'Html Ad', 'admania' ); ?>

                </a>
				
       <a href="#admania_adacordnhash128" class="admania_lvedtlst">
	   <i class="fa fa-google-plus-square"></i>
                <?php  esc_html_e ( 'Google Responsive Ad', 'admania' ); ?>		
        </a>  

<a href="#admania_adacordnhash129" class="admania_lvedtlst">
<i class="fa  fa-trello"></i>
                <?php  esc_html_e ( 'Image Link Ad', 'admania' ); ?>
 </a>	
</div> 
<div class="admania_lvedtcontainer">
  <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash127">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvehtmladarc]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea  placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvehtmladarc]" name="admania_frontliveeditor_settings[hdr_lay5lvehtmladarc]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay5lvehtmladarc')); ?></textarea>
</div>             
                <div class=" admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash128">
                  <label for="admania_frontliveeditor_settings[hdr_lay5lvedlglearcad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Change Your Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_frontliveeditor_settings[hdr_lay5lvedlglearcad]" name="admania_frontliveeditor_settings[hdr_lay5lvedlglearcad]" rows="6" cols="50"><?php echo esc_textarea(admania_get_lveditoption('hdr_lay5lvedlglearcad')); ?></textarea>
                </div>
                
                <div class="admania_lvedoptnfileds admanialvedttb_tabmain" id="admania_adacordnhash129">
                  <label for="admania_frontliveeditor_settings[admania_lvedtimg_url43]">
                    <?php  esc_html_e ( 'Change Your Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_lvedtimg_url43 admania_lvedtimg_url" type="text" size="69" name="admania_frontliveeditor_settings[admania_lvedtimg_url43]" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url43')); ?>" />
                  <input  type="button" class="button admania_adimg_lvetmdupld43 admania_adimg_lvetmdupldbtn43" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <div class="admania_lvedtimglnk43"> <img class="admania_lvedtimgshw43" src="<?php echo esc_url(admania_get_lveditoption('admania_lvedtimg_url43')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
                  <label for="admania_frontliveeditor_settings[admania_lvedtrimgtg_url43]">
                    <?php  esc_html_e ( 'Change Your Ad Image Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="83" name="admania_frontliveeditor_settings[admania_lvedtrimgtg_url43]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_lveditoption('admania_lvedtrimgtg_url43')); ?>" />
                </div>             
              </div>
 </div>	
 
</div>



<input type="hidden" name="action" value="admania_fnrlvedt_updateoption">
<input type="submit" name="admania_frnendlv_updateoptions" value="<?php esc_html_e('Save','admania'); ?>" class="admania_lvedtsubmtbtn">
</form>
</div>
<?php
}
