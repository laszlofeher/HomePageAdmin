<?php
/**
 * Description of Blog
 *
 * @author feherlaszlo
 */
class Blog extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model(array('blogmodel','tagmodel','categorymodel'));
        $this->load->helper(array('blogtext'));
    }
    
    public function index(){
        if (isLogin()) {
        $output = [];
        $output['page'] = 'blog';
        $output['blogentries'] = $this->blogmodel->getBlogEntry();
        $this->load->view('home', $output);
        } else {
            redirect('Login');
        }
    }
    
    public function add(){
        $output = [];
        $output['page'] = 'blogaddedit';
        $output['blogentries'] = $this->blogmodel->getBlogEntry();
        $this->load->view('home', $output);
    }
    
    public function getBlogItemPreviewUrl($id){
        $id = (int)$id;
        $this->config->load('admin');
        $prevPageUrl    = $this->config->item('prevpage_url');
        print($prevPageUrl.'blog/onlyblogdetail/'.$id); 
    }
    
    public function getBlogEntryById(){
        $id = (int)$this->input->post('id');
        if(isLogin()){
            $output = [];
            $output = $this->blogmodel->getBlogEntryById($id);
            $output['errno'] = 0;
            $output['error'] = '';
            print(json_encode($output));
        } else {
            $this->config->load('error');
            $errorCode = $this->config->item('u1003');

            $this->lang->load('error', 'hungarian');
            $errorMessage = $this->lang->line($errorCode);

            print(json_encode(['error' => $errorMessage, 'errno' => $errorCode]));
        }
    }
    
    public function saveBlogItem() {
        $id                 = (int)$this->input->post('id');
        $title              = $this->input->post('title');
        $leadSwitch         = $this->input->post('leadSwitch') === 'true' ? true : false;
        $autoLeadTextLength = (int)$this->input->post('autoLeadTextLength');
        $blogSmallContent   = $this->input->post('blogSmallContent');
        $blogContent        = $this->input->post('blogContent');
        $publicday          = $this->input->post('publicday');
        $draft              = $this->input->post('draft') === 'true' ? true : false;
        $tags               = $this->input->post('tags');
        $category           = $this->input->post('category');
        $tagsIds            = NULL;
        $categoryId         = NULL;
        
        //var_dump($leadSwitch);
        if($leadSwitch){
            $blogSmallContent = leadText($blogContent, $autoLeadTextLength);
        }
        
        if(strlen($tags) > 0){
            $tagsIds = $this->tagmodel->getTagsIdsFromAmsifyValue($tags);
        }
        if(strlen($category) > 0){
            $categoryId = $this->categorymodel->getCategoryIdFromAmsifyValue($category);
        }
        
        $data['title'] = $title;
        $data['blogcontent'] = $blogContent;
        $data['blogsmallcontent'] = $blogSmallContent;
        $data['blogcategory_id']  = $categoryId;
        $data['facebookcontent']  = '';
        $data['publicday']        = $publicday;
        $data['draft']            = $draft ? 1: 0;
        $data['deleted']          = 1;
        
        if($id > 0)
        {
            $blogEntryId = $this->blogmodel->updateBlogEntry($data, $id);
            if($tagsIds !== NULL){
                $this->tagmodel->updateBlogEntryTags($blogEntryId, $tagsIds);
            }
        }
        else
        {
            $blogEntryId = $this->blogmodel->insertBlogEntry($data);
            if($tagsIds !== NULL){
                $this->tagmodel->insertBlogEntryTags($blogEntryId, $tagsIds);
            }
        }
    }
    
    public function deleteBlogEntryById(){
        $id = (int)$this->input->post('id');
        $this->blogmodel->deleteBlogEntry($id);
    }
    
    
    public function getTags(){
        if(isLogin()){
            $output = [];
            //$output = $this->tagmodel->getTags4amsify();
            $term = $this->input->post('term');
            $output = $this->tagmodel->getTags4Select2($term);
            header('Content-Type: application/json');
            print(json_encode(['suggestions' => $output]));
        }else{
            print("No logged in");
        }
    }
    
    
    public function getCategory(){
        if(isLogin()){
            $output = [];
            $term = $this->input->post('term');
            $output = $this->categorymodel->getCategories4amsify($term);
            header('Content-Type: application/json');
            print(json_encode(['suggestions' => $output]));
        }else{
            print("No logged in");
        }
    }
}
