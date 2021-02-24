
<!-- 

Develop date and time:
Objective of this page: poet personal picture edit.
controller name : 
model name : 
tabel name:tbl_user,tbl_vote and tbl_comments.
css: user_admin.css.
mother page and menu name: poet_personal_info and poet's page.

!-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link> 
<!-- poets personal picture update !-->

<div id="new_poets_Page_title">
    <div id="font">
        <!--        Your Poet Name and Biography-->
        POET PROFILE
    </div>    
</div>

<div id="image_edit_delete">
    <div id="image_edit_delete_caption">
        Pictures Edit
    </div>
    <div style="float: left; height: auto; width: auto;">
        <div style="  height: 31px;  width: 100%; background-color: #eee;">
            <div style="float: left; "><a style=" float: left;  border-top-left-radius: 7px; height: 31px; width: 175px;   margin: 0px 0px 0px 1px;  box-shadow: 0px 0px 1px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/edityourbiography.php" id="active"><b style="float: left; margin: 7px 0px 0px 17px; text-align: center;">Edit your biography</b></a></div>
            <div style=" float: left;"><a style="float: left; height: 31px; width: 247px; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 1px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/picture_edit.php" id="active"><b style="float: left; margin: 7px 0px 0px 63px;  text-align: center;">Edit your pictures</b></a> </div>
            <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 245px; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 1px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poet_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 23px; text-align: center; ">Manage comments about you</b></a></div>
            <!-- poem's insert,edit,update,delete end !-->
        </div>
        <div id="image_edit_delete_info">
            <div id="image_edit_delete_info_font">  
                <p>Add / remove your pictures on Poetsfeeling.Com.</p> 
            </div>
        </div>
        <div id="image_edit_delete_message">
            <div id="image_edit_delete_message_font">
                <style type="text/css">
                    .error{
                        color: red;
                    }
                </style>        
                <table border="0" width="100%" style=" text-align: left">

                    <tr>
                        <td width="100%" ><b>Small Picture (50x50 pixel)</b></td>
                    </tr>

                    <tr>
                        <td width="100%">No small picture submitted. To upload a small picture <link><a href="<?php echo base_url(); ?>poets_profile_controller/view_small_pic_page.php">click here</a></td>
                    </tr>

                </table>
                <table border="0" width="100%" style=" text-align: left">
                    <tr>
                        <td width="100%"><hr noshade size="1"></td>
                    </tr>
                    <tr>
                        <td width="100%" ><b>Normal Picture (Max. 140x200 pixel)</b></td>
                    </tr>

                    <tr>                    
                        <td width="100%">No small picture submitted. To upload a small picture <link><a href="<?php echo base_url(); ?>poets_profile_controller/view_normal_pic_page.php">click here</a></td>
                    </tr>

                </table>
                <table border="0" width="100%">
                    <tr>
                        <td width="100%"><hr noshade size="1"></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                </form>
            </div>
        </div>
    </div>
</div>