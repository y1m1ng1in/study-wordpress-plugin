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
  public $plugin;

  function __construct(){
    $this->plugin = plugin_basename(__FILE__);
  }

  function create_post_type(){
    add_action('init', array($this, 'custom_post_type'));
  }

  function register(){
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    add_action('admin_menu', array($this, 'add_admin_pages'));
    
    // tag: 'plugin_action_links_NAME-OF-MY-PLUGIN'
    add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
  }

  function settings_link($links){
    // add custom setting links
    $setting_link = '<a href="admin.php?page=yiming1_plugin">Settings</a>';
    array_push($links, $setting_link);
    return $links;
  }

  function add_admin_pages(){
    add_menu_page('Yiming1 Plugin', 'Yiming', 'manage_options', 
      'yiming1_plugin', array($this, 'admin_index'), 'dashicons-store', null);
  }

  function admin_index(){
    // require templates
    require_once plugin_dir_path(__FILE__).'templates/admin.php';
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
