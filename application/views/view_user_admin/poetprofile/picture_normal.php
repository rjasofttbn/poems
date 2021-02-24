

<!-- 

Develop date and time:
Objective of this page: poet personal normal picture edit.
controller name : 
model name : 
tabel name: tbl_user.
css: user_admin.css.
mother page and menu name: manage poem page => Edit your pictures => Normal Picture and click here link .

!-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link> 
<!-- poets personal picture update !-->
<div id="new_poets_Page_title">
    <div id="font">
        <!--        Your Poet Name and Biography-->
        POET PROFILE
    </div>    
</div>

<div id="image_edit_delete_caption">
    Pictures Edit
</div>   

<div style="float: left; height: auto; width: auto;">
    <div style="  height: 31px;  width: 100%;">
        <div style="float: left; "><a style=" float: left;  border-top-left-radius: 7px; height: 31px; width: 175px;  background-color: #eee; margin: 0px 0px 0px 1px;  box-shadow: 0px 0px 3px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/edityourbiography.php" id="active"><b style="float: left; margin: 7px 0px 0px 17px; text-align: center;">Edit your biography</b></a></div>
        <div style=" float: left;"><a style="float: left; height: 31px; width: 247px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/picture_edit.php" id="active"><b style="float: left; margin: 7px 0px 0px 63px;  text-align: center;">Edit your pictures</b></a> </div>
        <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 245px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 3px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poet_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 23px; text-align: center; ">Manage comments about you</b></a></div>
        <!-- poem's insert,edit,update,delete end !-->
    </div>
    <div id="image_edit_delete_info">
        <div id="image_edit_delete_info_font">  
            <p>Add / remove your pictures on Poetsfeeling.Com.</p> 
        </div>
    </div>
    <div id="image_edit_delete_message">
        <div id="image_edit_delete_message_font">
            <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
                echo $message;
                $this->session->unset_userdata('message');
            }
            if (isset($_SESSION['exception'])) {
                echo $_SESSION['exception'];
                unset($_SESSION['exception']);
            }
            ?>

            <style type="text/css">
                .error{
                    color: red;
                }
            </style>
            <p style=" text-align:left; font: bold 17px/17px sans-serif; color: red;  "><b ><font >ADD / MODIFY MEDIUM PICTURE</font></b></p>

            <form  action="<?php echo base_url(); ?>poets_profile_controller/update_normal_picture.php" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);">

                <div id="medium_picture_table"> 
                    <div id="normal_image_main">
                        <table border="0" width="570">
                            <tr>
                                <td width="150"><b><font face="Arial" size="2">MEDIUM</font><font size="2"> PICTURE:</font></b></td>
                                <td><font face="Arial" size="2">
                                    <?php
                                    foreach ($result as $aresult) {
                                        ?>  
                                        <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $aresult->user_id ?>" />
                                        <font face="Arial" size="2">
                                        <input type="file" SIZE="40"  name="user_pictures" />
                                </tr>
                                <tr>
                                    <td width="150"></td>
                                    <td><font face="Arial" size="2">
                                        <input value="Submit the picture" type="submit"></font><font size="2"><br>
                                        </font><font size="2">Please press once and wait. <br>
                                        It will take a few minutes to process your picture. </font></td>
                                </tr>
                                <tr>
                                    <td width="150"></td>
                                    <td><font size="2"><br>
                                        <b>To add your picture&nbsp;</b></font>
                                        <ol>
                                            <li><font size="2">Press<i> Browse</i>.&nbsp;</font>
                                            </li>
                                            <li>Select the picture file </li>
                                            <li><font size="2">Press <i>Submit the picture</i>.</font></li>
                                        </ol>
                                        <p><b>Your picture</b><font size="2"><b>:</b></font>
                                        </p>
                                        <ul>
                                            <li>in <font size="2">GIF or JPG format.</font></li>
                                            <li><font size="2">Max. 140x200 pixel in size.</font></li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="normal_image_pic">
                            <div style="border:#FF0000 0px solid; width:140px; float:left;">
                                <img src="<?php echo base_url() ?><?php echo $aresult->user_pictures; ?>" width="140" height="200" />
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <input type="hidden" name="poet" value="1998275">!-->
            </form>
        </div>
    </div>
</div>
</div>