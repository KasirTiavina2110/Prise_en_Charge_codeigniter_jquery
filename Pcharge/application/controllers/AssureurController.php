<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

defined('BASEPATH') or exit('No direct script access allowed');


class AssureurController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->view('includemenu');
        $this->load->database();
        $this->load->model('Assureur_model');
    }
    public function index()
    {
        try{
            if ($this->session->userdata('login') != '') {
                $this->load->view('assureur/Assureur_view');
            } else {
                redirect(base_url() . 'LoginController/login');
                    }
            }catch(Exception $e){
                $e->getMessage();
        }
        
    }
    public function insert()
    {
        try{
			$this->input->is_ajax_request();
			$this->form_validation->set_rules('code', 'code', 'required');
			$this->form_validation->set_rules('assurance', 'assurance', 'required');
			$this->form_validation->set_rules('societe','societe','required');
			
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => 'error', 'message' => validation_errors());
			}else {
				$ajax_data = $this->input->post();
				//strtoupper($ajax_data);
			if($this->Assureur_model->insert_entry($ajax_data)){
				$data = array('response' => 'success', 'message' => 'Record added Successfully');
			} else {
				$data = array('response' => 'error', 'message' => 'Failed to add record');
			}
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
			//strtoupper($data);
		}
		}catch(Exception $e){
			$e->getMessage();
		} 
}
    public function fetch()
    {
        try{
			$this->input->is_ajax_request();
			
			   $posts = $this->Assureur_model->get_entries();
			   
			   $data = array('response' => 'success', 'posts' => $posts);
			   $this->output
			   ->set_content_type('application/json')
			   ->set_output(json_encode($data));
			   
		   }catch(Exception $e){
		   $e->getMessage();
	   } 
    }

    public function delete()
    {
        try{
			$this->input->is_ajax_request();
			$del_id = $this->input->post('del_id');

			if ($this->Assureur_model->delete_entry($del_id)) {
				$data = array('response' => 'success');
			} else {
				$data = array('response' => 'error');
			}
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
			}catch(Exception $e){
				$e->getMessage();
			}
    }
    public function edit()
	{
		try{
            $this->input->is_ajax_request();
            $edit_id = $this->input->post('edit_id');
    
                if ($post = $this->Assureur_model->edit_entry($edit_id)) {
                    $data = array('response' => 'success', 'post' => $post);
                } else {
                    $data = array('response' => 'error', 'message' => 'failed to fetch record');
                } $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
                }catch(Exception $e){
                    $e->getMessage();
                }
    }
    public function update()
	{
		try{$this->input->is_ajax_request(); 
			$this->form_validation->set_rules('edit_code', 'code', 'required');
			$this->form_validation->set_rules('edit_assurance', 'assurance', 'required');
			$this->form_validation->set_rules('edit_societe','societe','required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_record_id');
				$data['code'] = $this->input->post('edit_code');
				$data['assurance'] = $this->input->post('edit_assurance');
				$data['societe'] = $this->input->post('edit_societe');
			
				if($this->Assureur_model->update_entry($data)){
					$data = array('response' => 'success', 'message' => 'Record added Successfully');
				} else {
					$data = array('response' => 'error', 'message' => 'Failed to add record');
				}
			
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
			}
			}catch(Exception $e){
				$e->getMessage();
			}

	}


}