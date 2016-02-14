<?php

class ValidateController extends AppController
{
    private $_key;
    private $_active;

    /**
     * ValidateController constructor.
     */
    public function __construct()
    {
        require 'app/model/UserModel.php';
        $this->model = new UserModel();
        parent::__construct();
    }

    /** Fonciton de confirmation du profil de l'utilisateur via une key unique
     *
     */
    public function home()
    {
        if(isset($_GET['key']))
        {
            $this->_key = $_GET['key'];
            if($user = $this->model->checkKey($this->_key))
            {
                if($user['Active'] == 1)
                {
                    // User déjà validé
                    define("TITLE_HEAD", "Account already confirm.");
                    $messageFlash = 'Your account is already confirm. Please log in.';
                    $this->coreSetFlashMessage('error', $messageFlash, 5);
                    $this->load->view('view_error.php');
                }
                else
                {
                    $this->_active = 1;
                    if($this->model->validateUser($this->_key, $this->_active))
                    {
                        // Page de validation du compte
                        define("TITLE_HEAD", "Volunteers | Account validated");
                        $this->load->view('page/validate.php');
                    }
                    else
                    {
                        define("TITLE_HEAD", "An error occur.");
                        $messageFlash = 'An error occur. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        $this->load->view('view_error.php');

                    }
                }
            }
            else
            {
                // Erreur mauvaise 'key'
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'An error occur. You enter a wrong key.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                $this->load->view('view_error.php');
            }
        }
        else
        {
            // Pas de 'key' définie dans l'url
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'An error occur. Please get the correct link from your email.';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            $this->load->view('view_error.php');
        }
    }
}