<?php
class Products_model extends CI_Model {

    var $ProductName  = '';
    var $CategoryIDName = '';
	var $QuantityPerUnit = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    /*function insert_entry()
    {
        $this->CategoryName  = $this->input->post('nm_cat'); 
        $this->Description   = $this->input->post('deskripsi');         
        $this->db->insert('categories', $this);
    }

    function update_entry()
    {
        $this->CategoryName  = $this->input->post('nm_cat'); 
        $this->Description   = $this->input->post('deskripsi'); 
        
        $this->db->update('categories', $this, array('CategoryID' => $_POST['id']));
    }*/
	 function get_products_by_id($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        return $query->row();
    }
	function insert_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->CategoryID   = $this->input->post('CategoryID',true);
		$this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true); 		
        return $this->db->insert('products', $this);
    }

    function update_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->CategoryID   = $this->input->post('CategoryID',true);
		$this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true);         
        return $this->db->update('products', $this, array('ProductID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('ProductID',$id);
        return $this->db->delete('products');
    }


    function cek_dependensi($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->count_all('products');
        return ($query==0) ? true : false;
    }
}