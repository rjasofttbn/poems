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
class Welcome_Model extends CI_Model {

    //put your code here: 
    //This code for saving tbl_user

    public function saveuserinfo($data) {       //This code for saving tbl_user
        $this->db->insert('tbl_user', $data);
    }

    public function updateUserStatusField($user_id) { // update user information to tbl_user table
        $this->db->set('activation_status', 1);
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user');
    }

    // this code for save read info

    public function save_read_infos($data) {     // this code for save read info
        $this->db->insert('tbl_vote', $data);
    }

    // this code for update user //21-06-14

    public function save_read_info($data) {      // this code for update user 
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->set('read_value', 'read_value+1', FALSE);
        $this->db->update('tbl_poems');
    }

    // this code for update user //21-06-14

    public function save_read_value($data) {      // this code for update user 
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->set('read_value', 'read_value+1', FALSE);
        $this->db->insert('tbl_read_value', $data);
    }

    // this code for update user pic

    public function update_user_picture() {     // this code for update user pic
        $this->db->select('*');
        $this->db->from('tbl_user');
        $resultSet = $this->db->get();
        $result = $resultSet->result();
        return $result;
    }

    // this code for select user 

    public function selectuserByuserId($user_id) {      // this code for select user 
        $this->db->select('user_id');
        $this->db->from('tbl_user');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    // this code for update user 

    public function updateuser($data) {      // this code for update user 
        $this->db->set('picture_small', $data['picture_small']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    // check duplicate email_address in tbl_user

    function checkDuplicateEmail($email_address) {  // check duplicate email_address in tbl_user
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_address', $email_address);

        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check duplicate email_address in tbl_user

    function check_duplicate_poem_name($user_id, $title) {  // check duplicate email_address in tbl_user
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->where('user_id', $user_id);
        $this->db->where('title', $title);
        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check duplicate user_id in poem_id

    function checkDuplicateuserid($poem_id, $user_id) {   // check duplicate user_id in poem_id
        $sql = " SELECT *  FROM `tbl_vote` "
                . " WHERE tbl_vote.`poem_id` ='" . $poem_id . "' "
                . " and tbl_vote.`user_id`= '" . $user_id . "' and read_value=0";
        $query_result = $this->db->query($sql);
        if (count($query_result->result()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function checkduplicate_read_value($poem_id, $user_id) {
        $sql = "SELECT * FROM `tbl_vote` WHERE tbl_vote.`poem_id` = $poem_id'
        . ' and tbl_vote.`user_id`= '$user_id' and tbl_vote.and read_value=0";
        $query_result = $this->db->query($sql);
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function check_duplicate_poem_of_day_display_date111($poem_of_day_display_date) {
        $sql = "SELECT * FROM tbl_poems WHERE  tbl_poems.poem_of_day_display_date= $poem_of_day_display_date";
        $query_result = $this->db->query($sql);
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check duplicate email_address in tbl_user

    function check_duplicate_poem_of_day_display_date($poem_of_day_display_date) {  // check duplicate email_address in tbl_user
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->where('poem_of_day_display_date', $poem_of_day_display_date);

        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check duplicate email_address in tbl_user

    function check_duplicate_poem_of_month_display_date($poem_month_display_date) {  // check duplicate email_address in tbl_user
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->where('poem_month_display_date', $poem_month_display_date);

        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // insert vote table info

    public function savepoemvote($data) {
        $this->db->insert('tbl_vote', $data);
    }

    // check duplicate user_id in poem_id

    function checkDuplicateuserid_for_like($poem_id, $user_id) {   // check duplicate user_id in poem_id
        $sql = " SELECT *  FROM `tbl_like` "
                . " WHERE tbl_like.`poem_id` ='" . $poem_id . "' "
                . " and tbl_like.`user_id`= '" . $user_id . "' and like_id>0";
        $query_result = $this->db->query($sql);
        if (count($query_result->result()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function save_like($data) {      // this code for save like
        $this->db->insert('tbl_like', $data);
    }

    function checkDuplicate_ip_for_read_value111($poem_id, $ip_address) {   // check duplicate user_id in poem_id
        $sql = " SELECT *  FROM `tbl_read_value` "
                . " WHERE tbl_read_value.`poem_id` ='" . $poem_id . "'"
                . " and tbl_read_value.`ip_address`= '" . $ip_address . "' ";
        $query_result = $this->db->query($sql);
        if (count($query_result->result()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // check duplicate email_address in tbl_user

    function checkDuplicate_ip_for_read_value($poem_id, $ip_address) {  // check duplicate email_address in tbl_user
        $this->db->select('*');
        $this->db->from('tbl_read_value');
        $this->db->where('poem_id', $poem_id);
//        $this->db->where('user_id', $user_id);
        $this->db->where('ip_address', $ip_address);
        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read_value($data) {      // this code for read value
        $this->db->insert('tbl_read_value', $data);
    }

    // check duplicate user_id in poem_id

    function checkDuplicateuserid_for_collection($poem_id, $user_id) {   // check duplicate user_id in poem_id
        $sql = " SELECT *  FROM `tbl_collection` "
                . " WHERE tbl_collection.`poem_id` ='" . $poem_id . "' "
                . " and tbl_collection.`user_id`= '" . $user_id . "' and collection_id>0";
        $query_result = $this->db->query($sql);
        if (count($query_result->result()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function save_collection($data) {      // this code for save like
        $this->db->insert('tbl_collection', $data);
    }

    // retrives avg vote information from vote table
    public function poetry_contest() {      // retrives avg vote information from vote table
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectpoem($user_id);
        $data ['maincontent'] = $this->load->view('poetry_contest', $data, TRUE);
        $this->load->view('home', $data);
    }

    // retrives all poems information from poems table

    public function selectpoem() {      // retrives all poems information from poems table
        $sql = "SELECT user_id, poem_id, title AS Poem, total_vote, total_voter, round((avg_vote),2)as avg_vote, MAX( total_vote ) vote, Name, picture_small
FROM  `vb_poem_contest` 
WHERE total_voter >1
GROUP BY user_id ORDER BY avg_vote DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // retrives last poems information from poems table

    public function display_last_poems() {// retrives last poems information from poems table
        $sql = "SELECt p.`title` ,p.poem_id, u.activation_status,p.`poem_submit_date` 
FROM `tbl_poems` p
left join tbl_user u on u.user_id = p.user_id
where poem_activation  !=1
and activation_status != 1
order by poem_submit_date desc limit 0,16";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /*  this function for poet pagination */

    // retrives  user small picture information from user table

    public function selectuser($user_id) {      // retrives  user small picture information from user table
        $query = $this->db->query("SELECT u.* ,U.picture_small 
            FROM user u
            WHERE u.user= $user_id");
        foreach ($query->result() as $row) {
            //echo $row->blog_title."<br/>";
            $data[] = $row;
        }
        return $data;
    }

    // retrives new user information from user table

    public function display_new_member() {    // retrives new user information from user table
        $sql = ''
                . ' SELECT tbl_user.user_id,CONCAT(tbl_user.first_name,\' \' , tbl_user.last_name ) AS member FROM tbl_user'
                . ' ORDER BY `user_id` DESC '
                . ' LIMIT 7';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // retrives top read poem information from tbl_poems table

    public function top_poem() {// retrives top read poem information from tbl_poems table + tbl_vote.read_value
        $sql = "SELECT p.user_id, p.poem_id,p.title,u.activation_status,total_comments_multiple,avg_vote,total_read_value,total_like,poem_submit_date,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on u.user_id = p.user_id
where poem_activation !=1
and activation_status !=1
and `poem_submit_date` >= (CURDATE() + INTERVAL -15 DAY)
group by p.poem_id order by top_poem desc limit 0,7";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // retrives famous poets information from tbl_poems table

    public function famous_poets() {// retrives top poem information from tbl_vote table
        $sql = "SELECT u.`user_id`,concat(first_name,' ',last_name)as Name,u.picture_small,u.insert_date,round(sum(COALESCE(total_reader,0)+COALESCE(avg_vote,0)+COALESCE(total_commenters,0)
    +COALESCE(total_like,0)),2 )as user_rank
FROM `tbl_user`  u 
left join vb_user_wise_vote v on v.poem_owner_id = u.user_id
left join vb_user_wise_total_comments c on c.poem_owner_id = u.user_id
left join vb_user_wise_read_value r on r.poem_owner_id = u.user_id
left join vb_user_wise_like_value l on l.poem_owner_id = u.user_id
 where u.user_type = 'Poet' 
and u.`activation_status` != 1
group by u.user_id order by user_rank desc limit 0, 7";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // retrives popular members information from tbl_user table

    public function popular_members() {// retrives popular members information from tbl_user table
        $sql = "SELECT u.`user_id`,concat(first_name,' ',last_name)as Name,avg_vote,total_commenters,total_reader,total_like,

round(sum(COALESCE(total_reader,0)+COALESCE(avg_vote,0)+COALESCE(total_commenters,0)+COALESCE(total_like,0)),2 )as user_rank

FROM `tbl_user`  u 
left join vb_user_wise_vote v on v.poem_owner_id = u.user_id
left join vb_user_wise_total_comments c on c.poem_owner_id = u.user_id
left join vb_user_wise_read_value r on r.poem_owner_id = u.user_id
left join 	vb_user_wise_like_value l on l.poem_owner_id = u.user_id
 where u.user_type = 'member' 
and u.`activation_status` <> 1
group by u.user_id order by user_rank desc limit 0,7";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // check duplicate poem id
    function checkDuplicateip($poem_id, $ip) {   // check duplicate user_id in poem_id
        /* 10-05-2014 */
        $sql = " SELECT *  FROM `tbl_vote` "
                . " WHERE tbl_vote.`poem_id` ='" . $poem_id . "' "
                . " and tbl_vote.`ip`= '" . $ip . "'";
        $query_result = $this->db->query($sql);

        /* 10-05-2014 */
        if (count($query_result->result()) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // retrives top read poem information from tbl_poems table

    public function last_poets_view() {// retrives top read poem information from tbl_poems table
        $sql = "SELECT activation_status,tbl_user.`user_id`,concat (`first_name`,' ',`last_name`)as name,tbl_user.picture_small, count(tbl_poems.poem_id)as totalpoem,`title`,`poem_submit_date` FROM tbl_poems

INNER JOIN tbl_user ON tbl_user. `user_id` = tbl_poems . `user_id`
where activation_status !=1
group by user_id
order by `user_id` desc ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function last_poets_view_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }

        $sql = "SELECT activation_status,tbl_user.`user_id`,concat (`first_name`,' ',`last_name`)as name,tbl_user.picture_small, count(tbl_poems.poem_id)as totalpoem,`title`,`poem_submit_date` FROM tbl_poems

INNER JOIN tbl_user ON tbl_user. `user_id` = tbl_poems . `user_id`
where activation_status !=1
group by user_id
order by `user_id` desc  LIMIT $offset,$num";

        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    // retrives top read poem information from tbl_poems table

    public function all_new_poets_view() {// retrives top read poem information from tbl_poems table
        $sql = "SELECT tbl_user.`user_id`,poem_activation,concat(`first_name`,' ',`last_name`)as name, count(tbl_poems.poem_id)as totalpoem,`title`,tbl_user.`picture_small`,`poem_submit_date` FROM tbl_poems 
INNER JOIN tbl_user ON tbl_user. `user_id` = tbl_poems . `user_id`
where activation_status != 1
group by user_id
order by `user_id` desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_new_poets_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }

        $sql = "SELECT tbl_user.`user_id`,poem_activation,concat(`first_name`,' ',`last_name`)as name, count(tbl_poems.poem_id)as totalpoem,`title`,tbl_user.`picture_small`,`poem_submit_date` FROM tbl_poems 
INNER JOIN tbl_user ON tbl_user. `user_id` = tbl_poems . `user_id`
where activation_status != 1
group by user_id
order by `user_id` desc LIMIT $offset,$num";

        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* this function for poem of the day select */

    public function poem_day() {
        $sql = "SELECT tbl_poems.`user_id`,activation_status,poem_of_day_display_date,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,

`title`,`body`,tbl_user.picture_small FROM `tbl_poems`
inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
where poem_activation !=1
and `poem_of_day`='pod'
and activation_status !=1
and `poem_of_day_display_date` = CURRENT_DATE
order by `poem_of_day_display_date` desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poems_of_day() {
        $sql = "SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,
`title`,`body`,`poem_submit_date`,`poem_of_day_display_date`,tbl_user.picture_small FROM `tbl_poems`
inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
where tbl_user.activation_status !=1
and `poem_of_day`='pod'
 order by `poem_of_day_display_date` desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function scroll_num_rows($limit, $start) {

        $sql = "SELECT * FROM actor_info ORDER BY id DESC LIMIT '.$start.','.$limit.'";

        $query_result = $this->db->query($sql);
        if ($query->num_rows() < 1) {
            header('HTTP/1.0 404 Not Found');
            echo 'Page not found!';
            exit();
        }
        $result = $query_result->result();
        return $result;
    }

    public function all_poem_day777() {

        $sql = "SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,
`title`,`body`,`poem_submit_date`,`poem_of_day_display_date`,tbl_user.picture_small,
count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
tbl_vote.poem_vote FROM `tbl_poems`
left join tbl_user on tbl_user.user_id = tbl_poems.user_id
left join tbl_comments_poem on tbl_comments_poem.poem_id = tbl_poems.poem_id
left join tbl_vote on tbl_vote.poem_id = tbl_poems.poem_id
where tbl_user.activation_status !=1
and `poem_of_day`='pod'
group by poem_id
order by `poem_of_day_display_date` desc";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function all_poem_day() {
//		$this->db->select("EMPLOYEE_ID,EMPLOYEE_NAME");
//		$this->db->from('trn_employee');
        /* $sql = "SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,
          `title`,`body`,`poem_submit_date`,`poem_of_day_display_date`,tbl_user.picture_small,
          count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
          tbl_vote.poem_vote FROM `tbl_poems`
          left join tbl_user on tbl_user.user_id = tbl_poems.user_id
          left join tbl_comments_poem on tbl_comments_poem.poem_id = tbl_poems.poem_id
          left join tbl_vote on tbl_vote.poem_id = tbl_poems.poem_id
          where tbl_user.activation_status !=1
          and `poem_of_day`='pod'
          group by poem_id
          order by `poem_of_day_display_date` desc"; */
        $sql = "SELECT p.`user_id`,concat(first_name,' ',last_name)as name,u.picture_small,p.`poem_id`,
        `title`,`body`,`poem_of_day`,p.poem_submit_date,p.`poem_of_day_display_date`,total_like,total_comments,
        poem_total_vote as poem_vote,v.avg_vote as Average_vote,v.total_voter,total_read_value as read_value FROM `tbl_poems` p
        left join tbl_user u on u.user_id = p.user_id
        left join vb_poem_wise_total_comments c on c.poem_id = p.poem_id
        left join vb_poem_wise_total_like l on l.poem_id = p.poem_id
        left join vb_poem_wise_total_read_value r on r.poem_id = p.poem_id
        left join vb_poem_wise_total_vote v on v.poem_id = p.poem_id
        where u.activation_status !=1
        and p.poem_activation !=1
        and p.`poem_of_day`='pod'               
        order by p.`poem_of_day_display_date` desc LIMIT 2,18446744073709551615";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function all_poem_day3333($start) {
        $this->db->select("SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,
`title`,`body`,`poem_submit_date`,`poem_of_day_display_date`,tbl_user.picture_small,
count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
tbl_vote.poem_vote");
        $this->db->from("tbl_poems");
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_poems.user_id', 'left');
        $this->db->join('tbl_comments_poem', 'tbl_comments_poem.poem_id = tbl_poems.poem_id', 'left');
        $this->db->join('tbl_vote', 'tbl_vote.poem_id = tbl_poems.poem_id', 'left');

        $this->db->where("tbl_user.activation_status", "!=1");
        $this->db->where("poem_of_day", "pod");
        $this->db->group_by("poem_id");
        $this->db->order_by("poem_of_day_display_date", "desc");
        $start1 = ($start * 4);
        $this->db->limit(4, $start1);
        $query = $this->db->get();
        return $query->result();
    }

    //set table name to be used by all functions
    var $table = "SELECT tbl_poems.`user_id`,last_name,tbl_poems.poem_id,
`title`,`body`,`poem_submit_date`,`poem_of_day_display_date`,tbl_user.picture_small,
count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
tbl_vote.poem_vote FROM `tbl_poems`
left join tbl_user on tbl_user.user_id = tbl_poems.user_id
left join tbl_comments_poem on tbl_comments_poem.poem_id = tbl_poems.poem_id
left join tbl_vote on tbl_vote.poem_id = tbl_poems.poem_id
where tbl_user.activation_status !=1
and poem_of_day='pod'
and tbl_poems.poem_id > :last_id
group by tbl_poems.poem_id
order by poem_of_day_display_date desc LIMIT 0, :limit";

    function fetch_record($limit, $start) {
        $this->db->limit($limit, $start);

        $query = $this->db->get($this->data);
        return ($query->num_rows() > 0) ? $query->result() : FALSE;
    }

    function record_count() {
        return $this->db->count_all_results('data');
    }

    public function two_poem_of_day() {
        $sql = "SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,
`title`,`body`,`poem_submit_date`,`poem_of_day_display_date` as poem_of_day_date,tbl_user.picture_small,
count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
tbl_vote.poem_vote FROM `tbl_poems`
left join tbl_user on tbl_user.user_id = tbl_poems.user_id
left join tbl_comments_poem on tbl_comments_poem.poem_id = tbl_poems.poem_id
left join tbl_vote on tbl_vote.poem_id = tbl_poems.poem_id
where tbl_user.activation_status !=1
and `poem_of_day`='pod'
group by poem_id
order by `poem_of_day_display_date` desc limit 0,2";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* trending poem view  */

    public function detail_trending_poem_view($poem_id) {
        $sql = "SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,

`title`,`body`,`poem_submit_date`,`trending_date`,tbl_user.picture_small,
count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
tbl_vote.poem_vote FROM `tbl_poems`
left join tbl_user on tbl_user.user_id = tbl_poems.user_id
left join tbl_comments_poem on tbl_comments_poem.poem_id = tbl_poems.poem_id
left join tbl_vote on tbl_vote.poem_id = tbl_poems.poem_id
where tbl_user.activation_status !=1
and `trending`='tre'
and tbl_poems.poem_id =$poem_id
group by poem_id
order by `trending_date` desc ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* trending poem view  */

    public function trending_poem_view() {
        $sql = "SELECT p.`user_id`,concat(first_name,' ',last_name)as name,u.picture_small,p.`poem_id`,
        `title`,`body`,`trending`,p.poem_submit_date,p.trending_date,total_like,total_comments,
        poem_total_vote as total_vote,v.avg_vote as Average_vote,v.total_voter,total_read_value as read_value,rank_no FROM `tbl_poems` p
        left join tbl_user u on u.user_id = p.user_id
        left join vb_poem_wise_total_comments c on c.poem_id = p.poem_id
        left join vb_poem_wise_total_like l on l.poem_id = p.poem_id
        left join vb_poem_wise_total_read_value r on r.poem_id = p.poem_id
        left join vb_poem_wise_total_vote v on v.poem_id = p.poem_id
		left join tbl_rank tr on tr.user_id = p.user_id
        where u.activation_status !=1
        and p.poem_activation !=1
        and p.`trending`='tre' 
        order by p.`trending_date` desc LIMIT 2,18446744073709551615";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_poem_comment_reply($poem_id, $comments_id) {
        $sql = "select * from tbl_reply r, tbl_user u where poem_id =$poem_id and comments_id = $comments_id AND u.user_id = r.user_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    /* trending poem=> comments view  */

    public function trending_poem_comments_view($poem_id) {
        $sql = "SELECT tbl_user.user_id,tbl_comments_poem.poem_owner_id,tbl_comments_poem.`user_id`,tbl_comments_poem.`comments_id`,tbl_user.picture_small,concat(first_name,'',last_name)as name,tbl_comments_poem.`poem_id`,`comments`,
                `comments_post_date` FROM `tbl_comments_poem`
                inner join tbl_user on tbl_user.user_id  = tbl_comments_poem.user_id
                inner join tbl_poems on tbl_poems.poem_id =  tbl_comments_poem.poem_id    
                and tbl_comments_poem.poem_id = $poem_id
                and `trending`='tre'
order by comments_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* trending poem=> comments=> reply view  */

    public function reply_dat_view($comments_id) {
        $sql = "SELECT tbl_reply.`reply_id`,tbl_user.user_id,tbl_reply.poem_id,tbl_reply.user_id,tbl_user.picture_small,concat(first_name,'',last_name)as name,`reply_data`,
                `reply_date` FROM `tbl_reply`
                inner join tbl_user on tbl_user.user_id  = tbl_reply.user_id
                inner join tbl_poems on tbl_poems.poem_id =  tbl_reply.poem_id             
                and tbl_reply.`comments_id`= $comments_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function save_comment($user_comment, $poem_id) {
        $data = array();
        $data['poem_id'] = $poem_id;
        $data['comments'] = $user_comment;
        $this->db->insert('tbl_vote', $data);
    }

    public function select_user_information($user_id) {
        $sql = "SELECT user_id,picture_small,concat(first_name,'',last_name)as name from tbl_user where user_id  = $user_id limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function total_commet($poem_id) {
        $sql = "select poem_id from tbl_comments_poem where poem_id = '$poem_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function two_tranding_poem_view() {
        $sql = "SELECT p.`user_id`,concat(first_name,' ',last_name)as name,u.picture_small,p.`poem_id`,
        `title`,`body`,`trending`,p.poem_submit_date,p.trending_date,total_like,total_comments,
        poem_total_vote as total_vote,v.avg_vote as Average_vote,v.total_voter,total_read_value as read_value,rank_no FROM `tbl_poems` p
        left join tbl_user u on u.user_id = p.user_id
        left join vb_poem_wise_total_comments c on c.poem_id = p.poem_id
        left join vb_poem_wise_total_like l on l.poem_id = p.poem_id
        left join vb_poem_wise_total_read_value r on r.poem_id = p.poem_id
        left join vb_poem_wise_total_vote v on v.poem_id = p.poem_id
		left join tbl_rank tr on tr.user_id = p.user_id
        where u.activation_status !=1
        and p.poem_activation !=1
        and p.`trending`='tre' 
        order by p.`trending_date` desc LIMIT 0,2";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function total_voter_trending($poem_id) {
        $sql = "SELECT count(user_id) as id FROM `tbl_vote` WHERE poem_id = '$poem_id' limit 0,1;";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    /* trending poem view  */

    public function trending_poems() {
        $sql = "SELECT tbl_poems.`user_id`,tbl_poems.title,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,
            tbl_poems.`poem_id`FROM `tbl_poems`
inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
where tbl_user.activation_status !=1
and `trending`='tre'
order by `trending_date` desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* trending poem view for home page  */

    public function trending_poem_in_home() {
        $sql = "SELECT tbl_poems.`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,
`title`,`body`,`poem_submit_date`,`trending_date`,tbl_user.picture_small FROM `tbl_poems`
inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
where tbl_user.activation_status !=1
and `trending`='tre'
 order by `trending_date` desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function bottom_poem_category() {
        $sql = "SELECT `poems_category_id`,`poems_category_name`  FROM `tbl_poems_category` WHERE 
   `poems_category_name` = 'birth'          
or `poems_category_name` = 'sad'
or`poems_category_name`= 'love'
or `poems_category_name` = 'sorry'
or `poems_category_name` = 'death'
or `poems_category_name` = 'nature'
or `poems_category_name` = 'wedding'
or `poems_category_name` = 'childhood'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function popular_poets() {
        $sql = 'SELECT u.`user_id`,concat(`first_name`,\' \',`last_name`)as name, '
                . ' count(p.poem_id)as totalpoem,p.`title`,u.`picture_small`,u.`user_type`,'
                . ' p.`poem_submit_date` FROM tbl_user u,tbl_poems p '
                . ' where p.user_id = u.user_id and u.`user_type`=\'Famous Poet\''
                . ' and activation_status !=1'
                . ' group by p.user_id'
                . ' order by `user_id` desc ';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* this query for poem member select */

    public function poem_member() {
        $sql = "SELECT tbl_poems.`user_id` , activation_status,poem_day_member_display_date, CONCAT(  `tbl_user`.`first_name` ,  ' ',  `last_name` ) AS name, tbl_poems.`poem_id` ,  `title` ,  `body` , tbl_user.picture_small
FROM  `tbl_poems` 
INNER JOIN tbl_user ON tbl_user.user_id = tbl_poems.user_id
WHERE poem_activation !=1
AND  `poem_of_day` =  'pod'
AND activation_status !=1
AND  `poem_day_member_display_date` = CURRENT_DATE
ORDER BY  `poem_day_member_display_date` DESC 
LIMIT 0 , 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* this query for poet of month select */

    public function poet_of_month() {
        $sql = "SELECT tbl_poems.`user_id`,activation_status,`poem_day_member_display_date`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,tbl_poems.`poem_id`,

`title`,`body`,tbl_user.picture_small FROM `tbl_poems`
inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
where poem_activation !=1
and `poem_day_member`='podm'
and activation_status !=1
and  MONTH(poem_day_member_display_date) = MONTH(CURDATE())
order by poem_day_member_display_date desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* / this function for first add in home */

    public function first_add_home() {
        $sql = "SELECT `add_id`, `add_name`,`home_add_image`,`add_date` FROM `advertise` WHERE `home_add_image`>'0' order by add_id desc limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function home_small_add() {
        $sql = "SELECT `add_id`, `add_name`,home_add_small,`add_date` FROM `advertise` WHERE home_add_small>'0' order by add_id desc LIMIT 0, 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function home_second_add() {
        $sql = "SELECT `add_id`, `add_name`,second_add_home,`add_date` FROM `advertise` WHERE second_add_home>'0' order by add_id desc LIMIT 0, 1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function famous_poet_view() {
        $sql = "SELECT u.`user_id`,concat(first_name,' ',last_name)as name,u.picture_small,u.date_of_birth,round(sum(COALESCE(total_reader,0)+COALESCE(avg_vote,0)+COALESCE(total_commenters,0)
    +COALESCE(total_like,0)),2 )as user_rank
FROM `tbl_user`  u 
left join vb_user_wise_vote v on v.poem_owner_id = u.user_id
left join vb_user_wise_total_comments c on c.poem_owner_id = u.user_id
left join vb_user_wise_read_value r on r.poem_owner_id = u.user_id
left join 	vb_user_wise_like_value l on l.poem_owner_id = u.user_id
 where u.user_type = 'Poet' 
and u.`activation_status` <> 1
and total_reader !=0
group by u.user_id
ORDER BY user_rank desc limit 0,11";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_famous_poet_view() {
        $sql = "SELECT u.`user_id`,concat(first_name,' ',last_name)as name,u.picture_small,u.date_of_birth,round(sum(COALESCE(total_reader,0)+COALESCE(avg_vote,0)+COALESCE(total_commenters,0)
    +COALESCE(total_like,0)),2 )as user_rank
FROM `tbl_user`  u 
left join vb_user_wise_vote v on v.poem_owner_id = u.user_id
left join vb_user_wise_total_comments c on c.poem_owner_id = u.user_id
left join vb_user_wise_read_value r on r.poem_owner_id = u.user_id
left join vb_user_wise_like_value l on l.poem_owner_id = u.user_id
 where u.user_type = 'Poet' 
and u.`activation_status` <> 1
and total_reader !=0
group by u.user_id
ORDER BY user_rank desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_famous_poet_view_For_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT u.`user_id`,concat(first_name,' ',last_name)as name,u.picture_small,u.date_of_birth,round(sum(COALESCE(total_reader,0)+COALESCE(avg_vote,0)+COALESCE(total_commenters,0)
    +COALESCE(total_like,0)),2 )as user_rank
FROM `tbl_user`  u 
left join vb_user_wise_vote v on v.poem_owner_id = u.user_id
left join vb_user_wise_total_comments c on c.poem_owner_id = u.user_id
left join vb_user_wise_read_value r on r.poem_owner_id = u.user_id
left join 	vb_user_wise_like_value l on l.poem_owner_id = u.user_id
 where u.user_type = 'Poet' 
and u.`activation_status` <> 1
and total_reader !=0
group by u.user_id
ORDER BY user_rank desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

//    public function all_famous_poem_views() {
//        $sql = "SELECT `tbl_poems`.`user_id`,tbl_poems.poem_id,tbl_user.`insert_date` ,CONCAT(first_name, '' ,last_name) as Name,`picture_small`, `tbl_poems`.`title`,`tbl_poems`.`body`,`tbl_poems`.`read_value` FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = `tbl_poems`.user_id where read_value >0 and tbl_user.`user_type`='Famous Poet' and tbl_poems.poem_activation != 1 order by read_value desc LIMIT 0 , 9";
//        $query_result = $this->db->query($sql);
//        $result = $query_result->result();
//        return $result;
//    }

    public function famous_poem_view() {
//        $sql = 'SELECT tbl_poems.poem_id,tbl_poems.user_id,@acount:=@acount+1 serial_number,concat( `first_name` ,\' \', `last_name`) name,tbl_poems.title,tbl_poems.aboutp,tbl_poems.read_value FROM (SELECT @acount:= 0) AS acount,`tbl_user` inner join tbl_poems on `tbl_user`.user_id = tbl_poems.user_id WHERE `tbl_user`.user_type = \'poet\' and tbl_poems.poem_activation != 1 order by read_value desc limit 0,17';
        $sql = "SELECT p.poem_id,u.user_id, p.title,concat( `first_name` ,' ', `last_name`) name,sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on p.user_id = u.user_id
where poem_activation !=1
and u.activation_status !=1
and user_type = 'poet'
and total_read_value !=0
group by p.poem_id order by top_poem desc limit 0,17";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poem_page_famous_poem_view() {
        $sql = "SELECT p.poem_id,u.user_id,@acount:=@acount+1 serial_number, p.title,concat( `first_name` ,' ', `last_name`) name,sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM (SELECT @acount:= 0) AS acount,`tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on p.user_id = u.user_id
where poem_activation !=1
and u.activation_status !=1
and user_type = 'poet'
and total_read_value !=0
group by p.poem_id order by top_poem desc limit 0,17";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_famous_poem_views() {
        $sql = "SELECT user_type,p.poem_id,p.title,p.body,p.poem_submit_date as insert_date,u.picture_small,concat( `first_name` ,' ', `last_name`) Name,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on p.user_id = u.user_id
where poem_activation !=1
and user_type = 'poet'
and total_read_value !=0
group by p.poem_id order by top_poem desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function famous_poems_Pagination($num, $offset) {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT user_type,p.poem_id,p.title,p.body,p.poem_submit_date as insert_date,u.picture_small,concat( `first_name` ,' ', `last_name`) Name,total_comments_multiple,avg_vote,total_read_value,total_like,
sum(COALESCE(c.total_comments_multiple,0)+COALESCE(v.avg_vote,0)+COALESCE(r.total_read_value,0)+COALESCE(l.total_like,0))as top_poem
FROM `tbl_poems` p
left join vb_poem_wise_total_comments c on p.poem_id = c.poem_id
left join vb_poem_wise_total_vote v on p.poem_id = v.poem_id
left join vb_poem_wise_total_read_value r on p.poem_id = r.poem_id
left join vb_poem_wise_total_like l on p.poem_id = l.poem_id
left join tbl_user u on p.user_id = u.user_id
where poem_activation !=1
and user_type = 'poet'
and total_read_value !=0
group by p.poem_id order by top_poem desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    public function famous_poems_Pagination1($num, $offset) { /* select poem For Pagination .  */
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT `tbl_poems`.`user_id`,tbl_poems.poem_id,tbl_user.`insert_date` ,CONCAT(first_name, '' ,last_name) as Name,`picture_small`, `tbl_poems`.`title`,`tbl_poems`.`body`,`tbl_poems`.`read_value` FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = `tbl_poems`.user_id where read_value >0 and tbl_user.`user_type`='Famous Poet' and tbl_poems.poem_activation != 1 order by read_value desc LIMIT $offset,$num";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function member_view() {
        $sql = 'SELECT tbl_poems.poem_id,tbl_poems.user_id,@acount:=@acount+1 serial_number,concat( `first_name` ,\' \', `last_name`) name,tbl_poems.title,tbl_poems.aboutp,tbl_poems.read_value FROM (SELECT @acount:= 0) AS acount,`tbl_user` inner join tbl_poems on `tbl_user`.user_id = tbl_poems.user_id WHERE `tbl_user`.user_type = \'member\' and tbl_poems.poem_activation != 1 order by read_value desc limit 0,16';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function member_poet_view() {
        $sql = "SELECT `user_id` , `picture_small` , concat( `first_name` ,' ', `last_name` ) name, `date_of_birth`
FROM `tbl_user`
WHERE `user_type` = 'member'
and activation_status !=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function member_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT  `user_id` ,  `picture_small` , CONCAT(  `first_name` ,  ' ',  `last_name` ) name,  `date_of_birth` 
FROM  `tbl_user` 
WHERE  `user_type` =  'member'
AND activation_status !=1 LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    public function member_Pagination1($num, $offset) { /* select poem For Pagination .  */
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT `user_id` , `picture_small` , concat( `first_name` ,' ', `last_name` ) name, `date_of_birth`
FROM `tbl_user`
WHERE `user_type` = 'member'
and activation_status !=1 LIMIT $offset,$num";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poems By User Id .  */

    public function select_userBy_user_type() { /* select poems By User Id .  */
        $sql = "SELECT `user_type` FROM `tbl_user` WHERE `user_type` = 'Famous Poet'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function famous_poet_detail_view() {
        $sql = ''
                . ' SELECT `tbl_poems`.`poem_id`, @acount:=@acount+1 serial_number,`tbl_poems`.`user_id`,COUNT(`poem_id`) total_poem,CONCAT(first_name, " ",last_name) '
                . ' as name,`read_value`,`date_of_birth`,`picture_small`'
                . ' FROM (SELECT @acount:= 0) AS acount,`tbl_user`'
                . ' INNER JOIN `tbl_poems`'
                . ' ON `tbl_user`.`user_id`=`tbl_poems`.`user_id` where `user_type` = \'famous poet\' group by `tbl_poems`.user_id'
                . ' ORDER BY serial_number';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poem For Pagination .  */

    public function selectuserForPagination($num, $offset) { /* select poem For Pagination .  */
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT `tbl_poems`.`poem_id`, `tbl_poems`.`user_id`,COUNT(`poem_id`) total_poem,CONCAT(first_name,'',last_name) as name,`read_value`,`date_of_birth`,`picture_small` FROM tbl_user INNER JOIN `tbl_poems` ON `tbl_user`.`user_id`=`tbl_poems`.`user_id` where `user_type` = 'famous poet' and activation_status !=1 group by `tbl_poems`.user_id LIMIT $offset,$num";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function famous_poem_paginations777($num, $offset) {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT `tbl_poems`.`user_id`,tbl_poems.poem_id,tbl_user.`insert_date` ,CONCAT(first_name,' ',last_name) as Name,`picture_small`, `tbl_poems`.`title`,`tbl_poems`.`body`,`tbl_poems`.`read_value` FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = `tbl_poems`.user_id where read_value >0 and tbl_user.`user_type`='Famous Poet' and poem_activation != 1 order by read_value desc LIMIT $offset,$num ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function some_category_view() {
        $sql = 'SELECT * FROM `tbl_poems_category` WHERE 1 LIMIT 0, 21';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* / this function for category view in home */

    public function total_famous_poet() {
//        $sql = 'SELECT `tbl_user`.user_id,count(`user_type`)as famous_poet FROM `tbl_user` WHERE `user_type` =\'famous poet\'';
        $sql = "SELECT `tbl_user`.user_id,user_type,count(`user_type`)as famous_poet FROM `tbl_user` WHERE `user_type` ='poet' and `activation_status`=0 group by user_type";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* / this function for category view in home */

    public function total_member_poet() {
        $sql = "SELECT `tbl_user`.user_id,user_type,count(`user_type`)as member_poet FROM `tbl_user` WHERE `user_type` ='member' and `activation_status`=0 group by user_type";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* / this function for category view in home */

    public function total_poet() {
        $sql = 'SELECT `tbl_user`.user_id,count(`user_type`)poet FROM `tbl_user` WHERE `user_type` =\'poet\' and `activation_status`=0';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* / this function for category view in home */

    public function total_member() {
        $sql = 'SELECT `tbl_user`.user_id,count(`user_type`)member FROM `tbl_user` WHERE `user_type` =\'member\' and `activation_status`=0';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* / this function for category view in home */

    public function category_view_poem_page() {
        $sql = 'SELECT poems_category_id,`poems_category_name` FROM `tbl_poems_category` order by poems_category_name limit 0 ,21';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /*  category details view */

    public function select_category_detail() {
        $sql = 'select * from tbl_poems_category';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function famous_poet() {
        $sql = "SELECT `tbl_user`.user_id,picture_small,concat( `first_name` ,' ', `last_name`) name FROM `tbl_user` WHERE `user_type`='Famous Poet' order by first_name ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poem For Pagination .  */

    public function total_famous_poet_Pagination($num, $offset) { /* select poem For Pagination .  */
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT `tbl_user`.user_id,picture_small,concat( `first_name` ,' ', `last_name`) name FROM `tbl_user` WHERE `user_type`='Famous Poet' order by first_name LIMIT $offset,$num";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

}

?>
