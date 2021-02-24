<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Super_Admin extends CI_Controller {
    /* link with administrator form */

   public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id == Null)
        {
            redirect('admin');
        }
         $this->load->model('super_admin_model','sa_model');
    }
    public function index()
    {
        $data=array();
        $data['admin_maincontent']=$this->load->view('admin/dashbord','',true);
        $this->load->view('admin/admin_master',$data);
    }
    
      /* link with administrator form */

    public function administrators() { /* link with administrator form */
//        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/administrator_message', $data, true);
            $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
            $data['admin_maincontent'] = $this->load->view('administrator/home_administrator', $data, true);
            $data ['admin_maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
            $this->load->view('admin/admin_master',$data);
//        } else {
//            redirect("poems/login");
//        }
    }
    
    public function add_category_form()
    {
        $data=array();
        $data['admin_maincontent']=$this->load->view('admin/add_category','',true);
        $this->load->view('admin/admin_master',$data);
    }
    public function save_category()
    {
        $data=array();
        $data['category_name']=$this->input->post('category_name',true);
        $data['category_description']=$this->input->post('category_description',true);
        $data['publication_status']=$this->input->post('publication_status',true);
        
        $this->sa_model->save_category_info($data);
        
        $sdata=array();
        $sdata['message']='Add Category Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_category_form');
    }
    public function category_manager()
    {
        $data=array();
        $data['all_category']=$this->super_admin_model->select_all_category();
        $data['admin_maincontent']=$this->load->view('admin/manage_category',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function published_category($category_id)
    {
       $this->super_admin_model->published_category_by_id($category_id);
       redirect('super_admin/category_manager');
    }
    public function unpublished_category($category_id)
    {
       $this->super_admin_model->unpublished_category_by_id($category_id);
       redirect('super_admin/category_manager');
    }
    public function delete_category($category_id)
    {
        $this->super_admin_model->delete_category_by_id($category_id);
        redirect('super_admin/category_manager');
    }
    public function edit_category($category_id)
    {
        $data=array();
        $data['category_info']=$this->super_admin_model->select_category_by_id($category_id);
        $data['admin_maincontent']=$this->load->view('admin/edit_category',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function update_category()
    {
        $data=array();
        $data['category_name']=$this->input->post('category_name',true);
        $data['category_description']=$this->input->post('category_description',true);
        $category_id=$this->input->post('category_id',true);
        $this->super_admin_model->update_category_info($data,$category_id);
        redirect('super_admin/category_manager');
    }
    public function add_blog_form()
    {
        $data=array();
        $data['all_published_category']=$this->welcome_model->select_published_category();
        $data['admin_maincontent']=$this->load->view('admin/add_blog',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    public function save_blog()
    {
        $data=array();
        $data['category_id']=$this->input->post('category_id',true);
        $data['blog_title']=$this->input->post('blog_title',true);
        $data['blog_short_description']=$this->input->post('blog_short_description',true);
        $data['blog_long_description']=$this->input->post('blog_long_description',true);
        $data['author_name']=$this->session->userdata('admin_full_name');
        $data['publication_status']=$this->input->post('publication_status',true);
        $this->super_admin_model->save_blog_info($data);
        
        $sdata=array();
        $sdata['message']='Add Blog Information Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_blog_form');
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_full_name');
        $sdata=array();
        $sdata['message']='You Are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('admin');
    }
    
    
    public function administrator() { /* link with administrator form */
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->model('welcome_model');
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/administrator_message', $data, true);
            $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
            $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
            $this->load->view('home', $data);
        } else {
            redirect("poems/login");
        }
    }

    

//    public function logout() {
//
//        /* bottom_poem_category start */
//
//        $this->load->model('welcome_model');
//        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
//
//        $this->session->unset_userdata('user_id');
//        $this->session->unset_userdata('admin_info');
//        $this->session->unset_userdata('email_address');
//        $this->session->unset_userdata('add_id');
//        redirect("index");
//    }

}
