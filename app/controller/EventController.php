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
                    $event_hour_start = $_POST['event_hour_start'] . " H " . $_POST['event_min_start'];
                } else {
                    $event_hour_start = NULL;
                }

                if (isset($_POST['event_end'])) {
                    $event_end = $_POST['event_end'];
                } else {
                    $event_end = $_POST['event_start'];
                }

                if (isset($_POST['event_hour_end']) && isset($_POST['event_min_end'])) {
                    $event_hour_end = $_POST['event_hour_end'] . " H " . $_POST['event_min_end'];
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

                $lastId = $this->model->createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                    $event_hour_end, $event_description, $status);

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

                        for ($i=0; $i < count($_FILES['media']['name']); $i++) {

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
                    $data = $this->model->getEvent($lastId);
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
                    header("location:home?create&event=locationNok");
                    exit();
                }

                if (!empty($_POST['event_start'])) {
                    $event_start = $_POST['event_start'];
                } else {
                    header("location:home?create&event=startNok");
                    exit();
                }

                if (!empty($_POST['event_hour_start']) && !empty($_POST['event_min_start']) && !empty($_POST['event_start_mode'])) {
                    $event_hour_start = $_POST['event_hour_start'] . " H " . $_POST['event_min_start']. " " . $_POST['event_start_mode'];
                } else {
                    header("location:home?create&event=startTimeNok");
                    exit();
                }

                if (!empty($_POST['event_end'])) {
                    $event_end = $_POST['event_end'];
                } else {
                    $event_end = $_POST['event_start'];
                }

                if (!empty($_POST['event_hour_end']) && !empty($_POST['event_min_end']) && !empty($_POST['event_end_mode'])) {
                    $event_hour_end = $_POST['event_hour_end'] . " H " . $_POST['event_min_end']. " " . $_POST['event_end_mode'];
                } else {
                    header("location:home?create&event=endTimeNok");
                    exit();
                }

                if (!empty($_POST['event_categories'])) {
                    $event_categories = $_POST['event_categories'];
                } else {
                    header("location:home?create&event=catNok");
                    exit();
                }

                if (!empty($_POST['event_description'])) {
                    $event_description = $_POST['event_description'];
                } else {
                    $event_description = NULL;
                }

                if (!empty($_POST['missions'])) {
                    $event_missions = $_POST['missions'];
                } else {
                    header("location:home?create&event=missionsNok");
                    exit();
                }

                if (!empty($_POST['nbVolunteer'])) {
                    $nb_volunteer = $_POST['nbVolunteer'];
                } else {
                    header("location:home?create&event=nbVolNok");
                    exit();
                }


                $status = 1;

                $lastId = $this->model->createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
                    $event_hour_end, $event_description, $status);

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

                        for ($i=0; $i < count($_FILES['media']['name']); $i++) {

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
                $data = $this->model->getEvent($lastId);
                define("TITLE_HEAD", "Event Name | Volunteers");
                $this->load->view('event/view_event.php', $data);
                exit();

            } else {
                define("TITLE_HEAD", "Erreur | Volunteers");
                // Chargement de la vue
                $this->load->view('view_error.php');
            }

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
        $data = $this->model->getEvents();
        $this->load->view('event/view_events.php', $data);
    }

    public function show()
    {
        define("TITLE_HEAD", "Event Name | Volunteers");
        // Chargement de la vue
        $id = $_GET['id'];
        $data = $this->model->getEvent($id);
        $this->load->view('event/view_event.php', $data);
    }
}