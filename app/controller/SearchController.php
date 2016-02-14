<?php

class SearchController extends AppController
{

    /**
     * SearchController constructor.
     */
    public function __construct()
    {

        require 'app/model/BlogModel.php';
        $this->model = new PostModel();
        parent::__construct();

    }

    /** Fonction d'affichage de la recherche d'articles du blog
     *
     */
    public function home()
    {
        define("TITLE_HEAD", "Recherche d'articles");
        $this->load->view('blog/search.php');
    }

    /** Fonction de recherche d'articles via le formulaire
     *
     */
    public function find()
    {
        if(isset($_POST['find']))
        {
            $keyword = $_POST['find'];

            $data = $this->model->searchArticle(array(
                "keyword" => $keyword
            ));

            // On affiche le résultat de la recherche
            define("TITLE_HEAD", "Recherche !");
            $this->load->view('blog/search.php', $data);
        }
        else
        {
            // Si pas de $_POST alors on apelle une page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('view_error.php');
        }

    }
}