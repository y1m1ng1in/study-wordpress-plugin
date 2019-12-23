<?php

class Yiming1PluginActivate {
  public static function activate(){
    flush_rewrite_rules();
  }
}