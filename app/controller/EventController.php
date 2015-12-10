<?php

class EventController extends AppController
{
    public function __construct()
    {
        require 'app/model/EventModel.php';
        $this->model = new HomeModel();
        parent::__construct();
    }

    public function create()
    {
        // Sinon on apelle les articles du blog
        define("TITLE_HEAD", "Créer un évenement | Volunteers");
        // Chargement de la vue
        $this->load->view('creation_event.php');
    }
}