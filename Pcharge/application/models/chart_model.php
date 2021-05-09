<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class chart_model extends CI_Model
{
    public $table = 'assureur';
    public $id = 'id';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();
    }
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('code', $q);
	$this->db->or_like('assurance', $q);
	$this->db->or_like('societe', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
}

?>