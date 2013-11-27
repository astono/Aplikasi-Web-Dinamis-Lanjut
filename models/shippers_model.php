<?php
class Shippers_model extends CI_Model {

    var $CompanyName  = '';
    var $Phone = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_shippers()
    {
        $query = $this->db->get('shippers');
        return $query->result();
    }

	 function get_shippers_by_id($id)
    {
        $this->db->where('ShipperID',$id);
        $query = $this->db->get('shippers');
        return $query->row();
    }
	function insert_entry()
    {
        $this->CompanyName  = $this->input->post('CompanyName',true); 
        $this->Phone   = $this->input->post('Phone',true);         
        return $this->db->insert('shippers', $this);
    }

    function update_entry()
    {
        $this->CompanyName  = $this->input->post('CompanyName',true); 
        $this->Phone   = $this->input->post('Phone',true);         
        return $this->db->update('shippers', $this, array('ShipperID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('ShipperID',$id);
        return $this->db->delete('shippers');
    }


    function cek_dependensi($id)
    {
        $this->db->where('ShipperID',$id);
        $query = $this->db->count_all('shippers');
        return ($query==0) ? true : false;
    }
}