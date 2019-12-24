<?php
namespace Includes\Base;

require_once plugin_dir_path(__FILE__).'BaseController.php';
use \Includes\Base\BaseController;

class Enqueue extends BaseController {
  public function register(){
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  public function enqueue(){
    // enqueue all the scripts
    wp_enqueue_style('my plugin style', $this->plugin_url.'assets/style.css');
    wp_enqueue_script('my plugin script', $this->plugin_url.'assets/myscript.js');
  }
}