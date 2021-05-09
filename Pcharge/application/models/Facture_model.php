<?php

    class Facture_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
    }
    public function get_facture()
    {
            $query = $this->db->get('facture');
            return $query->result_array();
    }
    public function insertFacture(){
$datefacture  = $this->input->post('datefacture');

$datedelai = new DateTime($datefacture);
$datedelai = $datedelai->modify('+3 months')->format('Y-m-d');

        $data = array(
            'numfacture'=> $this->input->post('numfacture'),
            'datefacture'=>$this->input->post('datefacture'),
            
            'datedelai'=>$datedelai,
            'reference'=> $this->input->post('reference'),
            'client'=>$this->input->post('client'),
            'montant'=>$this->input->post('montant'),
            'statut'=> $this->input->post('statut'),
            'idassureur'=>$this->input->post('idassureur'),
            'type'=>$this->input->post('type'),
            'numcompte'=> $this->input->post('numcompte'),
        );
        
        $result=$this->db->insert('facture',$data);
        return $result;
    }
    public function delete_facture($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('facture');
		return $result;
    }

        public function edit_facture($id){
        	$this->db->select("*");
        	$this->db->from("facture");
        	$this->db->where("id", $id);
        	$query = $this->db->get();
        	if (count($query->result()) > 0) {
        		return $query->row();
        	}
    }
    public function update_facture($data)
    {
        return $this->db->update('facture', $data, array('id' => $data['id']));
    }
}