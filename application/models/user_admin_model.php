<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Description of user_admin_model
 *
 * @author Bdjobs
 */

class User_Admin_Model extends CI_Model {

//put your code here
//This code for save poem Info

    public function savepoemInfo($data) {      //This code for save poem Info
        $this->db->insert('tbl_poems', $data);
    }

//This code for check Duplicate Vote

    function checkDuplicateVote($user_id) { //This code for check Duplicate Vote
        $this->db->select('*');
        $this->db->from('tbl_vote');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        if (count($query_result->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* select poem by user Id.  */

    public function selectpoemByUserId($user_id) { /* select poem by user Id.  */
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('poem_activation', '!=1');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function poem_by_userId($user_id) {
        $sql = "SELECT * FROM `tbl_poems` p
inner join tbl_poems_category c on p.poems_category_id = c.poems_category_id
WHERE `user_id` = '$user_id' and poem_activation !=1 ORDER BY poem_submit_date DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poem by poem Id.  */

    public function selectpoemBypoemId($poem_id) { /* select poem by poem Id.  */
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('poem_id', $poem_id);
//        $this->db->where('poem_activation','1');
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_like_poet_pic_view($poem_id) {
        $sql = "SELECT `like_id`,`poem_id`,u.user_id,
        u.picture_small,concat(u.first_name,' ',u.last_name)as name
        FROM tbl_like as l INNER JOIN tbl_user AS u ON u.user_id  = l.user_id
        WHERE l.poem_id = '$poem_id'
        order by `like_id` desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function total_read_value($poem_id) {
        $sql = "SELECT poem_id,count(`ip_address`)as total_read_value FROM `tbl_read_value`where poem_id = '$poem_id' group by poem_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    public function select_collection_pic_view($poem_id) {
        $sql = "SELECT  `collection_id` ,  `poem_id` , u.user_id, u.picture_small, CONCAT(u.first_name,' ', u.last_name) AS name
                FROM tbl_collection AS c
                INNER JOIN tbl_user AS u ON u.user_id = c.user_id
                WHERE c.poem_id =  '$poem_id'
                ORDER BY  `collection_id` DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select_total_collection.  */

    public function select_total_collection($poem_id) { /* select poem by poem Id.  */
        $sql = "SELECT  count(`user_id`)as total_collection FROM  `tbl_collection` WHERE  `poem_id` = $poem_id GROUP BY poem_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function view_like_data($poem_id) {
        $sql = "SELECT  count(`like_value`)as total_like FROM  `tbl_like` WHERE  `poem_id` =$poem_id GROUP BY poem_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poem by poem Id.  */

    public function selectusersByuserId($user_id) { /* select poem by poem Id.  */
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

//    public function poet_rank($poem_id) {
//
//        $sql = "SELECT    `poem_id`,
//          `user_id`,
//          `title`,`read_value`,
//          @curRank := @curRank + 1 AS rank
//FROM      tbl_poems p, (SELECT @curRank := 0) r
//ORDER BY  `read_value` desc";
//        $query_result = $this->db->query($sql);
//        $result = $query_result->result();
//        return $result;
//    }

    /* select poem by poem Id.  */

    public function select_user_By_userId_poet_personal($user_id) { /* select poem by poem Id.  */
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    /* Search poem title by text .  */

    public function searchpoemInfo($search_text, $user_id) { /* Search poem title by text .  */
        $sql = "SELECT *  FROM tbl_poems WHERE title='$search_text'AND user_id='$user_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function category_view() {
        $sql = "SELECT  poems_category_id ,poems_category_name  FROM tbl_poems_category ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* update poem Info .  */

    public function updatepoemInfo($data) { /* update poem Info .  */
        $this->db->set('poem_id', $data['poem_id']);
        $this->db->set('title', $data['title']);
        $this->db->set('body', $data['body']);
        $this->db->set('aboutP', $data['aboutP']);
        $this->db->where('story', $data['story']);
        $this->db->update('tbl_poems');
    }

    /* this function for search aboutp .  */

    public function searchaboutp($search_text, $user_id) { /* search aboutp .  */
        $sql = "SELECT *  FROM tbl_poems WHERE aboutp='$search_text'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poem all .  */

    public function selectpoemAll($user_id) { /* select poem all .  */
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    /* update poems by user .  */

    public function updatepoemsbyuser($data) { /* update poems by user . */
        $this->db->set('lastchange', $data['lastchange']);
        $this->db->set('body', $data['body']);
        $this->db->where('poem_id', $data['poem_id']);
        $this->db->update('tbl_poems');
    }

    /* delete poem. */

    public function deletepoem($poem_id) { /* delete poem  .  */
        $this->db->where('poem_id', $poem_id);
        $this->db->delete('tbl_poems');
    }

    /* select poems By User Id .  */

    public function selectpoemsByUserId($user_id) { /* select poems By User Id .  */
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    /* select poem For Pagination .  */

    public function selectpoemForPagination($user_id, $num, $offset) { /* select poem For Pagination .  */
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('poem_activation', '!=1');
        $this->db->order_by("poem_submit_date", "desc");
        $query_result = $this->db->get('', $num, $offset);
        $result = $query_result->result();
        return $result;
    }

    /* select poem For Pagination .  */

    public function select_poem_by_user_id_ForPagination($user_id, $num, $offset) { /* select poem For Pagination .  */
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM `tbl_poems` p
inner join tbl_poems_category c on p.poems_category_id = c.poems_category_id
WHERE `user_id` = '$user_id' and poem_activation !=1 ORDER BY poem_submit_date DESC LIMIT $offset,$num ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
//        $this->db->select('*');
//        $this->db->from('tbl_poems');
////      $this->db->join('tbl_poems_category', 'tbl_poems.poems_category_id = tbl_poems_category.poems_category_id');
//        $this->db->where('user_id', $user_id);
//        $this->db->where('poem_activation', '!=1');
//        $this->db->order_by("poem_submit_date", "desc");
//        $query_result = $this->db->get('', $num, $offset);
//        $result = $query_result->result();
//        return $result;
    }

    /* select user Byuser Id .  */

    public function selectuserByuserId($user_id) { /* select user Byuser Id .  */
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    /* update user Info .  */

    public function updateuserInfo($data) { /* update user Info .  */
        $this->db->set('first_name', $data['first_name']);
        $this->db->set('last_name', $data['last_name']);
        $this->db->set('email_address', $data['email_address']);
        $this->db->set('blood_group', $data['blood_group']);
        $this->db->set('address', $data['address']);
        $this->db->set('city', $data['city']);
        $this->db->set('country', $data['country']);
        $this->db->set('gender', $data['gender']);
        $this->db->set('zip_code', $data['zip_code']);
        $this->db->set('user_pictures', $data['user_pictures']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    /* comments save. */

    public function comments_save($data) { /* comments save. */
        $this->db->insert('tbl_comments_poem', $data);
    }

    public function get_comments_by_poem($poem_id) {
//        $sql = "SELECT `user_id` as poem_owner_id,`poem_id` FROM `tbl_poems` WHERE `poem_id` = '$poem_id'";
//        $query_result = $this->db->query($sql);
        $this->db->select('`user_id` as poem_owner_id,`poem_id`');
        $this->db->from('tbl_poems');
        $this->db->where('poem_id', $poem_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function get_poem_owner_id_read_value($poem_id) {
//        $sql = "SELECT `user_id` as poem_owner_id,`poem_id` FROM `tbl_poems` WHERE `poem_id` = '$poem_id'";
//        $query_result = $this->db->query($sql);
        $this->db->select('`user_id` as poem_owner_id');
        $this->db->from('tbl_poems');
        $this->db->where('poem_id', $poem_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    /* poet comments insert */

    public function poet_comments_insert($data) { /* poet comments insert */
        $this->db->insert('tbl_comments_poet', $data);
    }

    /* poet comments insert */

    public function send_message_poet_insert($data) { /* poet comments insert */
        $this->db->insert('tbl_message', $data);
    }

    /* poet comments insert */

    public function data_insert_draft($data) { /* poet comments insert */
        $this->db->insert('tbl_message', $data);
    }

    /* avarage vote of poems. */

    public function avaragevoteofpoems($user_id) { /* avarage vote of poems. */
        $this->db->select_AVG('poem_vote');
        $this->db->from('tbl_vote');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function avaragevoteofpoem() {

        $this->db->select('aboutP');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_poems.user_id');
        $query_result = $this->db->get();
        $results = $query_result->result();
        return $results;
    }

    //select user Id 

    public function selectuserId_poet_info($poem_owner_id) { //select user Id vw_poet_page_poem        
        $sql = "SELECT tbl_vote.user_id,tbl_vote.poem_id,count(NULLIF(tbl_vote.poem_vote,0)) as vote,"
                . "round(AVG(NULLIF(tbl_vote.poem_vote ,0)),2)as rate, tbl_poems.title "
                . ""
                . "FROM tbl_vote inner join tbl_poems on tbl_vote.poem_id = tbl_poems.poem_id "
                . "where tbl_vote .poem_owner_id = '$poem_owner_id'"
                . " group by poem_id order by poem_id desc limit 0,30";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function category_wise_poem_view($poems_category_id) { /* select poems By User Id .  */
        $sql = "SELECT `poem_id`,tbl_poems.`user_id`,tbl_poems_category.poems_category_name,tbl_poems.`poems_category_id`,`title`,`body`, concat(first_name ,' ',last_name)as name 
            FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
inner join tbl_poems_category on tbl_poems_category.poems_category_id = tbl_poems.poems_category_id 

WHERE tbl_poems.`poems_category_id`= $poems_category_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function category_wise_poem_view_Pagination($poems_category_id) { /* select poem For Pagination .  */
        $sql = "SELECT `poem_id`,tbl_poems.`user_id`
         ,tbl_poems_category.poems_category_name,tbl_poems.`poems_category_id`,
         `title`,`body`, concat(first_name ,' ',last_name)as name 
             
FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
inner join tbl_poems_category on tbl_poems_category.poems_category_id = tbl_poems.poems_category_id 
WHERE tbl_poems.`poems_category_id`= $poems_category_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function selectuserForPagination() { /* select poem For Pagination .  */
        $sql = "SELECT `poem_id`,tbl_poems.`user_id`,tbl_poems_category.poems_category_name,tbl_poems.`poems_category_id`,`title`,`body`, concat(first_name ,' ',last_name)as name FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
inner join tbl_poems_category on tbl_poems_category.poems_category_id = tbl_poems.poems_category_id 

WHERE tbl_poems.`poems_category_id`= $poems_category_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function category_wise_poem_view_Pagination333($num, $offset) {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT `poem_id`,tbl_poems.`user_id`,tbl_poems_category.poems_category_name,tbl_poems.`poems_category_id`,`title`,`body`, concat(first_name ,' ',last_name)as name 
             FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = tbl_poems.user_id
inner join tbl_poems_category on tbl_poems_category.poems_category_id = tbl_poems.poems_category_id 

WHERE tbl_poems.`poems_category_id`= $poems_category_id LIMIT $offset,$num ";
//        $sql = "SELECT `tbl_poems`.`user_id`,tbl_poems.poem_id,tbl_user.`insert_date` ,CONCAT(first_name,' ',last_name) as Name,`picture_small`, `tbl_poems`.`title`,`tbl_poems`.`body`,`tbl_poems`.`read_value` FROM `tbl_poems` inner join tbl_user on tbl_user.user_id = `tbl_poems`.user_id where read_value >0 and tbl_user.`user_type`='Famous Poet' and poem_activation != 1 order by read_value desc LIMIT $offset,$num ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function category_wise_poem_view_title($poems_category_id) {
        $sql = "SELECT tbl_poems_category.poems_category_name,tbl_poems.`poems_category_id`FROM `tbl_poems` inner join tbl_poems_category on tbl_poems_category.poems_category_id = tbl_poems.poems_category_id 
WHERE tbl_poems.`poems_category_id`= $poems_category_id limit 0,1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select user Id 

    public function poet_page_pagination($user_id) { //select user Id vw_poet_page_poem        
        $sql = "SELECT tbl_vote.user_id,tbl_vote.poem_id,count(NULLIF(tbl_vote.poem_vote,0)) as vote,round(AVG(NULLIF(tbl_vote.poem_vote ,0)),2)as rate, tbl_poems.title FROM tbl_vote inner join tbl_poems on tbl_vote.poem_id = tbl_poems.poem_id where tbl_vote .user_id = '$user_id' group by poem_id order by poem_id desc limit 1,30";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select total vote poet personal

    public function poem_vote_by_poem($user_id) {//select total vote poet personal        
        $sql = "SELECT count( poem_vote ) as vote , `tbl_vote` . user_id , `tbl_vote` . poem_id FROM `tbl_vote` where user_id = '$user_id' group by poem_id order by poem_id desc LIMIT 0, 30 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poempage_comments_by_poem($user_id) {
        $sql = "SELECT count( user_id ) as total_comments , poem_id , comments_id , user_id FROM `tbl_comments_poem` where user_id = '$user_id' group by poem_id order by poem_id desc LIMIT 0, 30 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select total vote poet personal

    public function poem_comments_by_poem($user_id) {//select total vote poet personal        
        $sql = "SELECT count( tbl_comments_poem . user_id ) as comments_poem , tbl_comments_poem . user_id , tbl_comments_poem . poem_id FROM `tbl_comments_poem` WHERE tbl_comments_poem . user_id = '$user_id' group by poem_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select total vote poet personal

    public function poet_personal_poem_votes($poem_owner_id) {//select total vote poet personal
        $sql = "SELECT count(`poem_owner_id`)as total_vote FROM `tbl_vote` WHERE `poem_owner_id`='$poem_owner_id' group by poem_owner_id";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

//select total vote poet personal

    public function poet_poem_comments_count($poem_owner_id) {//select total vote poet personal
        $sql = "SELECT count(`poem_owner_id`)as comments FROM `tbl_comments_poem` WHERE `poem_owner_id`='$poem_owner_id' group by `poem_owner_id`";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select user submit date poet 
    public function sign_up_date($user_id) {//select user submit date poet 
        $sql = "SELECT user_id,`tbl_user` . `insert_date` FROM `tbl_user` WHERE `tbl_user` . user_id = '$user_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select user submit date poet 
    public function poet_personal_data_view($user_id) {//select user submit date poet 
        $sql = "SELECT user_id,concat(first_name,' ',last_name,'  ',date_of_birth,'  ',city,'  ',country)as poet_info FROM `tbl_user` WHERE user_id ='$user_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function delete_rank() {
//        $this->db->from('tbl_rank'); 
//        $this->db->truncate(); 
//$this->db->truncate('tbl_rank'); 

        $sql = "drop TABLE tbl_rank";
        $this->db->query($sql);
//        $this->db->empty_table('tbl_rank');
    }

    public function create_table_rank() {
        $sql = "
               CREATE TABLE IF NOT EXISTS `tbl_rank` (
              `rank_id` int(15) NOT NULL AUTO_INCREMENT,
              `user_id` int(15) NOT NULL,
              `rank_no` int(17) NOT NULL,
              `rank_value` int(19) NOT NULL,
              PRIMARY KEY (`rank_id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;";
        $this->db->query($sql);
    }

    public function insert_rank_data() {
        $sql = " insert into tbl_rank (user_id,rank_no,rank_value)                       
                 select  user_id, @acount:=@acount +1 serial_number,          
                 user_rank from  (SELECT @acount:= 0) AS acount,vb_poet_rank";
        $this->db->query($sql);
    }

    public function poet_rank($user_id) {
        $sql = "SELECT rank_no,rank_value,user_id FROM `tbl_rank` where tbl_rank.`user_id` ='$user_id' AND rank_value !=0";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function total_poet_in_rank() {
        $sql = "SELECT count(user_id)as total_top_poet FROM `tbl_rank` where rank_value !=0";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // select manage poem welcome name

    public function manage_poem_name($user_id) {// select manage poem welcome name
        $sql = "select concat(first_name,' ',last_name)as name from tbl_user where user_id = '$user_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function total_poem_manage_poem($user_id) {
        $sql = "SELECT COUNT( poem_id ) AS total_poem
FROM  `tbl_poems` p
INNER JOIN tbl_poems_category c ON p.poems_category_id = c.poems_category_id
WHERE  `user_id` = $user_id and poem_activation !=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select user picture user
    public function poet_picture($user_id) {//select user picture user
        $sql = "SELECT concat(first_name,' ',last_name)as name,user_id,`picture_small`,biography FROM `tbl_user` WHERE `user_id` = '$user_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //update user biography_m

    public function update_user_biography_m($data) {  //update user biography_m
        $this->db->set('place_of_birth', $data['place_of_birth']);
        $this->db->set('date_of_birth', $data['date_of_birth']);
        $this->db->set('biography', $data['biography']);
        $this->db->set('published_books', $data['published_books']);
        $this->db->set('lastchange', $data['lastchange']);
        $this->db->set('verification_code', $data['verification_code']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    //update user biography_m

    public function eduction_profession_update($data) {  //update user biography_m
        $this->db->set('password', $data['password']);
        $this->db->set('verification_code', $data['verification_code']);
        $this->db->set('education', $data['education']);
        $this->db->set('profession', $data['profession']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    //select user Id for small pic

    public function selectuserId_for_small_pic($user_id) {   //select user Id for small pic
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    //update small pic user_m

    public function update_small_pic_user_m($data) {  //update small pic user_m
        $this->db->set('picture_small', $data['picture_small']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    //update/edit normalpicture

    public function update_normal_pic_user_m($data) {  // this query for update/edit data normal picture
        $this->db->set('user_pictures', $data['user_pictures']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tbl_user');
    }

    //select poem comments

    public function select_poem_comments($user_id) {  //select poem comments
        $sql = "SELECT tbl_comments_poem.`comments_id` , concat(
tbl_user.first_name,' ',last_name
) AS member,tbl_user.picture_small, tbl_comments_poem.user_id, tbl_comments_poem.`poem_id` , tbl_poems.title, tbl_comments_poem.`comments_post_date` , tbl_comments_poem.`comments`
FROM tbl_comments_poem 
INNER JOIN tbl_poems ON tbl_poems.`poem_id` = tbl_comments_poem.`poem_id`
INNER JOIN tbl_user ON tbl_user.user_id = tbl_comments_poem.user_id 
where tbl_poems.user_id  = '$user_id'
ORDER BY `comments_id` DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select poem comments

    public function select_poet_comments($user_id) {  //select poem comments
        $sql = "SELECT tbl_comments_poet.comments_poet_id,concat (
tbl_user.first_name,' ',last_name
) AS member,tbl_user.`picture_small`, tbl_comments_poet.user_id, tbl_comments_poet.`poets_id` , tbl_comments_poet.`date_comments_poet` , tbl_comments_poet.`comments_poet`
FROM tbl_comments_poet 

INNER JOIN tbl_user ON tbl_user.user_id = tbl_comments_poet.`user_id` 
where tbl_comments_poet.`poets_id`  = '$user_id'
ORDER BY `comments_poet_id` DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // this query for remove comments data

    public function delete_comment($comments_id) {      // this query for remove comments data
        $this->db->where('comments_id', $comments_id);
        $this->db->delete('tbl_comments_poem');
    }

    // this query for all poems data

    public function view_all_poem() { // this query for all poems data
        $sql = "SELECT activation_status,concat(first_name,'',last_name)as name,poem_id,`picture_small`,`title`,`poem_submit_date`,`read_value`
FROM tbl_poems 
inner join tbl_user on tbl_poems.user_id = tbl_user.user_id
where poem_activation !=1 
and tbl_user.activation_status !=1
order by read_value desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_all_new_poem_For_Pagination($num, $offset) { // retrives product information from tbl_product table if it has a feature
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT concat(first_name,'',last_name)as name,poem_id,`picture_small`,`title`,`body`,`poem_submit_date`,`read_value`
FROM tbl_poems 
inner join tbl_user on tbl_poems.user_id = tbl_user.user_id 
WHERE poem_id and  poem_activation !=1
and tbl_user.activation_status != 1
order by poem_submit_date desc LIMIT $offset,$num";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    /* This function for poet page poems view */

//     public function select_poem_For_poet_page_Pagination($user_id,$offset,$num) { // retrives product information from tbl_product table if it has a feature
//        if ($offset == NULL) {
//            $offset = 0;
//        }
////        $sql = "SELECT concat(first_name,'',last_name)as name,poem_id,`picture_small`,`title`,`body`,`poem_submit_date`,`read_value`
////FROM tbl_poems inner join tbl_user on
////tbl_poems.user_id = tbl_user.user_id WHERE poem_id and  poem_activation !=1
////order by read_value desc LIMIT $offset,$num";
//        $sql = "SELECT tbl_poems.`user_id`,`poem_id`,tbl_poems.poem_submit_date,`title` FROM `tbl_user` join tbl_poems on tbl_user.user_id = tbl_poems.user_id where tbl_poems.user_id= '$user_id' order by poem_submit_date desc LIMIT $offset,$num";
//        
//        $resultSet = $this->db->query($sql);
//        $result = $resultSet->result();
//        return $result;
//    }

    public function poets_poem_For_Pagination($poets_id) { // retrives product information from tbl_product table if it has a feature
        $sql = "SELECT tbl_vote.user_id,tbl_vote.poem_id,count(NULLIF(tbl_vote.poem_vote,0)) as vote,round(AVG(NULLIF(tbl_vote.poem_vote ,0)),2)as rate, tbl_poems.title FROM tbl_vote inner join tbl_poems on tbl_vote.poem_id = tbl_poems.poem_id where tbl_vote .user_id = '$poets_id' group by poem_id order by poem_id desc";
        $resultSet = $this->db->query($sql);
        $result = $resultSet->result();
        return $result;
    }

    // this query for all poems page

    public function view_all_poem_page() { // this query for all poems page
        $sql = 'SELECT tbl_poems.poem_id,tbl_poems.user_id,CONCAT(first_name, "  ",last_name) 
as Name,(tbl_poems.title) Poem,( tbl_user. user_pictures ) as pictures ,poem_submit_date  
                 FROM `tbl_poems` 
                 INNER JOIN tbl_user ON tbl_user . `user_id` = tbl_poems . `user_id` 
                 where poem_activation !=1
                 and tbl_user.activation_status !=1
                order by tbl_poems.poem_submit_date desc 
                 LIMIT 0, 8';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    //select poem comments

    public function selectuserId($user_id) {  //select poem comments
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    // this code for poets poem page

    public function personal_page_data_poem($user_id) { // this code for poets poem page
        $sql = "SELECT tbl_poems.`user_id`,`poem_id`,tbl_poems.poem_submit_date,`title` FROM `tbl_user` join tbl_poems on tbl_user.user_id = tbl_poems.user_id where tbl_poems.user_id= '$user_id' order by poem_submit_date desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    // this code for poem comments page

    public function personal_page_poet_comments($poets_id) {  // this code for poem comments page
        $sql = "SELECT tbl_comments_poet .`user_id`,concat(`tbl_user`.`first_name`,' ',`last_name`)as name,`date_comments_poet`, `tbl_user`.picture_small,`comments_poet` FROM tbl_comments_poet inner join tbl_user on tbl_user.user_id = tbl_comments_poet.user_id WHERE tbl_comments_poet .poets_id = '$poets_id' order by comments_poet_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /*  this function for picture view in poem detail */

    public function poem_detail_pic($poem_id) {
        $sql = "SELECT tbl_poems . poem_id ,concat(first_name,'  ',last_name)as name, tbl_user .user_pictures , tbl_user . `user_id` FROM `tbl_user` inner join tbl_poems on tbl_user . user_id = tbl_poems . user_id WHERE tbl_poems.`poem_id` = '$poem_id' LIMIT 0, 30 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /*  this function for poem detail */

    public function poem_details($poem_id) {
        $sql = "SELECT tbl_vote.user_id,tbl_vote.poem_id,count(NULLIF(tbl_vote.user_id,0)) as 

vote,round(AVG(NULLIF(tbl_vote.poem_vote ,0)),2)as rate, 

tbl_poems.title FROM tbl_vote inner join tbl_poems on tbl_vote.poem_id 

= tbl_poems.poem_id where  tbl_vote.poem_id = '$poem_id' group by tbl_poems.poem_id 

order by tbl_poems.poem_id desc limit 0,1;";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function total_voter($poem_id) {
        $sql = "SELECT count(user_id) as id FROM `tbl_vote` WHERE poem_id = '$poem_id' limit 0,1;";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

    //this query for comments show with poem for poem detail page

    public function poem_details_comments() {//this query for comments show with poem for poem detail page
        $sql = "SELECT `user_id` , `poem_id` , `comments` FROM `tbl_comments_poem` WHERE poem_id = '$poem_id' LIMIT 0, 30 ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* comments save. */

    public function id_poem_insert_in_read_value($datap) { /* comments save. */
        $sql = 'SELECT `poem_id`,`title`,`poem_submit_date` FROM `tbl_poems` order by poem_id desc limit 0,1';
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* update poems by user .  */

    public function update_poem_read_value($datap) { /* update poems by user . */
        $this->db->insert('tbl_read_value');
    }

    public function most_popular_poets() {
//        $sql = "SELECT @acount:=@acount+1 serial_number,concat(first_name,'',last_name) as name,country, `read_value` FROM (SELECT @acount:= 0) AS acount, `tbl_poems` inner join tbl_user on tbl_poems.user_id = tbl_user.user_id where read_value >0 order by read_value desc limit 0,13";
        $sql = "SELECT tbl_poems.`user_id`,concat(first_name,'',last_name)as name,country,sum(`read_value`) as read_value
FROM tbl_poems inner join tbl_user on tbl_poems.user_id = tbl_user.user_id where `read_value`>0
and poem_activation !=1
and activation_status !=1
GROUP BY tbl_poems.`user_id` order by `read_value` DESC limit 1,17 ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function most_popular_poets_detail() {
        $sql = "SELECT tbl_poems.`user_id`,concat(first_name,'',last_name)as name,country,sum(`read_value`) as read_value
FROM tbl_poems inner join tbl_user on tbl_poems.user_id = tbl_user.user_id where `read_value`>0
and poem_activation !=1
and activation_status !=1
GROUP BY tbl_poems.`user_id` order by `read_value` DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poem_wise_most_popular_poet() {
        $sql = "SELECT tbl_poems.`user_id`,concat(first_name,'',last_name)as name,country,title,`read_value`
FROM tbl_poems inner join tbl_user on tbl_poems.user_id = tbl_user.user_id where `read_value`>0
and poem_activation !=1
and activation_status !=1
order by `read_value` DESC";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function most_popular_poem($user_id) {
        $sql = "SELECT poem_id, tbl_poems.`user_id`,concat(first_name,'',last_name)as name,country,title,`poem_submit_date`,`read_value`
FROM tbl_poems inner join tbl_user on tbl_poems.user_id = tbl_user.user_id where `read_value`>0 and tbl_poems.user_id = '$user_id'
and poem_activation !=1 
order by `read_value` DESC ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function inbox_data($poets_id) {
        $sql = "SELECT COUNT( poets_id ) AS user_id FROM  `tbl_message`WHERE poets_id ='$poets_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function send_data($user_id) {
        $sql = "SELECT count(`user_id`) as send_id FROM `tbl_message` WHERE `user_id` = '$user_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function message_details($message_id) {
        $sql = "SELECT message_id,tbl_message.user_id,concat (`first_name`,' ',`last_name`)as name,user_pictures,country,city,gender,`subject`,`message_detail`,`message_date` FROM `tbl_message` inner join tbl_user on tbl_message.user_id = tbl_user.user_id where `message_id` = '$message_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function send_mail_details($message_id) {
        $sql = "SELECT message_id,tbl_message.user_id,concat (`first_name`,' ',`last_name`)as name,user_pictures,country,city,gender,`subject`,`message_detail`,`message_date` FROM `tbl_message` inner join tbl_user on tbl_message.poets_id = tbl_user.user_id where `message_id` = '$message_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function sum_comments($poem_id) {

        $sql = "SELECT tbl_user.user_id,tbl_poems.user_id,tbl_comments_poem.`user_id`,count(tbl_comments_poem.user_id) as total_comments,tbl_user.picture_small,concat(first_name,'',last_name)as name,tbl_comments_poem.`poem_id`,`comments`,
`comments_post_date` FROM `tbl_comments_poem`
 inner join tbl_user on tbl_comments_poem.user_id = tbl_user.user_id 
 inner join tbl_poems on tbl_comments_poem.poem_id = tbl_poems.poem_id 
WHERE tbl_comments_poem.poem_id = '$poem_id'
order by comments_post_date desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poem_comments_view($poem_id) {
        $sql = "SELECT tbl_user.user_id,tbl_comments_poem.`user_id`,tbl_user.picture_small,concat(first_name,' ',last_name)as name,tbl_comments_poem.`poem_id`,`comments`,
                `comments_post_date` FROM `tbl_comments_poem`
                left join tbl_user on tbl_user.user_id  = tbl_comments_poem.user_id
                left join tbl_poems on tbl_poems.poem_id =  tbl_comments_poem.poem_id
                WHERE tbl_comments_poem.poem_id = '$poem_id'
                order by comments_post_date desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function poem_view_download($user_id) {
        $sql = "SELECT concat (first_name,'',last_name) as name,`title`,`body`,`poem_submit_date` FROM `tbl_poems` inner join tbl_user on tbl_poems.user_id = tbl_user.user_id WHERE tbl_poems.user_id = '$user_id' and poem_activation !=1";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* this query for  poem title wise view in poem download */

    public function poem_view_title($user_id) {
        $sql = "SELECT concat (first_name,'',last_name) as name,`title`,`body`,`poem_submit_date` FROM `tbl_poems` inner join tbl_user on tbl_poems.user_id = tbl_user.user_id WHERE tbl_poems.user_id = '37'
order by title";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function message_title_view($message_id) {
        $sql = "SELECT message_id,tbl_message.user_id,concat (`first_name`,' ',`last_name`)as name,`subject`,`message_detail`,`message_date` FROM `tbl_message` inner join tbl_user on tbl_message.user_id = tbl_user.user_id where `poets_id` = '$message_id' order by message_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function send_mail_title_view($user_id) {
        $sql = "SELECT message_id,tbl_message.poets_id,tbl_message.`user_id`,concat (`first_name`,' ',`last_name`)as name,`subject`,`message_detail`,`message_date` FROM `tbl_message` inner join tbl_user on tbl_message.poets_id = tbl_user.user_id where tbl_message.user_id  = '$user_id' order by tbl_message.message_id desc";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    /* select poem For Pagination .  */

    public function select_category_Pagination($poems_category_id) { /* select poem For Pagination .  */
        $this->db->select('*');
        $this->db->from('tbl_poems');
        $this->db->join('tbl_poems_category', 'tbl_poems_category.poems_category_id =tbl_poems.poems_category_id');
        $this->db->join('tbl_user', 'tbl_user.user_id = tbl_poems.user_id');
        $this->db->where('tbl_poems.poems_category_id', $poems_category_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    /* comments save. */

    public function comments_save_treding($data) { /* comments save. */
        $this->db->insert('tbl_comments_poem', $data);
    }

    /* reply save. */

    public function reply_save_treding($data) { /* reply save. */
        $this->db->insert('tbl_reply', $data);
    }

}

?>
