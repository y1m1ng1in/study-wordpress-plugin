<?php
namespace Includes;

require_once plugin_dir_path(__FILE__).'Pages\Dashboard.php';
require_once plugin_dir_path(__FILE__).'Base\Enqueue.php';
require_once plugin_dir_path(__FILE__).'Base\SettingsLinks.php';
require_once plugin_dir_path(__FILE__).'Base\CustomPostTypeController.php';

final class Init { 
  public static function get_services(){
    return [
      Base\Enqueue::class,
      Base\SettingsLinks::class,
      Pages\Dashboard::class,
      Base\CustomPostTypeController::class,
    ];
  }

  public static function register_services(){
    foreach(self::get_services() as $class){
      $service = self::instantiate($class);
      if(method_exists($service, 'register')){
        $service->register();
      }
    }
  }

  private static function instantiate($class){
    $service = new $class();
    return $service;
  }
}
