<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Display_IDs_Advanced
 * @author    Dandy Xu <dandyjefferson@gmail.com>
 * @copyright 2018 Dandy Xu
 * @license   GPL 2.0+
 * @link      https://dandyxu.me
 */
?>
<div class="wrap">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <div id="tabs" class="settings-tab">
		<ul>
			<li><a href="#tabs-1"><?php _e( 'Settings' ); ?></a></li>
			<li><a href="#tabs-2"><?php _e( 'Settings 2', DIA_TEXTDOMAIN ); ?></a></li>
			<?php
						?>
			<li><a href="#tabs-3"><?php _e( 'Import/Export', DIA_TEXTDOMAIN ); ?></a></li>
			<?php
						?>
		</ul>
		<?php
		require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'settings-2.php' );
		?>
		<?php
				?>
		<div id="tabs-3" class="metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span><?php _e( 'Export Settings', DIA_TEXTDOMAIN ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Export the plugin\'s settings for this site as a .json file. This will allows you to easily import the configuration to another installation.', DIA_TEXTDOMAIN ); ?></p>
					<form method="post">
						<p><input type="hidden" name="dia_action" value="export_settings" /></p>
						<p>
							<?php wp_nonce_field( 'dia_export_nonce', 'dia_export_nonce' ); ?>
							<?php submit_button( __( 'Export' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div>
			</div>
			<div class="postbox">
				<h3 class="hndle"><span><?php _e( 'Import Settings', DIA_TEXTDOMAIN ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Import the plugin\'s settings from a .json file. This file can be retrieved by exporting the settings from another installation.', DIA_TEXTDOMAIN ); ?></p>
					<form method="post" enctype="multipart/form-data">
						<p>
							<input type="file" name="dia_import_file"/>
						</p>
						<p>
							<input type="hidden" name="dia_action" value="import_settings" />
							<?php wp_nonce_field( 'dia_import_nonce', 'dia_import_nonce' ); ?>
							<?php submit_button( __( 'Import' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div>
			</div>
		</div>
		<?php
				?>
    </div>
    <div class="right-column-settings-page metabox-holder">
		<div class="postbox">
			<h3 class="hndle"><span><?php _e( 'Plugin Name.', DIA_TEXTDOMAIN ); ?></span></h3>
			<div class="inside">
				<a href="https://github.com/WPBP/display-ids-advanced"><img src="https://raw.githubusercontent.com/WPBP/boilerplate-assets/master/icon-256x256.png" alt=""></a>
			</div>
		</div>
    </div>
</div>
