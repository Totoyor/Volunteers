<?php 

class BlogController extends AppController
{
    public function __construct()
    {
        require 'app/model/BlogModel.php';
        $this->model = new BlogModel();
        parent::__construct();
    }
    
    public function home()
    {
        // Vérifier la page actuelle
        if(isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else
        {
            $page = 1;
        }

        // Calcul de l'offset
        $offset = ($page - 1) * LIMITE;

        // Charger les articles du blog
        $data = $this->model->readAll(array(
                "table" => "posts",
                // "columns" => "col1, col2",
                "orderBy" => "post_ID",
                "sort" => "DESC",
                "limite" => LIMITE,
                "offset" => $offset,
        ));

        if(!$data)
        {
            // Si pas de DATA alors on apelle une page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('view_error.php');
        }
        else
        {
            // Sinon on apelle les articles du blog
            define("TITLE_HEAD", "Blog | Volunteers");
            // Test toto pagination
            $table = 'blog_posts';
            $count = $this->model->countRow($table);
            $nbrPage = ceil($count[0] / MAX_ARTICLE);
            // Chargement de la vue
            $this->load->view('blog/view_articles.php', $data, $nbrPage);
        }
    }
    
    public function post()
    {
        if(isset($_GET['id']))
        {
            // Charger un article
            $data = $this->model->readOne(array(
                "table" => "posts",
                // "columns" => "col1, col2",
                "column_id" => "post_id",
                "id" => $_GET['id']
            ));

            $comments = $this->model->getComments($_GET['id']);

            if(!$data)
            {
                // Si pas de data on apelle la page d'erreur
                define("TITLE_HEAD", "Erreur technique !");
                $this->load->view('view_error.php');
            }
            else
            {
                // Sinon on appelle la vue de l'article
                define("TITLE_HEAD", "Article | Volunteers");
                $this->load->view('blog/view_article.php', $data, $nbrPage = null, $comments);
            }
        }
        else {
            // Si pas de data on apelle la page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('blog/view_error.php');
        }
    }
}