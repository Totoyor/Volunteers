<?php

require_once 'app/AppController.php';
require_once 'app/AppModel.php';

// Récupération du module ou du module par défaut
if(!isset($_GET['module']))
{
    $module = "Post";
}
else 
{
    $module = $_GET['module'];
}
$module = ucfirst($module);

// Générer le bon Controller en fonction du module passé en param
$url = "app/controller/".$module.'Controller.php';
if(file_exists($url))
{
    require "app/controller/".$module.'Controller.php';
    $controller = $module."Controller";
    new $controller();
}
else 
{
    die("Problème require");
}