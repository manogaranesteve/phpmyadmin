<?php
/**
 * Created by PhpStorm.
 * User: stevemanogarane
 * Date: 30/05/2016
 * Time: 14:48
 */
//require ("./models/connect.php");
/** VAR_DUMP TEST */
/*
var_dump("GET");
echo "<br>";
var_dump($_GET);
echo "<br>";
var_dump("POST");
echo "<br>";
var_dump($_POST);
*/

if (!empty($_GET['action']))
{
    $action = $_GET['action'];
}

else
{
    $action = 'home';
}
    echo $action;
    include 'app/controllers/controller.php';
    echo $template;
    include "app/views/$template.html";

