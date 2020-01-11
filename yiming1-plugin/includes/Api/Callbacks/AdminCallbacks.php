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

  public function admin_gallery(){
    return require_once("$this->plugin_path/templates/gallery.php");
  }

  public function admin_testimonial(){
    return require_once("$this->plugin_path/templates/testimonial.php");
  }

  public function admin_templates(){
    return require_once("$this->plugin_path/templates/template.php");
  }

  public function admin_login(){
    return require_once("$this->plugin_path/templates/login.php");
  }

  public function admin_membership(){
    return require_once("$this->plugin_path/templates/membership.php");
  }

  public function admin_chat(){
    return require_once("$this->plugin_path/templates/chat.php");
  }

  public function yiming1_options_group($input){
    return $input;
  }

  public function yiming1_admin_section(){
    echo 'check section';
  }
}