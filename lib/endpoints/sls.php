<?php namespace ProcessWire;
 
/**
 *  SP Single Logout Service Endpoint
 */

session_start();

require_once dirname(dirname(__FILE__)).'/_toolkit_loader.php';

$auth = new \OneLogin_Saml2_Auth();

if (isset($_SESSION) && isset($_SESSION['LogoutRequestID'])) {
    $requestID = $_SESSION['LogoutRequestID'];
} else {
    $requestID = null;
}


// processSLO is garbage. pure garbage. Always got an invalid signoutRequest. To be honest I see no issue in just redirecting to the normal log out function here
// if someone can fix this feel free but at least with ADFS I always get invalid requests with zero debug information. Thanks OneLogin
//$auth->processSLO(false,  wire('session')->get('samlSessionIndex'));

//$errors = $auth->getErrors();
        wire('session')->logout();

        if (isset($_REQUEST['RelayState'])) {
        	header("Location: ".$_REQUEST['RelayState']);
        } else {
        	print_r("logged out");
        }