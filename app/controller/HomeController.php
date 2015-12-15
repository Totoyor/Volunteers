<?php

class HomeController extends AppController
{
    public function __construct()
    {
        require 'app/model/UserModel.php';
        $this->model = new UserModel();
        parent::__construct();
    }

    public function home()
    {
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Home");
        $this->load->view('index.php');
    }
}