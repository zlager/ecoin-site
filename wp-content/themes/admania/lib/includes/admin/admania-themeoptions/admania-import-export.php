<?php
/* Admania : Add Settings Page to Menu and Import / Export settings
 *
 * @package WordPress
 * @subpackage Admania
 * @since Admania 1.0
 */



/**
* Add Settings Page to Menu
*/

 
require_once (trailingslashit(ABSPATH) . 'wp-admin/includes/file.php');

$admania_options = get_option( 'admania_theme_settings' );

if(! function_exists( 'admania_menusettingspage' )):	

function admania_menusettingspage() {

add_theme_page( esc_html__( 'Admania Theme Options' , 'admania' ), esc_html__( 'Admania Theme Options' , 'admania' ), 'manage_options', 'settings', 'admania_theme_settings_page');
$page = add_theme_page( esc_html__( 'Admania Backup Options' ,'admania'), esc_html__( 'Admania Import/Export','admania' ), 'manage_options', 'admania-backup-options', 'admania_theme_optionspage');
add_action("load-{$page}", 'admania_importexport');	
	
}

endif;

if(! function_exists( 'admania_importexport' )):	
/**
* Import or Export Options
*/

function admania_importexport() {
global $wp_filesystem;
WP_Filesystem();
if (isset($_GET['action']) && ($_GET['action'] == 'download')) {
header("Cache-Control: public, must-revalidate");
header("Pragma: hack");
header("Content-Type: text/plain");
header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
echo serialize(get_options());
die();
}
if (isset($_POST['upload']) && check_admin_referer('shapeSpace_restoreOptions', 'shapeSpace_restoreOptions')) {
if ($_FILES["file"]["error"] > 0) {
// error
} else {
$admania_options = unserialize($wp_filesystem->get_contents($_FILES["file"]["tmp_name"]));
if ($admania_options) {
foreach ($admania_options as $admania_option) {
update_option($admania_option->option_name, unserialize($admania_option->option_value));
}
}
}
wp_redirect(admin_url('admin.php?page=admania-backup-options'));
exit;
}
}
endif;

if(! function_exists( 'admania_theme_optionspage' )):	
/**
* Restore Options
*/
function admania_theme_optionspage() { ?>

<div class="wrap">
  <h2>
    <?php esc_html_e('Backup/Restore Theme Options','admania'); ?>
  </h2>
  <form action="" method="POST" enctype="multipart/form-data">
    <table id="admania-backup-options">
      <tr>
        <td><h3>
            <?php esc_html_e('Backup/Export','admania'); ?>
          </h3>
          <p>
            <?php esc_html_e('Here are the stored settings for the current theme:','admania'); ?>
          </p>
          <p>
            <textarea class="widefat code" rows="20" cols="100" onclick="this.select()"><?php echo serialize(get_options()); ?></textarea>
          </p>
          <p><a href="?page=admania-backup-options&action=download" class="button-secondary">
            <?php esc_html_e('Download as file','admania'); ?>
            </a></p></td>
        <td><h3>
            <?php esc_html_e('Restore/Import','admania'); ?>
          </h3>
          <p>
            <label class="description" for="upload">
              <?php esc_html_e('Restore a previous backup','admania'); ?>
            </label>
          </p>
          <p>
            <input type="file" name="file" />
            <input type="submit" name="upload" id="upload" class="button-primary" value="<?php esc_html_e('Upload file','admania'); ?>" />
          </p>
          <?php if (function_exists('wp_nonce_field')) wp_nonce_field('shapeSpace_restoreOptions', 'shapeSpace_restoreOptions'); ?></td>
      </tr>
    </table>
  </form>
</div>
<?php }

endif;


if(! function_exists( 'admania_display_options' )):
function admania_display_options() {
$admania_options = unserialize(get_options());
}
endif;




function get_options() {

global $wpdb;

//prepare data options for admania themesettings

$admaniathemeoptions_sql = 
$wpdb->prepare( "
SELECT option_name,
option_value FROM {$wpdb->options} 
WHERE option_name = %s",
'admania_theme_settings'
);

//get results 
$admaniathemeoption_tlbkresults = $wpdb->get_results( $admaniathemeoptions_sql );

return $admaniathemeoption_tlbkresults;

}




