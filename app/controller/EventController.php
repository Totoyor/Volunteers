<?php

class EventController extends AppController
{
    protected $_date;

    public function __construct()
    {
        require 'app/model/EventModel.php';
        $this->model = new EventModel();
        parent::__construct();

        $this->_date = date("j F, Y");

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
                        header("location:".PATH_HOME."/profile/events");
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

    public function home()
    {
        $data = $this->model->getCategories();

        if ($data !== null) {
            define("TITLE_HEAD", "Create an event | Volunteers");
            // Chargement de la vue
            $this->load->view('event/creation_event.php', $data);
        } else {
            define("TITLE_HEAD", "Error | Volunteers");
            // Chargement de la vue
            $this->load->view('view_error.php');
        }
    }

    public function lists()
    {
        define("TITLE_HEAD", "List of events | Volunteers");
        // Chargement de la vue
        $data = array(
            'events' => $this->model->getEvents(),
            'categories' => $this->model->getCategories()
        );
        $this->load->view('event/view_events.php', $data);
    }

    public function show()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $data = array(
                'event' => $this->model->getEvent($id),
                'missions' => $this->model->getMissions($id),
                'nbVolunteer' => $this->model->getNbVolunteers($id),
                'medias' => $this->model->getMedias($id),
                'volunteers' => $this->model->getVolunteers($id),
                'questions' => $this->model->getQuestions($id)
            );
            if($data != null)
            {
                // Chargement de la vue
                define("TITLE_HEAD", "Event Name | Volunteers");
                $this->load->view('event/view_event.php', $data);
            }
            else
            {
                // Pas de data -> error
                define("TITLE_HEAD", "Error | Volunteers");
                $this->load->view('view_error.php');
            }
        }
        else
        {
            // Pas d'id -> error
            define("TITLE_HEAD", "Error | Volunteers");
            $this->load->view('view_error.php');
        }
    }

    public function search()
    {

        $recherche = $_GET['input-search'];
        //header('Content-type: application/json');
        //echo(json_encode($recherche));
        echo(json_encode($this->model->search($recherche)));
        //echo(json_encode($this->model->search($recherche)));
    }

    public function question()
    {

        $event = $_POST['idEvent'];
        $user = $_SESSION['user_id'];

        if (isset($_SESSION['user_id'])) {
            if (!empty($_POST['question'])) {
                $question = $_POST['question'];
                if ($this->model->insertQuestions($user, $event, $question)) {
                    $messageFlash = 'Your question has been published with success';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 1);
                    header("location:show/" . $event . "/questiook");
                } else {
                    $messageFlash = 'Question error';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header("location:show/" . $event . "/questionnok");
                }
            }
        } else {
            $messageFlash = 'Please login for ask question';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header("location:show/" . $event . "/questionloginnok");
        }
    }

    public function answer()
    {
        $event = $_POST['idEvent'];
        $user = $_SESSION['user_id'];
        $creator = $_POST['idCreator'];
        $question = $_POST['idQuestion'];

        if (isset($_SESSION['user_id'])) {
            if ($user == $creator) {

                $answer = $_POST['answer'];

                if ($this->model->insertAnswer($user, $question, $answer)) {
                    $messageFlash = 'Your answer has been published with success';
                    $this->coreSetFlashMessage('sucess', $messageFlash, 1);
                    header("location:show/" . $event . "/answerok");
                } else {
                    $messageFlash = 'Answer error';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header("location:show/" . $event . "/answernok");
                }

            } else {
                $messageFlash = 'Your not allowed to answer at question';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header("location:show/" . $event . "/notallowed");
            }
        } else {
            $messageFlash = 'Please login for answer at question';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header("location:show/" . $event . "/answerloginok");
        }
    }

    public function sort()
    {
        if (!empty($_POST['category']) || !empty($_POST['sortDate']) || isset($_GET['message'])) {

            if (!empty($_POST['category'])) {
                $category = $_POST['category'];
            }
            elseif(isset($_GET['message'])) {

                $category = $_GET['message'];
            }
            else {
                $category = '';
            }
            if(isset($_POST['sortDate']))
            {
                $post = $_POST['sortDate'];
                $search = array(',');
                $replace = array('.');
                $date = str_replace($search, $replace, $post);
            }
            else
            {
                $date = '';
            }


            if ($this->model->sortEvents($category, $date)) {
                define("TITLE_HEAD", "List of events | Volunteers");
                // Chargement de la vue
                $data = array(
                    'events' => $this->model->sortEvents($category, $date),
                    'categories' => $this->model->getCategories()
                );
                $this->load->view('event/view_events.php', $data);
            } else {
                $messageFlash = 'Nothing correspond to your search';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header("location:lists");
            }
        } else {
            $messageFlash = 'Please select an option';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header("location:lists");
        }
    }

    public function listvolunteers()
    {
        define("TITLE_HEAD", "Volunteers | List Volunteers");
        $idEvent = $_GET['id'];
        $data = array(
            'event' => $this->model->getEvent($idEvent),
            'volunteers' => $this->model->getVolunteers($idEvent),
        );
        $this->load->view("event/list_volunteers.php", $data);
    }

    public function editshow()
    {
        define("TITLE_HEAD", "Volunteers | Edit");
        $idEvent = $_GET['id'];
        $data = array(
            'event' => $this->model->getEventForUpdate($idEvent),
            'category' => $this->model->getCategories(),
            'missions' => $this->model->getMissions($idEvent),
            'medias' => $this->model->getMedias($idEvent)
        );
        $this->load->view("event/update_event.php", $data);
    }

    public function hire()
    {
        if(!empty($_POST['hire'])) {

            $idEvent = $_POST['idEvent'];

            for($i=0; $i<count($_POST['hire']); $i++) {
                $volunteer = $_POST['hire'][$i];
                $this->model->hireVolunteers($idEvent, $volunteer);
            }

            $this->model->hireSession($idEvent);

            $messageFlash = 'Hire ok';
            $this->coreSetFlashMessage('sucess', $messageFlash, 3);
            header("location:listvolunteers/".$_POST['idEvent']);

        } else {
            $messageFlash = 'Please select volunteers to hire';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header("location:listvolunteers/".$_POST['idEvent']);
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
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start']." ".$_POST['event_start_mode'];
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
                        $event_hour_end = $_POST['event_hour_end'] . ":" . $_POST['event_min_end']." ".$_POST['event_end_mode'];
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

                    if($this->model->editEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $facebook, $instagram, $youtube, $twitter, $status, $user, $idEvent)) {

                        if (isset($_POST['event_categories'])) {
                            for ($i = 0; $i < count($event_categories); $i++) {
                                //$idEvent = $lastId;
                                $idCategory = $event_categories[$i];
                                $this->model->editCategories($idCategory, $idEvent);
                            }
                        } else if (isset($_POST['categoriesSave']) && !empty($_POST['categoriesSave'])) {
                            $idCategory = $_POST['categoriesSave'];
                            $this->model->editCategories($idCategory,$idEvent);
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

                        if(!empty($_POST['missionsSave'])) {
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
                        } else if(isset($_POST['coverPictureSave']) && !empty($_POST['coverPictureSave'])) {
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

                        if(isset($_POST['mediasSave']) && !empty($_POST['mediasSave'])) {
                            for ($i=0; $i<count($_POST['mediasSave']); $i++) {
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
                        header("location:editshow/".$idEvent);
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
                        header("location:editshow/".$idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_hour_start']) && !empty($_POST['event_min_start']) && !empty($_POST['event_start_mode'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'] . " " . $_POST['event_start_mode'];
                    } else if (isset($_POST['hourStartSave']) && !empty($_POST['hourStartSave'])) {
                        $event_hour_start = $_POST['hourStartSave'];
                    } else {
                        $messageFlash = 'Please set up the start time of the event';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/".$idEvent);
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
                        header("location:editshow/".$idEvent);
                        exit();
                    }

                    if (!empty($_POST['event_categories'])) {
                        $event_categories = $_POST['event_categories'];
                    } else if (isset($_POST['categorieSave']) && !empty($_POST['categorieSave'])) {
                        $event_categories = $_POST['categorieSave'];
                    } else {
                        $messageFlash = 'Please set up the categori';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/".$idEvent);
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
                        header("location:editshow/".$idEvent);
                        exit();
                    }

                    if (!empty($_POST['nbVolunteer'])) {
                        $nb_volunteer = $_POST['nbVolunteer'];
                    } else {
                        $messageFlash = 'Please set up the number of volunteers';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header("location:editshow/".$idEvent);
                        exit();
                    }


                    $status = 1;
                    $user = $_SESSION['user_id'];

                    if($this->model->editEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                        $event_hour_end, $event_description, $facebook, $instagram, $youtube, $twitter, $status, $user, $idEvent)) {

                        if (isset($_POST['event_categories'])) {
                            for ($i = 0; $i < count($event_categories); $i++) {
                                //$idEvent = $lastId;
                                $idCategory = $event_categories[$i];
                                $this->model->editCategories($idCategory, $idEvent);
                            }
                        } else if (isset($_POST['categoriesSave']) && !empty($_POST['categoriesSave'])) {
                            $idCategory = $_POST['categoriesSave'];
                            $this->model->editCategories($idCategory,$idEvent);
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

                        if(!empty($_POST['missionsSave'])) {
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
                        } else if(isset($_POST['coverPictureSave']) && !empty($_POST['coverPictureSave'])) {
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

                        if(isset($_POST['mediasSave']) && !empty($_POST['mediasSave'])) {
                            for ($i=0; $i<count($_POST['mediasSave']); $i++) {
                                $picture = $_POST['mediasSave'][$i];
                                //Fonction update
                            }
                        }

                        //Chargement de la vue de l'évènement
                        $messageFlash = 'Your event has been published';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 3);
                        header("location:show/".$idEvent);
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
}