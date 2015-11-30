<?php // Controleur principal

// Affichage des erreurs
ini_set('display_errors', 1);

// Constantes
include_once('config/constant.php');

// Connexion PDO
//include_once('config/pdo.php');

// Inclusion du Core (Controller/Model/View)
require_once 'core/Core.php';
require_once 'core/CoreController.php';
require_once 'core/CoreModel.php';
require_once 'core/CoreView.php';

// Lancement du module
require_once 'app/app.php';