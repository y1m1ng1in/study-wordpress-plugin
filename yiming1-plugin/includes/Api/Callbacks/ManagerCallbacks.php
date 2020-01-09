<?php
namespace Includes\Api\Callbacks;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\Base\BaseController.php';

use Includes\Base\BaseController;

class ManagerCallbacks extends BaseController {
  public function checkbox_sanitize($input){
    return (isset($input) ? true : false);
  }

  public function admin_section_manager(){
    echo 'Manager the sections of this plugin by activating checkboxs';
  }

  public function checkbox_field($args){
    $name = $args['label_for'];
    $class = $args['class'];
    $checkbox = get_option($name);
    echo '<div class="' . $class . '"><input type="checkbox"  id="'
      . $name .'" name="' . $name . '" value="1" class="'. $class .'"' 
      . ($checkbox ? 'checked' : '') . '><label for="'
      . $name .'"><div></div></label></div>';
  }
}