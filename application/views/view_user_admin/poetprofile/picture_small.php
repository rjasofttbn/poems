<!-- 

Develop date and time:
Objective of this page: poet personal small picture edit.
controller name : 
model name : 
tabel name: tbl_user.
css: user_admin.css.
mother page and menu name: manage poem page => Edit your pictures => Small Picture and click here link .

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
    <div id="image_edit_delete">
        <div id="image_edit_delete_info">
            <div id="image_edit_delete_info_font">  
                <p>Add / remove your pictures on Poetsfeeling.Com.</p> 
            </div>
        </div>
        <?php
        $message = $this->session->userdata('message');
        if ($message) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
        <div id="small_picture_info"> 
            <p><b><font face="Arial"><font color="#FF0000">ADD / MODIFY TINY PICTURE</font></font></b></p>
        </div>
        <form  action="<?php echo base_url(); ?>poets_profile_controller/update_small_picture.php" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);">

            <div id="small_picture_info">
                <div id="small_picture_table"> 
                    <table border="0" width="570">
                        <tr>
                            <td width="150"><b><font face="Arial" size="2">TINY</font><font size="2"> PICTURE:</font></b></td>

                            <?php
                            foreach ($result as $aresult) {
                                ?>  
                                <td>
                                    <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $aresult->user_id ?>" />
                                    <font face="Arial" size="2">
                                    <input type="file" name="picture_small" />                        
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td width="150"></td>
                                <td><font face="Arial" size="2">
                                    <INPUT TYPE=submit VALUE="Submit the picture"></font><font size="2"><br>
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

                                        <li><font size="2">50x50 pixel in size.</font></li>
                                    </ul>						
                        </table> 		
                    </div>
                    <div id="small_picture_view"> 
                        <div style="border:#FF0000 0px solid; width:50px; float:left;">
                            <img src="<?php echo base_url() ?><?php echo $aresult->picture_small; ?>" width="50" height="50" />
                        </div>
                    <?php } ?>
                </div>
            </div>
    </div>
</div>
