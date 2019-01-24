<?php
/**
 * Created by PhpStorm.
 * User: Winding
 * Date: 2019/01/25
 * Time: 1:48
 */

define('PATH', dirname(__FILE__) . '/');
$ConfigVersion = 1;
$confpath = file_get_contents(dirname(__FILE__)."/../config/config.json");
$config = json_decode($confpath);

date_default_timezone_set('Asia/Tokyo');
header('server:LiVEStream app:lvstream');
header('X-Powered-By: mbiusdev <3');

//ConfigVersion判定
if ($config === NULL) {
    http_response_code(500);
    exit(":-: ERROR: Config File is Not Found.");
}else if ($config->settings->version != $ConfigVersion){
    http_response_code(500);
    echo "CurrentConfigVersion : {$ConfigVersion} <br>JsonConfigVersion : {$config->settings->version}<br>";
    exit(":-: ERROR: Config Version MissMatch.");
}else

if ($config->settings->mode->test) { //デバッグモード
    ini_set('display_errors', 1);
}else
    ini_set('display_errors', 0);

if ($config->settings->mode->maintenance) { //メンテナ
    http_response_code(503);
    //include PATH."public/errors/503.html";
    exit(":-: Information : Maintenance Mode Now.");
}

    echo "OK!";
    echo var_dump($config->settings->app->apptitle);


//ENV
$env["APP"] = ($config->settings->app->apptitle);
$env["TITLE"] = ($config->settings->app->title);