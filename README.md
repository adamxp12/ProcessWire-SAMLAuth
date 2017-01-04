# ProcessWire-SAMLAuth
Add SAML authentication to any ProcessWire website

# Installation
Before you even attempt to install this module you must have knowledge of SAML, without this you will have slim chance of getting this to work.

__1.__ To install just unzip into the modules directory

__2.__ use the example settings files in the lib directory to make the advanced_settings.php and settings.php files.

__3.__ Make sure that your IDP is sending the email address of users as the mail attribute.

__4.__ Add the SP to your IDP metadata, see the section below on SP URL's

__5.__ Enable the module and try logging in, instead of the ProcessWire login form you should be redirected to the IDP to authenticate, and with any luck it should redirect back to the admin dashboard upon successful authentication.

Because users are matched up by email address you must have a user already setup in processwire with an email that matches an account on your IDP.

This will not make new accounts for security reasons.

This is bassed on the awesome OneLogin php saml toolkit and should be pretty simple to configure.

# SP URL's
This module will act as a SP, and as such you will need to add it to your IDP metadata.
This module adds the following URL's which you will need to do this

__http://(ProcessWireSite)/saml/acs.php__ for the Assertion Consumer Service

__http://(ProcessWireSite)/saml/metadata.php__ for the SP's metadata

__http://(ProcessWireSite)/saml/sls.php__ for the Single Logout Service
 

Below is an example for people who use SimpleSAMLphp (this would go in saml20-sp-remote.php)
```php
  $metadata['http://192.168.0.62/pwtheme/saml/metadata.php'] = array(
    'AssertionConsumerService' => 'http://192.168.0.62/pwtheme/saml/acs.php',
    'SingleLogoutService' => 'http://192.168.0.62/pwtheme/saml/sls.php',
  );
```
That ProcessWire site is installed in the pwtheme subdirectory on my test server just for context.

* NOTE: as of 1.2.1 this module no longer works in 2.x version of ProcessWire, time to embrace the namespace future, if you really need 2.x support download the version from here https://github.com/adamxp12/ProcessWire-SAMLAuth/releases/tag/1.2
