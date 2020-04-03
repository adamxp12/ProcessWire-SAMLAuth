<?php namespace ProcessWire;
 
/**
 *  SP Assertion Consumer Service Endpoint
 */

session_start();

require_once dirname(dirname(__FILE__)).'/_toolkit_loader.php';

$auth = new \OneLogin_Saml2_Auth();

$auth->processResponse();

$errors = $auth->getErrors();

if (!empty($errors)) {
    print_r('<p>'.implode(', ', $errors).'</p>');
    exit();
}

if (!$auth->isAuthenticated()) {
    echo "<p>Not authenticated</p>";
    exit();
}

$_SESSION['samlUserdata'] = $auth->getAttributes();
$_SESSION['IdPSessionIndex'] = $auth->getSessionIndex();
if (isset($_POST['RelayState']) && \OneLogin_Saml2_Utils::getSelfURL() != $_POST['RelayState']) {
    $auth->redirectTo($_POST['RelayState']);
}

$attributes = $_SESSION['samlUserdata'];

if (!empty($attributes)) {
    $mail = $attributes['mail'][0];

      if(!empty($mail)) { // If we got an email from the SSO service then check if that email is in the ProcessWire Database
        $user = wire('users')->get("email$=".$mail); // If we find a user in ProcessWire with a matching email then log in
        $username = $user->name;
        if(!empty($username)) {
          // $user->setOutputFormatting(false);
          // $temppass=sha1(uniqid() . $username . uniqid()); //Generate a VERY secure password, the user does not need this anymore
          // $user->pass = $temppass; // Set that secure password
          // wire('users')->save($user); // Save new user details
          wire('session')->set('samlUserdata', $auth->getAttributes());
          wire('session')->set('samlNameId', $auth->getNameId());
          wire('session')->set('samlNameIdFormat', $auth->getNameIdFormat());
          wire('session')->set('samlNameidNameQualifier', $auth->getNameIdNameQualifier());
          wire('session')->set('samlNameidSPNameQualifier', $auth->getNameIdSPNameQualifier());
          wire('session')->set('samlSessionIndex', $auth->getSessionIndex());

          wire('session')->forceLogin($username); //Log user in with new password
          wire('session')->redirect(wire('config')->urls->admin . "page/",false); //Redirect to admin area now that we are loggged in
          // Strange bug in WebKit browsers here, if I remove the \page\ addition it will stop at a blank page, FireFox does not exhibit this.

        } else { // User not in ProcessWire so disallow
          $this->error("Your user is not allowed to admin this site sorry");
        }

      } else { // No email in SSO response
        $this->error("Your user does not have an email on file, can not match to site user without email");
      }
} else {
    echo _('Attributes not found');
}
