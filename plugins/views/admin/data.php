<?php
$model		= $plugin->model;
$formClass	= $plugin->dataModelClass;
$apixBase	= $plugin->apixBase;

$form = new $formClass( [ 'model' => $model ] );

$className = $form->getClassName();

$themeIncludes = Yii::getAlias( '@themes/admin/views/includes' );
?>
<div class="filler-height"></div>
<div class="box box-crud">
	<div class="box-header">
		<div class="box-header-title">Basic SEO</div>
	</div>
	<div class="box-content" cmt-app="core" cmt-controller="default" cmt-action="default" action="<?= "$apixBase/plugin?id=$model->id" ?>" cmt-keep>
		<?php include "$themeIncludes/components/spinners/form.php"; ?>
		<input type="hidden" name="pluginId" value="<?= $plugin->id ?>" />
		<input type="hidden" name="formType" value="plugins" />
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>SEO Title</label>
					<input type="text" name="<?= $className ?>[name]" placeholder="Title" value="<?= $form->name ?>" />
					<span class="error" cmt-error="<?= $className ?>[name]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>SEO Robot</label>
					<input type="text" name="<?= $className ?>[robot]" placeholder="Robot" value="<?= $form->robot ?>" />
					<span class="error" cmt-error="<?= $className ?>[robot]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>SEO Keywords</label>
					<textarea name="<?= $className ?>[keywords]" placeholder="Keywords"><?= $form->keywords ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[keywords]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>SEO Description</label>
					<textarea name="<?= $className ?>[desc]" placeholder="Description"><?= $form->desc ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[desc]"></span>
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
