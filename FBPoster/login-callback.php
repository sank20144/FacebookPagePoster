<?php
session_start();
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/29/2020
 * Time: 5:25 AM
 */
require_once __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';



$helper = $fb->getRedirectLoginHelper();
try {
    //Get OAuth token
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exception\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
    $fb->setDefaultAccessToken($accessToken);
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    $response = getPageList($accessToken);

    //echo $response->getGraphEdge()->asJson();
    $dec = json_decode($response->getGraphEdge()->asJson());

    //Select the first page
    if (sizeof($dec) > 0) {
        $pageAccessToken = $dec[0]->access_token;
        $pageId = $dec[0]->id;
    } else
        exit();

    //Post to page
    $msg = 'random msg';
    $response = postToPage($pageId, $pageAccessToken, $msg);

}

function getPageList($userAccessToken){
    global $fb;
    try {
        // Returns a `FacebookFacebookResponse` object
        $response = $fb->get(
            '/me/accounts',
            $userAccessToken
        );
    } catch(FacebookExceptionsFacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(FacebookExceptionsFacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    return $response;
}

function postToPage($pageId, $pageAccessToken, $message){
    global $fb;
    try {
        // Returns a `FacebookFacebookResponse` object
        $response = $fb->post(
            '/' . $pageId . '/feed',
            array (
                'message' => $message
            ),
            $pageAccessToken
        );
    } catch(FacebookExceptionsFacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(FacebookExceptionsFacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    return $response;
}

?>