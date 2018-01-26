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
 * All the WP pointers.
 */
class Dia_Pointers {
	/**
	 * Initialize the Pointers.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( !apply_filters( 'display_ids_advanced_dia_pointers_initialize', true ) ) {
			return;
		}
		new PointerPlus( array( 'prefix' => DIA_TEXTDOMAIN ) );
		add_filter( DIA_TEXTDOMAIN . '-pointerplus_list', array( $this, 'custom_initial_pointers' ), 10, 2 );
	}
	/**
	 * Add pointers.
	 * Check on https://github.com/Mte90/pointerplus/blob/master/pointerplus.php for examples
	 *
	 * @param array $pointers The list of pointers.
	 * @param array $prefix   For your pointers.
	 *
	 * @return mixed
	 */
	function custom_initial_pointers( $pointers, $prefix ) {
		return array_merge( $pointers, array(
			$prefix . '_contextual_tab' => array(
				'selector' => '#contextual-help-link',
				'title' => __( 'Boilerplate Help', DIA_TEXTDOMAIN ),
				'text' => __( 'A pointer for help tab.<br>Go to Posts, Pages or Users for other pointers.', DIA_TEXTDOMAIN ),
				'edge' => 'top',
				'align' => 'right',
				'icon_class' => 'dashicons-welcome-learn-more',
			)
				) );
	}
}
new Dia_Pointers();
