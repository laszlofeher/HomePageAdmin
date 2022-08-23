<?php

/**
 * Description of Tagmodel
 *
 * @author feherlaszlo
 */
class Tagmodel extends CI_Model{
    
    public function getTags4Select2($term){
        $this->db->select('id, tagname');
        $this->db->from('blogtag');
        $this->db->like('tagname', $term);
        $query = $this->db->get();
        $returnValue = [];
        $count = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                $returnValue[$count]['tag'] = $value['tagname'];
                $returnValue[$count]['value'] = (int)$value['id'];
                $count++;
            }
            return $returnValue;
        }
        return array();
    }
    
    public function getTags4amsify($term){
        $this->db->select('tagname');
        $this->db->from('blogtag');
        $this->db->like('tagname', $term);
        $query = $this->db->get();
        $returnValue = [];
        $count = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $value) {
                 $returnValue[] = $value['tagname'];
            }
        }
        return $returnValue;
    }
    
    public function insertTag(string $tagName){
        $data['tagname'] = $tagName;
        $this->db->insert("blogtag", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    public function getTagsIdsFromAmsifyValue(string $separatedTags){
        $tagsArray = explode(',', $separatedTags);
        $tagsIds = [];
        foreach ($tagsArray as $key => $value) {
            if(((int)$value) > 0){
                $tagsIds[] = (int)$value;
            }else{
                $tagsIds[] = $this->insertTag($value);
            }
        }
        return $tagsIds;
    }
    
    public function insertBlogEntryTags(int $blogEntryId, array $tagsIds){
        $data = [];
        $data['blogentry_id'] = $blogEntryId;
        foreach ($tagsIds as $key => $value) {
            $data['blogtag_id'] = $value;
            $this->db->insert("blogentrytag", $data);
        }
    }
    
    public function updateBlogEntryTags(int $blogEntryId, array $tagsIds){
        $this->db->where('blogentry_id', $blogEntryId);
        $this->db->delete('blogentrytag');
        
        $this->insertBlogEntryTags($blogEntryId, $tagsIds);
    }
}
