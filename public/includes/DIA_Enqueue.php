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
 * This class contain the Enqueue stuff for the frontend
 */
class Dia_Enqueue {
	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'display_ids_advanced_dia_enqueue_initialize', true ) ) {
			return;
		}
		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
	}
		/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function enqueue_styles() {
		wp_enqueue_style( DIA_TEXTDOMAIN . '-plugin-styles', plugins_url( 'public/assets/css/public.css', DIA_PLUGIN_ABSOLUTE ), array(), DIA_VERSION );
	}
			/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function enqueue_scripts() {
		wp_enqueue_script( DIA_TEXTDOMAIN . '-plugin-script', plugins_url( 'public/assets/js/public.js', DIA_PLUGIN_ABSOLUTE ), array( 'jquery' ), DIA_VERSION );
	}
		
}
$dia_enqueue = new Dia_Enqueue();
$dia_enqueue->initialize();
do_action( 'display_ids_advanced_dia_enqueue_instance', $dia_enqueue );
