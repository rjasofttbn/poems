<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    /* link with index form */



//    public function view_comment($comment) {
//        echo $comment;
//    }

    public function index() { /* link with index form */

        $data = array();
        $this->load->model('welcome_model');

        $data['result_top_poem'] = $this->welcome_model->top_poem();
        $data['result_famous_poets'] = $this->welcome_model->famous_poets();
        $data['popular_members'] = $this->welcome_model->popular_members();
        $data['results'] = $this->welcome_model->display_new_member();
        $data['result'] = $this->welcome_model->display_last_poems();

        $data['poem_of_the_day'] = $this->welcome_model->poem_day();
        $data['poem_of_the_member'] = $this->welcome_model->poem_member();
        $data['poet_of_month'] = $this->welcome_model->poet_of_month();

        $data['first_add_home'] = $this->welcome_model->first_add_home();

        $data['category_view'] = $this->welcome_model->some_category_view();

        $data['famous_poet_total'] = $this->welcome_model->total_famous_poet();
//        $data['poet_total'] = $this->welcome_model->total_poet();
        $data['member_total'] = $this->welcome_model->total_member();

        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $data['home_add_second'] = $this->welcome_model->home_second_add();

        $data ['poet_famous'] = $this->welcome_model->famous_poet_view();
        $data ['poem_famous'] = $this->welcome_model->famous_poem_view();

        /* this code for poem trending view. */
        $data['trending'] = $this->welcome_model->trending_poem_in_home();

        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['maincontent'] = $this->load->view('index', $data, true);
        $this->load->view('home', $data);
    }

    public function contact_us() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->model('welcome_model');
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $data['first_add_home'] = $this->welcome_model->first_add_home();
            $data['home_add_small'] = $this->welcome_model->home_small_add();
            $data['maincontent'] = $this->load->view('contact_us', $data, true);
            $this->load->view('home', $data);
        } else {
            redirect("poems/login");
        }
    }

    /* link with poem_home form */

    public function poem_home() { /* link with poem_home form */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/view_poem_home/poem_home', $data, TRUE);
        $this->load->view('home', $data);
    }

    /**/

    public function message_no_data() {
        $data = array();
        /* bottom_poem_category */
        $this->load->model('welcome_model');
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['maincontent'] = $this->load->view('message_no_data', $data, true);
        $this->load->view('home', $data);
    }

    /* poem category detail view */

    public function category_detail_view() {
        $data = array();
        $this->load->model('welcome_model');
        $data['poem_of_the_day'] = $this->welcome_model->poem_day();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['first_add_home'] = $this->welcome_model->first_add_home();

        $this->load->model('welcome_model');
        $data['last_poets_view'] = $this->welcome_model->last_poets_view();

        $this->load->model('add_model');
        $data['first_add'] = $this->add_model->view_poem_page_first_add();


        $this->load->model('administrator_model');
        $data['second_add'] = $this->administrator_model->select_second_add();

        $data['category_detail'] = $this->welcome_model->select_category_detail();
        $data ['maincontent'] = $this->load->view('poem_category_detail', $data, true);
        $this->load->view('home', $data);
    }

    /* link with poets_info_view form */

    public function poets_info_view() { /* link with poets_info_view form */
        $data = array();
        $data ['maincontent'] = $this->load->view('poets_info_view', $data, TRUE);
        $this->load->view('home', $data);
    }

    /*  famous_poet */

    public function total_famous_poet_view_home() {
        $data = array();
        $this->load->model('welcome_model');
        $data['famous_poet_total'] = $this->welcome_model->famous_poet();
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        /* famous poem view for total famous poems report */
        $data ['poem_famous'] = $this->welcome_model->famous_poem_view();
        $data ['poet_famous'] = $this->welcome_model->select_famous_poet_view();

        /*         * ************** Pagination ******************* */
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'welcome/total_famous_poet_view_home/';
        $result = $this->welcome_model->select_famous_poet_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '9';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results
        $this->load->model('welcome_model');
        $data['result'] = $this->welcome_model->select_famous_poet_view_For_Pagination($config['per_page'], $this->uri->segment(3));
        /*         * ************* Pagination End******************* */

        $data['famous_poet_total'] = $this->welcome_model->total_famous_poet();
        $data ['maincontent'] = $this->load->view('total_famous_poets', $data, TRUE);
        $this->load->view('home', $data);
    }

    /*  famous_poet */

    public function total_member_view_home() {
        $data = array();
        $this->load->model('welcome_model');
        $data['famous_poet_total'] = $this->welcome_model->famous_poet();
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        /* famous poem view for total famous poems report */
        $data ['poem_member'] = $this->welcome_model->member_view();

        $data ['poet_member'] = $this->welcome_model->member_poet_view();

        $data['member_poet_total'] = $this->welcome_model->total_member_poet();

        /*         * ************** Pagination ******************* */
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'welcome/total_member_view_home/';
        $result = $this->welcome_model->member_poet_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '9';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        //load the model and get results
        $this->load->model('welcome_model');
        $data['result'] = $this->welcome_model->member_Pagination($config['per_page'], $this->uri->segment(3));
        /*         * ************* Pagination End******************* */

        $data ['maincontent'] = $this->load->view('total_member_poets', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with signup form */

    public function signup() { /* link with signup form */
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['maincontent'] = $this->load->view('signup', $data, TRUE);
        $this->load->view('home', $data);
    }

    public function all_poem_show_page_small() { /* this function for poem view in small page */
        $data = array();
        
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['poem_famous'] = $this->welcome_model->poem_page_famous_poem_view();

        $this->load->model('Welcome_Model');
        $data['poem_of_the_day'] = $this->Welcome_Model->poem_day();
        $data['poet_of_month'] = $this->Welcome_Model->poet_of_month();
        $data['categorys'] = $this->Welcome_Model->category_view_poem_page();
        $this->load->model('user_admin_model');
        $data['poem_page'] = $this->user_admin_model->view_all_poem_page();
        $data ['maincontent'] = $this->load->view('all_poem_small_page', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* by this function save user */

    public function saveuser() { /* by this function save user */

        $data = array();
        $this->load->helper('security');
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        $data['password'] = $this->input->post('password', true);

//      $data['password'] = ($data['password']);
//        $data['password'] = do_hash($data['password'], 'sha1'); /* use this statement when password encrypt */
        $data['address'] = $this->input->post('address', true);
        //$data['city'] = $this->input->post('city', true);
        $data['country'] = $this->input->post('country', true);
        $data['gender'] = $this->input->post('gender', true);
         $data['picture_small'] = $this->input->post('picture_small', true);
//         $defaultImage = '../button_image/default.jpg)';
//         $data['picture_small'] =$defaultImage;
//         echo '<pre>';
//         print_r($data);
//         exit();
        //$data['zip_code'] = $this->input->post('zip_code', true);
        $data['admin_info'] = '3';
        $data['user_type'] = 'member';
        $data ['activation_status'] = 1;/* 0 means active 1 means diactive */

        $this->load->model('welcome_model');
        if (!$this->welcome_model->checkDuplicateEmail($data['email_address'])) {

            $user_id = $this->welcome_model->saveUserInfo($data);
            $data['user_id'] = $user_id;
//          $this->load->library('encrypt');
//          $data['user_id']=$this->encrypt->encode($data['user_id']);
//          exit();
            /* -----------------Start Activation Email--------- */
            $this->load->model('mailer_model');
            $data['from_address'] = 'topu_18_26@yahoo.com';
            $data['admin_full_name'] = 'Shafiul Alam';
            $data['to_address'] = $data ['email_address'];
            $data['subject'] = 'Account Activition Email';
            $data['password'] = $this->input->post('password', true);

            $this->mailer_model->sendeEmail($data, 'activitionEmail');

            /* -----------------End Activation Email--------- */
    /*      $user_id = $this->welcome_model->saveUserInfo($data);


              /* -----------------Start Activation Email--------- */
            /* $this->load->model('mailer_model');
              $data['from_address'] = 'topu_18_26@yahoo.com';
              $data['admin_full_name'] = 'Shafiul Alam';
              $data['to_address'] = $data ['email_address'];
              $data['subject'] = 'Account Activition Email';
              $data['password'] = $this->input->post('password', true);

              $this->mailer_model->sendeEmail($data, 'activitionEmail');
              /* -----------------End Activation Email--------- */

//            $sesData['message_sign'] = "Create a acount Successfully! ......";
//            $this->session->set_userdata($sesData);


            redirect("poems/login");
        } else {
            $sesData['message_sign'] = "Created An Account Successfully! ......";
            $this->session->set_userdata($sesData);
            redirect("poems/login");
        }
        
    }

    public function updateUserStatus($user_id) { // activates a user checking user's email
        $data = array();
        $this->load->model('welcome_model');
        $this->welcome_model->updateUserStatusField($user_id);
        $data['maincontent'] = $this->load->view('status_update', $data, true);
        $this->load->view('home', $data);
    }

    /* image upload */

    function imageUpload($fieldName) { /* image upload */
        $config['upload_path'] = 'images/userImage/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
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

    /* this function for new poets view */

    public function new_poets() { /* this function for new poets view */
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['last_poets_view'] = $this->welcome_model->last_poets_view();

        /*         * ************** Pagination ******************* */
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'welcome/new_poets/';
        $result = $this->welcome_model->last_poets_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '5';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);

        //load the model and get results
        $this->load->model('welcome_model');
        $data['result'] = $this->welcome_model->last_poets_view_Pagination($config['per_page'], $this->uri->segment(3));
        /*         * ************** Pagination End******************* */
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['popular_poets_view'] = $this->welcome_model->popular_poets();

        $this->load->model('administrator_model');
        $data['poets_add'] = $this->administrator_model->select_poet_first_add();
        $data['poets_second_add'] = $this->administrator_model->select_poet_second_add();

        $data ['maincontent'] = $this->load->view('new_poets', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for new poets view */

    public function famous_poets_all() { /* this function for new poets view */
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['home_add_small'] = $this->welcome_model->home_small_add();


        $data ['poet_famous'] = $this->welcome_model->select_famous_poet_view();

        /*         * ************** Pagination ******************* */
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'welcome/famous_poets_all/';
        $result = $this->welcome_model->select_famous_poet_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '7';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);

        //load the model and get results
        $this->load->model('welcome_model');
        $data['result'] = $this->welcome_model->select_famous_poet_view_For_Pagination($config['per_page'], $this->uri->segment(3));
        /*         * ************** Pagination End******************* */

        $data ['maincontent'] = $this->load->view('famous_all_poets', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* this function for new poets view */

    public function famous_poems_all() { /* this function for new poets view */
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $data['poem_famous'] = $this->welcome_model->select_all_famous_poem_views();

        /*         * ************** Pagination ******************* */
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'welcome/famous_poems_all/';
        $result = $this->welcome_model->select_all_famous_poem_views();
        $config['total_rows'] = count($result);
        $config['per_page'] = '9';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);

        //load the model and get results
        $this->load->model('welcome_model');
        $data['result'] = $this->welcome_model->famous_poems_Pagination($config['per_page'], $this->uri->segment(3));
        /*         * ************** Pagination End******************* */
        $data ['maincontent'] = $this->load->view('famous_all_poems', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with new_poets form */

    public function all_new_poets_page() { /* link with new_poets form */
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['all_poets_view'] = $this->welcome_model->all_new_poets_view();
        /*         * ************** Pagination ******************* */
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'welcome/all_new_poets_page/';
        $result = $this->welcome_model->all_new_poets_view();
        $config['total_rows'] = count($result);
        $config['per_page'] = '5';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        //load the model and get results
        $this->load->model('welcome_model');
        $data['result'] = $this->welcome_model->select_new_poets_Pagination($config['per_page'], $this->uri->segment(3));
        /*         * ************** Pagination End******************* */

        $data ['maincontent'] = $this->load->view('all_new_poets_page', $data, TRUE);
        $this->load->view('home', $data);
    }

//    public function all_poems_view_mains() { /* link with all_poem. */
//        $data = array();
//        $this->load->model('welcome_model');
//        $data['first_add_home'] = $this->welcome_model->first_add_home();
//        $this->load->model('user_admin_model');
//
//        $data['result'] = $this->user_admin_model->view_all_poem();
//        $data ['maincontent'] = $this->load->view('all_poems_view_main', $data, TRUE);
//        $this->load->view('home', $data);
//    }
    //Image upload and update_small_picture

    public function poem_page_add_second() {        //Image upload and update_small_picture
        if ($this->session->userdata('user_id')) {

            $data = array();
            //$data['add_id'] = $this->input->post('add_id', true);

            $data['add_name'] = $this->input->post('add_name', true);
            ////////////////////////////////////////////////
            if ($_FILES['poem_page_add_Second']['name'] && $_FILES['poem_page_add_Second']['size']) {
                $result = $this->poem_page_add_Second_upload('poem_page_add_Second');
                if ($result) {
                    if ($result['file_name']) {
                        $data['poem_page_add_Second'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }

                $this->load->model('add_Model');
                $this->add_Model->update_poem_page_second_add($data);
                $sesData['message'] = "Post Add Successfully!";
                $this->session->set_userdata($sesData);
                redirect("administrator_controller/add_in_poem_page");
            }
        } else {
            redirect("poems/login");
        }
        //<!-- this code for Image upload end !-->   //
    }

    public function poem_page_add_Second_upload($fieldName) {
        $config['upload_path'] = 'images/advertise/poem_page/second_add/';
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

    public function poets_page_add_second() {        //Image upload and update_small_picture
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['add_name'] = $this->input->post('add_name', true);
            ////////////////////////////////////////////////
            if ($_FILES['poets_page_second_add']['name'] && $_FILES['poets_page_second_add']['size']) {
                $result = $this->poets_page_add_Second_upload('poets_page_second_add');
                if ($result) {
                    if ($result['file_name']) {
                        $data['poets_page_second_add'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }

                $this->load->model('add_Model');
                $this->add_Model->update_poets_page_second_add($data);
                $sesData['message'] = "Post Add Successfully!";
                $this->session->set_userdata($sesData);
                redirect("administrator_controller/add_in_poets_page");
            }
        } else {
            redirect("poems/login");
        }

        //<!-- this code for Image upload end !-->   //
    }

    public function poets_page_add_Second_upload($fieldName) {
        $config['upload_path'] = 'images/advertise/poets_page/second_add/';
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

    /* this code for advertise insert in home page small add */

    public function small_add_insert() { /* advertise code insert */
        $data = array();
        $this->load->helper('security');
        $data['add_name'] = $this->input->post('add_name', true);

        if ($_FILES['home_add_small']['name'] && $_FILES['home_add_small']['size']) {
            $result = $this->add_image_small('home_add_small');
            if ($result) {
                if ($result['file_name']) {
                    $data['home_add_small'] = $result['file_name'];
                } else {
                    $errors = $result['error'];
                }
            }
        }
        $this->load->model('add_Model');
        $this->add_Model->update_poem_page_first_add($data);
        // $sesData['message'] = "Save Advertise Successfully!";
        // $this->session->set_userdata($sesData);
        redirect("administrator_controller/add_in_application");
    }

    /* image upload */

    public function add_image_small($fieldName) { /* image upload */

        $config['upload_path'] = 'images/advertise/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '297';
        $config['max_height'] = '295';
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

//    public function get_tweets($url) {
//
//        $json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
//        $json = json_decode($json_string, true);
//
//        return intval($json['count']);
//    }
//
//    public function get_likes($url) {
//
//        $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
//        $json = json_decode($json_string, true);
//
//        return intval($json[$url]['shares']);
//    }
//
//    public function get_plusones($url) {
//
//        $curl = curl_init();
//        curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
//        curl_setopt($curl, CURLOPT_POST, 1);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//        $curl_results = curl_exec($curl);
//        curl_close($curl);
//
//        $json = json_decode($curl_results, true);
//
//        return intval($json[0]['result']['metadata']['globalCounts']['count']);
//    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */