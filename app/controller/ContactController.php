<?php


class ContactController extends AppController

{
    public function __construct()
    {
        require 'app/model/EventModel.php';
        $this->model = new EventModel();
        parent::__construct();
    }

    public function home()
    {
        define("TITLE_HEAD", "Contact | Volunteers");
        // Chargement de la vue
        $this->load->view('page/contact.php');
    }
}