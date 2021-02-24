<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor. 
 * Description of user_admin
 *
 * @author Bdjobs
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

class poets_profile_controller extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'txtInput',
            'path' => 'scripts/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "450px", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ),
        );
    }

    /* manage poem comments info view.  */

    public function manage_poem_comments() { /* manage poem comments info view.  */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/manage_poem_comments', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with biography edit your biography.  */

    public function edityourbiography() { /* link with biography edit your biography.  */

        if ($this->session->userdata('user_id')) {
            $data = array();
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $user_id = $this->session->userdata('user_id');
            $data['result'] = $this->user_admin_model->selectuserId($user_id);
            $data['check_editor'] = $this->data;
            $data ['maincontent'] = $this->load->view('view_user_admin/poetprofile/edityourbiography', $data, TRUE);
            $this->load->view('home', $data);
        } else {
            redirect('poems/login');
        }
    }

    /* link with biography edit your biography.  */

    public function poets_profile_poet_page() { /* link with biography edit your biography.  */
//        if ($this->session->userdata($user_id)) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['check_editor'] = $this->data;

        $data['result'] = $this->user_admin_model->selectuserId($user_id);

        $data['maincontents'] = $this->load->view('view_user_admin/poetprofile/edityourbiography', $data, true);

        /* this code for view poet name from tbl_user start */
        $data ['manage_poet_name_view'] = $this->user_admin_model->manage_poem_name($user_id);
        /* this code for view poet name from tbl_user start */


        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['maincontent'] = $this->load->view('manage_poets', $data, true);
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    /* link with biography edit your biography.  */

    public function poets_page_poem() { /* link with biography edit your biography.  */
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['poet_details'] = $this->user_admin_model->selectuserId_poet_info($user_id);
        $data['poets_details'] = $this->load->view('view_user_admin/poets_info/poets_data', $data, true);
        $data['maincontent'] = $this->load->view('manage_poets', $data, true);
        $this->load->view('home', $data);
    }

    /* update/edit biography  in tbl_user.  */

    public function update_user_biography() {
//       if ($this->session->userdata($user_id)){
        $data = array();
        $data['user_id'] = $this->input->post('user_id', true);
        $data['place_of_birth'] = $this->input->post('place_of_birth', true);
        $data['date_of_birth'] = $this->input->post('date_of_birth', True);
        $data['biography'] = $this->input->post('biography', true);
        $data['published_books'] = $this->input->post('published_books', True);
        $data['verification_code'] = $this->input->post('verification_code', True);
        $data['lastchange'] = date('Y-m-d');
        $data['code'] = $_SESSION['6_letters_code'];

        if ($data['code'] == $data['verification_code']) {
            $this->load->model('user_admin_model');
            $this->user_admin_model->update_user_biography_m($data);
            redirect("poets_profile_controller/edityourbiography");
        } else {
            $biography_Data['biography'] = "Captcha not match!";
            $this->session->set_userdata($biography_Data);
            redirect("poets_profile_controller/edityourbiography");
        }
//        }else{
//            redirect("poems/login");
//        }
    }

    public function eduction_profession_update() {
        $data = array();
        $data['user_id'] = $this->input->post('user_id', true);
        $data['verification_code'] = $this->input->post('verification_code', True);
        $data['password'] = $this->input->post('password', True);
        $data['education'] = $this->input->post('education', True);
        $data['profession'] = $this->input->post('profession', True);
        $data['code'] = $_SESSION['6_letters_code'];

        if ($data['code'] == $data['verification_code']) {
            $this->load->model('user_admin_model');
            $this->user_admin_model->eduction_profession_update($data);
            redirect("user_admin_controller/profile_edit");
        } else {
            $profession_Data['profession'] = "Captcha not match!";
            $this->session->set_userdata($profession_Data);
            redirect("user_admin_controller/profile_edit");
        }
    }

    /* link with picture_edit .  */

    public function picture_edit() { /* link with picture_edit .  */

//        if ($this->session->userdata($user_id)){
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['maincontent'] = $this->load->view('view_user_admin/poetprofile/pictures_edit', $data, TRUE);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    /* link with manage_comments_about_you .  */

    public function manage_comments_about_you() { /* link with manage_comments_about_you .  */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/poetprofile/manage_comments_about_you', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with picture_small .  */

    public function picture_small() { /* link with picture_small .  */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/poetprofile/picture_small', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with edit_user .  */

    public function edit_user() { /* link with edit_user .  */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/edit_user', $data, TRUE);
        $this->load->view('home', $data);
    }

    //Image upload and update_small_picture

    public function update_small_picture() {        //Image upload and update_small_picture
        $data = array();
        $data['user_id'] = $this->input->post('user_id', true);

        if ($_FILES['picture_small']['name'] && $_FILES['picture_small']['size']) {
            $result = $this->smallimageUpload('picture_small');
            if ($result) {
                if ($result['file_name']) {
                    $data['picture_small'] = $result['file_name'];
                } else {
                    $errors = $result['error'];
                }
            }

            $data['lastchange'] = date("Y-m-d");
            $this->load->model('user_admin_Model');
            $this->user_admin_Model->update_small_pic_user_m($data);
            $sesData['message'] = "Update Small picture Successfully!";
            $this->session->set_userdata($sesData);
            redirect("poets_profile_controller/view_small_pic_page");
        }

        //<!-- this code for Image upload end !-->   //
    }

    public function smallimageUpload($fieldName) {

        $config['upload_path'] = 'images/small_image/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '50px';
        $config['max_height'] = '50px';
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

    /* personal picture retrive/view.  */

    public function view_small_pic_page() { /* personal picture retrive/view.  */
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectuserId_for_small_pic($user_id);

        $data ['maincontent'] = $this->load->view('view_user_admin/poetprofile/picture_small', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* personal picture retrive/view.  */

    public function view_normal_pic_page() { /* personal picture retrive/view.  */
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectuserId_for_small_pic($user_id); //tthis function or variable for selecting user data
        $data ['maincontent'] = $this->load->view('view_user_admin/poetprofile/picture_normal', $data, TRUE);
        $this->load->view('home', $data);
    }

    //Image upload and update picture

    public function update_normal_picture() {       //Image upload and update picture
        $data = array();
        $data['user_id'] = $this->input->post('user_id', true);

        if ($_FILES['user_pictures']['name'] && $_FILES['user_pictures']['size']) {
            $result = $this->normalimageUpload('user_pictures');
            if ($result) {
                if ($result['file_name']) {
                    $data['user_pictures'] = $result['file_name'];
                } else {
                    $errors = $result['error'];
                }
            }
            $data['lastchange'] = date("Y-m-d");
            $this->load->model('user_admin_Model');
            $this->user_admin_Model->update_normal_pic_user_m($data);
            $sesData['message'] = "Save Normal Picture Successfully!";
            $this->session->set_userdata($sesData);
            redirect("poets_profile_controller/view_normal_pic_page");
        }

        //<!-- this code for Image upload end !-->   //
    }

    public function normalimageUpload($fieldName) {

        $config['upload_path'] = 'images/normal_Image/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '140px';
        $config['max_height'] = '200px';
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

    /* poems comments retrive/view.  */

    public function view_poem_comments() { /* poems comments retrive/view.  */
//        if ($this->session->userdata(($user_id))) {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->select_poem_comments($user_id); //this function or variable for selecting user comments data
        $data ['maincontent'] = $this->load->view('view_user_admin/manage_poem_comments', $data, TRUE);
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    /* poet comments retrive/view.  */

    public function view_poet_comments() { /* poet comments retrive/view.  */
//        if ($this->session->userdata($user_id)) {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->select_poet_comments($user_id); //this function or variable for selecting user comments data
        $data ['maincontent'] = $this->load->view('view_user_admin/manage_poet_comments', $data, TRUE);
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    //for deleting poem comments
    public function deletecomments($comments_id) { //for deleting poem comments
        $this->load->model('user_admin_model');
        $this->user_admin_model->delete_comment($comments_id);
        $sesData['message'] = "Delete comment Successfully!";
        $this->session->set_userdata($sesData);
        redirect('poets_profile_controller/view_poem_comments');
    }

    //for deleting poet comments

    public function delete_poet_comments($comments_id) { //for deleting poem comments
        $this->load->model('user_admin_model');
        $this->user_admin_model->delete_comment($comments_id);
        $sesData['message'] = "Delete comment Successfully!";
        $this->session->set_userdata($sesData);
        redirect('poets_profile_controller/view_poem_comments');
    }

}

?>
