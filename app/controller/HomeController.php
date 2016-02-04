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

    public function newsletter()
    {
        if(isset($_POST['newsletter']))
        {
            if($this->coreCheckEmail($_POST['newsletter']))
            {
                if($this->model->insertNewsletter($_POST['newsletter']))
                {
                    //TODO
                    // Changer ceci par un header location ?
                    // header('Location:?');

                    $data = array(
                        'events' => $this->model->getHomeEvents(),
                        'eventsPremium' => $this->model->getPremiumEvents(),
                        'categories' => $this->model->getHomeCategories()
                    );

                    if($data != null)
                    {
                        $messageFlash = 'Your E-mail has been added to our list !';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 5);
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
                else
                {
                    // erreur sql (déjà inséré ?)
                    $messageFlash = 'An error occur ! Please try again.';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 5);
                    define("TITLE_HEAD", "Error | Volunteers");
                    $this->load->view('view_error.php');
                }
            }
            else
            {
                // Email non valide
                $data = array(
                    'events' => $this->model->getHomeEvents(),
                    'eventsPremium' => $this->model->getPremiumEvents(),
                    'categories' => $this->model->getHomeCategories()
                );

                if($data != null)
                {
                    $messageFlash = 'Your E-mail is wrong, try again please.';
                    $this->coreSetFlashMessage('warning', $messageFlash, 5);
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
        }
        else
        {
            // Pas de data -> error
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }
}

