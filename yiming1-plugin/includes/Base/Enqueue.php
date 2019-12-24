<?php
namespace Includes\Base;

class Enqueue {
  public function register(){
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  public function enqueue(){
    // enqueue all the scripts
    wp_enqueue_style('my plugin style', PLUGIN_URL.'assets/style.css');
    wp_enqueue_script('my plugin script', PLUGIN_URL.'assets/myscript.js');
  }
}