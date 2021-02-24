<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Description of user_admin
 *
 * @author Bdjobs
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed')
    ;

session_start(); //we need to call PHP's session object to access it through CI

class User_Admin_controller extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'txtInput',
            'path' => 'scripts/ckeditor',
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "450px", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ),
        );
    }

    /* link with poem_submit. */

    public function poem_submit() { /* link with poem_submit. */
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->model('welcome_model');
            /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $this->load->model('user_admin_model');
            $data['check_editor'] = $this->data;
            $data['category'] = $this->user_admin_model->category_view();
            $data ['maincontent'] = $this->load->view('view_user_admin/poem_submit', $data, TRUE);
            $this->load->view('home', $data);
        } else {
            redirect("poems/login");
        }
    }

    /* link with viewpoem aboutp. */

    public function viewpoem_aboutp() { /* link with viewpoem aboutp. */
        $data = array();
        $data['maincontent'] = $this->load->view('view_user_admin/viewpoem_aboutp', $data, true);
        $this->load->view('home', $data);
    }

    /* link with message update. */

    public function message_update() { /* link with message update. */
        $data = array();
        $data['maincontent'] = $this->load->view('view_user_admin/message_update', $data, true);
        $this->load->view('home', $data);
    }

    /* link with message delete. */

    public function message_delete() { /* link with message delete. */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/message_delete', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with picture edit. */

    public function picture_edit() { /* link with picture edit. */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/pictures_edit', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with message poem comments. */

    public function message_poem_comments() { /* link with message poem comments. */
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data ['maincontent'] = $this->load->view('view_user_admin/message_poem_comments', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with message poem vote. */

    public function message_poem_vote() { /* link with message poem vote. */
        $data = array();
        $data ['maincontent'] = $this->load->view('view_user_admin/message_poem_vote', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* link with all poem. */

    public function all_poem_view() { /* link with all poem. */
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('user_admin_model');
        $this->load->model('welcome_model');
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $data['result'] = $this->user_admin_model->view_all_poem();

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . 'user_admin_controller/all_poem_view/';
        $result = $this->user_admin_model->view_all_poem();
        $config['total_rows'] = count($result);
        $config['per_page'] = '19';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        //load the model and get results
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->select_all_new_poem_For_Pagination($config['per_page'], $this->uri->segment(3));
        //Pagination end */

        $data ['maincontent'] = $this->load->view('view_user_admin/all_poem_show', $data, TRUE);
        $this->load->view('home', $data);
    }

    /* save poem. */

    public function savepoem() { /* save poem. */
        $data = array();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['title'] = $this->input->post('title', true);
        $data['body'] = $this->input->post('body', true);
        $data['aboutP'] = $this->input->post('aboutP', true);
        $data['poems_category_id'] = $this->input->post('poems_category_id', true);
        $data['story'] = $this->input->post('story', true);
        date_default_timezone_set('Europe/London');
        $date_time = new DateTime();
        $data['poem_submit_date'] = $date_time->format('Y-m-d H:i:s a');
        $this->load->model('User_Admin_Model');

//        $this->User_Admin_Model->savepoemInfo($data);        
//        $sesData['message_poem_submit'] = "Save poem Successfully!";
//        $this->session->set_userdata($sesData);
        //redirect("user_admin_controller/poem_submit");


        /* check Duplicate display date */
        if (!$this->welcome_model->check_duplicate_poem_name($data['user_id'], $data['title'])) {
            $data = $this->User_Admin_Model->savepoemInfo($data);
            echo '<script>alert("Save poem Successfully!");</script>';
            redirect('user_admin_controller/poem_submit/', 'refresh');
        } else {
            echo '<script>alert("Please change poem title.");</script>';
            redirect('user_admin_controller/poem_submit/', 'refresh');
        }
    }

    /* search poems. */

    public function searchpoems() { /* search poems. */
        $search_text = $this->input->post('search_text', true);
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->searchpoemInfo($search_text, $user_id);
        $data['maincontent'] = $this->load->view('view_user_admin/viewpoem_aboutp', $data, true);
        $this->load->view('home', $data);
    }

    /* Search poem by user Id.  */

    public function searchallpoemsby_us04092014ers() { /* search all poems by users.  */

        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectpoemAll($user_id, $user_id);
        $data['maincontent'] = $this->load->view('view_user_admin/viewpoem_aboutp', $data, true);
        $this->load->view('home', $data);
    }

    public function searchallpoemsby_user() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $this->load->model('welcome_model');        /* bottom_poem_category */
            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $user_id = $this->session->userdata('user_id');
            
            $data['result'] = $this->user_admin_model->poem_by_userId($user_id);
            //Pagination start
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'user_admin_controller/searchallpoemsby_user/';
            $data['result'] = $this->user_admin_model->poem_by_userId($user_id);
            $config['total_rows'] = count($data['result']);
            $config['per_page'] = '7';
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>';
            $this->pagination->initialize($config);
            $data['result'] = $this->user_admin_model->select_poem_by_user_id_ForPagination($user_id, $config['per_page'], $this->uri->segment(3));
            //Pagination end

            $data['maincontent'] = $this->load->view('view_user_admin/viewpoem_aboutp', $data, true);
            $this->load->view('home', $data);
        } else {
            redirect("poems/login");
        }
    }

    public function searchallpoemsby_user_poet_page() {

        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectpoemByUserId($user_id);

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'user_admin_controller/searchallpoemsby_user/';
        $data['result'] = $this->user_admin_model->selectpoemsByUserId($user_id);
        $config['total_rows'] = count($data['result']);
        $config['per_page'] = '20';
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        $data['result'] = $this->user_admin_model->selectpoemForPagination($user_id, $config['per_page'], $this->uri->segment(3));

        $data['maincontents'] = $this->load->view('view_user_admin/viewpoem_aboutp', $data, true);
        /* this code for view poet name from tbl_user start */
        $data ['manage_poet_name_view'] = $this->user_admin_model->manage_poem_name($user_id);
        /* this code for view poet name from tbl_user start */
        $data['maincontent'] = $this->load->view('manage_poets', $data, true);
        $this->load->view('home', $data);
    }

    //<!-- this code for poem detail show!-->

    public function poemdetail($poem_id) {       //<!-- this code for poem detail show!-->
        $data = array();
        $data_read_value = array();
        $poets_data = array();
        $this->load->helper('security');
        $data['poem_owner_id'] = $this->user_admin_model->get_comments_by_poem($poem_id);
        $data['poem_id'] = $poem_id;
//        $user_id = $this->welcome_model->save_read_info($data);
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();

        $data['result'] = $this->user_admin_model->selectpoemBypoemId($poem_id);

        $data['like_data'] = $this->user_admin_model->view_like_data($poem_id);
        $data['poet_like_pic'] = $this->user_admin_model->select_like_poet_pic_view($poem_id);
        $data['poet_collection_pic'] = $this->user_admin_model->select_collection_pic_view($poem_id);
        $data['total_collection'] = $this->user_admin_model->select_total_collection($poem_id);

        $data['poem_detail_pics'] = $this->user_admin_model->poem_detail_pic($poem_id);
        $data['poem_poem_details'] = $this->user_admin_model->poem_details($poem_id);
        $data['total_voter'] = $this->user_admin_model->total_voter($poem_id);

        $data['total_read'] = $this->user_admin_model->total_read_value($poem_id);
        $data ['total_voters'] = $this->user_admin_model->total_voter($poem_id);
        $data ['total_comments'] = $this->user_admin_model->sum_comments($poem_id);
        $data ['poem_comments_display'] = $this->user_admin_model->poem_comments_view($poem_id);

        /* */
//         foreach ($data['result'] as $v_poem) {/* two dymansonal array */
//            $data['comments'][$v_poem->poem_id] = $this->user_admin_model->poem_comments_view($v_poem->poem_id);
////            foreach ($data['comments'][$v_poem->poem_id] as $v_comments) { /* three dymansonal array */
////                $data['reply'][$v_poem->poem_id][$v_comments->comments_id] = $this->welcome_model->reply_dat_view($v_comments->comments_id);
////            }
//        }
        /* */
        //$data['poet_rank_result'] = $this->user_admin_model->poet_rank($poem_id);
        //<!-- this code for save read value start !-->

        $user_id = $this->session->userdata('user_id');
        $poem_owner_id = $data['poem_owner_id'];
        $data_read_value['poem_id'] = $data['poem_id'];
        $data_read_value['poem_owner_id'] = $poem_owner_id->poem_owner_id;

        /* IP address insert */
        $exec = exec("hostname"); //the "hostname" is a valid command in both windows and linux
        $hostname = trim($exec); //remove any spaces before and after
        $ip = gethostbyname($hostname); //resolves the hostname using local hosts resolver or DNS
        $data_read_value['ip_address'] = $ip;

        if (!$this->welcome_model->checkDuplicate_ip_for_read_value($data_read_value['poem_id'], $data_read_value['ip_address'])) {
            $this->welcome_model->read_value($data_read_value);
        }
        $data['total_read'] = $this->user_admin_model->total_read_value($poem_id);
        $data['maincontent'] = $this->load->view('view_user_admin/poem_detail', $data, true);
        $this->load->view('home', $data);
    }

    //<!-- this code for save like !-->   //

    public function save_like() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
            $data['user_id'] = $user_id;
            $data['poem_id'] = $this->input->post('poem_id', true);
            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
            $data['like_value'] = "1";
//            echo '<pre>';
//            print_r($data);
//            exit();
//            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
//            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            // $data['countryp'] = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
            // ->geoplugin_countryName;
//            $data['like_value'] = $this->input->post('like_value', true);
            //  $data['vote_date'] = date("Y-m-d H:i:s");


            if (!$this->welcome_model->checkDuplicateuserid_for_like($data['poem_id'], $data['user_id'])) {
                $poem_id = $this->welcome_model->save_like($data);
                $data['poem_id'] = $data['poem_id'];
                $data['like_value'] = "1";
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            } else {
                $vote_Data['vote_message'] = "You can't give second time vote!";
                $this->session->set_userdata($vote_Data);
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            }
        } else {
            redirect("poems/login");
        }
    }

    //<!-- this code for save collection !-->   //

    public function save_collection() {   //<!-- this code for savevotes !-->   //
        if ($this->session->userdata('user_id')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
            $data['user_id'] = $user_id;
            $data['poem_id'] = $this->input->post('poem_id', true);
            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
//            $data['like_value'] = "1";
//            echo '<pre>';
//            print_r($data);
//            exit();
//            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
//            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            // $data['countryp'] = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
            // ->geoplugin_countryName;
//            $data['like_value'] = $this->input->post('like_value', true);
            //  $data['vote_date'] = date("Y-m-d H:i:s");


            if (!$this->welcome_model->checkDuplicateuserid_for_collection($data['poem_id'], $data['user_id'])) {
                $poem_id = $this->welcome_model->save_collection($data);
                $data['poem_id'] = $data['poem_id'];
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            } else {
                $vote_Data['vote_message'] = "You can't give second time vote!";
                $this->session->set_userdata($vote_Data);
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            }
        } else {
            redirect("poems/login");
        }
    }

//    public function scroll_num_rows()
//    {
//        $page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
//       
//        $start = ($page * $limit) - $limit;
//        if( mysql_num_rows(mysql_query($sql)) > ($page * $limit) ){
//	$next = ++$page;
//        }
//        $data['scroll'] = $this->welcome_model->scroll_num_rows(11,1);
//        
//    };


    public function all_poem_of_day() {
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['poem_of_day_result'] = $this->welcome_model->poems_of_day();

        $data['two_poem_of_day'] = $this->welcome_model->two_poem_of_day();
        $data['result'] = $this->welcome_model->all_poem_day();
//        echo '<pre>';
//        print_r($data);
//        exit();
//        $data['result'] = $this->welcome_model->trending_poem_view();
        $data['maincontent'] = $this->load->view('all_poem_day_view', $data, true);
        $this->load->view('home', $data);
    }

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

    /* all poem trending poems view.  */

    public function all_trending_poem_view() {
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();


        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
//        $data['total_voter'] = $this->user_admin_model->total_voter_trending($poem_id);

        $data['trending_poem_result'] = $this->welcome_model->trending_poems();

        $data['two_tranding_poem'] = $this->welcome_model->two_tranding_poem_view();
        $data['result'] = $this->welcome_model->trending_poem_view();
        
        
        /* two poems */
        
         foreach ($data['two_tranding_poem'] as $v_poem) {/* two dymansonal array */
            $data['comments'][$v_poem->poem_id] = $this->welcome_model->trending_poem_comments_view($v_poem->poem_id);
            foreach ($data['comments'][$v_poem->poem_id] as $v_comments) { /* three dymansonal array */
                $data['reply'][$v_poem->poem_id][$v_comments->comments_id] = $this->welcome_model->reply_dat_view($v_comments->comments_id);
            }
        }
        /*-----------------------------------*/
        foreach ($data['result'] as $v_poem) {/* two dymansonal array */
            $data['comments'][$v_poem->poem_id] = $this->welcome_model->trending_poem_comments_view($v_poem->poem_id);
            foreach ($data['comments'][$v_poem->poem_id] as $v_comments) { /* three dymansonal array */
                $data['reply'][$v_poem->poem_id][$v_comments->comments_id] = $this->welcome_model->reply_dat_view($v_comments->comments_id);
            }
        }

        $data['maincontent'] = $this->load->view('view_user_admin/all_trending_poem_view', $data, true);
        $this->load->view('home', $data);
    }

    //<!-- this code for savevotes !-->   //


    public function save_votes_trending($newRate, $poem_id, $poem_owner_id) {
        //echo 'hello';
        if ($this->session->userdata('user_id')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
            $data['user_id'] = $user_id;
            $data['poem_id'] = $poem_id;
            $data['poem_owner_id'] = $poem_owner_id;
            $data ['poem_vote'] = $newRate;
            $data['vote_date'] = date("Y-m-d H:i:s");
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['countryp'] = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
                    ->geoplugin_countryName;

            if (!$this->welcome_model->checkDuplicateuserid($data['poem_id'], $data['user_id'])) {
                $this->welcome_model->savepoemvote($data);
                echo "1";
            } else {
                echo '2';
            }
        } else {
            echo '3';
        }
    }

//    public function save_votes_trending2($total_vote, $total_voter, $average_vote, $poem_id, $poem_owner_id) {
//        if ($this->session->userdata('user_id')) {
//            $data = array();
//            $user_id = $this->session->userdata('user_id');
//
//            $data['user_id'] = $user_id;
//            $data['poem_id'] = $this->input->post('poem_id', true);
//            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
//            $data['ip'] = $_SERVER['REMOTE_ADDR'];
//            $data['countryp'] = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
//                    ->geoplugin_countryName;
//            $data['poem_vote'] = $this->input->post('poem_vote', true);
//            $data['vote_date'] = date("Y-m-d H:i:s");
//            $this->load->model('welcome_model');
//
//            if (!$this->welcome_model->checkDuplicateuserid($data['poem_id'], $data['user_id'])) {
//
//                $poem_id = $this->welcome_model->savepoemvote($data);
//
//                $data['poem_id'] = $data['poem_id'];
//
////                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
//            } else {
//                $vote_Data['vote_message'] = "You can't give second time vote!";
//
//                $this->session->set_userdata($vote_Data);
//                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
//            }
//        } else {
//            redirect("poems/login");
//        }
//    }

    public function comments_view_by_poem_id_in_trending_poem($poem_id) {
        $data = array();
        $data['trending_poem_comments'] = $this->welcome_model->trending_poem_comments_view($poem_id);
        $data ['trending_poem_content'] = $this->load->view('comments_view_by_poem_id', $data, TRUE);
        $data['maincontent'] = $this->load->view('view_user_admin/all_trending_poem_view', $data, true);
        $this->load->view('home', $data);
    }

    /* this function for save comment in trending page */

    public function save_comment($user_comment, $poem_id, $user_id) {
        $data = array();
        $data['poem_id'] = $poem_id;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['poem_owner_id'] = $user_id;
        $data['comments'] = $user_comment;
        $this->user_admin_model->comments_save_treding($data);

        $data['userinfo'] = $this->welcome_model->select_user_information($data['user_id']);
        echo $this->load->view('user_recent_comment', $data);
    }

//    public function count_comment($poem_id) {
//        echo count($this->welcome_model->total_commet($poem_id));
//    }

    /* this function for save reply in trending page */

    public function save_reply($user_reply, $poem_id, $comments_id) {
        $data = array();
        $data ['comments_id'] = $comments_id;
        $data['poem_id'] = $poem_id;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['reply_data'] = $user_reply;
        $this->user_admin_model->reply_save_treding($data);
        $data['userinfo'] = $this->welcome_model->select_user_information($data['user_id']);
        echo $this->load->view('user_recent_reply', $data);
    }

//    this code for savevotes trending page

    public function save_votes_trending_page() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
            $data['user_id'] = $user_id;
            $data['poem_id'] = $this->input->post('poem_id', true);
            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);

            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['countryp'] = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
                    ->geoplugin_countryName;

            $data['poem_vote'] = $this->input->post('poem_vote', true);
            $data['vote_date'] = date("Y-m-d H:i:s");

            //this code for check Duplicate userid
            if (!$this->welcome_model->checkDuplicateuserid($data['poem_id'], $data['user_id'])) {
                $poem_id = $this->welcome_model->savepoemvote($data);
                $data['poem_id'] = $data['poem_id'];
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            } else {
                $vote_Data['vote_message'] = "You can't give second time vote!";
                $this->session->set_userdata($vote_Data);
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            }
        } else {
            redirect("poems/login");
        }
    }

    /* all poem trending poems view.  */

    public function all_trending_detail_view($poem_id) {
        $data = array();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['trending_poem_result'] = $this->welcome_model->trending_poems();
        $data['result'] = $this->welcome_model->detail_trending_poem_view($poem_id);
        $data['maincontent'] = $this->load->view('view_user_admin/all_trending_detail', $data, true);
        $this->load->view('home', $data);
    }

