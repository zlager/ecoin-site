<?php
/**
 * admania functions 
 *
 *
 @ package WordPress
 * @subpackage admania
 * @since Admania 1.0
 *
 *
 */
 
 
 /**
 *
 * Load the required functions
 *
 */
 
  require trailingslashit(get_template_directory()). '/lib/includes/admania-customtemp-tags.php';
  require trailingslashit(get_template_directory()). '/lib/includes/admania-custom-metabox.php'; 
  require trailingslashit(get_template_directory()). '/lib/includes/widgets/admania-recentpopularpost-widget.php';	
  require trailingslashit(get_template_directory()). '/lib/includes/widgets/admania-socialfollow-widget.php';	
  require trailingslashit(get_template_directory()). '/lib/includes/widgets/admania-optinbox-widget.php';	
  require trailingslashit(get_template_directory()). '/lib/includes/widgets/admania-aboutus-widget.php'; 
  require trailingslashit(get_template_directory()). '/lib/includes/widgets/admania-sticky-widget.php'; 
  require trailingslashit(get_template_directory()). '/lib/includes/widgets/admania-widget-categorypost.php';    
  require trailingslashit(get_template_directory()). '/lib/includes/admin/admania-themeoptions/admania-theme-settings.php'; 
  require trailingslashit(get_template_directory()). '/lib/includes/admin/admania-themeoptions/admania-import-export.php'; 
  require trailingslashit(get_template_directory()). '/lib/includes/admaniauser-profileplugins/active-plugin.php';
  require trailingslashit(get_template_directory()). '/lib/includes/admania-updates.php'; 
  if ( class_exists( 'Woocommerce' ) ) {
	//call the woocommerce for Pages
	require trailingslashit(get_template_directory()). '/lib/includes/woocm.php';	
 }
  
  
  /**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Admania 1.0
 */
 
if ( ! isset( $content_width ) ) {
	$content_width = 840;
}


add_action( 'after_setup_theme', 'admania_setup' );

/**
 * All setup functionalities.
 *
 * @since 1.0.4
 */
 
if( !function_exists( 'admania_setup' ) ) :

function admania_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'admania', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
	add_theme_support( 'post-thumbnails' );

    // Supporting title tag via add_theme_support (since WordPress 4.1)
    add_theme_support( 'title-tag' );
	
	add_theme_support( 'woocommerce' );

	/*
	* Enable support for custom-header
	*/
	add_theme_support( 'custom-header' );
	
	// wp link pages
	wp_link_pages( '' ); 
		/*
	* Enable support for add_editor_style
	*/
	add_editor_style( 'lib/includes/admin/css/editor-style.css' );


	// Registering navigation menus.
	register_nav_menus( array(
		'admania-primary-menu' 	=> esc_html__( 'Primary Menu','admania' ),
		'admania-secondary-menu' 	=> esc_html__( 'Secondary Menu','admania' ) 		
        
	) );
		
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'admania_custom_background_args', array(
		'default-color' => 'eaeaea'
	) ) );
	

   /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
   add_theme_support('html5', array(
       'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
   ));
   
    /*
	 * Enable support for Post Formats.
	 *
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
   
   add_action('widgets_init', 'admania_widgets_init' ); // Register  admania widget areas.   
   add_action('wp_enqueue_scripts', 'admania_enqueue_scripts');  
  
 
	
}

endif;


/*register the widget  */


if(! function_exists( 'admania_widgets_init' )):
 
