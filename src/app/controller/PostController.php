<?php 

class PostController extends AppController
{
    
    public function __construct()
    {
        parent::__construct();

        $this->model = new PostModel();
        
        if(!isset($_GET['action']) || $_GET["action"] == "home")
        {
            // Si une page du blog est demandé
            if(isset($_GET['page']))
            {
                if ($_GET['page'] == 1)
                {
                    $this->home(OFFSET, LIMITE);
                }
                else
                {
                    $offset = LIMITE * $_GET['page'];
                    $limite = LIMITE;
                    $this->home($offset, $limite);
                    echo $offset.'<br/>';
                    echo $limite;
                }
            }
            else
            {
                // Appelle la page accueil du blog
                $this->home(OFFSET, LIMITE);
            }
        }
        else if ($_GET["action"] == "post")
        {
            // Ou l'action correspondante
            $this->post();
        }
        else
        {
            // Sinon appelle la page 404
            define("TITLE_HEAD", "ERROR 404");
            $this->load->view('404.php');
        }
        
    }
    
    public function home($offset, $limite)
    {
        // Charger les articles du blog
        //$data = $this->model->read_articles($offset, $limite);

        $data = $this->model->readAll(array(
                "table" => "posts",
                // "columns" => "col1, col2",
                "orderBy" => "post_date",
                "limite" => $limite,
                "offset" => $offset,
        ));

        if(!$data)
        {
            // Si pas de DATA alors on apelle une page d'erreur
            define("TITLE_HEAD", "Erreur technique !");
            $this->load->view('view_error.php');    // si pas de données afficher une page erreur
        }
        else
        {
            // Sinon on apelle les articles du blog
            define("TITLE_HEAD", "Les derniers articles du blog");
            $this->load->view('view_articles.php', $data);

            // Test toto pagination
            $table = 'blog_posts';
            $count = $this->model->countArticles($table);
            echo $count[0];
        }
    }
    
    public function post()
    {
        // Charger un article
        //$data = $this->model->read_article($_GET["id"]);

        $data = $this->model->readOne(array(
                    "table" => "posts",
                    // "columns" => "col1, col2",
                    "column_id" => "post_id",
                    "id" => $_GET['id']
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
            define("TITLE_HEAD", "Article !");
            $this->load->view('view_article.php', $data);
        }
    }
}