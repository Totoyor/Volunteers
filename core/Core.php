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

    protected function coreRedirect($options = [])
    {
        // début du header location
        $header = 'header(\'Location:?';
        // module de la redirection si passé en param
        if(isset($options['module']))
        {
            $header .= 'module='.$options['module'];
        }
        // action de la redirection si passé en param
        if(isset($options['action']))
        {
            $header .= '&action='.$options['action'];
        }
        // Paramètre et valeur facultative pour passer une donnée
        if(isset($options['param']) && ($options['value']))
        {
            $header .= $options['param'].'='.$options['value'];
        }
        else
        {
            $header .= '&'.$options['param'].'='.$options['value'];
        }
        // fin du header location
        $header .= '\');';

        return $header;
    }

    protected function coreCheckEmail($email)
    {
        if (preg_match("^([a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,3})$^", $email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}