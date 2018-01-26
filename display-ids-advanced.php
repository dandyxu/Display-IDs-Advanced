<?php
/**
   * @package   Display_IDs_Advanced
 * @author    Dandy Xu <dandyjefferson@gmail.com>
 * @copyright 2018 Dandy Xu
 * @license   GPL 2.0+
 * @link      https://dandyxu.me
 *
 * Plugin Name:       Display IDs Advanced
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           1.0.0
 * Author:            Dandy Xu
 * Author URI:        https://dandyxu.me
 * Text Domain:       display-ids-advanced
 * License:           GPL 2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * display-ids-advanced: v2.0.5
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
define( 'DIA_VERSION', '1.0.0' );
define( 'DIA_TEXTDOMAIN', 'display-ids-advanced' );
define( 'DIA_NAME', 'Display IDs Advanced' );
define( 'DIA_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'DIA_PLUGIN_ABSOLUTE',  __FILE__  );
/**
 * Load the textdomain of the plugin
 * 
 * @return void
 */
function dia_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), DIA_TEXTDOMAIN );
	load_textdomain( DIA_TEXTDOMAIN, trailingslashit( WP_PLUGIN_DIR ) . DIA_TEXTDOMAIN . '/languages/' . DIA_TEXTDOMAIN . '-' . $locale . '.mo' );
}
add_action( 'plugins_loaded', 'dia_load_plugin_textdomain', 1 );
require_once( DIA_PLUGIN_ROOT . 'composer/autoload.php' );
/**
 * Create a helper function for easy SDK access.
 * 
 * @global type $dia_fs
 * @return object
 */
function dia_fs() {
	global $dia_fs;
	if ( !isset( $dia_fs ) ) {
		$dia_fs = fs_dynamic_init( array(
			'id' => '',
			'slug' => 'display-ids-advanced',
			'public_key' => '',
			'is_live' => false,
			'is_premium' => true,
			'has_addons' => false,
			'has_paid_plans' => true,
			'menu' => array(
				'slug' => 'display-ids-advanced'
			),
				) );
	}
	return $dia_fs;
}
// Init Freemius.
// dia_fs();
require_once( DIA_PLUGIN_ROOT . 'includes/DIA_PostTypes.php' );
require_once( DIA_PLUGIN_ROOT . 'public/Display_IDs_Advanced.php' );
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once( DIA_PLUGIN_ROOT . 'includes/DIA_WPCli.php' );
}
require_once( DIA_PLUGIN_ROOT . 'includes/DIA_P2P.php' );
require_once( DIA_PLUGIN_ROOT . 'includes/DIA_FakePage.php' );
/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() ) {
	if (
			(function_exists( 'wp_doing_ajax' ) && !wp_doing_ajax() ||
			(!defined( 'DOING_AJAX' ) || !DOING_AJAX ) )
	) {
		require_once( DIA_PLUGIN_ROOT . 'admin/Display_IDs_Advanced_Admin.php' );
	}
}
