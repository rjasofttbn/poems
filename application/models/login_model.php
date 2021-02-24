<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Administrator
 */
class Login_Model extends CI_Model {

    //put your code here: 
    //This code for checking Email address and password in database

    // this function for user log in check: 
    
    public function userlogincheck($email_address, $password) {     //user log in check: 
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address', $email_address);
        $this->db->where('password', sha1($password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
        public function check_login_info($email_address,$password)
    {        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address',$email_address);
//        $this->db->where('password', sha1($password)); /* use this statement when password encrypt */
        $this->db->where('password', $password);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    function updateUserStatusValue($user_id)
    {
        $this->db->set('activation_status',1);
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user');

    }

}

?>