function admania_widgets_init() {	
  
    $admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1'); 

   	
	/*register right sidebar widget  */

	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'admania' ),
		'id'            => 'admania-primary-sidebar',
		'description'   => esc_html__( 'primary sidebar that appears on the Right.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="admania_widgettit"><h3 class="widget-title admania_widgetsbrtit">',
		'after_title'   => '</h3></div>',
	) );
	
	
	if($admania_blog_layout == 'amblyt1' || $admania_blog_layout == 'amblyt4'):
	
	/*register Left sidebar widget  */

	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'admania' ),
		'id'            => 'admania-secondary-sidebar',
		'description'   => esc_html__( 'Secondary sidebar that appears on the Left.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="admania_widgettit"><h3 class="widget-title admania_widgetsbrtit">',
		'after_title'   => '</h3></div>',
	) );
		

	/*register Layout4 Secondary1 sidebar widget  */

	register_sidebar( array(
		'name'          => esc_html__( 'Layout4 Secondary1 Sidebar', 'admania' ),
		'id'            => 'admania-altsecondary-sidebar',
		'description'   => esc_html__( 'Layout4 Secondary1 sidebar that appears on the right.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="admania_widgettit"><h3 class="widget-title admania_widgetsbrtit">',
		'after_title'   => '</h3></div>',
	) );
	
	endif;
	
	
	if(class_exists('woocommerce')):
	
	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce right sidebar', 'admania' ),
		'id'            => 'admania-shoppagewidget',
		'description'   => esc_html__( 'Woocommerce sidebar that appears on the right.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="admania_widgettit"><h3 class="widget-title admania_widgetsbrtit">',
		'after_title'   => '</h3></div>',
	) );
	
	endif;
	
	/*register Footer widgets1  */

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget1', 'admania' ),
		'id'            => 'admania-footer-widget1',
		'description'   => esc_html__( 'Footer widget1 that appears on the left side in the footer section of site.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	/*register Footer widgets2  */

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget2', 'admania' ),
		'id'            => 'admania-footer-widget2',
		'description'   => esc_html__( 'Footer widget2 that appears on the middle side in the footer section of site.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		
	
	/*register Footer widgets3  */

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget3', 'admania' ),
		'id'            => 'admania-footer-widget3',
		'description'   => esc_html__( 'Footer widget3 that appears on the right side in the footer section of site.', 'admania' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}

endif;

/*
Register Google Fonts
*/

if(! function_exists( 'admania_fonts_url' )):

function admania_fonts_url() {
	
	if(admania_get_option('admania_googlefont') != false):
	$admania_googlefont = admania_get_option('admania_googlefont');
	else:
	$admania_googlefont = 'Oswald';
	endif;
	
	if(admania_get_option('admania_bodygooglefont') != false):
		$admania_bdygooglefont = admania_get_option('admania_bodygooglefont');
		else:
		$admania_bdygooglefont = 'Noto Sans';
		endif;
		
	
    $admania_fonturl = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'admania' ) ) {
        $admania_fonturl = add_query_arg( 'family', urlencode( ''.$admania_googlefont.'|'.$admania_bdygooglefont.':100,300,400,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return esc_url_raw($admania_fonturl);
}
		
endif;		
		
 
// Load Custom Js And style. 

if(! function_exists( 'admania_enqueue_scripts' )):

function admania_enqueue_scripts() {

       global $post,$admania_customcss,$admania_custom_script;

		$admania_customcss .= '';		
		$admania_pgepstadpgepstnslt2 = '';
		$admania_pgepstadenable3 = '';
		$admania_pstadenable3 = '';
		$admania_admargin = '';
		$admania_lvedtadalgn = '';
		$admania_pstadenable2 = '';
		$admania_admargin1 = '';
		$admania_admargin3 = '';
		$admania_adpscss1 = '';
		$admania_lvedtadalgn1 = '';
		$admania_pgepstadenable2 = '';
		$admania_admargin4 = '';
		$admania_pstadpstnslt2 = '';
		$admania_lvedtadaftrparaalgn1 = '';
		
	    $admania_blog_layout = ((admania_get_option('admania_blog_scheme')) ? admania_get_option('admania_blog_scheme') : 'amblyt1'); 
 	
		// Enqueue Theme Style

		$admania_dir_uri = get_template_directory_uri();	
	
		wp_enqueue_style( 'admania-fonts', admania_fonts_url(), array(), null );
	
		wp_enqueue_style('admania-style', get_stylesheet_uri());
		
		// Enqueue custom style for woocommerce
		if ( class_exists( 'Woocommerce' ) ) {
			wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/lib/includes/admin/css/woocm.css' );
		    if ( is_rtl() ):
			   wp_enqueue_style( 'woocommercertl', get_template_directory_uri() . '/lib/includes/admin/css/woocmrtl.css' );
		    endif;
		}
    	
		// Enqueue Theme Inline-Style
		
		if(is_single()) {
		$admania_pstadenable2 = get_post_meta($post->ID, '_admania_pstadenable2', true);
		$admania_pstadenable3 = get_post_meta($post->ID, '_admania_pstadenable3', true);
		$admania_pstadpstnslt1 = get_post_meta($post->ID, '_admania_pstadpstnslt1', true);
		$admania_pstadpstnslt2 = get_post_meta($post->ID, '_admania_pstadpstnslt2', true);
		}
		elseif(is_page()) {
		$admania_pgepstadenable3 = get_post_meta($post->ID, '_admania_pgepstadenable3', true);
		$admania_pgepstadenable2 = get_post_meta($post->ID, '_admania_pgepstadenable2', true);
		$admania_pgepstadpgepstnslt1 = get_post_meta($post->ID, '_admania_pgepstadpgepstnslt1', true);
		$admania_pgepstadpgepstnslt2 = get_post_meta($post->ID, '_admania_pgepstadpgepstnslt2', true);
		}

		$admania_customcss .= "
		h1 {
		font-weight:normal;
		font-family:".esc_html((admania_get_option('admania_googlefont')) ? admania_get_option('admania_googlefont') : 'Oswald')." !important;
		font-size:".esc_html((admania_get_option('headeroneadmania_fontsize')) ? admania_get_option('headeroneadmania_fontsize') : "38px").";
		line-height:".esc_html((admania_get_option('admania_headeronelineheight')) ? admania_get_option('admania_headeronelineheight') : "47px").";
		}\r\n";
		$admania_customcss .= "
		h2 {
		font-weight:normal;
		font-family:".esc_html((admania_get_option('admania_googlefont')) ? admania_get_option('admania_googlefont') : 'Oswald')." !important;
		font-size:".esc_html((admania_get_option('headertwoadmania_fontsize')) ? admania_get_option('headertwoadmania_fontsize') : "32px").";
		line-height:".esc_html((admania_get_option('admania_headertwolineheight')) ? admania_get_option('admania_headertwolineheight') : "41px").";
		}\r\n";
		$admania_customcss .= "
		h3 {
		font-weight:normal;
		font-family:".esc_html((admania_get_option('admania_googlefont')) ? admania_get_option('admania_googlefont') : 'Oswald')." !important;
		font-size:".esc_html((admania_get_option('headerthreeadmania_fontsize')) ? admania_get_option('headerthreeadmania_fontsize') : "28px").";
		line-height:".esc_html((admania_get_option('admania_headerthreelineheight')) ? admania_get_option('admania_headerthreelineheight') : "32px").";
		}\r\n";
		$admania_customcss .= "
		h4 {
		font-weight:normal;
		font-family:".esc_html((admania_get_option('admania_googlefont')) ? admania_get_option('admania_googlefont') : 'Oswald')." !important;
		font-size:".esc_html((admania_get_option('headerfouradmania_fontsize')) ? admania_get_option('headerfouradmania_fontsize') : "24px").";
		line-height:".esc_html((admania_get_option('admania_headerfourlineheight')) ? admania_get_option('admania_headerfourlineheight') : "30px").";
		}\r\n";
		$admania_customcss .= "
		h5 {
		font-weight:normal;
		font-family:".esc_html((admania_get_option('admania_googlefont')) ? admania_get_option('admania_googlefont') : 'Oswald')." !important;
		font-size:".esc_html((admania_get_option('headerfiveadmania_fontsize')) ? admania_get_option('headerfiveadmania_fontsize') : "20px").";
		line-height:".esc_html((admania_get_option('admania_headerfivelineheight')) ? admania_get_option('admania_headerfivelineheight') : "28px").";
		}\r\n";
		$admania_customcss .= "
		h6 {
		font-weight:normal;
		font-family:".esc_html((admania_get_option('admania_googlefont')) ? admania_get_option('admania_googlefont') : 'Oswald')." !important;
		font-size:".esc_html((admania_get_option('headersixadmania_fontsize')) ? admania_get_option('headersixadmania_fontsize') : "17px").";
		line-height:".esc_html((admania_get_option('admania_headersixlineheight')) ? admania_get_option('admania_headersixlineheight') : "25px").";
		}\r\n";
		$admania_customcss .= "
		body {
			font-family:".esc_html((admania_get_option('admania_bodygooglefont')) ? admania_get_option('admania_bodygooglefont') : 'Noto Sans').";color:". ((admania_get_option('fontcolor')) ? admania_get_option('fontcolor') :'#282828')." ;
			background: ".esc_html((admania_get_option('backgroundcolor')) ? admania_get_option('backgroundcolor') : '#ffffff'). ";font-size: ". ((admania_get_option('fontsize')) ? admania_get_option('fontsize') :'15px').";
			line-height:".esc_html((admania_get_option('lineheight')) ? admania_get_option('lineheight') : "25px").";
		}\r\n";

		$admania_customcss.= "
		.admania_entrycontent a {
		color: ".esc_html((admania_get_option('admania_postcontentlinkcolor')) ? admania_get_option('admania_postcontentlinkcolor') : "#858181")." !important;
		text-decoration:".esc_html((admania_get_option('admania_linktype')) ? admania_get_option('admania_linktype') : "underline")." !important;
		}\r\n";


		$admania_customcss.= ".admania_entrycontent a:hover {color: ".esc_html((admania_get_option('admania_postcontentlinkhovercolor')) ? admania_get_option('admania_postcontentlinkhovercolor') : "#47a7d7")." !important;}\r\n";

		$admania_customcss .= "h1,h2,h3,h4,h5,h6 {color:".esc_html((admania_get_option('headerfontcolor')) ? admania_get_option('headerfontcolor') :'#222').";text-transform: ".esc_html((admania_get_option('admania_hdonetrfrm')) ? admania_get_option('admania_hdonetrfrm') :'none').";}\r\n";

		$admania_customcss .= ".admania_headertopalt,.admania_headerbtm {box-shadow: 2px 2px 5px ".esc_html((admania_get_option('admania_hdrtpbxclr')) ? admania_get_option('admania_hdrtpbxclr') : "#e3e3e3").";border-bottom: 1px solid ".esc_html((admania_get_option('admania_hdrtpbdrbtmclr')) ? admania_get_option('admania_hdrtpbdrbtmclr') : "#dddddd").";}\r\n";

		$admania_customcss .= ".admania_headertopsocial li a {color:".esc_html((admania_get_option('admania_hdrtpsclclr')) ? admania_get_option('admania_hdrtpsclclr') :'#111').";}\r\n";

		$admania_customcss .= ".admania_headerinneralt,.admania_menu .menu .sub-menu { background-color:".esc_html((admania_get_option('admania_hdrbtmbgclr')) ? admania_get_option('admania_hdrbtmbgclr') :'#222').";}\r\n";
		
		$admania_customcss .= ".admania_headersearchform .search-form  input[type=\"search\"] {background:".esc_html((admania_get_option('admania_srchtxtbgclr')) ? admania_get_option('admania_srchtxtbgclr') :'#252424').";color:".esc_html((admania_get_option('admania_srchtxtclr')) ? admania_get_option('admania_srchtxtclr') :'#fff').";}\r\n";
		
		$admania_customcss .= ".admania_headersearchform .search-form input[type=\"search\"]::-webkit-input-placeholder {color:".esc_html((admania_get_option('admania_srchtxtclr')) ? admania_get_option('admania_srchtxtclr') :'#fff').";}\r\n";
		
		$admania_customcss .= ".admania_headersearchform .search-form input[type=\"search\"]::-moz-placeholder {color:".esc_html((admania_get_option('admania_srchtxtclr')) ? admania_get_option('admania_srchtxtclr') :'#fff').";}\r\n";
		
		$admania_customcss .= ".admania_headersearchform .search-form input[type=\"search\"]::-ms-input-placeholder {color:".esc_html((admania_get_option('admania_srchtxtclr')) ? admania_get_option('admania_srchtxtclr') :'#fff')."; }\r\n";
		
		$admania_customcss .= ".admania_headersearchform .search-form input[type=\"submit\"] {background-color:".esc_html((admania_get_option('admania_srchtxtbgclr')) ? admania_get_option('admania_srchtxtbgclr') :'#252424').";}\r\n";

		$admania_customcss .= ".admania_slidercat,.admania_cat, .admania_featcatlist a,.owl-prev, .owl-next {background:".esc_html((admania_get_option('admania_catbgclr')) ? admania_get_option('admania_catbgclr') :'#fff').";color:".esc_html((admania_get_option('admania_cattxtclr')) ? admania_get_option('admania_cattxtclr') :'#111').";}\r\n";

		$admania_customcss .= ".admania_slidercontent h2 a,.admania_slidercontent {color:".esc_html((admania_get_option('admania_sldrhdclr')) ? admania_get_option('admania_sldrhdclr') :'#fff').";}\r\n";

		$admania_customcss .= ".reply a,.admania_top a,input[type=\"reset\"], input[type=\"button\"], input[type=\"submit\"], button {background:".esc_html((admania_get_option('admania_thmebtnclr')) ? admania_get_option('admania_thmebtnclr') :'#47a7d7').";color:".esc_html((admania_get_option('admania_thmetxtbtnclr')) ? admania_get_option('admania_thmetxtbtnclr') :'#fff').";}\r\n";

		$admania_customcss .= ".admania_slidercat4 a {color:".esc_html((admania_get_option('admania_thmebtnclr')) ? admania_get_option('admania_thmebtnclr') :'#47a7d7')." !important;}\r\n";
		
		$admania_customcss .= ".reply a:hover,.admania_top a:hover,input[type=\"reset\"]:hover, input[type=\"button\"]:hover, input[type=\"submit\"]:hover, button:hover {background:".esc_html((admania_get_option('admania_thmebtnhvclr')) ? admania_get_option('admania_thmebtnhvclr') :'#2a2a2a').";color:".esc_html((admania_get_option('admania_thmetxtbtnhvclr')) ? admania_get_option('admania_thmetxtbtnhvclr') :'#fff').";}\r\n";

		$admania_customcss .= "a{color:".esc_html((admania_get_option('admania_linkclr')) ? admania_get_option('admania_linkclr') :'#858181').";}\r\n";

		$admania_customcss .= "a:hover,.admania_ly2ftsection h2 a:hover,.admania_headertopsocial li a:hover, .admania_slidercontent h2 a:hover, .admania_ftrattbtontop .admania_fbflw:hover, .admania_ftrattbtontop .admania_twtflw:hover, .admania_ftrattbtontop .admania_lnkflw:hover, .widget .admania_socialiconfb:hover, .widget .admania_socialiconlnk:hover, .widget .admania_socialicontwt:hover {color:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7').";}\r\n";

		$admania_customcss .= ".admanialayt5_entryfooter a { background-color:".esc_html((admania_get_option('admania_layt5thmecntrdbgclr')) ? admania_get_option('admania_layt5thmecntrdbgclr') :'#222').";color:".esc_html((admania_get_option('admania_layt5thmecntrdtxtclr')) ? admania_get_option('admania_layt5thmecntrdtxtclr') :'#fff').";}\r\n";
				
		$admania_customcss .= ".admania_slidercontent4 h2 a:hover,.admanialayt5_entryheader a:hover { color:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7')." !important;}\r\n";
	
		$admania_customcss .=".admania_pagelinks .admania_pglnlksaf:hover, .admania_pagination .page-numbers:hover {background:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7').";border:1px solid".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7').";color:".esc_html((admania_get_option('admania_thmetxtbtnhvclr')) ? admania_get_option('admania_thmetxtbtnhvclr') :'#fff').";}\r\n";

		$admania_customcss .=".admania_readmorelink a ,.admania_stickypost {background:".esc_html((admania_get_option('admania_thmecntrdbgclr')) ? admania_get_option('admania_thmecntrdbgclr') :'#f9f9f9').";color:".esc_html((admania_get_option('admania_thmecntrdtxtclr')) ? admania_get_option('admania_thmecntrdtxtclr') :'#a59e9e').";}\r\n";

		$admania_customcss .=".admania_readmorelink a:hover,.admanialayt5_entryfooter a:hover,.admanialayt5_entryfooter a:hover,.owl-next:hover,.owl-prev:hover,#admania_owldemo1 .owl-prev:hover ~ .owl-next,#admania_owldemo1 .admania_nxtishover .owl-prev,#admania_owldemo1 .owl-prev:hover,#admania_owldemo1 .owl-next:hover{background:".esc_html((admania_get_option('admania_thmecntrdbghvclr')) ? admania_get_option('admania_thmecntrdbghvclr') :'#47a7d7').";color:".esc_html((admania_get_option('admania_thmecntrdtxthvclr')) ? admania_get_option('admania_thmecntrdtxthvclr') :'#fff').";}\r\n";

		$admania_customcss .=".admania_menu li a:hover {background-color:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7').";color:".esc_html((admania_get_option('admania_thmetxtbtnhvclr')) ? admania_get_option('admania_thmetxtbtnhvclr') :'#fff').";}\r\n";

		$admania_customcss .=".admania_postoptionbox {background:".esc_html((admania_get_option('admania_postoptintopbgcolor')) ? admania_get_option('admania_postoptintopbgcolor') :'#fbfbfb').";border: 1px solid ".esc_html((admania_get_option('admania_postoptintopbgbdrcolor')) ? admania_get_option('admania_postoptintopbgbdrcolor') :'#eee').";}\r\n";

		$admania_customcss .=".admania_postoptionbox input[type=\"text\"] {background:".esc_html((admania_get_option('backgroundcolor')) ? admania_get_option('backgroundcolor') : '#ffffff').";border: 1px solid ".esc_html((admania_get_option('admania_postoptintopbgbdrcolor')) ? admania_get_option('admania_postoptintopbgbdrcolor') :'#eee').";}\r\n";

		$admania_customcss .=".bypostauthor {border-left: 1px solid ".esc_html((admania_get_option('admania_thmecntrdbghvclr')) ? admania_get_option('admania_thmecntrdbghvclr') :'#47a7d7').";}\r\n";

		$admania_customcss .=" .admania_nocomments,.admania_commentlist li { background: ".esc_html((admania_get_option('admania_pstcmtbgclr')) ? admania_get_option('admania_pstcmtbgclr') :'#f7f7f7').";}\r\n";

		$admania_customcss .=".admania_entrymeta a,.admania_gridentry .admania_entrymetablne a:hover,.admania_breadcrumb a,.admania_entrybyline a,.admania_aboutreadmore { color:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7').";}\r\n";

		$admania_customcss .=".admania_entrymeta a:hover,.admania_gridentry .admania_entrymetablne a,.admania_breadcrumb a:hover,.admania_aboutreadmore:hover,.admania_entrybyline a:hover { color:".esc_html((admania_get_option('admania_linkclr')) ? admania_get_option('admania_linkclr') :'#858181').";}\r\n";
		
		$admania_customcss .=".admania_headertoplayt3,.admania_headertoplayt5_top { background-color:".esc_html((admania_get_option('admania_layt3bgcolor')) ? admania_get_option('admania_layt3bgcolor') :'#1d1d1d').";}\r\n";
		
        $admania_customcss .=".admania_gridpstlayt3 .admania_gridpost_entryfooter .admania_pstrdmr { color:".esc_html((admania_get_option('admania_layt3thmecntrdtxtclr')) ? admania_get_option('admania_layt3thmecntrdtxtclr') :'#222').";}\r\n";
		
		$admania_customcss .=".admania_headermidlayt3 { background-color:".esc_html((admania_get_option('admania_layt3midbgcolor')) ? admania_get_option('admania_layt3midbgcolor') :'#f7f7f7').";}\r\n";
						
		$admania_customcss .= ".admania_menu li a {color:".esc_html((admania_get_option('admania_primarynavclr')) ? admania_get_option('admania_primarynavclr') :'#fff').";}\r\n";
	
		$admania_customcss .=".admania_lay2headerright .menu li a,.admania_lay4_menu li a  {color:".esc_html((admania_get_option('admania_layt2navtxtcolor')) ? admania_get_option('admania_layt2navtxtcolor') :'#222222').";}\r\n";
		
        $admania_customcss .= ".admania_lay4_menu .sub-menu li a {color:".esc_html((admania_get_option('admania_primarynavclr')) ? admania_get_option('admania_primarynavclr') :'#fff').";}\r\n";
	
	    $admania_customcss .= ".admania_gridpstlayt3 .admania_gridpost_entryfooter .admania_pstrdmr:hover,.admania_slidercontent5 h2 a:hover,.admania_slidermetaby5 a:hover { color:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7')." !important;}\r\n";
		
      	if((admania_get_option('layt4_cnt_frstlaytlstsdbr') == 1)){
		$admania_customcss .= ".admania_layout1contentareainner {width: 100%;padding: 0px 0px 0px 0px;} \r\n";
		$admania_customcss .= ".admania_entrymetablne {left: 20px;} \r\n";			
		}
		
		if((admania_get_option('layt4_cnt_lstsdbr') == 1)) {
		$admania_customcss .= ".admania_layout4postright,.admania_layout4contentareainner {width: 100%;padding: 0px 0px 0px 0px;} \r\n";
		}		
		
		if(admania_get_option('layt4_cnt_rgtsdbr') == 1) {
		$admania_customcss .= ".admania_layout4postrightleft {width: 100%;padding: 0px 0px 0px 0px;} \r\n";
		}		
				
		if(((admania_get_option('admania_hdfacebook') == '') && (admania_get_option('admania_hdtwitter') == '') && (admania_get_option('admania_hdgoogleplus') == '') && (admania_get_option('admania_hdlinkedin') == '') && (admania_get_option('admania_hdyoutube') == '') && (admania_get_option('admania_hdinstagram') == '') && (admania_get_option('admania_hdpinterest') == '') && (admania_get_option('admania_hdrss') == ''))) {
		$admania_customcss .=".admania_headertopalt {display:none;}\r\n";
		}

		if((admania_get_lveditoption('hdr_lvedlhtmlad11')) || (admania_get_lveditoption('hdr_lvedlglead11')) || (admania_get_lveditoption('admania_lvedtrimgtg_url11')) || (admania_get_lveditoption('admania_lvedtimg_url11'))) {

		if((admania_get_lveditoption('frnt_lvedtralignpsttp') == 'none')):

		$admania_lvedtadalgn = '0px';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp') == 'left')):

		$admania_lvedtadalgn = '10px 25px 0px 0';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp') == 'right')):

		$admania_lvedtadalgn = '10px 0px 0px 25px';

		endif;


		$admania_customcss .= ".admania_postinnerad1 {float:". esc_html((admania_get_lveditoption('frnt_lvedtralignpsttp')) ? admania_get_lveditoption('frnt_lvedtralignpsttp'):'none').";margin:".esc_html($admania_lvedtadalgn).";}\r\n";


		}

		else {

		if($admania_pstadenable2 != false) {

		if(($admania_pstadpstnslt1 == 'none')):

		$admania_admargin = '0px';

		elseif(($admania_pstadpstnslt1 == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif(($admania_pstadpstnslt1 == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_postinnerad1 {float:". esc_html(($admania_pstadpstnslt1) ? $admania_pstadpstnslt1 :'none').";margin:".esc_html($admania_admargin).";}\r\n";

		}

		else {

		if(admania_get_option('sngle_pstinrtphtmlad') != '') {

		if((admania_get_option('sngle_pstinrtpadalgn1') == 'none')):

		$admania_admargin = '0px';

		elseif((admania_get_option('sngle_pstinrtpadalgn1') == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif((admania_get_option('sngle_pstinrtpadalgn1') == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_postinnerad1 {float:". esc_html((admania_get_option('sngle_pstinrtpadalgn1')) ? admania_get_option('sngle_pstinrtpadalgn1') :'none').";margin:".esc_html($admania_admargin).";}\r\n";

		}

		if(admania_get_option('sngle_pstinrtpgglead') != '') {

		if((admania_get_option('sngle_pstinrtpadalgn2') == 'none')):

		$admania_admargin = '0px';

		elseif((admania_get_option('sngle_pstinrtpadalgn2') == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif((admania_get_option('sngle_pstinrtpadalgn2') == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_postinnerad1 {float:". esc_html((admania_get_option('sngle_pstinrtpadalgn2')) ? admania_get_option('sngle_pstinrtpadalgn2') :'none').";margin:".esc_html($admania_admargin).";} \r\n";

		}

		if((admania_get_option('admania_adimg_url12') != '') || (admania_get_option('admania_adimgtg_url12'))) {


		if((admania_get_option('sngle_pstinrtpadalgn3') == 'none')):

		$admania_admargin = '0px';

		elseif((admania_get_option('sngle_pstinrtpadalgn3') == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif((admania_get_option('sngle_pstinrtpadalgn3') == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_postinnerad1 {float:". esc_html((admania_get_option('sngle_pstinrtpadalgn3')) ? admania_get_option('sngle_pstinrtpadalgn3') :'none').";margin:".esc_html($admania_admargin).";}\r\n";

		}
		}

		}




		if($admania_pgepstadenable2 != false) {

		if(($admania_pgepstadpgepstnslt1 == 'none')):

		$admania_admargin = '0px';

		elseif(($admania_pgepstadpgepstnslt1 == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif(($admania_pgepstadpgepstnslt1 == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_postinnerad1 {float:". esc_html(($admania_pgepstadpgepstnslt1) ? $admania_pgepstadpgepstnslt1 :'none').";margin:".esc_html($admania_admargin).";}\r\n";

		}

		if((admania_get_lveditoption('hdr_lvedlhtmlad12')) || (admania_get_lveditoption('hdr_lvedlglead12')) || (admania_get_lveditoption('admania_lvedtrimgtg_url12')) || (admania_get_lveditoption('admania_lvedtimg_url12'))) {

		if((admania_get_lveditoption('frnt_lvedtralignpsttp1') == 'none')):

		$admania_admargin1 = '0px';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp1') == 'left')):

		$admania_admargin1 = '10px 25px 0px 0';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp1') == 'right')):

		$admania_admargin1 = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_aftrnthprad {float:". esc_html((admania_get_lveditoption('frnt_lvedtralignpsttp1')) ? admania_get_lveditoption('frnt_lvedtralignpsttp1'):'none').";margin:".($admania_admargin1).";} \r\n";

		}

		else {

		if($admania_pstadenable3 != false) {

		if(($admania_pstadpstnslt2 == 'none')):

		$admania_admargin1 = '0px';

		elseif(($admania_pstadpstnslt2 == 'left')):

		$admania_admargin1 = '10px 25px 0px 0';

		elseif(($admania_pstadpstnslt2 == 'right')):

		$admania_admargin1 = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_aftrnthprad {float:". esc_html(($admania_pstadpstnslt2) ? $admania_pstadpstnslt2:'none').";margin:".($admania_admargin1).";} \r\n";

		}

		else {

		if((admania_get_option('sngle_pstaftrnthpadalgn4') == 'none')):

		$admania_admargin1 = '0px';

		elseif((admania_get_option('sngle_pstaftrnthpadalgn4') == 'left')):

		$admania_admargin1 = '10px 25px 0px 0';

		elseif((admania_get_option('sngle_pstaftrnthpadalgn4') == 'right')):

		$admania_admargin1 = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_aftrnthprad  {float:". esc_html((admania_get_option('sngle_pstaftrnthpadalgn4')) ? admania_get_option('sngle_pstaftrnthpadalgn4'):'none').";margin:".($admania_admargin1).";} \r\n";

		}
		}




		if((admania_get_lveditoption('hdr_lvedlhtmlad18')) || (admania_get_lveditoption('hdr_lvedlglead18')) || (admania_get_lveditoption('admania_lvedtimg_url18'))) {

		if((admania_get_lveditoption('frnt_lvedtralignpsttp3') == 'none')):

		$admania_lvedtadalgn1 = '0px';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp3') == 'left')):

		$admania_lvedtadalgn1 = '10px 25px 0px 0';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp3') == 'right')):

		$admania_lvedtadalgn1 = '10px 0px 0px 25px';

		endif;


		$admania_customcss .= ".admania_pageinnertopad1 {float:". esc_html((admania_get_lveditoption('frnt_lvedtralignpsttp3')) ? admania_get_lveditoption('frnt_lvedtralignpsttp3'):'none').";margin:".esc_html($admania_lvedtadalgn1).";}\r\n";


		}

		else {

		if(admania_get_option('page_pstinrtphtmlad') != '') {

		if((admania_get_option('page_pstinrtpadalgn1') == 'none')):

		$admania_admargin = '0px';

		elseif((admania_get_option('page_pstinrtpadalgn1') == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif((admania_get_option('page_pstinrtpadalgn1') == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_pageinnertopad1 {float:". esc_html((admania_get_option('page_pstinrtpadalgn1')) ? admania_get_option('page_pstinrtpadalgn1') :'none').";margin:".esc_html($admania_admargin).";}\r\n";

		}

		if(admania_get_option('page_pstinrtpgglead') != '') {

		if((admania_get_option('page_pstinrtpadalgn2') == 'none')):

		$admania_admargin = '0px';

		elseif((admania_get_option('page_pstinrtpadalgn2') == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif((admania_get_option('page_pstinrtpadalgn2') == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_pageinnertopad1 {float:". esc_html((admania_get_option('page_pstinrtpadalgn2')) ? admania_get_option('page_pstinrtpadalgn2') :'none').";margin:".esc_html($admania_admargin).";} \r\n";

		}

		if((admania_get_option('admania_adimg_url19') != '') || (admania_get_option('admania_adimgtg_url19'))) {


		if((admania_get_option('page_pstinrtpadalgn3') == 'none')):

		$admania_admargin = '0px';

		elseif((admania_get_option('page_pstinrtpadalgn3') == 'left')):

		$admania_admargin = '10px 25px 0px 0';

		elseif((admania_get_option('page_pstinrtpadalgn3') == 'right')):

		$admania_admargin = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_pageinnertopad1 {float:". esc_html((admania_get_option('page_pstinrtpadalgn3')) ? admania_get_option('page_pstinrtpadalgn3') :'none').";margin:".esc_html($admania_admargin).";}\r\n";

		}
		}



		if((admania_get_lveditoption('hdr_lvedlhtmlad19')) || (admania_get_lveditoption('hdr_lvedlglead19')) || (admania_get_lveditoption('admania_lvedtimg_url19'))) {

		if((admania_get_lveditoption('frnt_lvedtralignpsttp4') == 'none')):

		$admania_lvedtadaftrparaalgn1 = '0px';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp4') == 'left')):

		$admania_lvedtadaftrparaalgn1 = '10px 25px 0px 0';

		elseif((admania_get_lveditoption('frnt_lvedtralignpsttp4') == 'right')):

		$admania_lvedtadaftrparaalgn1 = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_pgaftrnthprad {float:". esc_html((admania_get_lveditoption('frnt_lvedtralignpsttp4')) ? admania_get_lveditoption('frnt_lvedtralignpsttp4'):'none').";margin:".($admania_lvedtadaftrparaalgn1).";} \r\n";

		}
		else{


		if($admania_pgepstadenable3 != false) {

		if(($admania_pgepstadpgepstnslt2 == 'none')):

		$admania_admargin4 = '0px';

		elseif(($admania_pgepstadpgepstnslt2 == 'left')):

		$admania_admargin4 = '10px 25px 0px 0';

		elseif(($admania_pgepstadpgepstnslt2 == 'right')):

		$admania_admargin4 = '10px 0px 0px 25px';

		endif;


		$admania_customcss .= ".admania_pgaftrnthprad {float:". esc_html(($admania_pgepstadpgepstnslt2) ? $admania_pgepstadpgepstnslt2:'none').";margin:".($admania_admargin4).";} \r\n";

		}

		else {

		if((admania_get_option('page_pstaftrnthpadalgn4') == 'none')):

		$admania_admargin3 = '0px';

		elseif((admania_get_option('page_pstaftrnthpadalgn4') == 'left')):

		$admania_admargin3 = '10px 25px 0px 0';

		elseif((admania_get_option('page_pstaftrnthpadalgn4') == 'right')):

		$admania_admargin3 = '10px 0px 0px 25px';

		endif;

		$admania_customcss .= ".admania_pgaftrnthprad {float:". esc_html((admania_get_option('page_pstaftrnthpadalgn4')) ? admania_get_option('page_pstaftrnthpadalgn4') :'none').";margin:".($admania_admargin3).";} \r\n";

		}

		}


		if((admania_get_option('hdr_adtplft_act1') == true) && (admania_get_option('hdr_adtprgt_act1') != true)) {
		$admania_customcss .= ".admanina_afterheaderad {text-align:center;} \r\n";
		$admania_customcss .= ".admanina_afterheaderadleft {float:none;width:100%} \r\n";
		}
		
		if(((admania_get_option('admania_custom_logo') == true) && ($admania_blog_layout == 'amblyt5'))) {
		$admania_customcss .= ".admania_sitetitle {padding: 0 0 0px;} \r\n";
        }
		
		$admania_customcss .=".admania_headertoplayt5 .admania_menu li a:hover,.admania_lay5_menu .menu .current-menu-item > a {background-color:transparent;color:".esc_html((admania_get_option('admania_lnkhvclr')) ? admania_get_option('admania_lnkhvclr') :'#47a7d7')."!important;}\r\n";
		
				
		if(admania_get_option('wholelayoutwidth') != '') {
		$admania_customcss .= ".admania_siteinner,.admania_sitefooterinner,.admania_headerinner {width:".esc_html((admania_get_option('wholelayoutwidth')) ? admania_get_option('wholelayoutwidth') :'1200')."px;} \r\n";
		}
			
	

		$admania_customcss .= " 
		@media screen and (max-width:".((admania_get_option('wholelayoutwidth')) ? admania_get_option('wholelayoutwidth') : '1200')."px) {
		.admania_siteinner, 
		.admania_sitefooterinner, 
		.admania_headerbtminner, 
		.admania_headerinner {
		width:100%;
		padding: 0 20px;
		}
		.search-form label {
			width: 68%;
		}
		.admania_lay2headerright .menu li a {
			font-size: 16px;
			padding: 18px 15px;
			color:#fff;
		}
		
				
		.admania_layout5gridpst {
		margin: 0 3% 3% 0;
	   }

		.admania_gridentry {
		width: 47.1%;
		}

		.admania_featcatlist {
			width: 30%;
		}

		.admania_featcatlist a {
			padding: 4px 14px;
			font-size: 13px;
		}

		.admanina_afterheaderadleft {
		width: 72%;
		}

		.admanina_afterheaderadright {
			width: 25%;
		}

		.admania_optin {
			padding: 27px 25px;
		}

		}\r\n";


		$admania_customcss .= "".wp_filter_nohtml_kses(admania_get_option('admania_customcss'))."\r\n";


	wp_add_inline_style('admania-style', $admania_customcss);
		
   if (!is_admin()) {

	
	// Enqueue Theme Javascript  		   
		 	
	wp_enqueue_script('admaniacustom', $admania_dir_uri . '/js/admaniacustom.js', array('jquery'), null, true); 	
	wp_localize_script( 'admaniacustom', 'admaniastchk', array(
		'admania_chkdisplay'   => is_single(),
		'admania_chksptoptions' => $admania_blog_layout,
	));	

  
    
	if (is_single() || is_page()) {
            wp_enqueue_script('comment-reply');
    }

    if (current_user_can('administrator')) {
   	wp_enqueue_style( 'wp-color-picker');
	if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
	}
	else{
    wp_enqueue_style('thickbox');
	}
	wp_enqueue_script( 'wp-color-picker');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
    }  	
  
    }	 
   
}
endif;



