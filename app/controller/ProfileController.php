<?php

class ProfileController extends AppController
{
    public function __construct()
    {
        require 'app/model/BlogModel.php';
        $this->model = new BlogModel();
        parent::__construct();
    }

    public function home()
    {
        // Chargement de la vue du profil
        define("TITLE_HEAD", "Volunteers | Profile");
        $this->load->view('user/profile.php');
    }
}