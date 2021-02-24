<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class poems extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* by this function login page will be view */

    public function login() {

        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['maincontent'] = $this->load->view('login', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* by this function manage poem page will be view */

    public function managepoem() {
//        if ($this->session->userdata($user_id)){
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        /* this code for view poet name from tbl_user start */
        $data ['manage_poet_name_view'] = $this->user_admin_model->manage_poem_name($user_id);
        /* this code for view poet name from tbl_user start */
        /*  total poem view */

        $data ['total_poem'] = $this->user_admin_model->total_poem_manage_poem($user_id);
        $data['wellcome'] = $this->load->view('manage_poem', $data, true);
        $data['maincontents'] = $this->load->view('manage_poem', $data, true);
        $data['maincontent'] = $this->load->view('manage_poets', $data, true);
        /* this code for view poet name & log out in header start */
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    /* by this function poet personal info page will be view */

    public function poet_personal_info($poets_id) { /* by this function poet personal info page will be view */

        $data = array();
        $this->load->helper('security');
        $biography = $this->session->userdata('biography');
//      $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $this->load->model('welcome_model');
        $data['result_famous_poets'] = $this->welcome_model->famous_poets();

        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();

        /* this code for view poet personal detail from tbl_user start */
        $data ['poet_personal_detail'] = $this->user_admin_model->poet_personal_data_view($poets_id);
        /* this code for view poet personal detail from tbl_user start */

        $this->user_admin_model->delete_rank();
        $this->user_admin_model->create_table_rank();
        $this->user_admin_model->insert_rank_data();

        /* this code for view poet rank */
        $data['poet_rank_result'] = $this->user_admin_model->poet_rank($poets_id);

        $data['total_top_poet'] = $this->user_admin_model->total_poet_in_rank();
        /* this code for view total poet */
//        $data['famous_poet_total'] = $this->welcome_model->total_famous_poet();

        /* this code for total vote, total comments, submit date view from tbl_user/comments/vote start */

        $data['poet_poem_vote'] = $this->user_admin_model->poet_personal_poem_votes($poets_id);
        $data['poet_poem_comments_count'] = $this->user_admin_model->poet_poem_comments_count($poets_id);
        $data['sign_up_date'] = $this->user_admin_model->sign_up_date($poets_id);
        /* this code for total vote, total comments, submit date view end */


        /* this code for view picture from tbl_user start */


        $data ['poet_picture'] = $this->user_admin_model->poet_picture($poets_id);
        /* this code for view picture from tbl_user end */

        /* this code for view individual poem from tbl_poems start */

        $data['poet_details'] = $this->user_admin_model->selectuserId_poet_info($poets_id);
        /* this code for view individual poem from tbl_poems end */

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['user_id'] = $poets_id;
        $data['poets_details'] = $this->load->view('view_user_admin/poets_info/poets_data', $data, true);
        $data ['maincontent'] = $this->load->view('view_user_admin/poets_info/poet_personal_info', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function personal_poem_page_data($user_id) { /* by this function poet all info view */
        $data = array();
//        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');

        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();

        $this->load->model('welcome_model');
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        /* this code for view poet personal detail from tbl_user start */
        $data ['poet_personal_detail'] = $this->user_admin_model->poet_personal_data_view($user_id);



        /* poet rank */
        /* this code for view poet rank */
        $data['poet_rank_result'] = $this->user_admin_model->poet_rank($user_id);

        $data['total_top_poet'] = $this->user_admin_model->total_poet_in_rank();



        /* this code for view poet personal detail from tbl_user start */



        $data['user_id'] = $user_id;
        /* this code for view picture from tbl_user start */
        $data ['poet_picture'] = $this->user_admin_model->poet_picture($user_id);
        /* this code for view picture from tbl_user end */

        $data['poets_poem'] = $this->user_admin_model->personal_page_data_poem($user_id);

        $data['poets_details'] = $this->load->view('view_user_admin/poets_info/poets_poem', $data, true);
        $data ['maincontent'] = $this->load->view('view_user_admin/poets_info/poet_personal_info', $data, TRUE);
        $this->load->view('home', $data);
    }

//    public function personal_poem_page_data($user_id) { /* by this function poet all info view */
//        $data = array();
//       
//        $data['first_add_home'] = $this->welcome_model->first_add_home();     
//
//        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
//        /* this code for view poet personal detail from tbl_user start */
//        $data ['poet_personal_detail'] = $this->user_admin_model->poet_personal_data_view($user_id);
//        /* this code for view poet personal detail from tbl_user start */
//
//        $data['user_id'] = $user_id;
//        /* this code for view picture from tbl_user start */
//        $data ['poet_picture'] = $this->user_admin_model->poet_picture($user_id);
//        /* this code for view picture from tbl_user end */
//        
//        /*tbl_poems data view*/
//        
////        $this->load->library('pagination');
////        $config = array();
////        $config['base_url'] = base_url() . 'poems/personal_poem_page_data/';
////        $result = $this->user_admin_model->personal_page_data_poem($user_id);
////        $config['total_rows'] = count($result);
////        $config['per_page'] = '9';
////        $config['full_tag_open'] = '<p>';
////        $config['full_tag_close'] = '</p>';
////        $this->pagination->initialize($config);
////
////        //load the model and get results        
////        $data['result'] = $this->user_admin_model->select_poem_For_poet_page_Pagination($config,$user_id,['per_page'], $this->uri->segment(3));
//        //Pagination end */
//        
//        
//        $data['poets_poem'] = $this->user_admin_model->personal_page_data_poem($user_id);
//
//        $data['poets_details'] = $this->load->view('view_user_admin/poets_info/poets_poem', $data, true);
//        $data ['maincontent'] = $this->load->view('view_user_admin/poets_info/poet_personal_info', $data, TRUE);
//        $this->load->view('home', $data);
//    }

    public function poet_comments_insert() {
        if ($this->session->userdata('user_id')) {

            $data = array();
            $user_id = $this->session->userdata('user_id');

            $data ['poets_id'] = $this->input->post('poets_id', true);

            $data['user_id'] = $user_id;

            $data ['comments_poet'] = $this->input->post('comments_poet', true);

//            $this->load->model('welcome_model');
//
//            /* bottom_poem_category */
//
//            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

            $this->load->model('user_admin_model');
            $this->user_admin_model->poet_comments_insert($data);

            //            $sdata = array();
//            $sdata['message'] = 'Your Comment Successfully Post and Weating For Approval !';
//            $this->session->set_userdata($sdata);
//            echo '<pre>';
//            print_r($data);
//            exit();
            redirect('poems/poets_personal_comments/' . $data['user_id']);


//            redirect("user_admin_controller/message_poem_comments");
        } else {
            redirect("poems/login");
        }
    }

    /* by this function poet personal comments view */

    public function poets_personal_comments($poets_id) {

        $data = array();
        $this->load->helper('security');
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();

        $this->load->model('user_admin_model');
        /* this code for view poet personal detail from tbl_user start */
        $data ['poet_personal_detail'] = $this->user_admin_model->poet_personal_data_view($poets_id);
        /* this code for view poet personal detail from tbl_user start */

        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectusersByuserId($poets_id);



        /* poet rank */
        /* this code for view poet rank */
        $data['poet_rank_result'] = $this->user_admin_model->poet_rank($poets_id);

        $data['total_top_poet'] = $this->user_admin_model->total_poet_in_rank();
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['user_id'] = $poets_id;
        /* this code for view picture from tbl_user start */
        $data ['poet_picture'] = $this->user_admin_model->poet_picture($poets_id);
        /* this code for view picture from tbl_user end */
        $data['poet_comments'] = $this->user_admin_model->personal_page_poet_comments($poets_id);
        $data['poets_details'] = $this->load->view('view_user_admin/poets_info/poets_comments', $data, true);
        $data ['maincontent'] = $this->load->view('view_user_admin/poets_info/poet_personal_info', $data, true);
        $this->load->view('home', $data);
    }

    /* by this function poet personal info page will be view */

    public function poet_personal_info_log_in() { /* by this function poet personal info page will be view */

        $data = array();
        $this->load->helper('security');
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');

        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();

        /* this code for view poet personal detail from tbl_user start */
        $data ['poet_personal_detail'] = $this->user_admin_model->poet_personal_data_view($user_id);
        /* this code for view poet personal detail from tbl_user start */
        /* this code for total vote, total comments, submit date view from tbl_user/comments/vote start */
        $this->load->model('user_admin_model');
        $data['poet_poem_vote'] = $this->user_admin_model->poet_personal_poem_votes($user_id);
        $data['poet_poem_comments_count'] = $this->user_admin_model->poet_poem_comments_count($user_id);
        $data['sign_up_date'] = $this->user_admin_model->sign_up_date($user_id);
        /* this code for total vote, total comments, submit date view end */
        /* this code for view poet rank */
        $data['poet_rank_result'] = $this->user_admin_model->poet_rank($user_id);

        $data['total_top_poet'] = $this->user_admin_model->total_poet_in_rank();


        $this->load->model('welcome_model');

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        /* this code for view picture from tbl_user start */
        $this->load->model('user_admin_model');
        $data ['poet_picture'] = $this->user_admin_model->poet_picture($user_id);
        /* this code for view picture from tbl_user end */

        /* this code for view individual poem from tbl_poems start */
        $this->load->model('user_admin_model');
        $data['poet_details'] = $this->user_admin_model->selectuserId_poet_info($user_id);

        $data['user_id'] = $user_id;
        $data['poets_details'] = $this->load->view('view_user_admin/poets_info/poets_data', $data, true);
        $data ['maincontent'] = $this->load->view('view_user_admin/poets_info/poet_personal_info', $data, TRUE);
        $this->load->view('home', $data);
    }

    //this code for link with poetry_contest

    public function biography_details($poets_id) {  //this code for link with poetry_contest
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['poet_picture'] = $this->user_admin_model->poet_picture($poets_id);
        $data ['maincontent'] = $this->load->view('view_user_admin/poets_info/biography_detail', $data, TRUE);
        $this->load->view('home', $data);
    }

    //this code for link with poetry_contest

    public function poetry_contest() {  //this code for link with poetry_contest
        $data['first_add_home'] = $this->welcome_model->first_add_home();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();


        $data['contest_first_add'] = $this->add_model->contest_first_add();
        $data ['contest_second_add'] = $this->add_model->contest_second_add();
        $data ['poetry_contest_data'] = $this->administrator_model->select_contest_data();
//echo '<pre>';
//print_r($data);
//exit();

        $user_id = $this->session->userdata('user_id');
        $this->load->model('Welcome_Model');
        $data['result'] = $this->Welcome_Model->selectpoem($user_id);
        $data ['maincontent'] = $this->load->view('poetry_contest', $data, TRUE);
        $this->load->view('home', $data);
    }

    //this code for link with poetry_contest

    public function category_view() {  //this code for link with poetry_contest
        $user_id = $this->session->userdata('user_id');
        $this->load->model('Welcome_Model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['result'] = $this->Welcome_Model->category_view_poem_page($user_id);
        $data ['maincontent'] = $this->load->view('poetry_contest', $data, TRUE);
        $this->load->view('home', $data);
    }

}

?>
