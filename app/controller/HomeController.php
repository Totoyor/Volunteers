<?php

class HomeController extends AppController
{
    public function __construct()
    {
        require 'app/model/BlogModel.php';
        $this->model = new BlogModel();
        parent::__construct();
    }

    public function home()
    {
        // Sinon on apelle les articles du blog
        define("TITLE_HEAD", "Volunteers | Home");
        // Chargement de la vue
        $this->load->view('index.php');
    }
}