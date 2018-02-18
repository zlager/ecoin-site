<?php
 /**
 *Admania popular post Widget
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */
 
 
 	if(! function_exists( 'admania_popular_post' )):
	function admania_popular_post() {
	register_widget( 'admania_popular_post' );
	}
	endif;
	add_action( 'widgets_init', 'admania_popular_post' );
 
 if(!class_exists('admania_popular_post')):
class admania_popular_post extends WP_Widget { 

function __construct() {
parent::__construct('admania_popular_post',esc_html__('Admania - Recent Popular Post', 'admania'), // Name
array('description' => esc_html__('Recent Popular Post', 'admania'),)
);
}


public function form($admania_instance) {
isset($admania_instance['title']) ? $admania_title = $admania_instance['title'] : null;
empty($admania_instance['title']) ? $admania_title = 'Recent popular post' : null;		
isset($admania_instance['postperpage']) ? $admania_postperpage = $admania_instance['postperpage'] : null;
isset($admania_instance['imgwidth']) ? $admania_imgwidth = $admania_instance['imgwidth'] : null;			
isset($admania_instance['imageheight']) ? $admania_imageheight = $admania_instance['imageheight'] : null;
isset($admania_instance['defaultimage']) ? $admania_defaultimage = $admania_instance['defaultimage'] : null;
isset($admania_instance['forcomment']) ? $forcomment = $admania_instance['forcomment'] : null;
isset($admania_instance['formcomment']) ? $formcomment = $admania_instance['formcomment'] : null;
isset($admania_instance['forycomment']) ? $forycomment = $admania_instance['forycomment'] : null;
isset($admania_instance['formostviewpost']) ? $formostviewpost = $admania_instance['formostviewpost'] : null;
isset($admania_instance['formmostviewpost']) ? $formmostviewpost = $admania_instance['formmostviewpost'] : null;
isset($admania_instance['forymostviewpost']) ? $forymostviewpost = $admania_instance['forymostviewpost'] : null;
isset($admania_instance['dsble_auhrpschk']) ? $dsble_auhrpschk = $admania_instance['dsble_auhrpschk'] : null;
isset($admania_instance['dsble_datepschk']) ? $dsble_datepschk = $admania_instance['dsble_datepschk'] : null;



?>

<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
    <?php  esc_html_e ('Title:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($admania_title); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('postperpage')); ?>">
    <?php  esc_html_e ('Enter The No of posts:' , 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('postperpage')); ?>" name="<?php echo esc_attr($this->get_field_name('postperpage')); ?>" type="text" value="<?php echo esc_attr(!empty($admania_postperpage) ? $admania_postperpage:''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('defaultimage')); ?>">
    <?php  esc_html_e ('Default Image Url:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('defaultimage')); ?>" name="<?php echo esc_attr($this->get_field_name('defaultimage')); ?>" type="text" value="<?php echo esc_attr(!empty($admania_defaultimage) ? $admania_defaultimage : ''); ?>">
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('forcomment')); ?>">
    <?php  esc_html_e ('for Comment:' , 'admania' ); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('forcomment')); ?>" name="<?php echo esc_attr($this->get_field_name('forcomment')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($forcomment)) ? $forcomment : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('formcomment')); ?>">
    <?php  esc_html_e ('for  Displaying current monthly Comments :', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('formcomment')); ?>" name="<?php echo esc_attr($this->get_field_name('formcomment')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($formcomment)) ? $formcomment : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('forycomment')); ?>">
    <?php  esc_html_e ('for  Displaying current yearly Comments :', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('forycomment')); ?>" name="<?php echo esc_attr($this->get_field_name('forycomment')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($forycomment)) ? $forycomment : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('formostviewpost')); ?>">
    <?php  esc_html_e ('for  Displaying Most view Posts:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('formostviewpost')); ?>" name="<?php echo esc_attr($this->get_field_name('formostviewpost')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($formostviewpost)) ? $formostviewpost : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('formmostviewpost')); ?>">
    <?php  esc_html_e ('for  Displaying Monthly Most viewed Posts:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('formmostviewpost')); ?>" name="<?php echo esc_attr($this->get_field_name('formmostviewpost')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($formmostviewpost)) ? $formmostviewpost : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('forymostviewpost')); ?>">
    <?php  esc_html_e ('for  Displaying Yearly Most viewed Posts:', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('forymostviewpost')); ?>" name="<?php echo esc_attr($this->get_field_name('forymostviewpost')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($forymostviewpost)) ? $forymostviewpost : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('dsble_auhrpschk')); ?>">
    <?php  esc_html_e ('Disable by line author post name', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dsble_auhrpschk')); ?>" name="<?php echo esc_attr($this->get_field_name('dsble_auhrpschk')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($dsble_auhrpschk)) ? $dsble_auhrpschk : '' ); ?>>
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('dsble_datepschk')); ?>">
    <?php  esc_html_e ('Disable by line post date', 'admania'); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr($this->get_field_id('dsble_datepschk')); ?>" name="<?php echo esc_attr($this->get_field_name('dsble_datepschk')); ?>" type="checkbox" value="1" <?php checked( '1', (!empty($dsble_datepschk)) ? $dsble_datepschk : '' ); ?>>
</p>
<?php
}

