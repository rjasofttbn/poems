<?php

class Pagination extends CI_Model
{

 //set table name to be used by all functions
 var $table = "SELECT tbl_poems.`user_id`,last_name,tbl_poems.poem_id,
`title`,`body`,`poem_submit_date`,`poem_of_day_date`,tbl_user.picture_small,
count(tbl_comments_poem.poem_id)as total_comments,tbl_poems.read_value,
tbl_vote.poem_vote FROM `tbl_poems`
left join tbl_user on tbl_user.user_id = tbl_poems.user_id
left join tbl_comments_poem on tbl_comments_poem.poem_id = tbl_poems.poem_id
left join tbl_vote on tbl_vote.poem_id = tbl_poems.poem_id
where tbl_user.activation_status !=1
and poem_of_day='pod'
and tbl_poems.poem_id > :last_id
group by tbl_poems.poem_id
order by poem_of_day_date desc LIMIT 0, :limit";

 function fetch_record($limit, $start)
 {
  $this->db->limit($limit, $start);
  
  $query = $this->db->get($this->data);
  return ($query->num_rows() > 0)  ? $query->result() : FALSE;

 }

 function record_count()
 {
  return $this->db->count_all_results('data');
 }

}
