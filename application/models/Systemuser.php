<?php

/**
 * Description of Systemuser
 *
 * @author feherlaszlo
 */
class Systemuser extends CI_Model {
    
    public function getUserDataByEmailAndPassword($email, $password){
        $password = hash ('sha512' , $password);
        $this->db->select('id, firstname, lastname, email, password');
        $this->db->from('systemuser');
        $this->db->where('email', $email);
        $this->db->where('valid', 1);
        $query = $this->db->get();
        $userdata = [];

        if($query->num_rows() === 0){
            $userdata['error'] = 'u1002';
        } else if($query->num_rows() == 1){
            $data = $query->row_array();
            if($data['password'] === $password){
                $userdata['error'] = 'u0000';
                $userdata['data'] = $data;
            } else{
                $userdata['error'] = 'u1001';
            }
        } else {
            $userdata['error'] = 'u1000';
        }        
        return $userdata;
    }
    
    
    
    
}
