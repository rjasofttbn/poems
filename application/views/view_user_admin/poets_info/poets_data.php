
<!-- 

Develop date and time:
Objective of this page: poet personal info view.
controller name :  
model name : 
tabel name:tbl_user,tbl_vote and tbl_comments.
css:
mother page and menu name: poet_personal_info and poet's page.

!-->

<!-- css locale start !-->

<link href="<?php echo base_url(); ?>/login/registration_login.css" rel="stylesheet" type="text/css"></link> 

<!-- css locale end !-->
<?php
$user_id = $this->session->userdata('user_id');
?>


<!-- front end for manage poems !-->

<form enctype="multipart/form-data">
    <div id="poets_personal_slno_poems"> 
        <div id="poets_personal_biography">
            <div id="poets_personal_biography_font">

                <?php
                foreach ($poet_picture as $poet_picture) {
                    ?>
                    <?php if (!empty($poet_picture->biography)) { ?>
                        <?php echo ucfirst(substr("$poet_picture->biography", 0, 600)); ?>  <a style="font-weight: bold;  color:  #660033;" href="<?php echo base_url(); ?>poems/biography_details/<?php echo $poet_picture->user_id; ?>" >more »</a>           

                    <?php } ?>
                </div>
                <div id="biography_details">
                    <div id="biography_details_font">

                    </div>
                </div>
            </div>
        <?php } ?>

        <div id="poets_personal_vote_nocomments_hit"> 
            <div id="poets_personal_poem_vote"> 
                <div id="poets_personal_poem_vote_font"> 
                    Vote : 
                    <?php
                    foreach ($poet_poem_vote as $poet_poem_vote) {    // <!-- show all poems from tbl_poems start !-->
                        ?>
                        <b style="float: right; color:  #B57340; font: bold 17px/17px sans-serif; margin-top: 1px;">&nbsp; <?php echo $poet_poem_vote->total_vote; ?>.</b>                   
                    <?php } ?>               
                </div>
            </div>
            <div id="poets_personal_poem_total_comments">
                <div id="poets_personal_poem_comments_font">
                    Comments :
                    <?php
                    foreach ($poet_poem_comments_count as $row) {    // <!-- show all poems from tbl_poems start !-->
                        ?>
                        <b style="float: right; color:  #B57340; font: bold 17px/17px sans-serif; margin-top: 1px;">&nbsp;<?php echo $row->comments; ?>.</b>
                    <?php } ?>
                </div>
            </div>

            <div id="poets_personal_poem_submit_date"> 
                <div id="poets_personal_poem_date_font"> 
                    Membership Date :
                    <?php
                    foreach ($sign_up_date as $row) {    // <!-- show all poems from tbl_poems start !-->
                        ?>
                        <b style="float: right; color:  #B57340; font: bold 13px/13px sans-serif; margin-top: 1px;">&nbsp;<?php echo $row->insert_date; ?>.</b>
                    <?php } ?>
                </div>
            </div>
            <div id="poem_page_vote_comments_title">
                &nbsp; &nbsp;  &nbsp;  &nbsp;&nbsp;   &nbsp; &nbsp; <b style="color: #B57340;">Vote</b>  &nbsp;  &nbsp;  &nbsp; <b style="color: #B57340;">Rating</b>
            </div>
        </div>
        <div id="text"> 

            <div id="poets_personal_wrapper_poem_vote"><!-- poet personal info view by loop start !-->

                <?php
                $cnt = 1;      //<!-- Sl no start !-->
                foreach ($poet_details as $poet_details) {
                    ?>  

                    <div id="poets_personal_wrapper_poem"> 
                        <div id="poet_personal_page_no">
                            <?php
                            echo $cnt;
                            $cnt++;
                            ?> .
                        </div>
                        <div id="poets_personal_wrapper_poem_font">
                            <a style="  color: #777; font:  normal 15px/15px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poet_details->poem_id; ?>" > <?php echo $poet_details->title; ?></a>
                        </div>
                        <div style="color: #777;" id="personal_poem_rate">
                            <?php echo $poet_details->rate; ?>
                        </div>

                        <div style="color: #777" id="personal_poem_vote">
                            <?php echo $poet_details->vote; ?>
                        </div>
                    </div>
                <?php } ?> 
            </div><!-- poet personal info view by loop end !-->



            <!--<div id="poets_personal_wrapper_poem_comments">
            <?php
            foreach ($poet_details_comments as $poet_details_comments) {
                ?> 
                                                                                                        <div id="poem_page_poem_vote">

                <?php echo $poet_details_comments->total_comments ?>
                                                                                                        </div>
            <?php } ?>
            </div>
            <div id="poem_vote">
            <?php
            foreach ($poet_details_vote as $poet_details_vote) {
                ?> 
                                                                                                        <div id="poem_page_poem_vote">

                <?php echo $poet_details_vote->vote ?>
                                                                                                        </div>
            <?php } ?>
            </div>
        </div> !-->

        </div>
        <!-- pagination !-->
        <!--        <div id="poets_personal_pagination">
                   
                </div>     -->

    </div>
</form>