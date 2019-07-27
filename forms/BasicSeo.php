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
use cmsgears\core\common\config\CoreGlobal;

/**
 * BasicSeo form allows admin to configure basic SEO.
 *
 * @since 1.0.0
 */
class BasicSeo extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $model;

	public $name;
	public $summary;
	public $desc;
	public $keywords;
	public $robot;

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		if( isset( $this->model ) ) {

			$seoData = $this->model->getDataPluginMeta( CoreGlobal::DATA_SEO );

			if( isset( $seoData ) ) {

				foreach( $seoData as $key => $value ) {

					switch( $key ) {

						case 'name': {

							$this->name = $value;

							break;
						}
						case 'summary': {

							$this->summary = $value;

							break;
						}
						case 'desc': {

							$this->desc = $value;

							break;
						}
						case 'keywords': {

							$this->keywords = $value;

							break;
						}
						case 'robot': {

							$this->maxGuests = $value;

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
			// Required, Safe
			[ 'summary', 'safe' ],
			// Text Limit
			[ 'robot', 'string', 'min' => 1, 'max' => Yii::$app->core->mediumText ],
			[ 'name', 'string', 'min' => 1, 'max' => Yii::$app->core->largeText ],
			[ [ 'desc', 'keywords' ], 'string', 'min' => 1, 'max' => Yii::$app->core->xxLargeText ],
		];

		// Trim Text
		if( Yii::$app->core->trimFieldValue ) {

			$trim[] = [ [ 'name', 'desc', 'keywords', 'robot' ], 'filter', 'filter' => 'trim', 'skipOnArray' => true ];

			return ArrayHelper::merge( $trim, $rules );
		}

		return $rules;
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'summary' => Yii::$app->coreMessage->getMessage( CoreGlobal::FIELD_SUMMARY ),
			'name' => Yii::$app->cmsMessage->getMessage( CoreGlobal::FIELD_SEO_NAME ),
			'desc' => Yii::$app->cmsMessage->getMessage( CoreGlobal::FIELD_SEO_DESCRIPTION ),
			'keywords' => Yii::$app->cmsMessage->getMessage( CoreGlobal::FIELD_SEO_KEYWORDS ),
			'robot' => Yii::$app->cmsMessage->getMessage( CoreGlobal::FIELD_SEO_ROBOT )
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// BasicSeo ------------------------------

	public function getData() {

		$data = [
			'name' => $this->name, 'desc' => $this->desc,
			'keywords' => $this->keywords, 'robot' => $this->robot,
			'summary' => $this->summary
		];

		return $data;
	}

}
