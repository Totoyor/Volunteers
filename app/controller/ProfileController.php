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
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            // Charger les informations du profil
            $data = $this->model->getProfile($_SESSION['user_id']);

            if(!$data)
            {
                // Si pas de data on apelle la page d'erreur
                define("TITLE_HEAD", "An error occur !");
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
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 4);
            // Si pas de data on renvoi sur la page d'accueil
            header('Location:?');
            exit();

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

            if(isset($data['BirthDate']))
            {
                $birth_date = $data['BirthDate'];
            }
            elseif(isset($_POST['birth_day']) && $_POST['birth_month'] && $_POST['birth_year'])
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

            if (!empty($_FILES['userPicture']['name'])) {
                $file = new Upload($_FILES['userPicture']['name'], $_FILES["userPicture"]["tmp_name"], 'assets/img/user_pp/', '');

                if ($file->extControl()) {
                    if ($file->moveFile()) {
                        $userPicture = $file->setNom();
                        $lastId = $this->model->insertUserPicture($userPicture);
                        //TODO
                        // if($lastId == null) alors blablabla
                    }
                    else {
                        // fichier non déplacé
                        define("TITLE_HEAD", "An error occur.");
                        $messageFlash = 'An error occur. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header('Location:profile/home');
                        exit();
                    }
                }
                else {
                    // Extension non autorisée
                    define("TITLE_HEAD", "An error occur.");
                    $messageFlash = 'Invalid file extension. Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header('Location:profile/home');
                    exit();
                }
            }
            else {
                $lastId = null;
            }

            if(!$this->model->update_profile($id, $first_name, $last_name, $birth_date, $email, $location, $lastId))
            {
                // Si pas de données updaté
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'An error occur. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:profile/home');
                exit();
            }
            else
            {
                $messageFlash = 'Done ! Your information has been updated !';
                $this->coreSetFlashMessage('sucess', $messageFlash, 4);
                header('Location:profile/home');
                exit();
            }
        }
    }

}