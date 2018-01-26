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
 * This class contain the WP CLI support
 */
class Dia_WPCli {
	/**
	 * Initialize the snippet
	 * 
	 * @return void
	 */
	function __construct() {
		WP_CLI::add_command( 'dia_commandname', array( $this, 'command_example' ) );
	}
	/**
	 * Example command
	 * API reference: https://wp-cli.org/docs/internal-api/
	 * 
	 * @param array $args The attributes.
	 * 
	 * @return void
	 */
	public function command_example( $args ) {
		// Message prefixed with "Success: ".
		WP_CLI::success( $args[0] );
		// Message prefixed with "Warning: ".
		WP_CLI::warning( $args[0] );
		// Message prefixed with "Debug: ". when '--debug' is used
		WP_CLI::debug( $args[0] );
		// Message prefixed with "Error: ".
		WP_CLI::error( $args[0] );
		// Message with no prefix
		WP_CLI::log( $args[0] );
		// Colorize a string for output
		WP_CLI::colorize( $args[0] );
		// Halt script execution with a specific return code
		WP_CLI::halt( $args[0] );
	}
}
new Dia_WPCli();
