<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Admin extends CI_Controller {

   

    //put your code here
    public function __construct() {
        parent::__construct();
        $user_id=$this->session->userdata('user_id');
        if($user_id != Null)
        {
            redirect('super_admin');
        }
    }
    public function index()
    {
        $data = array();
        $this->load->view('admin/login');        
    }
    
    

}
