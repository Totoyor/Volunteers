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
        $this->load->view('index.php');
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
                header('Location:?login=ok');
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "Erreur de connexion !");
                $this->load->view('index.php');
            }
        }
        else
        {
            define("TITLE_HEAD", "Connexion");
            $this->load->view('index.php');
        }
    }

    public function signup()
    {
        if(isset($_POST['email']) && $_POST['password'])
        {
            // TODO
            // Vérifier que mdp et email n'est pas empty
            // Vérifier l'email et le mdp
            // Transformer le pass en MD5
            // notification user Ok ou NOK
            // envoi de l'email de confirmation
            // AJAX
            $this->_login = $_POST['email'];
            $this->_password = $_POST['password'];

            if($this->model->inscriptionUser($this->_login, $this->_password))
            {
                // Si ok (true) alors on renvoi sur la page d'accueil
                header('Location:?signup=ok');
            }
            else
            {
                header('Location:?signup=nok');
            }
        }
        else
        {
            header('Location:?signup=nok');
        }
    }

    public function disconnect()
    {
        session_unset();
        session_destroy();
        header('Location:?');
    }
}