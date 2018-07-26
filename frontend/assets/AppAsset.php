<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'slick/slick.css',
		'slick/slick-theme.css',
		'css/site.min.css',
		'css/main.min.css'
		
	];
	public $js = [
		'slick/slick.js',
		'js/scripts.min.js'
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
}