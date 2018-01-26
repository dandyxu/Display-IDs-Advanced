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
 * This class contain the Templating stuff for the frontend
 */
class Dia_Template {
	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'display_ids_advanced_dia_template_initialize', true ) ) {
			return;
		}
		
		// Override the template hierarchy for load /templates/content-demo.php
		add_filter( 'template_include', array( __CLASS__, 'load_content_demo' ) );
	}
		/**
	 * Example for override the template system on the frontend
	 * 
	 * @param string $original_template The original templace HTML.
	 *
	 * @since 1.0.0
	 * 
	 * @return string
	 */
	public static function load_content_demo( $original_template ) {
		if ( is_singular( 'demo' ) && in_the_loop() ) {
			return wpbp_get_template_part( DIA_TEXTDOMAIN, 'content', 'demo', false );
		}
		return $original_template;
	}
	
}
$dia_template = new Dia_Template();
$dia_template->initialize();
do_action( 'display_ids_advanced_dia_template_instance', $dia_template );
