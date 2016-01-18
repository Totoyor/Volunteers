<?php

class ValidateController extends AppController
{
    private $_key;
    private $_active;

    public function __construct()
    {
        require 'app/model/UserModel.php';
        $this->model = new UserModel();
        parent::__construct();
    }

    // TODO :
    // Checker les redirections et les else
    // Afficher les messages d'erreurs et/ou validation
    // Styliser les pages

    public function home()
    {
        if(isset($_GET['key']))
        {
            $this->_key = $_GET['key'];
            if($this->model->checkEmail($this->_key))
            {
                $this->_active = 1;
                if($this->model->validateUser($this->_key, $this->_active))
                {
                    // Chargement de la home
                    define("TITLE_HEAD", "Volunteers | Home");
                    $this->load->view('page/validate.php');
                }
                else
                {
                    // Erreur
                    define("TITLE_HEAD", "Volunteers | Erreur");
                    $this->load->view('view_error.php');

                }
            }
            else
            {
                // Erreur
                define("TITLE_HEAD", "Erreur, déjà validé");
                $this->load->view('view_error.php');
            }
        }
        else
        {
            // Erreur
            define("TITLE_HEAD", "Volunteers | Erreur");
            $this->load->view('view_error.php');
        }
    }
}