<?php

Class EventController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        define("TITLE_HEAD", "Les utilisateurs du blog");
        $this->load->view('view_event.php');
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

        foreach ($event_categories as $event_categorie) {

        }

        var_dump($_POST);
        die();
    }
}