<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_Footer extends CI_Controller {
        
    public function index()
    {
        $this->load->view('view_footer');
    }   
        
    public function _remap()
    {
        $this->load->view('view_footer');
    }
    
}