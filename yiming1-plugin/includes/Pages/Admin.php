<?php
namespace Includes\Pages;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\includes\Base\BaseController.php';
require_once plugin_dir_path(dirname(__FILE__, 2)).'\includes\Api\SettingsApi.php';

use \Includes\Base\BaseController;
use \Includes\Api\SettingsApi;

class Admin extends BaseController {
  public $settings;

  public function __construct(){
    $this->settings = new SettingsApi();
  }

  public function register(){
    $pages = [
      [
        'page_title' => 'Yiming1 Plugin', 
        'menu_title' => 'Yiming', 
        'capability' => 'manage_options', 
        'menu_slug' => 'yiming1_plugin', 
        'callback' => function(){echo '<h1>p</h1>';}, 
        'icon_url' => 'dashicons-store', 
        'position' => 110
      ]
    ];
    $this->settings->add_pages($pages)->register();
  }
}