<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "img/favicon.png",
        "img/apple-touch-icon.png",
        "vendor/bootstrap-icons/bootstrap-icons.css",
        "vendor/aos/aos.css",
        "vendor/remixicon/remixicon.css",
        "vendor/swiper/swiper-bundle.min.css",
        "vendor/glightbox/css/glightbox.min.css",
        "css/style.css",
        "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    ];
    public $js = [
//        "assets/vendor/bootstrap/js/bootstrap.bundle.js",
        "vendor/aos/aos.js",
        "vendor/php-email-form/validate.js",
        "vendor/swiper/swiper-bundle.min.js",
        "vendor/purecounter/purecounter.js",
        "vendor/isotope-layout/isotope.pkgd.min.js",
        "vendor/glightbox/js/glightbox.min.js",
        "js/main.js",
    ];
    public $depends = [
        JqueryAsset::class,
        'yii\bootstrap4\BootstrapAsset',
    ];
}
