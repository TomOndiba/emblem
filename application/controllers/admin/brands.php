<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Brands extends Admin_controller{
    
    public function index(){
        $this->load->model('brands_model');
        $data['brands'] = $this->brands_model->get_all();
        $this->load->view('admin/brands_home', $data);
    }

    public function create() {
        $this->load->view('admin/create_someone');
    }

    public function gallery() {
    	$this->load->view('admin/create_gallery');
    }

    public function edit($id) {
        $this->load->model('someone_model');
        $this->someone_model->_id = $id;
        $this->someone_model->_section = $this->router->fetch_class();
        $data['someone'] = $this->someone_model->get_by_id();

        $this->load->view('admin/create_someone', $data);
    }

    public function edit_gallery($id) {
        $this->load->model('someone_model');
        $this->someone_model->_id = $id;
        $this->someone_model->_section = $this->router->fetch_class();
        $data['images'] = $this->someone_model->get_images_by_id();

        $this->load->view('admin/create_gallery', $data);
    }

}