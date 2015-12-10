<?php

// Fonction qui sécurise la session et contre le vol de session
function TOTO_session_start($name ="") {
    session_name($name);
    session_start();

// On récupère l'adresse IP du client
    $ip = !empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];

// On fabrique une chaine avec l'IP et le type de navigateur
    $securite = $ip.'_'.$_SERVER["HTTP_USER_AGENT"];

// S'il n'y a pas de session sécurisée en cours
    if (!isset($_SESSION["securite"])) {
        // On sécurise la session en enregistrant la chaine de sécurité
        $_SESSION["securite"] = $securite;
    }

    elseif ($_SESSION["securite"] != $securite) {
        // On regénère la session et on efface tout le contenu
        session_regenerate_id();
        $_SESSION = array();
        // Tentative de vol de session, on arrête avec une erreur
        return false;
    }
    else {
        // Tout va bien retourne true
        return true;
    }
}