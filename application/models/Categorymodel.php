<?php

/**
 * Description of Categorymodel
 *
 * @author feherlaszlo
 */
class Categorymodel extends CI_Model{
    
    public function getCategories4select2($term){
        $this->db->select('id, categoryname');
        $this->db->from('blogcategory');
        $this->db->like('categoryname', $term);
        $query = $this->db->get();
        $returnValue = [];
        $count = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                $returnValue[$count]['tag'] = $value['categoryname'];
                $returnValue[$count]['value'] = $value['id'];
                $count++;
            }
            return $returnValue;
        }
        return array();
    }
    
    public function getCategories4amsify(){
        $this->db->select('categoryname');
        $this->db->from('blogcategory');
        $query = $this->db->get();
        $returnValue = [];
        $count = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                 $returnValue[] = $value['categoryname'];
            }
        }
        return $returnValue;
    }
    
    public function insertCategory(string $categoryName){
        $data['categoryname'] = $categoryName;
        $this->db->insert("blogcategory", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function getCategoryIdFromAmsifyValue(string $category){
        $id = -1;
        if(((int)$category) > 0){
            $id = (int)$category;
        }else{
            $id = $this->insertCategory($category);
        }
        return $id;
    }
    
    
}