<?php
namespace Includes\Api\Callbacks;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\Base\BaseController.php';

use Includes\Base\BaseController;

class AdminCallbacks extends BaseController {
  public function admin_dashboard(){
    return require_once("$this->plugin_path/templates/admin.php");
  }

  public function admin_cpt(){
    return require_once("$this->plugin_path/templates/cpt.php");
  }

  public function admin_taxonomy(){
    return require_once("$this->plugin_path/templates/taxonomy.php");
  }

  public function admin_widget(){
    return require_once("$this->plugin_path/templates/widget.php");
  }

  public function yiming1_options_group($input){
    return $input;
  }

  public function yiming1_admin_section(){
    echo 'check section';
  }

  public function yiming1_text_example(){
    $value = esc_attr(get_option('text_example'));

    // the input name must identical to the field id decleard in Admin.php
    echo '<input type="text" class="regular-text" name="text_example" 
      value="'. $value .'"></input>';
  }

  public function yiming1_first_name(){
    $value = esc_attr(get_option('first_name'));

    // the input name must identical to the field id decleard in Admin.php
    echo '<input type="text" class="regular-text" name="first_name" 
      value="'. $value .'"></input>';
  }
}