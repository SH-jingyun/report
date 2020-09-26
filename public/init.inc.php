<?php
use Core\ServiceLocator;
use Core\AutoLoad;

define('ROOT_DIR', dirname(__DIR__)  . '/');
define('PUBLIC_DIR', ROOT_DIR . 'public/');
define('APP_DIR', ROOT_DIR . 'app/');
define('CORE_DIR', ROOT_DIR  . 'core/');
define('LOG_DIR', ROOT_DIR . 'log/');
define('API_DIR', APP_DIR . 'class/');
define('MODEL_DIR', APP_DIR . 'class/');
define('CONFIG_DIR', APP_DIR  . 'config/');
define('APK_DIR', PUBLIC_DIR . 'apk/');
define('IMG_DIR', PUBLIC_DIR . 'img/');
define('INTERIOR_DIR', PUBLIC_DIR . 'interior/');
define('CERT_DIR', APP_DIR . 'cert/');


/**
 * load the private configure
 */
if (file_exists(CONFIG_DIR . 'config.private.php')) {
    include CONFIG_DIR . "config.private.php";
}

!defined('HOST_NAME') && define('HOST_NAME', '127.0.0.1/');
!defined('HOST_OSS') && define('HOST_OSS', 'http://oss.dogsworld.top/');

!defined('DB_HOST') && define('DB_HOST', 'mysql');
!defined('DB_PORT') && define('DB_PORT', 3306);
!defined('DB_USERNAME') && define('DB_USERNAME', 'root');
!defined('DB_PASSWORD') && define('DB_PASSWORD', '123456');
!defined('DB_DATABASE') && define('DB_DATABASE', 'jy_ad');

!defined('DB_HOST_WALKS') && define('DB_HOST_WALKS', 'mysql');
!defined('DB_PORT_WALKS') && define('DB_PORT_WALKS', 3306);
!defined('DB_USERNAME_WALKS') && define('DB_USERNAME_WALKS', 'root');
!defined('DB_PASSWORD_WALKS') && define('DB_PASSWORD_WALKS', '123456');
!defined('DB_DATABASE_WALKS') && define('DB_DATABASE_WALKS', 'jy_walk');

!defined('DB_HOST_ZOU') && define('DB_HOST_ZOU', 'mysql');
!defined('DB_PORT_ZOU') && define('DB_PORT_ZOU', 3306);
!defined('DB_USERNAME_ZOU') && define('DB_USERNAME_ZOU', 'root');
!defined('DB_PASSWORD_ZOU') && define('DB_PASSWORD_ZOU', '123456');
!defined('DB_DATABASE_ZOU') && define('DB_DATABASE_ZOU', 'jy_walk');

!defined('JY_WALK_ADMIN_USER') && define('JY_WALK_ADMIN_USER', 'username');
!defined('JY_WALK_ADMIN_PASSWORD') && define('JY_WALK_ADMIN_PASSWORD', '123456');

!defined('ENV_PRODUCTION') && define('ENV_PRODUCTION', FALSE);
!defined('PAY_MODE') && define('PAY_MODE', FALSE);
!defined('DEBUG_MODE') && define('DEBUG_MODE', FALSE);

//ali config start
!defined('ALI_KEYID') && define('ALI_KEYID', '');//aliyun
!defined('ALI_KEYSECRET') && define('ALI_KEYSECRET', '');//aliyun
//oss config start
!defined('OSS_ENDPOINT') && define('OSS_ENDPOINT', '');//aliyun
!defined('OSS_BUCKET') && define('OSS_BUCKET', '');//aliyun
//oss config end
//ali config end

/**
 * register autoload
 */
require CORE_DIR . 'Core/AutoLoad.php';
AutoLoad::register();

$GLOBALS['locator'] = new ServiceLocator(include CONFIG_DIR . 'services.php');
