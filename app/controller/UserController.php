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
    
    /*public function home()
    {
        define("TITLE_HEAD", "Les utilisateurs du blog");
        $this->load->view('page/index.php');
    }*/

    public function connect()
    {
        if(isset($_POST['email']) && $_POST['password'])
        {
            if(!empty($_POST['email']) && (!empty($_POST['password'])))
            {
                $this->_login = $_POST['email'];
                $this->_password = md5($_POST['password']);

                if($user = $this->model->connexionUser($this->_login, $this->_password))
                {
                    if($user['Active'] == 1)
                    {
                        // on set les infos dans la session
                        $_SESSION['user_email'] = $user['Email'];
                        $_SESSION['user_id'] = $user['idUser'];

                        // on set le message de confirmation
                        $messageFlash = 'Well done ! You are now logged in !';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 3);
                        // et on renvoi sur la page d'accueil
                        header('Location:?login=ok');
                        exit();
                    }
                    else
                    {
                        // Si ok (true) alors on set le message d'erreur
                        $messageFlash = 'Please confirm your email :)';
                        $this->coreSetFlashMessage('warning', $messageFlash, 4);
                        // et on renvoi sur la page d'accueil
                        header('Location:?login=nok');
                        exit();
                    }
                }
                else
                {
                    // Si false on renvoi sur une page erreur
                    define("TITLE_HEAD", "An error occur.");
                    $messageFlash = 'Wrong email or wrong password. Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header('Location:?log=nok');
                    exit();
                }
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'An error occur. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:?log=nok');
                exit();
            }
        }
        else
        {
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'An error occur. Please try again.';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
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
                    define("TITLE_HEAD", "An error occur.");
                    $messageFlash = 'Your email is wrong. Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
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
                        $messageFlash = 'Your account has been created. Please confirm your email trought the one we sent you.';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 6);
                        header('Location:?sign=ok');
                        exit();
                    }
                    else
                    {
                        define("TITLE_HEAD", "An error occur.");
                        $messageFlash = 'An error occur. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header('Location:?signup=nok');
                        exit();
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
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'An error occur. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:?signup=nok');
                exit();
            }
        }
        else
        {
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'An error occur. Please try again.';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header('Location:?signup=nok');
            exit();
        }
    }

    public function disconnect()
    {
        session_unset();
        session_destroy();
        unset($_COOKIE['fbsr_941553679268599']);
        header('Location:?');
        exit();
    }
}