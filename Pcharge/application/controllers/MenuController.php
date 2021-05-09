<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

defined('BASEPATH') or exit('No direct script access allowed');


class MenuController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('includemenu');
        $this->load->database();
    }
   

    function menu()
    {
        
        if ($this->session->userdata('login') != '') {
            $this->load->view('menu/Menu');
        } else {
            redirect(base_url() . 'LoginController/login');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('LoginController/login');
    }
}
