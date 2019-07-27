<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace cmsgears\seo\utilities;

// Yii Imports
use Yii;
// CMG Imports

use cmsgears\seo\config\SeoConfig;


/**
 * ContentUtil generates the meta data for pages, posts and models. The generated data
 * can be used for SEO purpose.
 *
 * @since 1.0.0
 */
class SeoUtil {

	/**
	 * Generates the meta data of Page or Post.
	 *
	 * @param \yii\web\View $view The current view being rendered by controller.
	 * @param array $config - It can pass service, typed and type to detect the model. It can also pass basePath to form ogurl.
	 * @return array having page meta data.
	 */
/*	public static function initPage( $view, $config = [] ) {

		$model = isset( $view->params[ 'model' ] ) ? $view->params[ 'model' ] : self::findPage( $view, $config );

		if( isset( $model ) ) {

			$coreProperties = CoreProperties::getInstance();
			$cmsProperties	= CmsProperties::getInstance();

			$content = $model->modelContent;

			// Page and Content
			$view->params[ 'model' ]	= $model;
			$view->params[ 'seo' ]		= $content;

			// SEO H1 - Page Summary
			$view->params[ 'summary' ]	= !empty( $content->summary ) ? $content->summary : ( isset( $model->summary ) && !empty( $model->summary ) ? $model->summary : $model->description );

			// SEO Meta Tags - Description, Keywords, Robot Text
			$view->params[ 'desc' ]		= isset( $content->seoDescription ) ? $content->seoDescription : $model->description;
			$view->params[ 'keywords' ]	= $content->seoKeywords;
			$view->params[ 'robot' ]	= $content->seoRobot;

			// SEO - Page Title
			$siteTitle		= $coreProperties->getSiteTitle();
			$titleSeparator	= $cmsProperties->getTitleSeparator();
			$seoName		= !empty( $content->seoName ) ? $content->seoName : $model->name;

			if( $cmsProperties->isSiteTitle() ) {

				if( $cmsProperties->isAppendTitle() ) {

					$view->title = "$seoName $titleSeparator $siteTitle";
				}
				else {

					$view->title = "$siteTitle $titleSeparator $seoName";
				}
			}
			else {

				$view->title = $content->seoName;
			}
		}
	}*/

	/**
	 * Generates the meta data of Model using SEO Data.
	 *
	 * @param \yii\web\View $view The current view being rendered by controller.
	 * @param array $config
	 * @return array having model meta data.
	 */
	public static function initModel( $view, $config = [] ) {

		//$model = isset( $view->params[ 'model' ] ) ? $view->params[ 'model' ] : self::findModel( $config );
		$model = isset( $view->params[ 'model' ] ) ? $view->params[ 'model' ] : null;

		if( isset( $model ) ) {

			$seoGeo			= $model->getDataMeta( SeoConfig::CONFIG_GEO_SEO );
			$seoAdvanced	= $model->getDataMeta( SeoConfig::CONFIG_ADVANCE );

			$view->params[ 'seoGeo' ] = $seoGeo;	
			$view->params[ 'seoAdvance' ] = $seoAdvanced;	

		}
	}

	/**
	 * Generates the meta data of Model using model content.
	 *
	 * @param \yii\web\View $view The current view being rendered by controller.
	 * @param array $config
	 * @return array having model meta data.
	 */
	/*public static function initModelPage( $view, $config = [] ) {

		$model = isset( $view->params[ 'model' ] ) ? $view->params[ 'model' ] : self::findModel( $config );

		if( isset( $model ) ) {

			$coreProperties = CoreProperties::getInstance();
			$cmsProperties	= CmsProperties::getInstance();
			$seoData		= $model->getDataMeta( CoreGlobal::DATA_SEO );

			$content = $model->modelContent;

			// Model
			$view->params[ 'model' ]	= $model;
			$view->params[ 'content' ]	= $content;

			// SEO H1 - Page Summary
			$view->params[ 'summary' ]	= $content->summary;

			// SEO Meta Tags - Description, Keywords, Robot Text
			$view->params[ 'desc' ]		= isset( $content->seoDescription ) ? $content->seoDescription : $model->description;
			$view->params[ 'keywords' ]	= $content->seoKeywords;
			$view->params[ 'robot' ]	= $content->seoRobot;

			// SEO - Page Title
			$siteTitle		= $coreProperties->getSiteTitle();
			$titleSeparator	= $cmsProperties->getTitleSeparator();
			$seoName		= !empty( $content->seoName ) ? $content->seoName : $model->name;

			if( $cmsProperties->isSiteTitle() ) {

				if( $cmsProperties->isAppendTitle() ) {

					$view->title = "$seoName $titleSeparator $siteTitle";
				}
				else {

					$view->title = "$siteTitle $titleSeparator $seoName";
				}
			}
			else {

				$view->title = $model->seoName;
			}
		}
	}*/

	/**
	 * Find and return the view according to the configuration passed to it.
	 *
	 * @param \yii\web\View $view
	 * @param array $config
	 * @return \cmsgears\cms\common\models\entities\Content
	 */
	/*public static function findPage( $view, $config = [] ) {

		$moduleName		= $view->context->module->id;
		$controllerName	= Yii::$app->controller->id;
		$actionName		= Yii::$app->controller->action->id;

		$page = null;

		// System/Public Pages - Landing, Login, Register, Confirm Account, Activate Account, Forgot Password, Reset Password
		if( $moduleName == 'core' && $controllerName == 'site' ) {

			// Landing Page
			if( $actionName == 'index' ) {

				$page = self::getPage( 'home' );
			}
			// System Page
			else {

				$page = self::getPage( $actionName );
			}
		}
		// Blog/CMS Pages
		else if( isset( Yii::$app->request->queryParams[ 'slug' ] ) ) {

			$type = isset( $config[ 'type' ] ) ? $config[ 'type' ] : CmsGlobal::TYPE_PAGE;

			$page = self::getPage( Yii::$app->request->queryParams[ 'slug' ], $type );
		}

		return $page;
	}*/

	/**
	 * @return Page based on given slug
	 */
	/*public static function getPage( $slug, $type = CmsGlobal::TYPE_PAGE ) {

		switch( $type ) {

			case CmsGlobal::TYPE_PAGE: {

				return Yii::$app->factory->get( 'pageService' )->getBySlugType( $slug, $type );
			}
			case CmsGlobal::TYPE_POST: {

				return Yii::$app->factory->get( 'postService' )->getBySlugType( $slug, $type );
			}
		}

		return null;
	}*/

	public static function findModel( $config ) {

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
	
	public static function generateSeoGeoMetaTags( $params, $config = [] ) {

		$metaContent = '';

		$geoData =   $params[ 'seoGeo' ] ?? null;

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

	public static function generateSeoAdvancedMetaTags( $params, $config = [] ) {

		$metaContent = '';
		
		$advanceData = $params[ 'seoAdvance' ];
		
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
