<?php

class HomeController extends AppController
{
    public function __construct()
    {
        require 'app/model/HomeModel.php';
        $this->model = new HomeModel();
        parent::__construct();
    }

    public function home()
    {
        $data = array(
            'events' => $this->model->getHomeEvents(),
            'eventsPremium' => $this->model->getPremiumEvents(),
            'categories' => $this->model->getHomeCategories()
        );

        if($data != null)
        {
            // Chargement de la home
            define("TITLE_HEAD", "Volunteers | Home");
            $this->load->view('page/index.php', $data);
        }
        else
        {
            // Pas de data -> error
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    public function terms()
    {
        // Chargement de la page terms
        define("TITLE_HEAD", "Volunteers | Terms and Conditions");
        $this->load->view('page/terms.php');
    }

    public function about()
    {
        // Chargement de la page terms
        define("TITLE_HEAD", "Volunteers | About us");
        $this->load->view('page/about.php');
    }

    public function newsletter()
    {
        if(isset($_POST['newsletter']))
        {
            if($this->coreCheckEmail($_POST['newsletter']))
            {
                if($this->model->insertNewsletter($_POST['newsletter']))
                {
                    // Envoi email
                    try
                    {
                        // Instanciation
                        $mail = new Mail('contact@volunteers.com', 'Team Volunteers', 'contact@volunteers.com');

                        // Ajout destinataire
                        $mail->ajoutDestinataire($_POST['newsletter']);

                        // Ajout du contenu
                        $objet_mail = 'Volunteers Newsletter';
                        $message_mail = 'Hello,
                             Your email has been added to our database!
                             Thank you for joining Volunteers!';
                        $mail->contenuMail($objet_mail, $message_mail);

                        // Envoi du mail
                        $mail->envoyerMail();
                    }
                    catch (Exception $e)
                    {
                        echo $e->getMessage();
                    }

                    $messageFlash = 'Your E-mail has been added to our list ! We just sent you an email.';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 5);
                    header("Location:".PATH_HOME."");
                    exit();
                }
                else
                {
                    // erreur sql, email déjà inséré
                    $messageFlash = 'Email already sent !';
                    $this->coreSetFlashMessage('warning', $messageFlash, 5);
                    header("Location:".PATH_HOME."#mc_embed_signup");
                    exit();
                }
            }
            else
            {
                // Email non valide
                $messageFlash = 'Your E-mail is wrong, try again please.';
                $this->coreSetFlashMessage('warning', $messageFlash, 5);
                header("Location:".PATH_HOME."#mc_embed_signup");
                exit();
            }
        }
        else
        {
            // Pas de data -> error
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }
}

