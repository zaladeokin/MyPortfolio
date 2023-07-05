<?php

// Load zlib
require_once($_SERVER['DOCUMENT_ROOT']."/zlib/zlib.php");
//Set .env file
setEnV($_SERVER['DOCUMENT_ROOT']."/MyPortfolio/Admin/.env");

//Database Config
define("_HOST_", getenv('DB_HOST'));
define('_PORT_', getenv('DB'));
define('_DB_', getenv('DB'));
define('_ADMIN_USER_', getenv('ADMIN_DB_USER'));
define('_ADMIN_PASS_', getenv('ADMIN_DB_PASS'));
define('_USER_', getenv('DB_USER'));
define('_PASS_', getenv('DB_PASS'));


//Admin Acess get key
define('_ADMIN_EMAIL_', getenv('ADMIN_EMAIL'));


//Admin Acess get key
define('_ADMIN_ACCESS_', getenv('ADMIN_ACCESS'));
define('_ADMIN_USERNAME_', getenv('ADMIN_USERNAME'));
define('_ADMIN_PASSW_', getenv('ADMIN_PASSW'));

//Recaptcha V2 API keys
define("_V2_SECRET_KEY_", getenv('V2_SECRET_KEY'));
define("_V2_SITE_KEY_", getenv('V2_SITE_KEY'));


//Recaptcha V3 API keys
define("_V3_SECRET_KEY_", getenv('V3_SECRET_KEY'));
define("_V3_SITE_KEY_", getenv('V3_SITE_KEY'));


//Facebook login API keys
define("_FB_APP_ID_", getenv('FB_APP_ID'));
define("_FB_APP_SECRET_KEY_", getenv('FB_APP_SECRET_KEY'));
define("_FB_APP_VERSION_", getenv('FB_APP_VERSION'));


//Google login API keys
define("_G_SITE_ID_", getenv('G_SITE_ID'));
define("_G_SECRET_KEY_", getenv('G_SECRET_KEY'));