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
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 4);
            header('Location:?');
            exit();

        }
    }

    public function edit()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
            if (isset($_POST)) {
                if (isset($_POST['first_name'])) {
                    $first_name = $_POST['first_name'];
                } else {
                    $first_name = null;
                }

                if (isset($_POST['last_name'])) {
                    $last_name = $_POST['last_name'];
                } else {
                    $last_name = null;
                }

                if (isset($_POST['email'])) {
                    if($this->coreCheckEmail($_POST['email'])) {
                        $email = $_POST['email'];
                    }
                    else {
                        $messageFlash = 'Wrong email adress. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 4);
                        header('Location:profile/home');
                        exit();
                    }
                }

                if(isset($_POST['BirthDateSaved'])) {
                    $birth_date = $_POST['BirthDateSaved'];
                }
                elseif(isset($_POST['birth_day']) && isset($_POST['birth_month']) && isset($_POST['birth_year'])) {
                    $birth_date = $_POST['birth_day'] . "/" . $_POST['birth_month'] . "/" . $_POST['birth_year'];
                }
                else {
                    $birth_date = null;
                }

                if (isset($_POST['location'])) {
                    $location = $_POST['location'];
                } else {
                    $location = null;
                }

                if (isset($_POST['skills'])) {
                    $skills = $_POST['skills'];
                } else {
                    $skills = null;
                }

                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                } else {
                    $description = null;
                }

                if (isset($_POST['school'])) {
                    $school = $_POST['school'];
                } else {
                    $school = null;
                }

                if (isset($_POST['work'])) {
                    $work = $_POST['work'];
                } else {
                    $work = null;
                }

                $id = $_SESSION['user_id'];

                if (!empty($_FILES['userPicture']['name'])) {
                    $file = new Upload($_FILES['userPicture']['name'], $_FILES["userPicture"]["tmp_name"], 'assets/img/user_pp/', '');

                    if ($file->extControl()) {
                        if ($file->moveFile()) {
                            $userPicture = $file->setNom();
                            $lastId = $this->model->insertUserPicture($userPicture);
                        } else {
                            // fichier non déplacé
                            define("TITLE_HEAD", "An error occur.");
                            $messageFlash = 'An error occur. Please try again.';
                            $this->coreSetFlashMessage('error', $messageFlash, 3);
                            header('Location:profile/home');
                            exit();
                        }
                    } else {
                        // Extension non autorisée
                        define("TITLE_HEAD", "An error occur.");
                        $messageFlash = 'Invalid file extension. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header('Location:profile/home');
                        exit();
                    }
                } else {
                    if (isset($_POST['userPictureSaved'])) {
                        // TODO
                        // Supprimer l'ancienne photo
                        $userPicture = $_POST['userPictureSaved'];
                        $lastId = $this->model->insertUserPicture($userPicture);
                    } else {
                        $lastId = null;
                    }
                }

                if (!$this->model->update_profile($id, $first_name, $last_name, $birth_date, $email, $location, $description, $skills, $school, $work, $lastId)) {
                    // Si pas de données updaté
                    define("TITLE_HEAD", "An error occur.");
                    $messageFlash = 'An error occur. Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header('Location:profile/home');
                    exit();
                } else {
                    $messageFlash = 'Done ! Your information has been updated !';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 4);
                    header('Location:profile/home');
                    exit();
                }
            }
        }
    }

    public function delete()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            // Suppresion du user
            $this->model->deleteOne(array(
                'table' => 'users',
                'column' => 'idUser',
                'id' => $_SESSION['user_id']
            ));

            // Détruire la session
            session_unset();
            session_destroy();
            unset($_COOKIE['fbsr_941553679268599']);

            // Message de confirmation et redirection
            session_start();
            $messageFlash = 'Done ! Your information has been deleted !';
            $this->coreSetFlashMessage('sucess', $messageFlash, 4);
            header('Location:?');
            exit();
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 4);
            header('Location:?');
            exit();
        }
    }
}