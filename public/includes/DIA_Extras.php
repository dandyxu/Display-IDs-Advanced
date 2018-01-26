<?php
/**
 * Plugin_name
 * 
 * @package   Plugin_name
 * @author    Dandy Xu <dandyjefferson@gmail.com>
 * @copyright 2018 Dandy Xu
 * @license   GPL 2.0+
 * @link      https://dandyxu.me
 */
/**
 * This class contain all the snippet or extra that improve the experience on the frontend
 */
class Dia_Extras {
	/**
	 * Initialize the snippet
	 */
	function initialize() {
		add_filter( 'body_class', array( __CLASS__, 'add_dia_class' ), 10, 3 );
	}
		/**
	 * Add class in the body on the frontend
	 * 
	 * @param array $classes THe array with all the classes of the page.
	 *
	 * @since 1.0.0
	 * 
	 * @return array
	 */
	public static function add_dia_class( $classes ) {
		$classes[] = DIA_TEXTDOMAIN;
		return $classes;
	}
	}
$dia_extras = new Dia_Extras();
$dia_extras->initialize();
do_action( 'display_ids_advanced_dia_extras_instance', $dia_extras );
