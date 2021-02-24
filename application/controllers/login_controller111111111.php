<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_controller
 *
 * @author Administrator
 */
class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

// put your code here:
//  This code for checking Email address and password
    // This function for log in check

    public function loginCheck1() {
        $email_address = $this->input->post('email_address', true);
        $password = $this->input->post('password', true);
        $this->load->model('login_model');
        $result = $this->login_model->userLoginCheck($email_address, $password);
        if ($result) {
            $data['first_name'] = $result->first_name;
            $data['last_name'] = $result->last_name;

            $sesData['activation_status'] = $result->activation_status;
            $sesData['admin_info'] = $result->admin_info;
            $sesData['user_id'] = $result->user_id;
            $sesData['first_name'] = $result->first_name;
            $sesData['last_name'] = $result->last_name;
            $this->session->set_userdata($sesData);

            /* this code for view poet name from tbl_user start */
            $user_id = $this->session->userdata('user_id');
            $this->load->model('user_admin_model');
            $data ['manage_poet_name_view'] = $this->user_admin_model->manage_poem_name($user_id);

            /* this code for view poet name from tbl_user end */

            $data['maincontents'] = $this->load->view('manage_poem', $data, true);
            $data['maincontent'] = $this->load->view('manage_poets', $data, true);

            /* this code for view poet name & log out in header start */
            $data['header_log_in_out'] = $this->load->view('log_out_poet', $data, true);
            /* this code for view poet name & log out in header end */

            $this->load->view('home', $data);
        } else {
            $sesData['exception'] = 'Email Or Password Invalide!';
            $this->session->set_userdata($sesData);
            redirect("index");
        }
    }

//    public function loginCheck() {
//        $email_address = $this->input->post('email_address', true);
//        $password = $this->input->post('password', true);
//        $this->load->model('login_model');
//        $result = $this->login_model->check_login_info($email_address, $password);
////        echo '<pre>';
////        print_r($result);
////        exit();
//        $data = array();
//        if ($result) {
//            $data['first_name'] = $result->first_name;
//            $data['last_name'] = $result->last_name;
//
//            $sesData['activation_status'] = $result->activation_status;
//            $sesData['admin_info'] = $result->admin_info;
//            $sesData['user_id'] = $result->user_id;
//            $sesData['first_name'] = $result->first_name;
//            $sesData['last_name'] = $result->last_name;
//            echo '<pre>';
//            print_r($result);
//            exit();
//            $this->session->set_userdata($sesData);
//
//            /* this code for view poet name from tbl_user start */
//            $user_id = $this->session->userdata('user_id');
//            $this->load->model('user_admin_model');
//            $data ['manage_poet_name_view'] = $this->user_admin_model->manage_poem_name($user_id);
//
//            $data ['total_poem'] = $this->user_admin_model->total_poem_manage_poem($user_id);
//            /* this code for view poet name from tbl_user end */
//
//            $data['maincontents'] = $this->load->view('manage_poem', $data, true);
//            $data['maincontent'] = $this->load->view('manage_poets', $data, true);
//
//            /* this code for view poet name & log out in header start */
//            $data['header_log_in_out'] = $this->load->view('log_out_poet', $data, true);
//            /* this code for view poet name & log out in header end */
//            $this->session->set_userdata($data);
//
//            $this->load->view('home', $data);
//        } else {
//            $sesData['exception'] = 'Email Or Password Invalide!';
//            $this->session->set_userdata($sesData);
//
//            redirect("index");
//        }
//    }
    
     public function loginCheck() {
        $email_address = $this->input->post('email_address', true);
        $password = $this->input->post('password', true);

        $this->load->model('login_model');
        $result = $this->login_model->check_login_info($email_address, $password);
//                echo '<pre>';
//        print_r($result);
//        exit();
        $data = array();
        if ($result) {
            $data['first_name'] = $result->first_name;
            $data['last_name'] = $result->last_name;

            $sesData['activation_status'] = $result->activation_status;
            $sesData['admin_info'] = $result->admin_info;
            $sesData['user_id'] = $result->user_id;
            $sesData['first_name'] = $result->first_name;
            $sesData['last_name'] = $result->last_name;
            $this->session->set_userdata($sesData);

            /* this code for view poet name from tbl_user start */
            $user_id = $this->session->userdata('user_id');
            $this->load->model('user_admin_model');
            $data ['manage_poet_name_view'] = $this->user_admin_model->manage_poem_name($user_id);
            
             $data ['total_poem'] = $this->user_admin_model->total_poem_manage_poem($user_id);
            /* this code for view poet name from tbl_user end */

            $data['maincontents'] = $this->load->view('manage_poem', $data, true);
            $data['maincontent'] = $this->load->view('manage_poets', $data, true);

            /* this code for view poet name & log out in header start */
            $data['header_log_in_out'] = $this->load->view('log_out_poet', $data, true);
            /* this code for view poet name & log out in header end */
            $this->session->set_userdata($data);

            $this->load->view('home', $data);
        } else {
            $sesData['exception'] = 'Email Or Password Invalide!';
            $this->session->set_userdata($sesData);


            redirect("index");
        }
    }


    // This function for log out

    public function logout() {

        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('admin_info');
        redirect("index");
    }

//    public function updateUserStatus($user_id) {
////        $this->load->library('encrypt');
//        // echo $user_id.'----';
////        $user_id=$this->encrypt->decode($user_id);
////        
//        // echo '+++'.$user_id;
//        // exit();
//        $this->load->model('login_model');
//        $this->login_model->updateUserStatusValue($user_id);
//        $data = array();
//        $data['maincontent'] = $this->load->view('activation_message', $data, true);
////        $data['right_box_content']=$this->load->view('box_content',$data,true);
//        $this->load->view('home', $data);
//    }
 

}

?>