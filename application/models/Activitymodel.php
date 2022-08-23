<?php

/**
 * Description of Activity
 *
 * @author feherlaszlo
 */
class Activitymodel extends CI_Model{
    
    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
    
    //SELECT * FROM activity as a LEFT JOIN activity_details as ad ON(a.id = ad.activity_id)
    
    public function getAllActivities() {
        $this->db->select(" a.id as aid,
                            ad.id as adid,
                            title,
                            bestoffer,
                            subtitle,
                            name");
        $this->db->from("activity a");
        $this->db->join("activity_details ad", "a.id = ad.activity_id", "left");
        $this->db->order_by("aid","ASC");
        $query = $this->db->get();
        $activity           = array();
        $activityDetails    = array();
        if ($query->num_rows() > 0) {
            $resultArray =  $query->result_array();
            $count      = 0;
            $forcount   = 0;
            $oldId      = -1;
            foreach ($resultArray as $key => $value) {
                if($oldId != $value['aid'] && $forcount != 0){
                    $activity[$count]['names'] = $activityDetails;
                    $activityDetails = array();
                    $count++;
                }
                $activity[$count]['id']         = $value['aid'];
                $activity[$count]['title']      = $value['title'];
                $activity[$count]['subtitle']   = $value['subtitle'];
                $activity[$count]['bestoffer']  = $value['bestoffer'];
                $activityDetails[]              = ['id'=> $value['adid'], 'name'=>$value['name']];
                $oldId   = $value['aid'];
                $forcount++;
            }
            $activity[$count]['names'] = $activityDetails;
            return $activity;
        }
        return [];
    }
    
    public function getCount(){
        $this->db->select(" count(a.id) as count");
        $this->db->from("activity a");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array()['count'];
        }
        return 0;
    }
    
    public function insertActivityDetails(array $data){
        $this->db->insert("activity_details", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;        
    }
    
    public function updateActivityDetails(array $data, int $id){
        $this->db->where('id', $id);
        $this->db->update("activity_details", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;        
    }
    
    public function updateActivity(array $data, int $id){
        $this->db->where('id', $id);
        $this->db->update("activity", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function getActivityDetailById($id) {
        $this->db->select(" id,
                            name");
        $this->db->from("activity_details");
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return array();
    }
    
    public function deleteActivityDetailById($id) {
        $this->db->where('id', $id);
        $this->db->delete("activity_details");
    }
}
