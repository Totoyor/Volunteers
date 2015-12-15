<?php

class CoreView extends Core
{
    function view($file_name, $data = null, $nbrPage = null, $comments = null)
    {
        include_once 'views/'.$file_name;
    }

    function helperLinkRewrite($options = [])
    {
        // Ouverture de la balise et Class du lien
        $lien = "<a class='".$options['class']."'";

        // href du lien
        $lien .=  " href='".$options['module']."/".$options['action']."/";

        // Si un nom d'url est passé
        if(isset($options['url_seo']))
        {
            $lien .= $options['url_seo']."-";
        }

        // ID du lien si il est spécifié
        if(isset($options['id']))
        {
            $lien .= $options['id'];
        }

        $lien .= "'>";

        // Contenu textuel du lien
        if(isset($options['text']))
        {
            $lien .= $options['text'];
        }

        // Fermeture de la balise <a>
        $lien .= "</a>";

        echo $lien;
    }
}