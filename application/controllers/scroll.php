<?php

class Scroll extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
    }

//    public function index() {
//        $this->load->view('index');
//    }
    
//    public function all_poem_of_day() {
//        $data = array();
//        $this->load->model('welcome_model');
//        $data['first_add_home'] = $this->welcome_model->first_add_home();
//        $data['home_add_small'] = $this->welcome_model->home_small_add();
////        $this->load->model('welcome_model');
////        /* bottom_poem_category */
//        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
//        $data['poem_of_day_result'] = $this->welcome_model->poems_of_day();
////
////        $data['two_poem_of_day'] = $this->welcome_model->two_poem_of_day();
////        $data['result'] = $this->welcome_model->all_poem_day();
////        echo '<pre>';
////        print_r($data);
////        exit();
////        $data['result'] = $this->welcome_model->trending_poem_view();
//        $data['maincontent'] = $this->load->view('all_poem_day_view');
//        $this->load->view('home', $data);
//    }
    

    public function ajax() {

// including the config file
        $this->load->view('config.php');
        $pdo = connect();

// get request params
        $last_id = $_POST['last_id'];
        $limit = 5; // default value
        if (isset($_POST['limit'])) {
            $limit = intval($_POST['limit']);
        }

// select items for page params
        try {
            $sql = "SELECT tbl_poems.`user_id`,last_name,tbl_poems.poem_id,
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
            $query = $pdo->prepare($sql);
            $query->bindParam(':last_id', $last_id, PDO::PARAM_INT);
            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
            $query->execute();
            $list = $query->fetchAll();
        } catch (PDOException $e) {
            echo 'PDOException : ' . $e->getMessage();
        }

        $last_id = 0;
        foreach ($list as $rs) {
            $last_id = $rs['poem_id'];
            echo '<li>';
            echo '<h2>' . $rs['title'] . '</h2>';
            //echo '<img src="'.base_url().'' . $rs['photo'] . '">';
            echo '<p>' . $rs['body'] . '</p>';
			echo '<p>' . $rs['last_name'] . '</p>';
			
            echo '</li>';
        }

        if ($last_id != 0) {
            echo '<script type="text/javascript">var last_id = ' . $last_id . ';</script>';
        }

// sleep for 1 second to see loader, it must be deleted in prodection
        sleep(1);
    }

}
