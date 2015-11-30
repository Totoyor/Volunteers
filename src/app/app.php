<?php

require_once 'app/AppController.php';
require_once 'app/AppModel.php';

if(!isset($_GET['module']))
{
    $module = "Post";
}
else 
{
    $module = $_GET['module'];
}

// Model à déplacer
require 'model/PostModel.php';


$url = "app/controller/".$module.'Controller.php';
if(file_exists($url))
{
    require "app/controller/".$module.'Controller.php';
}
else 
{
    die("Problème require");
}

$controller = $module."Controller";
new $controller();