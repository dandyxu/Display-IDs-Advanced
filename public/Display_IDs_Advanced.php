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
 * This class should ideally be used to work with the public-facing side of the WordPress site.
 */
class Display_IDs_Advanced {
	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	private static $instance;
		/**
	 * Array of cpts of the plugin
	 *
	 * @var array
	 */
	protected $cpts = array( 'demo' );
	
	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function initialize() {
			require_once( DIA_PLUGIN_ROOT . 'public/includes/DIA_Enqueue.php' );
			require_once( DIA_PLUGIN_ROOT . 'public/includes/DIA_Extras.php' );
			require_once( DIA_PLUGIN_ROOT . 'public/includes/DIA_Template.php' );
				require_once( DIA_PLUGIN_ROOT . 'public/widgets/sample.php' );
		}
		/**
	 * Return the cpts
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_cpts() {
		return $this->cpts;
	}
	
	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			try {
				self::$instance = new self;
				self::initialize();
			} catch ( Exception $err ) {
				do_action( 'display_ids_advanced_failed', $err );
				if ( WP_DEBUG ) {
					throw $err->getMessage();
				}
			}
		}
		return self::$instance;
	}
}
/*
 * @TODO:
 *
 * - 9999 is used for load the plugin as last for resolve some
 *   problems when the plugin use API of other plugins, remove
 *   if you don' want this
 */
add_action( 'plugins_loaded', array( 'Display_IDs_Advanced', 'get_instance' ), 9999 );
