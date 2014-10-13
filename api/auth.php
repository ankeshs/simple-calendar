<?php

session_start();

$current_path = dirname(__FILE__);
$google_api_path = $current_path . "/google-api" ;

require_once $google_api_path . "/Google_Client.php";
require_once $google_api_path . "/contrib/Google_CalendarService.php";

$client = new Google_Client();
$client->setAccessType('offline');
$client->setUseObjects(true);
$service = new Google_CalendarService($client);

if (isset($_GET['logout'])) { 
    // logout: destroy token
    unset($_SESSION['oauth_access_token']);
    die('Logged out.');
}

if($client->isAccessTokenExpired()) {
    $token = json_decode($_SESSION['oauth_access_token']);
    if(!empty($token->refresh_token))
        $client->refreshToken($token->refresh_token);
}


if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $access_token = $client->getAccessToken();  
  $_SESSION['oauth_access_token'] = $access_token;  
  $access_token = json_decode($access_token);
  $refresh_token = $access_token->refresh_token;
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['oauth_access_token'])) {
  $client->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $client->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

if ($client->getAccessToken()) {
    print "Application Authenticated";
}

