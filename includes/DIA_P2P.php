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
 * This class contain the Posts 2 Posts code
 */
class Dia_P2P {
	/**
	 * Initialize the snippet
	 */
	function __construct() {
		require_once( 'lib/posts-to-posts/posts-to-posts.php' );
		add_action( 'p2p_init', array( $this, 'my_connection_types' ) );
	}
	/**
	 * https://github.com/scribu/wp-posts-to-posts/wiki/Basic-usage
	 * 
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public function my_connection_types() {
		p2p_register_connection_type( array(
			'name' => 'demo_to_pages',
			'from' => 'demo',
			'to' => 'page'
		) );
	}
}
new Dia_P2P();
