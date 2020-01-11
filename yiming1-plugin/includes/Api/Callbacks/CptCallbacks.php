<?php
namespace Includes\Api\Callbacks;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\Base\BaseController.php';

use Includes\Base\BaseController;

class CptCallbacks {
  public function cpt_section_manager(){
    echo 'Create as many custom post types as you want';
  }

  public function cpt_sanitize($input){
    return $input;
  }

  public function text_field($args){
    $name = $args['label_for'];
    $option_name = $args['option_name'];
    $input = get_option($option_name);
    $value = $input[$name];

    echo '<input type="text" class="regular-test" id="' . $name . 
         '" name="'. $option_name . '['. $name .']" value="'. $value .'" placeholder="'
         . $args['placeholder'] .'">';
  }

  public function checkbox_field($args){
    $name = $args['label_for'];
    $class = $args['class'];
    $option_name = $args['option_name'];
    $checkbox = get_option($option_name);

    $checked = (isset($checkbox[$name])) ? ($checkbox[$name] ? true : false) : false;
    echo '<div class="' . $class . '"><input type="checkbox"  id="'
      . $name .'" name="'. $option_name . '[' . $name . ']' . '" value="1" class="'. $class .'"' 
      . ($checked ? 'checked' : '') . '><label for="'
      . $name .'"><div></div></label></div>';
  }
}