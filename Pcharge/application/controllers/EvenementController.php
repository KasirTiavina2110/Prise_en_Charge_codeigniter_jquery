<?php
defined('BASEPATH') or exit('No direct script access allowed');


class EvenementController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->view('includemenu');
        $this->load->database();
        $this->load->model('Calendrier_model');
    }
    public function index()
    {
        try{
            if ($this->session->userdata('login') != '') {
                $this->load->view('calendrier/Calendrier');
            } else {
                redirect(base_url() . 'LoginController/login');
                    }
            }catch(Exception $e){
                $e->getMessage();
        }
    }
    function load(){
        //echo("Anaty load tsika");
    try{
        $event_data = $this->Calendrier_model->fetch_all_event();
        foreach($event_data->result_array() as $row)
        {
         $data[] = array(
          'id' => $row['id'],
          'title' => $row['title'],
          'start' => $row['start'],
          'end' => $row['end']
         );
        }
        $this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
		   }catch(Exception $e){
		   $e->getMessage();
	   } 
          
}
    function insert(){
       try{
           if($this->input->post('title'))
        {
         $data = array(
          'title'  => $this->input->post('title'),
          'start'=> $this->input->post('start'),
          'end' => $this->input->post('end')
         );
        if ($this->Calendrier_model->insert_event($data)){
            $data = array('response' => 'success', 'message' => 'Record added Successfully');
        }else{
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
    function update()
    {
     if($this->input->post('id'))
     {
      $data = array(
       'title'   => $this->input->post('title'),
       'start' => $this->input->post('start'),
       'end'  => $this->input->post('end')
      );
   
      $this->Calendrier_model->update_event($data, $this->input->post('id'));
     }
    }

 function delete()
 {
  try{
    $this->input->is_ajax_request();
    $del_id = $this->input->post('id');

   if($this->Calendrier_model->delete_event($del_id)){
    $data = array('response' => 'success');
   }else {
    $data = array('response' => 'error');
   }
    $this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
			}catch(Exception $e){
				$e->getMessage();
			}
  
 }
}