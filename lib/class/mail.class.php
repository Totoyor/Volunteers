<?php

class Mail 
{
    private $mailExpediteur;            // Mail de l'expéditeur
    private $nomExpediteur;             // Nom de l'expéditeur
    private $replyTo;                   // Mail pour la réponse
    private $mailDestinataires;         // Liste des mails des destinataires
    private $bcc;                       // Liste des copiés cachés (séparés par ;)
    private $piecesJointes;             // Liste des pièces jointes (séparés par ;)
    private $objetMail;                 // Objet du mail
    private $messageTexte;              // Message en texte brut
    private $messageHTML;               // Message en HTML
    private $message;                   // Message global
    private $frontiere;                 // Frontière de séparation des contenus
    private $headers;                   // Header du mail
    
    public function __construct($mail_expediteur, $nom_expediteur, $mail_replyto)
    {
        // Test des paramètres
        if(!self::_validateEmail($mail_expediteur))
        {
            throw new InvalidArgumentException("Mail expéditeur invalide !");
        }
        if(!self::_validateEmail($mail_replyto))
        {
            throw new InvalidArgumentException("Mail de retour invalide !");
        }
        
        // Initialiser les propriétés
        $this->mailExpediteur = $mail_expediteur;
        $this->nomExpediteur = $nom_expediteur;
        $this->replyTo = $mail_replyto;
        $this->mailDestinataires = '';
        $this->bcc = '';
        $this->piecesJointes = '';
        $this->objetMail = '';
        $this->messageTexte = '';
        $this->messageHTML = '';
        $this->message = '';
        $this->frontiere = md5(uniqid(mt_rand()));
        $this->headers = '';
        
    }
    
    private static function _validateEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function ajoutDestinataire($email)
    {
        if(!self::_validateEmail($email))
        {
            throw new InvalidArgumentException("Mail destinataire invalide !");
        }
        if($this->mailDestinataires == '')
        {
            $this->mailDestinataires = $email;
        }
        else 
        {
            $this->mailDestinataires .= ';'.$email;
        }
    }
    
    public function ajoutCopierCacher($email)
    {
        if(!self::_validateEmail($email))
        {
            throw new InvalidArgumentException("Mail copié caché invalide !");
        }
        if($this->bcc == '')
        {
            $this->bcc = $email;
        }
        else 
        {
            $this->bcc .= ';'.$email;
        }
    }
    
    public function ajoutPieceJointe($fichier)
    {
        if(!file_exists($fichier))
        {
            throw new InvalidArgumentException("Pièce-jointe invalide ou n'existe pas !");
        }
        if($this->piecesJointes == '')
        {
            $this->piecesJointes = $fichier;
        }
        else
        {
            $this->piecesJointes .= ';'.$fichier;
        }
    }
    
    public function contenuMail($objet, $texte = null, $html = null)
    {
        // Prévoir des tests
        $this->objetMail = $objet;
        $this->messageTexte = $texte;
        $this->messageHTML = $html;
    }
    
    public function envoyerMail()
    {
        // Header du mail
        $this->headers  = 'From: "'.$this->nomExpediteur.'" <'.$this->mailExpediteur.'>'."\n";
        $this->headers .= 'Return-Path: <'.$this->replyTo.'>'."\n";
        $this->headers .= 'MIME-Version: 1.0'."\n";
        if ($this->bcc != '')
        {
            $this->headers .="Bcc: ".$this->bcc."\n";
        }
        $this->headers .= 'Content-Type: multipart/mixed; boundary="'.$this->frontiere.'"';
        
        // Partie texte brut 
        if ($this->messageTexte !='') 
        {
            //$this->messageTexte = '';
            $this->message .=  'Multipart message in MIME Format.'."\n\n";
            $this->message .= '--'.$this->frontiere."\n";
            $this->message .= 'Content-Type: text/plain; charset="utf-8"'."\n";
            $this->message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
            $this->message .= $this->messageTexte."\n\n";
        }

        // Partie texte HTML
        if ($this->messageHTML !='') 
        {
            $this->message .= '--'.$this->frontiere."\n";
            $this->message .= 'Content-Type: text/html; charset="utf-8"'."\n";
            $this->message .= 'Content-Transfer-Encoding: 8bit'."\n\n";
            $this->message .= $this->messageHTML."\n\n";
        }

        // Pièces-jointes séparé par ;
        if ($this->piecesJointes !='') 
        {
        $tab_fichiers = explode(';', $this->piecesJointes);
        $nb_fichiers = count($tab_fichiers);
            
            // Fichier JPEG (ajouter le code pour chaque extension)
            for($i=0; $i<$nb_fichiers; $i++)
            {
                $this->message .= '--'.$this->frontiere."\n";
                $this->message .= 'Content-Type: image/jpeg; name="'.$tab_fichiers[$i].'"'."\n";
                $this->message .= 'Content-Transfer-Encoding: base64'."\n";
                $this->message .= 'Content-Disposition:attachement; filename="'.$tab_fichiers[$i].'"'."\n\n";
                $this->message .= chunk_split(base64_encode(file_get_contents($tab_fichiers[$i])))."\n\n";
            }     
        }

        // Envoi du mail 
        if (!mail($this->mailDestinataires, $this->objetMail, $this->message, $this->headers))
        {
            throw new Exception('Envoi du mail échoué !');
        }
        //return mail($this->mailDestinataires, $this->objetMail, $this->message, $this->headers);
    }
}