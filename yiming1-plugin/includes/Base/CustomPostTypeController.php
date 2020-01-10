<?php
namespace Includes\Base;

require_once plugin_dir_path(__FILE__).'BaseController.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\SettingsApi.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\Callbacks\AdminCallbacks.php';

use \Includes\Api\SettingsApi;
use \Includes\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController {
  public $callbacks;

  public $subpages = array();

  public function register(){
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $option = get_option('yiming1_plugin');
    $activated = (isset($option['cpt_manager'])) ? $option['cpt_manager'] : false;

    if(!$activated) return;

    $this->set_subpages();

    $this->settings
         ->add_subpages($this->subpages)
         ->register();

    add_action('init', array($this, 'activate'));
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
    ];
  }

  public function activate(){
    register_post_type('yiming1_events', 
                       [
                        'labels' => [
                          'name' => 'Events',
                          'singular_name' => 'Event'
                        ],
                        'public' => true,
                        'has_archive' => true,
                       ]);
  }
}