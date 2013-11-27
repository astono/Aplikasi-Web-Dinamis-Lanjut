<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Wahyu Widodo
 * @copyright 2013
 */

class Home extends CI_Controller {
	
	public function index()
	{		
		$data['title']='Here is example costumization style with css';	
		$this->mytemplate->loadBackend('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */