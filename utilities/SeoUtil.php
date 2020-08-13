<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\seo\utilities;

// CMG Imports
use cmsgears\seo\forms\GeoSeo;
use cmsgears\seo\forms\AdvancedSeo;

/**
 * SeoUtil generates the SEO meta data.
 *
 * @since 1.0.0
 */
class SeoUtil {

	/**
	 * Generates the meta data of Model using SEO Data.
	 *
	 * @param \yii\web\View $view The current view being rendered by controller.
	 * @param array $config
	 * @return array having model meta data.
	 */
	public static function initModel( $view, $config = [] ) {

		$model = isset( $view->params[ 'model' ] ) ? $view->params[ 'model' ] : self::findModel( $config );

		if( isset( $model ) ) {

			$geoSeo			= new GeoSeo( $model );
			$advancedSeo	= new AdvancedSeo( $model );

			$view->params[ 'geoSeo' ]		= $geoSeo;
			$view->params[ 'advancedSeo' ]	= $advancedSeo;
		}
	}

	public static function findModel( $config ) {

		if( empty( $config[ 'service' ] ) ) {

			return;
		}

		$service	= Yii::$app->factory->get( $config[ 'service' ] );
		$typed		= isset( $config[ 'typed' ] ) ? $config[ 'typed' ] : true;
		$type		= isset( $config[ 'type' ] ) ? $config[ 'type' ] : $service->getParentType();
		$slug		= Yii::$app->request->queryParams[ 'slug' ];

		if( $typed ) {

			return $service->getBySlugType( $slug, $type );
		}
		else {

			return $service->getBySlug( $slug );
		}
	}

	public static function generateGeoSeoMetaTags( $params, $config = [] ) {

		$metaContent = '';

		$geoData = $params[ 'geoSeo' ] ?? null;

		if( isset( $geoData ) ) {

			$placename	= filter_var( $geoData->placename, FILTER_SANITIZE_STRING );
			$region		= filter_var( $geoData->region, FILTER_SANITIZE_STRING );
			$position	= filter_var( $geoData->position, FILTER_SANITIZE_STRING );
			$icbm		= filter_var( $geoData->icbm, FILTER_SANITIZE_STRING );

			$metaContent .= $placename ? "<meta name=\"geo.placename\" content=\"$placename\" />" : '';
			$metaContent .= $region ? "<meta name=\"geo.region\" content=\"$region\" />" : '';
			$metaContent .= $position ? "<meta name=\"geo.position\" content=\"$position\" />" : '';
			$metaContent .= $icbm ? "<meta name=\"ICBM\" content=\"$icbm\" />" : '';
		}
		return $metaContent;
	}

	public static function generateAdvancedSeoMetaTags( $params, $config = [] ) {

		$metaContent = '';

		$advanceData = $params[ 'advancedSeo' ];

		$classification = filter_var( $advanceData->classification, FILTER_SANITIZE_STRING );
		$language		= filter_var( $advanceData->language, FILTER_SANITIZE_STRING );
		$googlebot		= filter_var( $advanceData->googlebot, FILTER_SANITIZE_STRING );
		$searchEngine	= filter_var( $advanceData->searchEngine, FILTER_SANITIZE_STRING );
		$ownerContent	= filter_var( $advanceData->ownerContent, FILTER_SANITIZE_STRING );
		$copyright		= filter_var( $advanceData->copyright, FILTER_SANITIZE_STRING );
		$expires		= filter_var( $advanceData->expires, FILTER_SANITIZE_STRING );
		$rating			= filter_var( $advanceData->rating, FILTER_SANITIZE_STRING );
		$revisitAfter	= filter_var( $advanceData->revisitAfter, FILTER_SANITIZE_STRING );

		$metaContent .= $classification ? "<meta name=\"classification\" content=\"$classification\" />" : '';

		$metaContent .= $language ? "<meta name=\"language\" content=\"$language\" />" : '';
		$metaContent .= $googlebot ? "<meta name=\"GOOGLEBOT\" content=\"$googlebot\" />" : '';

		$metaContent .= $searchEngine ? "<meta name=\"Search Engine\" content=\"$searchEngine\" />" : '';
		$metaContent .= $ownerContent ? "<meta name=\"OWNER content\" content=\"$ownerContent\" />" : '';

		$metaContent .= $copyright ? "<meta name=\"copyright\" content=\"$copyright\" />" : '';
		$metaContent .= $expires ? "<meta name=\"expires\" content=\"$expires\" />" : '';
		$metaContent .= $rating ? "<meta name=\"RATING\" content=\"$rating\" />" : '';
		$metaContent .= $revisitAfter ? "<meta name=\"REVISIT-AFTER\" content=\"$revisitAfter\" />" : '';

		return $metaContent;
	}

}
