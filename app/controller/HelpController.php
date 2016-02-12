<?php


class HelpController extends AppController

{
    public function __construct()
    {
        require 'app/model/EventModel.php';
        $this->model = new EventModel();
        parent::__construct();
    }

    public function home()
    {
        define("TITLE_HEAD", "How can we help you ? | Volunteers");
        // Chargement de la vue
        $this->load->view('page/help.php');
    }
}