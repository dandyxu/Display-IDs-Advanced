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
 * All the CMB related code.
 */
class Dia_CMB {
	/**
	 * Initialize CMB2.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		require_once( 'lib/cmb2/init.php' );
		require_once( 'lib/cmb2-grid/Cmb2GridPluginLoad.php' );
		require_once( 'lib/cmb2-tabs/cmb2-tabs.php' );
		add_action( 'cmb2_init', array( $this, 'cmb_demo_metaboxes' ) );
	}
	/**
	 * NOTE:     Your metabox on Demo CPT
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public function cmb_demo_metaboxes() {
		// Start with an underscore to hide fields from custom fields list
		$prefix = '_demo_';
		$cmb_demo = new_cmb2_box( array(
			'id' => $prefix . 'metabox',
			'title' => __( 'Demo Metabox', DIA_TEXTDOMAIN ),
			'object_types' => array( 'demo', ), // Post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
						'vertical_tabs' => true, // Set vertical tabs, default false
			'tabs' => array(
				array(
					'id' => 'tab-1',
					'icon' => 'dashicons-admin-site',
					'title' => 'Tab 1',
					'fields' => array(
						$prefix . DIA_TEXTDOMAIN . '_text',
						$prefix . DIA_TEXTDOMAIN . '_text2'
					),
				),
				array(
					'id' => 'tab-2',
					'icon' => 'dashicons-align-left',
					'title' => 'Tab 2',
					'fields' => array(
						$prefix . DIA_TEXTDOMAIN . '_textsmall',
						$prefix . DIA_TEXTDOMAIN . '_textsmall2'
					),
				),
			)
						) );
				$cmb2Grid = new \Cmb2Grid\Grid\Cmb2Grid( $cmb_demo );
		$row = $cmb2Grid->addRow();
				$field1 = $cmb_demo->add_field( array(
			'name' => __( 'Text', DIA_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', DIA_TEXTDOMAIN ),
			'id' => $prefix . DIA_TEXTDOMAIN . '_text',
			'type' => 'text'
				) );
		$field2 = $cmb_demo->add_field( array(
			'name' => __( 'Text 2', DIA_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', DIA_TEXTDOMAIN ),
			'id' => $prefix . DIA_TEXTDOMAIN . '_text2',
			'type' => 'text'
				) );
		$field3 = $cmb_demo->add_field( array(
			'name' => __( 'Text Small', DIA_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', DIA_TEXTDOMAIN ),
			'id' => $prefix . DIA_TEXTDOMAIN . '_textsmall',
			'type' => 'text_small'
				) );
		$field4 = $cmb_demo->add_field( array(
			'name' => __( 'Text Small 2', DIA_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', DIA_TEXTDOMAIN ),
			'id' => $prefix . DIA_TEXTDOMAIN . '_textsmall2',
			'type' => 'text_small'
				) );
				$row->addColumns( array( $field1, $field2 ) );
		$row = $cmb2Grid->addRow();
		$row->addColumns( array( $field3, $field4 ) );
			}
}
new Dia_CMB();
