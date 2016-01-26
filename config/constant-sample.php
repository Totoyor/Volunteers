<?php

// Nom de la session
define("SESSION_NAME", "SESSION_VOLUNTEERS");

// Choix du serveur DEV/TEST/PROD
define('SERVER', 'LOCAL');

// Gestion de l'environnement du serveur
if(SERVER === 'LOCAL') {
    /**
     * Constantes spécifiques pour config serveur de dev
     */
    define('DEBUG', true);
    define('BASE_HOME', '<base href="http://localhost/Volunteers/">');
    define('PATH_HOME', 'http://localhost/Volunteers/');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'YOUR_DNS');
    define('DB_USERNAME', 'YOUR_USERNAME');
    define('DB_PASSWORD', 'YOUR_PASSWORD');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');

}
else if(SERVER === 'DEV') {
    /**
     * Constantes spécifiques pour config serveur de dev
     */
    define('DEBUG', true);
    define('BASE_HOME', '<base href="http://sabates.etudiant-eemi.com/perso/volunteers/dev/">');
    define('PATH_HOME', 'YOUR_URL');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'YOUR_DNS');
    define('DB_USERNAME', 'YOUR_USERNAME');
    define('DB_PASSWORD', 'YOUR_PASSWORD');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');

}
else if(SERVER === 'TEST') {
    /**
     * Constantes spécifiques pour config serveur de test
     */
    define('DEBUG', true);
    define('BASE_HOME', '<base href="http://sabates.etudiant-eemi.com/perso/volunteers/test/">');
    define('PATH_HOME', 'YOUR_URL');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'YOUR_DNS');
    define('DB_USERNAME', 'YOUR_USERNAME');
    define('DB_PASSWORD', 'YOUR_PASSWORD');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');
}
else if(SERVER === 'PROD') {
    /**
     * Constantes spécifiques pour config serveur de prod
     */
    define('DEBUG', false);
    define('BASE_HOME', '<base href="http://sabates.etudiant-eemi.com/perso/volunteers/prod/">');
    define('PATH_HOME', 'YOUR_URL');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'YOUR_DNS');
    define('DB_USERNAME', 'YOUR_USERNAME');
    define('DB_PASSWORD', 'YOUR_PASSWORD');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');
}

// Constantes générales d'URL
define('MODULE_DEFAUT', 'Home');
define('ACTION_DEFAUT', 'home');

// PATH (Chemins)
define('PATH_1', 'path/');
define('PATH_2', 'path/');

// Constantes de Blog
define('OFFSET', 0);
define('LIMITE', 5);
define('MAX_CHAR', 50);
define('MAX_ARTICLE', 5);