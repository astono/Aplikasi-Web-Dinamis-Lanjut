<?php
class Employees_model extends CI_Model {

    var $LastName  = '';
    var $Title = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    //dibawah mewakili select*from categories
    function get_employees()
    {
        $query = $this->db->get('employees');
        return $query->result();
    }
	
	function delete($id)
	{
		$this->db->where('EmployeeID',$id);
		$res = $this->db->delete('employees');
		return true;
	
	}

    function insert_entry()
    {
        $this->LastName  = $this->input->post('nm_cat'); 
        $this->Title   = $this->input->post('deskripsi');         
        $this->db->insert('employees', $this);
    }

    function update_entry()
    {
        $this->LastName  = $this->input->post('nm_cat'); 
        $this->Title   = $this->input->post('deskripsi'); 
        
        $this->db->update('oyees', $this, array('EmployeesID' => $_POST['id']));
    }
}