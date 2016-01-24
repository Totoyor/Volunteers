<?php

class EventController extends AppController

{
    public function __construct()
    {
        require 'app/model/EventModel.php';
        $this->model = new EventModel();
        parent::__construct();
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
                        $event_start = $_POST['event_start'];
                    } else {
                        $event_start = NULL;
                    }

                    if (isset($_POST['event_hour_start']) && isset($_POST['event_min_start'])) {
                        $event_hour_start = $_POST['event_hour_start'] . ":" . $_POST['event_min_start'];
                    } else {
                        $event_hour_start = NULL;
                    }

                    if (isset($_POST['event_end'])) {
                        $event_end = $_POST['event_end'];
                    } else {
                        $event_end = $_POST['event_start'];
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
                        $event_start = $_POST['event_start'];
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
                        $event_end = $_POST['event_end'];
                    } else {
                        $event_end = $_POST['event_start'];
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

                    } else {
                        define("TITLE_HEAD", "Erreur | Volunteers");
                        // Chargement de la vue
                        $this->load->view('view_error.php');
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
        define("TITLE_HEAD", "Event Name | Volunteers");
        // Chargement de la vue
        $id = $_GET['id'];
        $data = array(
            'event' => $this->model->getEvent($id),
            'missions' => $this->model->getMissions($id),
            'nbVolunteer' => $this->model->getNbVolunteers($id),
            'medias' => $this->model->getMedias($id),
            'volunteers' => $this->model->getVolunteers($id)
        );
        $this->load->view('event/view_event.php', $data);
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
                    header("location:show/".$event."/questionOk");
                } else {
                    header("location:show/".$event."/questionNok");
                }
            }
        } else {
            header("location:show/".$event."/questionLoginNok");
        }
    }

    public function answer()
    {
        $event = $_POST['idEvent'];
        $user = $_SESSION['user_id'];
        $creator = $_POST['eventCreator'];
        $question = "ok";

        if (isset($_SESSION['user_id'])) {
            if ($user == $creator) {

                $answer = $_POST['answer'];

                if ($this->model->insertAnswer($user, $event, $question, $answer)) {

                }

            } else {
                header("location:show/".$event."/notAllowed");
            }
        } else {
            header("location:show/".$event."/questionLoginNok");
        }
    }
}
