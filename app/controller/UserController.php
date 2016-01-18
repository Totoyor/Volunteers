<?php 

class UserController extends AppController
{
    private $_login;
    private $_password;
    private $_status;
    private $_userKey;
    private $_active;
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
        $this->load->view('page/index.php');
    }

    public function connect()
    {
        if(isset($_POST['email']) && $_POST['password'])
        {
            if(!empty($_POST['email']) && (!empty($_POST['password'])))
            {
                $this->_login = $_POST['email'];
                $this->_password = md5($_POST['password']);

                if($this->model->connexionUser($this->_login, $this->_password))
                {
                    // Si ok (true) alors on renvoi sur la page d'accueil
                    header('Location:?login=ok');
                }
                else
                {
                    // Si false on renvoi sur une page erreur
                    define("TITLE_HEAD", "Erreur de connexion !");
                    header('Location:?log=nok');
                    exit();
                }
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "Erreur de connexion !");
                header('Location:?log=nok');
                exit();
            }
        }
        else
        {
            define("TITLE_HEAD", "Erreur de connexion !");
            header('Location:?log=nok');
            exit();
        }
    }

    public function signup()
    {
        if(isset($_POST['email']) && $_POST['password'])
        {
            if(!empty($_POST['email']) && (!empty($_POST['password'])))
            {
                if(!$this->coreCheckEmail($_POST['email']))
                {
                    header('Location:?email=NOK');
                    exit();
                }
                else
                {
                    $this->_login = $_POST['email'];
                    $this->_password = md5($_POST['password']);
                    $this->_status = 1;
                    $this->_userKey = mt_rand();

                    // TODO
                    // notification user Ok ou NOK
                    // AJAX
                    // Twitter Facebook

                    if($this->model->inscriptionUser($this->_login, $this->_password, $this->_status, $this->_userKey))
                    {
                        // Envoi du mail de confirmation
                        include_once('lib/class/mail.class.php');
                        try
                        {
                            // Instanciation
                            $mail = new Mail('contact@volunteers.com', 'Team Volunteers', 'contact@volunteers.com');

                            // Ajout destinataire
                            $mail->ajoutDestinataire($this->_login);

                            // Ajout du contenu
                            $objet_mail = 'Volunteers Account';
                            $message_mail = 'Hello,
                             We confirm you that your account has been created !
                             Please confirm your email by cliking on this link : '.PATH_HOME.'?module=validate&key='.urlencode($this->_userKey).'
                             Thanks !';
                            $mail->contenuMail($objet_mail, $message_mail);

                            // Envoi du mail
                            $mail->envoyerMail();
                        }
                        catch (Exception $e)
                        {
                            echo $e->getMessage();
                        }

                        // Si ok (true) alors on renvoi sur la page d'accueil
                        header('Location:?sign=ok');
                    }
                    else
                    {
                        header('Location:?signup=nok');
                        /*
                         $this->coreRedirect(array(
                            'param' => 'sign',
                            'value' => 'nok',
                        ));
                        */
                    }
                }
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "Erreur de connexion !");
                header('Location:?signup=nok');
                exit();
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