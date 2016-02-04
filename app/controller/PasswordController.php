<?php

class PasswordController extends AppController
{
    private $_id;
    private $_email;
    private $_newPass;
    private $_newPassMD5;
    private $_oldPass;

    public function __construct()
    {
        require 'app/model/UserModel.php';
        $this->model = new UserModel();
        parent::__construct();
    }

    public function home()
    {
        // Page de validation du compte
        define("TITLE_HEAD", "Volunteers | Forgot password");
        $this->load->view('user/forgot_password.php');
    }

    public function forgot()
    {
        if(isset($_POST['email'])) {
            if(!empty($_POST['email'])) {
                if($this->coreCheckEmail($_POST['email']))
                {
                    $this->_email = $_POST['email'];

                    if($this->model->checkEmail($this->_email))
                    {
                        // changer le password
                        $this->_newPass = mt_rand();
                        $this->_newPassMD5 = md5($this->_newPass);

                        if($this->model->changePassword($this->_email, $this->_newPassMD5)) {
                            // envoi par mail du nouveau password en clair
                            try
                            {
                                // Instanciation
                                $mail = new Mail('contact@volunteers.com', 'Team Volunteers', 'contact@volunteers.com');

                                // Ajout destinataire
                                $mail->ajoutDestinataire($this->_email);

                                // Ajout du contenu
                                $objet_mail = 'Volunteers Account';
                                $message_mail = 'Hello,
                             It seems that you have forget your password
                             Here is your new password : '.$this->_newPass.'
                             Please change it after login in our website.
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
                            $messageFlash = 'Your new password has been sent to your email.';
                            $this->coreSetFlashMessage('sucess', $messageFlash, 6);
                            header('Location:?');
                            exit();
                        }
                        else {
                            define("TITLE_HEAD", "An error occur.");
                            $messageFlash = 'An error occur. Please try again.';
                            $this->coreSetFlashMessage('error', $messageFlash, 3);
                            header('Location:?module=password');
                            exit();
                        }
                    }
                    else {
                        // L'adresse email n'est pas dans la base
                        define("TITLE_HEAD", "Wrong adress email.");
                        $messageFlash = 'Your email is wrong. Please try again.';
                        $this->coreSetFlashMessage('error', $messageFlash, 3);
                        header('Location:?module=password');
                        exit();
                    }
                }
                else {
                    // mauvaise adresse mail
                    define("TITLE_HEAD", "Wrong adress email.");
                    $messageFlash = 'Your email is wrong. Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header('Location:?module=password');
                    exit();
                }
            }
            else {
                // adresse mail vide
                define("TITLE_HEAD", "Empty adress email.");
                $messageFlash = 'Your email is wrong. Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:?module=password');
                exit();
            }
        }
        else {
            // aucun post passé
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'An error occur. Please try again.';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header('Location:?module=password');
            exit();
        }
    }

    public function change()
    {
        // Page de changement de mdp
        define("TITLE_HEAD", "Volunteers | Change password");
        $this->load->view('user/change_password.php');
    }

    public function newpass()
    {
        if(isset($_POST['LastPassword']) && isset($_POST['NewPassword']))
        {
            if(!empty($_POST['LastPassword']) && !empty($_POST['NewPassword']))
            {
                $this->_oldPass = md5($_POST['LastPassword']);
                $this->_newPassMD5 = md5($_POST['NewPassword']);
                $this->_id = $_SESSION['user_id'];
                $this->_email = $_SESSION['user_email'];

                $user = $this->model->checkPassword($this->_id);
                if(!empty($user))
                {
                   if($this->_oldPass == $user['Password'])
                   {
                       if($this->model->changePassword($this->_email, $this->_newPassMD5))
                       {
                           // Si ok (true) alors on renvoi sur la page de profil
                           $messageFlash = 'Your new password has been updated !';
                           $this->coreSetFlashMessage('sucess', $messageFlash, 6);
                           header('Location:?module=profile');
                           exit();
                       }
                       else
                       {
                           // Erreur !
                           define("TITLE_HEAD", "An error occur.");
                           $messageFlash = 'An error occur. Please try again.';
                           $this->coreSetFlashMessage('error', $messageFlash, 3);
                           header('Location:?module=password&action=change');
                           exit();
                       }
                   }
                   else
                   {
                       // Mauvais password
                       define("TITLE_HEAD", "An error occur.");
                       $messageFlash = 'Wrong password ! Please try again.';
                       $this->coreSetFlashMessage('error', $messageFlash, 3);
                       header('Location:?module=password&action=change');
                       exit();
                   }
                }
                else
                {
                    // Pas de user
                    define("TITLE_HEAD", "An error occur.");
                    $messageFlash = 'An error occur ! Please try again.';
                    $this->coreSetFlashMessage('error', $messageFlash, 3);
                    header('Location:?module=password&action=change');
                    exit();
                }
            }
            else
            {
                // Pas de password
                define("TITLE_HEAD", "An error occur.");
                $messageFlash = 'No password send ! Please try again.';
                $this->coreSetFlashMessage('error', $messageFlash, 3);
                header('Location:?module=password&action=change');
                exit();
            }
        }
        else
        {
            // Pas de post
            define("TITLE_HEAD", "An error occur.");
            $messageFlash = 'No password send ! Please try again.';
            $this->coreSetFlashMessage('error', $messageFlash, 3);
            header('Location:?module=password&action=change');
            exit();
        }
    }
}