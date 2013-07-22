<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_Services extends CI_Controller {

    /**
        * Index Page for this controller.
        *
        * Maps to the following URL
        * 		http://example.com/index.php/welcome
        *	- or -  
        * 		http://example.com/index.php/welcome/index
        *	- or -
        * Since this controller is set as the default controller in 
        * config/routes.php, it's displayed at http://example.com/
        *
        * So any other public methods not prefixed with an underscore will
        * map to /index.php/welcome/<method_name>
        * @see http://codeigniter.com/user_guide/general/urls.html
        */
        
    public function index()
    {
        $this->load->view('view_services');
    }   
        
    public function _remap()
    {	
		
		$uris = $this->uri->segment_array();
	
		if(count($uris)>1){
			$id = $this->uri->segment(1);
			$data['page'] = $this->uri->segment(2);
			if($id=="en"){
				$data['lang'] = "en";
				$this->lang->load('custom','english');
			}
			else{
				$data['lang'] = "cz";
				$this->lang->load('custom','czech');
			}						
		}else{
			$this->lang->load('custom');
			$data['lang']="cz";
			$data['page'] = $this->uri->segment(1);
		}
		
						 	
		// you might want to just autoload these two helpers
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->view('view_services',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */