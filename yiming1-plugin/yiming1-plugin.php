<?php
/**
 * @package yiming1 plugin
 */
/*
Plugin Name: yiming1 plugin
Plugin URI: 
Description: study wp plugin
Version: 1.0.0
Author: Yiming Lin
Author URI: 
*/

defined('ABSPATH') or die('you cannot access this file');

class Yiming1Plugin {
  function __construct(){
    add_action('init', array($this, 'custom_post_type'));
  }

  function activate(){
    // generate a CPT
    $this->custom_post_type();
    // flush rewrite rules
    flush_rewrite_rules();
  }

  function deactivate(){
    // flush rewrite rules
    flush_rewrite_rules();
  }

  function uninstall(){
    // delete CPT
    // delete all the plugin data from db
  }

  function custom_post_type(){
    register_post_type('event', ['public' => true, 'label' => 'Events']);
  }
}

if(class_exists('Yiming1Plugin')){
  $yiming1Plugin = new Yiming1Plugin();
}

register_activation_hook(__FILE__, array($yiming1Plugin, 'activate'));

register_deactivation_hook(__FILE__, array($yiming1Plugin, 'deactivate'));
