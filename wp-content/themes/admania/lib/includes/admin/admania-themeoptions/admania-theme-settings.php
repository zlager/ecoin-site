<?php 

/*-----------------------------------------------------------------------------------*/
# Add Panel Page
/*-----------------------------------------------------------------------------------*/

	/* admania : Theme Options
	*
	* Contains all the function related to theme options.
	* @package WordPress
	* @subpackage admania
	* @since admania 1.0
	*/
	
	
	
if(! function_exists( 'admania_clear_options' )):	
function admania_clear_options(&$admania_value) {
  $admania_value = htmlspecialchars(stripslashes( $admania_value ));
}
endif;



if(! function_exists( 'admania_save_settings' )):	
function admania_save_settings ( $admania_data , $admania_rfresh = 0 ) {
	global $admania_arrayoptions;
$admania_arrayoptions = array( 'admania_theme_settings' );
	foreach( $admania_arrayoptions as $admania_option ){
		if( isset( $admania_data[$admania_option] )){
			array_walk_recursive( $admania_data[$admania_option] , 'admania_clear_options');
			update_option( $admania_option ,  $admania_data[$admania_option] );
		}		
	}

	if( $admania_rfresh == 2 ) { 	die('2');}
	elseif( $admania_rfresh == 1 ){	die('1');}
}

endif;


/*-----------------------------------------------------------------------------------*/
# Save Options
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_admania_theme_data_save', 'admania_save_ajax');
if(! function_exists( 'admania_save_ajax' )):	
function admania_save_ajax() {
	
	check_ajax_referer('admania-theme-data', 'security');
	$admania_data = $_POST;
	
	$admania_rfresh = 1;

	admania_save_settings ($admania_data , $admania_rfresh );
}
endif;

	
add_action( 'admin_enqueue_scripts', 'admania_admin_styles_and_scripts' );
if(! function_exists( 'admania_admin_styles_and_scripts' )):	
/**
* Enqueuing some styles and scripts.
*/
function admania_admin_styles_and_scripts() {

$admania_dir_uri =  get_template_directory_uri();

wp_enqueue_style( 'admaniabackend_settings', $admania_dir_uri . '/lib/includes/admin/css/admaniabackend-settings.css', false, '1.0.0' );


if(is_rtl()):
$admania_cstmthmecss = '50%';
wp_enqueue_style( 'admaniabackend_settings_rtl',  $admania_dir_uri. '/lib/includes/admin/css/admaniabackend-settings-rtl.css', false, '1.0.0' );
else:
$admania_cstmthmecss = '37%';
endif;

$admania_themecustomcss = "";
$admania_themecustomcss .= " 
#admania_savealert {
	height: 100px;
	width: 200px;
    background: rgba(0, 0, 0, .8) url( ".$admania_dir_uri."/lib/includes/images/loading.gif) no-repeat center;
	position: fixed;
	top: 50%;
	right: ".$admania_cstmthmecss.";
	z-index: 100;
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
	display:none;
}\r\n";

$admania_themecustomcss .= "
.admania_savedone {
	display:block !important;
background: rgba(0, 0, 0, .8) url(".$admania_dir_uri."/lib/includes/images/done.png) no-repeat center !important;
}\r\n";

wp_add_inline_style( 'admaniabackend_settings', $admania_themecustomcss);

wp_enqueue_style( 'wp-color-picker');
if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
}
else{
    wp_enqueue_style('thickbox');
}

// Enqueue javascripts

$admania_cstmscript = '';

