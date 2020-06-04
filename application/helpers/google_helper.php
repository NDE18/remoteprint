<?php
if ( ! function_exists('redirectGoogle')) {
    function redirectGoogle() {
        require_once "googleApi/vendor/autoload.php";
        $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        $gClient = new Google_Client();
        $gClient->setHttpClient($guzzleClient);
        $gClient->setClientId("1017467622610-l8iddr8473gogb4ocfufmeteet2umem8.apps.googleusercontent.com");
        $gClient->setClientSecret("rpipox1q0l8EsLZ7N0PJj8hT");
        $gClient->setApplicationName("remote Print");
        $gClient->setRedirectUri("http://reprint.msacad.com/account/gCallback");
        $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
        return $gClient;

    }
}