<?php
namespace Includes\Pages;

require_once plugin_dir_path(dirname(__FILE__)).'\Base\BaseController.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\SettingsApi.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\Callbacks\AdminCallbacks.php';

use \Includes\Base\BaseController;
use \Includes\Api\SettingsApi;
use \Includes\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {
  public $settings;

  public $subpages;

  public $admin_pages;

  public $callbacks;

  public function register(){
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();

    $this->set_pages();

    $this->set_subpages();

    $this->settings
         ->add_pages($this->admin_pages)
         ->with_subpage('Dashboard')
         ->add_subpages($this->subpages)
         ->register();
  }

  public function set_pages(){
    $this->admin_pages = [
      [
        'page_title' => 'Yiming1 Plugin', 
        'menu_title' => 'Yiming', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin', 
        'callback' => array($this->callbacks, 'admin_dashboard'), 
        'icon_url' => 'dashicons-store', 
        'position' => 110
      ]
    ];
  }

  public function set_subpages(){
    $this->subpages = [
      [
        'parent_slug' => 'yiming1_plugin', 
        'page_title' => 'Custom Post Types',
        'menu_title' => 'CPTs', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_cpt', 
        'callback' => function(){echo '<h1>Custom Post Type Manager</h1>';}
      ], # subpages don't have icon url and position
      [
        'parent_slug' => 'yiming1_plugin', 
        'page_title' => 'Custom Taxonomies',
        'menu_title' => 'Taxonomies', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_taxonomies', 
        'callback' => function(){echo '<h1>Custom Taxonomies</h1>';}
      ], # subpages don't have icon url and position
      [
        'parent_slug' => 'yiming1_plugin', 
        'page_title' => 'Custom Widgets',
        'menu_title' => 'Widgets', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_widgets', 
        'callback' => function(){echo '<h1>Custom Widgets</h1>';}
      ], # subpages don't have icon url and position
    ];
  }
}