public function update($admania_newinstance, $admania_oldinstance) {
$admania_instance = array();
$admania_instance['title'] = (!empty($admania_newinstance['title']) ) ? strip_tags($admania_newinstance['title']) : '';		
$admania_instance['postperpage'] = (!empty($admania_newinstance['postperpage']) ) ? strip_tags($admania_newinstance['postperpage']) : '';
$admania_instance['imgwidth'] = (!empty($admania_newinstance['imgwidth']) ) ? strip_tags($admania_newinstance['imgwidth']) : '200';
$admania_instance['imageheight'] = (!empty($admania_newinstance['imageheight']) ) ? strip_tags($admania_newinstance['imageheight']) : '200';
$admania_instance['defaultimage'] = (!empty($admania_newinstance['defaultimage']) ) ? strip_tags($admania_newinstance['defaultimage']) : '';
$admania_instance['forcomment'] = (!empty($admania_newinstance['forcomment']) ) ? strip_tags($admania_newinstance['forcomment']) : '';
$admania_instance['formcomment'] = (!empty($admania_newinstance['formcomment']) ) ? strip_tags($admania_newinstance['formcomment']) : '';
$admania_instance['forycomment'] = (!empty($admania_newinstance['forycomment']) ) ? strip_tags($admania_newinstance['forycomment']) : '';
$admania_instance['formostviewpost'] = (!empty($admania_newinstance['formostviewpost']) ) ? strip_tags($admania_newinstance['formostviewpost']) : '';
$admania_instance['formmostviewpost'] = (!empty($admania_newinstance['formmostviewpost']) ) ? strip_tags($admania_newinstance['formmostviewpost']) : '';
$admania_instance['forymostviewpost'] = (!empty($admania_newinstance['forymostviewpost']) ) ? strip_tags($admania_newinstance['forymostviewpost']) : '';
$admania_instance['dsble_auhrpschk'] = (!empty($admania_newinstance['dsble_auhrpschk']) ) ? strip_tags($admania_newinstance['dsble_auhrpschk']) : '';
$admania_instance['dsble_datepschk'] = (!empty($admania_newinstance['dsble_datepschk']) ) ? strip_tags($admania_newinstance['dsble_datepschk']) : '';

return $admania_instance;
}



