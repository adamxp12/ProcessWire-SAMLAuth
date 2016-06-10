<?php
 
/**
 *  SP Single Logout Service Endpoint
 */

session_start();

require_once dirname(dirname(__FILE__)).'/_toolkit_loader.php';

$auth = new OneLogin_Saml2_Auth();

$auth->processSLO();

$errors = $auth->getErrors();

if (empty($errors)) {
    if (isset($_REQUEST['RelayState'])) {
    	header("Location: ".$_REQUEST['RelayState']);

    	print_r('Location: '.$_REQUEST['RelayState']);
    } else {
    	print_r('Logged Out');
    }
} else {
    print_r(implode(', ', $errors));
}
