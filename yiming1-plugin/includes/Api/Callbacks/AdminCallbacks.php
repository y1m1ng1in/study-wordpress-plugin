<?php
namespace Includes\Api\Callbacks;

require_once plugin_dir_path(dirname(__FILE__, 2)).'\Base\BaseController.php';

use Includes\Base\BaseController;

class AdminCallbacks extends BaseController {
  public function admin_dashboard(){
    return require_once("$this->plugin_path/templates/admin.php");
  }
}