$admania_cstmscript = "
\$j(document).ready(function () {
	var \$jadmania_layoutscheme = '".(admania_get_option('admania_blog_scheme') ? admania_get_option('admania_blog_scheme'): 'amblyt1')."' ;
	var \$jadmania_headerscheme = '".(admania_get_option('admania_headertype_scheme') ? admania_get_option('admania_headertype_scheme'): 'amheader1')."' ;
	
	if(\$jadmania_layoutscheme == 'amblyt1'){
		\$j('#admani_hidefistlay1').slideDown('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	if(\$jadmania_layoutscheme == 'amblyt2'){
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideDown('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	if(\$jadmania_layoutscheme == 'amblyt3'){
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideDown('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	if(\$jadmania_layoutscheme == 'amblyt4'){
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideDown('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}	
	if(\$jadmania_layoutscheme == 'amblyt5'){
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideDown('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	\$j('#amblyt1').on('click',function () {
		\$j('#admani_hidefistlay1').slideDown('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amblyt2').on('click',function () {
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideDown('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amblyt3').on('click',function () {
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideDown('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amblyt4').on('click',function () {
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideDown('slow');
		\$j('#admani_hidefistlay5').slideUp('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amblyt5').on('click',function () {
		\$j('#admani_hidefistlay1').slideUp('slow');
		\$j('#admani_hidefistlay2').slideUp('slow');
		\$j('#admani_hidefistlay3').slideUp('slow');
		\$j('#admani_hidefistlay4').slideUp('slow');
		\$j('#admani_hidefistlay5').slideDown('slow');
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});	
	
	
		if(\$jadmania_headerscheme == 'amheader1'){
		\$j('#admani_hideheaderlay1').slideDown('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	if(\$jadmania_headerscheme == 'amheader2'){
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideDown('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	if(\$jadmania_headerscheme == 'amheader3'){
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideDown('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	if(\$jadmania_headerscheme == 'amheader4'){
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideDown('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	
	if(\$jadmania_headerscheme == 'amheader5'){
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	}
	
		\$j('#amheader1').on('click',function () {
		\$j('#admani_hideheaderlay1').slideDown('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amheader2').on('click',function () {
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideDown('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amheader3').on('click',function () {
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideDown('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	\$j('#amheader4').on('click',function () {
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideDown('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	
	\$j('#amheader5').on('click',function () {
		\$j('#admani_hideheaderlay1').slideUp('slow');
		\$j('#admani_hideheaderlay2').slideUp('slow');
		\$j('#admani_hideheaderlay3').slideUp('slow');
		\$j('#admani_hideheaderlay4').slideUp('slow');		
		\$j('.admania_layout_selection').removeClass('admania_defaultck');
	});
	

});
";

wp_enqueue_script( 'admaniabackend_settingscstmjs', $admania_dir_uri . '/lib/includes/admin/js/admaniabackend-settings.js',array('jquery'), null, true );
wp_add_inline_script( 'admaniabackend_settingscstmjs', $admania_cstmscript);

wp_enqueue_script( 'wp-color-picker');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');

   wp_enqueue_script( 'admania-bkoptionsajax', $admania_dir_uri.'/lib/includes/admin/js/admaniabkajax.js', array('jquery'),null,true);
	// in JavaScript, object properties are accessed as admaniabk_ajaxobject.admania_bkajaxurl
	wp_localize_script( 'admania-bkoptionsajax', 'admaniabk_ajaxobject',
            array( 'admania_bkajaxurl' => admin_url( 'admin-ajax.php' )));
	

}
endif;



    if(! function_exists( 'admania_themesettingsinit' )):
	/**
	* Register Settings
	*/
	function admania_themesettingsinit(){
	register_setting( 'admania_theme_settings', 'admania_theme_settings' );
	}
	endif;
	
	/**
	* Add Actions
	*/
	add_action( 'admin_init', 'admania_themesettingsinit' );
	add_action( 'admin_menu', 'admania_menusettingspage' );
   
 if(! function_exists( 'admania_theme_settings_page' )):

	/**
	* Start the settings page
	*/
	function admania_theme_settings_page() {
	if ( ! isset( $_REQUEST['updated'] ) ){	$_REQUEST['updated'] = false;}	//get variables outside scope

	$admania_themeoptionssave='
	<div class="admaniapanel-submit">
		<input type="hidden" name="action" value="admania_theme_data_save" />
        <input type="hidden" name="security" value="'. wp_create_nonce("admania-theme-data").'" />
	<input name="submit" class="button button-secondary" id="submit" value="'.esc_html__( "Save Changes" , "admania" ).'" type="submit">
	</div>'; 
	
	$admania_selected = '';
		
	$admania_floattype  = '';
	$admania_featured_img  = '';	
	$admania_fontsize  = '';
	$admania_fontfamily  = '';
	$admania_texttransform  = '';

    $admania_lineheight  = '';
 $admania_postadalign  = '';
 $admania_postadparaalign  = '';
 $admania_linktype  = '';

 $admania_headeronefontsize  = '';
 $admania_headeronelineheight  = '';
 $admania_trendypplist = ''; 

 $admania_headertwofontsize  = '';
 $admania_headertwolineheight  = '';

 $admania_headerthreefontsize  = '';
 $admania_headerthreelineheight  = '';

 $admania_headerfourfontsize  = '';
 $admania_headerfourlineheight  = '';

 $admania_headerfiveafontsize  = '';
 $admania_headerfivelineheight  = ''; 

 $admania_headersixfontsize  = '';
 $admania_headersixlineheight  = '';
 $admania_blogscheme = '';
 
 


/**
* Define Your Variables
*/


$admania_featured_img = array('small','medium','large','custom');
$admania_floattype = array('none','left','right');
$admania_floattype1 = array('left','right');
$admania_linktype = array('none','overline','underline');
$admania_fontfamily = array('Arial','Arial, Helvetica, Sans-serif','Open Sans','Lora','Abel','Averia Gruesa Libre','Artifika','Share Tech Mono','Alef','Anaheim','Allan','Advent Pro','Antic Slab','Alfa Slab One','Merriweather Serif','Amaranth','Alegreya Sans SC','ABeeZee','Armata','Abril Fatface','Anton','Alegreya','Amatic','Architects Daughter','Asap','Archivo Narrow','Cuprum','Crimson Text','Dancing Script','Raleway','Khula','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Passion One','Cantarell','Englebert','Fenix','Simonetta','Voces','Cabin Condensed','Comfortaa','Ubuntu','Lobster','Arimo','Bitter','Noto Sans','Merriweather','Arimo','PT Sans Narrow','Hammersmith One','Titillium Web','PT Serif','Indie Flower','Arvo','Poiret One','Yanone Kaffeesatz','Playfair Display','Oxygen','Dosis','Cabin','Lobster','Fjalla One','Coda','Sacramento','Noto Serif','Hind','Inconsolata','Nunito','Muli','Metrophobic','Vollkorn','Signika','Delius','Josefin Sans','Ubuntu Condensed','Libre Baskerville','Fira Sans','Francois One','Shadows Into Light','Play','Ruluko','Londrina Solid','Tauri','Exo 2','Rationale','Rosarivo','Rubik','Ramabhadra','Maiden Orange','Sofia','Numans','Gabriela','Georgia,Serif','Sigmar One','Crushed','Tenor Sans','Pacifico','Orbitron','Quicksand','Monda','Rokkitt','Rosario','Candal','Yellowtail','Lemon','Montserrat','Varela Round','PT Sans Caption','Karla','Karma','Pathway Gothic One','Questrial','Righteous','Verdana','Patua One','Istok Web','Bangers','Josefin Slab','Source Code Pro','BenchNine','Gloria Hallelujah','Crete Round','Covered By Your Grace','EB Garamond','Ropa Sans','Noticia Text','Kaushan Script','Sintony','Playfair Display SC','Droid Sans Mono','Quattrocento Sans','Vidaloka','Patrick Hand SC','Ovo','Lily Script One','Nova Square','Rufina','Imprima','Yantramanav','Nova Round','Palanquin','Laila','Fira Mono','Cagliostro','Nova Slim','McLaren','Paprika','Habibi','Helvetica','Overlock SC','Unkempt','Kelly Slab','Corben','Teko','Tahoma, Arial, Sans-serif','Tahoma','Bowlby One','Playball','Merienda','Caudex','Nobile','Cardo','Handlee','Economica','Changa One','Kreon','Bevan','Quattrocento','Alegreya Sans','Convergence','Rochester','Belleza','Allura','Montserrat Alternates','Sarala','PT Mono','Marcellus SC','Puritan','Port Lligat Slab','Forum','Baumans','Marcellus','Black Ops One','Podkova','Radley','Mako','Fanwood Text','Fontdiner Swanky','Rock Salt','Pinyon Script','Cherry Cream Soda','Reenie Beanie','Didact Gothic','Varela','Aldrich','Cinzel','Courgette','Voltaire','Andada','Russo One','Permanent Marker','Chewy','Denk One','Philosopher','Gudea','Sanchez','Chivo','Cutive Mono','Meddon','Gilda Display','Sniglet','Halant','Kotta One','Yeseva One','Old Standard TT','Sue Ellen Francisco','News Cycle','Knewave','Pontano Sans','Fredoka One','Archivo Black','Shadows Into Light Two','Lobster Two','Satisfy','Oxygen Mono','Unica One','Cousine','Duru Sans','Lustria','Coming Soon','Wire One','Gruppo','Tinos','Ruda','Slackey');
$admania_texttransform = array('capitalize','lowercase','uppercase','none');
$admania_fontsize = array('14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','29px','30px','31px','32px','33px','34px','35px','36px','37px','38px','39px','40px','41px','42px','43px','44px','45px','46px','47px','48px','49px','50px','51px','52px','53px','54px','55px','56px','57px','58px','59px','60px','61px','62px','63px','64px','65px','66px','67px','68px','69px','70px','71px','72px','73px','74px','75px','76px','77px','78px','79px','80px','81px','82px','83px','84px','85px','86px','87px','88px','89px','90px','91px','92px','93px','94px','95px','96px','97px','98px','99px');
$admania_lineheight = array('14px','15px','16px','17px','18px','19px','20px','21px','22px','23px','24px','25px','26px','27px','28px','29px','30px','31px','32px','33px','34px','35px','36px','37px','38px','39px','40px','41px','42px','43px','44px','45px','46px','47px','48px','49px','50px','51px','52px','53px','54px','55px','56px','57px','58px','59px','60px','61px','62px','63px','64px','65px','66px','67px','68px','69px','70px','71px','72px','73px','74px','75px','76px','77px','78px','79px','80px','81px','82px','83px','84px','85px','86px','87px','88px','89px','90px','91px','92px','93px','94px','95px','96px','97px','98px','99px');

$admania_dir_uri =  get_template_directory_uri();
$admania_blogscheme = array('amblyt1','amblyt2','amblyt3','amblyt4','amblyt5');
$admania_headerscheme = array('amheader1','amheader2','amheader3','amheader4','amheader5');
$admania_bl2pststypes = array('Latest','Random');

$admania_args = array(
'orderby' => 'name',
'order' => 'ASC'
);
$admania_cattypes = get_categories($admania_args);

if (class_exists( 'Woocommerce' )):
$admania_product_cattypes = '';
$admania_product_args = array(
         'taxonomy'     => 'product_cat',
         'orderby'      => 'name',		 
         'show_count'   => 0,
         'pad_counts'   => 0,
         'hierarchical' => 1,
         'title_li'     => '',
         'hide_empty'   => 0
);
$admania_product_cattypes = get_categories($admania_product_args);
endif;
$admania_postadalign = $admania_floattype;
$admania_postadparaalign = $admania_floattype;

$admania_headeronefontsize = $admania_fontsize;
$admania_headeronelineheight = $admania_lineheight;

$admania_headertwofontsize = $admania_fontsize;
$admania_headertwolineheight = $admania_lineheight;

$admania_headerthreefontsize = $admania_fontsize;
$admania_headerthreelineheight = $admania_lineheight;

$admania_headerfourfontsize = $admania_fontsize;
$admania_headerfourlineheight = $admania_lineheight;

$admania_headerfiveafontsize = $admania_fontsize;
$admania_headerfivelineheight = $admania_lineheight;

$admania_headersixfontsize = $admania_fontsize;
$admania_headersixlineheight = $admania_lineheight;


if(is_rtl()):
$admania_iptxttype = '50';
$admania_iptxttype1 = '60';
else:
$admania_iptxttype = '60';
$admania_iptxttype1 = '71';
endif;

	
	if ( !current_user_can( 'manage_options' ) ) return;
	
	function admania_defaults() {
	$admania_options = '';
	return $admania_options;
	}

	if(isset($_POST['reset'])) {
	update_option('admania_theme_settings', admania_defaults() );
	echo '<div class="update-nag admania_updtaenag">
	'.esc_html__('Theme settings have been reset and default values loaded. Please save changes to Continue','admania').'
	</div>'; 
	}	

	//show saved options message
	if ( false !== $_REQUEST['updated'] ) : ?>

<div>
  <p><strong>
    <?php  esc_html_e ( 'Options saved' , 'admania' ); ?>
    </strong></p>
</div>
<?php endif; ?>
<div id="admania_iconoptionsgeneral"></div>

<form class="admaniathemesupport" id="admaniathemesupport" method="post" action="<?php echo esc_url(admin_url('options.php'));?>">
  <div id="admania_savealert"></div>
  <?php settings_fields( 'admania_theme_settings' ); ?>
  <?php /*** General Settings*/ ?>
  <div id="admania_cssmenu" class="admania_cdtabs">
  <div class="admania_welcome">
    <div class="admania_col1 admania_col2"> <i class="fa fa-cogs"></i>
      <p>
        <?php  esc_html_e ( 'Admania Settings', 'admania' ); //your admin panel title ?>
      </p>
    </div>
    <div class="admania_col1 colver1"><i class="fa fa-trello"></i>
      <p>
        <?php  esc_html_e ( 'Version 1.0', 'admania' );  ?>
      </p>
    </div>
    <div class="admania_col1"><i class="fa fa-file-text-o"></i>
      <p>
        <?php $admania_link = 'http://userthemes.com/admania-document/'; ?>
        <a href="<?php echo esc_url($admania_link); ?>" target="_blank">
        <?php  esc_html_e ( 'Documentation', 'admania' ); ?>
        </a> </p>
    </div>
  </div>
  <nav>
    <ul class="admania_cdtabsnavigation">
      <li><a data-content="admania-general" class="selected" href="#admania-generalsettings"> <i class="dashicons dashicons-list-view"></i>
        <?php esc_html_e('General Settings','admania'); ?>
        </a></li>
	  <li><a data-content="admania_bloglayout_settings" href="#admania_bloglayout_settings"><i class="dashicons dashicons-feedback"></i>
        <?php esc_html_e('Layouts Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_slider" href="#admania_slider"><i class="dashicons dashicons-welcome-widgets-menus"></i>
        <?php esc_html_e('Slider Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_layoutfeaturedsettings" href="#admania_layoutfeaturedsettings"><i class="dashicons dashicons-media-interactive"></i>
        <?php esc_html_e('Featured Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_Fontsettings" href="#admania_Fontsettings"><i class="dashicons dashicons-editor-textcolor"></i>
        <?php esc_html_e('Font Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_postandpages" href="#postandpages"><i class="dashicons dashicons-media-spreadsheet"></i>
        <?php esc_html_e('Post & Pages Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_adssettings" href="#admania-authorsettings"><i class="dashicons dashicons-align-right"></i>
        <?php esc_html_e('Ad Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_optinsettings" href="#admania-optinsettings"><i class="dashicons dashicons-email"></i>
        <?php esc_html_e('Newsletter Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_footersettings" href="#admania-footersettings"><i class="dashicons dashicons-schedule"></i>
        <?php esc_html_e('Footer Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_colorsstngs" href="#admania_colorsstngs"><i class="dashicons dashicons-admin-customizer"></i>
        <?php esc_html_e('Color Settings','admania'); ?>
        </a></li>
      <li><a data-content="admania_customcsssettings" href="#admania-customcsssettings"><i class="dashicons dashicons-welcome-write-blog"></i>
        <?php esc_html_e('Custom Css Settings','admania'); ?>
        </a></li>
    </ul>
    <!-- admania_cdtabsnavigation --> 
  </nav>
  <ul class="admania_cdtabscontent">
    <li data-content="admania-general" class="selected"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ('General Settings' , 'admania' ); ?>
      </h2>
	 	 
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3 class="admania_settingheading">
            <?php  esc_html_e ( 'Custom Logo', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_optionsset">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_custom_logo_activestatus]">
                <?php  esc_html_e ( 'Show custom Logo', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_custom_logo_activestatus]" name="admania_theme_settings[admania_custom_logo_activestatus]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_custom_logo_activestatus'))); ?>  />
                <label><i></i></label>
              </div>
            </div>
            <label for="admania_theme_settings[admania_custom_logo]">
              <?php  esc_html_e ( 'Custom logo', 'admania' ); ?>
            </label>
            <input class="admania_custom_logo_url admania_imgpath" type="text" size="70" name="admania_theme_settings[admania_custom_logo]" value="<?php echo esc_url(admania_get_option('admania_custom_logo')); ?>" />
            <input  type="button" class="button admania_customlogo_media_upload" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
            <p>
              <?php esc_html_e('Recommended Size 300 x 100px','admania'); ?>
            </p>
            <div class="admaniabklogo_image"> <img class="admania_custom_logo_image" src="<?php echo esc_url(admania_get_option('admania_custom_logo')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
            <?php /*Logo*/?>
          </div>
        </div>
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Header Search Box', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_optionsset">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_hdrsrch]">
                <?php  esc_html_e ( 'Disable Header Search Box:', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_hdrsrch]" name="admania_theme_settings[admania_hdrsrch]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_hdrsrch'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <?php /*Header Search*/ ?>
          </div>
        </div>
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Layout Selection', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[wholelayoutwidth]">
              <?php  esc_html_e ( 'Whole Layout Width:', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[wholelayoutwidth]" name="admania_theme_settings[wholelayoutwidth]" type="text" value="<?php echo esc_attr(admania_get_option('wholelayoutwidth')); ?>" />
            <?php esc_html_e('px','admania'); ?>
            <p>
              <?php esc_html_e('Note : Dont write pixels in the above column (eg. 1250)','admania'); ?>
            </p>
          </div>
        </div>
        <?php /*favicon*/?>
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Header Social Follow Links', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem"> 
            <!-- header social media -->
            <label for="admania_theme_settings[admania_hdfacebook]">
              <?php  esc_html_e ('Header Facebook Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdfacebook]" name="admania_theme_settings[admania_hdfacebook]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdfacebook') ); ?>" />
            <label for="admania_theme_settings[admania_hdtwitter]">
              <?php  esc_html_e ('Header Twitter Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdtwitter]" name="admania_theme_settings[admania_hdtwitter]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdtwitter') ); ?>" />
            <label for="admania_theme_settings[admania_hdgoogleplus]">
              <?php  esc_html_e ('Header Googleplus Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdgoogleplus]" name="admania_theme_settings[admania_hdgoogleplus]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdgoogleplus')  ); ?>" />
            <label for="admania_theme_settings[admania_hdlinkedin]">
              <?php  esc_html_e ('Header Linkedin Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdlinkedin]" name="admania_theme_settings[admania_hdlinkedin]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdlinkedin')  ); ?>" />
            <label for="admania_theme_settings[admania_hdyoutube]">
              <?php  esc_html_e ('Header Youtube Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdyoutube]" name="admania_theme_settings[admania_hdyoutube]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdyoutube')  ); ?>" />
            <label for="admania_theme_settings[admania_hdinstagram]">
              <?php  esc_html_e ('Header Instagram Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdinstagram]" name="admania_theme_settings[admania_hdinstagram]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdinstagram')  ); ?>" />
            <label for="admania_theme_settings[admania_hdpinterest]">
              <?php  esc_html_e ('Header Pinterest Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdpinterest]" name="admania_theme_settings[admania_hdpinterest]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdpinterest')  ); ?>" />
            <label for="admania_theme_settings[admania_hdrss]">
              <?php  esc_html_e ('Header Rss Feed Url:', 'admania'); ?>
            </label>
            <input size="70" id="admania_theme_settings[admania_hdrss]" name="admania_theme_settings[admania_hdrss]" type="text" value="<?php echo esc_url( admania_get_option('admania_hdrss')  ); ?>" />
            <?php /*top social icons*/?>
          </div>
        </div>
		
		<div class="admania_optionsetngitem">
          <h3>
            <?php esc_html_e( 'Header Script Code' , 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[admania_header_script]">
              <?php esc_html_e( 'Paste your Header Script code' , 'admania' ); ?>
            </label>
            <textarea placeholder="<?php esc_html_e('Paste the Header Scripts','admania'); ?>" id="admania_theme_settings[admania_header_script]" name="admania_theme_settings[admania_header_script]" rows="15" cols="105"><?php echo (esc_textarea(admania_get_option('admania_header_script'))); ?></textarea>
          </div>
        </div>
        <!-- Header script code -->
        <div class="admania_optionsetngitem">
          <h3>
            <?php esc_html_e( 'Footer Script Code' , 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[admania_footer_script]">
              <?php esc_html_e( 'Paste your Footer Script code' , 'admania' ); ?>
            </label>
            <textarea placeholder="<?php esc_html_e('Paste the Footer Scripts','admania'); ?>" id="admania_theme_settings[admania_footer_script]" name="admania_theme_settings[admania_footer_script]" rows="15" cols="105"><?php echo esc_textarea(admania_get_option('admania_footer_script')); ?></textarea>
          </div>
        </div>
		 <!-- Footer script code -->
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Responsive' , 'admania'); ?>
          </h3>
          <div class="admania_optionsinneritem admania_optionsset">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_responsive]">
                <?php  esc_html_e ( 'Disable Responsive', 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_responsive]" name="admania_theme_settings[admania_responsive]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_responsive'))); ?>  />
                <label><i></i></label>
              </div>
              <?php /*admania_responsive*/?>
            </div>
          </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
	  
	<li data-content="admania_bloglayout_settings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
		<h2>
			<?php  esc_html_e ('Layouts and Headers Settings' , 'admania' ); ?>
		</h2>
		<div class="admania_pannelsettings">
		    <div class="admania_optionsetngitem">
			  <h3>
				<?php  esc_html_e ( 'Headers Options', 'admania' ); ?>
			  </h3>
				<div class="admania_optionsinneritem">
				<label for="admania_theme_settings[admania_headertype_scheme]">
					<?php esc_html_e( 'Header Types' , 'admania' ); ?>
				</label>
					<div class="admania_layout_setopt">
						<?php 
						foreach ($admania_headerscheme as $admania_headertpvalue) { ?>
						<label title="admania_headertypes" class="admania_headertype_selection admania_headerdefaultck check"> <img itemprop="image" src="<?php echo esc_url( get_template_directory_uri()); ?>/lib/includes/images/<?php echo esc_html($admania_headertpvalue); ?>.jpg" alt="<?php esc_html_e('Header Types','admania');?>">
							<input type="radio" class="admania_headertypes" name="admania_theme_settings[admania_headertype_scheme]" id="<?php echo esc_attr($admania_headertpvalue); ?>" value="<?php echo esc_attr($admania_headertpvalue); ?>" <?php checked( admania_get_option('admania_headertype_scheme') == $admania_headertpvalue ); ?> />
						</label>
						<?php } ?>
						
					</div>
				</div>
				<div id="admani_hideheaderlay1" class="admani_hidefistlayflds">
				<div class="admania_headerad_firstsectioninner">
					<div class="admania_headerad_firstsection">
										<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Header Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/headerad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl1" class="admania_hdradclk admania_adsensesection1"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Header Ad','admania');?></a> </div>
          </div>
							<div class="admania_optionsetngitem admania_optionsset admania_headeradsttng admania_adstngextrastyle" id="admania_adsectionscrl1">
								<h3>
									<?php  esc_html_e ( 'Header Ads Management' , 'admania'); ?>
								</h3>
							<div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
							<i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb1"></i>
							<div class="admania_optinosstngslist">
								<h3>
									<?php  esc_html_e ( 'Header Left Section Ad' , 'admania'); ?>
								</h3>
							<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
							<label for="admania_theme_settings[hdr_adtplft_act]">
								<?php  esc_html_e ( 'Enable the Header Left Section Ads :' , 'admania'); ?>
							</label>
							<div class="admania_switch admania_switchstyle">
								<input id="admania_theme_settings[hdr_adtplft_act]" name="admania_theme_settings[hdr_adtplft_act]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplft_act'))); ?> />
							<label><i></i></label>
							</div>
						</div>
						<div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
						<div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash1" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Left Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash1">
                  <label for="admania_theme_settings[hdr_adtplfthtmlcd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Left Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtplfthtmlcd]" name="admania_theme_settings[hdr_adtplfthtmlcd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtplfthtmlcd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash2" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Left Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash2">
                  <label for="admania_theme_settings[hdr_adtplftglecd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Left Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtplftglecd]" name="admania_theme_settings[hdr_adtplftglecd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtplftglecd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash3" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Left Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash3">
                  <label for="admania_theme_settings[admania_adimg_url1]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url1" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url1]" value="<?php echo esc_url(admania_get_option('admania_adimg_url1')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload1" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image1 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw1" src="<?php echo esc_url(admania_get_option('admania_adimg_url1')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url1]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url1]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url1')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash69" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash69">
                  <label for="admania_theme_settings[ad_rmcatlist1]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist1]" name="admania_theme_settings[ad_rmcatlist1]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist1')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist1]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist1]" name="admania_theme_settings[ad_rmtaglist1]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist1')); ?></textarea>
                </div>
              </div>
						</div>
						<div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Header Right Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtprgt_act]">
                  <?php  esc_html_e ( 'Enable the Header Right Section Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtprgt_act]" name="admania_theme_settings[hdr_adtprgt_act]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtprgt_act'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash4" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Right Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash4">
                  <label for="admania_theme_settings[hdr_adtprgthtmlcd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Right Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtprgthtmlcd]" name="admania_theme_settings[hdr_adtprgthtmlcd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtprgthtmlcd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash5" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Right Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash5">
                  <label for="admania_theme_settings[hdr_adtprgtglecd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Right Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtprgtglecd]" name="admania_theme_settings[hdr_adtprgtglecd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtprgtglecd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash6" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Right Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash6">
                  <label for="admania_theme_settings[admania_adimg_url2]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url2" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url2]" value="<?php echo esc_url(admania_get_option('admania_adimg_url2')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload2" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image2 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw2" src="<?php echo esc_url(admania_get_option('admania_adimg_url2')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url2]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url2]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url2')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash70" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash70">
                  <label for="admania_theme_settings[ad_rmcatlist2]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist2]" name="admania_theme_settings[ad_rmcatlist2]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist2')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist2]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist2]" name="admania_theme_settings[ad_rmtaglist2]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist2')); ?></textarea>
                </div>
              </div>
            </div>
			</div>
				</div>
					</div>
				</div>
				<div id="admani_hideheaderlay2" class="admani_hidefistlayflds">
					<div class="admania_headerad_firstsectioninner">
						<div class="admania_headerad_firstsection">
												<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Header Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/headertpad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl13" class="admania_hdradclk admania_adsensesection1"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Header Ad','admania');?></a> </div>
          </div>
			<div class="admania_optionsetngitem admania_optionsset admania_headeradsttng admania_adstngextrastyle" id="admania_adsectionscrl13">
								<h3>
									<?php  esc_html_e ( 'Header Ads Management' , 'admania'); ?>
								</h3>
							<div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
							<i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb1"></i>
							<div class="admania_optinosstngslist">
								<h3>
									<?php  esc_html_e ( 'Top Header Section Ad' , 'admania'); ?>
								</h3>
							<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
							<label for="admania_theme_settings[hdr_adtplay2_act]">
								<?php  esc_html_e ( 'Enable the Top Header Section Ads :' , 'admania'); ?>
							</label>
							<div class="admania_switch admania_switchstyle">
								<input id="admania_theme_settings[hdr_adtplay2_act]" name="admania_theme_settings[hdr_adtplay2_act]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay2_act'))); ?> />
							<label><i></i></label>
							</div>
						</div>
						<div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
						<div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash89" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash89">
                  <label for="admania_theme_settings[hdr_lay2htmlcd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay2htmlcd]" name="admania_theme_settings[hdr_lay2htmlcd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay2htmlcd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash90" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash90">
                  <label for="admania_theme_settings[hdr_lay2glecd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay2glecd]" name="admania_theme_settings[hdr_lay2glecd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay2glecd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash91" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash91">
                  <label for="admania_theme_settings[admania_adimg_url23]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url23" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url23]" value="<?php echo esc_url(admania_get_option('admania_adimg_url23')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload23" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image23 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw23" src="<?php echo esc_url(admania_get_option('admania_adimg_url23')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url23]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url23]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url23')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash92" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash92">
                  <label for="admania_theme_settings[ad_rmcatlist21]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist21]" name="admania_theme_settings[ad_rmcatlist21]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist21')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist21]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist21]" name="admania_theme_settings[ad_rmtaglist21]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist21')); ?></textarea>
                </div>				
              </div>
			</div>
			</div>
						</div>
					</div>
				</div>
				<div id="admani_hideheaderlay3" class="admani_hidefistlayflds">
				<div class="admania_headerad_firstsectioninner">
						<div class="admania_headerad_firstsection">
											<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Header Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/hdlay3raftrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl20" class="admania_hdradclk admania_adsensesection1"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Header Ad','admania');?></a> </div>
          </div>
		    <div class="admania_optionsetngitem admania_optionsset admania_headeradsttng admania_adstngextrastyle" id="admania_adsectionscrl20">
								<h3>
									<?php  esc_html_e ( 'Header Ads Management' , 'admania'); ?>
								</h3>
							<div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
							<i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb1"></i>
							<div class="admania_optinosstngslist">
								<h3>
									<?php  esc_html_e ( 'Header Section Ad' , 'admania'); ?>
								</h3>
							<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
							<label for="admania_theme_settings[hdr_adtplay3_act]">
								<?php  esc_html_e ( 'Enable the Header Section Ads :' , 'admania'); ?>
							</label>
							<div class="admania_switch admania_switchstyle">
								<input id="admania_theme_settings[hdr_adtplay3_act]" name="admania_theme_settings[hdr_adtplay3_act]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay3_act'))); ?> />
							<label><i></i></label>
							</div>
						</div>
						<div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
						<div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash107" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash107">
                  <label for="admania_theme_settings[hdr_lay3htmlcd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay3htmlcd]" name="admania_theme_settings[hdr_lay3htmlcd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay3htmlcd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash108" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash108">
                  <label for="admania_theme_settings[hdr_lay3glecd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay3glecd]" name="admania_theme_settings[hdr_lay3glecd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay3glecd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash109" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash109">
                  <label for="admania_theme_settings[admania_adimg_url28]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url28" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url28]" value="<?php echo esc_url(admania_get_option('admania_adimg_url28')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload28" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image28 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw28" src="<?php echo esc_url(admania_get_option('admania_adimg_url28')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url28]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url28]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url28')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash110" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash110">
                  <label for="admania_theme_settings[ad_rmcatGrid32]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid32]" name="admania_theme_settings[ad_rmcatGrid32]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid32')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid32]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid32]" name="admania_theme_settings[ad_rmtagGrid32]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid32')); ?></textarea>
                </div>				
              </div>
			</div>
			</div>
						</div>
					</div>
				</div>
				<div id="admani_hideheaderlay4" class="admani_hidefistlayflds">
				<div class="admania_headerad_firstsectioninner">
						<div class="admania_headerad_firstsection">
												<div class="admania_fade admania_adhdng">
						<h3>
						<?php  esc_html_e ( 'Header Top Ads Management' , 'admania'); ?>
						<i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
						<div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/hdlay4raftrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl38" class="admania_hdradclk admania_adsensesection1"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Header Top Ad','admania');?></a> </div>
						</div>
						<div class="admania_optionsetngitem admania_optionsset admania_headeradsttng admania_adstngextrastyle" id="admania_adsectionscrl38">
								<h3>
									<?php  esc_html_e ( 'Header Top Ads Management' , 'admania'); ?>
								</h3>
							<div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
							<i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb1"></i>
							<div class="admania_optinosstngslist">
								<h3>
									<?php  esc_html_e ( 'Header Top Section Ad' , 'admania'); ?>
								</h3>
							<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
							<label for="admania_theme_settings[hdr_adtplay4_act]">
								<?php  esc_html_e ( 'Enable the Header Top Section Ads :' , 'admania'); ?>
							</label>
							<div class="admania_switch admania_switchstyle">
								<input id="admania_theme_settings[hdr_adtplay4_act]" name="admania_theme_settings[hdr_adtplay4_act]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay4_act'))); ?> />
							<label><i></i></label>
							</div>
						</div>
						<div class="admania_adsstngsnotes">
							<?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
						</div>
				<div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash124" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash124">
                  <label for="admania_theme_settings[hdr_lay4htmlcd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay4htmlcd]" name="admania_theme_settings[hdr_lay4htmlcd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay4htmlcd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash125" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash125">
                  <label for="admania_theme_settings[hdr_lay4glecd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Top Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay4glecd]" name="admania_theme_settings[hdr_lay4glecd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay4glecd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash126" class="admania_iconrt">
                <?php  esc_html_e ( 'Top Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash126">
                  <label for="admania_theme_settings[admania_adimg_url33]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url33" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url33]" value="<?php echo esc_url(admania_get_option('admania_adimg_url33')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload33" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image33 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw33" src="<?php echo esc_url(admania_get_option('admania_adimg_url33')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url33]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url33]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url33')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash127" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash127">
                  <label for="admania_theme_settings[ad_rmcatGrid34]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid34]" name="admania_theme_settings[ad_rmcatGrid34]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid34')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid34]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid34]" name="admania_theme_settings[ad_rmtagGrid34]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid34')); ?></textarea>
                </div>				
              </div>
			</div>
			</div>
						</div>
					</div>
				</div>
						
				</div>
			<div class="admania_optionsetngitem">
			  <h3>
				<?php  esc_html_e ( 'Layouts Options', 'admania' ); ?>
			  </h3>			  
				<div class="admania_optionsinneritem">
				<label for="admania_theme_settings[admania_blog_scheme]">
					<?php esc_html_e( 'Blog Layouts' , 'admania' ); ?>
				</label>
					<div class="admania_layout_setopt">
						<?php 
						foreach ($admania_blogscheme as $admania_layvalue) { ?>
						<label title="admania_layout" class="admania_layout_selection admania_defaultck check"> <img itemprop="image" src="<?php echo esc_url( get_template_directory_uri()); ?>/lib/includes/images/<?php echo esc_html($admania_layvalue); ?>.jpg" alt="<?php esc_html_e('Layouts','admania');?>">
							<input type="radio" class="admania_layout" name="admania_theme_settings[admania_blog_scheme]" id="<?php echo esc_attr($admania_layvalue); ?>" value="<?php echo esc_attr($admania_layvalue); ?>" <?php checked( admania_get_option('admania_blog_scheme') == $admania_layvalue ); ?> />
						</label>
						<?php } ?>
						
					</div>
				</div>
				<div class="admania_headerad_firstsectioninner admani_hidefistlayflds">
                <div class="admania_headerad_firstsection">	
				<div class="admania_fade admania_adhdng">
					<h3>
					<?php  esc_html_e ( 'Content Section Right Ads Management' , 'admania'); ?>
					<i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
					<div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/headerrgtad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl3" class="admania_hdradclk admania_adsensesection3"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Content Section Ad','admania');?></a> </div>
				</div>
				<div class="admania_optionsetngitem admania_optionsset admania_cntadsttng admania_adstngextrastyle" id="admania_adsectionscrl3">
				<h3>
				<?php  esc_html_e ( 'Content Section Right Ads Management' , 'admania'); ?>
				</h3>
				<div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
				<i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb3"></i>
			    <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Right Sidebar Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtprgt_act2]">
                  <?php  esc_html_e ( 'Enable the Right Sidebar Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtprgt_act2]" name="admania_theme_settings[hdr_adtprgt_act2]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtprgt_act2'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash16" class="admania_iconrt">
                <?php  esc_html_e ( 'Right Sidebar Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash16">
                  <label for="admania_theme_settings[hdr_adtprgthtmlcd2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Right Sidebar Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtprgthtmlcd2]" name="admania_theme_settings[hdr_adtprgthtmlcd2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtprgthtmlcd2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash17" class="admania_iconrt">
                <?php  esc_html_e ( 'Right Sidebar Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash17">
                  <label for="admania_theme_settings[hdr_adtprgtglecd2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Right Sidebar Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtprgtglecd2]" name="admania_theme_settings[hdr_adtprgtglecd2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtprgtglecd2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash18" class="admania_iconrt">
                <?php  esc_html_e ( 'Right Sidebar Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash18">
                  <label for="admania_theme_settings[admania_adimg_url6]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url6" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url6]" value="<?php echo esc_url(admania_get_option('admania_adimg_url6')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload6" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image6 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw6" src="<?php echo esc_url(admania_get_option('admania_adimg_url6')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url6]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url6]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url6')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash75" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash75">
                  <label for="admania_theme_settings[ad_rmcatlist6]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist6]" name="admania_theme_settings[ad_rmcatlist6]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist6')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist6]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist6]" name="admania_theme_settings[ad_rmtaglist6]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist6')); ?></textarea>
                </div>
              </div>
            </div>
				</div>
                </div>	
                </div>					
				<div id="admani_hidefistlay1" class="admani_hidefistlayflds">
				    <div class="admania_headerad_firstsectioninner">
					<div class="admania_headerad_firstsection">
						<div class="admania_optionsetngitem">
							<div class="admania_optinosstngslist admania_optinosstngslistsbr">
							    <h3>
									<?php  esc_html_e ( 'Customize the Sidebar Settings' , 'admania'); ?>
								</h3>
								<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
									<label for="admania_theme_settings[layt4_cnt_frstlaytlstsdbr]">
										<?php  esc_html_e ( 'Disable the Content Left Sidebar :' , 'admania'); ?>
									</label>
									<div class="admania_switch admania_switchstyle">
										<input id="admania_theme_settings[layt4_cnt_frstlaytlstsdbr]" name="admania_theme_settings[layt4_cnt_frstlaytlstsdbr]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('layt4_cnt_frstlaytlstsdbr'))); ?> />
										<label><i></i></label>
									</div>
								</div>						
							</div>
						</div>	

					<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/hdraftrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl2" class="admania_hdradclk admania_adsensesection2"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Header Ad','admania');?></a> </div>
          </div>
		   <div class="admania_optionsetngitem admania_optionsset admania_aftrheaderadsttng admania_adstngextrastyle" id="admania_adsectionscrl2">
            <h3>
              <?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb2"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Header Left Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtplft_act1]">
                  <?php  esc_html_e ( 'Enable the After Header Left Section Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtplft_act1]" name="admania_theme_settings[hdr_adtplft_act1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplft_act1'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash7" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Left Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash7">
                  <label for="admania_theme_settings[hdr_adtplfthtmlcd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Left Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtplfthtmlcd1]" name="admania_theme_settings[hdr_adtplfthtmlcd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtplfthtmlcd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash8" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Left Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash8">
                  <label for="admania_theme_settings[hdr_adtplftglecd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Left Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtplftglecd1]" name="admania_theme_settings[hdr_adtplftglecd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtplftglecd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash9" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Left Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash9">
                  <label for="admania_theme_settings[admania_adimg_url3]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url3" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url3]" value="<?php echo esc_url(admania_get_option('admania_adimg_url3')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload3" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image3 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw3" src="<?php echo esc_url(admania_get_option('admania_adimg_url3')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url3]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url3]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url3')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash71" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash71">
                  <label for="admania_theme_settings[ad_rmcatlist3]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist3]" name="admania_theme_settings[ad_rmcatlist3]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist3')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist3]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist3]" name="admania_theme_settings[ad_rmtaglist3]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist3')); ?></textarea>
                </div>
              </div>
            </div>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Header Section Right Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtprgt_act1]">
                  <?php  esc_html_e ( 'Enable the After Header Section Right Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtprgt_act1]" name="admania_theme_settings[hdr_adtprgt_act1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtprgt_act1'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash10" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Right Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash10">
                  <label for="admania_theme_settings[hdr_adtprgthtmlcd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Right Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtprgthtmlcd1]" name="admania_theme_settings[hdr_adtprgthtmlcd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtprgthtmlcd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash11" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Right Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash11">
                  <label for="admania_theme_settings[hdr_adtprgtglecd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Right Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtprgtglecd1]" name="admania_theme_settings[hdr_adtprgtglecd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtprgtglecd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash12" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Right Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash12">
                  <label for="admania_theme_settings[admania_adimg_url4]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url4" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url4]" value="<?php echo esc_url(admania_get_option('admania_adimg_url4')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload4" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image4 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw4" src="<?php echo esc_url(admania_get_option('admania_adimg_url4')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url4]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url4]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url4')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash72" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash72">
                  <label for="admania_theme_settings[ad_rmcatlist4]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist4]" name="admania_theme_settings[ad_rmcatlist4]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist4')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist4]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist4]" name="admania_theme_settings[ad_rmtaglist4]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist4')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
           	<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Content Section Left Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/headerlfsecad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl46" class="admania_hdradclk admania_adsensesection20"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Content Section Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_cntadsttng admania_adstngextrastyle" id="admania_adsectionscrl46">
            <h3>
              <?php  esc_html_e ( 'Content Section Left Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb3"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Left Sidebar Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtplft_act2]">
                  <?php  esc_html_e ( 'Enable the Left Sidebar Ad:' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtplft_act2]" name="admania_theme_settings[hdr_adtplft_act2]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplft_act2'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash13" class="admania_iconrt">
                <?php  esc_html_e ( 'Left Sidebar Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash13">
                  <label for="admania_theme_settings[hdr_adtplfthtmlcd2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Left Sidebar Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtplfthtmlcd2]" name="admania_theme_settings[hdr_adtplfthtmlcd2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtplfthtmlcd2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash14" class="admania_iconrt">
                <?php  esc_html_e ( 'Left Sidebar Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash14">
                  <label for="admania_theme_settings[hdr_adtplftglecd2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Left Sidebar Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_adtplftglecd2]" name="admania_theme_settings[hdr_adtplftglecd2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_adtplftglecd2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash15" class="admania_iconrt">
                <?php  esc_html_e ( 'Left Sidebar Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash15">
                  <label for="admania_theme_settings[admania_adimg_url5]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url5" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url5]" value="<?php echo esc_url(admania_get_option('admania_adimg_url5')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload5" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image5 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw5" src="<?php echo esc_url(admania_get_option('admania_adimg_url5')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url5]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url5]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url5')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash74" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash74">
                  <label for="admania_theme_settings[ad_rmcatlist5]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist5]" name="admania_theme_settings[ad_rmcatlist5]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist5')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist5]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist5]" name="admania_theme_settings[ad_rmtaglist5]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist5')); ?></textarea>
                </div>
              </div>
            </div>
          </div>	
					
            <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home Page After Slider Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/aftrsldrsctn.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl4" class="admania_hdradclk admania_adsensesection4"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Slider Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_aftrsldrsctn admania_adstngextrastyle" id="admania_adsectionscrl4">
            <h3>
              <?php  esc_html_e ( 'Home Page After Slider Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb4" id="admania_adstnngtop4"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Slider Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_aftrsldrad]">
                  <?php  esc_html_e ( 'Enable the After Slider Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_aftrsldrad]" name="admania_theme_settings[hm_aftrsldrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_aftrsldrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash19" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash19">
                  <label for="admania_theme_settings[hm_aftrsldrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_aftrsldrhtmlad]" name="admania_theme_settings[hm_aftrsldrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_aftrsldrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash20" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash20">
                  <label for="admania_theme_settings[hm_aftrsldrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_aftrsldrgglead]" name="admania_theme_settings[hm_aftrsldrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_aftrsldrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash21" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash21">
                  <label for="admania_theme_settings[admania_adimg_url7]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url7" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url7]" value="<?php echo esc_url(admania_get_option('admania_adimg_url7')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload7" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image7 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw7" src="<?php echo esc_url(admania_get_option('admania_adimg_url7')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url7]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url7]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url7')); ?>" />
                </div>  
              </div>
            </div>
          </div>
		<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home / Archives After Grid Post Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/hmpostinerad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl5" class="admania_hdradclk admania_adsensesection5"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Home / Archives After Grid Post Ad','admania');?></a> </div>
          </div>
					<div class="admania_optionsetngitem admania_optionsset admania_hmpostinad admania_adstngextrastyle" id="admania_adsectionscrl5">
            <h3>
              <?php  esc_html_e ( 'Home / Archives After Grid Post Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb5" id="admania_adstnngtop5"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Grid Post Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_aftrgridad]">
                  <?php  esc_html_e ( 'Enable the After Grid Post Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_aftrgridad]" name="admania_theme_settings[hm_aftrgridad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_aftrgridad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash22" class="admania_iconrt">
                <?php  esc_html_e ( 'After Grid Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash22">
                  <label for="admania_theme_settings[hm_aftrgridhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Grid Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_aftrgridhtmlad]" name="admania_theme_settings[hm_aftrgridhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_aftrgridhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash23" class="admania_iconrt">
                <?php  esc_html_e ( 'After Grid Post Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash23">
                  <label for="admania_theme_settings[hm_aftrgridgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Grid Post Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_aftrgridgglead]" name="admania_theme_settings[hm_aftrgridgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_aftrgridgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash24" class="admania_iconrt">
                <?php  esc_html_e ( 'After Grid Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash24">
                  <label for="admania_theme_settings[admania_adimg_url8]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url8" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url8]" value="<?php echo esc_url(admania_get_option('admania_adimg_url8')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload8" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image8 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw8" src="<?php echo esc_url(admania_get_option('admania_adimg_url8')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url8]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url8]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url8')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash77" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash77">
                  <label for="admania_theme_settings[ad_rmcatlist8]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist8]" name="admania_theme_settings[ad_rmcatlist8]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist8')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist8]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist8]" name="admania_theme_settings[ad_rmtaglist8]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist8')); ?></textarea>
                </div>
              </div>
            </div>
             </div>
				</div>
				</div>
				</div>
				<div id="admani_hidefistlay2" class="admani_hidefistlayflds">
								    <div class="admania_headerad_firstsectioninner">
					<div class="admania_headerad_firstsection">

			<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay2afhdrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl14" class="admania_hdradclk admania_adsensesection2"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Header Ad','admania');?></a> </div>
          </div>
					<div class="admania_optionsetngitem admania_optionsset admania_aftrheaderadsttng admania_adstngextrastyle" id="admania_adsectionscrl14">
            <h3>
              <?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb2"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Header Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtplay2_act1]">
                  <?php  esc_html_e ( 'Enable the After Header Section Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtplay2_act1]" name="admania_theme_settings[hdr_adtplay2_act1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay2_act1'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash93" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash93">
                  <label for="admania_theme_settings[hdr_lay2htmlcd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay2htmlcd1]" name="admania_theme_settings[hdr_lay2htmlcd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay2htmlcd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash94" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash94">
                  <label for="admania_theme_settings[hdr_lay2glecd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay2glecd1]" name="admania_theme_settings[hdr_lay2glecd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay2glecd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash95" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash95">
                  <label for="admania_theme_settings[admania_adimg_url24]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url24" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url24]" value="<?php echo esc_url(admania_get_option('admania_adimg_url24')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload24" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image24 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw24" src="<?php echo esc_url(admania_get_option('admania_adimg_url24')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url24]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url24]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url24')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adsectionscrl15" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adsectionscrl15">
                  <label for="admania_theme_settings[ad_rmcatlist22]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist22]" name="admania_theme_settings[ad_rmcatlist22]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist22')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist22]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist22]" name="admania_theme_settings[ad_rmtaglist22]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist22')); ?></textarea>
                </div>
              </div>
            </div>        
          </div>	
        
         
					<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home Page After Slider Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/afterly2sldr.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl16" class="admania_hdradclk admania_adsensesection4"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Slider Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_aftrsldrsctn admania_adstngextrastyle" id="admania_adsectionscrl16">
            <h3>
              <?php  esc_html_e ( 'Home Page After Slider Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb4" id="admania_adstnngtop4"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Slider Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay2_aftrsldrad]">
                  <?php  esc_html_e ( 'Enable the After Slider Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay2_aftrsldrad]" name="admania_theme_settings[hm_lay2_aftrsldrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay2_aftrsldrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash96" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash96">
                  <label for="admania_theme_settings[hm_lay2_aftrsldrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay2_aftrsldrhtmlad]" name="admania_theme_settings[hm_lay2_aftrsldrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay2_aftrsldrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash97" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash97">
                  <label for="admania_theme_settings[hm_lay2_aftrsldrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay2_aftrsldrgglead]" name="admania_theme_settings[hm_lay2_aftrsldrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay2_aftrsldrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash98" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash98">
                  <label for="admania_theme_settings[admania_lay2_adimg_url25]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url25" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_lay2_adimg_url25]" value="<?php echo esc_url(admania_get_option('admania_lay2_adimg_url25')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload25" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image25 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw25" src="<?php echo esc_url(admania_get_option('admania_lay2_adimg_url25')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_lay2adimgtg_url25]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_lay2adimgtg_url25]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_lay2adimgtg_url25')); ?>" />
                </div>  
              </div>
            </div>
          </div>
		<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home / Archives After List Post Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/listpstad.jpg" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl18" class="admania_hdradclk admania_adsensesection5"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Home / Archives After List Post Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_hmpostinad admania_adstngextrastyle" id="admania_adsectionscrl18">
            <h3>
              <?php  esc_html_e ( 'Home / Archives After List Post Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb5" id="admania_adstnngtop5"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After List Post Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_aftrListad]">
                  <?php  esc_html_e ( 'Enable the After List Post Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_aftrListad]" name="admania_theme_settings[hm_aftrListad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_aftrListad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash100" class="admania_iconrt">
                <?php  esc_html_e ( 'After List Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash100">
                  <label for="admania_theme_settings[hm_aftrListhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After List Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_aftrListhtmlad]" name="admania_theme_settings[hm_aftrListhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_aftrListhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash101" class="admania_iconrt">
                <?php  esc_html_e ( 'After List Post Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash101">
                  <label for="admania_theme_settings[hm_aftrListgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After List Post Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_aftrListgglead]" name="admania_theme_settings[hm_aftrListgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_aftrListgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash102" class="admania_iconrt">
                <?php  esc_html_e ( 'After List Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash102">
                  <label for="admania_theme_settings[admania_adimg_url26]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url26" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url26]" value="<?php echo esc_url(admania_get_option('admania_adimg_url26')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload26" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image26 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw26" src="<?php echo esc_url(admania_get_option('admania_adimg_url26')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url26]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url26]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url26')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash103" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash103">
                  <label for="admania_theme_settings[ad_rmcatlist24]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist24]" name="admania_theme_settings[ad_rmcatlist24]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist24')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist24]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist24]" name="admania_theme_settings[ad_rmtaglist24]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist24')); ?></textarea>
                </div>
              </div>
            </div>
             </div>			  
			 
			 <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/footerad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl19" class="admania_hdradclk admania_adsensesection6"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Before Footer Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_adstngextrastyle" id="admania_adsectionscrl19">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb6" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay2bfftrad]">
                  <?php  esc_html_e ( 'Enable the Before Footer Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay2bfftrad]" name="admania_theme_settings[hm_lay2bfftrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay2bfftrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash104" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash104">
                  <label for="admania_theme_settings[hm_lay2bfftrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay2bfftrhtmlad]" name="admania_theme_settings[hm_lay2bfftrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay2bfftrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash26" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash26">
                  <label for="admania_theme_settings[hm_lay2bfftrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay2bfftrgglead]" name="admania_theme_settings[hm_lay2bfftrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay2bfftrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash105" class="admania_iconrt">
                <?php  esc_html_e ( 'After Grid Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash105">
                  <label for="admania_theme_settings[admania_adimg_url27]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url27" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url27]" value="<?php echo esc_url(admania_get_option('admania_adimg_url27')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload27" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image27 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw27" src="<?php echo esc_url(admania_get_option('admania_adimg_url27')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url27]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url27]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url27')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash106" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash106">
                  <label for="admania_theme_settings[ad_rmcatlist25]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist25]" name="admania_theme_settings[ad_rmcatlist25]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist25')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist25]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist25]" name="admania_theme_settings[ad_rmtaglist25]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist25')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
				</div>
				</div>
				</div>			
			    <div id="admani_hidefistlay3" class="admani_hidefistlayflds">
					<div class="admania_headerad_firstsectioninner">
					<div class="admania_headerad_firstsection">
	
			<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay2afhdrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl21" class="admania_hdradclk admania_adsensesection2"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Header Ad','admania');?></a> </div>
          </div>
					<div class="admania_optionsetngitem admania_optionsset admania_aftrheaderadsttng admania_adstngextrastyle" id="admania_adsectionscrl21">
            <h3>
              <?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb2"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Header Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtplay3_act1]">
                  <?php  esc_html_e ( 'Enable the After Header Section Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtplay3_act1]" name="admania_theme_settings[hdr_adtplay3_act1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay3_act1'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash111" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash111">
                  <label for="admania_theme_settings[hdr_lay3htmlcd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay3htmlcd1]" name="admania_theme_settings[hdr_lay3htmlcd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay3htmlcd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash112" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash112">
                  <label for="admania_theme_settings[hdr_lay3glecd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay3glecd1]" name="admania_theme_settings[hdr_lay3glecd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay3glecd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash113" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash113">
                  <label for="admania_theme_settings[admania_adimg_url31]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url31" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url31]" value="<?php echo esc_url(admania_get_option('admania_adimg_url31')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload31" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image31 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw31" src="<?php echo esc_url(admania_get_option('admania_adimg_url31')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url31]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url31]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url31')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adsectionscrl22" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adsectionscrl22">
                  <label for="admania_theme_settings[ad_rmcatGrid27]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid27]" name="admania_theme_settings[ad_rmcatGrid27]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid27')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid27]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid27]" name="admania_theme_settings[ad_rmtagGrid27]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid27')); ?></textarea>
                </div>
              </div>
            </div>        
          </div>  

		<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home / Archives Grid Post Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay3gridpostimg.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl24" class="admania_hdradclk admania_adsensesection5"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Home / Archives After Grid Post Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_hmpostinad admania_adstngextrastyle" id="admania_adsectionscrl24">
            <h3>
              <?php  esc_html_e ( 'Home / Archives Grid Post Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb5" id="admania_adstnngtop5"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Grid Post Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay3_grid]">
                  <?php  esc_html_e ( 'Enable the Grid Post Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay3_grid]" name="admania_theme_settings[hm_lay3_grid]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay3_grid'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash140" class="admania_iconrt">
                <?php  esc_html_e ( 'Grid Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash140">
                  <label for="admania_theme_settings[hm_lay3gridhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Grid Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay3gridhtmlad]" name="admania_theme_settings[hm_lay3gridhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay3gridhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash141" class="admania_iconrt">
                <?php  esc_html_e ( ' Grid Post Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash141">
                  <label for="admania_theme_settings[hm_lay3gridgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Grid Post Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay3gridgglead]" name="admania_theme_settings[hm_lay3gridgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay3gridgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash142" class="admania_iconrt">
                <?php  esc_html_e ( 'Grid Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash142">
                  <label for="admania_theme_settings[admania_adimg_url29]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url29" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url29]" value="<?php echo esc_url(admania_get_option('admania_adimg_url29')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload29" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image29 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw29" src="<?php echo esc_url(admania_get_option('admania_adimg_url29')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url29]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url29]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url29')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash103" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash103">
                  <label for="admania_theme_settings[ad_rmcatGrid29]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid29]" name="admania_theme_settings[ad_rmcatGrid29]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid29')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid29]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid29]" name="admania_theme_settings[ad_rmtagGrid29]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid29')); ?></textarea>
                </div>
              </div>
            </div>
        </div>
		
		<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Single Post Content Sticky Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/singlepostcntlay3tad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl30" class="admania_hdradclk admania_adsensesection6"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Single Content Sticky Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_adstngextrastyle" id="admania_adsectionscrl30">
            <h3>
              <?php  esc_html_e ( 'Single Post Content Sticky Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb6" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Single Post Content Sticky Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay3sglstkyad]">
                  <?php  esc_html_e ( 'Enable the Single Post Content Sticky Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay3sglstkyad]" name="admania_theme_settings[hm_lay3sglstkyad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay3sglstkyad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash120" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Content Sticky Ad', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash120">
                  <label for="admania_theme_settings[hm_lay3slcnthmtlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Content Sticky Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay3slcnthmtlad]" name="admania_theme_settings[hm_lay3slcnthmtlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay3slcnthmtlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash121" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Content Sticky Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash121">
                  <label for="admania_theme_settings[hm_lay3slsntgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Content Sticky Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay3slsntgglead]" name="admania_theme_settings[hm_lay3slsntgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay3slsntgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash122" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Content Sticky Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash122">
                  <label for="admania_theme_settings[admania_adimg_url32]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url32" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url32]" value="<?php echo esc_url(admania_get_option('admania_adimg_url32')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload32" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image32 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw32" src="<?php echo esc_url(admania_get_option('admania_adimg_url32')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url32]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url32]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url32')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash123" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash123">
                  <label for="admania_theme_settings[ad_rmcatGrid33]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid33]" name="admania_theme_settings[ad_rmcatGrid33]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid33')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid33]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid33]" name="admania_theme_settings[ad_rmtagGrid33]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid33')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
		
		 <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/beforelay3footer.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl31" class="admania_hdradclk admania_adsensesection19"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Before Footer Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_thirdlayout_inner admania_adstngextrastyle" id="admania_adsectionscrl31">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb19" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay3bfftrad]">
                  <?php  esc_html_e ( 'Enable the Before Footer Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay3bfftrad]" name="admania_theme_settings[hm_lay3bfftrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay3bfftrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash116" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash116">
                  <label for="admania_theme_settings[hm_lay3bfftrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay3bfftrhtmlad]" name="admania_theme_settings[hm_lay3bfftrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay3bfftrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash117" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash117">
                  <label for="admania_theme_settings[hm_lay3bfftrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay3bfftrgglead]" name="admania_theme_settings[hm_lay3bfftrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay3bfftrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash118" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash118">
                  <label for="admania_theme_settings[admania_adimg_url30]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url30" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url30]" value="<?php echo esc_url(admania_get_option('admania_adimg_url30')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload30" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image30 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw30" src="<?php echo esc_url(admania_get_option('admania_adimg_url30')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url30]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url30]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url30')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash119" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash119">
                  <label for="admania_theme_settings[ad_rmcatGrid30]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid30]" name="admania_theme_settings[ad_rmcatGrid30]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid30')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid30]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid30]" name="admania_theme_settings[ad_rmtagGrid30]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid30')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
				</div>
				</div>
				</div>	
			    <div id="admani_hidefistlay4" class="admani_hidefistlayflds">
					<div class="admania_headerad_firstsectioninner">
					<div class="admania_headerad_firstsection">
					   
					    <div class="admania_optionsetngitem">
							<div class="admania_optinosstngslist admania_optinosstngslistsbr">
							    <h3>
									<?php  esc_html_e ( 'Customize the Sidebar Settings' , 'admania'); ?>
								</h3>
								<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
									<label for="admania_theme_settings[layt4_cnt_lstsdbr]">
										<?php  esc_html_e ( 'Disable the Content Left Sidebar :' , 'admania'); ?>
									</label>
									<div class="admania_switch admania_switchstyle">
										<input id="admania_theme_settings[layt4_cnt_lstsdbr]" name="admania_theme_settings[layt4_cnt_lstsdbr]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('layt4_cnt_lstsdbr'))); ?> />
										<label><i></i></label>
									</div>
								</div>
								<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
									<label for="admania_theme_settings[layt4_cnt_rgtsdbr]">
										<?php  esc_html_e ( 'Disable the Content Right Sidebar :' , 'admania'); ?>
									</label>
									<div class="admania_switch admania_switchstyle">
										<input id="admania_theme_settings[layt4_cnt_rgtsdbr]" name="admania_theme_settings[layt4_cnt_rgtsdbr]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('layt4_cnt_rgtsdbr'))); ?> />
										<label><i></i></label>
									</div>
								</div>
							</div>
						</div>					

			<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'After Slider Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay4afhdrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl37" class="admania_hdradclk admania_adsensesection2"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Header Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_aftrheaderadsttng admania_adstngextrastyle" id="admania_adsectionscrl37">
            <h3>
              <?php  esc_html_e ( 'After Slider Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb2"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Slider Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtplay4_act1]">
                  <?php  esc_html_e ( 'Enable the After Slider Section Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtplay4_act1]" name="admania_theme_settings[hdr_adtplay4_act1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay4_act1'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash136" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash136">
                  <label for="admania_theme_settings[hdr_lay4htmlcd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay4htmlcd1]" name="admania_theme_settings[hdr_lay4htmlcd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay4htmlcd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash128" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash128">
                  <label for="admania_theme_settings[hdr_lay4glecd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay4glecd1]" name="admania_theme_settings[hdr_lay4glecd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay4glecd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash129" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash129">
                  <label for="admania_theme_settings[admania_adimg_url35]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url35" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url35]" value="<?php echo esc_url(admania_get_option('admania_adimg_url35')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload35" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image35 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw35" src="<?php echo esc_url(admania_get_option('admania_adimg_url35')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url35]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url35]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url35')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adsectionscrl28" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adsectionscrl28">
                  <label for="admania_theme_settings[ad_rmcatGrid35]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid35]" name="admania_theme_settings[ad_rmcatGrid35]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid35')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid35]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid35]" name="admania_theme_settings[ad_rmtagGrid35]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid35')); ?></textarea>
                </div>
              </div>
            </div>        
          </div>   
		  
		  <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home / Archives Post Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay4gridpostimg.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl39" class="admania_hdradclk admania_adsensesection5"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Home / Archives After Post Ad','admania');?></a> </div>
          </div>
		  <div class="admania_optionsetngitem admania_optionsset admania_hmpostinad admania_adstngextrastyle" id="admania_adsectionscrl39">
            <h3>
              <?php  esc_html_e ( 'Home / Archives Post Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb5" id="admania_adstnngtop5"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Post Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay4_grid]">
                  <?php  esc_html_e ( 'Enable the Post Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay4_grid]" name="admania_theme_settings[hm_lay4_grid]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay4_grid'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash138" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash138">
                  <label for="admania_theme_settings[hm_lay4gridhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay4gridhtmlad]" name="admania_theme_settings[hm_lay4gridhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay4gridhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash143" class="admania_iconrt">
                <?php  esc_html_e ( ' Post Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash143">
                  <label for="admania_theme_settings[hm_lay4gridgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay4gridgglead]" name="admania_theme_settings[hm_lay4gridgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay4gridgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash144" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash144">
                  <label for="admania_theme_settings[admania_adimg_url36]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url36" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url36]" value="<?php echo esc_url(admania_get_option('admania_adimg_url36')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload36" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image36 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw36" src="<?php echo esc_url(admania_get_option('admania_adimg_url36')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url36]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url36]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url36')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash145" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash145">
                  <label for="admania_theme_settings[ad_rmcatGrid36]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid36]" name="admania_theme_settings[ad_rmcatGrid36]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid36')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid36]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid36]" name="admania_theme_settings[ad_rmtagGrid36]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid36')); ?></textarea>
                </div>
              </div>
            </div>
        </div>
			
		<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/beforelay4footer.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl25" class="admania_hdradclk admania_adsensesection6"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Before Footer Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_adstngextrastyle" id="admania_adsectionscrl25">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb6" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay4bfftrad]">
                  <?php  esc_html_e ( 'Enable the Before Footer Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay4bfftrad]" name="admania_theme_settings[hm_lay4bfftrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay4bfftrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash134" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash134">
                  <label for="admania_theme_settings[hm_lay4bfftrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay4bfftrhtmlad]" name="admania_theme_settings[hm_lay4bfftrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay4bfftrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash131" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash131">
                  <label for="admania_theme_settings[hm_lay4bfftrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay4bfftrgglead]" name="admania_theme_settings[hm_lay4bfftrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay4bfftrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash132" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash132">
                  <label for="admania_theme_settings[admania_adimg_url34]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url34" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url34]" value="<?php echo esc_url(admania_get_option('admania_adimg_url34')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload34" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image34 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw34" src="<?php echo esc_url(admania_get_option('admania_adimg_url34')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url34]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url34]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url34')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash135" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash135">
                  <label for="admania_theme_settings[ad_rmcatGrid37]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid37]" name="admania_theme_settings[ad_rmcatGrid37]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid37')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid37]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid37]" name="admania_theme_settings[ad_rmtagGrid37]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid37')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
				</div>
				</div>
				</div>	
			 
            	<div id="admani_hidefistlay5" class="admani_hidefistlayflds">
					<div class="admania_headerad_firstsectioninner">
					<div class="admania_headerad_firstsection">
						<div class="admania_fade admania_adhdng">
						<h3>
						<?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
						<i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
						<div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/hdlay4raftrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl40" class="admania_hdradclk admania_adsensesection1"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Header Ad','admania');?></a> </div>
						</div>
						<div class="admania_optionsetngitem admania_optionsset admania_headeradsttng admania_adstngextrastyle" id="admania_adsectionscrl40">
								<h3>
									<?php  esc_html_e ( 'After Header Ads Management' , 'admania'); ?>
								</h3>
							<div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
							<i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb1"></i>
							<div class="admania_optinosstngslist">
								<h3>
									<?php  esc_html_e ( 'After Header Ads' , 'admania'); ?>
								</h3>
							<div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
							<label for="admania_theme_settings[hdr_adtplay5_act]">
								<?php  esc_html_e ( 'Enable the After Header Section Ads :' , 'admania'); ?>
							</label>
							<div class="admania_switch admania_switchstyle">
								<input id="admania_theme_settings[hdr_adtplay5_act]" name="admania_theme_settings[hdr_adtplay5_act]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay5_act'))); ?> />
							<label><i></i></label>
							</div>
						</div>
						<div class="admania_adsstngsnotes">
							<?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
						</div>
				<div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash130" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash130">
                  <label for="admania_theme_settings[hdr_lay5htmlcd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay5htmlcd]" name="admania_theme_settings[hdr_lay5htmlcd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay5htmlcd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash171" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash171">
                  <label for="admania_theme_settings[hdr_lay5glecd]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Header Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay5glecd]" name="admania_theme_settings[hdr_lay5glecd]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay5glecd')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash172" class="admania_iconrt">
                <?php  esc_html_e ( 'After Header Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash172">
                  <label for="admania_theme_settings[admania_adimg_url46]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url46" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url46]" value="<?php echo esc_url(admania_get_option('admania_adimg_url46')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload46" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image46 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw46" src="<?php echo esc_url(admania_get_option('admania_adimg_url46')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url46]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url46]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url46')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash173" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash173">
                  <label for="admania_theme_settings[ad_rmcatGrid40]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid40]" name="admania_theme_settings[ad_rmcatGrid40]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid40')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid40]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid40]" name="admania_theme_settings[ad_rmtagGrid40]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid40')); ?></textarea>
                </div>				
              </div>
			</div>
			</div>
			<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'After Slider Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay4afhdrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl41" class="admania_hdradclk admania_adsensesection2"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the After Header Ad','admania');?></a> </div>
          </div>
			<div class="admania_optionsetngitem admania_optionsset admania_aftrheaderadsttng admania_adstngextrastyle" id="admania_adsectionscrl41">
            <h3>
              <?php  esc_html_e ( 'After Slider Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb2"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'After Slider Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hdr_adtplay5_act1]">
                  <?php  esc_html_e ( 'Enable the After Slider Section Ads :' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hdr_adtplay5_act1]" name="admania_theme_settings[hdr_adtplay5_act1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hdr_adtplay5_act1'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash139" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash139">
                  <label for="admania_theme_settings[hdr_lay5htmlcd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay5htmlcd1]" name="admania_theme_settings[hdr_lay5htmlcd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay5htmlcd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash150" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash150">
                  <label for="admania_theme_settings[hdr_lay5glecd1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'After Slider Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hdr_lay5glecd1]" name="admania_theme_settings[hdr_lay5glecd1]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hdr_lay5glecd1')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash151" class="admania_iconrt">
                <?php  esc_html_e ( 'After Slider Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash151">
                  <label for="admania_theme_settings[admania_adimg_url40]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url40" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url40]" value="<?php echo esc_url(admania_get_option('admania_adimg_url40')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload40" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image40 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw40" src="<?php echo esc_url(admania_get_option('admania_adimg_url40')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url40]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url40]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url40')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adsectionscrl42" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adsectionscrl42">
                  <label for="admania_theme_settings[ad_rmcatGrid40]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid40]" name="admania_theme_settings[ad_rmcatGrid40]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid40')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid40]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid40]" name="admania_theme_settings[ad_rmtagGrid40]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid40')); ?></textarea>
                </div>
              </div>
            </div>        
          </div>  

			<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Home/Archives Post Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/lay4gridpostimg.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl43" class="admania_hdradclk admania_adsensesection5"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Home Post Ad','admania');?></a> </div>
          </div>
			<div class="admania_optionsetngitem admania_optionsset admania_hmpostinad admania_adstngextrastyle" id="admania_adsectionscrl43">
            <h3>
              <?php  esc_html_e ( 'Home Post Section Ads1 Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb5" id="admania_adstnngtop5"></i>
            
			<div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Post Section Ad1' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay5_grid]">
                  <?php  esc_html_e ( 'Enable the Post Section Ad1' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay5_grid]" name="admania_theme_settings[hm_lay5_grid]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay5_grid'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash158" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad1 ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash158">
                  <label for="admania_theme_settings[hm_lay5gridhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad1 ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridhtmlad]" name="admania_theme_settings[hm_lay5gridhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash153" class="admania_iconrt">
                <?php  esc_html_e ( ' Post Section Ad1 ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash153">
                  <label for="admania_theme_settings[hm_lay5gridgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad1 ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridgglead]" name="admania_theme_settings[hm_lay5gridgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash154" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad1 ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash154">
                  <label for="admania_theme_settings[admania_adimg_url41]">
                    <?php  esc_html_e ( 'Choose the Ad1 Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url41" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url41]" value="<?php echo esc_url(admania_get_option('admania_adimg_url41')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload41" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image41 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw41" src="<?php echo esc_url(admania_get_option('admania_adimg_url41')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url41]">
                    <?php  esc_html_e ( 'Image Ad1 Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url41]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url41')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash155" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash155">
                  <label for="admania_theme_settings[ad_rmcatGrid41]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid41]" name="admania_theme_settings[ad_rmcatGrid41]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid41')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid41]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid41]" name="admania_theme_settings[ad_rmtagGrid41]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid41')); ?></textarea>
                </div>
              </div>
            </div>
			
			<div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Post Section Ad2' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay5_gridad2]">
                  <?php  esc_html_e ( 'Enable the Post Section Ad2' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay5_gridad2]" name="admania_theme_settings[hm_lay5_gridad2]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay5_gridad2'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash159" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad2 ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash159">
                  <label for="admania_theme_settings[hm_lay5gridhtmlad2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad2 ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridhtmlad2]" name="admania_theme_settings[hm_lay5gridhtmlad2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridhtmlad2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash160" class="admania_iconrt">
                <?php  esc_html_e ( ' Post Section Ad2 ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash160">
                  <label for="admania_theme_settings[hm_lay5gridgglead2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad2 ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridgglead2]" name="admania_theme_settings[hm_lay5gridgglead2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridgglead2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash161" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad2 ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash161">
                  <label for="admania_theme_settings[admania_adimg_url43]">
                    <?php  esc_html_e ( 'Choose the Ad2 Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url43" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url43]" value="<?php echo esc_url(admania_get_option('admania_adimg_url43')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload43" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image43 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw43" src="<?php echo esc_url(admania_get_option('admania_adimg_url43')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url43]">
                    <?php  esc_html_e ( 'Image Ad2 Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url43]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url43')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash162" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash162">
                  <label for="admania_theme_settings[ad_rmcatGrid43]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid43]" name="admania_theme_settings[ad_rmcatGrid43]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid43')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid43]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid43]" name="admania_theme_settings[ad_rmtagGrid43]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid43')); ?></textarea>
                </div>
              </div>
            </div>
            
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Post Section Ad3' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay5_gridad3]">
                  <?php  esc_html_e ( 'Enable the Post Section Ad3' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay5_gridad3]" name="admania_theme_settings[hm_lay5_gridad3]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay5_gridad3'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash163" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad3 ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash163">
                  <label for="admania_theme_settings[hm_lay5gridhtmlad3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad3 ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridhtmlad3]" name="admania_theme_settings[hm_lay5gridhtmlad3]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridhtmlad3')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash164" class="admania_iconrt">
                <?php  esc_html_e ( ' Post Section Ad3 ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash164">
                  <label for="admania_theme_settings[hm_lay5gridgglead3]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad3 ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridgglead3]" name="admania_theme_settings[hm_lay5gridgglead3]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridgglead3')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash165" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash165">
                  <label for="admania_theme_settings[admania_adimg_url44]">
                    <?php  esc_html_e ( 'Choose the Ad3 Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url44" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url44]" value="<?php echo esc_url(admania_get_option('admania_adimg_url44')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload44" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image44 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw44" src="<?php echo esc_url(admania_get_option('admania_adimg_url44')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url44]">
                    <?php  esc_html_e ( 'Image Ad3 Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url44]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url44')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash166" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash166">
                  <label for="admania_theme_settings[ad_rmcatGrid44]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid44]" name="admania_theme_settings[ad_rmcatGrid44]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid44')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid44]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid44]" name="admania_theme_settings[ad_rmtagGrid44]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid44')); ?></textarea>
                </div>
              </div>
            </div>			
            
			<div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Post Section Ad4' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay5_gridad4]">
                  <?php  esc_html_e ( 'Enable the Post Section Ad4' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay5_gridad4]" name="admania_theme_settings[hm_lay5_gridad4]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay5_gridad4'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash167" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad4 ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash167">
                  <label for="admania_theme_settings[hm_lay5gridhtmlad4]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad4 ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridhtmlad4]" name="admania_theme_settings[hm_lay5gridhtmlad4]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridhtmlad4')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash168" class="admania_iconrt">
                <?php  esc_html_e ( ' Post Section Ad4 ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash168">
                  <label for="admania_theme_settings[hm_lay5gridgglead4]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Post Section Ad4 ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5gridgglead4]" name="admania_theme_settings[hm_lay5gridgglead4]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5gridgglead4')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash169" class="admania_iconrt">
                <?php  esc_html_e ( 'Post Section Ad4 ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash169">
                  <label for="admania_theme_settings[admania_adimg_url45]">
                    <?php  esc_html_e ( 'Choose the Ad4 Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url45" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url45]" value="<?php echo esc_url(admania_get_option('admania_adimg_url45')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload45" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image45 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw45" src="<?php echo esc_url(admania_get_option('admania_adimg_url45')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url45]">
                    <?php  esc_html_e ( 'Image Ad4 Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url45]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url45')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash170" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash170">
                  <label for="admania_theme_settings[ad_rmcatGrid45]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid45]" name="admania_theme_settings[ad_rmcatGrid45]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid45')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid45]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid45]" name="admania_theme_settings[ad_rmtagGrid45]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid45')); ?></textarea>
                </div>
              </div>
            </div>
	    </div>
	     
		  <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ('Archives Before Content Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/ly5archbfcntad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl45" class="admania_hdradclk admania_adsensesection6"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Archives Before Content Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_adstngextrastyle" id="admania_adsectionscrl45">
            <h3>
              <?php  esc_html_e ( 'Archives Before Content Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb6" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Archives Before Content Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay5archad]">
                  <?php  esc_html_e ( 'Enable the Before Content Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay5archad]" name="admania_theme_settings[hm_lay5archad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay5archad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash180" class="admania_iconrt">
                <?php  esc_html_e ( 'Archives Before Content Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash180">
                  <label for="admania_theme_settings[hm_lay5archbfcnhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Archives Before Content Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5archbfcnhtmlad]" name="admania_theme_settings[hm_lay5archbfcnhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5archbfcnhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash181" class="admania_iconrt">
                <?php  esc_html_e ( 'Archives Before Content Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash181">
                  <label for="admania_theme_settings[hm_lay5bfarchcngglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Archives Before Content Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5bfarchcngglead]" name="admania_theme_settings[hm_lay5bfarchcngglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5bfarchcngglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash182" class="admania_iconrt">
                <?php  esc_html_e ( 'Archives Before Content Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash182">
                  <label for="admania_theme_settings[admania_adimg_url43]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url43" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url43]" value="<?php echo esc_url(admania_get_option('admania_adimg_url43')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload43" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image43 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw43" src="<?php echo esc_url(admania_get_option('admania_adimg_url43')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url43]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url43]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url43')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash183" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash183">
                  <label for="admania_theme_settings[ad_rmcatGrid46]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid46]" name="admania_theme_settings[ad_rmcatGrid46]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid46')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid46]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid46]" name="admania_theme_settings[ad_rmtagGrid46]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid46')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
		 
					 
		<div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/beforelay4footer.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl44" class="admania_hdradclk admania_adsensesection6"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Before Footer Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_adstngextrastyle" id="admania_adsectionscrl44">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb6" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_lay5bfftrad]">
                  <?php  esc_html_e ( 'Enable the Before Footer Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_lay5bfftrad]" name="admania_theme_settings[hm_lay5bfftrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_lay5bfftrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash177" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash177">
                  <label for="admania_theme_settings[hm_lay5bfftrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5bfftrhtmlad]" name="admania_theme_settings[hm_lay5bfftrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5bfftrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash174" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash174">
                  <label for="admania_theme_settings[hm_lay5bfftrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_lay5bfftrgglead]" name="admania_theme_settings[hm_lay5bfftrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_lay5bfftrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash175" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash175">
                  <label for="admania_theme_settings[admania_adimg_url42]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url42" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url42]" value="<?php echo esc_url(admania_get_option('admania_adimg_url42')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload42" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image42 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw42" src="<?php echo esc_url(admania_get_option('admania_adimg_url42')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url42]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url42]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url42')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash176" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash176">
                  <label for="admania_theme_settings[ad_rmcatGrid42]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmcatGrid42]" name="admania_theme_settings[ad_rmcatGrid42]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatGrid42')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtagGrid42]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,39,39','admania'); ?>" id="admania_theme_settings[ad_rmtagGrid42]" name="admania_theme_settings[ad_rmtagGrid42]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtagGrid42')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
				</div>
				</div>
				</div>				 
			
			</div>
		</div>
	    <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> 
	</li>
	
	
    <?php /* Menu Color Settings*/ ?>
    <li data-content="admania_colorsstngs"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Theme Color Settings', 'admania' ); ?>
      </h2>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Body Color Settings', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[fontcolor]">
              <?php  esc_html_e ( 'Font Color:', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[fontcolor]" name="admania_theme_settings[fontcolor]" class="admania_color" type="text" value="<?php echo  esc_attr(admania_get_option('fontcolor')); ?>" />
            <label for="admania_theme_settings[backgroundcolor]">
              <?php  esc_html_e ( 'Body Background Color:' , 'admania'); ?>
            </label>
            <input id="admania_theme_settings[backgroundcolor]" name="admania_theme_settings[backgroundcolor]" class="admania_color" type="text" value="<?php echo esc_attr(admania_get_option('backgroundcolor')); ?>" />
          </div>
        </div>
      </div>
      <div class="admania_pannelsettings">
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Header Top Color Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[admania_hdrtpbxclr]">
                <?php  esc_html_e ( 'Header Top Boxshawdow Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_hdrtpbxclr]" class="admania_color" name="admania_theme_settings[admania_hdrtpbxclr]" value="<?php echo esc_attr(admania_get_option('admania_hdrtpbxclr')); ?>" />
              <label for="admania_theme_settings[admania_hdrtpbdrbtmclr]">
                <?php  esc_html_e ( 'Header Top BorderBottom Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_hdrtpbdrbtmclr]" class="admania_color" name="admania_theme_settings[admania_hdrtpbdrbtmclr]" value="<?php echo esc_attr(admania_get_option('admania_hdrtpbdrbtmclr')); ?>" />
              <label for="admania_theme_settings[admania_hdrtpsclclr]" >
                <?php  esc_html_e ( 'Header Top Social Follow Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_hdrtpsclclr]" class="admania_color" name="admania_theme_settings[admania_hdrtpsclclr]" value="<?php echo esc_attr(admania_get_option('admania_hdrtpsclclr')); ?>" />
            </div>
          </div>
        </div>
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Header Bottom & Widget Title Color Settings', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[admania_hdrbtmbgclr]">
              <?php  esc_html_e ( 'Header Bottom Background color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_hdrbtmbgclr]" class="admania_color" name="admania_theme_settings[admania_hdrbtmbgclr]" value="<?php echo esc_attr(admania_get_option('admania_hdrbtmbgclr')); ?>" />
            <label for="admania_theme_settings[admania_primarynavclr]">
              <?php  esc_html_e ( 'Primary Nav Text color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_primarynavclr]" class="admania_color" name="admania_theme_settings[admania_primarynavclr]" value="<?php echo esc_attr(admania_get_option('admania_primarynavclr')); ?>" />
             <label for="admania_theme_settings[admania_layt2navtxtcolor]">
              <?php  esc_html_e ( 'Header Layout2 & Layout3 Primary Nav Text color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_layt2navtxtcolor]" class="admania_color" name="admania_theme_settings[admania_layt2navtxtcolor]" value="<?php echo esc_attr(admania_get_option('admania_layt2navtxtcolor')); ?>" />
			<label for="admania_theme_settings[admania_srchtxtbgclr]">
              <?php  esc_html_e ( 'Header Search input text background color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_srchtxtbgclr]" class="admania_color" name="admania_theme_settings[admania_srchtxtbgclr]" value="<?php echo esc_attr(admania_get_option('admania_srchtxtbgclr')); ?>" />
            <label for="admania_theme_settings[admania_srchtxtclr]" >
              <?php  esc_html_e ( 'Header Search Text Color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_srchtxtclr]" class="admania_color" name="admania_theme_settings[admania_srchtxtclr]" value="<?php echo esc_attr(admania_get_option('admania_srchtxtclr')); ?>" />
            <label for="admania_theme_settings[admania_wdgttitclr]">
              <?php  esc_html_e ( 'Widget Title Text color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_wdgttitclr]" class="admania_color" name="admania_theme_settings[admania_wdgttitclr]" value="<?php echo esc_attr(admania_get_option('admania_wdgttitclr')); ?>" />
            <label for="admania_theme_settings[admania_wdgttitbgclr]">
              <?php  esc_html_e ( 'Widget Title Text Background Color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_wdgttitbgclr]" class="admania_color" name="admania_theme_settings[admania_wdgttitbgclr]" value="<?php echo esc_attr(admania_get_option('admania_wdgttitbgclr')); ?>" />
            <?php /*Primary Menu bar*/?>
          </div>
        </div>
		<div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Layout3 Header Color Settings', 'admania' ); ?>
          </h3>
            <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[admania_layt3bgcolor]">
              <?php  esc_html_e ( 'Layout3 & Layout5 Header Top Background Color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_layt3bgcolor]" class="admania_color" name="admania_theme_settings[admania_layt3bgcolor]" value="<?php echo esc_attr(admania_get_option('admania_layt3bgcolor')); ?>" />
            <label for="admania_theme_settings[admania_layt3midbgcolor]">
              <?php  esc_html_e ( 'Header Bottom Background Color', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_layt3midbgcolor]" class="admania_color" name="admania_theme_settings[admania_layt3midbgcolor]" value="<?php echo esc_attr(admania_get_option('admania_layt3midbgcolor')); ?>" />
            </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Slider Section & Category Color Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[admania_sldrhdclr]">
                <?php  esc_html_e ( 'Slider Heading & Content Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_sldrhdclr]" class="admania_color" name="admania_theme_settings[admania_sldrhdclr]" value="<?php echo esc_attr(admania_get_option('admania_sldrhdclr')); ?>" />
              <label for="admania_theme_settings[admania_catbgclr]">
                <?php  esc_html_e ( 'Category & Slider Next/prev Background Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_catbgclr]" class="admania_color" name="admania_theme_settings[admania_catbgclr]" value="<?php echo esc_attr(admania_get_option('admania_catbgclr')); ?>" />
              <label for="admania_theme_settings[admania_cattxtclr]">
                <?php  esc_html_e ( 'Category Text Color:', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_cattxtclr]" name="admania_theme_settings[admania_cattxtclr]" class="admania_color" type="text" value="<?php echo esc_attr(admania_get_option('admania_cattxtclr')); ?>" />
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Links & Headings Color Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[admania_linkclr]">
                <?php  esc_html_e ( 'Link Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_linkclr]" class="admania_color" name="admania_theme_settings[admania_linkclr]" value="<?php echo esc_attr(admania_get_option('admania_linkclr')); ?>" />
              <label for="admania_theme_settings[admania_lnkhvclr]">
                <?php  esc_html_e ( 'Link Hover color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_lnkhvclr]" class="admania_color" name="admania_theme_settings[admania_lnkhvclr]" value="<?php echo esc_attr(admania_get_option('admania_lnkhvclr')); ?>" />
              <label for="admania_theme_settings[headerfontcolor]">
                <?php  esc_html_e ( 'All Heading Color:', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[headerfontcolor]" name="admania_theme_settings[headerfontcolor]" class="admania_color" type="text" value="<?php echo esc_attr(admania_get_option('headerfontcolor')); ?>" />
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Theme Button Color Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[admania_thmebtnclr]">
                <?php  esc_html_e ( 'Theme Button Background Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmebtnclr]" class="admania_color" name="admania_theme_settings[admania_thmebtnclr]" value="<?php echo esc_attr(admania_get_option('admania_thmebtnclr')); ?>" />
              <label for="admania_theme_settings[admania_thmetxtbtnclr]">
                <?php  esc_html_e ( 'Theme Button Color Text Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmetxtbtnclr]" class="admania_color" name="admania_theme_settings[admania_thmetxtbtnclr]" value="<?php echo esc_attr(admania_get_option('admania_thmetxtbtnclr')); ?>" />
              <label for="admania_theme_settings[admania_thmebtnhvclr]">
                <?php  esc_html_e ( 'Theme Button Background Hover Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmebtnhvclr]" class="admania_color" name="admania_theme_settings[admania_thmebtnhvclr]" value="<?php echo esc_attr(admania_get_option('admania_thmebtnhvclr')); ?>" />
              <label for="admania_theme_settings[admania_thmetxtbtnhvclr]">
                <?php  esc_html_e ( 'Layout1 Theme Button Color Text Hover Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmetxtbtnhvclr]" class="admania_color" name="admania_theme_settings[admania_thmetxtbtnhvclr]" value="<?php echo esc_attr(admania_get_option('admania_thmetxtbtnhvclr')); ?>" />
              <label for="admania_theme_settings[admania_thmecntrdbgclr]">
                <?php  esc_html_e ( 'Layout1 Theme Continue Reading Background Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmecntrdbgclr]" class="admania_color" name="admania_theme_settings[admania_thmecntrdbgclr]" value="<?php echo esc_attr(admania_get_option('admania_thmecntrdbgclr')); ?>" />
              <label for="admania_theme_settings[admania_thmecntrdtxtclr]">
                <?php  esc_html_e ( 'Layout1 Theme Continue Reading Color Text Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmecntrdtxtclr]" class="admania_color" name="admania_theme_settings[admania_thmecntrdtxtclr]" value="<?php echo esc_attr(admania_get_option('admania_thmecntrdtxtclr')); ?>" />
              <label for="admania_theme_settings[admania_thmecntrdbghvclr]">
                <?php  esc_html_e ( 'Layout1 Theme Continue Reading & Slider prev/next Background Hover Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmecntrdbghvclr]" class="admania_color" name="admania_theme_settings[admania_thmecntrdbghvclr]" value="<?php echo esc_attr(admania_get_option('admania_thmecntrdbghvclr')); ?>" />
              <label for="admania_theme_settings[admania_thmecntrdtxthvclr]">
                <?php  esc_html_e ( 'Layout1 Theme Continue Reading & Slider prev/next Text Hover Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_thmecntrdtxthvclr]" class="admania_color" name="admania_theme_settings[admania_thmecntrdtxthvclr]" value="<?php echo esc_attr(admania_get_option('admania_thmecntrdtxthvclr')); ?>" />
			  <label for="admania_theme_settings[admania_layt3thmecntrdtxtclr]">
                <?php  esc_html_e ( 'Layout3 Theme Continue Reading Color Text Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_layt3thmecntrdtxtclr]" class="admania_color" name="admania_theme_settings[admania_layt3thmecntrdtxtclr]" value="<?php echo esc_attr(admania_get_option('admania_layt3thmecntrdtxtclr')); ?>" />
               <label for="admania_theme_settings[admania_layt5thmecntrdtxtclr]">
                <?php  esc_html_e ( 'Layout5 Theme Continue Reading Color Text Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_layt5thmecntrdtxtclr]" class="admania_color" name="admania_theme_settings[admania_layt5thmecntrdtxtclr]" value="<?php echo esc_attr(admania_get_option('admania_layt5thmecntrdtxtclr')); ?>" />
               <label for="admania_theme_settings[admania_layt5thmecntrdbgclr]">
                <?php  esc_html_e ( 'Layout5 Theme Continue Reading Background Color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_layt5thmecntrdbgclr]" class="admania_color" name="admania_theme_settings[admania_layt5thmecntrdbgclr]" value="<?php echo esc_attr(admania_get_option('admania_layt5thmecntrdbgclr')); ?>" />

			</div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Post Content', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem admania_optionsset">
              <div class="section_clear">
                <label for="admania_theme_settings[admania_postcontentlinkcolor]">
                  <?php  esc_html_e ( 'link color', 'admania' ); ?>
                </label>
                <input id="admania_theme_settings[admania_postcontentlinkcolor]" type="text" class="admania_color" size="70" name="admania_theme_settings[admania_postcontentlinkcolor]" value="<?php echo esc_attr(admania_get_option('admania_postcontentlinkcolor')); ?>" />
                <label for="admania_theme_settings[admania_postcontentlinkhovercolor]">
                  <?php  esc_html_e ( 'Link Hover color', 'admania' ); ?>
                </label>
                <input id="admania_theme_settings[admania_postcontentlinkhovercolor]" type="text" class="admania_color" size="70" name="admania_theme_settings[admania_postcontentlinkhovercolor]" value="<?php echo esc_attr(admania_get_option('admania_postcontentlinkhovercolor')); ?>" />
                <label for="admania_theme_settings[admania_postcontentlinkcolor]">
                  <?php  esc_html_e ( 'Link Type' , 'admania'); ?>
                </label>
                <select name="admania_theme_settings[admania_linktype]">
                  <option value="">
                  <?php  esc_html_e ( 'Select the Link Type', 'admania' ); ?>
                  </option>
                  <?php 				 
				foreach ($admania_linktype as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_linktype') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                  <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : 'none'); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Post Optin Color Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[admania_postoptintopbgcolor]">
                <?php  esc_html_e ( 'Post Optin Background color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_postoptintopbgcolor]" class="admania_color" type="text" size="70" name="admania_theme_settings[admania_postoptintopbgcolor]" value="<?php echo esc_attr(admania_get_option('admania_postoptintopbgcolor')); ?>" />
              <label for="admania_theme_settings[admania_postoptintopbgbdrcolor]">
                <?php  esc_html_e ( 'Post Optin Border color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_postoptintopbgbdrcolor]" class="admania_color" type="text" size="70" name="admania_theme_settings[admania_postoptintopbgbdrcolor]" value="<?php echo esc_attr(admania_get_option('admania_postoptintopbgbdrcolor')); ?>" />
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Comment Section Color Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[admania_pstcmtbgclr]">
                <?php  esc_html_e ( 'Comment Section Background color', 'admania' ); ?>
              </label>
              <input id="admania_theme_settings[admania_pstcmtbgclr]" class="admania_color" type="text" size="70" name="admania_theme_settings[admania_pstcmtbgclr]" value="<?php echo esc_attr(admania_get_option('admania_pstcmtbgclr')); ?>" />
            </div>
          </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php /*Top nav Secondary Menu bar*/?>
    <li data-content="admania_slider"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Home Page Slider Section Settings', 'admania' ); ?>
      </h2>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <div class="admania_optionsinneritem">
            <div id="admania_hidefistlay2" class="admania_hdfstlayoptions">
			  <div class="admania_hdfstclr">
                <h3>
                   <?php  esc_html_e ('Home Page1 Slider Section Settings','admania'); ?>
                </h3>
				<span class="dashicons dashicons-plus admania_dshbrdicn1"></span>
			  </div>
              <div id="admania_hideftdpostsec2" class="admania_sldlay1option">
                <div class="admania_layoutsetopt admania_laydefaultck">
                  <h4>
                    <?php  esc_html_e ('Home Page1 Slider Section Settings','admania'); ?>
                  </h4>
                  <div class="admania_optionsinneritem admania_hdopnsdsgitem">
                    <div class="admania_sectiongap admania_removespace">
                      <label for="admania_theme_settings[hm_slideractive]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admania' ); ?>
                      </label>
                      <div class="admania_switch admania_switchstyle">
                        <input id="admania_theme_settings[hm_slideractive]" name="admania_theme_settings[hm_slideractive]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_slideractive'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admania_sliderspecl"> <span class="admania_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
                      </h3>
                      </span>
                      <div class="admania_sliderspeclinnr">
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgs]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                            </label>
                            <select id="admania_theme_settings[hm_sliderctgs]" name="admania_theme_settings[hm_sliderctgs]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admania'); ?>
                              </option>
                              <?php 
			
				foreach ($admania_cattypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderctgs') == $admania_option->slug ) ?  'selected="selected"' : ''); 
					?>
                              <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option->slug ) ? $admania_option->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderpstids]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderpstids]" name="admania_theme_settings[hm_sliderpstids]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderpstids')); ?></textarea>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgrsid]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderctgrsid]" name="admania_theme_settings[hm_sliderctgrsid]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderctgrsid')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admania_theme_settings[hm_sliderpostperpage]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admania'); ?>
                      </label>
                      <input  size="8" id="admania_theme_settings[hm_sliderpostperpage]" name="admania_theme_settings[hm_sliderpostperpage]" type="text" value="<?php echo esc_attr(admania_get_option('hm_sliderpostperpage')); ?>" />
                      <div class="random_content">
                        <label for="admania_theme_settings[hm_sliderrandorlatst]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
                        </label>
                        <select id="admania_theme_settings[hm_sliderrandorlatst]" name="admania_theme_settings[hm_sliderrandorlatst]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admania'); ?>
                          </option>
                          <?php 
				foreach ($admania_bl2pststypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderrandorlatst') == $admania_option ) ?  'selected="selected"' : ''); 
					?>
                          <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option) ? $admania_option : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div id="admania_hidefistlay2" class="admania_hdfstlayoptions">
			  <div class="admania_hdfstclr">
                <h3>
                   <?php  esc_html_e ('Home Page2 Slider Section Settings','admania'); ?>
                </h3>
				<span class="dashicons dashicons-plus admania_dshbrdicn2"></span>
			  </div>
              <div id="admania_hideftdpostsec2" class="admania_sldlay2option">
                <div class="admania_layoutsetopt admania_laydefaultck">
                  <h4>
                    <?php  esc_html_e ('Home Page2 Slider Section Settings','admania'); ?>
                  </h4>
                  <div class="admania_optionsinneritem admania_hdopnsdsgitem">
                    <div class="admania_sectiongap admania_removespace">
                      <label for="admania_theme_settings[hm_slideractive1]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admania' ); ?>
                      </label>
                      <div class="admania_switch admania_switchstyle">
                        <input id="admania_theme_settings[hm_slideractive1]" name="admania_theme_settings[hm_slideractive1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_slideractive1'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admania_sliderspecl"> <span class="admania_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
                      </h3>
                      </span>
                      <div class="admania_sliderspeclinnr">
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgs1]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                            </label>
                            <select id="admania_theme_settings[hm_sliderctgs1]" name="admania_theme_settings[hm_sliderctgs1]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admania'); ?>
                              </option>
                              <?php 
			
				foreach ($admania_cattypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderctgs1') == $admania_option->slug ) ?  'selected="selected"' : ''); 
					?>
                              <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option->slug ) ? $admania_option->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderpstids1]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderpstids1]" name="admania_theme_settings[hm_sliderpstids1]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderpstids1')); ?></textarea>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgrsid1]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderctgrsid1]" name="admania_theme_settings[hm_sliderctgrsid1]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderctgrsid1')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admania_theme_settings[hm_sliderpostperpage1]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admania'); ?>
                      </label>
                      <input  size="8" id="admania_theme_settings[hm_sliderpostperpage1]" name="admania_theme_settings[hm_sliderpostperpage1]" type="text" value="<?php echo esc_attr(admania_get_option('hm_sliderpostperpage1')); ?>" />
                      <div class="random_content">
                        <label for="admania_theme_settings[hm_sliderrandorlatst1]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
                        </label>
                        <select id="admania_theme_settings[hm_sliderrandorlatst1]" name="admania_theme_settings[hm_sliderrandorlatst1]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admania'); ?>
                          </option>
                          <?php 
				foreach ($admania_bl2pststypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderrandorlatst1') == $admania_option ) ?  'selected="selected"' : ''); 
					?>
                          <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option) ? $admania_option : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div id="admania_hidefistlay2" class="admania_hdfstlayoptions">
			  <div class="admania_hdfstclr">
                <h3>
                   <?php  esc_html_e ('Home Page3 Slider Section Settings','admania'); ?>
                </h3>
				<span class="dashicons dashicons-plus admania_dshbrdicn3"></span>
			  </div>
              <div id="admania_hideftdpostsec2" class="admania_sldlay3option">
                <div class="admania_layoutsetopt admania_laydefaultck">
                  <h4>
                    <?php  esc_html_e ('Home Page3 Slider Section Settings','admania'); ?>
                  </h4>
                  <div class="admania_optionsinneritem admania_hdopnsdsgitem">
                    <div class="admania_sectiongap admania_removespace">
                      <label for="admania_theme_settings[hm_slideractive2]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admania' ); ?>
                      </label>
                      <div class="admania_switch admania_switchstyle">
                        <input id="admania_theme_settings[hm_slideractive2]" name="admania_theme_settings[hm_slideractive2]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_slideractive2'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admania_sliderspecl"> <span class="admania_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
                      </h3>
                      </span>
                      <div class="admania_sliderspeclinnr">
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgs2]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                            </label>
                            <select id="admania_theme_settings[hm_sliderctgs2]" name="admania_theme_settings[hm_sliderctgs2]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admania'); ?>
                              </option>
                              <?php 
			
				foreach ($admania_cattypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderctgs2') == $admania_option->slug ) ?  'selected="selected"' : ''); 
					?>
                              <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option->slug ) ? $admania_option->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderpstids2]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderpstids2]" name="admania_theme_settings[hm_sliderpstids2]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderpstids2')); ?></textarea>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgrsid2]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderctgrsid2]" name="admania_theme_settings[hm_sliderctgrsid2]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderctgrsid2')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admania_theme_settings[hm_sliderpostperpage2]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admania'); ?>
                      </label>
                      <input  size="8" id="admania_theme_settings[hm_sliderpostperpage2]" name="admania_theme_settings[hm_sliderpostperpage2]" type="text" value="<?php echo esc_attr(admania_get_option('hm_sliderpostperpage2')); ?>" />
                      <div class="random_content">
                        <label for="admania_theme_settings[hm_sliderrandorlatst2]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
                        </label>
                        <select id="admania_theme_settings[hm_sliderrandorlatst2]" name="admania_theme_settings[hm_sliderrandorlatst2]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admania'); ?>
                          </option>
                          <?php 
				foreach ($admania_bl2pststypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderrandorlatst2') == $admania_option ) ?  'selected="selected"' : ''); 
					?>
                          <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option) ? $admania_option : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="admania_hidefistlay2" class="admania_hdfstlayoptions">
			  <div class="admania_hdfstclr">
                <h3>
                   <?php  esc_html_e ('Home Page4 Slider Section Settings','admania'); ?>
                </h3>
				<span class="dashicons dashicons-plus admania_dshbrdicn4"></span>
			  </div>
              <div id="admania_hideftdpostsec2" class="admania_sldlay4option">
                <div class="admania_layoutsetopt admania_laydefaultck">
                  <h4>
                    <?php  esc_html_e ('Home Page4 Slider Section Settings','admania'); ?>
                  </h4>
                  <div class="admania_optionsinneritem admania_hdopnsdsgitem">
                    <div class="admania_sectiongap admania_removespace">
                      <label for="admania_theme_settings[hm_slideractive4]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admania' ); ?>
                      </label>
                      <div class="admania_switch admania_switchstyle">
                        <input id="admania_theme_settings[hm_slideractive4]" name="admania_theme_settings[hm_slideractive4]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_slideractive4'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admania_sliderspecl"> <span class="admania_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
                      </h3>
                      </span>
                      <div class="admania_sliderspeclinnr">
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgs4]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                            </label>
                            <select id="admania_theme_settings[hm_sliderctgs4]" name="admania_theme_settings[hm_sliderctgs4]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admania'); ?>
                              </option>
                              <?php 
			
				foreach ($admania_cattypes as $admania_option){
					$admania_selected = ((admania_get_option('hm_sliderctgs4') == $admania_option->slug ) ?  'selected="selected"' : ''); 
					?>
                              <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option->slug ) ? $admania_option->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderpstids4]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderpstids4]" name="admania_theme_settings[hm_sliderpstids4]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderpstids4')); ?></textarea>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgrsid4]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderctgrsid4]" name="admania_theme_settings[hm_sliderctgrsid4]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderctgrsid4')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admania_theme_settings[hm_sliderpostperpage4]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admania'); ?>
                      </label>
                      <input  size="8" id="admania_theme_settings[hm_sliderpostperpage4]" name="admania_theme_settings[hm_sliderpostperpage4]" type="text" value="<?php echo esc_attr(admania_get_option('hm_sliderpostperpage4')); ?>" />
                      <div class="random_content">
                        <label for="admania_theme_settings[hm_sliderrandorlatst4]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
                        </label>
                        <select id="admania_theme_settings[hm_sliderrandorlatst4]" name="admania_theme_settings[hm_sliderrandorlatst4]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admania'); ?>
                          </option>
                          <?php 
				          foreach ($admania_bl2pststypes as $admania_option){
					      $admania_selected = ((admania_get_option('hm_sliderrandorlatst4') == $admania_option ) ?  'selected="selected"' : ''); 
					      ?>
                          <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option) ? $admania_option : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<div id="admania_hidefistlay2" class="admania_hdfstlayoptions">
			  <div class="admania_hdfstclr">
                <h3>
                   <?php  esc_html_e ('Home Page5 Slider Section Settings','admania'); ?>
                </h3>
				<span class="dashicons dashicons-plus admania_dshbrdicn5"></span>
			  </div>
              <div id="admania_hideftdpostsec2" class="admania_sldlay5option">
                <div class="admania_layoutsetopt admania_laydefaultck">
                  <h4>
                    <?php  esc_html_e ('Home Page5 Slider Section Settings','admania'); ?>
                  </h4>
                  <div class="admania_optionsinneritem admania_hdopnsdsgitem">
                    <div class="admania_sectiongap admania_removespace">
                      <label for="admania_theme_settings[hm_slideractive5]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admania' ); ?>
                      </label>
                      <div class="admania_switch admania_switchstyle">
                        <input id="admania_theme_settings[hm_slideractive5]" name="admania_theme_settings[hm_slideractive5]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_slideractive5'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admania_sliderspecl"> <span class="admania_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
                      </h3>
                      </span>
                      <div class="admania_sliderspeclinnr">
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgs5]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                            </label>
                            <select id="admania_theme_settings[hm_sliderctgs5]" name="admania_theme_settings[hm_sliderctgs5]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admania'); ?>
                              </option>
                              <?php 			
								foreach ($admania_cattypes as $admania_optionlist){
								$admania_selected = ((admania_get_option('hm_sliderctgs5') == $admania_optionlist->slug ) ?  'selected="selected"' : ''); 
							  ?>
                              <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_optionlist->slug ) ? $admania_optionlist->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderpstids5]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderpstids5]" name="admania_theme_settings[hm_sliderpstids5]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderpstids5')); ?></textarea>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgrsid5]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderctgrsid4]" name="admania_theme_settings[hm_sliderctgrsid4]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderctgrsid4')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admania_theme_settings[hm_sliderctgrsid5]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admania'); ?>
                      </label>
                      <input  size="8" id="admania_theme_settings[hm_sliderctgrsid5]" name="admania_theme_settings[hm_sliderctgrsid5]" type="text" value="<?php echo esc_attr(admania_get_option('hm_sliderctgrsid5')); ?>" />
                      <div class="random_content">
                        <label for="admania_theme_settings[hm_sliderrandorlatst5]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
                        </label>
                        <select id="admania_theme_settings[hm_sliderrandorlatst5]" name="admania_theme_settings[hm_sliderrandorlatst5]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admania'); ?>
                          </option>
                          <?php 
				          foreach ($admania_bl2pststypes as $admania_optionlist){
					      $admania_selected = ((admania_get_option('hm_sliderrandorlatst5') == $admania_optionlist ) ?  'selected="selected"' : ''); 
					      ?>
                          <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_optionlist) ? $admania_optionlist : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
			<?php if (class_exists( 'Woocommerce' )): ?>
			
			<div id="admania_hidefistlay2" class="admania_hdfstlayoptions">
			  <div class="admania_hdfstclr">
                <h3>
                   <?php  esc_html_e ('Shop Page Slider Section Settings','admania'); ?>
                </h3>
				<span class="dashicons dashicons-plus admania_dshbrdicn6"></span>
			  </div>
              <div id="admania_hideftdpostsec2" class="admania_sldlay6option">
                <div class="admania_layoutsetopt admania_laydefaultck">
                  <h4>
                    <?php  esc_html_e ('Shop Page Slider Section Settings','admania'); ?>
                  </h4>
                  <div class="admania_optionsinneritem admania_hdopnsdsgitem">
                    <div class="admania_sectiongap admania_removespace">
                      <label for="admania_theme_settings[hm_slideractive6]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admania' ); ?>
                      </label>
                      <div class="admania_switch admania_switchstyle">
                        <input id="admania_theme_settings[hm_slideractive6]" name="admania_theme_settings[hm_slideractive6]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_slideractive6'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admania_sliderspecl"> <span class="admania_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
                      </h3>
                      </span>
                      <div class="admania_sliderspeclinnr">
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgs6]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                            </label>
                            <select id="admania_theme_settings[hm_sliderctgs6]" name="admania_theme_settings[hm_sliderctgs6]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admania'); ?>
                              </option>
                              <?php                              							  
								foreach ( $admania_product_cattypes  as $admania_productoptionlist){
								$admania_pdtselected = ((admania_get_option('hm_sliderctgs6') == $admania_productoptionlist->slug ) ?  'selected="selected"' : ''); 
							  ?>
                              <option <?php echo esc_attr($admania_pdtselected); ?>><?php echo esc_html(!empty($admania_productoptionlist->slug ) ? $admania_productoptionlist->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderpstids6]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderpstids6]" name="admania_theme_settings[hm_sliderpstids6]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderpstids6')); ?></textarea>
                          </div>
                        </div>
                        <div class="admania_optionsinneritem admania_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
                          </h4>
                          <div class="admania_mthssldinner">
                            <label for="admania_theme_settings[hm_sliderctgrsid6]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[hm_sliderctgrsid6]" name="admania_theme_settings[hm_sliderctgrsid6]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('hm_sliderctgrsid6')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admania_theme_settings[hm_sliderpostperpage6]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admania'); ?>
                      </label>
                      <input  size="8" id="admania_theme_settings[hm_sliderpostperpage6]" name="admania_theme_settings[hm_sliderpostperpage6]" type="text" value="<?php echo esc_attr(admania_get_option('hm_sliderpostperpage6')); ?>" />
                      <div class="random_content">
                        <label for="admania_theme_settings[hm_sliderrandorlatst6]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
                        </label>
                        <select id="admania_theme_settings[hm_sliderrandorlatst6]" name="admania_theme_settings[hm_sliderrandorlatst6]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admania'); ?>
                          </option>
                          <?php 
				          foreach ($admania_bl2pststypes as $admania_optionlist){
					      $admania_selected = ((admania_get_option('hm_sliderrandorlatst6') == $admania_optionlist ) ?  'selected="selected"' : ''); 
					      ?>
                          <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_optionlist) ? $admania_optionlist : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>		 
		 
		    <?php endif; ?>
			
		 </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php /*** Layout Settings*/ ?>
    <li data-content="admania_layoutfeaturedsettings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Home Pages Featured Section Settings', 'admania' ); ?>
      </h2>	  
	  <div class="admania_optionsetngitem admania_ftditemoptions">
	  <div class="admania_optionsinneritem">
	  <div class="admania_lay1ftd_options">
		<div class="admania_hdfstclr">
            <h3>
                <?php  esc_html_e ('Home Page1 Featured Section Settings','admania'); ?>
            </h3>
			<span class="dashicons dashicons-plus admania_slfticn1"></span>
		</div>
      <div class="admania_optionsetngitem admania_vmlsplclas500 admania_lay1ftstngs_options">
        <h3>
          <?php  esc_html_e ( 'After Slider Featured Selection ', 'admania' ); ?>
        </h3>
        <div class="admania_optionsinneritem">
          <div class="admania_sliderspecl">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_featuredactv]">
                <?php  esc_html_e ( 'Enable After Slider Featured Section', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_featuredactv]" name="admania_theme_settings[admania_featuredactv]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_featuredactv'))); ?> />
                <label><i></i></label>
              </div>
            </div>
          </div>
          <span class="admania_detailsect">
          <h3>
            <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
          </h3>
          </span>
          <div class="admania_sliderspeclinnr admania_vmlsplclasfst">
            <div class="admania_optionsinneritem admania_sldrmthd">
              <h4>
                <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
              </h4>
              <div class="admania_mthssldinner">
                <label for="admania_theme_settings[admania_ftdcatgrs]">
                  <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                </label>
                <select id="admania_theme_settings[admania_ftdcatgrs]" name="admania_theme_settings[admania_ftdcatgrs]">
                  <option value="">
                  <?php  esc_html_e ('select the categories','admania'); ?>
                  </option>
                  <?php 
			 
				foreach ($admania_cattypes as $admania_option){
					$admania_selected = ((admania_get_option('admania_ftdcatgrs') == $admania_option->slug ) ?  'selected="selected"' : ''); 
					?>
                  <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option->slug ) ? $admania_option->slug : ''); ?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="admania_optionsinneritem admania_sldrmthd">
              <h4>
                <?php  esc_html_e ('Method2 to display the post using Multiple post ids','admania'); ?>
              </h4>
              <div class="admania_mthssldinner">
                <label for="admania_theme_settings[admania_ftdpstid]">
                  <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                </label>
                <textarea placeholder="<?php esc_html_e('Enter the post id like this 32,33,33,','admania'); ?>" id="admania_theme_settings[admania_ftdpstid]" name="admania_theme_settings[admania_ftdpstid]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('admania_ftdpstid')); ?></textarea>
              </div>
            </div>
            <div class="admania_optionsinneritem admania_sldrmthd">
              <h4>
                <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
              </h4>
              <div class="admania_mthssldinner">
                <label for="admania_theme_settings[admania_ftdcatid]">
                  <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                </label>
                <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[admania_ftdcatid]" name="admania_theme_settings[admania_ftdcatid]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('admania_ftdcatid')); ?></textarea>
              </div>
            </div>
            <div class="random_content">
              <label for="admania_theme_settings[admania_randorlatst1]">
                <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
              </label>
              <select id="admania_theme_settings[admania_randorlatst1]" name="admania_theme_settings[admania_randorlatst1]">
                <option value="">
                <?php  esc_html_e ('Select', 'admania'); ?>
                </option>
                <?php 
				foreach ($admania_bl2pststypes as $admania_option){
					$admania_selected = ((admania_get_option('admania_randorlatst1') == $admania_option ) ?  'selected="selected"' : ''); 
					?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
	  </div>
	  <div class="admania_lay1ftd_options">
		<div class="admania_hdfstclr">
            <h3>
                <?php  esc_html_e ('Home Page2 Featured Section Settings','admania'); ?>
            </h3>
			<span class="dashicons dashicons-plus admania_slfticn2"></span>
		</div>
      <div class="admania_optionsetngitem admania_vmlsplclas500 admania_lay2ftstngs_options">
        <h3>
          <?php  esc_html_e ( 'Right Side Slider Featured Selection ', 'admania' ); ?>
        </h3>
        <div class="admania_optionsinneritem">
          <div class="admania_sliderspecl">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_featuredactv1]">
                <?php  esc_html_e ( 'Enable Right Side Slider Featured Section', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_featuredactv1]" name="admania_theme_settings[admania_featuredactv1]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_featuredactv1'))); ?> />
                <label><i></i></label>
              </div>
            </div>
          </div>
          <span class="admania_detailsect">
          <h3>
            <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admania'); ?>
          </h3>
          </span>
          <div class="admania_sliderspeclinnr admania_vmlsplclasfst">
            <div class="admania_optionsinneritem admania_sldrmthd">
              <h4>
                <?php  esc_html_e ('Method1 to display the post using Category name','admania'); ?>
              </h4>
              <div class="admania_mthssldinner">
                <label for="admania_theme_settings[admania_ftdcatgrs1]">
                  <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admania'); ?>
                </label>
                <select id="admania_theme_settings[admania_ftdcatgrs1]" name="admania_theme_settings[admania_ftdcatgrs1]">
                  <option value="">
                  <?php  esc_html_e ('select the categories','admania'); ?>
                  </option>
                  <?php 
			 
				foreach ($admania_cattypes as $admania_option){
					$admania_selected = ((admania_get_option('admania_ftdcatgrs1') == $admania_option->slug ) ?  'selected="selected"' : ''); 
					?>
                  <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option->slug ) ? $admania_option->slug : ''); ?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="admania_optionsinneritem admania_sldrmthd">
              <h4>
                <?php  esc_html_e ('Method2 to display the post using Multiple post ids','admania'); ?>
              </h4>
              <div class="admania_mthssldinner">
                <label for="admania_theme_settings[admania_ftdpstid1]">
                  <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admania' ); ?>
                </label>
                <textarea placeholder="<?php esc_html_e('Enter the post id like this 32,33,33,','admania'); ?>" id="admania_theme_settings[admania_ftdpstid1]" name="admania_theme_settings[admania_ftdpstid1]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('admania_ftdpstid1')); ?></textarea>
              </div>
            </div>
            <div class="admania_optionsinneritem admania_sldrmthd">
              <h4>
                <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admania'); ?>
              </h4>
              <div class="admania_mthssldinner">
                <label for="admania_theme_settings[admania_ftdcatid1]">
                  <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admania' ); ?>
                </label>
                <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[admania_ftdcatid1]" name="admania_theme_settings[admania_ftdcatid1]" rows="2" cols="100"><?php echo esc_textarea(admania_get_option('admania_ftdcatid1')); ?></textarea>
              </div>
            </div>
            <div class="random_content">
              <label for="admania_theme_settings[admania_randorlatst2]">
                <?php  esc_html_e ('Choose the random (or) latest to display post', 'admania'); ?>
              </label>
              <select id="admania_theme_settings[admania_randorlatst2]" name="admania_theme_settings[admania_randorlatst2]">
                <option value="">
                <?php  esc_html_e ('Select', 'admania'); ?>
                </option>
                <?php 
				foreach ($admania_bl2pststypes as $admania_option){
					$admania_selected = ((admania_get_option('admania_randorlatst2') == $admania_option ) ?  'selected="selected"' : ''); 
					?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo (!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php /*** Post and Page Settings*/ ?>
    <li data-content="admania_Fontsettings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Font Settings', 'admania' ); ?>
      </h2>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Font Family, Size, Line Height,colors and Heading Styles', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <label for="admania_theme_settings[admania_bodygooglefont]">
              <?php  esc_html_e ( 'Body Font Family:', 'admania' ); ?>
            </label>
            <select name="admania_theme_settings[admania_bodygooglefont]">
              <option value="">
              <?php esc_html_e('Select the Font','admania'); ?>
              </option>
              <?php 
			  foreach ($admania_fontfamily as $admania_option) { 
			  $admania_selected = ((admania_get_option('admania_bodygooglefont') == $admania_option ) ?  'selected="selected"' : ''); 
           ?>
              <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
              <?php } ?>
            </select>
			<label for="admania_theme_settings[admania_googlefont]">
              <?php  esc_html_e ( 'All Heading Font Family:', 'admania' ); ?>
            </label>
            <select name="admania_theme_settings[admania_googlefont]">
              <option value="">
              <?php esc_html_e('Select the Font','admania'); ?>
              </option>
              <?php 
			  foreach ($admania_fontfamily as $admania_hdoption) { 
			  $admania_hdselected = ((admania_get_option('admania_googlefont') == $admania_hdoption ) ?  'selected="selected"' : ''); 
           ?>
              <option <?php echo esc_attr($admania_hdselected); ?>><?php echo esc_html(!empty($admania_hdoption) ? $admania_hdoption : ''); ?></option>
              <?php } ?>
            </select>
             <label for="admania_theme_settings[admania_hdonetrfrm]">
                <?php  esc_html_e ( 'All The Heading Text Transform:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_hdonetrfrm]">
                <option value="">
                <?php  esc_html_e ( 'Select the Heading Text Transform', 'admania' ); ?>
                </option>
                <?php foreach ($admania_texttransform	 as $admania_txttrnfrmoption) { 
				$admania_txtselected = ((admania_get_option('admania_hdonetrfrm') == $admania_txttrnfrmoption ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_txtselected); ?>><?php echo esc_html(!empty($admania_txttrnfrmoption) ? $admania_txttrnfrmoption : ''); ?></option>
                <?php } ?>
              </select>				  
			
            <label for="admania_theme_settings[fontsize]">
              <?php  esc_html_e ( 'Font Size:', 'admania' ); ?>
            </label>
            <select name="admania_theme_settings[fontsize]">
              <option value="">
              <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
              </option>
              <?php 
			  foreach ($admania_fontsize as $admania_option) { 
			  $admania_selected = (($admania_options['fontsize'] == $admania_option ) ?  'selected="selected"' : ''); 
				?>
              <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
              <?php } ?>
            </select>
            <label for="admania_theme_settings[lineheight]">
              <?php  esc_html_e ( 'Line Height:', 'admania' ); ?>
            </label>
            <select name="admania_theme_settings[lineheight]">
              <option value="">
              <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
              </option>
              <?php 
			  
			  foreach ($admania_lineheight as $admania_option) { 
			  $admania_selected = (($admania_options['lineheight'] == $admania_option ) ?  'selected="selected"' : ''); 
			  ?>
              <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Heading H1 Fontsize,lineheight Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[headeroneadmania_fontsize]">
                <?php  esc_html_e ( 'Heading H1 Font Size:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[headeroneadmania_fontsize]">
                <option value="">
                <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headeronefontsize as $admania_option) { 
				$admania_selected = ((admania_get_option('headeroneadmania_fontsize') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
              <label for="admania_theme_settings[admania_headeronelineheight]">
                <?php  esc_html_e ( 'Heading H1 Line Height:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_headeronelineheight]">
                <option value="">
                <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headeronelineheight as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_headeronelineheight') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
             
		  
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Heading H2 Fontsize,lineheight Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[headertwoadmania_fontsize]">
                <?php  esc_html_e ( 'Heading H2 Font Size:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[headertwoadmania_fontsize]">
                <option value="">
                <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headertwofontsize as $admania_option) { 
				$admania_selected = ((admania_get_option('headertwoadmania_fontsize') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
              <label for="admania_theme_settings[admania_headertwolineheight]">
                <?php  esc_html_e ( 'Heading H2 Line Height:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_headertwolineheight]">
                <option value="">
                <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headertwolineheight as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_headertwolineheight') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Heading H3 Fontsize,lineheight Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[headerthreeadmania_fontsize]">
                <?php  esc_html_e ( 'Heading H3 Font Size:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[headerthreeadmania_fontsize]">
                <option value="">
                <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headerthreefontsize as $admania_option) { 
				$admania_selected = ((admania_get_option('headerthreeadmania_fontsize') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
              <label for="admania_theme_settings[admania_headerthreelineheight]">
                <?php  esc_html_e ( 'Heading H3 Line Height:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_headerthreelineheight]">
                <option value="">
                <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headerthreelineheight as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_headerthreelineheight') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Heading H4 Fontsize,lineheight Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[headerfouradmania_fontsize]">
                <?php  esc_html_e ( 'Heading H4 Font Size:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[headerfouradmania_fontsize]">
                <option value="">
                <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headerfourfontsize as $admania_option) { 
				$admania_selected = ((admania_get_option('headerfouradmania_fontsize') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
              <label for="admania_theme_settings[admania_headerfourlineheight]">
                <?php  esc_html_e ( 'Heading H4 Line Height:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_headerfourlineheight]">
                <option value="">
                <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headerfourlineheight as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_headerfourlineheight') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Heading H5 Fontsize,lineheight Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[headerfiveadmania_fontsize]">
                <?php  esc_html_e ( 'Heading H5 Font Size:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[headerfiveadmania_fontsize]">
                <option value="">
                <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headerfiveafontsize as $admania_option) {
				$admania_selected = ((admania_get_option('headerfiveadmania_fontsize') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
              <label for="admania_theme_settings[admania_headerfivelineheight]">
                <?php  esc_html_e ( 'Heading H5 Line Height:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_headerfivelineheight]">
                <option value="">
                <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headerfivelineheight as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_headerfivelineheight') == $admania_option ) ?  'selected="selected"' : '');
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="admania_pannelsettings">
          <div class="admania_optionsetngitem">
            <h3>
              <?php  esc_html_e ( 'Heading H6 Fontsize,lineheight Settings', 'admania' ); ?>
            </h3>
            <div class="admania_optionsinneritem">
              <label for="admania_theme_settings[headersixadmania_fontsize]">
                <?php  esc_html_e ( 'Heading H6 Font Size:' , 'admania'); ?>
              </label>
              <select name="admania_theme_settings[headersixadmania_fontsize]">
                <option value="">
                <?php  esc_html_e ( 'Select the Font Size', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headersixfontsize as $admania_option) { 
				$admania_selected = ((admania_get_option('headersixadmania_fontsize') == $admania_option ) ?  'selected="selected"' : '');
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
              <label for="admania_theme_settings[admania_headersixlineheight]">
                <?php  esc_html_e ( 'Heading H6 Line Height:', 'admania' ); ?>
              </label>
              <select name="admania_theme_settings[admania_headersixlineheight]">
                <option value="">
                <?php  esc_html_e ( 'Select the Line Height', 'admania' ); ?>
                </option>
                <?php foreach ($admania_headersixlineheight as $admania_option) { 
				$admania_selected = ((admania_get_option('admania_headersixlineheight') == $admania_option ) ?  'selected="selected"' : ''); 
				?>
                <option <?php echo esc_attr($admania_selected); ?>><?php echo esc_html(!empty($admania_option) ? $admania_option : ''); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php /*Font Family, Size, Line Height,colors and Heading Styles*/?>
    <li data-content="admania_postandpages"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Post and Page Settings', 'admania' ); ?>
      </h2>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'By Line And Featured Image for Post', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_optionsset">
		    <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_dsftdimg]">
                <?php  esc_html_e ( 'Disable Featured Image', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_dsftdimg]" name="admania_theme_settings[admania_dsftdimg]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_dsftdimg'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_ebylfp]">
                <?php  esc_html_e ( 'Disable By Line', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_ebylfp]" name="admania_theme_settings[admania_ebylfp]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_ebylfp'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_ppostedby]">
                <?php  esc_html_e ( 'Disable Posted by', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_ppostedby]" name="admania_theme_settings[admania_ppostedby]" type="checkbox" value="1" <?php checked( '1', ( admania_get_option('admania_ppostedby'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_ppostedon]">
                <?php  esc_html_e ( 'Disable Posted On' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_ppostedon]" name="admania_theme_settings[admania_ppostedon]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_ppostedon'))); ?> />
                <label><i></i></label>
              </div>
            </div>
			<div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_ppostedtime]">
                <?php  esc_html_e ( 'Disable Posted Time' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_ppostedtime]" name="admania_theme_settings[admania_ppostedtime]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_ppostedtime'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_pcategory]">
                <?php  esc_html_e ( 'Disable Category' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_pcategory]" name="admania_theme_settings[admania_pcategory]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_pcategory'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_dsebyvw]">
                <?php  esc_html_e ( 'Disable Views Count', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_dsebyvw]" name="admania_theme_settings[admania_dsebyvw]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_dsebyvw'))); ?> />
                <label><i></i></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'By Line for Page', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_optionsset">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_ebylfpage]">
                <?php  esc_html_e ( 'Show By Line' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_ebylfpage]" name="admania_theme_settings[admania_ebylfpage]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_ebylfpage'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[padmania_ppostedby]">
                <?php  esc_html_e ( 'Show Posted by', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[padmania_ppostedby]" name="admania_theme_settings[padmania_ppostedby]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('padmania_ppostedby'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[padmania_ppostedon]">
                <?php  esc_html_e ( 'Show Posted On' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[padmania_ppostedon]" name="admania_theme_settings[padmania_ppostedon]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('padmania_ppostedon')) ); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[padmania_ppview]">
                <?php  esc_html_e ( 'Show Views Count' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[padmania_ppview]" name="admania_theme_settings[padmania_ppview]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('padmania_ppview')) ); ?> />
                <label><i></i></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Admania Breadcrumbs', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_optionsset">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_breadcrumb_post]">
                <?php  esc_html_e ( 'Show Breadcrumbs On Posts', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_breadcrumb_post]" name="admania_theme_settings[admania_breadcrumb_post]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_breadcrumb_post'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_breadcrumb_pages]">
                <?php  esc_html_e ( 'Show Breadcrumbs On Pages' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_breadcrumb_pages]" name="admania_theme_settings[admania_breadcrumb_pages]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_breadcrumb_pages') ) ); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_breadcrumb_archives]">
                <?php  esc_html_e ( 'Show Breadcrumbs On Archives' , 'admania'); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_breadcrumb_archives]" name="admania_theme_settings[admania_breadcrumb_archives]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_breadcrumb_archives')) ); ?> />
                <label><i></i></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php /*Byline ,post and page settings*/?>
      <div class="admania_pannelsettings">
        <?php /*Post social share*/?>
        <div class="admania_optionsetngitem">
          <h3 class="admania_settingheading">
            <?php  esc_html_e ( 'Post Socialshare' , 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_active_postsocialshare]">
                <?php  esc_html_e ( 'Disable Post Social share' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_active_postsocialshare]" name="admania_theme_settings[admania_active_postsocialshare]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_active_postsocialshare'))); ?>  />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialfb]">
                <?php  esc_html_e ( 'Disable Facebook:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialfb]" name="admania_theme_settings[admania_postsocialfb]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialfb'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace admania_removespace">
              <label for="admania_theme_settings[admania_postsocialtwitter]">
                <?php  esc_html_e ( 'Disable Twitter:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialtwitter]" name="admania_theme_settings[admania_postsocialtwitter]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialtwitter'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialgplus]">
                <?php  esc_html_e ( 'Disable Gplus :' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialgplus]" name="admania_theme_settings[admania_postsocialgplus]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialgplus'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsociallinkedin]">
                <?php  esc_html_e ( 'Disable Linkedin:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsociallinkedin]" name="admania_theme_settings[admania_postsociallinkedin]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsociallinkedin'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialpinterest]">
                <?php  esc_html_e ( 'Disable Pinterest:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialpinterest]" name="admania_theme_settings[admania_postsocialpinterest]" type="checkbox" value="1" <?php checked( '1', ( admania_get_option('admania_postsocialpinterest'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialbuffer]">
                <?php  esc_html_e ( 'Enable Buffer:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialbuffer]" name="admania_theme_settings[admania_postsocialbuffer]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialbuffer'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialstumble]">
                <?php  esc_html_e ( 'Enable Stumbleupon:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialstumble]" name="admania_theme_settings[admania_postsocialstumble]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialstumble'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialredit]">
                <?php  esc_html_e ( 'Enable Reddit:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialredit]" name="admania_theme_settings[admania_postsocialredit]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialredit'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admania_optionsset admania_optionsset1 admania_removespace">
              <label for="admania_theme_settings[admania_postsocialwhatsapp]">
                <?php  esc_html_e ( 'Enable Whatsapp:' , 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postsocialwhatsapp]" name="admania_theme_settings[admania_postsocialwhatsapp]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postsocialwhatsapp'))); ?> />
                <label><i></i></label>
              </div>
            </div>
          </div>
        </div>
        <div class="admania_optionsetngitem admania_optionsset related_poststngs">
          <h3>
            <?php  esc_html_e ( 'Related Post By Category Or Tag', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace">
            <label for="admania_theme_settings[admania-enable-related-post-by-category]">
              <?php  esc_html_e ( 'Disable Related Post By Category:', 'admania' ); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania-enable-related-post-by-category]" name="admania_theme_settings[admania-enable-related-post-by-category]" type="checkbox" value="1" <?php checked( '1', ( admania_get_option('admania-enable-related-post-by-category') )); ?> />
              <label><i></i></label>
            </div>
          </div>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace">
            <label for="admania_theme_settings[admania_relatedpostbycategorycount]" class="admania_thmnwbkndstngs">
              <?php  esc_html_e ( 'Related Post Count:' , 'admania'); ?>
            </label>
            <input id="admania_theme_settings[admania_relatedpostbycategorycount]" name="admania_theme_settings[admania_relatedpostbycategorycount]" type="text" size="7" value="<?php echo esc_attr(admania_get_option('admania_relatedpostbycategorycount')); ?>" class="admania_rldpstcnt"/>
          </div>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace">
            <label for="admania_theme_settings[admania-enable-related-post-by-tag]">
              <?php  esc_html_e ( 'Enable Related Post By Tag:', 'admania' ); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania-enable-related-post-by-tag]" name="admania_theme_settings[admania-enable-related-post-by-tag]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania-enable-related-post-by-tag'))); ?> />
              <label><i></i></label>
            </div>
          </div>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace">
            <label for="admania_theme_settings[admania_relatedpostbytagcount]" class="admania_thmnwbkndstngs">
              <?php  esc_html_e ( 'Related Post Count:', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_relatedpostbytagcount]" name="admania_theme_settings[admania_relatedpostbytagcount]" type="text" size="7" value="<?php echo esc_attr(admania_get_option('admania_relatedpostbytagcount')); ?>" class="admania_rldpstcnt"/>
          </div>
        </div>
        <?php /*Related Post By Category Or Tag */?>
        <div class="admania_optionsetngitem admania_optionsset">
          <h3>
            <?php  esc_html_e ( 'Pagination Settings', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace admania_vmlthemebkd">
            <label for="admania_theme_settings[admania_snglpaginationpn]">
              <?php  esc_html_e ( 'Disable Single Post Previous / Next Pagination' , 'admania'); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania_snglpaginationpn]" name="admania_theme_settings[admania_snglpaginationpn]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_snglpaginationpn'))); ?> />
              <label><i></i></label>
            </div>
          </div>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace admania_themvmlnlin">
            <label for="admania_theme_settings[admania_hmpgpaginationno]">
              <?php  esc_html_e ( 'Disable Home Page Previous / Next Pagination Number', 'admania' ); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania_hmpgpaginationno]" name="admania_theme_settings[admania_hmpgpaginationno]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_hmpgpaginationno'))); ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
        <?php /*Pagination Settings*/?>
        <div class="admania_optionsetngitem admania_optionsset">
          <h3>
            <?php  esc_html_e ( 'Comments', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace admania_vml2thmbkd">
            <label for="admania_theme_settings[admania_commentspost]">
              <?php  esc_html_e ( 'Disable Comments on posts?', 'admania' ); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania_commentspost]" name="admania_theme_settings[admania_commentspost]" type="checkbox" value="1" <?php checked( '1', ( admania_get_option('admania_commentspost'))); ?> />
              <label><i></i></label>
            </div>
          </div>
          <div class="admania_optionsinneritem admania_sectiongap admania_removespace admania_vml3thembkd">
            <label for="admania_theme_settings[admania_commentspage]">
              <?php  esc_html_e ( 'Disable Comments on pages?' , 'admania'); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania_commentspage]" name="admania_theme_settings[admania_commentspage]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_commentspage'))); ?> />
              <label><i></i></label>
            </div>
          </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <li data-content="admania_adssettings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Ads management' , 'admania'); ?>
      </h2>
      <div class="admania_pannelsettings">
        <div class="admania_headerad_firstsection">
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/footerad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl6" class="admania_hdradclk admania_adsensesection6"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Before Footer Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfftr admania_adstngextrastyle" id="admania_adsectionscrl6">
            <h3>
              <?php  esc_html_e ( 'Before Footer Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb6" id="admania_adstnngtop6"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[hm_bfftrad]">
                  <?php  esc_html_e ( 'Enable the Before Footer Section Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[hm_bfftrad]" name="admania_theme_settings[hm_bfftrad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('hm_bfftrad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash25" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash25">
                  <label for="admania_theme_settings[hm_bfftrhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_bfftrhtmlad]" name="admania_theme_settings[hm_bfftrhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_bfftrhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash179" class="admania_iconrt">
                <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash179">
                  <label for="admania_theme_settings[hm_bfftrgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Home / Archives Before Footer Section Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[hm_bfftrgglead]" name="admania_theme_settings[hm_bfftrgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('hm_bfftrgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash27" class="admania_iconrt">
                <?php  esc_html_e ( 'After Grid Post Section Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash27">
                  <label for="admania_theme_settings[admania_adimg_url10]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url10" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url10]" value="<?php echo esc_url(admania_get_option('admania_adimg_url10')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload10" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image10 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw10" src="<?php echo esc_url(admania_get_option('admania_adimg_url10')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url10]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url10]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url10')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash78" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash78">
                  <label for="admania_theme_settings[ad_rmcatlist9]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist9]" name="admania_theme_settings[ad_rmcatlist9]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist9')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist9]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist9]" name="admania_theme_settings[ad_rmtaglist9]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist9')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <?php /*Ads management*/?>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Single Post Content Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/snglepost.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl7" class="admania_hdradclk admania_adsensesection7"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i>
              <?php  esc_html_e ( 'Click Here To Setup the Before Single Post Content Ad' , 'admania'); ?>
              </a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfpstcnt admania_adstngextrastyle" id="admania_adsectionscrl7">
            <h3>
              <?php  esc_html_e ( 'Before Single Post Content Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb7" id="admania_adstnngtop7"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Before Single Post Content Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[sngle_pstbfad]">
                  <?php  esc_html_e ( 'Enable the Before Single Post Content Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[sngle_pstbfad]" name="admania_theme_settings[sngle_pstbfad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('sngle_pstbfad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash29" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Single Post Content Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash29">
                  <label for="admania_theme_settings[sngle_pstbfhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Before Single Post Content Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstbfhtmlad]" name="admania_theme_settings[sngle_pstbfhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstbfhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash30" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Single Post Content Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash30">
                  <label for="admania_theme_settings[sngle_pstbfgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Before Single Post Content Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstbfgglead]" name="admania_theme_settings[sngle_pstbfgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstbfgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash31" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Single Post Content Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash31">
                  <label for="admania_theme_settings[admania_adimg_url11]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url11" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url11]" value="<?php echo esc_url(admania_get_option('admania_adimg_url11')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload11" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image11 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw11" src="<?php echo esc_url(admania_get_option('admania_adimg_url11')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url11]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url11]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url11')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash79" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash79">
                  <label for="admania_theme_settings[ad_rmcatlist10]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist10]" name="admania_theme_settings[ad_rmcatlist10]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist10')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist10]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist10]" name="admania_theme_settings[ad_rmtaglist10]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist10')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <?php /*Bottom Ads management*/?>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Single Post Inner Section Top Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/singlepostinnertpad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl8" class="admania_hdradclk admania_adsensesection8"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i>
              <?php  esc_html_e ( 'Click Here To Setup the Single PostInner Content Top Ad', 'admania' ); ?>
              </a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_snglpsttp admania_adstngextrastyle" id="admania_adsectionscrl8">
            <h3>
              <?php  esc_html_e ( 'Single Post Inner Section Top Ads Management', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb8" id="admania_adstnngtop8"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Single Post Inner Top Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[sngle_pstinrtpad]">
                  <?php  esc_html_e ( 'Enable the Single Post Inner Top Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[sngle_pstinrtpad]" name="admania_theme_settings[sngle_pstinrtpad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('sngle_pstinrtpad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash32" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Top Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash32">
                  <label for="admania_theme_settings[sngle_pstinrtphtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Inner Top Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstinrtphtmlad]" name="admania_theme_settings[sngle_pstinrtphtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstinrtphtmlad')); ?></textarea>
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[sngle_pstinrtpadalgn1]">
                    <?php  esc_html_e ( 'Single Post Inner Top Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[sngle_pstinrtpadalgn1]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option1){
				$admania_selected1 = ((admania_get_option('sngle_pstinrtpadalgn1') == $admania_option1 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected1); ?>><?php echo (!empty($admania_option1) ? $admania_option1 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </div>
                <a href="#admania_adacordnhash33" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Top Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash33">
                  <label for="admania_theme_settings[sngle_pstinrtpgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Inner Top Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstinrtpgglead]" name="admania_theme_settings[sngle_pstinrtpgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstinrtpgglead')); ?></textarea>
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[sngle_pstinrtpadalgn2]">
                    <?php  esc_html_e ( 'Single Post Inner Top Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[sngle_pstinrtpadalgn2]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option2){
				$admania_selected2 = ((admania_get_option('sngle_pstinrtpadalgn2') == $admania_option2 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected2); ?>><?php echo (!empty($admania_option2) ? $admania_option2 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </div>
                <a href="#admania_adacordnhash34" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Top Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash34">
                  <label for="admania_theme_settings[admania_adimg_url12]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url12" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url12]" value="<?php echo esc_url(admania_get_option('admania_adimg_url12')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload12" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image12 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw12" src="<?php echo esc_url(admania_get_option('admania_adimg_url12')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url12]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url12]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url12')); ?>" />
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[sngle_pstinrtpadalgn3]">
                    <?php  esc_html_e ( 'Single Post Inner Top Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[sngle_pstinrtpadalgn3]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option3){
				$admania_selected3 = ((admania_get_option('sngle_pstinrtpadalgn3') == $admania_option3 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected3); ?>><?php echo (!empty($admania_option3) ? $admania_option3 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash80" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash80">
                  <label for="admania_theme_settings[ad_rmcatlist11]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist11]" name="admania_theme_settings[ad_rmcatlist11]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist11')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist11]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist11]" name="admania_theme_settings[ad_rmtaglist11]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist11')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Single Post Inside Ads after nth paragraph' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/singlepostnthpara.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl9" class="admania_hdradclk admania_adsensesection9"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Single PostInner Nth Para Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_snglepstnthpara admania_adstngextrastyle" id="admania_adsectionscrl9">
            <h3>
              <?php  esc_html_e ( 'Single Post Inside Ads after nth paragraph :', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb9" id="admania_adstnngtop9"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Single Post Inner Nth Para Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[sngle_pstinrnthad]">
                  <?php  esc_html_e ( 'Enable the Single Post Inner Nth Para Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[sngle_pstinrnthad]" name="admania_theme_settings[sngle_pstinrnthad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('sngle_pstinrnthad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash36" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Nth Para Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash36">
                  <label for="admania_theme_settings[sngle_pstinrnthhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Inner Nth Para Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstinrnthhtmlad]" name="admania_theme_settings[sngle_pstinrnthhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstinrnthhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash37" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Nth Para Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash37">
                  <label for="admania_theme_settings[sngle_pstinrnthgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Inner Nth Para Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstinrnthgglead]" name="admania_theme_settings[sngle_pstinrnthgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstinrnthgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash38" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Nth Para Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash38">
                  <label for="admania_theme_settings[admania_adimg_url13]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url13" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url13]" value="<?php echo esc_url(admania_get_option('admania_adimg_url13')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload13" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image13 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw13" src="<?php echo esc_url(admania_get_option('admania_adimg_url13')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url13]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url13]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url13')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash39" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Inner Nth Para Ad Position', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash39"> <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[snglepst_aftrnthparano]" class="admania_vmlsplpingbkg285">
                    <?php  esc_html_e ( 'Paragraph number:' , 'admania'); ?>
                  </label>
                  <input id="admania_theme_settings[snglepst_aftrnthparano]" name="admania_theme_settings[snglepst_aftrnthparano]"size="5" type="text" value="<?php echo esc_attr(admania_get_option('snglepst_aftrnthparano')); ?>" />
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[sngle_pstaftrnthpadalgn4]">
                    <?php  esc_html_e ( 'Single Post Inner Nth Para Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[sngle_pstaftrnthpadalgn4]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option4){
				$admania_selected4 = ((admania_get_option('sngle_pstaftrnthpadalgn4') == $admania_option4 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected4); ?>><?php echo (!empty($admania_option4) ? $admania_option4 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </span> </div>
                <a href="#admania_adacordnhash81" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash81">
                  <label for="admania_theme_settings[ad_rmcatlist12]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist12]" name="admania_theme_settings[ad_rmcatlist12]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist12')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist12]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist12]" name="admania_theme_settings[ad_rmtaglist12]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist12')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Post Content Bottom Ads Managements' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/singleaftrcntpst.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl10" class="admania_hdradclk admania_adsensesection10"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Single PostContent Bottom Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_snglepstbtmad admania_adstngextrastyle" id="admania_adsectionscrl10">
            <h3>
              <?php  esc_html_e ( 'Post Content Bottom Ads Managements:', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb10"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Single Post Content Bottom Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[sngle_pstcntbtmad]">
                  <?php  esc_html_e ( 'Enable the Single Post Content Bottom Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[sngle_pstcntbtmad]" name="admania_theme_settings[sngle_pstcntbtmad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('sngle_pstcntbtmad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash40" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Content Bottom  Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash40">
                  <label for="admania_theme_settings[sngle_pstcnthtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Content Bottom  Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstcnthtmlad]" name="admania_theme_settings[sngle_pstcnthtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstcnthtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash41" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Content Bottom  Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash41">
                  <label for="admania_theme_settings[sngle_pstcntgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Content Bottom  Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstcntgglead]" name="admania_theme_settings[sngle_pstcntgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstcntgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash42" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Content Bottom  Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash42">
                  <label for="admania_theme_settings[admania_adimg_url14]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url14" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url14]" value="<?php echo esc_url(admania_get_option('admania_adimg_url14')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload14" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image14 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw14" src="<?php echo esc_url(admania_get_option('admania_adimg_url14')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url14]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url14]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url14')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash82" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash82">
                  <label for="admania_theme_settings[ad_rmcatlist13]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist13]" name="admania_theme_settings[ad_rmcatlist13]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist13')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist13]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist13]" name="admania_theme_settings[ad_rmtaglist13]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist13')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Post Bottom Ads After Optin Box Section' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/snlgepstoptnaftrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl11" class="admania_hdradclk admania_adsensesection11"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Single Post After Optin Box Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_aftrpstoptnad admania_adstngextrastyle" id="admania_adsectionscrl11">
            <h3>
              <?php  esc_html_e ( 'Post Bottom Ads After Optin Box Section:', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb11"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Single Post After Optin Box Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[sngle_pstafroptnad]">
                  <?php  esc_html_e ( 'Enable the Single Post After Optin Box Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[sngle_pstafroptnad]" name="admania_theme_settings[sngle_pstafroptnad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('sngle_pstafroptnad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash44" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post After Optin Box Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash44">
                  <label for="admania_theme_settings[sngle_pstafroptnhtmlad1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post After Optin Box Ad1 ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstafroptnhtmlad1]" name="admania_theme_settings[sngle_pstafroptnhtmlad1]" rows="6" cols="68" class="admania_txtareaad"><?php echo esc_textarea(admania_get_option('sngle_pstafroptnhtmlad1')); ?></textarea>
                  <label for="admania_theme_settings[sngle_pstafroptnhtmlad2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post After Optin Box Ad2 ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstafroptnhtmlad2]" name="admania_theme_settings[sngle_pstafroptnhtmlad2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstafroptnhtmlad2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash45" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post After Optin Box Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash45">
                  <label for="admania_theme_settings[sngle_pstafroptngglead1]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post After Optin Box Ad1 ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstafroptngglead1]" name="admania_theme_settings[sngle_pstafroptngglead1]" rows="6" cols="68" class="admania_txtareaad"><?php echo esc_textarea(admania_get_option('sngle_pstafroptngglead1')); ?></textarea>
                  <label for="admania_theme_settings[sngle_pstafroptngglead2]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post After Optin Box Ad2 ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pstafroptngglead2]" name="admania_theme_settings[sngle_pstafroptngglead2]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pstafroptngglead2')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash46" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post After Optin Box Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash46">
                  <label for="admania_theme_settings[admania_adimg_url15]">
                    <?php  esc_html_e ( 'Choose the Ad1 Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url15" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url15]" value="<?php echo esc_url(admania_get_option('admania_adimg_url15')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload15" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image15 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw15" src="<?php echo esc_url(admania_get_option('admania_adimg_url15')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url15]">
                    <?php  esc_html_e ( 'Image Ad1 Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url15]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url15')); ?>" class="admania_txtareaad"/>
                  <label for="admania_theme_settings[admania_adimg_url16]">
                    <?php  esc_html_e ( 'Choose the Ad2 Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url16" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url16]" value="<?php echo esc_url(admania_get_option('admania_adimg_url16')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload16" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image16 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw16" src="<?php echo esc_url(admania_get_option('admania_adimg_url16')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url16]">
                    <?php  esc_html_e ( 'Image Ad2 Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url16]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url16')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash83" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash83">
                  <label for="admania_theme_settings[ad_rmcatlist14]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist14]" name="admania_theme_settings[ad_rmcatlist14]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist14')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist14]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist14]" name="admania_theme_settings[ad_rmtaglist14]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist14')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Single Post Content Bottom Sticky Ads' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/sdbarstckyad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl12" class="admania_hdradclk admania_adsensesection12"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Single Bottom Sticky Ad','admania');?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_snglesdbrstcky admania_adstngextrastyle" id="admania_adsectionscrl12">
            <h3>
              <?php  esc_html_e ( 'Single Post Content Bottom Sticky Ads', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb12"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Single Post Sticky Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[sngle_pststkyad]">
                  <?php  esc_html_e ( 'Enable the Single Post Sticky Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[sngle_pststkyad]" name="admania_theme_settings[sngle_pststkyad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('sngle_pststkyad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash49" class="admania_iconrt">
                <?php  esc_html_e ( 'Single Post Sticky Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash49">
                  <label for="admania_theme_settings[sngle_pststkyhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Sticky Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pststkyhtmlad]" name="admania_theme_settings[sngle_pststkyhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pststkyhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash47" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Single Post Content Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash47">
                  <label for="admania_theme_settings[sngle_pststkygglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Single Post Sticky Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[sngle_pststkygglead]" name="admania_theme_settings[sngle_pststkygglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('sngle_pststkygglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash48" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Single Post Content Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash48">
                  <label for="admania_theme_settings[admania_adimg_url17]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url17" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url17]" value="<?php echo esc_url(admania_get_option('admania_adimg_url17')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload17" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image17 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw17" src="<?php echo esc_url(admania_get_option('admania_adimg_url17')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url17]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url17]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url17')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash84" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash84">
                  <label for="admania_theme_settings[ad_rmcatlist15]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist15]" name="admania_theme_settings[ad_rmcatlist15]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist15')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist15]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist15]" name="admania_theme_settings[ad_rmtaglist15]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist15')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Before Page Content Section Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/pagecnt.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscr14" class="admania_hdradclk admania_adsensesection14"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Before Page Content Section Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_bfpgcnt admania_adstngextrastyle" id="admania_adsectionscr14">
            <h3>
              <?php  esc_html_e ( 'Before Page Content Section Ads Management' , 'admania'); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb14"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Before Page Content Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[page_pstbfad]">
                  <?php  esc_html_e ( 'Enable the Before Single Post Content Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[page_pstbfad]" name="admania_theme_settings[page_pstbfad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('page_pstbfad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash50" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Page Content Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash50">
                  <label for="admania_theme_settings[page_pstbfhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Before Page Content Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstbfhtmlad]" name="admania_theme_settings[page_pstbfhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstbfhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash51" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Page Content Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash51">
                  <label for="admania_theme_settings[page_pstbfgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Before Page Content Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstbfgglead]" name="admania_theme_settings[page_pstbfgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstbfgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash52" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Page Content Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash52">
                  <label for="admania_theme_settings[admania_adimg_url18]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url18" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url18]" value="<?php echo esc_url(admania_get_option('admania_adimg_url18')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload18" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image18 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw18" src="<?php echo esc_url(admania_get_option('admania_adimg_url18')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url18]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url18]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url18')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash85" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash85">
                  <label for="admania_theme_settings[ad_rmcatlist16]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist16]" name="admania_theme_settings[ad_rmcatlist16]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist16')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist16]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist16]" name="admania_theme_settings[ad_rmtaglist16]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist16')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Page Inner Section Top Ads Management' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/pagecntinrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl15" class="admania_hdradclk admania_adsensesection15"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Page Inner Content Top Ad','admania');?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_pgpsttp admania_adstngextrastyle" id="admania_adsectionscrl15">
            <h3>
              <?php  esc_html_e ( 'Page Inner Section Top Ads Management', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb15"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Page Content Top Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[page_pstinrtpad]">
                  <?php  esc_html_e ( 'Enable the Page Content Top Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[page_pstinrtpad]" name="admania_theme_settings[page_pstinrtpad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('page_pstinrtpad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash53" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Top Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash53">
                  <label for="admania_theme_settings[page_pstinrtphtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Content Top Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstinrtphtmlad]" name="admania_theme_settings[page_pstinrtphtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstinrtphtmlad')); ?></textarea>
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[page_pstinrtpadalgn1]">
                    <?php  esc_html_e ( 'Page Content Top Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[page_pstinrtpadalgn1]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option6){
				$admania_selected6 = ((admania_get_option('page_pstinrtpadalgn1') == $admania_option6 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected6); ?>><?php echo (!empty($admania_option6) ? $admania_option6 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </div>
                <a href="#admania_adacordnhash54" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Top Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash54">
                  <label for="admania_theme_settings[page_pstinrtpgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Content Top Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstinrtpgglead]" name="admania_theme_settings[page_pstinrtpgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstinrtpgglead')); ?></textarea>
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[page_pstinrtpadalgn2]">
                    <?php  esc_html_e ( 'Page Content Top Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[page_pstinrtpadalgn2]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option7){
				$admania_selected7 = ((admania_get_option('page_pstinrtpadalgn2') == $admania_option7 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected7); ?>><?php echo (!empty($admania_option7) ? $admania_option7 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </div>
                <a href="#admania_adacordnhash55" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Top Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash55">
                  <label for="admania_theme_settings[admania_adimg_url19]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url19" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url19]" value="<?php echo esc_url(admania_get_option('admania_adimg_url19')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload19" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image19 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw19" src="<?php echo esc_url(admania_get_option('admania_adimg_url19')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url19]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url19]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url19')); ?>" />
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[page_pstinrtpadalgn3]">
                    <?php  esc_html_e ( 'Page Content Top Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[page_pstinrtpadalgn3]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option8){
				$admania_selected8 = ((admania_get_option('page_pstinrtpadalgn3') == $admania_option8 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected8); ?>><?php echo (!empty($admania_option8) ? $admania_option8 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash86" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash86">
                  <label for="admania_theme_settings[ad_rmcatlist17]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist17]" name="admania_theme_settings[ad_rmcatlist17]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist17')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist17]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist17]" name="admania_theme_settings[ad_rmtaglist17]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist17')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Page Content Inside Ads After Nth paragraph' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/pagecntnthparaad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl16" class="admania_hdradclk admania_adsensesection16"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the PageInner Nth Para Ad','admania'); ?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_pgepstnthpara admania_adstngextrastyle" id="admania_adsectionscrl16">
            <h3>
              <?php  esc_html_e ( 'Page Content Inside Ads After Nth paragraph', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb16"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Page Content Nth Para Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[page_pstinrnthad]">
                  <?php  esc_html_e ( 'Enable the Page Content Nth Para Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[page_pstinrnthad]" name="admania_theme_settings[page_pstinrnthad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('page_pstinrnthad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash56" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Nth Para Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash56">
                  <label for="admania_theme_settings[page_pstinrnthhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Content Nth Para Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstinrnthhtmlad]" name="admania_theme_settings[page_pstinrnthhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstinrnthhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash57" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Nth Para Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash57">
                  <label for="admania_theme_settings[page_pstinrnthgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Content Nth Para Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstinrnthgglead]" name="admania_theme_settings[page_pstinrnthgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstinrnthgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash58" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Nth Para Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash58">
                  <label for="admania_theme_settings[admania_adimg_url20]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url20" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url20]" value="<?php echo esc_url(admania_get_option('admania_adimg_url20')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload20" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image20 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw20" src="<?php echo esc_url(admania_get_option('admania_adimg_url20')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url20]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url20]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url20')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash59" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Nth Para Ad Position', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash59"> <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[pagepst_aftrnthparano]" class="admania_vmlsplpingbkg285">
                    <?php  esc_html_e ( 'Paragraph number:' , 'admania'); ?>
                  </label>
                  <input id="admania_theme_settings[pagepst_aftrnthparano]" name="admania_theme_settings[pagepst_aftrnthparano]"size="5" type="text" value="<?php echo esc_attr(admania_get_option('pagepst_aftrnthparano')); ?>" />
                  <span class="admania_adalignmentbk">
                  <label for="admania_theme_settings[page_pstaftrnthpadalgn4]">
                    <?php  esc_html_e ( 'Page Content Nth Para Ad Alignment', 'admania' ); ?>
                  </label>
                  <select name="admania_theme_settings[page_pstaftrnthpadalgn4]">
                    <?php 			
				foreach ($admania_postadalign as $admania_option10){
				$admania_selected10 = ((admania_get_option('page_pstaftrnthpadalgn4') == $admania_option10 ) ?  'selected="selected"' : ''); 
				?>
                    <option <?php echo esc_attr($admania_selected10); ?>><?php echo (!empty($admania_option10) ? $admania_option10 : ''); ?></option>
                    <?php } ?>
                  </select>
                  </span> </span> </div>
                <a href="#admania_adacordnhash87" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash87">
                  <label for="admania_theme_settings[ad_rmcatlist18]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist18]" name="admania_theme_settings[ad_rmcatlist18]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist18')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist18]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist18]" name="admania_theme_settings[ad_rmtaglist18]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist18')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Page Content Bottom Ads Managements' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/pagecntaftrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl17" class="admania_hdradclk admania_adsensesection17"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Page Content Bottom Ad','admania');?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_pagepstbtmad admania_adstngextrastyle" id="admania_adsectionscrl17">
            <h3>
              <?php  esc_html_e ( 'Page Content Bottom Ads Managements:', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb17"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Page Content Bottom Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[page_pstcntbtmad]">
                  <?php  esc_html_e ( 'Enable the Page Content Bottom Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[page_pstcntbtmad]" name="admania_theme_settings[page_pstcntbtmad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('page_pstcntbtmad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash60" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Bottom  Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash60">
                  <label for="admania_theme_settings[page_pstcnthtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Content Bottom  Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstcnthtmlad]" name="admania_theme_settings[page_pstcnthtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstcnthtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash61" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Bottom  Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash61">
                  <label for="admania_theme_settings[page_pstcntgglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Content Bottom  Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pstcntgglead]" name="admania_theme_settings[page_pstcntgglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pstcntgglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash62" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Content Bottom  Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash62">
                  <label for="admania_theme_settings[admania_adimg_url21]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url21" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url21]" value="<?php echo esc_url(admania_get_option('admania_adimg_url21')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload21" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image21 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw21" src="<?php echo esc_url(admania_get_option('admania_adimg_url21')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url21]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url21]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url21')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash87" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash87">
                  <label for="admania_theme_settings[ad_rmcatlist20]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist20]" name="admania_theme_settings[ad_rmcatlist20]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist20')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist20]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist20]" name="admania_theme_settings[ad_rmtaglist20]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist20')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="admania_fade admania_adhdng">
            <h3>
              <?php  esc_html_e ( 'Page Content Bottom Sticky Ads Managements' , 'admania'); ?>
              <i class="dashicons-before dashicons dashicons-welcome-write-blog admania_dashicnhd"></i> </h3>
            <div class="admania_headerad"> <img src="<?php echo esc_url ($admania_dir_uri); ?>/lib/includes/images/pagestkysdbrad.png" alt=""<?php esc_html_e('Adimage','admania'); ?>> <a href="#admania_adsectionscrl18" class="admania_hdradclk admania_adsensesection18"><i class="dashicons-before dashicons admania_bkicn dashicons-edit"></i><?php esc_html_e('Click Here To Setup the Page Bottom Sticky Ad','admania');?></a> </div>
          </div>
          <div class="admania_optionsetngitem admania_optionsset admania_pgesdbrstcky admania_adstngextrastyle" id="admania_adsectionscrl18">
            <h3>
              <?php  esc_html_e ( 'Page Content Bottom Sticky Ads Managements:', 'admania' ); ?>
            </h3>
            <div class="admania_filedsheader"> <span class="admania_themesavebtn"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </span> </div>
            <i class="dashicons-no-alt dashicons-before dashicons admania_clstb admania_clstb18"></i>
            <div class="admania_optinosstngslist">
              <h3>
                <?php  esc_html_e ( 'Page Content Bottom Sticky Ad' , 'admania'); ?>
              </h3>
              <div class="admania_optionsinneritem admania_sectiongap admania_sctnhdng admania_removespace admania_vmlspcl4">
                <label for="admania_theme_settings[page_pststkyad]">
                  <?php  esc_html_e ( 'Enable the Page Sticky Ad' , 'admania'); ?>
                </label>
                <div class="admania_switch admania_switchstyle">
                  <input id="admania_theme_settings[page_pststkyad]" name="admania_theme_settings[page_pststkyad]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('page_pststkyad'))); ?> />
                  <label><i></i></label>
                </div>
              </div>
              <div class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : Please use anyone of the following section to setup the ad options' , 'admania'); ?>
              </div>
              <div id="admania_adaccordion" class="admania_adaccordion"> <a href="#admania_adacordnhash63" class="admania_iconrt">
                <?php  esc_html_e ( 'Page Sticky Ad ( Html Ad Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash63">
                  <label for="admania_theme_settings[page_pststkyhtmlad]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Sticky Ad ( Html Ad Code )', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Html Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pststkyhtmlad]" name="admania_theme_settings[page_pststkyhtmlad]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pststkyhtmlad')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash64" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Page Content Ad ( Google Responsive Adsense Code )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash64">
                  <label for="admania_theme_settings[page_pststkygglead]" class="admania_vmlspcl11">
                    <?php  esc_html_e ( 'Page Sticky Ad ( Google Responsive Adsense Code)', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php  esc_html_e ( 'Paste the Google Responsive Code Here', 'admania' ); ?>" id="admania_theme_settings[page_pststkygglead]" name="admania_theme_settings[page_pststkygglead]" rows="6" cols="68"><?php echo esc_textarea(admania_get_option('page_pststkygglead')); ?></textarea>
                </div>
                <a href="#admania_adacordnhash65" class="admania_iconrt">
                <?php  esc_html_e ( 'Before Page Content Ad ( Image Link Ad )', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash65">
                  <label for="admania_theme_settings[admania_adimg_url22]">
                    <?php  esc_html_e ( 'Choose the Ad Image', 'admania' ); ?>
                  </label>
                  <input class="admania_adimg_url22" type="text" size="<?php  echo esc_attr($admania_iptxttype); ?>" name="admania_theme_settings[admania_adimg_url22]" value="<?php echo esc_url(admania_get_option('admania_adimg_url22')); ?>" />
                  <input  type="button" class="button admania_adimg_mediaupload22" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
                  <span class="admaniaadimgtag_image22 admaniaadimgtag_extrastyle"> <img class="admania_adimgshw22" src="<?php echo esc_url(admania_get_option('admania_adimg_url22')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </span>
                  <label for="admania_theme_settings[admania_adimgtg_url22]">
                    <?php  esc_html_e ( 'Image Ad Anchor Link', 'admania' ); ?>
                  </label>
                  <input type="text" size="<?php  echo esc_attr($admania_iptxttype1); ?>" name="admania_theme_settings[admania_adimgtg_url22]" placeholder="<?php  esc_html_e ( 'Paste Ad Image Anchor Link Here', 'admania' ); ?>" value="<?php echo esc_url(admania_get_option('admania_adimgtg_url22')); ?>" />
                </div>
                <span class="admania_adsstngsnotes">
                <?php  esc_html_e ( 'Notes* : The Given Below Section is Common Settings' , 'admania'); ?>
                </span> <a href="#admania_adacordnhash88" class="admania_iconrt">
                <?php  esc_html_e ( 'Remove The Ads On UnRequired Pages', 'admania' ); ?>
                <i class="dashicons admania_bkndicn dashicons-arrow-down-alt2"></i></a>
                <div class="admania_optionsinneritem admania_slot1 admania_slotshw admania_slotimglnkad admania_sectiongap admania_removespace admania_vmlspcl2" id="admania_adacordnhash88">
                  <label for="admania_theme_settings[ad_rmcatlist19]">
                    <?php  esc_html_e ( 'Enter the Category Ids to Remove Ad At This Category Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the category id like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmcatlist19]" name="admania_theme_settings[ad_rmcatlist19]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmcatlist19')); ?></textarea>
                  <label for="admania_theme_settings[ad_rmtaglist19]">
                    <?php  esc_html_e ( 'Enter the Tag Ids to Remove Ad At This tag Page', 'admania' ); ?>
                  </label>
                  <textarea placeholder="<?php esc_html_e('Enter the Tag Ids like this 32,33,33','admania'); ?>" id="admania_theme_settings[ad_rmtaglist19]" name="admania_theme_settings[ad_rmtaglist19]" rows="1" cols="40" class="admania_textbot"><?php echo esc_textarea(admania_get_option('ad_rmtaglist19')); ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php /*** Ads management*/ ?>
    <?php /*** front page with optin*/ ?>
    <li data-content="admania_optinsettings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Post Optin Box', 'admania' ); ?>
      </h2>
      <div class="admania_pannelsettings">
        <?php /*welcome Page with design*/?>
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Post Optin box', 'admania' ); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <div class="admania_removespace admania_optionsset">
              <label for="admania_theme_settings[admania_postoptincodechk]">
                <?php  esc_html_e ( 'Enable Post Optin:', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_postoptincodechk]" name="admania_theme_settings[admania_postoptincodechk]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_postoptincodechk'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <label for="admania_theme_settings[admania_postoptincode]">
              <?php  esc_html_e ( 'Paste the Optin code:', 'admania' ); ?>
            </label>
            <textarea id="admania_theme_settings[admania_postoptincode]" class="html10" name="admania_theme_settings[admania_postoptincode]" rows="5" cols="68"><?php echo esc_textarea(admania_get_option('admania_postoptincode')); ?></textarea>
            <label for="admania_theme_settings[admania_postoptintypename]">
              <?php  esc_html_e ( 'Name', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypename]" class="name10" type="text" size="70" name="admania_theme_settings[admania_postoptintypename]" value="<?php echo esc_attr(admania_get_option('admania_postoptintypename')); ?>" />
            <label for="admania_theme_settings[admania_postoptintypeplaceholdername]">
              <?php  esc_html_e ( 'Placeholder for Name', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypeplaceholdername]" type="text" size="70" name="admania_theme_settings[admania_postoptintypeplaceholdername]" value="<?php echo esc_attr(admania_get_option('admania_postoptintypeplaceholdername')); ?>" />
            <label for="admania_theme_settings[admania_postoptintypeemail]">
              <?php  esc_html_e ( 'E-mail', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypeemail]" type="text" class="email10" size="70" name="admania_theme_settings[admania_postoptintypeemail]" value="<?php echo esc_attr(admania_get_option('admania_postoptintypeemail')); ?>" />
            <label for="admania_theme_settings[admania_postoptintypeplaceholderemail]">
              <?php  esc_html_e ( 'Placeholder for E-mail', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypeplaceholderemail]" type="text" size="70" name="admania_theme_settings[admania_postoptintypeplaceholderemail]" value="<?php echo esc_attr(admania_get_option('admania_postoptintypeplaceholderemail')); ?>" />
            <label for="admania_theme_settings[admania_postoptintypehidden]">
              <?php  esc_html_e ( 'Hidden Files', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypehidden]" type="text" class="hidden10" size="70" name="admania_theme_settings[admania_postoptintypehidden]" value="<?php echo esc_attr(admania_get_option('admania_postoptintypehidden')); ?>">
            <label for="admania_theme_settings[admania_postoptintypeurl]">
              <?php  esc_html_e ( 'URl', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypeurl]" type="text" class="url10" size="70" name="admania_theme_settings[admania_postoptintypeurl]" value="<?php echo esc_url(admania_get_option('admania_postoptintypeurl')); ?>" />
            <label for="admania_theme_settings[admania_postoptintypesubmit]">
              <?php  esc_html_e ( 'Submit Button Name', 'admania' ); ?>
            </label>
            <input id="admania_theme_settings[admania_postoptintypesubmit]" type="text" size="70" name="admania_theme_settings[admania_postoptintypesubmit]" value="<?php echo esc_attr(admania_get_option('admania_postoptintypesubmit')); ?>" />
            <label for="admania_theme_settings[admania_postoptinheading]">
              <?php  esc_html_e ( 'Post Optin Heading', 'admania' ); ?>
            </label>
            <textarea id="admania_theme_settings[admania_postoptinheading]" rows="4" cols="68" name="admania_theme_settings[admania_postoptinheading]"><?php echo esc_textarea(admania_get_option('admania_postoptinheading')); ?></textarea>
            <label for="admania_theme_settings[admania_postoptinheading2]">
              <?php  esc_html_e ( 'Post Optin Paragraph', 'admania' ); ?>
            </label>
            <textarea id="admania_theme_settings[admania_postoptinheading2]" rows="5" cols="68" name="admania_theme_settings[admania_postoptinheading2]"><?php echo esc_textarea(admania_get_option('admania_postoptinheading2')); ?></textarea>
          </div>
        </div>
        <?php /*Post Optin box*/?>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php /*Single Page Optin box*/?>
    <?php /*** footer settings*/ ?>
    <li data-content="admania_footersettings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ( 'Footer Settings', 'admania' ); ?>
      </h2>
      <div class="admania_pannelsettings">
      <div class="admania_optionsetngitem">
        <h3 class="admania_settingheading">
          <?php  esc_html_e ( 'Footer Instagram Settings' , 'admania' ); ?>
        </h3>
        <div class="admania_optionsinneritem">
          <div class="admania_optionsset admania_removespace">
            <div class="admania_sectiongap admania_removespace">
              <label for="admania_theme_settings[admania_enableckftrinst]">
                <?php  esc_html_e ( 'Enable Footer Instagram', 'admania' ); ?>
              </label>
              <div class="admania_switch admania_switchstyle">
                <input id="admania_theme_settings[admania_enableckftrinst]" name="admania_theme_settings[admania_enableckftrinst]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_enableckftrinst'))); ?>  />
                <label><i></i></label>
              </div>
            </div>
          </div>				  
          <label for="admania_theme_settings[admania_ftrinstagramuserid]">
            <?php  esc_html_e ( 'Instagram userid: ' , 'admania' ); ?>
            <?php $admania_linkid = "https://instagram.com/oauth/authorize/?client_id=3a81a9fa2a064751b8c31385b91cc25c&scope=basic+public_content&redirect_uri=https://smashballoon.com/instagram-feed/instagram-token-plugin/?return_uri=".admin_url('themes.php?page=settings')."&response_type=token"; ?>
            <a href="<?php echo esc_url($admania_linkid); ?>" class="magazee_insidget_btn">
            <?php  esc_html_e ('Click here to get userid & accesstoken','admania'); ?>
            </a> </label>
          <input id="admania_theme_settings[admania_ftrinstagramuserid]" size="70" name="admania_theme_settings[admania_ftrinstagramuserid]" type="text" value="<?php echo esc_attr(admania_get_option('admania_ftrinstagramuserid')); ?>" />
          <label for="admania_theme_settings[admania_ftrinstagramusername]">
            <?php  esc_html_e ( 'Instagram Username: ' , 'admania' ); ?>
          </label>
          <input id="admania_theme_settings[admania_ftrinstagramusername]" size="70" name="admania_theme_settings[admania_ftrinstagramusername]" type="text" value="<?php echo esc_attr(admania_get_option('admania_ftrinstagramusername')); ?>" />
		  <label for="admania_theme_settings[admania_ftrinstagramaccsestoken]">
            <?php  esc_html_e ( 'Instagram accesstokenID: ' , 'admania' ); ?>
          </label>
          <input id="admania_theme_settings[admania_ftrinstagramaccsestoken]" size="70" name="admania_theme_settings[admania_ftrinstagramaccsestoken]" type="text" value="<?php echo esc_attr(admania_get_option('admania_ftrinstagramaccsestoken')); ?>" />
           <div id="magazee_instagconfi">
		   </div>
		</div>
      </div>
      <div class="admania_optionsetngitem">
        <h3 class="admania_settingheading">
          <?php  esc_html_e ( 'Footer Custom Logo', 'admania' ); ?>
        </h3>
        <div class="admania_optionsinneritem admania_optionsset">
          <div class="admania_sectiongap admania_removespace">
            <label for="admania_theme_settings[admania_ftrcustom_logoactivestatus]">
              <?php  esc_html_e ( 'Show Footer Custom Logo', 'admania' ); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania_ftrcustom_logoactivestatus]" name="admania_theme_settings[admania_ftrcustom_logoactivestatus]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_ftrcustom_logoactivestatus'))); ?>  />
              <label><i></i></label>
            </div>
          </div>
          <label for="admania_theme_settings[admania_ftrcustomlogo]">
            <?php  esc_html_e ( 'Footer Custom Logo', 'admania' ); ?>
          </label>
          <input class="admania_ftrcustomlogo" type="text" size="70" name="admania_theme_settings[admania_ftrcustomlogo]" value="<?php echo esc_url(admania_get_option('admania_ftrcustomlogo')); ?>" />
          <input  type="button" class="button admania_ftr_customlogomediaupload" value="<?php  esc_html_e ( 'Upload', 'admania' ); ?>" />
          <p>
            <?php esc_html_e('Recommended Size 200 x 60px','admania'); ?>
          </p>
          <div class="admaniabkftrlogo_image"> <img class="admania_ftrcustom_image" src="<?php echo esc_url(admania_get_option('admania_ftrcustomlogo')); ?>" alt="<?php esc_html_e('image','admania'); ?>"/> </div>
          <?php /*Logo*/?>
		  	<div class="admania_sectiongap admania_removespace">
            <label for="admania_theme_settings[admania_ftrsitetit_active]">
              <?php  esc_html_e ( 'Disable Footer Site Title', 'admania' ); ?>
            </label>
            <div class="admania_switch admania_switchstyle">
              <input id="admania_theme_settings[admania_ftrsitetit_active]" name="admania_theme_settings[admania_ftrsitetit_active]" type="checkbox" value="1" <?php checked( '1', (admania_get_option('admania_ftrsitetit_active'))); ?>  />
              <label><i></i></label>
            </div>
          </div>
        </div>
		
      </div>
      <div class="admania_optionsetngitem">
        <h3>
          <?php  esc_html_e ( 'Footer Social Follow Links', 'admania' ); ?>
        </h3>
        <div class="admania_optionsinneritem"> 
          <!-- header social media -->
          <label for="admania_theme_settings[admania_ftrfacebook]">
            <?php  esc_html_e ('Footer Facebook Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrfacebook]" name="admania_theme_settings[admania_ftrfacebook]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrfacebook') ); ?>" />
          <label for="admania_theme_settings[admania_ftrtwitter]">
            <?php  esc_html_e ('Footer Twitter Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrtwitter]" name="admania_theme_settings[admania_ftrtwitter]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrtwitter') ); ?>" />
          <label for="admania_theme_settings[admania_ftrgoogleplus]">
            <?php  esc_html_e ('Footer Googleplus Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrgoogleplus]" name="admania_theme_settings[admania_ftrgoogleplus]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrgoogleplus')  ); ?>" />
          <label for="admania_theme_settings[admania_ftrlinkedin]">
            <?php  esc_html_e ('Footer Linkedin Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrlinkedin]" name="admania_theme_settings[admania_ftrlinkedin]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrlinkedin')  ); ?>" />
          <label for="admania_theme_settings[admania_ftrpinterest]">
            <?php  esc_html_e ('Footer Pinterest Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrpinterest]" name="admania_theme_settings[admania_ftrpinterest]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrpinterest')  ); ?>" />
          <label for="admania_theme_settings[admania_ftrstumble]">
            <?php  esc_html_e ('Footer StumbleUpon Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrstumble]" name="admania_theme_settings[admania_ftrstumble]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrstumble')  ); ?>" />
          <label for="admania_theme_settings[admania_ftrredit]">
            <?php  esc_html_e ('Footer Reddit Url:', 'admania'); ?>
          </label>
          <input size="70" id="admania_theme_settings[admania_ftrredit]" name="admania_theme_settings[admania_ftrredit]" type="text" value="<?php echo esc_url( admania_get_option('admania_ftrredit')  ); ?>" />
        </div>
      </div>
      <div class="admania_optionsetngitem">
        <h3>
          <?php  esc_html_e ( 'Footer Copyrighths Settings', 'admania' ); ?>
        </h3>
        <div class="admania_optionsinneritem">
          <label for="admania_theme_settings[admania_focopyrightscontent]">
            <?php  esc_html_e ('Footer Copyrights Content:', 'admania'); ?>
          </label>
          <textarea id="admania_theme_settings[admania_focopyrightscontent]" rows="4" cols="68" name="admania_theme_settings[admania_focopyrightscontent]"><?php echo esc_textarea(admania_get_option('admania_focopyrightscontent')); ?></textarea>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
    <?php 
  
    /*** Custom css Editor<*/ ?>
    <li data-content="admania_customcsssettings"> <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ('Custom css Editor', 'admania'); ?>
      </h2>
      <div class="admania_pannelsettings">
        <div class="admania_optionsetngitem">
          <h3>
            <?php  esc_html_e ( 'Custom Css Editor' , 'admania'); ?>
          </h3>
          <div class="admania_optionsinneritem">
            <?php /*Custom Css Editor*/?>
            <label for="admania_theme_settings[admania_customcss]">
              <?php  esc_html_e ( 'Css Editor', 'admania' ); ?>
            </label>
            <textarea id="admania_theme_settings[admania_customcss]" name="admania_theme_settings[admania_customcss]" rows="21" cols="68"><?php echo esc_textarea(admania_get_option('admania_customcss')); ?></textarea>
          </div>
        </div>
      </div>
      <?php echo wp_kses_stripslashes($admania_themeoptionssave); ?> </li>
  </ul>
</form>
<form method="post" action="#" class="rest_btn">
  <p class="submit admania_thembkdsubmittopnew">
    <input name="reset" class="button button-secondary" type="submit" value="<?php  esc_html_e ( 'Reset to theme default settings' , 'admania' ); ?>" onclick="return confirm('<?php echo esc_js( esc_html__('Are you sure you want to reset?', 'admania') ); ?>');"/>
    <input type="hidden" name="action" value="<?php  esc_html_e ( 'reset' , 'admania' ); ?>" />
  </p>
</form>
</div>

<!-- END wrap -->
<?php 
}	
endif;
?>
