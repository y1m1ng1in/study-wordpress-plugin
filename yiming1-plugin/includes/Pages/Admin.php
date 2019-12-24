<?php
namespace Includes\Pages;

class Admin {
  public function register(){
    add_action('admin_menu', array($this, 'add_admin_pages'));
  }

  public function add_admin_pages(){
    add_menu_page('Yiming1 Plugin', 'Yiming', 'manage_options', 
      'yiming1_plugin', array($this, 'admin_index'), 'dashicons-store', null);
  }

  public function admin_index(){
    // require templates
    require_once PLUGIN_PATH.'/templates/admin.php';
  }
}