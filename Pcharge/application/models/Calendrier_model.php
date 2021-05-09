<?php 

	class Calendrier_model extends CI_Model {

        function fetch_all_event(){
            $this->db->order_by('id');
  return $this->db->get('events');
           }

           function insert_event($data){
            $result=$this->db->insert('events', $data);
         return $result;
        }  

        public function edit_event($id){
        	$this->db->select("*");
        	$this->db->from("events");
        	$this->db->where("id", $id);
        	$query = $this->db->get();
        	if (count($query->result()) > 0) {
        		return $query->row();
        	}
        }
        function delete_event($id)
        {
         $this->db->where('id', $id);
        $query= $this->db->delete('events');
        return $query;
        }
        function update_event($data, $id)
        {
    $this->db->where('id', $id);
    $query=$this->db->update('events', $data);
    return $query;
    }
}