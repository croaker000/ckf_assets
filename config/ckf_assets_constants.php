<?php
/* Note regarding Thumbnails when installing this module.
 * You'll need to create a .thumbs directory in the root of your Fuel ./assets directory with 0777 permissions
 * */

define('CKF_ASSETS_VERSION', '1.0');
define('CKF_ASSETS_FOLDER', 'ckf_assets');
define('CKF_MODULES_PATH', $_SERVER['DOCUMENT_ROOT'].'/fuel/modules/');
define('CKF_ASSETS_PATH', CKF_MODULES_PATH.CKF_ASSETS_FOLDER.'/');

define('CKF_ASSETS_ASSETS_URL','assets/');

/* CKFinder config.php over-rides
 * Stuff you'd normally put in config.php can go here
 * Currently, just just a subset of stuff is supported but you can easily add more
 */
define('CKF_LicenseName','');
define('CKF_LicenseKey','');

/*Directories*/
$directories[] = Array(
		'name' => 'Images',
		'base' => 'images',
		'maxSize' => 0,
		'allowedExtensions' => 'bmp,gif,jpeg,jpg,png,tif,tiff',
		'deniedExtensions' => 'js,php,pl,sh');

$directories[] = Array(
		'name' => 'Flash',
		'base' => 'swf',
		'maxSize' => 0,
		'allowedExtensions' => 'swf,flv',
		'deniedExtensions' => 'js,php,pl,sh');

$directories[] = Array(
		'name' => 'Media',
		'base' => 'media',
		'maxSize' => 0,
		'allowedExtensions' => 'swf,flv,mid,mov,mp3,mp4,mpc,mpeg,mpg,wav,wma,wmv,ogg',
		'deniedExtensions' => 'js,php,pl,sh');

$directories[] = Array(
		'name' => 'PDF',
		'base' => 'pdf',
		'maxSize' => 0,
		'allowedExtensions' => 'pdf',
		'deniedExtensions' => 'js,php,pl,sh');
