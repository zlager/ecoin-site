<?php 
/* Update 
 */

$api_url = 'http://userthemes.com/userthemes_api/admania_api';


if(function_exists('wp_get_theme')){
    $theme_data = wp_get_theme(get_option('stylesheet'));
    $theme_version = $theme_data->Version;  
} else {
    $theme_data = wp_get_theme( get_stylesheet_directory() . '/style.css');
    $theme_version = $theme_data['Version'];
}    
$theme_base = get_option('stylesheet');


add_filter('pre_set_site_transient_update_themes', 'admania_check_for_update');
if(! function_exists( 'admania_check_for_update' )):
function admania_check_for_update($checked_data) {
global $wp_version, $theme_version, $theme_base, $api_url;

$request = array(
'slug' => $theme_base,
'version' => $theme_version 
);

$send_for_check = array(
'body' => array(
'action' => 'theme_update', 
'request' => serialize($request),
'api-key' => md5(get_home_url('url'))
),
'user-agent' => 'WordPress/' . $wp_version . '; ' . get_home_url('url')
);
$raw_response = wp_remote_post($api_url, $send_for_check);
if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
$response = unserialize($raw_response['body']);

if (!empty($response)) 
$checked_data->response[$theme_base] = $response;
return $checked_data;
}

endif;

add_filter('themes_api', 'admania_api_call', 10, 3);
if(! function_exists( 'admania_api_call' )):
function admania_api_call($def, $action, $args) {
global $theme_base, $api_url, $theme_version, $api_url;

if ($args->slug != $theme_base)
return false;


$args->version = $theme_version;
$request_string = prepare_request($action, $args);
$request = wp_remote_post($api_url, $request_string);

if (is_wp_error($request)) {
$res = new WP_Error('themes_api_failed', esc_html__('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>','admania'), $request->get_error_message());
} else {
$res = unserialize($request['body']);

if ($res === false)
$res = new WP_Error('themes_api_failed', esc_html__('An unknown error occurred','admania'), $request['body']);
}

return $res;
}
endif;
if (is_admin())
$current = get_transient('update_themes');
?>