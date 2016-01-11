<?php

class ProfileController extends AppController
{
    public function __construct()
    {
        require 'app/model/ProfileModel.php';
        $this->model = new ProfileModel();
        parent::__construct();
    }

    public function home()
    {
        if(isset($_SESSION['user_id']))
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
        else
        {
            // Si pas de data on apelle la page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('view_error.php');
        }

    }

    public function edit()
    {
        if(isset($_POST))
        {
            if (isset($_POST['first_name'])) {
                $first_name = $_POST['first_name'];
            } else {
                $first_name = NULL;
            }

            if (isset($_POST['last_name'])) {
                $last_name = $_POST['last_name'];
            } else {
                $last_name = NULL;
            }

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $email = NULL;
            }

            if(isset($_POST['birth_day']) && $_POST['birth_month'] && $_POST['birth_year'])
            {
                $birth_date = $_POST['birth_day']."/".$_POST['birth_month']."/".$_POST['birth_year'];
            }
            else {
                $birth_date = NULL;
            }

            if(isset($_POST['location']))
            {
                $location = $_POST['location'];
            }
            else {
                $location = NULL;
            }

            $id = $_SESSION['user_id'];

            if(!$this->model->update_profile($id, $first_name, $last_name, $birth_date, $email, $location))
            {
                // Si pas de données updaté on appel la page d'erreur
                define("TITLE_HEAD", "Erreur technique !");
                $this->load->view('view_error.php');
            }
            else
            {
                // TODO
                // à voir si on peut changer par un header location
                // + Message de confirmation

                // Charger les informations du profil
                $data = $this->model->readOne(array(
                    "table" => "users",
                    // "columns" => "col1, col2",
                    "column_id" => "idUser",
                    "id" => $_SESSION['user_id']
                ));

                // Chargement de la vue du profil
                define("TITLE_HEAD", "Volunteers | Profile");
                $this->load->view('user/profile.php', $data);
            }
        }
    }

}