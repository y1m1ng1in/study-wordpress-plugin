<?php

class Yiming1PluginDeactivate {
  public static function deactivate(){
    flush_rewrite_rules();
  }
}