<?php
class Categories_model extends CI_Model {

    var $CategoryName  = '';
    var $Description = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_categories()
    {
        $query = $this->db->get('categories');
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
	 function get_categories_by_id($id)
    {
        $this->db->where('CategoryID',$id);
        $query = $this->db->get('categories');
        return $query->row();
    }
	function insert_entry()
    {
        $this->CategoryName  = $this->input->post('CategoryName',true); 
        $this->Description   = $this->input->post('Description',true);         
        return $this->db->insert('categories', $this);
    }

    function update_entry()
    {
        $this->CategoryName  = $this->input->post('CategoryName',true); 
        $this->Description   = $this->input->post('Description',true);         
        return $this->db->update('categories', $this, array('CategoryID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('CategoryID',$id);
        return $this->db->delete('categories');
    }


    function cek_dependensi($id)
    {
        $this->db->where('CategoryID',$id);
        $query = $this->db->count_all('categories');
        return ($query==0) ? true : false;
    }
}