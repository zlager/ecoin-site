<?php
/**
 * The template for the footer instagram 
 *
 * @package WordPress
 * @subpackage Admaania
 * @since Admania 1.0
 */


 if(admania_get_option('admania_enableckftrinst') != '') { ?>
  <div class="admania_footerinstagram">
  <div class="admania_footerinstagram_text">
	<a href="https://www.instagram.com/<?php echo esc_html(admania_get_option('admania_ftrinstagramusername')); ?>" target="_blank"><i class="fa fa-instagram"></i><?php esc_html_e('Followe','admania'); ?></a>
	</div>
<?php 
$admania_instagramuserID = admania_get_option('admania_ftrinstagramuserid') ? admania_get_option('admania_ftrinstagramuserid') :'';
$admania_instagramaccesstokenID = admania_get_option('admania_ftrinstagramaccsestoken') ? admania_get_option('admania_ftrinstagramaccsestoken') :'';
					
$admania_instagrampht ="https://api.instagram.com/v1/users/".$admania_instagramuserID."/media/recent/?access_token=".$admania_instagramaccesstokenID."";

$admania_instagramres = wp_remote_get($admania_instagrampht); 
$admania_instagramjson = json_decode($admania_instagramres['body']);

$admania_instagramimg = $admania_instagramjson->data;

$admania_instagramimg1 = $admania_instagramimg[0];

for($i=0;$i < 9;$i++) {
	
$admania_instagramimg1 = $admania_instagramimg[$i];
	
$admania_instagramimg2 = $admania_instagramimg1->images;

$admania_instagramimg3 = $admania_instagramimg2->thumbnail;

$admania_instagramimg3_url = $admania_instagramimg3->url;
	
$admania_instagramlinks = $admania_instagramimg1->link;

?>
    <div class="admania_footerinstagramimg"> 	
	
	<a href="<?php echo esc_url($admania_instagramlinks); ?>" target="_blank">
		<img src="<?php echo esc_url($admania_instagramimg3_url); ?>" alt="<?php esc_html_e('instagram','admania');?>"/> 
	</a>
	</div>
    <?php


}
?>
  </div>
  <?php } ?>