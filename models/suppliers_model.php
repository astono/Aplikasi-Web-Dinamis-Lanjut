<?php
class Suppliers_model extends CI_Model {

    var $CompanyName  = '';
	var $ContactName  = '';
	var $Address  = '';
    var $Phone = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_suppliers()
    {
        $query = $this->db->get('suppliers');
        return $query->result();
    }

	 function get_suppliers_by_id($id)
    {
        $this->db->where('SupplierID',$id);
        $query = $this->db->get('suppliers');
        return $query->row();
    }
	function insert_entry()
    {
        $this->CompanyName  = $this->input->post('CompanyName',true); 
		$this->ContactName  = $this->input->post('ContactName',true); 
		$this->Address  = $this->input->post('Address',true); 
        $this->Phone   = $this->input->post('Phone',true);         
        return $this->db->insert('suppliers', $this);
    }

    function update_entry()
    {
        $this->CompanyName  = $this->input->post('CompanyName',true); 
		$this->ContactName  = $this->input->post('ContactName',true); 
		$this->Address  = $this->input->post('Address',true); 
        $this->Phone   = $this->input->post('Phone',true);          
        return $this->db->update('suppliers', $this, array('SupplierID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('SupplierID',$id);
        return $this->db->delete('suppliers');
    }


    function cek_dependensi($id)
    {
        $this->db->where('SupplierID',$id);
        $query = $this->db->count_all('suppliers');
        return ($query==0) ? true : false;
    }
}