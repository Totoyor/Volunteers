<?php

class SearchController extends AppController
{

    public function __construct()
    {
        parent::__construct();

        $this->model = new AppModel();

        if(!isset($_GET['action']) || $_GET["action"] == "home")
        {
            // Appelle la page Search du blog
            $this->home();
        }
        elseif (isset($_GET['action']) == 'search')
        {
            // Si une recherche est lancée
            $this->search($_POST['search']);
        }
        else
        {
            define("TITLE_HEAD", "ERROR 404");
            $this->load->view('404.php');
        }

    }

    public function home()
    {
        define("TITLE_HEAD", "Recherche d'articles");
        $this->load->view('search.php');
    }

    public function search($search)
    {

        $data = $this->model->searchArticle(array(
            "search" => $search
        ));

        if(!$data)
        {
            // Si pas d'ID on apelle la page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('view_error.php');
        }
        else
        {
            // Sinon on appelle l'article
            define("TITLE_HEAD", "Recherche !");
            $this->load->view('search.php', $data);
        }
    }
}