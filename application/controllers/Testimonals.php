<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Opinion
 *
 * @author feherlaszlo
 */
class Testimonals extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model(array('testimonalsmodel','tagmodel','categorymodel'));
        $this->load->helper(array('blogtext'));
    }
    
    public function index(){
        if (isLogin()) {
        $output = [];
        $output['page'] = 'testimonals';
        $output['testimonals']  = $this->testimonalsmodel->getTestimonals();
        $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }
    
    public function uploadPicture(){
        $id = (int)$this->input->post('id');
        $config['upload_path']          = './assets/dist/img/testimonalspicture/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('picture'))
        {
            $error = array('error' => $this->upload->display_errors());
                
        }
        else
        {
            $picture = array('upload_data' => $this->upload->data());
            $data['picture'] = $picture['upload_data']['file_name'];
            $this->testimonalsmodel->updateTestimonals($data, $id);
            print(json_encode(['picture'=>$picture['upload_data']['file_name']]));  
        }
    }
    
    public function saveTestimonalsName() {
        $id     = (int)$this->input->post('testimonalsId');
        $name   = $this->input->post('testimonalsName');
        $data['name'] = $name;
        $this->testimonalsmodel->updateTestimonals($data, $id);
    }
    
    public function saveTestimonalsRole() {
        $id     = (int)$this->input->post('testimonalsId');
        $role   = $this->input->post('testimonalsRole');
        $data['role'] = $role;
        $this->testimonalsmodel->updateTestimonals($data, $id);
    }
    
    public function saveTestimonalsComment() {
        $id         = (int)$this->input->post('testimonalsId');
        $comment    = $this->input->post('testimonalsComment');
        $data['comment'] = $comment;
        $this->testimonalsmodel->updateTestimonals($data, $id);
    }
}
