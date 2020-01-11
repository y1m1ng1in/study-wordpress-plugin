<?php
namespace Includes;

require_once plugin_dir_path(__FILE__).'Pages\Dashboard.php';
require_once plugin_dir_path(__FILE__).'Base\Enqueue.php';
require_once plugin_dir_path(__FILE__).'Base\SettingsLinks.php';
require_once plugin_dir_path(__FILE__).'Base\CustomPostTypeController.php';
require_once plugin_dir_path(__FILE__).'Base\TaxonomyController.php';
require_once plugin_dir_path(__FILE__).'Base\CustomWidgetController.php';
require_once plugin_dir_path(__FILE__).'Base\GalleryController.php';
require_once plugin_dir_path(__FILE__).'Base\TestimonialController.php';
require_once plugin_dir_path(__FILE__).'Base\TemplateController.php';
require_once plugin_dir_path(__FILE__).'Base\LoginController.php';
require_once plugin_dir_path(__FILE__).'Base\MembershipController.php';
require_once plugin_dir_path(__FILE__).'Base\ChatController.php';

final class Init { 
  public static function get_services(){
    return [
      Base\Enqueue::class,
      Base\SettingsLinks::class,
      Pages\Dashboard::class,
      Base\CustomPostTypeController::class,
      Base\TaxonomyController::class,
      Base\CustomWidgetController::class,
      Base\GalleryController::class,
      Base\TestimonialController::class,
      Base\TemplateController::class,
      Base\LoginController::class,
      Base\MembershipController::class,
      Base\ChatController::class,
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
