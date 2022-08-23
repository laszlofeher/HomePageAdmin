<?php

/**
 * Description of Skils
 *
 * @author feherlaszlo
 */
class Skills extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model(array('cvmodel'));
    }

    public function index() {
        if (isLogin()) {
            $output = [];
            $output['page'] = 'skills';
            $output['skills'] = $this->cvmodel->getSkills();
            $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }

}
