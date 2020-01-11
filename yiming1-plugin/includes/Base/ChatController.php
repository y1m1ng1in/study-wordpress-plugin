<?php
namespace Includes\Base;

require_once plugin_dir_path(__FILE__).'BaseController.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\SettingsApi.php';
require_once plugin_dir_path(dirname(__FILE__)).'\Api\Callbacks\AdminCallbacks.php';

use \Includes\Api\SettingsApi;
use \Includes\Api\Callbacks\AdminCallbacks;

class ChatController extends BaseController {
  public $callbacks;

  public $subpages = array();

  public function register(){
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $option = get_option('yiming1_plugin');
    $activated = (isset($option['chat_manager'])) ? $option['chat_manager'] : false;

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
        'page_title' => 'Chat Manager',
        'menu_title' => 'Chat', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin_chat', 
        'callback' => array($this->callbacks, 'admin_chat'),
      ], # subpages don't have icon url and position
    ];
  }
}