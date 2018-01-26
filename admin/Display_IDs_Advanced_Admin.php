<?php
/**
 * Display_IDs_Advanced
 *
 * @package   Display_IDs_Advanced
 * @author    Dandy Xu <dandyjefferson@gmail.com>
 * @copyright 2018 Dandy Xu
 * @license   GPL 2.0+
 * @link      https://dandyxu.me
 */
/**
 * This class should ideally be used to work with the administrative side of the WordPress site.
 */
class Display_IDs_Advanced_Admin {
	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;
	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function initialize() {
		if ( !apply_filters( 'display_ids_advanced_dia_admin_initialize', true ) ) {
			return;
		}
		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		  if( ! is_super_admin() ) {
		  return;
		  }
		 */
		require_once( DIA_PLUGIN_ROOT . 'admin/includes/DIA_Enqueue_Admin.php' );
		/*
		 * Load CMB
		 */
		require_once( DIA_PLUGIN_ROOT . 'admin/includes/DIA_CMB.php' );
		/*
		 * Import Export settings
		 */
		require_once( DIA_PLUGIN_ROOT . 'admin/includes/DIA_ImpExp.php' );
		/*
		 * Contextual Help
		 */
		require_once( DIA_PLUGIN_ROOT . 'admin/includes/DIA_ContextualHelp.php' );
		/*
		 * All the pointers
		 */
		require_once( DIA_PLUGIN_ROOT . 'admin/includes/DIA_Pointers.php' );
		/*
		 * All the extras functions
		 */
		require_once( DIA_PLUGIN_ROOT . 'admin/includes/DIA_Extras_Admin.php' );
	}
	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		/*
		 * @TODO :
		 *
		 * - Uncomment following lines if the admin class should only be available for super admins
		  if( ! is_super_admin() ) {
		  return;
		  }
		 */
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			try {
				self::$instance = new self;
				self::initialize();
			} catch ( Exception $err ) {
				do_action( 'display_ids_advanced_admin_failed', $err );
				if ( WP_DEBUG ) {
					throw $err->getMessage();
				}
			}
		}
		return self::$instance;
	}
}
add_action( 'plugins_loaded', array( 'Display_IDs_Advanced_Admin', 'get_instance' ) );
