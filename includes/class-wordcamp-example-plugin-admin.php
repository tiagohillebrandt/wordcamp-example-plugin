<?php
class WordCamp_Example_Plugin_Admin {
    public static function init() {

    }

    private static function _view( $name ) {
        $file = WPHC_PLUGIN_DIR . '/views/' . $name . '.php';

        if ( file_exists( $file ) ) {
            include $file;
        }
    }
}
