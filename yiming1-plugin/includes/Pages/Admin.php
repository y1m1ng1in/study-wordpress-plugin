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

class Admin extends BaseController {
  public $settings;

  public $subpages;

  public $admin_pages;

  public $callbacks;

  public function register(){
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();
    $this->callback_manager = new ManagerCallbacks();

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
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'cpt_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'taxonomy_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'media_widget',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'gallery_manager',
        'callback' =>array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'testimonial_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'templates_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'login_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'membership_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
      [
        'option_group' => 'yiming1_plugin_settings',
        'option_name' => 'chat_manager',
        'callback' => array($this->callback_manager, 'checkbox_sanitize'),
      ],
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
    $args = [
      [
        'id' => 'cpt_manager', # must identical to the option name
        'title' => 'Activate Custom Post Type',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'cpt_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'taxonomy_manager', # must identical to the option name
        'title' => 'Activate Taxonomy Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'taxonomy_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'media_widget', # must identical to the option name
        'title' => 'Activate Media Widget',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'media_widget',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'gallery_manager', # must identical to the option name
        'title' => 'Activate Gallery Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'gallery_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'testimonial_manager', # must identical to the option name
        'title' => 'Activate Testimonial Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'testimonial_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'templates_manager', # must identical to the option name
        'title' => 'Activate Templates Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'templates_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'login_manager', # must identical to the option name
        'title' => 'Activate Login Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'login_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'membership_manager', # must identical to the option name
        'title' => 'Activate Membership Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'membership_manager',
          'class' => 'ui-toggle',
        ),
      ],
      [
        'id' => 'chat_manager', # must identical to the option name
        'title' => 'Activate Chat Manager',
        'callback' => array($this->callback_manager, 'checkbox_field'),
        'page' => 'yiming1_plugin', # refer to the menu slug
        'section' => 'yiming1_admin_index', # section id
        'args' => array(
          'label_for' => 'chat_manager',
          'class' => 'ui-toggle',
        ),
      ],
    ];
    $this->settings->set_fields($args);
  }
}