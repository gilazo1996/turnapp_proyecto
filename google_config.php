<?php
// Database configuration, MODIFICADO
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_rapida');
define('DB_USER_TBL', 'user');

// Google API configuration
define('GOOGLE_CLIENT_ID', '532529910671-is43eajsmmmsk6hts374fahoglt8n1fh.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://localhost/turnapp_proyecto/backend/web/');

// Start session
if (!session_id()) {
    session_start();
}

// Include Google API client library
require_once 'google-api-php-client/Google_Client.php';
require_once 'google-api-php-client/contrib/Google_Oauth2Service.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('turnapp_proyecto');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$google_oauthV2 = new Google_Oauth2Service($gClient);