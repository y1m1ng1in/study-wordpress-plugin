<?php
namespace Includes\Base;

class SettingsLinks {
  protected $plugin;

  function __construct(){
    $this->plugin = PLUGIN_NAME;
  }

  public function register(){
    add_filter("plugin_action_links_$this->plugin", array($this, 'settings_links'));
  }

  public function settings_links($links){
    $setting_link = '<a href="admin.php?page=yiming1_plugin">Settings</a>';
    array_push($links, $setting_link);
    return $links;
  }
}
