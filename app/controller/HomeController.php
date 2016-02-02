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
            'events' => $this->model->getEvents(),
            'eventsPremium' => $this->model->getPremiumEvents()
        );

        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Home");
        $this->load->view('page/index.php', $data);
    }
}

