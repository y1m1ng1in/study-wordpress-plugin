<?php
namespace Includes\Api\Callbacks;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\Base\BaseController.php';

use Includes\Base\BaseController;

class ManagerCallbacks extends BaseController {
  public function checkbox_sanitize($input){
    $output = array();
    foreach($this->managers as $id => $title){
      $output[$id] = isset($input[$id]) ? true : false;
    }
    return $output;
  }

  public function admin_section_manager(){
    echo 'Manager the sections of this plugin by activating checkboxs';
  }

  /*
  Example db entry in table "wp_options":
  option_name = "yiming1_plugin"
  option_value = 
    {
      s:11:"cpt_manager";b:1;s:16:"taxonomy_manager";b:1;s:12:"media_widget";
      b:0;s:15:"gallery_manager";b:1;s:19:"testimonial_manager";b:0;s:17:"templates_manager";
      b:0;s:13:"login_manager";b:0;s:18:"membership_manager";b:0;s:12:"chat_manager";b:0;
    }
  */
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