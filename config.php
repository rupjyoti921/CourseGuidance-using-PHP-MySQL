<?php



//config.php

//Include Google Client Library for PHP autoload file
require_once ('vendor/autoload.php');

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('983791766663-ku957alfa6io9sls91cta9ebe539sg04.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/cgs/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?> 