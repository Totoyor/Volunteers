<?php

class CoreView extends Core
{
    function view($file_name, $data = null, $nbrPage = null, $comments = null)
    {
        include_once 'views/' . $file_name;
    }

    function helperLinkRewrite($options = [])
    {
        // Ouverture de la balise et Class du lien
        $lien = "<a class='" . $options['class'] . "'";

        // href du lien
        $lien .= " href='" . $options['module'] . "/" . $options['action'] . "/";

        // Si un nom d'url est passé
        if (isset($options['url_seo'])) {
            $lien .= $options['url_seo'] . "-";
        }

        // ID du lien si il est spécifié
        if (isset($options['id'])) {
            $lien .= $options['id'];
        }

        $lien .= "'>";

        // Contenu textuel du lien
        if (isset($options['text'])) {
            $lien .= $options['text'];
        }

        // Fermeture de la balise <a>
        $lien .= "</a>";

        echo $lien;
    }

    function helperGetFlashMessage($options = []) {

        $notification = '<script>notie.alert(';

        if(isset($options['type'])) {
            if(!empty($options['type'])) {
                switch($options['type']) {
                    case 'sucess':
                        $notification .= 1;
                        break;
                    case 'warning':
                        $notification .= 2;
                        break;
                    case 'error':
                        $notification .= 3;
                        break;
                }
            }
        }

        $notification .= ", '";

        if(isset($options['message'])) {
            if(!empty($options['message'])) {
                $notification .= $options['message']."', ";
            }
        }

        if(isset($options['duration'])) {
            if(!empty($options['duration'])) {
                    $notification .=  $options['duration'];
            }
        }

        $notification .= ');</script>';

        echo $notification;
    }
}