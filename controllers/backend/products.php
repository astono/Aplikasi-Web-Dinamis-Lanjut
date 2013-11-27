<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
    {
	//$this: memanggil variabel global
        parent::__construct();   
        $this->load->model('Products_model','datamodel');
	
		//$this->load->library('table');
		$this->load->library('pagination');
    }
	   
	public function index()
	{
		$data['title']='List Of Products';	
		$data['array_products'] = $this->datamodel->get_products();
										//dibawah parameter 1 :nama file
			$jml = $this->db->get('products');  //menghitung jumlah baris(data) pada table products
		    //pengaturan paging
			$config['base_url'] = base_url()."backend/products/index/";
            $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = 5;     //jumlah data yang ditampilkan tiap halaman
			$config['num_links'] = 2;
			$config['next_link']  = 'Next &raquo;';
			$config['previous_link']  = 'Previous';
			$config['uri_segment']      = 4;
			$offset         = $this->uri->segment(4); 
			
			//inisialisasi config 
            $this->pagination->initialize($config);
          
            
			//buat page
			$data['halaman'] = $this->pagination->create_links();
			//tamppilkan data
			$data['array_products'] = $this->datamodel->load_table($config['per_page'], $offset);
			$this->mytemplate->loadBackend('products',$data);
	}
	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Products' : 'Update Products';				
		$data['products'] = ($mode=='update') ? $this->datamodel->get_products_by_id($id) : '';
		$this->mytemplate->loadBackend('frmproducts',$data);	
	}

	public function process($mode,$id='')
	{
		
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/products'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
	
	
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

