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
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/register.php');
    }

    public function editUser()
    {
        $id = $_GET['id'];
        $data = $this->model->getUser($id);
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/edit_user.php', $data);
    }

    public function userList()
    {
        define("TITLE_HEAD", "user List | Volunteers Admin");
        $data = array(
            'users' => $this->model->getUsers()
        );
        // Chargement de la vue
        $this->load->view('admin/user_list.php', $data);
    }

    public function singleUser()
    {
        define("TITLE_HEAD", "user show | Volunteers Admin");
        $id = $_GET['id'];
        $data = $this->model->getUser($id);
        // Chargement de la vue
        $this->load->view('admin/user.php', $data);
    }

    public function userStatus()
    {
        define("TITLE_HEAD", "user Status | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/user_status.php');
    }

    public function deleteUser()
    {
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
                        $event_hour_end, $event_description, $status, $user);

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

                        //Chargement de la vue de l'évènement
                        //$data = $this->model->getEvent($lastId);
                        $data = array(
                            'event' => $this->model->getEvent($lastId),
                            'missions' => $this->model->getMissions($lastId),
                            'nbVolunteer' => $this->model->getNbVolunteers($lastId),
                            'medias' => $this->model->getMedias($lastId),
                            'volunteers' => $this->model->getVolunteers($lastId)
                        );
                        define("TITLE_HEAD", "Event Save | Volunteers");
                        $this->load->view('event/view_event.php', $data);
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
                        header("location:home?create&event=locationNok");
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
                        header("location:home?create&event=startNok");
                        exit();
                    }

                    if (!empty($_POST['event_hour_start']) && !empty($_POST['event_min_start']) && !empty($_POST['event_start_mode'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'] . " " . $_POST['event_start_mode'];
                    } else {
                        $messageFlash = 'Please set up the start time of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:home?create&event=startTimeNok");
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
                        header("location:home?create&event=endTimeNok");
                        exit();
                    }

                    if (!empty($_POST['event_categories'])) {
                        $event_categories = $_POST['event_categories'];
                    } else {
                        $messageFlash = 'Please set up the categori';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:home?create&event=catNok");
                        exit();
                    }

                    if (!empty($_POST['event_description'])) {
                        $event_description = $_POST['event_description'];
                    } else {
                        $messageFlash = 'Please describe your event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        $event_description = NULL;
                    }

                    if (!empty($_POST['missions'])) {
                        $event_missions = $_POST['missions'];
                    } else {
                        $messageFlash = 'Please set up the different missions';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:home?create&event=missionsNok");
                        exit();
                    }

                    if (!empty($_POST['nbVolunteer'])) {
                        $nb_volunteer = $_POST['nbVolunteer'];
                    } else {
                        $messageFlash = 'Please set up the number of volunteers';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:home?create&event=nbVolNok");
                        exit();
                    }


                    $status = 1;
                    $user = $_SESSION['user_id'];

                    $lastId = $this->model->createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $status, $user);

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
                                if ($file->sizeControl()) {
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
                                    $messageFlash = 'Your file is to big';
                                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                                    header("location:home?create&event=sizenok");
                                    exit();
                                }
                            } else {
                                $messageFlash = 'The file extension isn\'t ok';
                                $this->coreSetFlashMessage('error', $messageFlash, 3);
                                header("location:home?create&event=extnok");
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
                        header("location:home?create&event=lastidnok");
                        exit();
                    }

                    //Chargement de la vue de l'évènement
                    $messageFlash = 'Publish success';
                    $this->coreSetFlashMessage('success', $messageFlash, 3);
                    $data = array(
                        'event' => $this->model->getEvent($lastId),
                        'missions' => $this->model->getMissions($lastId),
                        'nbVolunteer' => $this->model->getNbVolunteers($lastId),
                        'medias' => $this->model->getMedias($lastId),
                        'volunteers' => $this->model->getVolunteers($lastId)
                    );
                    define("TITLE_HEAD", "Event Name | Volunteers");
                    $this->load->view('event/view_event.php', $data);
                    exit();

                } else {
                    define("TITLE_HEAD", "Erreur | Volunteers");
                    // Chargement de la vue
                    $this->load->view('view_error.php');
                }

            }

        } else {
            header("location:home?create&event=loginNok");
            exit();
        }
    }
    public function createEvent()
    {
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/event.php');
    }

    public function eventList()
    {
        define("TITLE_HEAD", "Event List | Volunteers Admin");
        $data = array(
            'events' => $this->model->getEvents()
        );
        // Chargement de la vue
        $this->load->view('admin/event_list.php', $data);
    }

    public function singleEvent()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
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
    }

    public function deleteEvent()
    {
        define("TITLE_HEAD", "user Status | Volunteers Admin");
        $this->model->deleteEvent($_GET['id']);

        // Message de confirmation et redirection
        $messageFlash = 'Done ! The information has been deleted !';
        $this->coreSetFlashMessage('success', $messageFlash, 4);
        $this->load->view('admin/dashboard.php');
        exit();
        // Chargement de la vue
    }

    public function categories()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        if (isset($_POST['category'])) {
            $this->model->insertCategory($_POST['category']);
        }
        if (isset($_GET['id'])) {
            $this->model->deleteCategory($_GET['id']);
        }
        $data = array(
            'categories' => $this->model->getCategories()
        );
        // Chargement de la vue
        $this->load->view('admin/categories.php', $data);
    }

    public function deleteCategory()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        if (isset($_GET['category'])) {
            $this->model->deleteCategory($_GET['category']);
        }
        $data = array(
            'categories' => $this->model->getCategories()
        );
        // Chargement de la vue
        $this->load->view('admin/categories.php', $data);
    }

    public function inbox()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/inbox.php');
    }

    public function compose()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/compose.php');
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
                        // Envoi du mail de confirmation
                        try
                        {
                            // Instanciation
                            $mail = new Mail('contact@volunteers.com', 'Team Volunteers', 'contact@volunteers.com');

                            // Ajout destinataire
                            $mail->ajoutDestinataire($this->_login);

                            // Ajout du contenu
                            $objet_mail = 'Volunteers Account';
                            $message_mail = 'Hello,
                             Your account has been created!
                             Please confirm your email address by cliking on this link : '.PATH_HOME.'?module=validate&key='.urlencode($this->_userKey).'
                             Thanks!';
                            $mail->contenuMail($objet_mail, $message_mail);

                            // Envoi du mail
                            $mail->envoyerMail();
                        }
                        catch (Exception $e)
                        {
                            echo $e->getMessage();
                        }

                        // Si ok (true) alors on renvoi sur la page d'accueil
                        $messageFlash = 'Your account has been created. Please confirm your email through the one we sent you.';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 6);
                        header('Location:?sign=ok');
                        exit();
                    }
                    else
                    {
                        define("TITLE_HEAD", "An error occurred.");
                        $messageFlash = 'An error has occurred. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header('Location:?signup=nok');
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
}