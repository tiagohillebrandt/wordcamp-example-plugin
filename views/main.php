<?php
if ( ! defined( 'WCSP' ) ) {
    exit;
}

$attendees = WordCamp_Example_Plugin::get_attendees();
?>

<div class="wrap">
    <h2><?php _e( 'WordCamp São Paulo 2017', 'wordcamp-example-plugin' ); ?></h2>

    <p><?php _e( 'This plugin pulls the list of attendees from WordCamp São Paulo 2017 site via WordPress REST API, and then displays the name of the attendees at this page.', 'wordcamp-example-plugin' ); ?></p>

    <?php if ( false !== $attendees ) : ?>
        <h3><?php _e( 'Attendees', 'wordcamp-example-plugin' ); ?></h3>

        <?php echo $attendees; ?>
    <?php else : ?>
        <p><?php _e( 'ERROR: Unable to retrieve the list of ateendees.', 'wordcamp-example-plugin' ); ?></p>
    <?php endif; ?>
</div>
