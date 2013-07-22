<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->view('home');
    }   
        
    public function _remap()
    {
			
		$uris = $this->uri->segment_array();

        if(count($uris)==0){
            redirect("/en");
            $lang = "en";
            $data['page'] = $page = "home";
        }
		else if(count($uris)>1){
			$lang = $this->uri->segment(1);
			$data['page'] = $page = $this->uri->segment(2);
		}else{
			$lang = $this->uri->segment(1);
			$data['page'] = $page = "home";
		}
		
        if($lang=="en"){
            $data['lang'] = "en";
            $this->lang->load('custom','english');
        }
        else{
            $data['lang'] = "cz";
            $this->lang->load('custom','czech');
        }

        $data['param'] = $param = $this->uri->segment(3);

        if($param){
			switch($page){
				case 'news' : 
					$this->load->model('news_model');
					$news = $this->news_model->get_by_id($param);
					$data['description'] = $news[0]->text;
					$data['title'] = $news[0]->headline;		
					$data['image'] = ($news[0]->images[0]) ? base_url("img/news/thumbs/".$news[0]->images[0]->src) : $data['image'] = base_url("img/logo.png"); 
					break;
					
				case 'designers' :
					$this->load->model('designers_model');
					$designers = $this->designers_model->get_by_id($param);
					$data['description'] = $designers[0]->category;
					$data['title'] = $designers[0]->name;
					$data['image'] = base_url("img/designers/".$designers[0]->folder."/thumbs/".$designers[0]->images[0]->src);
					break;
				
				case 'artists' :
					$this->load->model('artists_model');
					$artists = $this->artists_model->get_by_id($param);
					$data['description'] = $artists[0]->category;
					$data['title'] = $artists[0]->name;
					$data['image'] = base_url("img/designers/".$artists[0]->folder."/thumbs/".$artists[0]->images[0]->src);
					break;
					
				default: 
					$data['description'] = "Dreamhouse - Textiles and furniture";
					$data['title'] = ucfirst($page);
					$data['image'] = base_url("img/logo.png");
					break;
				
			}
		}else{
			switch($page){
				case 'designers' :
					$data['description'] = "Our great designers";
					$data['title'] = "Dreamhouse - Designers";
					$data['image'] = base_url("img/logo.png");
					break;
				case 'artists' :
					$data['description'] = "Our great artists";
					$data['title'] = "Dreamhouse - Artists";
					$data['image'] = base_url("img/logo.png");
					break;
					
				case 'news' :
					$data['description'] = "Latest news from dreamhouse";
					$data['title'] = "Dreamhouse - News";
					$data['image'] = base_url("img/logo.png");
					break;
				
				default: 
					$data['description'] = "Dreamhouse - Textiles and furniture";
					$data['title'] = ucfirst($page);
					$data['image'] = base_url("img/logo.png");
					break;
			}
		}
		
			 	
		// you might want to just autoload these two helpers
        $this->load->helper('language');
        $this->load->helper('url');
        $this->load->view('home',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */