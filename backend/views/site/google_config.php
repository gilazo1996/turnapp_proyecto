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
require_once '../../../turnapp_proyecto/vendor/autoload.php';

// Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('turnapp_proyecto');
$gClient->setClientId(GOOGLE_CLIENT_ID);
$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);

$gClient->addScope('email');
$gClient->addScope('profile');

$google_oauthV2 = new Google_Service_Oauth2($gClient);