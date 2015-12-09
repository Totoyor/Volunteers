<?php

Class EventController extends AppController
{
    public function __construct()
    {
        require 'app/model/EventModel.php';

        $this->model = new EventModel();

        parent::__construct();
    }

    public function home()
    {

        if ($this->model->get_categories()) {
            $data = $this->model->get_categories();
            define("TITLE_HEAD", "Les utilisateurs du blog");
            $this->load->view('view_event.php', $data);
        } else {
            define("TITLE_HEAD", "Les utilisateurs du blog");
            $this->load->view('view_event.php');
        }
    }

    public function create()
    {

        $event_name = $_POST['event_name'];
        $event_location = $_POST['event_location'];
        $event_start = $_POST['event_start'];
        $event_hour_start = $_POST['event_hour_start'];
        $event_end = $_POST['event_end'];
        $event_hour_end = $_POST['event_hour_end'];
        $event_categories = $_POST['event_categories'];
        $event_description = $_POST['event_description'];

        if (isset($_POST['save'])) {

            $status = 0;

        } elseif (isset($_POST['submit'])) {

            $status = 1;

        }

        $lastId = $this->model->create_event($event_name, $event_location, $event_start, $event_hour_start, $event_end,
            $event_hour_end, $event_description, $status);

        if ($lastId !== null) {

            for ($i=0; $i < count($event_categories); $i++) {

                $idEvent = $lastId;
                $idCategory = $event_categories[$i];
                $this->model->insert_categories($idCategory, $idEvent);

            }

        } else {
            var_dump($_POST);
            die('nok');
        }

    }
}