public function widget($admania_args, $admania_instance) {

$admania_title = apply_filters('widget_title', $admania_instance['title']);	       	
$admania_postperpage = $admania_instance['postperpage'];
$admania_imgwidth = $admania_instance['imgwidth'];
$admania_imageheight = $admania_instance['imageheight'];
$admania_defaultimage = $admania_instance['defaultimage'];

$forcomment = $admania_instance['forcomment'];
$formcomment = $admania_instance['formcomment'];
$forycomment = $admania_instance['forycomment'];
$formostviewpost = $admania_instance['formostviewpost'];
$formmostviewpost = $admania_instance['formmostviewpost'];
$forymostviewpost = $admania_instance['forymostviewpost'];
$dsble_auhrpschk = $admania_instance['dsble_auhrpschk'];
$dsble_datepschk = $admania_instance['dsble_datepschk'];


// social profile link


echo wp_kses_stripslashes($admania_args['before_widget']);
if (!empty($admania_title)) {
echo wp_kses_stripslashes($admania_args['before_title']) . $admania_title . wp_kses_stripslashes($admania_args['after_title']);
}
if(!empty($forcomment))
{
echo '<div><ul>';
$admania_ppwdgtargs = array(
'orderby' => 'admania_commentcount',
'posts_per_page' => absint($admania_postperpage),
'ignore_sticky_posts'=>1
);
$admania_ppwdgtquery = new WP_Query( $admania_ppwdgtargs );
if ( $admania_ppwdgtquery->have_posts() ) : while ( $admania_ppwdgtquery->have_posts() ) : $admania_ppwdgtquery->the_post(); 
?>
<li>
  <?php // Defaults
  global $admania_options;
$admania_imgwidth = '327';
$admania_imageheight ='189';


$admania_thumb = get_post_thumbnail_id();
$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
$admania_image = admania_autoresize( $admania_imgurl, $admania_imgwidth, $admania_imageheight, true ); //resize & crop img

?>
  <div class="admania_pplftimge">
    <?php
if($admania_image != "") { 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>" class="recentimgalign" alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php 
} 

elseif(!empty($admania_options['postdefaultimages']) != '') 
{ 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img class="admania_defaultsize" src="<?php echo esc_url($admania_options['postdefaultimages']); ?>" title="<?php esc_attr(the_title());  ?>"  alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php
}?>
  </div>
  <h6> <a title="<?php esc_html(the_title()); ?>" href="<?php esc_url(the_permalink()); ?>">
    <?php esc_html(the_title()); ?>
    </a> </h6>
  <p>
	<?php if(!empty($dsble_auhrpschk) != 1){ ?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author();?>
	<?php } if(!empty($dsble_datepschk) != 1){ ?>
    <span class="admania_dat">
    <?php the_time( 'M j , y' ); ?>
    </span> 
	<?php } ?>
	</p>
</li>
<?php endwhile; ?>
<?php  wp_reset_postdata(); ?>
<?php else : ?>
<p>
  <?php esc_html_e('Sorry, no posts were found.','admania'); ?>
</p>
<?php endif; ?>
</ul>
<!--comments-->
<?php
}
elseif(!empty($formcomment))
{echo '<div><ul>';
$month = date('m');
$admania_ppwdgtargs2 = array(
'orderby' => 'admania_commentcount',
'posts_per_page' => absint($admania_postperpage),
'ignore_sticky_posts'=>1,
'monthnum'=>$month
);
$admania_ppwdgtquery2 = new WP_Query( $admania_ppwdgtargs2 );

if ( $admania_ppwdgtquery2->have_posts() ) : while ( $admania_ppwdgtquery2->have_posts() ) : $admania_ppwdgtquery2->the_post(); 
?>
<li>
  <?php // Defaults
$admania_imgwidth = '327';
$admania_imageheight ='189';


$admania_thumb = get_post_thumbnail_id();
$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
$admania_image = admania_autoresize( $admania_imgurl, $admania_imgwidth, $admania_imageheight, true ); //resize & crop img

?>
  <div class="admania_pplftimge">
    <?php
if($admania_image != "") { 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>"  class="recentimgalign" alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php 
} 

elseif(!empty($admania_options['postdefaultimages']) != '') 
{ 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img class="admania_defaultsize" src="<?php echo esc_url($admania_options['postdefaultimages']); ?>" title="<?php esc_attr(the_title());  ?>"  alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php
}?>
  </div>
  <h6> <a title="Post: <?php esc_html(the_title()); ?>" href="<?php esc_url(the_permalink()); ?>">
    <?php esc_html(the_title()); ?>
    </a> </h6>
    <p>
    <?php if(!empty($dsble_auhrpschk) != 1){ ?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author();?>
	<?php } if(!empty($dsble_datepschk) != 1){ ?>
    <span class="admania_dat">
    <?php the_time( 'M j , y' ); ?>
    </span> 
	<?php } ?>
	</p>
</li>
<?php endwhile; ?>
<?php  wp_reset_postdata(); ?>
<?php else : ?>
<p>
  <?php esc_html_e('Sorry, no posts were found.','admania'); ?>
</p>
<?php endif; ?>
</ul>
<!--monthly based per comments count-->
<?php
}elseif(!empty($forycomment))
{
 echo '<div><ul>';
$year = date('Y');


$admania_ppwdgtargs3 = array(
'orderby' => 'admania_commentcount',
'posts_per_page' => absint($admania_postperpage),
'ignore_sticky_posts'=>1,
'year'=>$year
);
$admania_ppwdgtquery3 = new WP_Query( $admania_ppwdgtargs3 );

if ( $admania_ppwdgtquery3->have_posts() ) : while ( $admania_ppwdgtquery3->have_posts() ) : $admania_ppwdgtquery3->the_post(); 
?>
<li>
  <?php // Defaults
$admania_imgwidth = '327';
$admania_imageheight ='189';

$admania_thumb = get_post_thumbnail_id();
$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
$admania_image = admania_autoresize( $admania_imgurl, $admania_imgwidth, $admania_imageheight, true ); //resize & crop img

?>
  <div class="admania_pplftimge">
    <?php
if($admania_image != "") { 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>"  class="recentimgalign" alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php 
} 

elseif(!empty($admania_options['postdefaultimages']) != '') 
{ 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img class="admania_defaultsize" src="<?php echo esc_url($admania_options['postdefaultimages']); ?>" title="<?php esc_attr(the_title());  ?>"  alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php
}?>
  
  </div>
  <h6> <a title="Post: <?php esc_html(the_title()); ?>" href="<?php esc_url(the_permalink()); ?>">
    <?php esc_html(the_title()); ?>
    </a> </h6>
    <p>
    <?php if(!empty($dsble_auhrpschk) != 1){ ?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author();?>
	<?php } if(!empty($dsble_datepschk) != 1){ ?>
    <span class="admania_dat">
    <?php the_time( 'M j , y' ); ?>
    </span> 
	<?php } ?>
	</p>
</li>
<?php endwhile; ?>
<?php  wp_reset_postdata(); ?>
<?php else : ?>
<p>
  <?php esc_html_e('Sorry, no posts were found.','admania'); ?>
</p>
<?php endif; ?>
</ul>
<!--yearly based per comments count-->
<?php
}elseif(!empty($formostviewpost))
{

echo '<div><ul>';

$year = date('Y');

$admania_ppwdgtargs4 = array(
'meta_key' => 'admania_post_views_count',
'posts_per_page' => absint($admania_postperpage),
'orderby'=>'meta_value_num',
'ignore_sticky_posts'=>1,
'year'=>$year
);
$admania_ppwdgtquery4 = new WP_Query( $admania_ppwdgtargs4 );
if ( $admania_ppwdgtquery4->have_posts() ) : while (  $admania_ppwdgtquery4->have_posts() ) :  $admania_ppwdgtquery4->the_post(); 
?>
<li>
  <?php // Defaults
$admania_imgwidth = '327';
$admania_imageheight ='189';

$admania_thumb = get_post_thumbnail_id();
$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
$admania_image = admania_autoresize( $admania_imgurl, $admania_imgwidth, $admania_imageheight, true ); //resize & crop img

?>
  <div class="admania_pplftimge">
    <?php
if($admania_image != "") { 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>"  class="recentimgalign" alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php 
} 

elseif(!empty($admania_options['postdefaultimages']) != '') 
{ 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img class="admania_defaultsize" src="<?php echo esc_url($admania_options['postdefaultimages']); ?>" title="<?php esc_attr(the_title());  ?>"  alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php
}?>
    <span class="admania_ppcmtpst"> <span class=" view"> <?php echo  admania_get_post_views(get_the_ID());?> </span> </span> </div>
  <h6> <a title="Post: <?php esc_html(the_title()); ?>" href="<?php esc_url(the_permalink()); ?>">
    <?php esc_html(the_title()); ?>
    </a> </h6>
    <p>
    <?php if(!empty($dsble_auhrpschk) != 1){ ?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author();?>
	<?php } if(!empty($dsble_datepschk) != 1){ ?>
    <span class="admania_dat">
    <?php the_time( 'M j , y' ); ?>
    </span> 
	<?php } ?>
	</p>
</li>
<?php endwhile; ?>
<?php  wp_reset_postdata(); ?>
<?php else : ?>
<p>
  <?php esc_html_e('Sorry, no posts were found.','admania'); ?>
</p>
<?php endif; ?>
</ul>
<!--view post count-->
<?php
}elseif(!empty($formmostviewpost))
{echo '<div><ul>';
$month = date('m');

$admania_ppwdgtargs5 = array(
'meta_key' => 'admania_post_views_count',
'posts_per_page' => absint($admania_postperpage),
'orderby'=>'meta_value_num',
'ignore_sticky_posts'=>1,
'monthnum'=>$month
);
$admania_ppwdgtquery5 = new WP_Query( $admania_ppwdgtargs5 );
if ( $admania_ppwdgtquery5->have_posts() ) : while ( $admania_ppwdgtquery5->have_posts() ) : $admania_ppwdgtquery5->the_post(); 
?>
<li>
  <?php // Defaults
global $admania_options;
$admania_options = get_option( 'theme_settings' );  
$admania_imgwidth = '327';
$admania_imageheight ='189';
$admania_thumb = get_post_thumbnail_id();
$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
$admania_image = admania_autoresize( $admania_imgurl, $admania_imgwidth, $admania_imageheight, true ); //resize & crop img

?>
  <div class="admania_pplftimge">
    <?php
if($admania_image != "") { 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>"  class="recentimgalign" alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php 
} 

elseif(!empty($admania_options['postdefaultimages']) != '') 
{ 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img class="admania_defaultsize" src="<?php echo esc_url($admania_options['postdefaultimages']); ?>" title="<?php esc_attr(the_title());  ?>"  alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php
}?>
    <span class="admania_ppcmtpst"> <span class=" view"> <?php echo  admania_get_post_views(get_the_ID());?> </span> </span> </div>
  <h6> <a title="Post: <?php esc_html(the_title()); ?>" href="<?php esc_url(the_permalink()); ?>">
    <?php esc_html(the_title()); ?>
    </a> </h6>
    <p>
    <?php if(!empty($dsble_auhrpschk) != 1){ ?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author();?>
	<?php } if(!empty($dsble_datepschk) != 1){ ?>
    <span class="admania_dat">
    <?php the_time( 'M j , y' ); ?>
    </span> 
	<?php } ?>
	</p>
</li>
<?php endwhile; ?>
<?php  wp_reset_postdata(); ?>
<?php else : ?>
<p>
  <?php esc_html_e('Sorry, no posts were found.','admania'); ?>
</p>
<?php endif; ?>
</ul>
<!--view based monthly post count-->
<?php
}elseif(!empty($forymostviewpost))
{echo '<div><ul>';
$year = date('Y');

$admania_ppwdgtargs6 = array(
'meta_key' => 'admania_post_views_count',
'posts_per_page' => absint($admania_postperpage),
'orderby'=>'meta_value_num',
'ignore_sticky_posts'=>1,
'year'=>$year
);
$admania_ppwdgtquery6 = new WP_Query( $admania_ppwdgtargs6 );

if ( $admania_ppwdgtquery6->have_posts() ) : while (  $admania_ppwdgtquery6->have_posts() ) :  $admania_ppwdgtquery6->the_post(); 
?>
<li>
  <?php // Defaults
$admania_imgwidth = '327';
$admania_imageheight ='189';
$admania_thumb = get_post_thumbnail_id();
$admania_imgurl = wp_get_attachment_url( $admania_thumb,'full'); //get img URL
$admania_image = admania_autoresize( $admania_imgurl, $admania_imgwidth, $admania_imageheight, true ); //resize & crop img

?>
  <div class="admania_pplftimge">
    <?php
if($admania_image != "") { 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img src="<?php echo esc_url($admania_image); ?>" title="<?php esc_attr(the_title());  ?>"  class="recentimgalign" alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php 
} 

elseif(!empty($admania_options['postdefaultimages']) != '') 
{ 
?>
    <a  href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title()); ?>"><img class="admania_defaultsize" src="<?php echo esc_url($admania_options['postdefaultimages']); ?>" title="<?php esc_attr(the_title());  ?>"  alt="<?php  esc_html(the_title()); ?>" /></a>
    <?php
}?>
    <span class="admania_ppcmtpst"> <span class="view"> <?php echo  admania_get_post_views(get_the_ID());?> </span> </span> </div>
  <h6> <a title="Post: <?php esc_html(the_title()); ?>" href="<?php esc_url(the_permalink()); ?>">
    <?php esc_html(the_title()); ?>
    </a> </h6>
    <p>
    <?php if(!empty($dsble_auhrpschk) != 1) { ?>
    <?php esc_html_e('By','admania'); ?>
    <?php the_author();?>
	<?php } if(!empty($dsble_datepschk) != 1) { ?>
    <span class="admania_dat">
    <?php the_time( 'M j , y' ); ?>
    </span> 
	<?php } ?>
	</p>
</li>
<?php endwhile; ?>
<?php  wp_reset_postdata(); ?>
<?php else : ?>
<p>
  <?php esc_html_e('Sorry, no posts were found.','admania'); ?>
</p>
<?php endif; ?>
</ul>
<?php
}
?>
<!--view based yearlyly post count-->

</div>
<!--to get the count-->
<?php
 
echo wp_kses_stripslashes($admania_args['after_widget']);
}

}
endif;
?>
