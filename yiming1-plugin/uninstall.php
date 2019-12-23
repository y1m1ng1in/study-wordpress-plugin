<?php

/**
 * Trigger this file on Plugin uninstall
 */

defined('WP_UNINSTALL_PLUGIN') or die('you cannot access this file');

// clear the db data
$events = get_posts(array('post_type' => 'event', 'numberposts' => -1));

foreach($events as $event){
  wp_delete_post($event->ID, true);
}