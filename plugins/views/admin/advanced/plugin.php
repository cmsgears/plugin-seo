<?php
$model		= $plugin->model;
$formClass	= $plugin->pluginModelClass;
$apixBase	= $plugin->apixBase;

$form = new $formClass( [ 'model' => $model ] );

$className = $form->getClassName();

$themeTemplates = Yii::getAlias( '@themes/admin/views/templates' );
?>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Advanced SEO</div>
	</div>
	<div class="box-content" cmt-app="core" cmt-controller="default" cmt-action="default" action="<?= "$apixBase/plugin?id=$model->id" ?>" cmt-keep>
		<?php include "$themeTemplates/components/spinners/form.php"; ?>
		<input type="hidden" name="pluginId" value="<?= $plugin->id ?>" />
		<input type="hidden" name="formType" value="plugins" />
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Classification</label>
					<input type="text" name="<?= $className ?>[classification]" placeholder="Classification" value="<?= $form->classification ?>" />
					<span class="error" cmt-error="<?= $className ?>[classification]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Language</label>
					<input type="text" name="<?= $className ?>[language]" placeholder="Language" value="<?= $form->language ?>" />
					<span class="error" cmt-error="<?= $className ?>[language]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Googlebot</label>
					<textarea name="<?= $className ?>[googlebot]" placeholder="Googlebot"><?= $form->googlebot ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[googlebot]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Search Engine</label>
					<textarea name="<?= $className ?>[searchEngine]" placeholder="Search Engine"><?= $form->searchEngine ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[searchEngine]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Owner Content</label>
					<textarea name="<?= $className ?>[ownerContent]" placeholder="Owner Content"><?= $form->ownerContent ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[ownerContent]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Copyright</label>
					<textarea name="<?= $className ?>[copyright]" placeholder="Copyright"><?= $form->copyright ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[copyright]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Expires</label>
					<textarea name="<?= $className ?>[expires]" placeholder="Expires"><?= $form->expires ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[expires]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Rating</label>
					<textarea name="<?= $className ?>[rating]" placeholder="Rating"><?= $form->rating ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[rating]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Re-visit After</label>
					<textarea name="<?= $className ?>[revisitAfter]" placeholder="Re-visit After"><?= $form->revisitAfter ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[revisitAfter]"></span>
				</div>
			</div>
		</div>
		<div class="filler-height"></div>
		<div class="row">
			<div class="col col2">
				<div class="message success"></div>
				<div class="message warning"></div>
				<div class="message error"></div>
			</div>
			<div class="col col2 align align-right">
				<input class="frm-element-medium cmt-click" type="button" value="Update" />
			</div>
		</div>
		<div class="filler-height"></div>
	</div>
</div>
