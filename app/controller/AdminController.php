<?php
class AdminController extends AppController

{
    public function __construct()
    {
        require 'app/model/AdminModel.php';
        $this->model = new AdminModel();
        parent::__construct();
    }

    public function dashboard()
    {
        $data = array(
            'users' => $this->model->getUsers(),
            'events' => $this->model->getEvents()
        );
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/dashboard.php', $data);
    }

    public function registerUser()
        {
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/register.php');
    }

    public function editUser()
    {
        $id = $_GET['id'];
        $data = $this->model->getUser($id);
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/edit_user.php', $data);
    }

    public function userList()
    {
        define("TITLE_HEAD", "user List | Volunteers Admin");
        $data = array(
            'users' => $this->model->getUsers()
        );
        // Chargement de la vue
        $this->load->view('admin/user_list.php', $data);
    }

    public function singleUser()
    {
        define("TITLE_HEAD", "user show | Volunteers Admin");
        $id = $_GET['id'];
        $data = $this->model->getUser($id);
        // Chargement de la vue
        $this->load->view('admin/user.php', $data);
    }

    public function userStatus()
    {
        define("TITLE_HEAD", "user Status | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/user_status.php');
    }


    public function createEvent()
    {
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/event.php');
    }

    public function eventList()
    {
        define("TITLE_HEAD", "Event List | Volunteers Admin");
        $data = array(
            'events' => $this->model->getEvents()
        );
        // Chargement de la vue
        $this->load->view('admin/event_list.php', $data);
    }

    public function singleEvent()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        $id = $_GET['id'];
        $data = array(
            'event' => $this->model->getEvent($id),
            'missions' => $this->model->getMissions($id),
            'nbVolunteer' => $this->model->getNbVolunteers($id),
            'medias' => $this->model->getMedias($id),
            'volunteers' => $this->model->getVolunteers($id),
            'questions' => $this->model->getQuestions($id)
        );
        // Chargement de la vue
        $this->load->view('admin/event.php', $data);
    }

    public function categories()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        $data = array(
            'categories' => $this->model->getCategories()
        );
        // Chargement de la vue
        $this->load->view('admin/categories.php', $data);
    }

    public function inbox()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/inbox.php');
    }

    public function compose()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/compose.php');
    }

    public function signIn()
    {
        define("TITLE_HEAD", "Sign-in | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/sign_in.php');
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
                             Your account has been created!
                             Please confirm your email address by cliking on this link : '.PATH_HOME.'?module=validate&key='.urlencode($this->_userKey).'
                             Thanks!';
                            $mail->contenuMail($objet_mail, $message_mail);

                            // Envoi du mail
                            $mail->envoyerMail();
                        }
                        catch (Exception $e)
                        {
                            echo $e->getMessage();
                        }

                        // Si ok (true) alors on renvoi sur la page d'accueil
                        $messageFlash = 'Your account has been created. Please confirm your email through the one we sent you.';
                        $this->coreSetFlashMessage('sucess', $messageFlash, 6);
                        header('Location:?sign=ok');
                        exit();
                    }
                    else
                    {
                        define("TITLE_HEAD", "An error occurred.");
                        $messageFlash = 'An error has occurred. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header('Location:?signup=nok');
                        exit();
                    }
                }
            }
            else
            {
                // Si false on renvoi sur une page erreur
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'An error has occurred. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:?signup=nok');
                exit();
            }
        }
        else
        {
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'An error has occurred. Please try again.';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header('Location:?signup=nok');
            exit();
        }
    }
}