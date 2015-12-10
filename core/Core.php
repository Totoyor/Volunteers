<?php

class Core
{

    // Affichage de l'erreur suivant l'environnement de dev.
    protected function coreDbError($e)
    {
        if(defined('DEBUG') && DEBUG)
        {
            echo "Erreur MySql : ".$e->getMessage();
            exit();
        }
        else
        {
            echo "Erreur technique du serveur, veuillez nous excuser pour la gène occasionnée.";
            exit();
        }
    }

    protected function coreRedirect()
    {
        // header('Location:?');
        // $redirection = 'Header'
    }

    protected function coreAlertMessage()
    {

    }
}