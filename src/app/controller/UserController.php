<?php 

class UserController extends AppController
{
    
    public function __construct()
    {
        parent::__construct();
        
        if(!isset($_GET['action']) || $_GET["action"] == "home")
        {
            // Appelle la page Users du blog
            $this->home();
        }
        else
        {
            define("TITLE_HEAD", "ERROR 404");
            $this->load->view('404.php');
        }
        
    }
    
    public function home()
    {
        define("TITLE_HEAD", "Les utilisateurs du blog");
        $this->load->view('view_users.php');
    }
}