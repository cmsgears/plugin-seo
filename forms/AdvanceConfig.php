<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\seo\forms;

// CMG Imports
use cmsgears\core\common\models\forms\DataModel;

/**
 * NotificationConfig form allows admin to configure notification templates.
 *
 * @since 1.0.0
 */
class AdvanceConfig extends DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	public $classification;

	public $language;

	public $googlebot;

	public $searchEngine;
	public $ownerContent;
	public $copyright;
	public $expires;
	public $rating;
	public $revisitAfter;

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
			[ [ 'classification', 'language', 'googlebot', 'searchEngine', 'ownerContent', 
				'copyright', 'expires', 'rating', 'revisitAfter' ], 'safe' ]
		];

		return $rules;
	}

	public function attributeLabels() {

		return [
			'classification' => 'classification',
			'language' => 'language',
			'googlebot' => 'googlebot',
			'searchEngine' => 'searchEngine',
			'ownerContent' => 'ownerContent',
			'copyright' => 'copyright',
			'expires' => 'expires',
			'rating' => 'rating',
			'revisitAfter' => 'revisitAfter'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// NotificationConfig --------------------

}
