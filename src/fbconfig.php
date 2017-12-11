<?php
session_start();
// added in v4.0.0
include "Database.php";
include "autoload.php";

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// init app with app id and secret
FacebookSession::setDefaultApplication( '138000393528576','5ff8fad992669bb556db816ec9f606d5' );
// login helper with redirect_url
    $helper = new FacebookRedirectLoginHelper('http://spartanshop272.org/src/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // Full name
	/* ---- Session Variables -----*/
	$_SESSION['FBID'] = substr($fbid, 0, 4);           
        $_SESSION['FULLNAME'] = $fbfullname;	
    /* ---- header location after session ----*/
  header("Location: /");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>