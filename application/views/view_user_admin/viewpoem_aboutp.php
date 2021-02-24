
<!-- poems view,edit,delete !-->


<!-- locale connection css start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link> 

<!-- locale connection css end !-->

<div id="new_poets_Page_title">
    <div id="font">
        Poem's
    </div>    
</div> 

<div style="float: left; height: auto; width: auto;">
    <div style="  height: 31px;  width: 100%;">
        <div style="float: left; "><a style=" float: left;  border-top-left-radius: 7px; height: 31px; width: 175px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/poem_submit.php" id="active"><b style="float: left; margin: 7px 0px 0px 17px; text-align: center;">Submit a new poem</b></a></div>
        <div style=" float: left;"><a style="float: left; height: 31px; width: 247px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user.php" id="active"><b style="float: left; margin: 7px 0px 0px 19px;  text-align: center;">Edit (or delete) your poems</b></a> </div>
        <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 335px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poem_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 33px; text-align: center; ">Manage comments about your poems </b></a></div>
        <!-- poem's insert,edit,update,delete end !-->
    </div>
    <div id="poem_preview"> 

        <div id="poem_edit_delete">
<!--            <div style="  border-radius:7px;  height: 31px;  ">

                <div style=" margin-left: 4px;"><a style=" float: left;  background-color: gainsboro; margin-top: 5px;text-decoration: underline;  box-shadow: 0px 0px 7px 0px; padding: 2px;  border-radius: 100px; font: bold 17px/19px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/poem_submit.php" id="active">Submit a new poem</a></div>
                <div style=" margin-left: 24px;"><a style="float: left; background-color: gainsboro;  margin-left: 24px;  box-shadow: 0px 0px 7px 0px; padding: 2px;  border-radius: 100px; margin-top: 5px; text-decoration: underline; font: bold 17px/19px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user.php" id="active">Edit (or delete) your poems</a> </div>
                <div style=" margin-left: 24px;"> <a style="float: left;  background-color: gainsboro; margin-top: 5px; box-shadow: 0px 0px 7px 0px; padding: 2px;  border-radius: 100px;  margin-left: 24px;text-decoration: underline;  font: bold 17px/19px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poem_comments.php" id="active">Manage comments about your poems </a></div>
                 poem's insert,edit,update,delete end !
            </div>-->
            <div id="edit_delete_caption">
                Your Poem's
            </div>
            <!-- poem's search by text control start !-->

            <!-- <div id="search_text">
                 <form action="<?php echo base_url(); ?>user_admin_controller/searchpoems" method="post">
                     <input style="width: 250px; height: 27px; border-radius: 7px;" type="text" name="search_text" required="1" err="Please enter valid first name" regexp="JSVAL_RX_ALPHA" />
                     <input type="submit" name="btn" value="Search"/>
                 </form>
             </div>
     
            <!-- poem's search by text control end !-->
            </br>
            </br>
            </br>
            <?php
            $message = $this->session->userdata('message');
//echo '-----'.$message;
            if (isset($message)) {
                echo $message;
                $this->session->unset_userdata('message');
            }
            if (isset($_SESSION['exception'])) {
                echo $_SESSION['exception'];
                unset($_SESSION['exception']);
            }
            ?>
            </br>
            </br>
            </br>
            <div id="poem_pagination">
                <div style="float: left; height: auto; width: 959px; background-color: whitesmoke;">
                    <div id="title">
                        <div style="float: left; margin-top: 7px; padding: 5px; font: bolder 15px/15px sans-serif; color: #B57340;"></div> 
                        <div style="float: left; margin-top: 7px; padding: 5px; font: bolder 15px/15px sans-serif; margin-left: 51px; color: #B57340;">Title</div> 
                        <div style="float: left; margin-top: 7px; padding: 5px; font: bolder 15px/15px sans-serif; margin-left: 269px; color: #B57340;">About Poem</div> 
                        <div style="float: left; margin-top: 7px; padding: 5px; font: bolder 15px/15px sans-serif; margin-left: 246px; color: #B57340;">Submitted At</div> 
                        <div style="float: left; margin-top: 7px; padding: 5px; font: bolder 15px/15px sans-serif; margin-left: 55px; color: #B57340;">Action</div> 

                    </div>

                    <div id="poems_view">
                        <!-- poem's view start !-->

                        <?php if (count($result) > 0) { ?>
                            <?php
                            $i = $this->uri->segment(3);
                            if ($i == NULL) {
                                $i = 0;
                            }
                            foreach ($result as $aresult) {     //<!-- this code for poem information start !-->
                                $i++;
                                ?>
                                <div style=" float: left; font: normal 14px/14px sans-serif; background-color:whitesmoke; margin-top: 1px; text-align:  center; height:  31px; width: 100%">
                                    <div style=" float: left; width: auto; height: auto; padding-left: 9px; margin:  7px 0px 0px 0px; "> <?php echo $i; ?>. </div> 

                                    <div style=" float: right; color:  darkslateblue; font: bolder 15px/17px serif; width: 100px; text-align: right;  margin:  7px 7px 0px 0px;">
                                        <a  href="<?php echo base_url() ?>user_admin_controller/poemtitleshow/<?php echo $aresult->poem_id ?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                                        <a  href="<?php echo base_url() ?>user_admin_controller/message_delete/<?php echo $aresult->poem_id ?>" onclick="return checkDelete();">Delete</a>
                                    </div> 
                                    <div style="float: right; color: #666; font: normal 12px/12px sans-serif; width: 150px; margin:  7px 0px 0px 0px;"><?php echo $aresult->poem_submit_date; ?></div>       


                                    <div style="float: right; text-align:  left; color: #666; margin-left: 7px; width: 330px; margin:  7px 0px 0px 7px; " ><?php echo $aresult->poems_category_name; ?></div>

                                    <div style=" float: right; height:  auto; width: 300px; color: #666; text-align:  left; font: bold 15px/17px sans-serif; margin:  7px 0px 0px 7px;  " ><a style="color: #666;font: normal 14px/14px sans-serif; "  href="<?php echo base_url() ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id ?>"><?php echo $aresult->title; ?></a></div>
                                </div> 
                            <?php } ?>      <!-- this code for poem information end !-->
                        <?php } ?>
                    </div> 


                </div>   
                </br>
                </br>
                
                <div style=" background-color: gainsboro;  margin-top: 495px; width: 960px; height: 25px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; ">
                    <?php echo $this->pagination->create_links(); ?>  
                </div>                <!-- pagination end !-->
            </div>

        </div>
    </div>
</div>