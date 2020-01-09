<?php
namespace Includes\Base;

class Activate {
  public static function activate(){
    flush_rewrite_rules();
    
    if(get_option('yiming1_plugin')){
      return;
    }
    // Otherwise, initialize db entry "option_value" with an empty array
    // as "a:1:{}"
    $default = array();
    update_option('yiming1_plugin', $default);
  }
}