<?php
class WordCamp_Example_Plugin {
    const WCSP_ATTENDEES_TRANSIENT = 'wcsp_attendees';

    public static function init() {

    }

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
}
