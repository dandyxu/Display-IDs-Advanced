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
 * AJAX in the admin
 */
class Dia_Ajax_Admin {
	/**
	 * Initialize the class
	 */
	function initialize() {
		if ( !apply_filters( 'display_ids_advanced_dia_ajax_admin_initialize', true ) ) {
			return;
		}
		
		// For logged user
		add_action( 'wp_ajax_{your_method}', array( $this, 'your_method' ) );
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
$dia_ajax_admin = new Dia_Ajax_Admin();
$dia_ajax_admin->initialize();
do_action( 'display_ids_advanced_dia_ajax_admin_instance', $dia_ajax_admin );
