<?php
if ( ! function_exists('redirectFacebook')) {
    function redirectFacebook() {
        require_once "Facebook/autoload.php";
        $FB = new \Facebook\Facebook([
            'app_id'=>'190508041555570',
            'app_secret'=> '90a7ee7c77eecc3e43dfb241d35fa64a',
            'default_graph_version' => 'v2.10'

    ]);

        $helper = $FB->getRedirectLoginHelper();
        $redirectUrl = "http://reprint.msacad.com/account/fbcallback";
        $permissions = ['email'];
        return $helper->getLoginUrl($redirectUrl,$permissions);
    }
}
