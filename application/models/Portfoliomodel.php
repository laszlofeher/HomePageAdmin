<?php
/**
 * Description of Profilemodel
 *
 * @author feherlaszlo
 */
class Portfoliomodel extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function getPortfolio(){
        $this->db->select(" cv_portfolio.id,
                            cv_portfolio.picture,
                            url,
                            title,
                            title2,
                            description,
                            curiosity,
                            curiositydescription,
                            order,
                            group_concat(cv_portfolio_detail.picture SEPARATOR ';') AS pictures");
        $this->db->from("cv_portfolio");
        $this->db->join("cv_portfolio_detail","cv_portfolio.id = cv_portfolio_detail.cv_portfolio_id", "left");
        $this->db->where("cv_portfolio.deleted",1);
        $this->db->group_by("cv_portfolio.id");
        $this->db->order_by("order","ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $data;      
    }
    
    function getPortfolioById($id){
        $id = (int)$id;
        $this->db->select(" cv_portfolio.id,
                            cv_portfolio.picture,
                            url,
                            title,
                            title2,
                            description,
                            curiosity,
                            curiositydescription,
                            order,
                            group_concat(cv_portfolio_detail.picture SEPARATOR ';') AS pictures");
        $this->db->from("cv_portfolio");
        $this->db->join("cv_portfolio_detail","cv_portfolio.id = cv_portfolio_detail.cv_portfolio_id", "left");
        $this->db->where("cv_portfolio.deleted",1);
        $this->db->where("cv_portfolio.id", $id);
        $this->db->group_by("cv_portfolio.id");
        $this->db->order_by("order","ASC");
        $query = $this->db->get();
        $data = array();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return $data;      
    }
    
    
    
}
