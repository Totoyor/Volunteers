<?php

class HomeController extends AppController
{
    public function __construct()
    {
        require 'app/model/BlogModel.php';
        $this->model = new PostModel();
        parent::__construct();
    }

    public function home()
    {
        // Sinon on apelle les articles du blog
        define("TITLE_HEAD", "Les derniers articles du blog");
        // Chargement de la vue
        $this->load->view('index.php');
    }
}