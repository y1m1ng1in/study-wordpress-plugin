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

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if(class_exists('Includes\\Init')){
  Includes\Init::register_services();
}
