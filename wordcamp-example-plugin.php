<?php
/**
 * Plugin Name: WordCamp Example Plugin
 * Plugin URI:  https://github.com/tiagohillebrandt/wordcamp-example-plugin
 * Description: Example plugin created for WordCamp Sao Paulo 2017.
 * Version:     1.0
 * Author:      Tiago Hillebrandt
 * Author URI:  http://tiagohillebrandt.com
 * License:     GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * Text Domain: wordcamp-example-plugin
 * Domain Path: /languages
 *
 * @package wordcamp-example-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'WCSP_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'WCSP_INC_DIR', WCSP_PLUGIN_DIR . '/includes' );

require_once WCSP_INC_DIR . '/class-wordcamp-example-plugin.php';

add_action( 'init', array( 'WCSP_Example_Plugin', 'init' ) );

if ( is_admin() ) {
    require_once WCSP_INC_DIR . '/class-wordcamp-example-plugin-admin.php';

    add_action( 'init', array( 'WCSP_Example_Plugin_Admin', 'init' ) );
}
