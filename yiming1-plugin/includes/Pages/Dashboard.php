<?php
namespace Includes\Pages;

require_once plugin_dir_path(dirname(__FILE__)).'\Base\BaseController.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\SettingsApi.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\Callbacks\AdminCallbacks.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\Callbacks\ManagerCallbacks.php';

use \Includes\Base\BaseController;
use \Includes\Api\SettingsApi;
use \Includes\Api\Callbacks\AdminCallbacks;
use \Includes\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController {
  public $settings;

  public $admin_pages;

  public $callbacks;

  public function register(){
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();
    $this->callback_manager = new ManagerCallbacks();

    $this->set_pages();

    $this->set_settings();
    $this->set_sections();
    $this->set_fields();

    $this->settings
         ->add_pages($this->admin_pages)
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
        'position' => 110,
      ]
    ];
  }

  /*
    Add db entry in table "wp_options":
      option_name = "yiming1_plugin"
      option_value = serialized value of all options 
  */
  public function set_settings(){
    $args = array();
    $args = [
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'yiming1_plugin',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ]
    ];
    $this->settings->set_settings($args);
  }

  public function set_sections(){
    $args = [
      [
        'id' => 'yiming1_admin_index',
        'title' => 'Settings Manager',
        'callback' => array($this->callback_manager, 'admin_section_manager'),
        'page' => 'yiming1_plugin', # refer to the menu slug
      ],
    ];
    $this->settings->set_sections($args);
  }

  public function set_fields(){
    $args = array();
    foreach($this->managers as $id => $title){
      $args[] = [
        'id' => $id, # must identical to the option name
        'title' => $title,
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'option_name' => 'yiming1_plugin',
          'label_for' => $id,
          'class' => 'ui-toggle',
        ),
      ];
    }
    $this->settings->set_fields($args);
  }
}