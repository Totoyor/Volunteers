<?php

class ProfileController extends AppController
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        require 'app/model/ProfileModel.php';
        $this->model = new ProfileModel();
        parent::__construct();
    }

    /** Fonction d'affichage de la page du profil utilisateur
     *
     */
    public function home()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            // Charger les informations du profil
            $data = array(
                'user' => $this->model->getProfile($_SESSION['user_id'])
            );

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
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');

        }
    }

    /** Fonction de modification des informations de l'utilisateur via son profil
     *
     */
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
            else
            {
                // Pas de post
                $messageFlash = 'Error !';
                $this->coreSetFlashMessage('error', $messageFlash, 5);
                define("TITLE_HEAD", "Error | Volunteers");
                $this->load->view('view_error.php');
            }
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction de suppression du compte utilisateur
     *
     */
    public function delete()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            // Suppresion du user
            if($this->model->deleteOne(array(
                'table' => 'users',
                'column' => 'idUser',
                'id' => $_SESSION['user_id']
            )))
            {
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
                // User non supprimé
                $messageFlash = 'Error ! An error occur !';
                $this->coreSetFlashMessage('error', $messageFlash, 5);
                define("TITLE_HEAD", "Error | Volunteers");
                $this->load->view('view_error.php');
            }
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction d'affichage des missions de l'utilisateur dans sa page profil
     *
     */
    public function missions()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $idUser = $_SESSION['user_id'];
            $data = array(
                'missionsNok' => $this->model->getUserMissions($idUser, 0),
                'missionsOk' => $this->model->getUserMissions($idUser, 1),
                'user' => $this->model->getProfile($_SESSION['user_id'])
            );
            define("TITLE_HEAD", "Volunteers | Profile");
            $this->load->view("user/missions.php", $data);
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction d'affichage des évènements crée et sauvegardé par l'utilisateur dans son profil
     *
     */
    public function events()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $data = array(
                'eventsPulished' => $this->model->selectEventsUserPublished($_SESSION['user_id']),
                'eventSaved' => $this->model->selectEventsUserSaved($_SESSION['user_id']),
                'user' => $this->model->getProfile($_SESSION['user_id'])
            );

            if(!$data)
            {
                // Pas de data
                define("TITLE_HEAD", "Error | Volunteers");
                $this->load->view('view_error.php');
            }
            else
            {
                define("TITLE_HEAD", "Volunteers | Profile");
                $this->load->view("user/my_events.php", $data);
            }
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction d'affichage du dashboard de l'utilisateur dans son profil
     *
     */
    public function dashboard()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $idUser = $_SESSION['user_id'];
            $data = array(
                'missions' => $this->model->getUserMissions($idUser, 1),
                'reviews' => $this->model->getReview($idUser),
                'user' => $this->model->getProfile($_SESSION['user_id'])
            );

            if(!$data)
            {
                // Pas de data
                define("TITLE_HEAD", "Error | Volunteers");
                $this->load->view('view_error.php');
            }
            else
            {
                define("TITLE_HEAD", "Volunteers | Profile");
                $this->load->view("user/dashboard.php", $data);
            }
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction d'affichage de la page de profil public de l'utilisateur
     *
     */
    public function show()
    {
        if(isset($_GET['id']))
        {
            $idUser = $_GET['id'];
            $data = array(
                'infos' => $this->model->getProfile($idUser),
                'reviews' => $this->model->getReview($idUser),
                'rating' => $this->model->getAverage($idUser)
            );

            if(!$data)
            {
                // Pas de data
                define("TITLE_HEAD", "Error | Volunteers");
                $this->load->view('view_error.php');
            }
            else
            {
                define("TITLE_HEAD", "Volunteers | Public Profile");
                $this->load->view("user/profile_public.php", $data);
            }
        }
        else
        {
            // Pas d'id
            $messageFlash = 'Error !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction d'ajout de commentaire sur un profil public d'un utilisateur
     *
     */
    public function comment()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $idVolunteer = $_POST['idvolunteer'];
            $idUser = $_SESSION['user_id'];

            if(isset($_POST['profile_comment']) && !empty($_POST['profile_comment']))
            {
                $comment = $_POST['profile_comment'];

                if($this->model->insertComment($idVolunteer, $idUser, $comment)) {
                    $messageFlash = 'Your comment has been published';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 4);
                    header('Location:show/'.$idVolunteer);
                } else {
                    $messageFlash = 'A problem occured';
                    $this->coreSetFlashMessage('error', $messageFlash, 4);
                    header('Location:show/'.$idVolunteer);
                }
            }
            else {
                header('Location:show/'.$idVolunteer);
            }
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    /** Fonction de notation d'un utilisateur sur son profil public
     *
     */
    public function rate()
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))
        {
            $idVolunteer = $_POST['idVolunteer'];
            $idUser = $_SESSION['user_id'];
            $rate = $_POST['rate'];

            if($this->model->insertRate($idVolunteer, $idUser, $rate))
            {
                $messageFlash = 'Your rate has been sent';
                $this->coreSetFlashMessage('sucess', $messageFlash, 4);
                header('Location:show/'.$idVolunteer);
            } else {
                $messageFlash = 'A problem occured';
                $this->coreSetFlashMessage('error', $messageFlash, 4);
                header('Location:show/'.$idVolunteer);
            }
        }
        else
        {
            // Pas de session
            $messageFlash = 'Error ! You are not logged in !';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }
}