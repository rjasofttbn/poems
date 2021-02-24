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

class tools_controller extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    /* link with update e_book. */

    public function update_e_book() { /* link with update e_book. */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/tools/update_e_book', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with download your poems. */

    public function download_your_poems() { /* link with download your poems. */
//      if ($this->session->userdata($user_id)){
        $data = array();

        $this->load->model('welcome_model');
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['maincontent'] = $this->load->view('view_user_admin/tools/download_your_poems', $data, TRUE);
        $this->load->view('home', $data);
//      }else{
//          redirect("poems/login");
//      }
    }

    public function view_user_wise_poem() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $this->load->model('user_admin_model');
        $data['download_poem'] = $this->user_admin_model->poem_view_download($user_id);

        $data ['maincontent'] = $this->load->view('view_user_admin/tools/view_poem', $data, true);
        $this->load->view('home', $data);
    }

    /* link with promote your poems. */

    public function promote_your_poems() { /* link with promote your poems. */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/tools/promote_your_poems', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with download e_book. */

    public function download_e_book() { /* link with download e_book. */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/tools/download_e_book', $data, TRUE);
        $this->load->view('home', $data);
    }

}

?>
