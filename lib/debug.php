<?php
/**
 * Created by PhpStorm.
 * User: Winding
 * Date: 2019/01/25
 * Time: 1:48
 */


$jsonStr = file_get_contents("../config/config.json");
$config = json_decode($jsonStr); // if you put json_decode($jsonStr, true), it will convert the json string to associative array
echo var_dump($config);