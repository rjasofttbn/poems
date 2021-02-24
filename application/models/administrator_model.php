<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class administrator_Model extends CI_Model {

//put your code here:
//This code for saving tbl_user


    public function poem_of_day($data) {      //This code for save poem Info
        $this->db->insert('tbl_poem_day', $data);
    }

    public function poem_category($data) {      //This code for save poem Info
        $this->db->insert('tbl_poems_category', $data);
    }

    public function advertise_inserts($data) {      //This code for save poem Info
        $this->db->insert('advertise', $data);
    }

    /* update user activation status .  */

    public function advertise_insertss($data) { /* update poems by user . */
///$this->db->set('last_name', $data['last_name']);
//$this->db->set('country', $data['country']);
        $this->db->set('add_name', $data['add_name']);
        $this->db->set('home_add_image', $data['home_add_image']);
//$this->db->where('user_id', $data['user_id']);
        $this->db->insert('advertise');
    }

    public function user_data_view() { // retrives product information from tbl_product table if it has a feature
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('insert_date', 'desc');
// $this->db->where('featured', 'on');
        $resultSet = $this->db->get();
        $result = $resultSet->result();
        return $result;
    }

    /*  this function for poet pagination */

    public function select_user_For_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_user WHERE user_id order by insert_date desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* select poem by poem Id.  */

    public function selectuser_By_userId($user_id) { /* select poem by poem Id.  */
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    /* update user activation status .  */

    public function change_user_activation_data($data) { /* update poems by user . */
        $this->db->set('activation_status', $data['activation_status']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    /* update user activation status .  */

    public function user_type_change($data) { /* update poems by user . */
        $this->db->set('user_type_select_date', $data['user_type_select_date']);
        $this->db->set('user_type', $data['user_type']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    /* ============================================ */

    public function search_user_Info($search_text) {

        $sql = "SELECT *  FROM tbl_user WHERE first_name='$search_text' OR last_name='$search_text' OR email_address ='$search_text'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function search_poem($search_text) {
        $sql = "SELECT *  FROM tbl_poems WHERE title='$search_text' OR poem_activation='$search_text'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* this code for poet pagination */

    public function select_user_For_Paginations($search_text, $num, $offset) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query_result = $this->db->get('', $num, $offset);
        $result = $query_result->result();
        return $result;
    }

    /* this code for poem data view */

    public function poem_data_view() { // retrives product information from tbl_product table if it has a feature
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->order_by("poem_submit_date", "desc");
        $resultSet = $this->db->get();
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem pagination */

    public function select_poem_For_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->order_by("poem_submit_date", "desc");
        $resultSet = $this->db->get('', $num, $offset);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem data view */

    public function select_poem_day_admin111111111() { // retrives product information from tbl_product table if it has a feature
//        $this->db->select('*');
//        $this->db->from('tbl_poems');
//        $this->db->where('poem_activation', 0);
//        $this->db->order_by("poem_submit_date", "desc");
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_day,p.poem_submit_date,p.poem_of_day_display_date,poem_of_day_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and p.poem_of_day != 'pod'
and total_read_value !=0
group by p.poem_id order by top_poem desc";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem data view */

    public function select_poem_for_trending() { // retrives product information from tbl_product table if it has a feature
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.trending,p.poem_submit_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and u.activation_status !=1
and total_read_value!=0
and `trending` !='tre'
group by p.poem_id order by top_poem desc";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    public function select_poem_for_trending_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.trending,p.poem_submit_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and u.activation_status !=1
and total_read_value!=0
and `trending` !='tre'
group by p.poem_id order by top_poem desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem data view */

    public function select_poem_day_admin() { // retrives product information from tbl_product table if it has a feature
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_day,p.poem_submit_date,p.poem_of_day_display_date,poem_of_day_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and u.activation_status !=1
and p.poem_of_day != 'pod'
and total_read_value !=0
group by p.poem_id order by top_poem desc";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    public function select_poem_day_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_day,p.poem_submit_date,p.poem_of_day_display_date,poem_of_day_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and u.activation_status !=1
and p.poem_of_day != 'pod'
and total_read_value !=0
group by p.poem_id order by top_poem desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem pagination */

    public function select_poem_day_Pagination11111111111111($num, $offset) { // retrives product information from tbl_product table if it has a feature
//        $this->db->select('*');
//        $this->db->from('tbl_poems');
//        $this->db->where('poem_activation', 0);
//        $this->db->order_by("poem_submit_date", "desc");
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_day,p.poem_submit_date,p.poem_of_day_display_date,poem_of_day_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and p.poem_of_day != 'pod'
and total_read_value !=0
group by p.poem_id order by top_poem desc $num, $offset";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem data view */

    public function select_poem_member_admin() { // retrives product information from tbl_product table if it has a feature
//        $this->db->select('*');
//        $this->db->from('tbl_poems');
//        $this->db->where('')
//        $this->db->order_by("poem_submit_date", "desc");
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_day_member,p.poem_submit_date,p.poem_day_member_display_date,poem_of_day_member_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and activation_status !=1
and user_type = 'member'
and r.total_read_value !=0
and poem_day_member !='podm'
group by p.poem_id order by top_poem desc";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem pagination */

    public function select_poem_member_admin_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
//        $this->db->select("poem_id,u.user_id,concat(first_name,' ',last_name)as name,`title`,body,user_type,poem_day_member,poem_submit_date");
//        $this->db->from('tbl_poems');
//        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_poems.user_id', 'left');
//        $this->db->where('user_type', $user_type);
//        $this->db->order_by("poem_submit_date", "desc");
// public function select_fiften_poem_day_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
//        if ($offset == NULL) {
//            $offset = 0;
//        }
//        $sql = "SELECT poem_id,u.user_id,CONCAT(u.first_name,' ', u.last_name) AS name,poems_category_id,title,poem_submit_date,poem_of_day,poem_of_day_display_date,poem_of_day_selection_date
//                FROM `tbl_poems` p
//  join tbl_user u on  p.user_id = u.user_id
//                where p.poem_of_day = 'pod'
//ORDER BY p.`poem_of_day_display_date` DESC LIMIT $offset,$num";
//        $resultSet = $this->db->query($sql);
//        $result = $resultSet->result();
//        return $result;
//    }
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_day_member,p.poem_submit_date,p.poem_day_member_display_date,poem_of_day_member_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and activation_status !=1
and user_type = 'member'
and r.total_read_value !=0
and poem_day_member !='podm'
group by p.poem_id order by top_poem desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem pagination */

    public function select_poem_month_admin_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_month,p.poem_submit_date,p.poem_month_display_date,poem_of_day_member_selection_date,r.total_read_value,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and u.activation_status !=1
and poem_submit_date >= date_sub(current_date, INTERVAL 1 MONTH)
and poem_of_month != 'pom'
and r.total_read_value !=0
group by p.poem_id order by top_poem desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem data view */

    public function select_poem_month_admin() { // retrives product information from tbl_product table if it has a feature
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_month,p.poem_submit_date,p.poem_month_display_date,poem_of_day_member_selection_date,r.total_read_value,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and u.activation_status !=1
and poem_submit_date >= date_sub(current_date, INTERVAL 1 MONTH)
and poem_of_month != 'pom'
and r.total_read_value !=0
group by p.poem_id order by top_poem desc";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    public function select_last_poem_month() {
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,poem_month_display_date 
FROM `tbl_poems` p 
left join tbl_user u on u.user_id = p.user_id
WHERE `poem_of_month` = 'pom'
and poem_activation !=1
and u.activation_status !=1
and poem_submit_date >= date_sub(current_date, INTERVAL 1 MONTH)
order by poem_month_display_date desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* 15th poem of day select */

    public function select_fiften_poem_of_day() {
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_day,p.poem_submit_date,p.poem_of_day_display_date,poem_of_day_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and p.poem_of_day = 'pod'
group by p.poem_id order by top_poem desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* 15th poem of day select */

    public function selected_poem_day_member() {
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_day_member,p.poem_submit_date,p.poem_day_member_display_date,poem_of_day_member_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and user_type = 'member'
and poem_day_member = 'podm'
group by p.poem_id order by poem_day_member_display_date desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_poem_day_member_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_day_member,p.poem_submit_date,p.poem_day_member_display_date,poem_of_day_member_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and user_type = 'member'
and poem_day_member = 'podm'
group by p.poem_id order by poem_day_member_display_date desc LIMIT $offset, $num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this code for poem pagination */
    /*  this function for poet pagination */

    public function select_fiften_poem_day_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_day,p.poem_submit_date,p.poem_of_day_display_date,poem_of_day_selection_date,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and p.poem_of_day = 'pod'
group by p.poem_id order by poem_of_day_display_date desc LIMIT $offset, $num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

//    public function 1($num, $offset) { // retrives product information from tbl_product table if it has a feature
////        $this->db->select('poem_id,user_id,poems_category_id,title,poem_submit_date,poem_of_day,poem_of_day_display_date,poem_of_day_selection_date');
////        $this->db->from('tbl_poems');
////        $this->db->order_by("poem_of_day_display_date", "desc");
//        $sql = "SELECT poem_id, user_id, poems_category_id, title, poem_submit_date, poem_of_day, poem_of_day_display_date, poem_of_day_selection_date
//                FROM `tbl_poems`
//                where poem_of_day = 'pod'
//ORDER BY `tbl_poems`.`poem_of_day_display_date` DESC";
////        $query_result = $this->db->query('', $num, $offset);
////        $result = $query_result->result();
////        return $result;
//        $query_result = $this->db->query('$sql', $num, $offset);
//        $result = $query_result->result();
//        return $result;
//    }



    /* select poem detail for administrator.  */

    public function poem_detail_for_admin($poem_id) { /* this code for poem detail for administrator  */
        $sql = "SELECT * FROM `tbl_poems` WHERE poem_id = '$poem_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function select_poem_of_day($poem_id) {
        $this->db->select('`poem_id`,`title`,`body`,tbl_poems_category.poems_category_name,`poem_submit_date`,`poem_of_day`,poem_of_day_display_date');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('poem_id', $poem_id);
        $this->db->where('poem_activation', 0);
        $resultset = $this->db->get();
        $result = $resultset->row();
        return $result;
    }

    public function select_poem_of_day_member($poem_id) { /* just select poem of the day member */
        $this->db->select('`poem_id`,`title`,`body`,tbl_poems_category.poems_category_name,`poem_submit_date`,`poem_day_member`,poem_day_member_display_date');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('poem_id', $poem_id);
        $this->db->where('poem_activation', 0);
        $resultset = $this->db->get();
        $result = $resultset->row();
        return $result;
    }

    public function select_poem_of_day_month($poem_id) { /* just select poem of the day member */
        $this->db->select('`poem_id`,`title`,`body`,tbl_poems_category.poems_category_name,`poem_submit_date`,`poem_of_month`,poem_month_display_date');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('poem_id', $poem_id);
        $this->db->where('poem_activation', 0);
        $resultset = $this->db->get();
        $result = $resultset->row();
        return $result;
    }

    /* 15th poem of day select */

    public function selected_trending_poems_model() {
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.trending,p.poem_submit_date,`trending_date`,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and `trending` ='tre'
group by p.poem_id order by trending_date desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /*  this function for poet pagination */

    public function selected_trending_poems_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.trending,p.poem_submit_date,`trending_date`,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and `trending` ='tre'
group by p.poem_id order by trending_date desc LIMIT $offset, $num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* delete poem. */

    public function delete_trendig_value($poem_id) {
        $this->db->set('trending', '');
        $this->db->where('poem_id', $poem_id);
        $this->db->update('tbl_poems', $data);
    }

    public function selected_poem_month() {
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_month,p.poem_submit_date,p.poem_month_display_date,poem_of_month_selection_date,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and poem_of_month = 'pom'
group by p.poem_id order by poem_month_display_date desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /*  this function for poet pagination */

    public function select_poem_month_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT p.poem_id,concat(u.first_name,' ',u.last_name)as name,u.user_type,p.title,p.body,pc.poems_category_name,p.poem_of_month,p.poem_submit_date,p.poem_month_display_date,poem_of_month_selection_date,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
left join tbl_poems_category pc on pc.poems_category_id = p.poems_category_id
where poem_activation !=1
and poem_of_month = 'pom'
group by p.poem_id order by poem_month_display_date desc LIMIT $offset, $num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* This query for trending poem */

    public function poem_select_for_tranding($poem_id) {
        $this->db->select('`poem_id`,`title`,`body`,tbl_poems_category.poems_category_name,`poem_submit_date`,`poem_of_day`');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('poem_id', $poem_id);
        $resultset = $this->db->get();
        $result = $resultset->row();
        return $result;
    }

    /* update poems by user .  */

    public function poem_of_day_data_insert_model($data) { /* update poems by user . */
        $this->db->set('poem_of_day_display_date', $data['poem_of_day_display_date']);
        $this->db->set('poem_of_day_selection_date', $data['poem_of_day_selection_date']);
        $this->db->set('poem_of_day', $data['poem_of_day']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* update poems by user .  */

    public function poem_of_day_data_update_model($data) { /* update poems by user . */
        $this->db->set('poem_of_day_display_date', $data['poem_of_day_display_date']);
        $this->db->set('poem_of_day_selection_date', $data['poem_of_day_selection_date']);
//        $this->db->set('poem_of_day', $data['poem_of_day']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    public function poetry_contest_insert($data) {       //This code for saving tbl_user
        $this->db->insert('tbl_poetry_contest', $data);
    }

    public function select_contest_data() {
        $sql = "SELECT * FROM `tbl_poetry_contest` order by poetry_contest_id desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_poetry_contest_date() {
        $sql = "SELECT * FROM `tbl_poetry_contest` order by poetry_contest_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poetry_contest_edit1($poetry_contest_id) {
        $sql = "SELECT * FROM `tbl_poetry_contest` where poetry_contest_id = $poetry_contest_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* This query for trending poem */

    public function poetry_contest_edit($poetry_contest_id) {
        $this->db->select('*');
        $this->db->from('tbl_poetry_contest');
        $this->db->where('poetry_contest_id', $poetry_contest_id);
        $resultset = $this->db->get();
        $result = $resultset->row();
        return $result;
    }

    /* update poems by user .  */

    public function poetry_contest_update_model($data) { /* update poems by user . */
        $this->db->set('poetry_contest_from_date_to_date', $data['poetry_contest_from_date_to_date']);
        $this->db->set('poetry_contest_end_date', $data['poetry_contest_end_date']);
        $this->db->where('poetry_contest_id', $data['poetry_contest_id']);
        $this->db->update('tbl_poetry_contest');
    }

    // check duplicate email_address in tbl_user

    function check_duplicate_poem_of_day_member_display_date($poem_day_member_display_date) {  // check duplicate email_address in tbl_user
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->where('poem_day_member_display_date', $poem_day_member_display_date);
        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* update poems by user .  */

    public function poem_of_day_member_data_insert_model($data) { /* update poems by user . */
        $this->db->set('poem_day_member_display_date', $data['poem_day_member_display_date']);
        $this->db->set('poem_of_day_member_selection_date', $data['poem_of_day_member_selection_date']);
        $this->db->set('poem_day_member', $data['poem_day_member']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* update poems by user .  */

    public function poem_of_day_member_data_update_model($data) { /* update poems by user . */
        $this->db->set('poem_day_member_display_date', $data['poem_day_member_display_date']);
        $this->db->set('poem_of_day_member_selection_date', $data['poem_of_day_member_selection_date']);
//        $this->db->set('poem_day_member', $data['poem_day_member']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* update poems by user .  */

    public function poem_of_month_insert_model($data) { /* update poems by user . */
        $this->db->set('poem_month_display_date', $data['poem_month_display_date']);
        $this->db->set('poem_of_month_selection_date', $data['poem_of_month_selection_date']);
        $this->db->set('poem_of_month', $data['poem_of_month']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* update poems by user .  */

    public function poem_of_month_update_model($data) { /* update poems by user . */
        $this->db->set('poem_month_display_date', $data['poem_month_display_date']);
        $this->db->set('poem_of_month_selection_date', $data['poem_of_month_selection_date']);
        $this->db->set('poem_of_month', $data['poem_of_month']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* update poems by user .  */

    public function poem_trending_data_insert_model($data) { /* update poems by user . */
        $this->db->set('trending_date', $data['trending_date']);
        $this->db->set('trending', $data['trending']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* this query for poem disable */

    public function change_poem_activation_data($data) { /* this query for poem disable */
        $this->db->set('poem_activation', $data ['poem_activation']);
        $this->db->where('poem_id', $data ['poem_id']);
        $this->db->update('tbl_poems');
    }

    public function select_first_add() {   //select user Id for small pic
        $sql = "SELECT `add_id`, `add_name`,`poem_page_add_first`,`add_date` FROM `advertise` WHERE `poem_page_add_first`>'0' order by add_id desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_second_add() {

        $sql = "SELECT `add_id`, `add_name`,`poem_page_add_Second`,`add_date` FROM `advertise` WHERE `poem_page_add_Second`>'0' order by add_id desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

//select user Id for small pic

    public function select_poet_first_add() {   //select user Id for small pic
        $sql = 'SELECT `add_id` , `poets_page_first_add`'
                . ' FROM `advertise`'
                . ' WHERE poets_page_first_add IS NOT NULL'
                . ' ORDER BY `add_date` DESC'
                . ' LIMIT 0 , 1';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_poet_second_add() {

        $sql = "SELECT `add_id`, `add_name`,`poets_page_second_add`,`add_date` FROM `advertise` WHERE `poets_page_second_add`>'0' order by add_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function search_poet_poem($search_text) {
        $sql = "SELECT tbl_user.user_id,tbl_poems.poem_id,tbl_poems.poem_submit_date,tbl_user.last_name,title, tbl_user.first_name  FROM tbl_user inner join tbl_poems on tbl_user.user_id = tbl_poems.user_id WHERE last_name = '$search_text'  or title LIKE '%$search_text%'  or first_name LIKE '%$search_text%'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

}
