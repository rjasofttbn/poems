<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id != Null)
        {
            redirect('super_admin');
        }
    }
    public function index()
    {
        $this->load->view('admin/login');
    }
    
    public function admin_login_check()
    {
       // $data=array();
        $admin_email_address=$this->input->post('admin_email_address',true);
        $password=$this->input->post('password',true);
        
        $this->load->model('admin_model','a_model');
        
       $admin_info = $this->a_model->check_admin_login_info($admin_email_address,$password);
      /* echo '<pre>';
       print_r($admin_info);
       exit();*/
       $sdata=array();
       if($admin_info)
       {
          $sdata['admin_id']=$admin_info->admin_id;
          $sdata['admin_full_name']=$admin_info->admin_full_name;
          $sdata['access_label']=$admin_info->access_label;
          $this->session->set_userdata($sdata);
          redirect('super_admin');
          
       }
       else{
           $sdata['message']='Your User Id Or Password Invalide';
           $this->session->set_userdata($sdata);
           redirect('admin/index');
       }
    }
}
