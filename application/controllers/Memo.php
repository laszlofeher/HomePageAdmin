<?php

/**
 * Description of Memo
 *
 * @author feherlaszlo
 */
class Memo extends CI_Controller {
   function __construct(){
        parent::__construct();
        $this->load->model(array('tagmodel','categorymodel'));
        $this->load->helper(array('blogtext'));
    }
    
    public function index(){
        if (isLogin()) {
        $output = [];
        $output['page'] = 'memo';
        $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }
    
    
    
    
    
}
