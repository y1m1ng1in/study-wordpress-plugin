<?php
namespace Includes\Base;

class Activate {
  public static function activate(){
    flush_rewrite_rules();
    
    $default = array();
    if(!get_option('yiming1_plugin')){
      // initialize db entry "option_value" with an empty array
      // as "a:1:{}"
      update_option('yiming1_plugin', $default);
    }
    if(!get_option('yiming1_plugin_cpt')){
      update_option('yiming1_plugin_cpt', $default);
    }
  }
}