<?php global $wpalchemy_media_access; ?>
<div>
    <p><a href="#" class="dodelete-mvisual-filed button">全て削除</a></p>
    <ul class="meta-media">
    <?php while($mb->have_fields_and_multi('mvisual-filed')): ?>
    <?php $mb->the_group_open(); ?>
        <?php $mb->the_field('imgurl'); ?>
        <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('追加'); ?>
        <li class="media-item">
            <p style="max-height:280px; overflow:hidden;"><img style="width:100%;max-width:680px;" src="<?php echo $mb->get_the_value(); ?>"></p>
            <span class="hndle"><img src="<?php echo plugins_url() . '/cube-page-generator/lib/metaboxes/img/drag_reorder_24_gr.png' ; ?>" /></span>
            <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?> <a href="#" class="dodelete button">X</a>
        </li>
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
    </ul>
    <p class="docopy-mvisual-filed"><a href="#" class="button">イメージの追加</a></p>
    <p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>
</div>
<script>
//.valで値を取得してなんかしたいのでTEST
// (function($){
//     //この要素指定でもOKだがリピートした時に引数が変更か追加されるかな？
//     // $('input[name="default_uploader_test[imgurl]"]').on("change paste keyup", function() {
//     //    alert($(this).val());
//     // });

//     $(function(){
//       $(".mediafield-img-n0").on("change paste keyup", 
//         function() {
//             alert($(this).val());
//         });
//     });
// })(jQuery);
</script>