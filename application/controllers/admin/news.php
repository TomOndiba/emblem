<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends Admin_controller {
    
    public function index() {
        $this->load->model('news_model');
        $data['news'] = $this->news_model->get_all();
        $this->load->view('admin/news_home', $data);       
    }

}