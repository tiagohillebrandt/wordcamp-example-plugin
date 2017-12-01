<?php
class WordCamp_Example_Plugin_Admin {
    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'admin_menu' ) );
    }

    public static function admin_menu() {
        add_menu_page( 'WordCamp Example Plugin', 'WordCamp Example Plugin', 'manage_options', 'wcsp-example-plugin', array( __class__, 'admin_page' ) );
    }

    public static function admin_page() {
        self::_view( 'main' );
    }

    private static function _view( $name ) {
        $file = WCSP_PLUGIN_DIR . '/views/' . $name . '.php';

        if ( file_exists( $file ) ) {
            include $file;
        }
    }
}
