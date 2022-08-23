<?php

/**
 * Description of Blogmodel
 *
 * @author feherlaszlo
 */
class Blogmodel extends CI_Model{

    public function getBlogEntry(){
        $this->db->select('id, title, blogsmallcontent, publicday, draft, live, deleted, link, picturepath');
        $this->db->from('blogentry');
        $this->db->order_by("publicday");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return array();
    }
    
    function getBlogEntryById($id){
        $id = (int)$id;
        $this->db->select(" be.id, 
                            title,
                            blogsmallcontent,
                            blogcontent,
                            publicday,
                            draft,
                            live,
                            be.deleted,
                            link,
                            picturepath,
                            blogcategory_id,
                            bc.categoryname,
                            GROUP_CONCAT(bet.blogtag_id	) blogtag_ids,
                            GROUP_CONCAT(bt.tagname) tagnames");
        $this->db->from("blogentry be");
        $this->db->join('blogcategory bc','be.blogcategory_id = bc.id','LEFT');
        $this->db->join('blogentrytag bet','be.id = bet.blogentry_id','LEFT');
        $this->db->join('blogtag bt','bt.id = bet.blogtag_id','LEFT');
        $this->db->where("be.deleted",1);
        $this->db->where("be.id", $id);
        $this->db->group_by('be.id');
        $query = $this->db->get();
        $data = [];
        if ($query->num_rows() > 0) {
            $result =  $query->row_array();
            
            $tagsids  = explode(',',$result['blogtag_ids']);
            $tagnames = explode(',',$result['tagnames']);
            
            $data['id']                 = $result['id'];
            $data['title']              = $result['title'];
            $data['blogsmallcontent']   = $result['blogsmallcontent'];
            $data['blogcontent']        = $result['blogcontent'];
            $data['publicday']          = $result['publicday'];
            $data['draft']              = $result['draft'];
            $data['live']               = $result['live'];
            $data['deleted']            = $result['deleted'];
            $data['link']               = $result['link'];
            $data['picturepath']        = $result['picturepath'];
            foreach ($tagsids as $key => $value) {
                $tags[] = ['tag' => $tagnames[$key], 'value' => $value];
                $tags2[]  = $tagnames[$key];
            }
            $data['tags'] = $tags;
            $data['tagnames'] = $tags2;
            $data['category'] = [ 'value' => $result['blogcategory_id'], 'tag' => $result['categoryname']];
            $data['categoryname'] = $result['categoryname'];
            return $data;
        }
        return [];      
    }
    
    function insertBlogEntry(array $data){
        $this->db->insert("blogentry", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    
    function updateBlogEntry(array $data, int $id){
        $this->db->where('id', $id);
        $this->db->update("blogentry", $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
        
    }
    
    
    function deleteBlogEntry(int $id){
        $this->db->where('blogentry_id', $id);
        $this->db->delete('blogentrytag');
        
        $this->db->where('id', $id);
        $this->db->delete('blogentry');
    }
    
}
