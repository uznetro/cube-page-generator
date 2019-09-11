<div class="my_meta_control_url">
  <p><a href="#" class="dodelete-s_group button">全て削除</a></p>
	<?php while($mb->have_fields_and_multi('s_group')): ?>
	<?php $mb->the_group_open(); ?>
		<?php $mb->the_field('s_field'); ?>
		<select name="<?php $mb->the_name(); ?>">
      <?php /*<option value="test-plan"<?php $mb->the_select_state('test-plan'); ?>>post_type_plan TEST</option>*/?>
			<option value="">----共通設定----</option>
      <option value="all-hotel"<?php $mb->the_select_state('all-hotel'); ?>>全て共通</option>
			<option value="">----北陸エリア----</option>
      <option value="unazuki-gh"<?php $mb->the_select_state('unazuki-gh'); ?>>宇奈月</option>
			<option value="kinpaso"<?php $mb->the_select_state('kinpaso'); ?>>金波荘</option>
			<option value="newmaruya"<?php $mb->the_select_state('newmaruya'); ?>>NEW MARUYA</option>
			<option value="newmaruya-bk"<?php $mb->the_select_state('newmaruya-bk'); ?>>NEW MARUYA別館</option>
			<option value="yataya"<?php $mb->the_select_state('yataya'); ?>>矢田屋</option>
			<option value="awazu-gh"<?php $mb->the_select_state('awazu-gh'); ?>>あわづ本館</option>
			<option value="awazu-bk"<?php $mb->the_select_state('awazu-bk'); ?>>あわづ別館</option>
			<option value="saichoraku"<?php $mb->the_select_state('saichoraku'); ?>>彩朝楽</option>
			<option value="yamanaka-gh"<?php $mb->the_select_state('yamanaka-gh'); ?>>山中グランドホテル</option>
			<option value="hana-saichoraku"<?php $mb->the_select_state('hana-saichoraku'); ?>>花・彩朝楽</option>
			<option value="yoshinoyairokuen"<?php $mb->the_select_state('yoshinoyairokuen'); ?>>よしのや依緑園</option>
			<option value="seiunkaku"<?php $mb->the_select_state('seiunkaku'); ?>>青雲閣</option>
			<option value="">----東海エリア----</option>
			<option value="toba-saichoraku"<?php $mb->the_select_state('toba-saichoraku'); ?>>鳥羽彩朝楽</option>
			<option value="shima-saichoraku"<?php $mb->the_select_state('shima-saichoraku'); ?>>志摩彩朝楽</option>
			<option value="enakyo-kh"<?php $mb->the_select_state('enakyo-kh'); ?>>恵那峡国際ホテル</option>
			<option value="gero-saichoraku"<?php $mb->the_select_state('gero-saichoraku'); ?>>下呂彩朝楽本館</option>
			<option value="gero-saichoraku-bk"<?php $mb->the_select_state('gero-saichoraku-bk'); ?>>下呂彩朝楽別館</option>
			<option value="">----近畿エリア----</option>
      <option value="shirahama-saichoraku"<?php $mb->the_select_state('shirahama-saichoraku'); ?>>白浜彩朝楽</option>
			<option value="shirahamagyoen"<?php $mb->the_select_state('shirahamagyoen'); ?>>白浜御苑</option>
			<option value="senjo"<?php $mb->the_select_state('senjo'); ?>>ホテル千畳</option>
			<option value="koshinoyu"<?php $mb->the_select_state('koshinoyu'); ?>>越之湯</option>
			<option value="miyoshiya"<?php $mb->the_select_state('miyoshiya'); ?>>三好屋</option>
			<option value="">----中国エリア----</option>
			<option value="terunoyu"<?php $mb->the_select_state('terunoyu'); ?>>輝乃湯</option>
			<option value="kaike-saichoraku"<?php $mb->the_select_state('kaike-saichoraku'); ?>>皆生彩朝楽</option>
			<option value="saikibekkan"<?php $mb->the_select_state('saikibekkan'); ?>>斉木別館</option>
			<option value="">----四国・九州エリア----</option>
			<option value="dogo-saichoraku"<?php $mb->the_select_state('dogo-saichoraku'); ?>>道後彩朝楽</option>
			<option value="ureshinokan"<?php $mb->the_select_state('ureshinokan'); ?>>嬉野館</option>
      <option value="ranpu"<?php $mb->the_select_state('ranpu'); ?>>蘭風</option>
      <option value="unzen-toyokan"<?php $mb->the_select_state('unzen-toyokan'); ?>>雲仙東洋館</option>
		</select>
    <br>
		<?php $mb->the_field('i_field'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>

	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>

	<p><a href="#" class="docopy-s_group button">Add</a></p>
	<input type="submit" class="button-primary" name="save" value="save">
</div>
