<?php
/*
Plugin Name: Cube Page Generator
Plugin URI:
Description: Cube Page Generator Allows You to Generate Freely Content (trial version :)
Author: Shota Niimi
Version: 1.2
Author URI: http://uznetro.net/
*/

//plugin admin setting style
add_action('admin_init', 'add_init');
add_action('admin_menu','add_menu');
function add_init(){
  // CSS登録 http://[site domain]/wp-content/plugins/csv_up/css/csv-upload.css
  wp_register_style('cpg_admin', plugins_url('css/cpg_admin.css', __FILE__));
  wp_enqueue_style('cpg_admin');
  //script登録
  wp_register_script('cpg_admin_sc',plugins_url('js/cpg_option.js',__FILE__));
  wp_enqueue_script('cpg_admin_sc');
}
function add_menu(){

}
//setup variables
defined( 'ABSPATH' ) or die( 'Nope, not accessing this' );
define( 'CPG_VERSION', '1.0.0' );
define( 'CPG_DIR', dirname( __FILE__ ) );
define( 'CPG_URL', plugins_url( 'cube-page-generator' ) );

//テンプレートフォルダを呼び出し
$cpg_sub_dir = trailingslashit(dirname(__FILE__)) . 'snippets/';
opendir($cpg_sub_dir);
while(($ent = readdir()) !== false) {
  if(!is_dir($ent) && strtolower(substr($ent,-4)) == ".php") {
    include_once($cpg_sub_dir.$ent);
  }
}
closedir();
