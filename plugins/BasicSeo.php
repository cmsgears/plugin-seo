<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\seo\plugins;

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;

/**
 * The BasicSeo plugin provides options to manage the basic SEO fields.
 *
 * @since 1.0.0
 */
class BasicSeo extends \cmsgears\core\common\base\Plugin {

	// Variables ---------------------------------------------------

	// Globals ----------------

	// Public -----------------

	public $adminViewsPath = '@cmsgears/plugin-seo/plugins/views/admin';

	public $pluginModelClass = 'cmsgears\seo\forms\BasicSeo';

	// Protected --------------

	// Private ----------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// BasicSeo ------------------------------

	public function init() {

		parent::init();

		$this->key = CoreGlobal::DATA_SEO;
	}

}
