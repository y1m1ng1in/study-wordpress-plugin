<?php
namespace Includes\Base;

require_once plugin_dir_path(__FILE__).'BaseController.php';

use \Includes\Base\BaseController;

class SettingsLinks extends BaseController {
  public function register(){
    add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_links'));
  }

  public function settings_links($links){
    $setting_link = '<a href="admin.php?page=yiming1_plugin">Settings</a>';
    array_push($links, $setting_link);
    return $links;
  }
}
