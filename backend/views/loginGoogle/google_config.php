<?php
// Database configuration, MODIFICADO
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_rapida');
define('DB_USER_TBL', 'user');

// Google API configuration
define('GOOGLE_CLIENT_ID', '777810668202-cuhcsv3d3b4g81corj8odmuqnh2t7c09.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_REDIRECT_URL', 'http://localhost/turnapp_proyecto/backend/views/site/');

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

$google_oauthV2 = new Google_Service_Oauth2($gClient);