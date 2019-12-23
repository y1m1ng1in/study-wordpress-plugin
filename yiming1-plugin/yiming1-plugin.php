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
  function create_post_type(){
    add_action('init', array($this, 'custom_post_type'));
  }

  function register(){
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  function custom_post_type(){
    register_post_type('event', ['public' => true, 'label' => 'Events']);
  }

  function enqueue(){
    // enqueue all the scripts
    wp_enqueue_style('my plugin style', plugins_url('/assets/style.css', __FILE__));
    wp_enqueue_script('my plugin script', plugins_url('/assets/myscript.js', __FILE__));
  }
}

if(class_exists('Yiming1Plugin')){
  $yiming1Plugin = new Yiming1Plugin();
  $yiming1Plugin->create_post_type();
  $yiming1Plugin->register();
}

// activate
require_once plugin_dir_path(__FILE__).'includes/yiming1-plugin-activate.php';
register_activation_hook(__FILE__, array('Yiming1PluginActivate', 'activate'));

// deactivate
require_once plugin_dir_path(__FILE__).'includes/yiming1-plugin-deactivate.php';
register_deactivation_hook(__FILE__, array('Yiming1PluginDeactivate', 'deactivate'));
