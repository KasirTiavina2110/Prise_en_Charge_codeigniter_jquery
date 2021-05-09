<?php
defined('BASEPATH') or exit('No direct script access allowed');


class LoginController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->view('include');
        $this->load->database();
    }
    public function index()
    {
        $this->load->view('login/login');
    }

    public function login()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run()) {

            //true  
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            //model function  
            $this->load->model('Users');
            $log = $this->Users->login($login, $password, $email);

            if ($log) {
                $session_data = array(
                    'login'     =>     $login
                );
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'LoginController/menu');
            } else {
                $this->session->set_flashdata('error', 'Invalid Login and Password');
                redirect(base_url() . 'LoginController/login');
            }
        } else {
            //false  
            //echo 'ato';
            $this->index();
        }
    }
    function menu()
    {
        $this->load->view('includemenu');
        if ($this->session->userdata('login') != '') {
            $this->load->view('menu/menu');
        } else {
            redirect(base_url() . 'LoginController/login');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('login');
        redirect(base_url() . 'LoginController');
    }
}
