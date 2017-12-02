<?php
/**
 * The WordCamp_Example_Plugin class
 *
 * @package wordcamp-example-plugin
 * @since 1.0
 */
class WordCamp_Example_Plugin {
    const WCSP_ATTENDEES_TRANSIENT = 'wcsp_attendees';

    /**
     * Retrieves the list of attendees.
     *
     * @since 1.0
     */
    public static function get_attendees() {
        $attendees = get_transient( self::WCSP_ATTENDEES_TRANSIENT );

        if ( false === $attendees ) {
            $res = wp_remote_get( 'https://2017.saopaulo.wordcamp.org/wp-json/wp/v2/pages/14', array( 'timeout' => 20 ) );

            if ( is_array( $res ) && 200 == wp_remote_retrieve_response_code( $res ) ) {
                $body = json_decode( $res['body'], true );

                if ( isset( $body['content']['rendered'] ) ) {
                    $attendees = $body['content']['rendered'];

                    set_transient( self::WCSP_ATTENDEES_TRANSIENT, $attendees, DAY_IN_SECONDS );
                }
            }
        }

        return $attendees;
    }

    /**
     * Cleans up the transient when plugin is uninstalled.
     *
     * @since 1.0
     */
    public static function plugin_uninstall() {
        if ( get_transient( self::WCSP_ATTENDEES_TRANSIENT ) ) {
            delete_transient( self::WCSP_ATTENDEES_TRANSIENT );
        }
    }
}
