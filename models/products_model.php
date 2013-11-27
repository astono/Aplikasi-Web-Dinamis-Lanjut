<?php
class Products_model extends CI_Model {

    var $ProductName  = '';
    var $CategoryID = '';
	var $QuantityPerUnit = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    //fungsi untuk mengambil data dari tabel products
    function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }
	//fungsi memilih products berdasarkan product id
	function get_products_by_id($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        return $query->row();
    }
	
	//fungsi tambah
	function insert_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->CategoryID   = $this->input->post('CategoryID',true);
		$this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true); 		
        return $this->db->insert('products', $this);
    }
	//fungsi update
    function update_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->CategoryID   = $this->input->post('CategoryID',true);
		$this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true);         
        return $this->db->update('products', $this, array('ProductID' => $this->input->post('id',true)));
    }

	//fungsi hapus data
    function hapus($id)
    {
        $this->db->where('ProductID',$id);
        return $this->db->delete('products');
    }
	
	//menampilkan data pada tabel sesuai paging yang dibuat
	function load_table($num, $offset)
	{
		//$this->db->order_by('ProductID', 'ASC');
		$data=$this->db->get('products', $num, $offset);
		return $data->result();
	}
    function cek_dependensi($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->count_all('products');
        return ($query==0) ? true : false;
    }
}