//<!-- this code for poem title show!-->

    public function poemtitleshow($poem_id) {    //<!-- this code for poemtitle show!-->   //
        $data = array();
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectpoemBypoemId($poem_id);
        $data['check_editor'] = $this->data;
//         $data['check_editor'] = $this->input->post('body');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['maincontent'] = $this->load->view('view_user_admin/edit_poem', $data, true);
        $this->load->view('home', $data);
    }

    //<!-- this code for update poem!-->   //

    public function updatepoem() {   //<!-- this code for update poem!-->   //
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['body'] = $this->input->post('body', True);
        $data['lastchange'] = date("Y-m-d");
        $this->load->model('user_admin_model');
        $this->user_admin_model->updatepoemsbyuser($data);
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
//        $sesData['message_poem_update'] = "Update poem Successfully!";
//        $this->session->set_userdata($sesData);
        redirect("user_admin_controller/searchallpoemsby_user");
    }

    //<!-- this code for delete poem !-->   //

    public function deletepoem($poem_id) {  //<!-- this code for delete poem !-->   //
        // echo $contact_id;
        $this->load->model('user_admin_model');
        $this->user_admin_model->deletepoem($poem_id);
        $sesData['message'] = "Delete poem Successfully!";
        $this->session->set_userdata($sesData);
        redirect('user_admin_controller/searchallpoemsby_user');
    }

    //<!-- this code for pictures edit !-->   //

    public function pictures_edit() {    //<!-- this code for pictures_edit !-->   //
        $data = array();
        $data['user_id'] = $this->input->post('user_id', true);
        $data['first_name'] = $this->input->post('first_name', true);
        $data['last_name'] = $this->input->post('last_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        $data['address'] = $this->input->post('address', true);
        $data['city'] = $this->input->post('city', true);
        $data['country'] = $this->input->post('country', true);
        $data['gender'] = $this->input->post('gender', true);
        $data['zip_code'] = $this->input->post('zip_code', true);
        $data['insert_date'] = date("Y-m-d H:i:s");
        $this->load->model('user_admin_model');
        $data['userInfo'] = $this->user_admin_model->selectuserByuserId($data['user_id']);
        $errors = '';
        if ($_FILES['user_pictures']['name'] && $_FILES['user_pictures']['size']) {
            $result = $this->imageUpload('user_pictures');

            if ($result) {
                if ($result['file_name']) {
                    $data['user_pictures'] = $result['file_name'];
                    /* if ($data['ContactInfo']->contact_picture)
                      {
                      unlink($data['ContactInfo']->contact_picture);
                      } */
                } else {
                    $errors = $result['error'];
                }
            }
        }
        if ($errors) {
            $err['exception'] = $errors; //"Image size too large";
            $this->session->set_userdata($err);
            redirect("user_admin_controller/pictures_edit");
        }
        $this->user_admin_model->updateuserInfo($data);
        redirect("user_admin_controller/pictures_edit");
    }

//<!-- this code for image Upload !-->   //

    public function imageUpload($fieldName) {  //<!-- this code for image Upload !-->   //
        $config['upload_path'] = 'images/userImage/';
        $config['allowed_types'] = 'gif|jpg|png|bmp|tif';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
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

// this code for save comments for poem

    public function savecomments() {
        if ($this->session->userdata('user_id')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
            $data['user_id'] = $user_id;
            $data['poem_id'] = $this->input->post('poem_id', true);
            $data['comments'] = $this->input->post('comments', true);
            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
            $this->load->model('User_Admin_Model');
            $this->User_Admin_Model->comments_save($data);

//            $sdata = array();
//            $sdata['message'] = 'Your Comment Successfully Post and Weating For Approval !';
//            $this->session->set_userdata($sdata);
//            echo '<pre>';
//            print_r($sdata);
//            exit();
            redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
        } else {
            redirect("poems/login");
        }
    }

    //<!-- this code for savecomments !-->   //

    public function savecomment_poet_page() {   //<!-- this code for savecomments !-->   //
        if ($this->session->userdata('user_id')) {
            $data = array();
            $data['user_id'] = $this->input->post('user_id', true);
            $data['poem_id'] = $this->input->post('poem_id', true);
            $data['comments'] = $this->input->post('comments', true);

            $data['comments_post_date'] = $current_time;
            $this->load->model('User_Admin_Model');
            $this->User_Admin_Model->comments_save($data);


            //            $sdata = array();
//            $sdata['message'] = 'Your Comment Successfully Post and Weating For Approval !';
//            $this->session->set_userdata($sdata);
//            echo '<pre>';
//            print_r($sdata);
//            exit();
            redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
//            redirect("user_admin_controller/message_poem_comments");
        } else {
            redirect("poems/login");
        }
    }

//<!-- this code for savevotes !-->   //

    public function savevotes() {   //<!-- this code for savevotes !-->   //
        if ($this->session->userdata('user_id')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
//            $poem_id = $this->session->userdata('poem_id');
            $data['user_id'] = $user_id;
            $data['poem_id'] = $this->input->post('poem_id', true);
            $data['poem_owner_id'] = $this->input->post('poem_owner_id', true);
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['countryp'] = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip))
                    ->geoplugin_countryName;
            $data['poem_vote'] = $this->input->post('poem_vote', true);
            $data['vote_date'] = date("Y-m-d H:i:s");
            $this->load->model('welcome_model');

            if (!$this->welcome_model->checkDuplicateuserid($data['poem_id'], $data['user_id'])) {

                $poem_id = $this->welcome_model->savepoemvote($data);
//                $data['poem_id'] = $poem_id;
                $data['poem_id'] = $data['poem_id'];
//                $vote_Data['vote_message'] = "Save vote Successfully! ......";
//                $this->session->set_userdata($vote_Data);
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
//                redirect('user_admin_controller/poemdetail/' .  $data['poem_id']);
            } else {
                $vote_Data['vote_message'] = "You can't give second time vote!";
//                $vote_Data['vote_message'] = "<script type='text/javascript' language='javascript'> $(document).ready(function () { console.log('hi hi hi'); }); </script>";
//                return View();
                $this->session->set_userdata($vote_Data);
//                redirect('user_admin_controller/poemdetail' . $data['poem_id']);
                redirect('user_admin_controller/poemdetail/' . $data['poem_id']);
            }
        } else {
            redirect("poems/login");
        }
    }

    //this code for user show

    public function usershow($user_id) {  //this code for user show
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectuserByuserId($user_id);
        $data['maincontent'] = $this->load->view('view_user_admin/edit_user', $data, true);
        $this->load->view('home', $data);
    }

    //this code for updating user

    public function updateuser() {//for updating user
        $data = array();
        $data['poem_id'] = $this->input->post('poem_id', true);
        $data['body'] = $this->input->post('body', True);
        $data['lastchange'] = date("Y-m-d");
        $this->load->model('user_admin_model');
        $this->user_admin_model->updatepoemsbyuser($data);
        $sesData['message'] = "Update poem Successfully!";
        $this->session->set_userdata($sesData);
        redirect("user_admin_controller/searchallpoemsby_user");
    }

    //select user

    public function select_user() {  // select user
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['result'] = $this->user_admin_model->selectuserId($user_id);
        $data['maincontent'] = $this->load->view('view_user_admin/edit_user', $data, true);
        $this->load->view('home', $data);
    }

    public function most_popular_poets() {
//        if ($this->session->userdata($user_id)){
        $data = array();
        $this->load->model('welcome_model');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $this->load->model('user_admin_model');
        $data['most_popular_poets'] = $this->user_admin_model->most_popular_poets();
        $data['maincontent'] = $this->load->view('view_user_admin/most_popular_poets', $data, true);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    public function most_popular_detail_view() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $this->load->model('user_admin_model');
        $data['most_popular_poets_detail'] = $this->user_admin_model->most_popular_poets_detail();
        $data['maincontent'] = $this->load->view('view_user_admin/most_popular_poets_detail', $data, true);
        $this->load->view('home', $data);
    }

    public function poem_wise_most_popular_poet() {
        $data = array();
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $this->load->model('user_admin_model');
        $data['poem_wise_most_popular_poet'] = $this->user_admin_model->poem_wise_most_popular_poet();
        $data['maincontent'] = $this->load->view('view_user_admin/poem_wise_most_popular_poets_detail', $data, true);
        $this->load->view('home', $data);
    }

    public function poem_status() {
//        if ($this->session->userdata($user_id)){
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();

        $this->load->model('user_admin_model');
        $data['most_popular_poem'] = $this->user_admin_model->most_popular_poem($user_id);
        $data['maincontent'] = $this->load->view('view_user_admin/most_popular_poem', $data, true);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    public function message() {
        $data = array();
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $data['maincontent'] = $this->load->view('message', $data, true);
        $this->load->view('home', $data);
    }

    public function member_information() {
//if ($this->session->userdata('$user_id')) {        
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        /* data count and view in inbox and send start */
        $data['inbox'] = $this->user_admin_model->inbox_data($user_id);
        $data['send'] = $this->user_admin_model->send_data($user_id);
        /* data count and view in inbox and send end */

        /* data title view by inbox start */
        $data['inbox_content'] = $this->user_admin_model->message_title_view($user_id);
        $data['inbox_data'] = $this->load->view('view_user_admin/indox_data_view', $data, true);
        /* data title view by inbox end */

//        $data[''] = $this->load->user_admin_model->inbox_data($poets_id);
        $data['maincontent'] = $this->load->view('view_user_admin/member_information', $data, true);
        $this->load->view('home', $data);
//        } else {
//            redirect("poems/login");
//        }
    }

    public function profile_edit() {
//        if ($this->session->userdata($user_id)){
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['inbox'] = $this->user_admin_model->inbox_data($user_id);
        $data['send'] = $this->user_admin_model->send_data($user_id);
        $data['result'] = $this->user_admin_model->selectuserId($user_id);
        $this->load->model('welcome_model');
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['inbox_data'] = $this->load->view('view_user_admin/profile_update', $data, true);
        $data['maincontent'] = $this->load->view('view_user_admin/member_information', $data, true);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    public function inbox_data_show() {
//        if ($this->session->userdata('')){
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        $data['inbox'] = $this->user_admin_model->inbox_data($user_id);
        $data['send'] = $this->user_admin_model->send_data($user_id);
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['inbox_content'] = $this->user_admin_model->message_title_view($user_id);
        $data['inbox_data'] = $this->load->view('view_user_admin/indox_data_view', $data, true);
        $data['maincontent'] = $this->load->view('view_user_admin/member_information', $data, true);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    public function send_mail_data_title() {
//        if ($this->session->userdata($user_id)){
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        /* data count and view in inbox and send start */
        $data['inbox'] = $this->user_admin_model->inbox_data($user_id);
        $data['send'] = $this->user_admin_model->send_data($user_id);
        /* data count and view in inbox and send end */
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        /* data title view by inbox start */
        $data['send_mail_title'] = $this->user_admin_model->send_mail_title_view($user_id);
        $data['inbox_data'] = $this->load->view('view_user_admin/send_box_data_title_view', $data, true);
        /* data title view by inbox end */

        $data['maincontent'] = $this->load->view('view_user_admin/member_information', $data, true);
        $this->load->view('home', $data);
//        }else{
//            redirect("poems/login");
//        }
    }

    public function message_detail($message_id) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        /* data count and view in inbox and send start */
        $data['inbox'] = $this->user_admin_model->inbox_data($user_id);
        $data['send'] = $this->user_admin_model->send_data($user_id);
        /* data count and view in inbox and send end */
        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['message_detail_view'] = $this->user_admin_model->message_details($message_id);
        $data['inbox_data'] = $this->load->view('view_user_admin/message_display', $data, true);
        $data['maincontent'] = $this->load->view('view_user_admin/member_information', $data, true);
        $this->load->view('home', $data);
    }

    public function send_mail_detail($message_id) {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $this->load->model('user_admin_model');
        /* data count and view in inbox and send start */
        $data['inbox'] = $this->user_admin_model->inbox_data($user_id);
        $data['send'] = $this->user_admin_model->send_data($user_id);
        /* data count and view in inbox and send end */

        $this->load->model('welcome_model');
        /* bottom_poem_category */
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        $data['send_mail_details_view'] = $this->user_admin_model->send_mail_details($message_id);
        $data['inbox_data'] = $this->load->view('view_user_admin/send_mail_detail_view', $data, true);
        $data['maincontent'] = $this->load->view('view_user_admin/member_information', $data, true);
        $this->load->view('home', $data);
    }

    public function send_message($poets_id) {
        $data = array();
//        $user_id = $this->session->userdata('user_id');
        $this->load->model('welcome_model');
        $data['first_add_home'] = $this->welcome_model->first_add_home();
        $data['home_add_small'] = $this->welcome_model->home_small_add();
        $this->load->model('welcome_model');
        /* bottom_poem_category */

        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
        /* this code for view picture from tbl_user start */
        $this->load->model('user_admin_model');
        $data ['poet_picture'] = $this->user_admin_model->poet_picture($poets_id);
        $data['poets_id'] = $poets_id;
        $data['maincontent'] = $this->load->view('view_user_admin/send_message', $data, true);
        $this->load->view('home', $data);
    }

    public function send_message_poet() {
//        if ($this->session->userdata('')) {
            $data = array();
            $user_id = $this->session->userdata('user_id');
            $data['user_id'] = $user_id;
            $data ['poets_id'] = $this->input->post('poets_id', true);
            $data['subject'] = $this->input->post('subject', TRUE);
            $data['message_detail'] = $this->input->post('message_detail', true);
            $data['send_message'] = $this->input->post('message_detail', true);
            $this->load->model('welcome_model');
            /* bottom_poem_category */
//            $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category();
            $this->load->model('user_admin_model');
            $this->user_admin_model->send_message_poet_insert($data);

            $sesData['message'] = "Send message Successfully!";
            $this->session->set_userdata($sesData);
//       $data['check_editor']=$this->data;
//        redirect('send_message','refresh');
            redirect("user_admin_controller/message_poem_comments");
//        } else {
//            redirect("poems/login");
//        }
    }

    public function draft_data_insert() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $data['user_id'] = $user_id;
        $data['subject'] = $this->input->post('subject', true);
        $data['message_detail'] = $this->input->post('message_detail', true);

//        echo'<pre>';
//        print_r($data);
//        exit();
        $this->load->model('user_admin_model');
        $this->user_admin_model->data_insert_draft($data);
        redirect("user_admin_controller/member_information");
    }

    /* Category wise poems view */

    public function categorywise_poem($poems_category_id) {
//        if ($this->session->userdata('')) {
        $data = array();
//        $poems_category_id = $this->session->userdata('poems_category_id');
        $this->load->model('welcome_model');
        $data['home_add_small'] = $this->welcome_model->home_small_add();


        $this->load->model('user_admin_model');
        $data['category_wise_poem_view'] = $this->user_admin_model->category_wise_poem_view($poems_category_id);
        $data ['bottom_poem_category_title'] = $this->user_admin_model->category_wise_poem_view_title($poems_category_id);
        $data ['bottom_poem_category'] = $this->welcome_model->bottom_poem_category(); /* bottom_poem_category */
        $data['category_detail'] = $this->welcome_model->select_category_detail();
        $data['maincontent'] = $this->load->view('category_wise_poem_view', $data, true);
        $this->load->view('home', $data);
//        } else {
//            redirect("welcome/message_no_data");
//        }
    }

}

?>
