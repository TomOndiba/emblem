<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller{


	function __construct(){
		
		parent::__construct();
		define("DS", DIRECTORY_SEPARATOR);	
	}
    
//-----------------------------------------------------------------------------------------------------------

    public function index()
    {
        echo "ASDS";
    }   

    function _file_get_contents_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }  
	

	public function get_content()
	{
        $url = urldecode($this->input->get('url'));
		switch ($url) {
		    case 'home':
        		$this->load->model('home_model');
				$data = json_encode($this->home_model->get_all());
				echo $data;
		        break;
		    case 'projects':
		       	$this->load->model('project_model');
				$data = json_encode($this->project_model->get_all());	
				echo $data;
		        break;
		    default :
		        echo $url;
		        break;
		}		
    }
    
    public function addHome(){
	    $this->load->model('home_model');
    	$this->load->model('news_model');
    	$this->load->model('work_model');
    	$id = $this->input->post('id');
	    $page = $this->input->post('page');
	    
	    if($page=='works'){
		    $this->work_model->addHome($id);
	    }	
	    elseif($page=='news'){
		    $this->news_model->addHome($id);
	    }
    }
    
    public function removeHome(){
	    $this->load->model('home_model');
    	$this->load->model('news_model');
    	$this->load->model('work_model');
    	$id = $this->input->post('id');
	    $page = $this->input->post('page');

	    if($page=='works'){
		    $this->work_model->removeHome($id);
	    }
	    elseif($page=='news'){
		    $this->news_model->removeHome($id);
	    }
    }
    
    public function reposition(){
    
    	$this->load->model('home_model');
    	$this->load->model('news_model');
    	$this->load->model('work_model');
	    $elems = $this->input->post('elems');
	    $page = $this->input->post('page');
	    	    
	    foreach($elems as $elem){    	    	
			if($page=='home'){
		    	if($elem['category']=='home'){	    		
			    	$this->home_model->updatePosition($elem['id'], $elem['home']);
		    	}elseif($elem['category']=="news"){
			    	$this->news_model->updatePosition($elem['id'], $elem['home']);
		    	}else{
			    	$this->work_model->updatePosition($elem['id'], $elem['home']);
		    	}
	    	}else{    	
	    		if($elem['category']=='works'){			
	    			echo $page;
	    			echo $elem['category'];
	    			
	    			if($page == $elem['category']){
		    			$this->work_model->updateOrder($elem['id'], $elem['home']);
		    		}else{
			    		$this->work_model->updateCatOrder($elem['id'], $elem['home']);
		    		}
	    		}elseif($elem['category']=='news'){
		    		$this->news_model->updateOrder($elem['id'], $elem['home']);
	    		}
	    	}
	    }
    }
    
	
}
?>
