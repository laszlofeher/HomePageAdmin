<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Forgotpassword
 *
 * @author feherlaszlo
 */
class Forgotpassword extends CI_Controller {
    function __construct(){
        parent::__construct();
        //$this->load->model(array('blogmodel','cv','about','mportfolio'));
    }
    
    public function index(){
        $output = [];
        $this->load->view('forgotpassword', $output);
    }
    
}
