<?php
namespace Includes\Pages;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\includes\Base\BaseController.php';
use \Includes\Base\BaseController;

class Admin extends BaseController {
  public function register(){
    add_action('admin_menu', array($this, 'add_admin_pages'));
  }

  public function add_admin_pages(){
    add_menu_page('Yiming1 Plugin', 'Yiming', 'manage_options', 
      'yiming1_plugin', array($this, 'admin_index'), 'dashicons-store', null);
  }

  public function admin_index(){
    // require templates
    require_once $this->plugin_path.'/templates/admin.php';
  }
}