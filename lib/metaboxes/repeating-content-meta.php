<div class="my_meta_control">
  <p><a href="#" class="dodelete-repeating_textareas button">全て削除</a></p>
	<?php while( $mb->have_fields_and_multi( 'repeating_textareas' ) ): ?>

	<?php $mb->the_group_open(); ?>


	<div class="my_meta_control">
		<p>
			<?php
			//エラー修正版
				$mb->the_field('main_content');
				$mb_content = html_entity_decode($mb->get_the_value(), ENT_QUOTES, 'UTF-8');
				$mb_editor_id = sanitize_key($mb->get_the_name());
				$mb_settings = array('textarea_name'=>$mb->get_the_name(),'textarea_rows' => '10',);
				wp_editor( $mb_content, $mb_editor_id, $mb_settings );
			?>
		</p>
	</div>

  <p><a href="#" class="dodelete button">X</a></p>
  <hr>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p><a href="#" class="docopy-repeating_textareas button">コンテンツの追加</a></p>
	<p class="meta-save"><button type="submit" class="button-primary" name="save"><?php _e('Update');?></button></p>

</div>