<?php


class HelpController extends AppController

{
    /**
     * HelpController constructor.
     */
    public function __construct()
    {
        require 'app/model/EventModel.php';
        $this->model = new EventModel();
        parent::__construct();
    }

    /** Fonction d'affichage de la page Help
     *
     */
    public function home()
    {
        define("TITLE_HEAD", "How can we help you ? | Volunteers");
        // Chargement de la vue
        $this->load->view('page/help.php');
    }
}