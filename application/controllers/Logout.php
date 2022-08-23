<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logout
 *
 * @author feherlaszlo
 */
class Logout extends CI_Controller{

    
    public function index() {
        $this->session->unset_userdata('userdata');
        redirect('Login');
    }

}
