
<!-- css locale start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link> 

<!-- css locale end !-->

<div id="new_poets_Page_title">
    <div id="font">
        <!--        Your Poet Name and Biography-->
        POET PROFILE
    </div>    
</div>
<div style="float: left; height: auto; width: auto;">
    <div style="  height: 31px;  width: 100%;">
        <div style="float: left; "><a style=" float: left;  border-top-left-radius: 7px; height: 31px; width: 175px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/edityourbiography.php" id="active"><b style="float: left; margin: 7px 0px 0px 17px; text-align: center;">Edit your biography</b></a></div>
        <div style=" float: left;"><a style="float: left; height: 31px; width: 247px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/picture_edit.php" id="active"><b style="float: left; margin: 7px 0px 0px 63px;  text-align: center;">Edit your pictures</b></a> </div>
        <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 245px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poet_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 23px; text-align: center; ">Manage comments about you</b></a></div>
        <!-- poem's insert,edit,update,delete end !-->
    </div>
    <div id="comments_view"> 

        <div id="comments_caption"> <!-- caption page !-->
            <h3 style="color: #555;"> Manage Comment's About You</h3>
        </div> 


        <div id="comments_view_content_phperror">

            <div id="comments_about_poems_rules">
                <font style="color: indianred;">If you find a comment inappropriate, you can remove (delete) it using the <i>'Remove this comment'</i> link.
            </div>
            <div id="comments_view_content">
                <?php
                foreach ($result as $rows) {     // poem comments info view !
                    ?>
                    <div id="comments_view_data">
                        <div id="data_remove">
                            <b style=" float: left; padding: 15px; padding-top:  5px; color: #333; margin-top: 9px; "> Date & Time : <?php echo $rows->date_comments_poet; ?></b> 
                            <a style=" float: right;   margin-right: 11px; text-align: right; color: tomato; margin-top: 15px;" href="<?php echo base_url() ?>poets_profile_controller/deletecomments/<?php echo $rows->comments_poet_id ?>" onclick="return checkDelete();"><b style="color: tomato;">Remove The Comment</b></a>
                        </div>
                        <div id="comments_data">
                             <?php
                                if (!empty($rows->picture_small)) {
                                    ?> 
                            <img  height="50" width="50" style=" float: right; border-radius: 50px; margin:15px 61px 0px 0px;  border: white solid 7px ; box-shadow: 0px 1px 31px 1px gray;" src="<?php echo base_url() ?><?php echo $rows->picture_small; ?>"/>
                             <?php
                                } else {
                                    ?>
                                    <img title="" height="50px" width="50px" style=" float: right; border-radius: 50px; margin:15px 61px 0px 0px;  border: white solid 7px ; box-shadow: 0px 1px 31px 1px gray;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                                <?php } ?>
                            <p style=" text-align: justify;padding: 15px; color: #333; "><b style="color: tomato;">Member : </b><a style="color:   mediumblue; " href="<?php echo base_url() ?>poems/poet_personal_info/<?php echo $rows->user_id; ?>"><b style=" font-weight: normal; color: tomato;"><?php echo ucfirst($rows->member); ?></b></a></p>
                            <p style="text-align: justify;padding: 15px; color: midnightblue;"><b style="color:  #444;">Comment : </b><b style="text-align:  justify; font-weight:  normal;"><?php echo $rows->comments_poet; ?></b></p>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>