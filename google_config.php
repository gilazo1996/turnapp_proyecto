<?php
// Database configuration, MODIFICADO
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_rapida');
define('DB_USER_TBL', 'user');

// Google API configuration
define('GOOGLE_CLIENT_ID', '777810668202-bttikoe0vk0ju7dv3njo7ovb1tg6u9l0.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://localhost/turnapp_proyecto/');

// Start session
if (!session_id()) {
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('logeophp');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);