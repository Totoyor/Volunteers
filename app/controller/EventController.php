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
            $event_location = $_POST['event_location'];
            $event_start = $_POST['event_start'];
            $event_hour_start = $_POST['event_hour_start'] . " H " . $_POST['event_min_start'];
            $event_end = $_POST['event_end'];
            $event_hour_end = $_POST['event_hour_end'] . " H " . $_POST['event_min_end'];
            $event_categories = $_POST['event_categories'];
            $event_description = $_POST['event_description'];
            $event_missions = $_POST['missions'];
            $nb_volunteer = $_POST['nbVolunteer'];


            if (isset($_POST['save'])) {
                $status = 0;
                $redirect = "";
            } elseif (isset($_POST['submit'])) {
                $status = 1;
                $redirect = "";
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

                header("location:".$redirect);
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
            $this->load->view('creation_event.php', $data);
        } else {
            define("TITLE_HEAD", "Erreur | Volunteers");
            // Chargement de la vue
            $this->load->view('view_error.php');
        }
    }
}