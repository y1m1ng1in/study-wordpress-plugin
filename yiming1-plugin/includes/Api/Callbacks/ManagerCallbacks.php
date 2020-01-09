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
    echo '<input type="checkbox" name="' . $name . '" value="1" class="' 
      . $classes . '" ' . ($checkbox ? 'checked' : '') . '>';
  }
}