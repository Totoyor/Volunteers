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

            if (isset($_POST['save'])) {

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
                $redirect = "";

            } elseif (isset($_POST['submit']) && isset($_POST['event_location']) && isset($_POST['event_start'])
                && isset($_POST['event_hour_start']) && isset($_POST['event_min_start']) && isset($_POST['event_end'])
                && isset($_POST['event_hour_end']) && isset($_POST['event_min_end']) && isset($_POST['event_categories'])
                && isset($_POST['event_description']) && isset($_POST['event_missions']) && isset($_POST['nbVolunteer'])
            ) {

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
                $redirect = "";

            } else {
                define("TITLE_HEAD", "Erreur | Volunteers");
                // Chargement de la vue
                $this->load->view('view_error.php');
            }

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

                header("location:" . $redirect);
                exit();

            } else {
                var_dump($_POST);
                die('nok');
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