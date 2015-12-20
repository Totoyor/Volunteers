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
        // Charger les informations du profil
        $data = $this->model->readOne(array(
            "table" => "users",
            // "columns" => "col1, col2",
            "column_id" => "idUser",
            "id" => $_SESSION['user_id']
        ));

        if(!$data)
        {
            // Si pas de data on apelle la page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('view_error.php');
        }
        else
        {
            // Chargement de la vue du profil
            define("TITLE_HEAD", "Volunteers | Profile");
            $this->load->view('user/profile.php', $data);
        }

    }

}