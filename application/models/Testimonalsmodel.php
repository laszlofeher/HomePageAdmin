<?php
/**
 * Description of Testimonals
 *
 * @author feherlaszlo
 */
class Testimonalsmodel extends CI_Model{
    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function getTestimonals(){
        $this->db->select("id, name, role, comment, picture");
        $this->db->from("testimonals");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
    
    public function updateTestimonals(array $data , int $id){
        $this->db->where('id', $id);
        $this->db->update("testimonals", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;  
    }
}
