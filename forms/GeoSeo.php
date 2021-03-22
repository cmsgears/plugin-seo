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
 * GeoSeo form allows admin to configure Geo SEO.
 *
 * @since 1.0.0
 */
class GeoSeo extends \cmsgears\core\common\models\forms\DataModel {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	public $model;

	public $placename;
	public $position;
	public $region;
	public $icbm;

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	public function init() {

		if( isset( $this->model ) ) {

			$seoData = $this->model->getDataPluginMeta( SeoGlobal::DATA_SEO_GEO );

			if( isset( $seoData ) ) {

				foreach( $seoData as $key => $value ) {

					switch( $key ) {

						case 'placename': {

							$this->placename = $value;

							break;
						}
						case 'position': {

							$this->position = $value;

							break;
						}
						case 'region': {

							$this->region = $value;

							break;
						}
						case 'icbm': {

							$this->icbm = $value;

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
			[ [ 'placename', 'position', 'region', 'icbm' ], 'string', 'min' => 1, 'max' => Yii::$app->core->largeText ]
		];

		// Trim Text
		if( Yii::$app->core->trimFieldValue ) {

			$trim[] = [ [ 'placename', 'position', 'region', 'icbm' ], 'filter', 'filter' => 'trim', 'skipOnArray' => true ];

			return ArrayHelper::merge( $trim, $rules );
		}

		return $rules;
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {

		return [
			'placename' => 'Placename',
			'position' => 'Position',
			'region' => 'Region',
			'icbm' => 'ICBM'
		];
	}

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Validators ----------------------------

	// GeoSeo --------------------------------

	public function getData() {

		$data = [
			'placename' => $this->placename, 'position' => $this->position,
			'region' => $this->region, 'icbm' => $this->icbm
		];

		return $data;
	}

}
