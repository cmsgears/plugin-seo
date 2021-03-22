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
		<div class="box-header-title">GEO SEO</div>
	</div>
	<div class="box-content" cmt-app="core" cmt-controller="default" cmt-action="default" action="<?= "$apixBase/plugin?id=$model->id" ?>" cmt-keep>
		<?php include "$themeTemplates/components/spinners/form.php"; ?>
		<input type="hidden" name="pluginId" value="<?= $plugin->id ?>" />
		<input type="hidden" name="formType" value="plugins" />
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Placename</label>
					<input type="text" name="<?= $className ?>[placename]" placeholder="Placename" value="<?= $form->placename ?>" />
					<span class="error" cmt-error="<?= $className ?>[placename]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>Position</label>
					<input type="text" name="<?= $className ?>[position]" placeholder="Position" value="<?= $form->position ?>" />
					<span class="error" cmt-error="<?= $className ?>[position]"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col2">
				<div class="form-group">
					<label>Region</label>
					<textarea name="<?= $className ?>[region]" placeholder="Region"><?= $form->region ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[region]"></span>
				</div>
			</div>
			<div class="col col2">
				<div class="form-group">
					<label>ICBM</label>
					<textarea name="<?= $className ?>[icbm]" placeholder="ICBM"><?= $form->icbm ?></textarea>
					<span class="error" cmt-error="<?= $className ?>[icbm]"></span>
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
