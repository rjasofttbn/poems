<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome_model
 *
 * @author Administrator
 * 
 */
class add_Model extends CI_Model {

    //put your code here: 
    //update small pic user_m



    public function update_poem_page_first_add($data) {       //This code for saving tbl_user
        $this->db->insert('advertise', $data);
    }

    //update small pic user_m

    public function update_poem_page_add($data) {  //update small pic user_m
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('poem_page_add_first', $data['poem_page_add_first']);
        $this->db->insert('advertise');
    }

    //update small pic user_m

    public function update_poem_page_second_add($data) {  //update small pic user_m
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('poem_page_add_Second', $data['poem_page_add_Second']);
        $this->db->insert('advertise');
    }

    //update small pic user_m

    public function update_small_home_add($data) {  //update small pic user_m
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('home_add_small', $data['home_add_small']);
        $this->db->insert('advertise');
    }

    //update small pic user_m

    public function update_second_add_home($data) {  //update small pic user_m
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('second_add_home', $data['second_add_home']);
        $this->db->insert('advertise');
    }

    //update small pic user_m

    public function update_poets_page_second_add($data) {  //update small pic user_m
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('poets_page_second_add', $data['poets_page_second_add']);
        $this->db->insert('advertise');
    }

    //update small pic user_m

    public function update_poets_page_first_add($data) {  //update small pic user_m
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('poets_page_first_add', $data['poets_page_first_add']);
        $this->db->insert('advertise');
    }

    /* select poem detail for administrator.  */

    public function view_poem_page_first_add() { /* this code for poem detail for administrator  */
        $sql = "SELECT `add_id`, `poem_page_add_first` FROM  `advertise` where `poem_page_add_first`>'0' order by add_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function contest_first_add() {
        $sql = "SELECT `add_id`, `add_name`,contest_first_add,`add_date` FROM `advertise` WHERE contest_first_add>'0' order by add_id desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function contest_second_add() {
        $sql = "SELECT `add_id`, `add_name`,contest_second_add,`add_date` FROM `advertise` WHERE contest_second_add >'0' order by add_id desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

}

?>
