<?php
/**
 * The WordCamp_Example_Plugin_Admin class
 *
 * @package wordcamp-example-plugin
 * @since 1.0
 */
class WordCamp_Example_Plugin_Admin {
    /**
     * Constructor.
     *
     * @since 1.0
     */
    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
    }

    /**
     * Adds a menu page on WordPress admin.
     *
     * @since 1.0
     */
    public static function admin_menu() {
        add_menu_page( __( 'WordCamp São Paulo 2017', 'wordcamp-example-plugin' ), __( 'WordCamp São Paulo 2017', 'wordcamp-example-plugin' ), 'read', 'wcsp-example-plugin', array( __class__, 'admin_page' ) );
    }

    /**
     * Loads the admin page view.
     *
     * @since 1.0
     */
    public static function admin_page() {
        self::_view( 'main' );
    }

    /**
     * Includes a view.
     *
     * @since 1.0
     *
     * @param string $name The name of the view to load.
     */
    private static function _view( $name ) {
        $file = WCSP_PLUGIN_DIR . '/views/' . $name . '.php';

        if ( file_exists( $file ) ) {
            include $file;
        }
    }
}
