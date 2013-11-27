<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct()
    {
	//$this: memanggil variabel global
        parent::__construct();   
        $this->load->model('Customers_model','datamodel');     
    }
	   
	public function index()
	{
		$data['title']='List Of Customers';	
		$data['array_customers'] = $this->datamodel->get_customers();
										//dibawah parameter 1 :nama file
		$this->mytemplate->loadBackend('customers',$data);
	}
	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Customers' : 'Update Customers';				
		$data['customers'] = ($mode=='update') ? $this->datamodel->get_customers_by_id($id) : '';
		$this->mytemplate->loadBackend('frmcustomers',$data);	
	}

	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/customers'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

