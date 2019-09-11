<?php

/*Custom Setting Menu Modules
********************************************/
add_action('admin_menu', 'cpg_add_menu');
function cpg_add_menu(){
  add_menu_page(
    'CPG SET', 
    'CPG SET', 
    'level_8', 
    __FILE__, 
    'cpg_set', 
    'dashicons-carrot',
    81
  );
}

add_shortcode('scinfo','info_short_code');
function info_short_code() {
  return "hello shorcode";
}

function cpg_set(){

    //template-data-array
    // $cpg_options = array(      
    //   'post' => array(
    //     'cpg_post_type' => 'post',
    //     'cpg_post_name' => 'post',
    //     'cpg_visual_field' => '1',
    //     'cpg_content_field' => '0',
    //     'cpg_banner_field' => '0',
    //     'cpg_planurl_field' => '0',
    //     'cpg_default_editor' => '1',
    //   ),
    //   'page' => array(
    //     'cpg_post_type' => 'page',
    //     'cpg_post_name' => 'ページ作成',
    //     'cpg_visual_field' => '1',
    //     'cpg_content_field' => '0',
    //     'cpg_banner_field' => '0',
    //     'cpg_planurl_field' => '0',
    //     'cpg_default_editor' => '1',
    //   ),
    //   'plan' => array(
    //     'cpg_post_type' => 'plan',
    //     'cpg_post_name' => 'カスタム投稿テスト',
    //     'cpg_visual_field' => '1',
    //     'cpg_content_field' => '0',
    //     'cpg_banner_field' => '0',
    //     'cpg_planurl_field' => '0',
    //     'cpg_default_editor' => '1',
    //   ),
    // );

    $vals = array();
    $version = 2;
    $cpg_post_count = 1;
    if($version == 2){
        //template-array
        $tmp_cpg_options = array(
          'cpg_post_type' => 'post',
          'cpg_post_name' => 'post',
          'cpg_visual_field' => '1',
          'cpg_content_field' => '0',
          'cpg_banner_field' => '0',
          'cpg_planurl_field' => '0',
          'cpg_default_editor' => '1',
        );        
        
        //global $wpdb;
        //var_dump($wpdb);        
        //$vals = $wpdb->get_results("SELECT * FROM wp_options WHERE option_name = 'cpg_options_ary2'");                
        $vals = get_option('cpg_options_ary2');
        if(! $vals){          
          $vals = array($tmp_cpg_options);
        }else{
          $cpg_post_count = count($vals);
        }        
        // var_dump($vals);
        // var_dump($cpg_post_count);        

        //update        
        if(! empty($_POST) && check_admin_referer('cpg_post','cpg_nonce_field'))
        if(count($_POST) != 0){
          $post_data = stripslashes_deep($_POST);
          $cpg_post_count = $post_data['cpg_post_count'];
          $_vals = array();
          for($i = 0 ; $i < $cpg_post_count ; $i++){
            $_innervals = array();
            foreach($tmp_cpg_options as $key => $val){
              if($key != 'error_mes'){
                if($key != 'cpg_post_type' && $key != 'cpg_post_name'){                  
                  $_innervals[$key] = isset($post_data[$i.'_'.$key]) ? 1: 0;
                }else{                  
                  $_innervals[$key] = $post_data[$i.'_'.$key];                
                }
              }            
            }
            $_vals[$i] = $_innervals;            
          }
          $vals = $_vals;          
          //$wpdb->update( 'wp_options', $_vals, array('option_name' => 'cpg_options_ary2'), $format = null, $where_format = null );
          update_option('cpg_options_ary2',$vals);
        }

    }


    // //inset
    // $vals = get_option('cpg_options_ary');
    // if(! $vals){
    //   $vals = $cpg_options;//空データの場合はセット      
    // }    
    
    // //update entry
    // if(! empty($_POST) && check_admin_referer('cpg_post','cpg_nonce_field'))    
    // if (count($_POST) != 0) {
    //   $post_data = stripslashes_deep($_POST);
    //   $_vals = array();    
    //   foreach($cpg_options as $inkey => $inVal){
    //     $_innervals = array();      
    //       foreach($inVal as $key => $val ){            
    //         if($key != 'error_mes'){
    //           if($key != 'cpg_post_type' && $key != 'cpg_post_name' ){
    //             $_innervals[$key] =  isset($post_data[$inkey.'_'.$key]) ? 1 : 0;//post data to updatevals
    //           }else{
    //             $_innervals[$key] =  $post_data[$inkey.'_'.$key];//post data to updatevals
    //           }            
    //         }
    //       }
    //       $_vals[$inkey] = $_innervals;        
    //   }
    //   $vals = $_vals;
    //   update_option('cpg_options_ary',$vals);
    // }      

?>

<div class="wrap">
<h2>設定サンプル</h2>
<?php
// 更新完了を通知
  if (isset($_POST['cpg_post_type'])) {
      echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
          <p><strong>設定を保存しました。</strong></p></div>';
  }
?>
<form method="post" action="">
<label for="cpg_post_type">投稿タイプ／ラベル／フィールド選択</label>

<!-- <table class="wp-list-table widefat fixed striped pages">
	<thead>
	<tr>
    <th scope="col" id="fields" class="manage-column column-fields">Type</th>
    <th scope="col" id="fields" class="manage-column column-fields">Label</th>
    <th scope="col" id="fields" class="manage-column column-fields">Main Visual</th>
    <th scope="col" id="fields" class="manage-column column-fields">Main Content</th>
    <th scope="col" id="fields" class="manage-column column-fields">PR Banner</th>
    <th scope="col" id="fields" class="manage-column column-fields">Plan Url</th>
    <th scope="col" id="fields" class="manage-column column-fields">Default Editor</th>
    <th scope="col" id="fields" class="manage-column column-fields"></th>
  </tr>
  </thead>
	<tbody id="cpg-select-table">
    <tr class="no-items"><td class="colspanchange" colspan="8">フィールドグループが見つかりません</td></tr>    
    <?php foreach ($vals as $fkey => $fval) : ?>
      <tr class="cpg-select-field" >
        <td class="i1" ><input name="<?php echo $fkey ?>_cpg_post_type"     type="textbox"  id="<?php echo $fkey ?>_cpg_post_type"     value="<?php echo $fval['cpg_post_type'] ?>" /></td>
        <td class="i2" ><input name="<?php echo $fkey ?>_cpg_post_name"     type="textbox"  id="<?php echo $fkey ?>_cpg_post_name"     value="<?php echo $fval['cpg_post_name'] ?>" /></td>
        <td class="i3" ><input name="<?php echo $fkey ?>_cpg_visual_field"  type="checkbox" id="<?php echo $fkey ?>_cpg_visual_field"  value="1" <?php checked( 1, $fval['cpg_visual_field']); ?> /></td>
        <td class="i4" ><input name="<?php echo $fkey ?>_cpg_content_field" type="checkbox" id="<?php echo $fkey ?>_cpg_content_field" value="1" <?php checked( 1, $fval['cpg_content_field']); ?> /></td>
        <td class="i5" ><input name="<?php echo $fkey ?>_cpg_banner_field"  type="checkbox" id="<?php echo $fkey ?>_cpg_banner_field"  value="1" <?php checked( 1, $fval['cpg_banner_field']); ?> /></td>
        <td class="i6" ><input name="<?php echo $fkey ?>_cpg_planurl_field" type="checkbox" id="<?php echo $fkey ?>_cpg_planurl_field" value="1" <?php checked( 1, $fval['cpg_planurl_field']); ?> /></td>
        <td class="i7" ><input name="<?php echo $fkey ?>_cpg_default_editor" type="checkbox" id="<?php echo $fkey ?>_cpg_planurl_field" value="1" <?php checked( 1, $fval['cpg_default_editor']); ?> /></td>
        <td><a class="button" id="location-remove-option" href="#">削除</a></td>
      </tr>
    <?php endforeach; ?>    
  </tbody>
</table> -->

<ul id="cpg-select-table" >
<?php foreach ($vals as $fkey => $fval) : ?>
<li class="cpg-select-field" style="border-bottom: darkgray;border-width: 2px;border-bottom-style: dotted;padding-bottom: 6px;" >
  <label class="i1" >type:<input name="<?php echo $fkey ?>_cpg_post_type"     type="text"  id="<?php echo $fkey ?>_cpg_post_type"     value="<?php echo $fval['cpg_post_type'] ?>" /></label>&emsp;
  <label class="i2" >label:<input name="<?php echo $fkey ?>_cpg_post_name"     type="text"  id="<?php echo $fkey ?>_cpg_post_name"     value="<?php echo $fval['cpg_post_name'] ?>" /></label>&emsp;
  <label class="i3" ><input name="<?php echo $fkey ?>_cpg_visual_field"  type="checkbox" id="<?php echo $fkey ?>_cpg_visual_field"  value="1" <?php checked( 1, $fval['cpg_visual_field']); ?> /> Main Visual</label>&emsp;
  <label class="i4" ><input name="<?php echo $fkey ?>_cpg_content_field" type="checkbox" id="<?php echo $fkey ?>_cpg_content_field" value="1" <?php checked( 1, $fval['cpg_content_field']); ?> /> Main Content</label>&emsp;
  <label class="i5" ><input name="<?php echo $fkey ?>_cpg_banner_field"  type="checkbox" id="<?php echo $fkey ?>_cpg_banner_field"  value="1" <?php checked( 1, $fval['cpg_banner_field']); ?> /> PR Banner</label>&emsp;
  <label class="i6" ><input name="<?php echo $fkey ?>_cpg_planurl_field" type="checkbox" id="<?php echo $fkey ?>_cpg_planurl_field" value="1" <?php checked( 1, $fval['cpg_planurl_field']); ?> />Plan Url</label>
  <label class="i7" ><input name="<?php echo $fkey ?>_cpg_default_editor" type="checkbox" id="<?php echo $fkey ?>_cpg_planurl_field" value="1" <?php checked( 1, $fval['cpg_default_editor']); ?> />Default Editor</label>
  <a class="button" id="location-remove-option" href="#">削除</a>
</li>
<?php endforeach; ?>
</ul>

<p><a class="button location-add-opton" href="#">投稿タイプ設定の追加</a></p>
<p>1.投稿タイプを追加、「type」に識別子を入力「label」は任意</p>
<p>2.フィールド選択で利用したいデザインフィールドを選択</p>
<!--▼nonce-->
<input type="hidden" name="cpg_post_count" id="cpg_post_count" value="<?php echo $cpg_post_count; ?>" />
<?php wp_nonce_field('cpg_post','cpg_nonce_field'); ?>
<?php submit_button(); ?>
<!--▼DEBUG-->
</form>
<!-- <button>ボタン</button> -->
<p class="alignR mt50"><a href="mailto:info@uznetro.net">&raquo;&nbsp;Support/Bug Report</a></p>
</div><!--/.wrap-->
<?php
}