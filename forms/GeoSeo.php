<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\seo\forms;

/**
 * GeoSeo form allows admin to configure Geo SEO.
 *
 * @since 1.0.0
 */
class GeoSeo extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	public $region;

	public $placename;

	public $position;

	public $icbm;

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Model ---------

	public function rules() {

		$rules = [
			[ [ 'region', 'placename', 'position', 'icbm' ], 'safe' ]
		];

		return $rules;
	}

	public function attributeLabels() {

		return [
			'region' => 'region',
			'placename' => 'placename',
			'position' => 'position',
			'icbm' => 'icbm'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// GeoSeo --------------------------------

}
