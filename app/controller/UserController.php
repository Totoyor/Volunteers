<?php 

class UserController extends AppController
{
    private $_login;
    private $_password;
    private $_nom;
    private $_prenom;
    
    public function __construct()
    {
        require 'app/model/UserModel.php';
        $this->model = new UserModel();
        parent::__construct();
    }
    
    public function home()
    {
        define("TITLE_HEAD", "Les utilisateurs du blog");
        $this->load->view('view_users.php');
    }

    public function connect()
    {
        if(isset($_POST['email']) && $_POST['password'])
        {
            $this->_login = $_POST['email'];
            $this->_password = $_POST['password'];

            if($this->model->connexionUser($this->_login, $this->_password))
            {
                // Si ok (true) alors on renvoi sur la page d'accueil
                header('Location:?');
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "Erreur de connexion");
                $this->load->view('view_users.php');
            }
        }
        else
        {
            define("TITLE_HEAD", "Connexion");
            $this->load->view('view_users.php');
        }
    }

    public function signin()
    {
        if(isset($_POST['nom']) && $_POST['prenom'] && $_POST['email'] && $_POST['password'])
        {
            $this->_nom = $_POST['nom'];
            $this->_prenom = $_POST['prenom'];
            $this->_login = $_POST['email'];
            $this->_password = $_POST['password'];

            if($this->model->inscriptionUser($this->_nom, $this->_prenom, $this->_login, $this->_password))
            {
                // Si ok (true) alors on renvoi sur la page d'accueil
                header('Location:?');
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "Erreur Inscription");
                $this->load->view('view_signin.php');
            }
        }
        else
        {
            define("TITLE_HEAD", "Inscription");
            $this->load->view('view_signin.php');
        }
    }

    public function disconnect()
    {
        session_unset();
        session_destroy();
        header('Location:?');
    }
}