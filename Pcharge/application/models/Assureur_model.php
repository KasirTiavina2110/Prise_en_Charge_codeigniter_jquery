<?php 

	class Assureur_model extends CI_Model {

        public function get_entries()
        {
                $query = $this->db->get('assureur');
                return $query->result_array();
        }

        public function insert_entry()
        {
            $data = array(
                'code'=> $this->input->post('code'),
                'assurance'=>$this->input->post('assurance'),
                'societe'=>$this->input->post('societe'),
            );
            $result=$this->db->insert('assureur',$data);
		    return $result;
        }

        public function delete_entry($id){
		$this->db->where('id', $id);
		$result=$this->db->delete('assureur');
		return $result;
        }

        public function edit_entry($id){
        	$this->db->select("*");
        	$this->db->from("assureur");
        	$this->db->where("id", $id);
        	$query = $this->db->get();
        	if (count($query->result()) > 0) {
        		return $query->row();
        	}
        }

        public function update_entry($data)
        {
            return $this->db->update('assureur', $data, array('id' => $data['id']));
        }

}
 /* $data = array(
            'code' => $code,
            'assurance' => $assurance,
            'societe' => $societe
    );
    $this->db->where('id', $id);
    $query=$this->db->update('assureur', $data);
		return $query;	*/