<?php

/**
 * Description of Portfolio
 *
 * @author feherlaszlo
 */
class Portfolio extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library(array('form_validation'));
        $this->load->model(array('portfoliomodel'));
    }

    public function index() {
        if (isLogin()) {
            $output = [];
            $output['page'] = 'portfolio';
            $output['portfolio'] = $this->portfoliomodel->getPortfolio();
            $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }
    
    public function getPortfolioItemById($id){
        $id = (int)$id;
        if(isLogin()){
            $output = [];
            $output = $this->portfoliomodel->getPortfolioById($id);
            $output['errno'] = 0;
            $output['error'] = '';
            print(json_encode($output));
        } else {
            $this->config->load('error');
            $errorCode = $this->config->item('u1003');

            $this->lang->load('error', 'hungarian');
            $errorMessage = $this->lang->line($errorCode);

            print(json_encode(['error' => $errorMessage, 'errno' => $errorCode]));
        }
    }
    
    public function getPortfolioItemPreviewUrl($id){
        $id = (int)$id;
        $this->config->load('admin');
        $prevPageUrl    = $this->config->item('prevpage_url');
        print($prevPageUrl.'portfolio/onlyportfoliodetail/'.$id);        
    }

}
