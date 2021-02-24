<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Blog extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
            $data['email_address'] = $session_data['email_address'];
            $data['maincontent'] = $this->load->view('home_view', $data, true);
            $this->load->view('home', $data);
        } else {
            //If no session, redirect to login page
            //  redirect('login', 'refresh');
            redirect('blog/viewBlog', 'refresh');
        }
    }

    public function addBlog() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
            $data['email_address'] = $session_data['email_address'];

            $this->load->model('blog_model');
            $data['rows'] = $this->blog_model->selectCategoryName();

            $data['maincontent'] = $this->load->view('add_blog', $data, true);
            $this->load->view('home', $data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function saveBlog() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['blog_author'] = $session_data['user_id'];

            $data['blog_title'] = $this->input->post('blog_title', True);
            $data['blog_category'] = $this->input->post('blog_category', True);
            $data['blog_content'] = $this->input->post('blog_content', True);

//   echo   $data['blog_picture'] = $_FILES['blog_picture']['name'];
            ////////////////////////////////////////////////
            if ($_FILES['blog_picture']['name'] && $_FILES['blog_picture']['size']) {
                $result = $this->imageUpload('blog_picture');
                if ($result) {
                    if ($result['file_name']) {
                        $data['blog_picture'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
            }

            $this->load->model('blog_model');
            $this->blog_model->saveBlogInfo($data);
            //echo '-----2';
            $msg['message'] = "Save data successfully!";
            $this->session->set_userdata($msg);
            // $_SESSION['message']="Save data successfully!";
            $this->addBlog();
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function imageUpload($fieldName) {
        $config['upload_path'] = 'images/blogImage/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|MPEG|tif';
        $config['max_size'] = '';
        //$config['max_width'] = '';
        //$config['max_height'] = '';
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

    public function viewBlogByBlog_author() {
        if ($this->session->userdata('logged_in')) {
            $data = array();
            $this->load->model('blog_model');
            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
            $data['rows'] = $this->blog_model->selectBlogByblog_author($data['user_id']);

            $data['maincontent'] = $this->load->view('view_blog_by_blog_author', $data, true);
            $this->load->view('home', $data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function viewBlog() {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
        }
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'blog/viewBlog/';
        $config['total_rows'] = $this->db->count_all('blog_posts');
        $config['per_page'] = '2';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';

        $this->pagination->initialize($config);

        //load the model and get results
        $this->load->model('blog_model');
        $data['rows'] = $this->blog_model->selectBlogAll($config['per_page'], $this->uri->segment(3));

        $data['maincontent'] = $this->load->view('view_blog', $data, true);
        $this->load->view('home', $data);
    }

    public function viewBlogDetails($blog_id) {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
        }
        //  $data['blog_title']=$this->input->post('blog_title',True);
        $this->load->model('blog_model');
        $data['rows'] = $this->blog_model->selectBlogDetails($blog_id);

        $data['maincontent'] = $this->load->view('view_blog_details', $data, true);
        $this->load->view('home', $data);
    }

    public function editBlogByAuthor($blog_id) {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];

            // echo $blog_id; exit ();
            $this->load->model('blog_model');
            //  $this->load->model('blog_model');
            $data['rows'] = $this->blog_model->selectCategoryName();
            $data['result'] = $this->blog_model->editBlogByAuthor($blog_id);

            $data['maincontent'] = $this->load->view('edit_blog_by_author', $data, true);
            $this->load->view('home', $data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function updateBlog() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['user_id'] = $session_data['user_id'];
            $data['blog_id'] = $this->input->post('blog_id', True);
            $data['blog_title'] = $this->input->post('blog_title', True);
            $data['blog_category'] = $this->input->post('blog_category', True);
            $data['blog_content'] = $this->input->post('blog_content', True);
            $data['lastchange'] = date("Y-m-d H:i:s");

            $this->load->model('blog_model');
            $data['rows'] = $this->blog_model->selectBlogByblog_author($data['user_id']);
            $errors = '';

            if ($_FILES['blog_picture']['name'] && $_FILES['blog_picture']['size']) {
                $result = $this->imageUpload('blog_picture');
                if ($result) {
                    if ($result['file_name']) {
                        $data['blog_picture'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
            }


            $this->blog_model->updateBlogByblog_author($data);
            $msg['message'] = '<h1>User Data Updated Successfully!</h1>';
            $this->session->set_userdata($msg);
            redirect("blog/viewBlogByBlog_author");
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function deleteBlogByAuthor($blog_id) {
        $this->db->where('blog_id', $blog_id);
        $this->db->delete('blog_posts');
        $msg['message'] = "Delete data successfully!";
        $this->session->set_userdata($msg);
        $this->viewBlogByBlog_author();
    }

}

?>
