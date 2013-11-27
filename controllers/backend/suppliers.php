<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	public function __construct()
    {
	//$this: memanggil variabel global
        parent::__construct();   
        $this->load->model('Suppliers_model','datamodel');     
    }
	   
	public function index()
	{
		$data['title']='List Of Suppliers';	
		$data['array_suppliers'] = $this->datamodel->get_suppliers();
										//dibawah parameter 1 :nama file
		$this->mytemplate->loadBackend('suppliers',$data);
	}
	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Shippers' : 'Update Shippers';				
		$data['suppliers'] = ($mode=='update') ? $this->datamodel->get_suppliers_by_id($id) : '';
		$this->mytemplate->loadBackend('frmsuppliers',$data);	
	}

	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/suppliers'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

