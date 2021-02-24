<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class administrator_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* link with administrator form */

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

    /* link with home administrator form */

    public function home_administrator() { /* link with home administrator form */
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

    /* link with category form */

    public function category_poems() { /* link with category form */
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/category_poem', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* by this function save category. */

    public function save_category() { /* by this function save category. */
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['poems_category_name'] = $this->input->post('poems_category_name', true);
            $data['poems_category_description'] = $this->input->post('poems_category_description', true);
            $data['poems_category_date'] = date("Y-m-d H:i:s");
            $this->load->model('Administrator_Model');
            $this->Administrator_Model->poem_category($data);
            $sesData['message'] = "Save Category Successfully!";
            $this->session->set_userdata($sesData);
            redirect("administrator_controller/category_poems");
        } else {
            redirect("poems/login");
        }
    }

    /* this function for administrator page view */

    public function user_show() { /* this function for administrator page view */
        $data = array();
        $data['user_view'] = $this->administrator_model->user_data_view();

        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/user_show/';
        $result = $this->administrator_model->user_data_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '17';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);
        $data['user_view'] = $this->administrator_model->select_user_For_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        //load the model and get results        

        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/user_show', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for administrator page view */

    public function user_type() { /* this function for administrator page view */
        $data = array();
        $this->load->model('administrator_model');
        $data['user_view'] = $this->administrator_model->user_data_view();
        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/user_type/';
        $result = $this->administrator_model->user_data_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '17';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        //load the model and get results
        $this->load->model('administrator_model');
        $data['user_view'] = $this->administrator_model->select_user_For_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/user_showfor_type', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function search data by text */

    public function search_by_text() { /* this function search data by text */

        if ($this->session->userdata('user_id')) {
            $search_text = $this->input->post('search_text', true);
            $this->load->model('administrator_model');
            $data['user_view'] = $this->administrator_model->search_user_Info($search_text);
            $this->load->model('welcome_model');
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'administrator_controller/search_by_text/';
            $result = $this->administrator_model->search_user_Info($search_text);
            $config['total_rows'] = count($result);
            $config['per_page'] = '17';
            $this->pagination->initialize($config);

            $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/user_show', $data, true);
            $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
            $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
            $this->load->view('home', $data);
        } else {
            redirect("poems/login");
        }
    }

    /* this function search data by text */

    public function user_type_search_by_text() { /* this function search data by text */
        $search_text = $this->input->post('search_text', true);
        $this->load->model('administrator_model');
        $data['user_view'] = $this->administrator_model->search_user_Info($search_text);
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'administrator_controller/search_by_text/';
        $result = $this->administrator_model->search_user_Info($search_text);
        $config['total_rows'] = count($result);
        $config['per_page'] = '17';
        $this->pagination->initialize($config);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/user_showfor_type', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for user control by administrator!--> 

    public function user_control_data_update($user_id) {    //<!--  this code for user control by administrator //
//        if ($this->session->userdata("$user_id")) {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['result'] = $this->administrator_model->selectuser_By_userId($user_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/user_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    //<!-- this code for user control by administrator!--> 

    public function users_type_update($user_id) {    //<!--  this code for user control by administrator //
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['result'] = $this->administrator_model->selectuser_By_userId($user_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/user_type_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this function for poet control!-->   //

    public function user_type_select() {       //<!-- this function for poet control!-->   //
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['user_id'] = $this->input->post('user_id', true);

            $data['user_type'] = $this->input->post('user_type', True);

            $data['user_type_select_date'] = date("Y-m-d H:i:s");
            $this->load->model('welcome_model');
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

            $this->load->model('administrator_model');
            $this->administrator_model->user_type_change($data);
            //$sesData['message'] = "Control User Successfully!";
            // $this->session->set_userdata($sesData);
            redirect("administrator_controller/user_type");
        } else {
            redirect("poems/login");
        }
    }

    //<!-- this function for poet control!-->   //

    public function user_activation_change() {       //<!-- this function for poet control!-->   //
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['user_id'] = $this->input->post('user_id', true);
            $data['activation_status'] = $this->input->post('activation_status', True);
            $this->load->model('administrator_model');
            $this->administrator_model->change_user_activation_data($data);
            //$sesData['message'] = "Control User Successfully!";
            // $this->session->set_userdata($sesData);
            redirect("administrator_controller/user_show");
        } else {
            redirect("poems/login");
        }
    }

    /* this function for home poem of day */

    public function home_poem_of_day() { /* this function for home poem of day */
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/home_poem_of_day', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for poem show */

    public function poem_show() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->poem_data_view();

        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/poem_show/';
        $result = $this->administrator_model->poem_data_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '17';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_For_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poems_show', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for poem show */

    public function poem_select_for_day() {
        $data = array();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['poem_view'] = $this->administrator_model->select_poem_day_admin();
        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/poem_select_for_day/';
        $result = $this->administrator_model->select_poem_day_admin();
        $config['total_rows'] = count($result);
        $config['per_page'] = '3';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results

        $data['poem_day_pagination'] = $this->administrator_model->select_poem_day_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poems_select_for_day', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for poem show */

    public function poem_select_for_member() {
        $data = array();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['poem_view'] = $this->administrator_model->select_poem_member_admin();
       
        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/poem_select_for_member/';
        $result = $this->administrator_model->select_poem_member_admin();
        $config['total_rows'] = count($result);
        $config['per_page'] = '3';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results

        $data['poem_view'] = $this->administrator_model->select_poem_member_admin_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poems_select_for_day_member', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function select_last_fiften_poem_of_day() {
        $data = array();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['fiften_poem_of_day'] = $this->administrator_model->select_fiften_poem_of_day();

        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/select_last_fiften_poem_of_day/';
        $result = $this->administrator_model->select_fiften_poem_of_day();
        $config['total_rows'] = count($result);
        $config['per_page'] = '7';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results

        $data['selected_poem_day'] = $this->administrator_model->select_fiften_poem_day_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */

        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/last_fiften_poem_of_day', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* which poem allready selected */

    public function selected_poem_of_day_member() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['fiften_poem_of_day'] = $this->administrator_model->selected_poem_day_member();

        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/selected_poem_of_day_member/';
        $result = $this->administrator_model->selected_poem_day_member();
        $config['total_rows'] = count($result);
        $config['per_page'] = '2';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results
        $this->load->model('administrator_model');
        $data['selected_poem_day_member'] = $this->administrator_model->select_poem_day_member_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */

        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/selected_poem_of_day_member', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for poem show */

    public function poem_select_for_month() {
        $data = array();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['last_poem_of_month'] = $this->administrator_model->select_last_poem_month();
        $data['poem_view'] = $this->administrator_model->select_poem_month_admin();
        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/poem_select_for_month/';
        $result = $this->administrator_model->select_poem_month_admin();
        $config['total_rows'] = count($result);
        $config['per_page'] = '5';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results

        $data['poem_view'] = $this->administrator_model->select_poem_month_admin_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poems_select_for_month', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* which poem allready selected */

    public function selected_poem_of_month() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['fiften_poem_of_day'] = $this->administrator_model->selected_poem_month();

        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/selected_poem_of_month/';
        $result = $this->administrator_model->selected_poem_month();
        $config['total_rows'] = count($result);
        $config['per_page'] = '3';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results
        $this->load->model('administrator_model');
        $data['last_fiften_poem'] = $this->administrator_model->select_poem_month_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */

        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/selected_poem_of_month', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_control_data_detail($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->poem_detail_for_admin($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_admin', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_of_day_select($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_of_day($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_day', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_of_day_select_for_update($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_of_day($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_day_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for update poem of the day update !-->   //

    public function poem_of_day_data_update() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['poem_of_day_display_date'] = $this->input->post('poem_of_day_display_date', true);
        $data['poem_of_day_selection_date'] = $date_time->format('Y-m-d H:i:s');

//        $poem_id = $this->administrator_model->poem_of_day_data_update_model($data);
//        $data['poem_id'] = $data['poem_id'];
//        echo '<script>alert("Poem of the day is successfully update!");</script>';
//        redirect('administrator_controller/poem_of_day_select_for_update/' . $data['poem_id'], 'refresh');

        /* check Duplicate display date */
        if (!$this->welcome_model->check_duplicate_poem_of_day_display_date($data['poem_of_day_display_date'])) {
            $poem_id = $this->administrator_model->poem_of_day_data_update_model($data);
            $data['poem_id'] = $data['poem_id'];
            if ($data > 0) {
                echo '<script>alert("Poem of the day is successfully update");</script>';
                redirect('administrator_controller/poem_of_day_select/' . $data['poem_id'], 'refresh');
            }
        } else {
            echo '<script>alert("This date already selected!");</script>';
            redirect('administrator_controller/poem_of_day_select/' . $data['poem_id'], 'refresh');
        }
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_of_member_select($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_of_day_member($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_member', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_of_member_select_for_update($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_of_day_member($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_member_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for update poem!-->   //

    public function poem_of_day_member_data_update() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
//        $data['poem_day_member'] = 'podm';
//        $data['poem_of_day_date'] = $date_time->format('Y-m-d H:i:s');
        $data['poem_day_member_display_date'] = $this->input->post('poem_day_member_display_date', true);
        $data['poem_of_day_member_selection_date'] = $date_time->format('Y-m-d H:i:s');

        /* check Duplicate display date */
        if (!$this->administrator_model->check_duplicate_poem_of_day_member_display_date($data['poem_day_member_display_date'])) {
            $poem_id = $this->administrator_model->poem_of_day_member_data_update_model($data);
            $data['poem_id'] = $data['poem_id'];
            if ($data > 0) {
                echo '<script>alert("Poem of the day member successfully update!");</script>';
                redirect('administrator_controller/poem_of_member_select/' . $data['poem_id'], 'refresh');
            }
        } else {
            echo '<script>alert("This date already selected!");</script>';
            redirect('administrator_controller/poem_of_member_select_for_update/' . $data['poem_id'], 'refresh');
        }
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_of_month_select($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_of_day_month($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_month', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem control data detail !--> 

    public function poem_of_month_select_for_update($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_of_day_month($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_detail_for_month_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for update poem!-->   //

    public function poem_of_month_data_update() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['poem_of_month'] = 'pom';
//        $data['poem_of_day_date'] = $date_time->format('Y-m-d H:i:s');
        $data['poem_month_display_date'] = $this->input->post('poem_month_display_date', true);
        $data['poem_of_month_selection_date'] = $date_time->format('Y-m-d H:i:s');
//        echo '<pre>';
//        print_r($data);
//        exit();
        /* check Duplicate display date */
        if (!$this->welcome_model->check_duplicate_poem_of_month_display_date($data['poem_month_display_date'])) {
            $poem_id = $this->administrator_model->poem_of_month_update_model($data);
            $data['poem_id'] = $data['poem_id'];
            if ($data > 0) {
                echo '<script>alert("Poem of the month successfully update!");</script>';
                redirect('administrator_controller/poem_of_month_select_for_update/' . $data['poem_id'], 'refresh');
            }
        } else {
            echo '<script>alert("This date already selected!");</script>';
            redirect('administrator_controller/poem_of_month_select_for_update/' . $data['poem_id'], 'refresh');
        }
    }

    /* this function for poem trending */

    public function poem_select_for_tranding($poem_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->poem_select_for_tranding($poem_id);
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/poem_trending', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* which poem allready selected */

    public function selected_trending_poems() {
        $data = array();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['all_trending_poems'] = $this->administrator_model->selected_trending_poems_model();

        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/selected_trending_poems/';
        $result = $this->administrator_model->selected_trending_poems_model();
        $config['total_rows'] = count($result);
        $config['per_page'] = '3';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results

        $data['all_trending_poems_Pagination'] = $this->administrator_model->selected_trending_poems_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */

        $data ['home_insert_update'] = $this->load->view('administrator/selected_trending_poems', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for delete poem !-->   //

    public function delete_trending_data($poem_id) {  //<!-- this code for delete poem !-->   //
        // echo $contact_id;
        $this->administrator_model->delete_trendig_value($poem_id);

        redirect('administrator_controller/selected_trending_poems');
//        $data ['home_insert_update'] = $this->load->view('administrator/selected_trending_poems', $data, true);
//        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
//        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
//        $this->load->view('home', $data);
    }

    //<!-- this function for poem activation  !-->   //

    public function poem_activation_change() {    //<!-- this function for poem activation  !-->   //
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->model('welcome_model');
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $data['poem_id'] = $this->input->post('poem_id', true);
            //$data['title'] = $this->input->post('title', True);
            //$data['body'] = $this->input->post('body', True);
            $data['poem_activation'] = $this->input->post('poem_activation', True);
            $data['poem_activation_date'] = date("Y-m-d");
            $this->load->model('administrator_model');
            $this->administrator_model->change_poem_activation_data($data);
            //$sesData['message'] = "Control Poem Successfully!";
            //$this->session->set_userdata($sesData);
            redirect("administrator_controller/poem_show");
        } else {
            redirect("poems/login");
        }
    }

    /* this function for advertise page calling */

    public function add_in_application() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $data['home_add_second'] = $this->welcome_model->home_second_add();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/add_application', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* this function for advertise page calling */

    public function add_in_poets_page() {
        $data = array();
        $add_id = $this->session->userdata('add_id');
        $this->load->model('administrator_model');
        $data['poets_add'] = $this->administrator_model->select_poet_first_add();
        //$data['second_add'] = $this->administrator_model->select_second_add();
        $data['poets_second_add'] = $this->administrator_model->select_poet_second_add();
        $this->load->model('welcome_model');
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/add_application_poets_page', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poets_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* this function for advertise page calling */

    public function add_in_poem_page() {
        $data = array();
        $add_id = $this->session->userdata('add_id');
        $this->load->model('administrator_model');
        $data['first_add'] = $this->administrator_model->select_first_add();

        //$data['second_add'] = $this->administrator_model->select_second_add();
        $data['second_add'] = $this->administrator_model->select_second_add();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/add_application_poem_page', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* home poem day update */

    public function home_poem_day_update() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/home_poem_of_day_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* home poem day member update */

    public function home_poem_day_member_update() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/home_poem_day_member_update', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* home poem month update */

    public function home_poem_month_update() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['home_insert_update'] = $this->load->view('administrator/home_insert_update/home_poem_month_update', $data, true);
        $data ['administrator_content'] = $this->load->view('administrator/home_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* link with administrator form */

    public function poets_administrator() { /* link with administrator form */
//        if ($this->session->userdata($user_id)) {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poets_add'] = $this->administrator_model->select_poet_first_add();

        //$data['second_add'] = $this->administrator_model->select_second_add();
        $data['poets_second_add'] = $this->administrator_model->select_poet_second_add();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/add_application_poets_page', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poets_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    public function poems_administrator() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['first_add'] = $this->administrator_model->select_first_add();
        $data['second_add'] = $this->administrator_model->select_second_add();
        $data['home_insert_update'] = $this->load->view('administrator/home_insert_update/add_application_poem_page', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    public function poem_view_for_tranding() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('administrator_model');
        $data['poem_view'] = $this->administrator_model->select_poem_for_trending();
        //Pagination start
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'administrator_controller/poem_view_for_tranding/';
        $result = $this->administrator_model->select_poem_for_trending();
        $config['total_rows'] = count($result);
        $config['per_page'] = '3';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results
        $this->load->model('administrator_model');
        $data['trending_poem_paginate'] = $this->administrator_model->select_poem_for_trending_Pagination($config['per_page'], $this->uri->segment(3));

        //Pagination end */
        $data['home_insert_update'] = $this->load->view('administrator/poems_view_for_tranding', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poems_administrator', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* link with administrator poetry contest */

    public function poetry_contest_administrator() {
        $data = array();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['contest_first_add'] = $this->add_model->contest_first_add();
        $data ['contest_second_add'] = $this->add_model->contest_second_add();
        $data['poetry_contest'] = $this->load->view('administrator/poetry_contest_add', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poetry_contest_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* link with administrator poetry contest */

    public function poetry_contest_add() {
        $data = array();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['contest_first_add'] = $this->add_model->contest_first_add();
        $data ['contest_second_add'] = $this->add_model->contest_second_add();
        $data['poetry_contest'] = $this->load->view('administrator/poetry_contest_add', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poetry_contest_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
    }

    /* this function for administrator page view */

    public function poetry_contest_page() { /* this function for administrator page view */
        $data = array();
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['contest_first_add'] = $this->add_model->contest_first_add();
        $data ['contest_second_add'] = $this->add_model->contest_second_add();
        $data ['poetry_contest'] = $this->load->view('administrator/poetry_contest_date_page', $data, true);
        $data['administrator_content'] = $this->load->view('administrator/poetry_contest_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for administrator page view */

    public function selected_poetry_contest() { /* this function for administrator page view */
        $data = array();
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['contest_first_add'] = $this->add_model->contest_first_add();
        $data ['contest_second_add'] = $this->add_model->contest_second_add();
        $data ['selected_poetry_contest'] = $this->administrator_model->select_poetry_contest_date();
        $data ['poetry_contest'] = $this->load->view('administrator/selected_poetry_contest_date', $data, true);
        $data ['administrator_content'] = $this->load->view('administrator/poetry_contest_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem control data detail !--> 

    public function selected_poetry_contest_edit($poetry_contest_id) {    //<!-- this code for poem control data detail !--> 
        $data = array();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['contest_edit'] = $this->administrator_model->poetry_contest_edit($poetry_contest_id);
        $data ['poetry_contest'] = $this->load->view('administrator/detail_poetry_contest', $data, true);
        $data ['administrator_content'] = $this->load->view('administrator/poetry_contest_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for update poem!-->   //

    public function poetry_contest_data_update() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poetry_contest_id'] = $this->input->post('poetry_contest_id', true);

        $data['poetry_contest_from_date_to_date'] = $this->input->post('poetry_contest_from_date_to_date', true);
        $data['poetry_contest_end_date'] = $this->input->post('poetry_contest_end_date', true);
        
//        echo '<pre>';
//        print_r($data);
//        exit();

        $poem_id = $this->administrator_model->poetry_contest_update_model($data);
        redirect('administrator_controller/selected_poetry_contest_edit/' . $data['poetry_contest_id'], 'refresh');

        /* check Duplicate display date */
//        if (!$this->welcome_model->check_duplicate_poem_of_month_display_date($data['poem_month_display_date'])) {
//            $poem_id = $this->administrator_model->poetry_contest_update_model($data);
//            $data['poem_id'] = $data['poem_id'];
//            if ($data > 0) {
//                echo '<script>alert("Poem of the month successfully update!");</script>';
//                redirect('administrator_controller/poem_of_month_select_for_update/' . $data['poem_id'], 'refresh');
//            }
//        } else {
//            echo '<script>alert("This date already selected!");</script>';
//            redirect('administrator_controller/poem_of_month_select_for_update/' . $data['poem_id'], 'refresh');
    }

    /* this function for administrator page view */

    public function selected_poetry_contest_update() { /* this function for administrator page view */
        $data = array();
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['contest_first_add'] = $this->add_model->contest_first_add();
        $data ['contest_second_add'] = $this->add_model->contest_second_add();
        $data ['selected_poetry_contest'] = $this->administrator_model->select_poetry_contest_date();
        $data ['poetry_contest'] = $this->load->view('administrator/selected_poetry_contest_date', $data, true);
        $data ['administrator_content'] = $this->load->view('administrator/poetry_contest_administrator', $data, true);
        $data ['maincontent'] = $this->load->view('administrator/administrator', $data, TRUE);
        $this->load->view('home', $data);
    }

    //<!-- this code for update poem of the day update !-->   //

    public function save_contest_date() {   //<!-- this code for update poem!-->   //
        $data = array();
        $this->load->helper('security');
        $data['poetry_contest_from_date_to_date'] = $this->input->post('poetry_contest_from_date_to_date', true);
        $data['poetry_contest_end_date'] = $this->input->post('poetry_contest_end_date', true);

//        echo '<pre>';
//        print_r($data);
//        exit();
        $poetry_contest_id = $this->administrator_model->poetry_contest_insert($data);
        redirect('administrator_controller/poetry_contest_page/', 'refresh');
        /* check Duplicate display date */
//        if (!$this->welcome_model->check_duplicate_poem_of_day_display_date($data['poem_of_day_display_date'])) {
//        $poetry_contest_id = $this->administrator_model->poetry_contest_insert($data);
//            $data['poem_id'] = $data['poem_id'];
//            if ($data > 0) {
//                echo '<script>alert("Poem of the day is successfully update");</script>';
//                redirect('administrator_controller/poem_of_day_select/' . $data['poem_id'], 'refresh');
//            }
//        } else {
//            echo '<script>alert("This date already selected!");</script>';
//            redirect('administrator_controller/poem_of_day_select/' . $data['poem_id'], 'refresh');
//        }
    }

    /*  link with administrator manage poem  */

    public function manage_poems_administrator() {
//        if ($this->session->userdata($user_id)){
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['administrator_content'] = $this->load->view('administrator/manage_poem_administrator.php', $data, true);
        $data['maincontent'] = $this->load->view('administrator/administrator', $data, true);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    /* this code for advertise insert */

    public function advertise_insert() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->helper('security');
            $data['add_name'] = $this->input->post('add_name', true);

            if ($_FILES['home_add_image']['name'] && $_FILES['home_add_image']['size']) {
                $result = $this->add_imageUpload('home_add_image');
                if ($result) {
                    if ($result['file_name']) {
                        $data['home_add_image'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
            }

            $this->load->model('add_Model');
            $this->add_Model->update_poem_page_first_add($data);
            $sesData['message'] = "Save Advertise Successfully!";
            $this->session->set_userdata($sesData);
            redirect("administrator_controller/add_in_application");
        } else {
            redirect("poems/login");
        }
        //<!-- this code for Image upload end !-->   //
    }

    /* image upload */

    public function add_imageUpload($fieldName) { /* image upload */
        $config['upload_path'] = 'images/advertise/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '967';
        $config['max_height'] = '200';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();
            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
            $err = '';
            //removing the error as image upload is not required
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }
    }

    /* un_useable code insert */

    public function home_poem_day() { /* un_useable code insert */
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->helper('security');
        $data['poem_day_poem_name'] = $this->input->post('poem_day_poem_name', true);
        $data['poem_day_poem_poet_name'] = $this->input->post('poem_day_poem_poet_name', true);
        $data['poem_day_gender'] = $this->input->post('poem_day_gender', true);
        $data['poem_day_poem'] = $this->input->post('poem_day_poem', true);
        $data['view_status'] = '0';
        if ($_FILES['poem_day_poet_picture']['name'] && $_FILES['poem_day_poet_picture']['size']) {
            $result = $this->imageUpload('poem_day_poet_picture');
            if ($result) {
                if ($result['file_name']) {
                    $data['poem_day_poet_picture'] = $result['file_name'];
                } else {
                    $errors = $result['error'];
                }
            }
        }
        $this->load->model('Administrator_Model');
        $this->Administrator_Model->poem_of_day($data);
        $sesData['message'] = "Save poem of day Successfully!";
        $this->session->set_userdata($sesData);
        redirect("administrator_controller/home_poem_of_day");
    }

    /* image upload */

    public function imageUpload($fieldName) { /* image upload */
        $config['upload_path'] = 'images/home_poem_day_image/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '50';
        $config['max_height'] = '50';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();
            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
            $err = '';
            //removing the error as image upload is not required
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }

        /* un_useable code insert end */
    }

    //Image upload and update_small_picture
    public function poem_page_add_first() {        //Image upload and update_small_picture
        if ($this->session->userdata('user_id')) {
            $data = array();
            //$data['add_id'] = $this->input->post('add_id', true);
            $data['add_name'] = $this->input->post('add_name', true);
            if ($_FILES['poem_page_add_first']['name'] && $_FILES['poem_page_add_first']['size']) {
                $result = $this->poem_page_add_Upload('poem_page_add_first');
                if ($result) {
                    if ($result['file_name']) {
                        $data['poem_page_add_first'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
                $this->load->model('add_Model');
                $this->add_Model->update_poem_page_add($data);
                $sesData['message'] = "Post Add Successfully!";
                $this->session->set_userdata($sesData);
                redirect("administrator_controller/add_in_poem_page");
            }
        } else {
            redirect("poems/login");
        }
        //<!-- this code for Image upload end !-->   //
    }

    public function poem_page_add_Upload($fieldName) {
        $config['upload_path'] = 'images/advertise/poem_page/first_add/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '276px';
        $config['max_height'] = '250px';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();

            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
            $err = '';
//removing the error as image upload is not required
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }
    }

    //Image upload and update_small_picture
    public function poets_page_add_first() {        //Image upload and update_small_picture
        if ($this->session->userdata('user_id')) {
            $data = array();
            //$data['add_id'] = $this->input->post('add_id', true);
            $data['add_name'] = $this->input->post('add_name', true);
            if ($_FILES['poets_page_first_add']['name'] && $_FILES['poets_page_first_add']['size']) {
                $result = $this->poets_page_add_Upload('poets_page_first_add');
                if ($result) {
                    if ($result['file_name']) {
                        $data['poets_page_first_add'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
                $this->load->model('add_Model');
                $this->add_Model->update_poets_page_first_add($data);
                $sesData['message'] = "Post Add Successfully!";
                $this->session->set_userdata($sesData);
                redirect("administrator_controller/add_in_poets_page");
            }
        } else {
            redirect("poems/login");
        }
        //<!-- this code for Image upload end !-->   //
    }

    public function poets_page_add_Upload($fieldName) {
        $config['upload_path'] = 'images/advertise/poets_page/first_add/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '276px';
        $config['max_height'] = '250px';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();

            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
            $err = '';
//removing the error as image upload is not required
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }
    }

    public function search_poet_poems() {

//         if ($this->session->userdata('user_id')) {
//        $user_id = $this->session->userdata('user_id');
//        if ($this->session->userdata('user_id')) {

        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $search_text = $this->input->post('search_text', true);
        $user_id = $this->session->userdata('user_id');
        $this->load->model('administrator_model');
        $data['result'] = $this->administrator_model->search_poet_poem($search_text);
        $data['maincontent'] = $this->load->view('poet_poem', $data, true);
        $this->load->view('home', $data);
//        } else {
//            redirect("welcome/index");
//        }
    }

    //Image upload and update_small_picture

    public function small_add_insert() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['add_name'] = $this->input->post('add_name', true);
            if ($_FILES['home_add_small']['name'] && $_FILES['home_add_small']['size']) {
                $result = $this->second_add_home('home_add_small');
                if ($result) {
                    if ($result['file_name']) {
                        $data['home_add_small'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
                $this->load->model('add_Model');
                $this->add_Model->update_small_home_add($data);
                $sesData['message'] = "Post Add Successfully!";
                $this->session->set_userdata($sesData);
                redirect("administrator_controller/add_in_application");
            }
        } else {
            redirect("poems/login");
        }
    }

    public function small_add_home($fieldName) {
        $config['upload_path'] = 'images/advertise/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '297px';
        $config['max_height'] = '295px';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();
            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
            $err = '';
            //removing the error as image upload is not required
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }
    }

    //Image upload and update_small_picture

    public function second_add_insert_home() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['add_name'] = $this->input->post('add_name', true);
            ////////////////////////////////////////////////
            if ($_FILES['second_add_home']['name'] && $_FILES['second_add_home']['size']) {
                $result = $this->second_add_home('second_add_home');
                if ($result) {
                    if ($result['file_name']) {
                        $data['second_add_home'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
                $this->load->model('add_Model');
                $this->add_Model->update_second_add_home($data);
                $sesData['message'] = "Post Add Successfully!";
                $this->session->set_userdata($sesData);
                redirect("administrator_controller/add_in_application");
            }
        } else {
            redirect("poems/login");
        }
        //<!-- this code for Image upload end !-->   //
    }

    public function second_add_home($fieldName) {
        $config['upload_path'] = 'images/advertise/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '525px';
        $config['max_height'] = '260px';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldName)) {
            $data = $this->upload->data();

            $fileName = $config['upload_path'] . $data['file_name'];
            $return = array('file_name' => $fileName, 'error' => '');
            return $return;
        } else {
            $err = '';
            //removing the error as image upload is not required
            $err = $this->upload->display_errors();
            $return = array('file_name' => '', 'error' => $err);
            return $return;
        }
    }

    //<!-- this code for update poem!-->   //

    public function poem_of_day_data_insert() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['poem_of_day'] = 'pod';
//        $data['poem_of_day_date'] = $date_time->format('Y-m-d H:i:s');
        $data['poem_of_day_display_date'] = $this->input->post('poem_of_day_display_date', true);
        $data['poem_of_day_selection_date'] = $date_time->format('Y-m-d H:i:s');

        /* check Duplicate display date */
        if (!$this->welcome_model->check_duplicate_poem_of_day_display_date($data['poem_of_day_display_date'])) {
            $poem_id = $this->administrator_model->poem_of_day_data_insert_model($data);
            $data['poem_id'] = $data['poem_id'];
            if ($data > 0) {
                echo '<script>alert("The poem is successfully selected!");</script>';
                redirect('administrator_controller/poem_of_day_select/' . $data['poem_id'], 'refresh');
            }
        } else {
            echo '<script>alert("This date already selected!");</script>';
            redirect('administrator_controller/poem_of_day_select/' . $data['poem_id'], 'refresh');
        }
    }

    //<!-- this code for update poem!-->   //

    public function poem_of_day_member_data_insert() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['poem_day_member'] = 'podm';
//        $data['poem_of_day_date'] = $date_time->format('Y-m-d H:i:s');
        $data['poem_day_member_display_date'] = $this->input->post('poem_day_member_display_date', true);
        $data['poem_of_day_member_selection_date'] = $date_time->format('Y-m-d H:i:s');

        /* check Duplicate display date */
        if (!$this->administrator_model->check_duplicate_poem_of_day_member_display_date($data['poem_day_member_display_date'])) {
            $poem_id = $this->administrator_model->poem_of_day_member_data_insert_model($data);
            $data['poem_id'] = $data['poem_id'];
            if ($data > 0) {
                echo '<script>alert("Poem of the day member successfully selected!");</script>';
                redirect('administrator_controller/poem_of_member_select/' . $data['poem_id'], 'refresh');
            }
        } else {
            echo '<script>alert("This date already selected!");</script>';
            redirect('administrator_controller/poem_of_member_select/' . $data['poem_id'], 'refresh');
        }
    }

    //<!-- this code for update poem!-->   //

    public function poem_of_month_data_insert() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['poem_of_month'] = 'pom';
//        $data['poem_of_day_date'] = $date_time->format('Y-m-d H:i:s');
        $data['poem_month_display_date'] = $this->input->post('poem_month_display_date', true);
        $data['poem_of_month_selection_date'] = $date_time->format('Y-m-d H:i:s');

        /* check Duplicate display date */
        if (!$this->welcome_model->check_duplicate_poem_of_month_display_date($data['poem_month_display_date'])) {
            $poem_id = $this->administrator_model->poem_of_month_insert_model($data);
            $data['poem_id'] = $data['poem_id'];
            if ($data > 0) {
                echo '<script>alert("Poem of the month successfully selected!");</script>';
                redirect('administrator_controller/poem_of_month_select/' . $data['poem_id'], 'refresh');
            }
        } else {
            echo '<script>alert("This date already selected!");</script>';
            redirect('administrator_controller/poem_of_month_select/' . $data['poem_id'], 'refresh');
        }
    }

    //<!-- this code for update poem!-->   //

    public function trending_data_insert() {   //<!-- this code for update poem!-->   //
        date_default_timezone_set('Europe/London');
        //Other variables defined also
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $date_time = new DateTime();
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
//      $data['poem_of_day'] = $this->input->post('poem_of_day', True);
        $data['trending'] = 'tre';
        $data['trending_date'] = $date_time->format('Y-m-d H:i:s a');
        $this->load->model('administrator_model');
        $this->administrator_model->poem_trending_data_insert_model($data);
//      $sesData['message_poem_update'] = "Update poem Successfully!";
//      $this->session->set_userdata($sesData);
        redirect("user_admin_controller/all_trending_poem_view/");
    }

}
