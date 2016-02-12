<?php
class AdminController extends AppController

{

    private $_loginAdmin;
    private $_passwordAdmin;

    public function __construct()
    {
        require 'app/model/AdminModel.php';
        $this->model = new AdminModel();
        parent::__construct();
    }

    public function dashboard()
    {
        //Si le user n'est pas connécté ou n'est pas admin il est rediriger vers la page de connexion
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {

            $data = array(
                'users' => $this->model->getUsers(),
                'events' => $this->model->getEvents()
            );
            // Chargement de la home
            define("TITLE_HEAD", "Volunteers | Admin");
            $this->load->view('admin/dashboard.php', $data);

        } else {

            header("location:".PATH_HOME."admin/signin");

        }
    }

    public function registerUser()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            // Chargement de la home
            define("TITLE_HEAD", "Volunteers | Admin");
            $this->load->view('admin/register.php');
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function edituser()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            $id = $_GET['id'];
            $data = $this->model->getUser($id);
            // Chargement de la home
            define("TITLE_HEAD", "Volunteers | Admin");
            $this->load->view('admin/edit_user.php', $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function userList()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "user List | Volunteers Admin");
            $data = array(
                'users' => $this->model->getUsers()
            );
            // Chargement de la vue
            $this->load->view('admin/user_list.php', $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function singleUser()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "user show | Volunteers Admin");
            $id = $_GET['id'];
            $data = $this->model->getUser($id);
            // Chargement de la vue
            $this->load->view('admin/user.php', $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function userStatus()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "user Status | Volunteers Admin");
            // Chargement de la vue
            $this->load->view('admin/user_status.php');
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function deleteUser()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "user Status | Volunteers Admin");
            $this->model->deleteOne(array(
                'table' => 'users',
                'column' => 'idUser',
                'id' => $_GET['id']
            ));

            // Message de confirmation et redirection
            $messageFlash = 'Done ! The information has been deleted !';
            $this->coreSetFlashMessage('success', $messageFlash, 4);
            $this->load->view('admin/user_list.php');
            exit();
            // Chargement de la vue
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function create()
    {
        if (isset($_SESSION['user_email'])) {

            if (isset($_POST)) {

                $event_name = $_POST['event_name'];

                //Si l'utilisateur décide de sauvegarder son évènement sans le publier
                if (isset($_POST['save'])) {

                    /* On test donc chaque champs du formulaire pour récupérer les infos à sauvegarder,
                     si un champs est remplis on récupère ça valeur sinon on le passe à NULL */
                    if (isset($_POST['event_location'])) {
                        $event_location = $_POST['event_location'];
                    } else {
                        $event_location = NULL;
                    }

                    if (isset($_POST['event_start'])) {
                        $start = $_POST['event_start'];
                        $search = array(',');
                        $replace = array('.');
                        $event_start = str_replace($search, $replace, $start);
                    } else {
                        $event_start = NULL;
                    }

                    if (isset($_POST['event_hour_start']) && isset($_POST['event_min_start'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'];
                    } else {
                        $event_hour_start = NULL;
                    }

                    if (isset($_POST['event_end'])) {
                        $end = $_POST['event_end'];
                        $search = array(',');
                        $replace = array('.');
                        $event_end = str_replace($search, $replace, $end);
                    } else {
                        $event_end = $event_start;
                    }

                    if (isset($_POST['event_hour_end']) && isset($_POST['event_min_end'])) {
                        $event_hour_end = $_POST['event_hour_end'] . ":" . $_POST['event_min_end'];
                    } else {
                        $event_hour_end = NULL;
                    }

                    if (isset($_POST['event_categories'])) {
                        $event_categories = $_POST['event_categories'];
                    } else {
                        $event_categories = NULL;
                    }

                    if(isset($_POST['facebook'])) {
                        $facebook = $_POST['facebook'];
                    } else {
                        $facebook = null;
                    }

                    if(isset($_POST['instagram'])) {
                        $instagram = $_POST['instagram'];
                    } else {
                        $instagram = null;
                    }

                    if(isset($_POST['youtube'])) {
                        $youtube = $_POST['youtube'];
                    } else {
                        $youtube = null;
                    }

                    if(isset($_POST['twitter'])) {
                        $twitter = $_POST['twitter'];
                    } else {
                        $twitter = null;
                    }

                    if (isset($_POST['event_description'])) {
                        $event_description = $_POST['event_description'];
                    } else {
                        $event_description = NULL;
                    }

                    if (isset($_POST['missions'])) {
                        $event_missions = $_POST['missions'];
                    } else {
                        $event_missions = NULL;
                    }

                    if (isset($_POST['nbVolunteer'])) {
                        $nb_volunteer = $_POST['nbVolunteer'];
                    } else {
                        $nb_volunteer = NULL;
                    }

                    $status = 0;
                    $user = $_SESSION['user_id'];

                    $lastId = $this->model->createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $status, $facebook, $instagram, $youtube, $twitter, $user);

                    if ($lastId !== null) {

                        if (isset($_POST['event_categories'])) {
                            for ($i = 0; $i < count($event_categories); $i++) {
                                $idEvent = $lastId;
                                $idCategory = $event_categories[$i];
                                $this->model->insertCategories($idCategory, $idEvent);
                            }
                        }

                        if (isset($_POST['missions'])) {
                            for ($i = 0; $i < count($event_missions); $i++) {
                                if ($_POST['missions'][$i] !== '') {
                                    $idEvent = $lastId;
                                    $missions = $event_missions[$i];
                                    $nbVolunteer = $nb_volunteer[$i];
                                    $this->model->insertMissions($idEvent, $missions, $nbVolunteer);
                                }
                            }
                        }

                        if (!empty($_FILES['coverPicture']['name'])) {
                            $file = new Upload($_FILES['coverPicture']['name'], $_FILES["coverPicture"]["tmp_name"], 'assets/img/events/uploads/', '');

                            if ($file->extControl()) {
                                if ($file->moveFile()) {
                                    if ($file->resizeFile()) {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($lastId, $coverPicture);
                                    } else {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($lastId, $coverPicture);
                                    }
                                }
                            }
                        }

                        if (!empty($_FILES['media'])) {

                            for ($i = 0; $i < count($_FILES['media']['name']); $i++) {

                                $name = $_FILES['media']['name'][$i];
                                $tmp_name = $_FILES["media"]["tmp_name"][$i];

                                $media = new Upload($name, $tmp_name, 'assets/img/events/uploads/', '');

                                if ($media->extControl()) {
                                    if ($media->moveFile()) {
                                        if ($media->resizeFile()) {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($lastId, $picture);
                                        } else {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($lastId, $picture);
                                        }
                                    }
                                }
                            }
                        }

                        //Chargement de la page des gestions des évènements pour l'utilisateur
                        $messageFlash = 'Your event has been saved';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 5);
                        header("location:".PATH_HOME."/admin/eventlist");
                        exit();

                    } else {
                        define("TITLE_HEAD", "Erreur | Volunteers");
                        // Chargement de la vue
                        $this->load->view('view_error.php');
                    }

                } elseif (isset($_POST['submit'])) {

                    // Si l'utilisateur clique sur publier on vérifie que tout les champs sont bien remplis puis
                    // ont effectue l'insertion dans la base

                    $event_name = $_POST['event_name'];

                    if (!empty($_POST['event_location'])) {
                        $event_location = $_POST['event_location'];
                    } else {
                        $messageFlash = 'Please set up the location';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    if (!empty($_POST['event_start'])) {
                        $start = $_POST['event_start'];
                        $search = array(',');
                        $replace = array('.');
                        $event_start = str_replace($search, $replace, $start);
                    } else {
                        $messageFlash = 'Please set up the beginning of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    if (!empty($_POST['event_hour_start']) && !empty($_POST['event_min_start']) && !empty($_POST['event_start_mode'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'] . " " . $_POST['event_start_mode'];
                    } else {
                        $messageFlash = 'Please set up the start time of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    if (!empty($_POST['event_end'])) {
                        //$event_end = $_POST['event_end'];
                        $end = $_POST['event_end'];
                        $search = array(',');
                        $replace = array('.');
                        $event_end = str_replace($search, $replace, $end);
                    } else {
                        $event_end = $event_start;
                    }

                    if (!empty($_POST['event_hour_end']) && !empty($_POST['event_min_end']) && !empty($_POST['event_end_mode'])) {
                        $event_hour_end = $_POST['event_hour_end'] . ":" . $_POST['event_min_end'] . " " . $_POST['event_end_mode'];
                    } else {
                        $messageFlash = 'Please set up the end time of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    if (!empty($_POST['event_categories'])) {
                        $event_categories = $_POST['event_categories'];
                    } else {
                        $messageFlash = 'Please set up the categori';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    if (!empty($_POST['event_description'])) {
                        $event_description = $_POST['event_description'];
                    } else {
                        $messageFlash = 'Please describe your event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        $event_description = NULL;
                    }

                    if (!empty($_POST['facebook'])) {
                        $facebook = $_POST['facebook'];
                    } else {
                        $facebook = null;
                    }

                    if (!empty($_POST['instagram'])) {
                        $instagram = $_POST['instagram'];
                    } else {
                        $instagram = null;
                    }

                    $youtube = !empty($_POST['youtube']) ? $_POST['youtube'] : null;

                    $twitter = !empty($_POST['twitter']) ? $_POST['twitter'] : null;

                    if (!empty($_POST['missions'])) {
                        $event_missions = $_POST['missions'];
                    } else {
                        $messageFlash = 'Please set up the different missions';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    if (!empty($_POST['nbVolunteer'])) {
                        $nb_volunteer = $_POST['nbVolunteer'];
                    } else {
                        $messageFlash = 'Please set up the number of volunteers';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }


                    $status = 1;
                    $user = $_SESSION['user_id'];

                    $lastId = $this->model->createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $status, $facebook, $instagram, $youtube, $twitter, $user);

                    if ($lastId !== null) {

                        for ($i = 0; $i < count($event_categories); $i++) {
                            $idEvent = $lastId;
                            $idCategory = $event_categories[$i];
                            $this->model->insertCategories($idCategory, $idEvent);
                        }

                        for ($i = 0; $i < count($event_missions); $i++) {
                            if ($_POST['missions'][$i] !== '') {
                                $idEvent = $lastId;
                                $missions = $event_missions[$i];
                                $nbVolunteer = $nb_volunteer[$i];
                                $this->model->insertMissions($idEvent, $missions, $nbVolunteer);
                            }
                        }

                        if (!empty($_FILES['coverPicture']['name'])) {
                            $file = new Upload($_FILES['coverPicture']['name'], $_FILES["coverPicture"]["tmp_name"], 'assets/img/events/uploads/', '');

                            if ($file->extControl()) {
                                if ($file->moveFile()) {
                                    if ($file->resizeFile()) {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($lastId, $coverPicture);
                                    } else {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($lastId, $coverPicture);
                                    }
                                }
                            } else {
                                $messageFlash = 'The file extension isn\'t ok';
                                $this->coreSetFlashMessage('error', $messageFlash, 3);
                                header("location:".PATH_HOME."/admin/createevent");
                                exit();
                            }
                        }

                        if (!empty($_FILES['media'])) {

                            for ($i = 0; $i < count($_FILES['media']['name']); $i++) {

                                $name = $_FILES['media']['name'][$i];
                                $tmp_name = $_FILES["media"]["tmp_name"][$i];

                                $media = new Upload($name, $tmp_name, 'assets/img/events/uploads/', '');

                                if ($media->extControl()) {
                                    if ($media->moveFile()) {
                                        if ($media->resizeFile()) {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($lastId, $picture);
                                        } else {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($lastId, $picture);
                                        }
                                    }
                                }
                            }
                        }

                    } else {
                        $messageFlash = 'There was a problem during the publishing';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."/admin/createevent");
                        exit();
                    }

                    //Chargement de la vue de l'évènement
                    header('location:'.PATH_HOME.'admin/eventlist');
                    exit();

                } else {
                    define("TITLE_HEAD", "Erreur | Volunteers");
                    // Chargement de la vue
                    $this->load->view('view_error.php');
                }

            }

        } else {
            header("location:".PATH_HOME."/admin/createevent");
            exit();
        }
    }

    public function edit()
    {
        if (isset($_SESSION['user_email'])) {

            if (isset($_POST)) {

                $event_name = $_POST['event_name'];
                $idEvent = $_POST['idEvent'];

                //Si l'utilisateur décide de sauvegarder son évènement sans le publier
                if (isset($_POST['save'])) {

                    /* On test donc chaque champs du formulaire pour récupérer les infos à sauvegarder,
                     si un champs est remplis on récupère ça valeur sinon on le passe à NULL */
                    if (isset($_POST['event_location'])) {
                        $event_location = $_POST['event_location'];
                    } else {
                        $event_location = NULL;
                    }

                    if (isset($_POST['event_start'])) {
                        $start = $_POST['event_start'];
                        $search = array(',');
                        $replace = array('.');
                        $event_start = str_replace($search, $replace, $start);
                    } else {
                        $event_start = NULL;
                    }

                    if (isset($_POST['event_hour_start']) && isset($_POST['event_min_start'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'] . " " . $_POST['event_start_mode'];
                    } else if (isset($_POST['hourStartSave']) && !empty($_POST['hourStartSave'])) {
                        $event_hour_start = $_POST['hourStartSave'];
                    } else {
                        $event_hour_start = NULL;
                    }

                    if (isset($_POST['event_end'])) {
                        $end = $_POST['event_end'];
                        $search = array(',');
                        $replace = array('.');
                        $event_end = str_replace($search, $replace, $end);
                    } else {
                        $event_end = $event_start;
                    }

                    if (isset($_POST['event_hour_end']) && isset($_POST['event_min_end'])) {
                        $event_hour_end = $_POST['event_hour_end'] . ":" . $_POST['event_min_end'] . " " . $_POST['event_end_mode'];
                    } else if (isset($_POST['hourEndSave']) && !empty($_POST['hourEndSave'])) {
                        $event_hour_end = $_POST['hourEndSave'];
                    } else {
                        $event_hour_end = NULL;
                    }

                    if (isset($_POST['event_categories'])) {
                        $event_categories = $_POST['event_categories'];
                    } else if (isset($_POST['categoriesSave']) && !empty($_POST['categoriesSave'])) {
                        $event_categories = $_POST['categoriesSave'];
                    } else {
                        $event_categories = NULL;
                    }

                    if (isset($_POST['facebook'])) {
                        $facebook = $_POST['facebook'];
                    } else {
                        $facebook = null;
                    }

                    if (isset($_POST['instagram'])) {
                        $instagram = $_POST['instagram'];
                    } else {
                        $instagram = null;
                    }

                    if (isset($_POST['youtube'])) {
                        $youtube = $_POST['youtube'];
                    } else {
                        $youtube = null;
                    }

                    if (isset($_POST['twitter'])) {
                        $twitter = $_POST['twitter'];
                    } else {
                        $twitter = null;
                    }

                    if (isset($_POST['event_description'])) {
                        $event_description = $_POST['event_description'];
                    } else {
                        $event_description = NULL;
                    }

                    if (isset($_POST['missions'])) {
                        $event_missions = $_POST['missions'];
                    } else {
                        $event_missions = NULL;
                    }

                    if (isset($_POST['nbVolunteer'])) {
                        $nb_volunteer = $_POST['nbVolunteer'];
                    } else {
                        $nb_volunteer = NULL;
                    }

                    $status = 0;

                    $user = $_SESSION['user_id'];

                    if ($this->model->editEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $facebook, $instagram, $youtube, $twitter, $status, $user, $idEvent)
                    ) {

                        if (isset($_POST['event_categories'])) {
                            for ($i = 0; $i < count($event_categories); $i++) {
                                //$idEvent = $lastId;
                                $idCategory = $event_categories[$i];
                                $this->model->editCategories($idCategory, $idEvent);
                            }
                        } else if (isset($_POST['categoriesSave']) && !empty($_POST['categoriesSave'])) {
                            $idCategory = $_POST['categoriesSave'];
                            $this->model->editCategories($idCategory, $idEvent);
                        }

                        if (isset($_POST['missions'])) {
                            for ($i = 0; $i < count($event_missions); $i++) {
                                if ($_POST['missions'][$i] !== '') {
                                    $missions = $event_missions[$i];
                                    $nbVolunteer = $nb_volunteer[$i];
                                    $this->model->insertMissions($idEvent, $missions, $nbVolunteer);
                                }
                            }
                        }

                        if (!empty($_POST['missionsSave'])) {
                            for ($i = 0; $i < count($_POST['missionsSave']); $i++) {
                                if ($_POST['missionsSave'][$i] !== '') {
                                    $idMission = $_POST['idMissionsSave'][$i];
                                    $missions = $_POST['missionsSave'][$i];
                                    $nbVolunteer = $_POST['nbVolunteerSave'][$i];
                                    $this->model->editMissions($idEvent, $missions, $nbVolunteer, $idMission);
                                }
                            }
                        }

                        if (!empty($_FILES['coverPicture']['name'])) {
                            $file = new Upload($_FILES['coverPicture']['name'], $_FILES["coverPicture"]["tmp_name"], 'assets/img/events/uploads/', '');

                            if ($file->extControl()) {
                                if ($file->moveFile()) {
                                    if ($file->resizeFile()) {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($idEvent, $coverPicture);
                                    } else {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($idEvent, $coverPicture);
                                    }
                                }
                            }
                        } else if (isset($_POST['coverPictureSave']) && !empty($_POST['coverPictureSave'])) {
                            $coverPicture = $_POST['coverPictureSave'];
                            $this->model->insertCoverPicture($idEvent, $coverPicture);
                        }


                        if (!empty($_FILES['media'])) {

                            for ($i = 0; $i < count($_FILES['media']['name']); $i++) {

                                $name = $_FILES['media']['name'][$i];
                                $tmp_name = $_FILES["media"]["tmp_name"][$i];

                                $media = new Upload($name, $tmp_name, 'assets/img/events/uploads/', '');

                                if ($media->extControl()) {
                                    if ($media->moveFile()) {
                                        if ($media->resizeFile()) {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($idEvent, $picture);
                                        } else {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($idEvent, $picture);
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($_POST['mediasSave']) && !empty($_POST['mediasSave'])) {
                            for ($i = 0; $i < count($_POST['mediasSave']); $i++) {
                                $picture = $_POST['mediasSave'][$i];
                                //Fonction update
                            }
                        }

                        //Chargement de la vue de l'évènement
                        $messageFlash = 'Your event has been saved';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 3);
                        header("location:../profile/events");
                        exit();
                    } else {
                        define("TITLE_HEAD", "Erreur | Volunteers");
                        // Chargement de la vue
                        $this->load->view('view_error.php');
                    }

                } elseif (isset($_POST['submit'])) {

                    // Si l'utilisateur clique sur publier on vérifie que tout les champs sont bien remplis puis
                    // ont effectue l'insertion dans la base

                    $event_name = $_POST['event_name'];

                    if (!empty($_POST['event_location'])) {
                        $event_location = $_POST['event_location'];
                    } else {
                        $messageFlash = 'Please set up the location';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_start'])) {
                        $start = $_POST['event_start'];
                        $search = array(',');
                        $replace = array('.');
                        $event_start = str_replace($search, $replace, $start);
                    } else {
                        $messageFlash = 'Please set up the beginning of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_hour_start']) && !empty($_POST['event_min_start']) && !empty($_POST['event_start_mode'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'] . " " . $_POST['event_start_mode'];
                    } else if (isset($_POST['hourStartSave']) && !empty($_POST['hourStartSave'])) {
                        $event_hour_start = $_POST['hourStartSave'];
                    } else {
                        $messageFlash = 'Please set up the start time of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_end'])) {
                        //$event_end = $_POST['event_end'];
                        $end = $_POST['event_end'];
                        $search = array(',');
                        $replace = array('.');
                        $event_end = str_replace($search, $replace, $end);
                    } else {
                        $event_end = $event_start;
                    }

                    if (!empty($_POST['event_hour_end']) && !empty($_POST['event_min_end']) && !empty($_POST['event_end_mode'])) {
                        $event_hour_end = $_POST['event_hour_end'] . ":" . $_POST['event_min_end'] . " " . $_POST['event_end_mode'];
                    } else if (isset($_POST['hourEndSave']) && !empty($_POST['hourEndSave'])) {
                        $event_hour_end = $_POST['hourEndSave'];
                    } else {
                        $messageFlash = 'Please set up the end time of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_categories'])) {
                        $event_categories = $_POST['event_categories'];
                    } else if (isset($_POST['categorieSave']) && !empty($_POST['categorieSave'])) {
                        $event_categories = $_POST['categorieSave'];
                    } else {
                        $messageFlash = 'Please set up the categori';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_description'])) {
                        $event_description = $_POST['event_description'];
                    } else {
                        $messageFlash = 'Please describe your event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        $event_description = NULL;
                    }

                    if (!empty($_POST['facebook'])) {
                        $facebook = $_POST['facebook'];
                    } else {
                        $facebook = null;
                    }

                    if (!empty($_POST['instagram'])) {
                        $instagram = $_POST['instagram'];
                    } else {
                        $instagram = null;
                    }

                    $youtube = !empty($_POST['youtube']) ? $_POST['youtube'] : null;

                    $twitter = !empty($_POST['twitter']) ? $_POST['twitter'] : null;

                    if (!empty($_POST['missions'])) {
                        $event_missions = $_POST['missions'];
                    } else {
                        $messageFlash = 'Please set up the different missions';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }

                    if (!empty($_POST['nbVolunteer'])) {
                        $nb_volunteer = $_POST['nbVolunteer'];
                    } else {
                        $messageFlash = 'Please set up the number of volunteers';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/" . $idEvent);
                        exit();
                    }


                    $status = 1;
                    $user = $_SESSION['user_id'];

                    if ($this->model->editEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $facebook, $instagram, $youtube, $twitter, $status, $user, $idEvent)
                    ) {

                        if (isset($_POST['event_categories'])) {
                            for ($i = 0; $i < count($event_categories); $i++) {
                                //$idEvent = $lastId;
                                $idCategory = $event_categories[$i];
                                $this->model->editCategories($idCategory, $idEvent);
                            }
                        } else if (isset($_POST['categoriesSave']) && !empty($_POST['categoriesSave'])) {
                            $idCategory = $_POST['categoriesSave'];
                            $this->model->editCategories($idCategory, $idEvent);
                        }

                        if (isset($_POST['missions'])) {
                            for ($i = 0; $i < count($event_missions); $i++) {
                                if ($_POST['missions'][$i] !== '') {
                                    $missions = $event_missions[$i];
                                    $nbVolunteer = $nb_volunteer[$i];
                                    $this->model->insertMissions($idEvent, $missions, $nbVolunteer);
                                }
                            }
                        } else {

                        }

                        if (!empty($_POST['missionsSave'])) {
                            for ($i = 0; $i < count($_POST['missionsSave']); $i++) {
                                if ($_POST['missionsSave'][$i] !== '') {
                                    $idMission = $_POST['idMissionsSave'][$i];
                                    $missions = $_POST['missionsSave'][$i];
                                    $nbVolunteer = $_POST['nbVolunteerSave'][$i];
                                    $this->model->editMissions($idEvent, $missions, $nbVolunteer, $idMission);
                                }
                            }
                        }

                        if (!empty($_FILES['coverPicture']['name'])) {
                            $file = new Upload($_FILES['coverPicture']['name'], $_FILES["coverPicture"]["tmp_name"], 'assets/img/events/uploads/', '');

                            if ($file->extControl()) {
                                if ($file->moveFile()) {
                                    if ($file->resizeFile()) {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($idEvent, $coverPicture);
                                    } else {
                                        $coverPicture = $file->setNom();
                                        $this->model->insertCoverPicture($idEvent, $coverPicture);
                                    }
                                }
                            }
                        } else if (isset($_POST['coverPictureSave']) && !empty($_POST['coverPictureSave'])) {
                            $coverPicture = $_POST['coverPictureSave'];
                            $this->model->insertCoverPicture($idEvent, $coverPicture);
                        }


                        if (!empty($_FILES['media'])) {

                            for ($i = 0; $i < count($_FILES['media']['name']); $i++) {

                                $name = $_FILES['media']['name'][$i];
                                $tmp_name = $_FILES["media"]["tmp_name"][$i];

                                $media = new Upload($name, $tmp_name, 'assets/img/events/uploads/', '');

                                if ($media->extControl()) {
                                    if ($media->moveFile()) {
                                        if ($media->resizeFile()) {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($idEvent, $picture);
                                        } else {
                                            $picture = $media->setNom();
                                            $this->model->insertMediaPicture($idEvent, $picture);
                                        }
                                    }
                                }
                            }
                        }

                        if (isset($_POST['mediasSave']) && !empty($_POST['mediasSave'])) {
                            for ($i = 0; $i < count($_POST['mediasSave']); $i++) {
                                $picture = $_POST['mediasSave'][$i];
                                //Fonction update
                            }
                        }

                        //Chargement de la vue de l'évènement
                        $messageFlash = 'Your event has been published';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 3);
                        header("location:show/" . $idEvent);
                        exit();

                    } else {
                        define("TITLE_HEAD", "Erreur | Volunteers");
                        // Chargement de la vue
                        $this->load->view('view_error.php');
                    }

                } else {
                    define("TITLE_HEAD", "Erreur | Volunteers");
                    // Chargement de la vue
                    $this->load->view('view_error.php');
                }

            }

        } else {
            $messageFlash = 'Please log in';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header("location:../home/home");
            exit();
        }
    }

    public function createEvent()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            // Chargement de la home
            define("TITLE_HEAD", "Volunteers | Admin");
            $data = array(
              'categories' => $this->model->getCategories()
            );
            $this->load->view('admin/event.php', $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function eventList()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "Event List | Volunteers Admin");
            $data = array(
                'events' => $this->model->getEvents()
            );
            // Chargement de la vue
            $this->load->view('admin/event_list.php', $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function singleEvent()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {

            define("TITLE_HEAD", "Event Name | Volunteers Admin");
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data = array(
                    'event' => $this->model->getEvent($id),
                    'missions' => $this->model->getMissions($id),
                    'nbVolunteer' => $this->model->getNbVolunteers($id),
                    'medias' => $this->model->getMedias($id),
                    'volunteers' => $this->model->getVolunteers($id),
                    'questions' => $this->model->getQuestions($id)
                );
                // Chargement de la vue
                $this->load->view('admin/event.php', $data);
            } else {
                $this->load->view('view_error.php');
            }

        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function deleteEvent()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {


            $this->model->deleteEvent($_GET['id']);
            // Message de confirmation et redirection
            $messageFlash = 'Done ! The information has been deleted !';
            $this->coreSetFlashMessage('success', $messageFlash, 4);
            //define("TITLE_HEAD", "user Status | Volunteers Admin");
            header("location:".PATH_HOME."admin/eventlist");
            exit();
            // Chargement de la vue
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function categories()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {

            if (isset($_POST['category'])) {
                $this->model->insertCategory($_POST['category']);
            }

            if (isset($_GET['id'])) {

                $this->model->deleteCategory($_GET['id']);

                $data = array(
                    'categories' => $this->model->getCategories()
                );
            } else {
                $data = array(
                    'categories' => $this->model->getCategories()
                );
            }

            // Chargement de la vue
            define("TITLE_HEAD", "Event Name | Volunteers Admin");
            $this->load->view('admin/categories.php', $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }

    }

    public function deleteCategory()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {

            define("TITLE_HEAD", "Event Name | Volunteers Admin");
            if (isset($_GET['category'])) {
                $this->model->deleteCategory($_GET['category']);
            }
            $data = array(
                'categories' => $this->model->getCategories()
            );
            // Chargement de la vue
            $this->load->view('admin/categories.php', $data);

        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function inbox()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "Event Name | Volunteers Admin");
            // Chargement de la vue
            $this->load->view('admin/inbox.php');
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function compose()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "Event Name | Volunteers Admin");
            // Chargement de la vue
            $this->load->view('admin/compose.php');
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function signin()
    {
        if(isset($_POST['username']) && isset($_POST['password'])) {

            $this->_loginAdmin = $_POST['username'];
            $this->_passwordAdmin = md5($_POST['password']);

            if($user = $this->model->connexionUser($this->_loginAdmin, $this->_passwordAdmin))
            {
                if($user['Active'] == 1)
                {
                    // on set les infos dans la session
                    $_SESSION['user_email'] = $user['Email'];
                    $_SESSION['user_id'] = $user['idUser'];
                    $_SESSION['user_status'] = $user['vol_user_status_idStatus'];

                    // on set le message de confirmation
                    $messageFlash = 'Well done! You are now logged in!';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 5);
                    // et on renvoi sur la page d'accueil
                    header('Location:'.PATH_HOME.'admin/dashboard');
                    exit();
                }
                else
                {
                    // Si ok (true) alors on set le message d'erreur
                    $messageFlash = 'Please confirm your email :)';
                    $this->coreSetFlashMessage('warning', $messageFlash, 4);
                    // et on renvoi sur la page d'accueil
                    header('Location:'.PATH_HOME.'admin/signin');
                    exit();
                }
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'Wrong email or wrong password. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:'.PATH_HOME.'admin/signin');
                exit();
            }

        } else {
            define("TITLE_HEAD", "Sign-in | Volunteers Admin");
            // Chargement de la vue
            $this->load->view('admin/sign_in.php');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        unset($_COOKIE['fbsr_941553679268599']);
        header('Location:'.PATH_HOME.'admin/signin');
        exit();
    }

    public function signup()
    {
        if(isset($_POST['email']) && $_POST['password'])
        {
            if(!empty($_POST['email']) && (!empty($_POST['password'])))
            {
                if(!$this->coreCheckEmail($_POST['email']))
                {
                    define("TITLE_HEAD", "An error occur.");
                    $messageFlash = 'Your email is wrong. Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header('Location:?email=NOK');
                    exit();
                }
                else
                {
                    $this->_login = $_POST['email'];
                    $this->_password = md5($_POST['password']);
                    $this->_status = 1;
                    $this->_userKey = mt_rand();

                    if($this->model->inscriptionUser($this->_login, $this->_password, $this->_status, $this->_userKey))
                    {
                        // Si ok (true) alors on renvoi sur la page d'accueil
                        //$messageFlash = 'Your account has been created. Please confirm your email through the one we sent you.';
                        //$this->coreSetFlashMessage('sucess', $messageFlash, 6);
                        header("location:".PATH_HOME."admin/userlist");
                        exit();
                    }
                    else
                    {
                        define("TITLE_HEAD", "An error occurred.");
                        //$messageFlash = 'An error has occurred. Please try again.';
                        //$this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:".PATH_HOME."admin/registeruser");
                        exit();
                    }
                }
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'An error has occurred. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:?signup=nok');
                exit();
            }
        }
        else
        {
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'An error has occurred. Please try again.';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header('Location:?signup=nok');
            exit();
        }
    }

    public function activateuser()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {

            if(isset($_GET['id'])) {

                $idUser = $_GET['id'];

                if($this->model->activateUser($idUser)) {
                    header("location:".PATH_HOME."admin/userlist");
                } else {
                    //header("location:".PATH_HOME."admin/userlist");
                    die('nok');
                }
            }

        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function disableuser()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {

            if(isset($_GET['id'])) {

                $idUser = $_GET['id'];

                if($this->model->disableUser($idUser)) {
                    header("location:".PATH_HOME."admin/edituser/".$idUser);
                } else {
                    //header("location:".PATH_HOME."admin/userlist");
                    die('nok');
                }
            }

        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }

    public function usersreview()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 2) {
            define("TITLE_HEAD", "Reviews | Rates");
            $data = array(
                'users' => $this->model->getUsers()
            );
            $this->load->view("admin/review_list.php", $data);
        } else {
            header("location:".PATH_HOME."admin/signin");
        }
    }
}