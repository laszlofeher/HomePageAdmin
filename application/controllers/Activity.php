<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activity
 *
 * @author feherlaszlo
 */
class Activity extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model(array('activitymodel','tagmodel','categorymodel'));
        $this->load->helper(array('blogtext'));
    }
    
     public function index(){
        if (isLogin()) {
        $output = [];
        $output['page'] = 'activity';
        $output['activities'] = $this->activitymodel->getAllActivities();
        /*
        print('<pre>');
        var_dump($output['activities']);
        print('</pre>');
        exit();
        */
        
        $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }
    
    public function addDetailToActivity(){
        $activityId = (int)$this->input->post('activityid');
        $activityDetailName = $this->input->post('activitydetailname');
        
        $data['name'] = $activityDetailName;
        $data['activity_id'] = $activityId;
        $this->activitymodel->insertActivityDetails($data);
    }
    
    public function saveActivityTitle(){
        $activityId = (int)$this->input->post('activityid');
        $activityTitle = $this->input->post('activityTitle');
        $data['title'] = $activityTitle;
        $this->activitymodel->updateActivity($data, $activityId);
    }
    
    public function saveAcivitySubTitle(){
        $activityId = (int)$this->input->post('activityid');
        $activitySubTitle = $this->input->post('activitySubTitle');
        $data['subtitle'] = $activitySubTitle;
        $this->activitymodel->updateActivity($data, $activityId);
    }
    
    public function saveActivityDetailName() {
        $id = (int)$this->input->post('activityDetialId');
        $name = $this->input->post('activityDetailName');
        $data['name'] = $name;
        $this->activitymodel->updateActivityDetails($data, $id);
    }
    
    public function getActivityDetailById(){
        $id = (int)$this->input->post('id');
        $detail = $this->activitymodel->getActivityDetailById($id);
        print(json_encode($detail));        
    }
    
    public function deleteActivityDetailName() {
        $id = (int)$this->input->post('activityDetialId');
        $this->activitymodel->deleteActivityDetailById($id);
        
        
    }
}
