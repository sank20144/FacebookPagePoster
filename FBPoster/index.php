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
$permissions = ['manage_pages', 'pages_show_list', 'publish_pages']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/FBDPChanger/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>