<?php

// Nom de la session
define("SESSION_NAME", "SESSION_BLOG");

// Choix du serveur DEV/TEST/PROD
define('SERVER', 'DEV');

// Gestion de l'environnement du serveur
if(SERVER === 'DEV') {
    /**
     * Constantes spécifiques pour config serveur de dev
     */
    define('DEBUG', true);
}
else if(SERVER === 'TEST') {
    /**
     * Constantes spécifiques pour config serveur de test
     */
    define('DEBUG', true);
}
else if(SERVER === 'PROD') {
    /**
     * Constantes spécifiques pour config serveur de prod
     */
    define('DEBUG', false);
}

// Constantes générales de controller
define('PAGE_HOME', '');
define('PAGE_HOME2', '');

// Constantes de Base de Données
define('DB_DNS',      'mysql:host=localhost;dbname=vanwelde');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_CHARSET', 'utf8');
define('DB_PREFIX', "blog_");

// PATH (Chemins)
define('PATH_1', 'path/');
define('PATH_2', 'path/');

// Constantes de Blog
define('OFFSET', 0);
define('LIMITE', 5);
define('MAX_CHAR', 50);
define('MAX_ARTICLE', 5);

