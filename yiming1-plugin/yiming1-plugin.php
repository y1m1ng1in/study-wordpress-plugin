<?php
/**
 * @package yiming1 plugin
 */
/*
Plugin Name: yiming1 plugin
Plugin URI: 
Description: study wp plugin
Version: 1.0.0
Author: Yiming Lin
Author URI: 
*/

defined('ABSPATH') or die('you cannot access this file');

require_once plugin_dir_path(__FILE__).'/includes/Init.php';
use Includes;

if(class_exists('Includes\\Init')){
  Includes\Init::register_services();
}

require_once plugin_dir_path(__FILE__).'/includes/Base/Activate.php';
require_once plugin_dir_path(__FILE__).'/includes/Base/Deactivate.php';

use Includes\Base\Activate;
use Includes\Base\Deactivate;

function activate_yiming1_plugin(){
  Activate::activate();
}

function deactivate_yiming1_plugin(){
  Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_yiming1_plugin');
register_deactivation_hook(__FILE__, 'deactivate_yiming1_plugin');