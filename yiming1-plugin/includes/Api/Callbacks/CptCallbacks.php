<?php
namespace Includes\Api\Callbacks;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\Base\BaseController.php';

use Includes\Base\BaseController;

class CptCallbacks {
  public function cpt_section_manager(){
    echo 'Create as many custom post types as you want';
  }

  public function cpt_sanitize($input){
    $output = get_option('yiming1_plugin_cpt');

    if(isset($_POST['remove'])){
      unset($output[$_POST['remove']]);
      return $output;
    }

    if(count($output) == 0){
      $output[$input['post_type']] = $input;
      return $output;
    }
    
    foreach($output as $post_type => $type_item){
      if($post_type === $input['post_type']){
        $output[$post_type] = $input;
      } else {
        $output[$input['post_type']] = $input;
      }
    }

    return $output;
  }

  public function text_field($args){
    $name = $args['label_for'];
    $option_name = $args['option_name'];
    $input = get_option($option_name);

    echo '<input type="text" class="regular-test" id="' . $name . 
         '" name="'. $option_name . '['. $name .']" value="" placeholder="'
         . $args['placeholder'] .'">';
  }

  public function checkbox_field($args){
    $name = $args['label_for'];
    $class = $args['class'];
    $option_name = $args['option_name'];
    $checkbox = get_option($option_name);

    echo '<div class="' . $class . '"><input type="checkbox"  id="'
      . $name .'" name="'. $option_name . '[' . $name . ']' . '" value="1" class="'. $class .'"' 
      . '><label for="'
      . $name .'"><div></div></label></div>';
  }
}