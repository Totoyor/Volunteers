<?php


class ContactController extends AppController

{
    public function __construct()
    {
        require 'app/model/ContactModel.php';
        $this->model = new ContactModel();
        parent::__construct();
    }

    public function home()
    {
        define("TITLE_HEAD", "Contact | Volunteers");
        // Chargement de la vue
        $this->load->view('page/contact.php');
    }

    public function send()
    {
        if(isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_message'])){

            $name = $_POST['contact_name'];
            $email = $_POST['contact_email'];
            $message = $_POST['contact_message'];

            if($this->model->contactUs($name, $email, $message)){

                $messageFlash = 'Your message has been sent';
                $this->coreSetFlashMessage('sucess', $messageFlash, 5);
                header('location: home');

            } else {

                $messageFlash = 'An error occured';
                $this->coreSetFlashMessage('error', $messageFlash, 5);
                header('location: home');
                
            }

        } else {
            $messageFlash = 'Please fill in all the fields';
            $this->coreSetFlashMessage('error', $messageFlash, 5);
            header('location: home');
        }
    }
}