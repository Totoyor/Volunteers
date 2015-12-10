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

// Constantes de Base de Données
define('DB_DNS',      'mysql:host=ns366377.ovh.net;dbname=la_mantia');
define('DB_USERNAME', 'la_mantia');
define('DB_PASSWORD', '669763');
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

