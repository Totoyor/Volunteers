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
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/dashboard.php');
    }


    public function createUser()
    {
        // Chargement de la home
        define("TITLE_HEAD", "Volunteers | Admin");
        $this->load->view('admin/create_user.php');
    }

    public function userList()
    {
        define("TITLE_HEAD", "user List | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/user_list.php');
    }

    public function singleUser()
    {
        define("TITLE_HEAD", "user show | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/user.php');
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
        // Chargement de la vue
        $this->load->view('admin/event_list.php');
    }

    public function singleEvent()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/event.php');
    }

    public function categories()
    {
        define("TITLE_HEAD", "Event Name | Volunteers Admin");
        // Chargement de la vue
        $this->load->view('admin/categories.php');
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
}