

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

class add_controller extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    /* this code for advertise insert */

    public function contest_add() { /* advertise code insert */
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->helper('security');
            $data['add_name'] = $this->input->post('add_name', true);
            if ($_FILES['contest_first_add']['name'] && $_FILES['contest_first_add']['size']) {
                $result = $this->contest_add_Upload('contest_first_add');
                if ($result) {
                    if ($result['file_name']) {
                        $data['contest_first_add'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
            }

            $this->load->model('add_Model');
            $this->add_Model->update_poem_page_first_add($data);
            $sesData['message'] = "Save Advertise Successfully!";
            $this->session->set_userdata($sesData);
            redirect("administrator_controller/poetry_contest_administrator");
        } else {
            redirect("poems/login");
        }
    }

    /* image upload */

    public function contest_add_Upload($fieldName) { /* image upload */

        $config['upload_path'] = 'images/advertise/poetry_contest/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '226px';
        $config['max_height'] = '390px';
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

    /* this code for advertise insert */

    public function contest_add_second() { /* advertise code insert */
        if ($this->session->userdata('user_id')) {

            $data = array();
            $this->load->helper('security');
            $data['add_name'] = $this->input->post('add_name', true);
            if ($_FILES['contest_second_add']['name'] && $_FILES['contest_second_add']['size']) {
                $result = $this->contest_add_second_Upload('contest_second_add');
                if ($result) {
                    if ($result['file_name']) {
                        $data['contest_second_add'] = $result['file_name'];
                    } else {
                        $errors = $result['error'];
                    }
                }
            }
            $this->load->model('add_Model');
            $this->add_Model->update_poem_page_first_add($data);
            $sesData['message'] = "Save Advertise Successfully!";
            $this->session->set_userdata($sesData);
            redirect("administrator_controller/poetry_contest_administrator");
        } else {
            redirect("poems/login");
        }
    }

    /* image upload */

    public function contest_add_second_Upload($fieldName) { /* image upload */

        $config['upload_path'] = 'images/advertise/poetry_contest/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '226px';
        $config['max_height'] = '390px';
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

}
?>
