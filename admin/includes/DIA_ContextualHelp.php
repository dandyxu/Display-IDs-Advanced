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
 * This class contain the contextual help code.
 */
class Dia_ContextualHelp {
    /**
     * Initialize the Contextual Help
     */
    function __construct() {
		if ( !apply_filters( 'display_ids_advanced_dia_contextualhelp_initialize', true ) ) {
			return;
		}
        add_filter( 'wp_contextual_help_docs_dir', array( $this, 'help_docs_dir' ) );
        add_filter( 'wp_contextual_help_docs_url', array( $this, 'help_docs_url' ) );
        add_action( 'init', array( $this, 'contextual_help' ) );
    }
    /**
     * Filter for change the folder of Contextual Help
     * 
     * @param string $paths The path.
	 * 
     * @since 1.0.0
     *
     * @return string The path.
     */
    public function help_docs_dir( $paths ) {
        $paths[] = plugin_dir_path( __FILE__ ) . 'help-docs/';
        return $paths;
    }
    /**
     * Filter for change the folder image of Contextual Help
     * 
     * @param string $paths The path.
	 * 
     * @since 1.0.0
     *
     * @return string the path
     */
    public function help_docs_url( $paths ) {
        $paths[] = plugin_dir_path( __FILE__ ) . 'help-docs/img';
        return $paths;
    }
    /**
     * Contextual Help, docs in /help-docs folter
     * Documentation https://github.com/kevinlangleyjr/wp-contextual-help
     * 
     * @since 1.0.0 
	 * 
     * @return void
     */
    public function contextual_help() {
        if ( !class_exists( 'WP_Contextual_Help' ) ) {
            return;
        }
        // Only display on the pages - post.php and post-new.php, but only on the `demo` post_type
        WP_Contextual_Help::register_tab( 'demo-example', __( 'Demo Management', DIA_TEXTDOMAIN ), array(
            'page' => array( 'post.php', 'post-new.php' ),
            'post_type' => 'demo',
            'wpautop' => true
        ) );
        // Add to a custom plugin settings page
        WP_Contextual_Help::register_tab( 'dia_settings', __( 'Boilerplate Settings', DIA_TEXTDOMAIN ), array(
            'page' => 'settings_page_' . DIA_TEXTDOMAIN,
            'wpautop' => true
        ) );
    }
}
new Dia_ContextualHelp();