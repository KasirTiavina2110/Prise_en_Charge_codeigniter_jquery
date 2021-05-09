<?php
defined('BASEPATH') or exit('No direct script access allowed');


class FactureController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->view('includemenu');
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Facture_model');
    }
    public function index()
    {
        try{
            if ($this->session->userdata('login') != '') {
                $this->load->view('facture/Facture_view');
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
			$this->form_validation->set_rules('numfacture', 'numfacture', 'required');
			$this->form_validation->set_rules('datefacture', 'datefacture', 'required');
			$this->form_validation->set_rules('reference','reference','required');
            $this->form_validation->set_rules('client', 'client', 'required');
			$this->form_validation->set_rules('montant', 'montant', 'required');
			$this->form_validation->set_rules('statut','statut','required');
            $this->form_validation->set_rules('idassureur', 'idassureur', 'required');
			$this->form_validation->set_rules('type', 'type', 'required');
			$this->form_validation->set_rules('numcompte','numcompte');
			
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => 'error', 'message' => validation_errors());
			}else {
				
				$ajax_data = $this->input->post();
				
			if($this->Facture_model->insertFacture($ajax_data)){
				$data = array('response' => 'success', 'message' => 'Record added Successfully');
			} else {
				$data = array('response' => 'error', 'message' => 'Failed to add record');
				echo("fa midona eto");
			}
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
			
		}
		}catch(Exception $e){
			$e->getMessage();
		} 
	}
    public function fetch()
	{
		try{
			$this->input->is_ajax_request();
			
			   $posts = $this->Facture_model->get_facture();
			   
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

			if ($this->Facture_model->delete_facture($del_id)) {
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

			if ($post = $this->Facture_model->edit_facture($edit_id)) {
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
			$this->form_validation->set_rules('edit_numfacture', 'numfacture', 'required');
			$this->form_validation->set_rules('edit_datefacture', 'datefacture', 'required');
			$this->form_validation->set_rules('edit_datedelai','datedelai','required');
			$this->form_validation->set_rules('edit_reference','reference','required');
			$this->form_validation->set_rules('edit_client','client','required');
			$this->form_validation->set_rules('edit_montant','montant','required');
			$this->form_validation->set_rules('edit_statut','statut','required');
			$this->form_validation->set_rules('edit_idassureur','idassureur','required');
			$this->form_validation->set_rules('edit_type','type','required');
			$this->form_validation->set_rules('edit_numcompte','numcompte');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_record_id');
				$data['numfacture'] = $this->input->post('edit_numfacture');
				$data['datefacture'] = $this->input->post('edit_datefacture');
				$data['datedelai'] = $this->input->post('edit_datedelai');
				$data['reference'] = $this->input->post('edit_reference');
				$data['client'] = $this->input->post('edit_client');
				$data['montant'] = $this->input->post('edit_montant');
				$data['statut'] = $this->input->post('edit_statut');
				$data['idassureur'] = $this->input->post('edit_idassureur');
				$data['type'] = $this->input->post('edit_type');
				$data['numcompte'] = $this->input->post('edit_numcompte');
				
				
			
				if($this->Facture_model->update_facture($data)){
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