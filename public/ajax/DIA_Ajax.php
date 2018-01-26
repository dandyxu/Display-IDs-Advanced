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
 * AJAX in the public
 */
class Dia_Ajax {
	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'display_ids_advanced_dia_ajax_initialize', true ) ) {
			return;
		}
		// For logged user
		add_action( 'wp_ajax_{your_method}', array( $this, 'your_method' ) );
		// For not logged user
		add_action( 'wp_ajax_nopriv_{your_method}', array( $this, 'your_method' ) );
	}
	/**
	 * The method to run on ajax
	 * 
	 * @return void
	 */
	public function your_method() {
		$return = array(
			'message' => 'Saved',
			'ID' => 1
		);
		wp_send_json_success( $return );
		// wp_send_json_error( $return );
	}
}
$dia_ajax = new Dia_Ajax();
$dia_ajax->initialize();
do_action( 'display_ids_advanced_dia_ajax_instance', $dia_ajax );
