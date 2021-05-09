<?php
class Details_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("viewdetails");
  $this->db->order_by('id', 'DESC');
  return $this->db->get();
 }
}
?>