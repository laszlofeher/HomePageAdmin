<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Description of AboutModel
 *
 * @author feherlaszlo
 */

class Aboutmodel extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    public function getAbout(){
        $this->db->select(" id,
                            icon,	
                            title,
                            content,	
                            skype,	
                            phone,	
                            email,	
                            website,	
                            address,	
                            firstname,	
                            lastname,	
                            other,	
                            profession,	
                            birthday,	
                            city,	
                            work,	
                            leadtext,	
                            abouttext,
                            picture");
        $this->db->from("about");
        $this->db->where("deleted",1);
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return $data;
    }
    
    
    public function insert(array $data) : int
    {
        $this->db->insert("about", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    
    public function update(array $data, int $id) : int
    {
        
        $this->db->where('id', $id);
        $this->db->update("about", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function delete(int $id)
    {
        $this->db->where("id", $id);
        $this->db->delete("about");
    }
    
    public function getCount(){
        $this->db->select(" count(id) as count");
        $this->db->from("about");
        $this->db->where("deleted",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return (int)$query->row_array()['count'];
        }
        return 0;
    }
    
    public function getId(){
        $this->db->select(" id");
        $this->db->from("about");
        $this->db->where("deleted",1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array()['id'];
        }
        return -1;
    }
    
    
    
}
