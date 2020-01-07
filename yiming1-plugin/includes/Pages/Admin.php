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

    $this->set_settings();
    $this->set_sections();
    $this->set_fields();

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
        'position' => 110,
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
        'callback' => array($this->callbacks, 'admin_cpt'),
      ], # subpages don't have icon url and position
      [
        'parent_slug' => 'yiming1_plugin', 
        'page_title' => 'Custom Taxonomies',
        'menu_title' => 'Taxonomies', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_taxonomies', 
        'callback' => array($this->callbacks, 'admin_taxonomy'),
      ], # subpages don't have icon url and position
      [
        'parent_slug' => 'yiming1_plugin', 
        'page_title' => 'Custom Widgets',
        'menu_title' => 'Widgets', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_widgets', 
        'callback' => array($this->callbacks, 'admin_widget'),
      ], # subpages don't have icon url and position
    ];
  }

  public function set_settings(){
    $args = [
      [
        'option_group' => 'yiming1_option_group',
        'option_name' => 'text_example',
        'callback' => array($this->callbacks, 'yiming1_options_group'),
      ],
      [
        'option_group' => 'yiming1_option_group',
        'option_name' => 'first_name',
      ],
    ];
    $this->settings->set_settings($args);
  }

  public function set_sections(){
    $args = [
      [
        'id' => 'yiming1_admin_index',
        'title' => 'Settings',
        'callback' => array($this->callbacks, 'yiming1_admin_section'),
        'page' => 'yiming1_plugin', # refer to the menu slug
      ],
    ];
    $this->settings->set_sections($args);
  }

  public function set_fields(){
    $args = [
      [
        'id' => 'text_example', # must identical to the option name
        'title' => 'text example',
        'callback' => array($this->callbacks, 'yiming1_text_example'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'text_example',
          'class' => 'example-class',
        ),
      ],
      [
        'id' => 'first_name', # must identical to the option name
        'title' => 'first name',
        'callback' => array($this->callbacks, 'yiming1_first_name'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'first_name',
          'class' => 'example-class',
        ),
      ],
    ];
    $this->settings->set_fields($args);
  }
}