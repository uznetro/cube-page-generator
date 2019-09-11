<?php global $wpalchemy_media_access; ?>
<div>
    <p><a href="#" class="dodelete-banner-filed button">全て削除</a></p>
    <ul class="meta-media">
    <?php while($mb->have_fields_and_multi('banner-filed')): ?>
    <?php $mb->the_group_open(); ?>
        <?php $mb->the_field('imgurl'); ?>
        <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('追加'); ?>
        <li class="media-item">
          <div class="hndle-cell">
            <span class="hndle"><img src="<?php echo plugins_url() . '/cube-page-generator/lib/metaboxes/img/drag_reorder_24_gr.png' ; ?>" /></span>
          </div>
          <div class="field-cell">
            <!--start image box-->
            <p style="margin:0"><img style="max-width:100%;" src="<?php echo $mb->get_the_value(); ?>"></p>
            <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?>
            <!--start url box-->
            <?php $mb->the_field('banner-url-filed'); ?>
            <input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="リンクを入力"/>
            <p><a href="#" class="dodelete button">X</a></p>
          </div>
        </li>
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
    </ul>
    <p class="docopy-banner-filed"><a href="#" class="button">イメージの追加</a></p>
    <p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>
</div>
<style>
.hndle-cell {
  display: table-cell; vertical-align: middle; padding: 0 10px; background:#b5b5b5;
}
.field-cell {
  display: table-cell; padding: 10px 0px 0 15px; border: 1px solid #b5b5b5; width: 100%; border-left: 0;
}
</style>