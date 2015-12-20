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
                    $event_end = NULL;
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

                if (isset($_POST['event_missions'])) {
                    $event_missions = $_POST['event_description'];
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

                    if (isset($_POST['event_missions'])) {
                        for ($i = 0; $i < count($event_missions); $i++) {
                            if ($_POST['event_missions'] !== null) {
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
                                    die('ok 1');
                                } else {
                                    $coverPicture = $file->setNom();
                                    $this->model->insertCoverPicture($lastId, $coverPicture);
                                    die('ok 2');
                                }
                            }
                        }
                    }

                    exit();

                } else {
                    var_dump($_POST);
                    die('nok');
                }

            } elseif (isset($_POST['submit'])) {

                // Si l'utilisateur clique sur publier on vérifie que tout les champs sont bien remplis puis
                // ont effectue l'insertion dans la base

                $event_location = $_POST['event_location'];
                $event_start = $_POST['event_start'];
                $event_hour_start = $_POST['event_hour_start'] . " H " . $_POST['event_min_start'];
                $event_end = $_POST['event_end'];
                $event_hour_end = $_POST['event_hour_end'] . " H " . $_POST['event_min_end'];
                $event_categories = $_POST['event_categories'];
                $event_description = $_POST['event_description'];
                $event_missions = $_POST['missions'];
                $nb_volunteer = $_POST['nbVolunteer'];

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
                        $idEvent = $lastId;
                        $missions = $event_missions[$i];
                        $nbVolunteer = $nb_volunteer[$i];
                        $this->model->insertMissions($idEvent, $missions, $nbVolunteer);
                    }

                    if (!empty($_FILES['coverPicture']['name'])) {
                        $file = new Upload($_FILES['coverPicture']['name'], $_FILES["coverPicture"]["tmp_name"], 'assets/img/events/uploads/', '');

                        if ($file->extControl()) {
                            if ($file->moveFile()) {
                                if ($file->resizeFile()) {
                                    $coverPicture = $file->setNom();
                                    $this->model->insertCoverPicture($lastId, $coverPicture);
                                    die('ok 1');
                                } else {
                                    $coverPicture = $file->setNom();
                                    $this->model->insertCoverPicture($lastId, $coverPicture);
                                    die('ok 2');
                                }
                            }
                        }
                    }

                } else {
                    var_dump($_POST);
                    die('nok');
                }

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
            define("TITLE_HEAD", "Créer un évenement | Volunteers");
            // Chargement de la vue
            $this->load->view('event/creation_event.php', $data);
        } else {
            define("TITLE_HEAD", "Erreur | Volunteers");
            // Chargement de la vue
            $this->load->view('view_error.php');
        }
    }
}