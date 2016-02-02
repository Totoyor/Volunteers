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
}

