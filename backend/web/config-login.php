<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('532529910671-is43eajsmmmsk6hts374fahoglt8n1fh.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/turnapp_proyecto/backend/web/index-login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>