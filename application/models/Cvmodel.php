<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cvmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function getEmployment(){
        $this->db->select(" id,
                            name,
                            assignament,
                            sector,
                            dfrom,
                            dto,
                            memo,
                            employer,
                            link,
                            position,
                            deleted,
                            employer_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_work");
        $this->db->where("deleted",1);
        $this->db->order_by("dfrom","DESC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }
    
    public function getFirstEmployment(){
        $this->db->select(" id,
                            name,
                            assignament,
                            sector,
                            dfrom,
                            dto,
                            memo,
                            employer,
                            link,
                            position,
                            deleted,
                            employer_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_work");
        $this->db->where("deleted",1);
        $this->db->where("dto",null);
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return $data;
    }
    
    public function getWorkById(int $id){
        $this->db->select(" id,
                            name,
                            assignament,
                            sector,
                            dfrom,
                            dto,
                            memo,
                            employer,
                            link,
                            position,
                            deleted,
                            employer_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_work");
        $this->db->where("deleted",1);
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return array();
    }
    
    public function getEducation(){
        $this->db->select(" id,
                            name,
                            faculty,
                            dfrom,
                            dto,
                            memo,
                            school,
                            link,
                            position,
                            level,
                            type,
                            deleted,
                            school_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_education");
        $this->db->where("deleted",1);
        $this->db->order_by("dfrom","DESC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }
    
    public function getEducationByLevelAndType($level,  $type){
        $this->db->select(" id,
                            name,
                            faculty,
                            dfrom,
                            dto,
                            memo,
                            school,
                            link,
                            position,
                            level,
                            type,
                            deleted,
                            school_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_education");
        $this->db->where("deleted",1);
        $this->db->where("level",$level);
        $this->db->where("type",$type);
        $this->db->order_by("dfrom","DESC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }
    
    public function getEducationByType($type){
        $this->db->select(" id,
                            name,
                            faculty,
                            dfrom,
                            dto,
                            memo,
                            school,
                            link,
                            position,
                            level,
                            type,
                            deleted,
                            school_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_education");
        $this->db->where("deleted",1);
        $this->db->where("type",$type);
        $this->db->order_by("dfrom","DESC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }
    
    public function getEducationById(int $id){
        $this->db->select(" id,
                            name,
                            faculty,
                            dfrom,
                            dto,
                            memo,
                            school,
                            link,
                            position,
                            deleted,
                            school_visible,
                            link_visible,
                            position_visible");
        $this->db->from("cv_education");
        $this->db->where("deleted",1);
        $this->db->where("id",$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return array();
    }
    
    public function getSkills(){
        $this->db->select(" id,
                            name,
                            percent,
                            order");
        $this->db->from("cv_skills");
        $this->db->where("deleted",1);
        $this->db->where("group",'skill');
        $this->db->order_by("order","ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }

    public function getMoreSkills(){
        $this->db->select(" name,
                            percent,
                            order");
        $this->db->from("cv_skills");
        $this->db->where("deleted",1);
        $this->db->where("group",'moreskills');
        $this->db->order_by("order","ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }
    
    public function getMoreSkillsCount(){
        $this->db->select(" count(*) as count");
        $this->db->from("cv_skills");
        $this->db->where("deleted",1);
        $this->db->where("group",'moreskills');
        $this->db->order_by("order","ASC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array()[0]["count"];
        }
        return 0;
    }
    
    public function getPortfolio(){
        $this->db->select(" picture,
                            url,
                            title");
        $this->db->from("cv_portfolio");
        $this->db->where("deleted",1);
        $this->db->order_by("order","ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;
    }
    
    
    public function getId(): int{
        $this->db->select("id");
        $this->db->from("cv");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return (int)$query->row_array()['id'];
        }
        return -1;
        
        
    }
    
    public function insertEducation(array $data) {
        $data['cv_id'] = $this->getId();
        $data['deleted'] = 1;
        $data['school_visible'] = 1;
        $data['link_visible'] = 1;
        $data['position_visible'] = 1;
        $data['memo_visible'] = 1;
        $this->db->insert("cv_education", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function updateEducation(array $data, int $id){
        $this->db->where('id', $id);
        $this->db->update("cv_education", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
        
    }
    
    public function deleteEducation(int $id){
        $this->db->where("id", $id);
        $this->db->delete("cv_education");
        
    }
    
    public function insertWork(array $data){
        $data['cv_id'] = $this->getId();
        $data['deleted'] = 1;
        $data['employer_visible'] = 1;
        $data['link_visible'] = 1;
        $data['position_visible'] = 1;
        $data['memo_visible'] = 1;
        
        $this->db->insert("cv_work", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function updateWork(array $data, int $id){
        $this->db->where('id', $id);
        $this->db->update("cv_work", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function deleteWork(int $id){
        $this->db->where("id", $id);
        $this->db->delete("cv_work");
    }
    
}

?>
