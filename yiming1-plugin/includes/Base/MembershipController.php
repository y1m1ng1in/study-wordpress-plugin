<?php
namespace Includes\Base;

require_once plugin_dir_path(__FILE__).'BaseController.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\SettingsApi.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\Callbacks\AdminCallbacks.php';

use \Includes\Api\SettingsApi;
use \Includes\Api\Callbacks\AdminCallbacks;

class MembershipController extends BaseController {
  public $callbacks;

  public $subpages = array();

  public function register(){
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $option = get_option('yiming1_plugin');
    $activated = (isset($option['membership_manager'])) ? $option['membership_manager'] : false;

    if(!$activated) return;

    $this->set_subpages();

    $this->settings
         ->add_subpages($this->subpages)
         ->register();
  }

  public function set_subpages(){
    $this->subpages = [
      [
        'parent_slug' => 'yiming1_plugin', 
        'page_title' => 'Membership Manager',
        'menu_title' => 'Membership', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_membership', 
        'callback' => array($this->callbacks, 'admin_membership'),
      ], # subpages don't have icon url and position
    ];
  }
}