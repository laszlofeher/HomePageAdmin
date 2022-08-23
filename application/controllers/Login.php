<?php
/**
 * Description of Login
 *
 * @author feherlaszlo
 */
class Login  extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
    }
    
    public function index(){
        if(!$this->session->has_userdata('userdata')){
            $this->form_validation->set_rules('emailaddress', 'Email cím', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Jelszó ', 'trim|required|min_length[6]|callback_usercheck');
            if($this->form_validation->run() === FALSE){
                $this->load->view('login');
            }
            else
            {
                $this->load->view('home');
            }
        }
        else
        {
            redirect('home');
        }
    }
    
    public function usercheck()
    {
        $email              = $this->input->post('emailaddress');
        $password           = $this->input->post('password');
        $userArray          = [];
        $userArray          = $this->systemuser->getUserDataByEmailAndPassword($email, trim($password));

        if($userArray['error'] === 'u1000' || $userArray['error'] === 'u1001' || $userArray['error'] === 'u1002')
        {
            log_message('error', 'error code :'.$userArray['error'].' username . '.$email);
            
            $this->config->load('error');
            $errorCode = $this->config->item($userArray['error']);
            
            $this->lang->load('error', 'hungarian');
            $errorMessage = $this->lang->line($errorCode);

            $this->form_validation->set_message('usercheck', $errorMessage);
            $this->form_validation->set_message('password', 'Hibás bejelentkezés, kérem elenőrizze a jelszavát!');
        }
        else if($userArray['error'] === 'u0000')
        {
            $this->session->set_userdata('userdata',$userArray);
            return true;
        }
        return false;
    }
}
