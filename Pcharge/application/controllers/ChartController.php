<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ChartController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->view('includemenu');
        $this->load->database();
    }
    public function index()
    {
        $this->load->view('chart/Chart');
    }
}