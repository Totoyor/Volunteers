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
                    $_SESSION['error'] = 'EMAIL_NOK';
                    header('Location:?login=nok');
                    exit();
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
            define("TITLE_HEAD", "Connexion");
            header('Location:?login=nok');
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

                    // TODO
                    // Ajout du statut du user !
                    // notification user Ok ou NOK
                    // envoi de l'email de confirmation avec token
                    // AJAX
                    // Twitter Facebook

                    if($this->model->inscriptionUser($this->_login, $this->_password))
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
                            $message_mail = 'Hello, we confirm you that your account has been created ! Thanks !';
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
                        header('Location:?sign=nok');
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
            header('Location:?sign=nok');
        }
    }

    public function disconnect()
    {
        session_unset();
        session_destroy();
        header('Location:?');
    }
}