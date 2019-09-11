<?php

/*Functions for creating the metaboxes
********************************************/
include_once( CPG_DIR . "/lib/metaboxes/wpalchemy/MetaBox_1.6.1.php" );
include_once( CPG_DIR . "/lib/metaboxes/wpalchemy/MediaAccess_0.2.2.php" );
//include_once plugin_dir_path(__FILE__) . 'lib/metaboxes/wpalchemy/MetaBox_1.6.1.php';
//include_once plugin_dir_path(__FILE__) . 'lib/metaboxes/wpalchemy/MediaAccess_0.2.2.php';
$wpalchemy_media_access = new WPAlchemy_MediaAccess(); //インスタンスの生成

add_action( 'init', 'metabox_style' );
function metabox_style() {
  if ( is_admin() ){
    wp_enqueue_script( 'wpalchemy-metabox-js', CPG_URL . '/lib/metaboxes/meta.js', array(), '1.0', true );
    wp_enqueue_style( 'wpalchemy-metabox-css', CPG_URL . '/lib/metaboxes/meta.css' );
  }
}

$tmp_cpg_options = array(
  'cpg_post_type' => 'post',
  'cpg_post_name' => 'post',
  'cpg_visual_field' => '1',
  'cpg_content_field' => '0',
  'cpg_banner_field' => '0',
  'cpg_planurl_field' => '0',
  'cpg_default_editor' => '1',
); 

//CPG設定で選択された投稿タイプのでデフォルトエディター削除
add_action( 'init' , 'remove_post_editor_support' );
function remove_post_editor_support() {  
  $vals = get_option('cpg_options_ary2');
  if(! $vals)
  $vals = array($tmp_cpg_options);

  foreach($vals as $inkey => $inVals){
    $cpg_post_type    =  esc_attr( $inVals['cpg_post_type'] );
    $cpg_default_editor    =  esc_attr( $inVals['cpg_default_editor'] );

    if($cpg_default_editor != 1 )
    remove_post_type_support( $cpg_post_type, 'editor' );    
  }  
}

//DBよりカスタム設定の値を取得
$vals = get_option('cpg_options_ary2');
if(! $vals)
  $vals = array($tmp_cpg_options);  

foreach($vals as $inkey => $inVals){  
  $cpg_post_type    =  esc_attr( $inVals['cpg_post_type'] );
  $cpg_visual_field  = esc_attr( $inVals['cpg_visual_field'] );
  $cpg_content_field = esc_attr( $inVals['cpg_content_field'] );
  $cpg_banner_field  = esc_attr( $inVals['cpg_banner_field'] );
  $cpg_planurl_field = esc_attr( $inVals['cpg_planurl_field'] );

  if(isset($cpg_post_type)){

      //Meta Field設定を定義
  if ( $cpg_visual_field > 0 ) {
    $mainvisual_media = new WPAlchemy_MetaBox(array(
      'id' => 'mainvisiual',
      'title' => 'MainVisual Add',
      'template' => CPG_DIR . '/lib/metaboxes/mainvisiual-meta.php',
      //'template' => plugin_dir_path(__FILE__) . 'lib/metaboxes/mainvisiual-meta.php',
      'types' => array($cpg_post_type),
      //'types' => array('post','plan'),
      //'mode' => WPALCHEMY_MODE_EXTRACT,
    ));
    }
  
    if ( $cpg_content_field > 0 ) {
    $content_reditor = new WPAlchemy_MetaBox(array(
      'id' => 'content_reditor',
      'title' => 'Repeating Content',
      'template' => CPG_DIR . '/lib/metaboxes/repeating-content-meta.php',
      'types' => array($cpg_post_type),
      //'mode' => WPALCHEMY_MODE_EXTRACT,
    ));
    }
  
    if( $cpg_banner_field > 0 ) {
    $banner_media = new WPAlchemy_MetaBox(array(
      'id' => 'pr_banner',
      'title' => 'PR Banner',
      'template' => CPG_DIR . '/lib/metaboxes/banner-media-meta.php',
      'types' => array($cpg_post_type),
      //'mode' => WPALCHEMY_MODE_EXTRACT,
    ));
    }
  
    if( $cpg_planurl_field > 0 ) {
    $planurl_combobox = new WPAlchemy_MetaBox(array(
      'id' => 'plan_url_box',
      'title' => 'Plan URL',
      'template' => CPG_DIR . '/lib/metaboxes/urlbox-meta.php',
      'types' => array($cpg_post_type),
      //'mode' => WPALCHEMY_MODE_EXTRACT,
    ));
    }

  }
  
}