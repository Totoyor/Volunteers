<?php // Controleur principal

// Constantes
include_once 'config/constant.php';

// Démarage de la session
require_once 'lib/secure_session.php';
VOLUNTEERS_session_start(SESSION_NAME);

// Gestion des erreurs
if(defined('DEBUG') && DEBUG) {

    // En mode DEBUG on affiche toutes les erreurs & warnings
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
else {
    // On affiche aucune erreur
    ini_set('display_errors', 0);
    error_reporting(0);
}

// Inclusion du Core (Controller/Model/View)
require_once 'core/Core.php';
require_once 'core/CoreController.php';
require_once 'core/CoreModel.php';
require_once 'core/CoreView.php';

// Lancement du module
require_once 'app/app.php';