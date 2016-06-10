<?php

$settings = array (
    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => false,

    // Enable debug mode (to print errors)
    'debug' => false,

    // Service Provider Data that we are deploying
    'sp' => array (
        // Identifier of the SP entity  (must be a URI)
        'entityId' => 'http://192.168.0.62/pwtheme/metadata.php',
        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array (
            // URL Location where the <Response> from the IdP will be returned
            'url' => 'http://192.168.0.62/pwtheme/acs.php',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        'singleLogoutService' => array (
            // URL Location where the <Response> from the IdP will be returned
            'url' => 'http://192.168.0.62/pwtheme/sls.php',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:WindowsDomainQualifiedName',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => '-----BEGIN CERTIFICATE-----
MIIEgzCCA2ugAwIBAgIJALX1RPC8f6mqMA0GCSqGSIb3DQEBBQUAMIGHMQswCQYD
VQQGEwJVSzEPMA0GA1UECBMGTG9uZG9uMQ0wCwYDVQQHEwRLZW50MRcwFQYDVQQK
Ew5BZGFtIEJsdW50IFdFQjEZMBcGA1UEAxMQc3NvLmFkYW14cDEyLmNvbTEkMCIG
CSqGSIb3DQEJARYVYWRhbXhwMTJAYWRhbXhwMTIuY29tMB4XDTE2MDIxNDE0MzU0
MloXDTI2MDIxMzE0MzU0MlowgYcxCzAJBgNVBAYTAlVLMQ8wDQYDVQQIEwZMb25k
b24xDTALBgNVBAcTBEtlbnQxFzAVBgNVBAoTDkFkYW0gQmx1bnQgV0VCMRkwFwYD
VQQDExBzc28uYWRhbXhwMTIuY29tMSQwIgYJKoZIhvcNAQkBFhVhZGFteHAxMkBh
ZGFteHAxMi5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC7CttD
/7rEjWYIedPKKHf1whFQZmbHG8BfzgIQ7gvXU0x7GGcKFJLSLZ6t0SXiX2bZ69tt
W167yI5Dc/MbuVO2uFgABbjhByMNU91XizbQ+TcAhWxMfaKPMoZpRddC95QUq/0t
WBgXFJWH2A0tzkeOEjMzAJ8M9+/izVwmewBzdhBV/iSJNJgNR6ZiFFb8wS58E166
PkB3iXQCl2oitG9vybUAQsu1dHh2PWl3ns+Mt2zZayo2B9WdJAFYpCf2bBp46SAq
t5sskj6O7tkoXcGF+3yLi7pNAV5vwRbCyKUFwC8pYTNJtqlfVskioKlC7ch3l68J
TxDFx16ZW4yeWjETAgMBAAGjge8wgewwHQYDVR0OBBYEFEllPjz/tlbkESK04UAy
PWkgAwWLMIG8BgNVHSMEgbQwgbGAFEllPjz/tlbkESK04UAyPWkgAwWLoYGNpIGK
MIGHMQswCQYDVQQGEwJVSzEPMA0GA1UECBMGTG9uZG9uMQ0wCwYDVQQHEwRLZW50
MRcwFQYDVQQKEw5BZGFtIEJsdW50IFdFQjEZMBcGA1UEAxMQc3NvLmFkYW14cDEy
LmNvbTEkMCIGCSqGSIb3DQEJARYVYWRhbXhwMTJAYWRhbXhwMTIuY29tggkAtfVE
8Lx/qaowDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEArCvV6uU4AaeO
Qqv44VjFx9hPVU5Q0BFvuUSd8Wndzhy+wkzprDQK3AEux1kuGQDgXNoKVFNOv9Kr
gxDyFMZotghrCPXe2SiGX1VrYbVES3UT2j7E79vMlzWHILzjnMg467QCycUaWYIy
RxsWStfBWM60c5OfQ2kdSjYTkdkPFNlxQfMJuD1/rbieAQQHIoxrvVQrvLmP8imi
uRpAPbqAKXRk4jfLZoc8TGgWDsl0WrhG78LfFbutNh7xF1oCvxccd8OWGibQGJiy
ey80x38jZZRpxfHS6XIpGzlqWH/iX+TfUPxkAPYBDbQXsOCBDEHIH+9JDaWoU8J4
0UhbmmhuSQ==
-----END CERTIFICATE-----',
        'privateKey' => '-----BEGIN RSA PRIVATE KEY-----
MIIEpgIBAAKCAQEAuwrbQ/+6xI1mCHnTyih39cIRUGZmxxvAX84CEO4L11NMexhn
ChSS0i2erdEl4l9m2evbbVteu8iOQ3PzG7lTtrhYAAW44QcjDVPdV4s20Pk3AIVs
TH2ijzKGaUXXQveUFKv9LVgYFxSVh9gNLc5HjhIzMwCfDPfv4s1cJnsAc3YQVf4k
iTSYDUemYhRW/MEufBNeuj5Ad4l0ApdqIrRvb8m1AELLtXR4dj1pd57PjLds2Wsq
NgfVnSQBWKQn9mwaeOkgKrebLJI+ju7ZKF3Bhft8i4u6TQFeb8EWwsilBcAvKWEz
SbapX1bJIqCpQu3Id5evCU8QxcdemVuMnloxEwIDAQABAoIBAQCnRdRGAcQT16iy
V9Fyb7KolIBLeOjdlBH9HA14+oqYbSRuyaoMt81+LdJE/FB3HH6s0WORby9PnNKt
vFpkJt+Y/0+j5XortOhCGQhQLG4/gUERNEFgPtNMYREXwJ/8gdFqk01+adRRf9Ui
gbN3jY0sn1YufJXBUVK1cJbCyyniFuB3Mz2CJhkhdf3RtghOkArHDEvseyefbQYr
SzekpPiLIouJd5uyvPM7K0bgb5FzVpieHTMDyfQJq0eBNUm3+fuFDIr9ggROkZ9q
CsDusaspkwGbHoLsZepGa4Fwl5518qfh2JlQsCDu8Z5onM6IEjHLEkCMgShayMd9
HT2QPbexAoGBAPNXQQfhVv73O4NfLc7SqIKyfGOsQozHpM+MVGsbiNEKAgYLKtxF
FEhUmgVowfnOZVgwETJMTAuoSCR3vPB5+QT+ZzXHo0pkkqke+CkGk/jyEP0mFJAh
ZYWlIWzMycRQs22V+93pDJFpVnPvbcEEh0xDoVqAtqwj979ICQjg7hYXAoGBAMTF
1ejWkYWXBnhuLzaCV86Re/3oZcDDDDeLMfUdE61+D38sShlyjoxusZhMgjPStaaJ
OyTWIpdsCwoMe3CzE0ObeczID01T/QquSJBGd4LewQze4fMqlUHWQrdwj86tuXQC
Ws+F/prBjLfwUB1KuSbbuP1dh449kpE3/E7ClpZlAoGBALiUE7jVfXays8rHdGiw
M6/HkUDNlkFQ4juoNxRzc0kUrUpGSEGCiIsA2T+HIbPJkefdtf2QEBK7l9VJmeBS
tMfL7R/HCZ5RQUnVOulrmuw3ORm8O9bD7kz8X6k2gUlO6XsTTFQcBTN7Ul9oWrkR
JUt89TQ/89AJDFBkZK3+Z7oLAoGBAKx9I9NUbAIn7nMZW2e0AJbCb2eXFcNQ91+l
NCjC0WIPFDSNtXLzOcQesK1pu+UDu1p+B4t17qLAAjlP0dFsGOH142JAqTFHA5Ue
S9u0+cSN0bqfkn/ffzFUSe2VzWoGXYA1JDewJQyxx9Hh5ciXnRBUIahwGYj1roqA
AjtkVi8FAoGBAN+EYYafP2aqv047H2wNBfbFdHDM5e+H4hz/kfC4qUZQEhRUzKQx
tH/EiPLTZrrQtLSGpUYn8SCxqJTxfmHp2KIPNXl6gXdaWfc6MCaX63a7vIyY7VA3
akArC/YlXq7CgjHw28Cw0oPjKfSuR37FhA4UjMLcHJHbDl2MHo1C8+fA
-----END RSA PRIVATE KEY-----',
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array (
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => 'https://sso.adamxp12.com/saml2/idp/metadata.php',
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array (
            // URL Target of the IdP where the SP will send the Authentication Request Message
            'url' => 'https://sso.adamxp12.com/saml2/idp/SSOService.php',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-POST binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array (
            // URL Location of the IdP where the SP will send the SLO Request
            'url' => 'https://sso.adamxp12.com/saml2/idp/SingleLogoutService.php',
            // SAML protocol binding to be used when returning the <Response>
            // message.  Onelogin Toolkit supports for this endpoint the
            // HTTP-Redirect binding only
            'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        ),
        // Public x509 certificate of the IdP
        'x509cert' => '-----BEGIN CERTIFICATE-----
MIIEgzCCA2ugAwIBAgIJALX1RPC8f6mqMA0GCSqGSIb3DQEBBQUAMIGHMQswCQYD
VQQGEwJVSzEPMA0GA1UECBMGTG9uZG9uMQ0wCwYDVQQHEwRLZW50MRcwFQYDVQQK
Ew5BZGFtIEJsdW50IFdFQjEZMBcGA1UEAxMQc3NvLmFkYW14cDEyLmNvbTEkMCIG
CSqGSIb3DQEJARYVYWRhbXhwMTJAYWRhbXhwMTIuY29tMB4XDTE2MDIxNDE0MzU0
MloXDTI2MDIxMzE0MzU0MlowgYcxCzAJBgNVBAYTAlVLMQ8wDQYDVQQIEwZMb25k
b24xDTALBgNVBAcTBEtlbnQxFzAVBgNVBAoTDkFkYW0gQmx1bnQgV0VCMRkwFwYD
VQQDExBzc28uYWRhbXhwMTIuY29tMSQwIgYJKoZIhvcNAQkBFhVhZGFteHAxMkBh
ZGFteHAxMi5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC7CttD
/7rEjWYIedPKKHf1whFQZmbHG8BfzgIQ7gvXU0x7GGcKFJLSLZ6t0SXiX2bZ69tt
W167yI5Dc/MbuVO2uFgABbjhByMNU91XizbQ+TcAhWxMfaKPMoZpRddC95QUq/0t
WBgXFJWH2A0tzkeOEjMzAJ8M9+/izVwmewBzdhBV/iSJNJgNR6ZiFFb8wS58E166
PkB3iXQCl2oitG9vybUAQsu1dHh2PWl3ns+Mt2zZayo2B9WdJAFYpCf2bBp46SAq
t5sskj6O7tkoXcGF+3yLi7pNAV5vwRbCyKUFwC8pYTNJtqlfVskioKlC7ch3l68J
TxDFx16ZW4yeWjETAgMBAAGjge8wgewwHQYDVR0OBBYEFEllPjz/tlbkESK04UAy
PWkgAwWLMIG8BgNVHSMEgbQwgbGAFEllPjz/tlbkESK04UAyPWkgAwWLoYGNpIGK
MIGHMQswCQYDVQQGEwJVSzEPMA0GA1UECBMGTG9uZG9uMQ0wCwYDVQQHEwRLZW50
MRcwFQYDVQQKEw5BZGFtIEJsdW50IFdFQjEZMBcGA1UEAxMQc3NvLmFkYW14cDEy
LmNvbTEkMCIGCSqGSIb3DQEJARYVYWRhbXhwMTJAYWRhbXhwMTIuY29tggkAtfVE
8Lx/qaowDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEArCvV6uU4AaeO
Qqv44VjFx9hPVU5Q0BFvuUSd8Wndzhy+wkzprDQK3AEux1kuGQDgXNoKVFNOv9Kr
gxDyFMZotghrCPXe2SiGX1VrYbVES3UT2j7E79vMlzWHILzjnMg467QCycUaWYIy
RxsWStfBWM60c5OfQ2kdSjYTkdkPFNlxQfMJuD1/rbieAQQHIoxrvVQrvLmP8imi
uRpAPbqAKXRk4jfLZoc8TGgWDsl0WrhG78LfFbutNh7xF1oCvxccd8OWGibQGJiy
ey80x38jZZRpxfHS6XIpGzlqWH/iX+TfUPxkAPYBDbQXsOCBDEHIH+9JDaWoU8J4
0UhbmmhuSQ==
-----END CERTIFICATE-----',
        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it,
         *   or add for example the -sha256 , -sha384 or -sha512 parameter)
         *
         *  If a fingerprint is provided, then the certFingerprintAlgorithm is required in order to
         *  let the toolkit know which Algorithm was used. Possible values: sha1, sha256, sha384 or sha512
         *  'sha1' is the default value.
         */
        // 'certFingerprint' => '',
        // 'certFingerprintAlgorithm' => 'sha1',
    ),
);
