<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\seo\forms;

// Yii Imports
use Yii;
use yii\helpers\ArrayHelper;

// CMG Imports
use cmsgears\seo\config\SeoGlobal;

/**
 * AdvancedSeo form allows admin to configure advanced SEO.
 *
 * @since 1.0.0
 */
class AdvancedSeo extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	public $model;

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

	public function init() {

		if( isset( $this->model ) ) {

			$seoData = $this->model->getDataPluginMeta( SeoGlobal::DATA_SEO_ADVANCED );

			if( isset( $seoData ) ) {

				foreach( $seoData as $key => $value ) {

					switch( $key ) {

						case 'classification': {

							$this->classification = $value;

							break;
						}
						case 'language': {

							$this->language = $value;

							break;
						}
						case 'googlebot': {

							$this->googlebot = $value;

							break;
						}
						case 'searchEngine': {

							$this->searchEngine = $value;

							break;
						}
						case 'ownerContent': {

							$this->ownerContent = $value;

							break;
						}
						case 'copyright': {

							$this->copyright = $value;

							break;
						}
						case 'expires': {

							$this->expires = $value;

							break;
						}
						case 'rating': {

							$this->rating = $value;

							break;
						}
						case 'revisitAfter': {

							$this->revisitAfter = $value;

							break;
						}
					}
				}
			}
		}
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Component -----

	// yii\base\Model ---------

	/**
	 * @inheritdoc
	 */
	public function rules() {

		// Model Rules
		$rules = [
			// Text Limit
			[ [ 'language', 'googlebot', 'searchEngine', 'copyright', 'expires', 'rating', 'revisitAfter' ], 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ [ 'classification', 'ownerContent' ], 'string', 'min' => 1, 'max' => Yii::$app->core->largeText ]
		];

		// Trim Text
		if( Yii::$app->core->trimFieldValue ) {

			$trim[] = [ [ 'classification', 'ownerContent', 'copyright', 'expires', 'rating', 'revisitAfter' ], 'filter', 'filter' => 'trim', 'skipOnArray' => true ];

			return ArrayHelper::merge( $trim, $rules );
		}

		return $rules;
	}

	public function attributeLabels() {

		return [
			'classification' => 'Classification',
			'language' => 'Language',
			'googlebot' => 'Googlebot',
			'searchEngine' => 'Search Engine',
			'ownerContent' => 'Owner Content',
			'copyright' => 'Copyright',
			'expires' => 'Expires',
			'rating' => 'Rating',
			'revisitAfter' => 'Revisit After'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// AdvancedSeo ---------------------------

	public function getData() {

		$data = [
			'classification' => $this->classification, 'language' => $this->language,
			'googlebot' => $this->googlebot, 'searchEngine' => $this->searchEngine,
			'ownerContent' => $this->ownerContent, 'copyright' => $this->copyright,
			'expires' => $this->expires, 'rating' => $this->rating,
			'revisitAfter' => $this->revisitAfter
		];

		return $data;
	}

}
