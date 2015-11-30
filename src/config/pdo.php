<?php
try
{
    $dns = 'mysql:host=localhost;dbname=vanwelde';
    $utilisateur = 'root';
    $motDePasse = 'root';

    $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
       
    $connexion = new PDO ( $dns, $utilisateur, $motDePasse, $options );

}
catch ( Exception $e )
{
    define('TITLE_HEAD', 'Erreur de connexion BDD');
    include('views/view_error.php');
    die();
}