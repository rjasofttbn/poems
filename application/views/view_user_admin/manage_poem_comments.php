
<!-- css locale start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link> 
<div id="new_poets_Page_title">
    <div id="font">
        Poem's
    </div>    
</div> 
<!-- css locale end !-->
<div style="float: left; height: auto; width: auto;">
    <div style="  height: 31px;  width: 100%;">
        <div style="float: left; "><a style=" float: left;  border-top-left-radius: 7px; height: 31px; width: 175px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/poem_submit.php" id="active"><b style="float: left; margin: 7px 0px 0px 17px; text-align: center;">Submit a new poem</b></a></div>
        <div style=" float: left;"><a style="float: left; height: 31px; width: 247px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user.php" id="active"><b style="float: left; margin: 7px 0px 0px 19px;  text-align: center;">Edit (or delete) your poems</b></a> </div>
        <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 335px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poem_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 33px; text-align: center; ">Manage comments about your poems </b></a></div>
        <!-- poem's insert,edit,update,delete end !-->
    </div>
    <div id="comments_view"> 
        <!--    <div style="  border-radius:7px;  height: 31px;  ">
                <div style=" margin-left: 4px;"><a style=" float: left;  background-color: gainsboro; margin-top: 5px;text-decoration: underline;  box-shadow: 0px 0px 7px 0px; padding: 2px;  border-radius: 100px; font: bold 17px/19px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/poem_submit.php" id="active">Submit a new poem</a></div>
                <div style=" margin-left: 24px;"><a style="float: left; background-color: gainsboro;  margin-left: 24px;  box-shadow: 0px 0px 7px 0px; padding: 2px;  border-radius: 100px; margin-top: 5px; text-decoration: underline; font: bold 17px/19px sans-serif;color: #333;" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user.php" id="active">Edit (or delete) your poems</a> </div>
                <div style=" margin-left: 24px;"> <a style="float: left;  background-color: gainsboro; margin-top: 5px; box-shadow: 0px 0px 7px 0px; padding: 2px;  border-radius: 100px;  margin-left: 24px;text-decoration: underline;  font: bold 17px/19px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poem_comments.php" id="active">Manage comments about your poems </a></div>
                 poem's insert,edit,update,delete end !
            </div>-->
        </br>
        </br>

        <div id="comments_caption"> <!-- caption page !-->
            <h3 style="color: #555;"> Manage Comment's About Your Poems</h3>
        </div>        

        <div id="comments_view_content_phperror">
            <div id="comments_about_poems_rules">
                <font style="color: indianred;">If you find a comment inappropriate, you can remove (delete) it using the <i>'Remove this comment'</i> link.
            </div>
            <div id="comments_view_content">
                <?php
                foreach ($result as $aresult) {     // poem comments info view !
                    ?>
                    <div id="comments_view_data">
                        <div id="data_remove">
                            <b style=" float: left; padding: 15px; padding-top:  5px; color: #666; margin-top: 5px; margin-left: 55px; "> Date & Time : <?php echo $aresult->comments_post_date; ?></b> 

                            <a style=" float: right; text-decoration:underline;  margin-right: 11px; margin-top: 9px; text-align: right; color: blue;" href="<?php echo base_url() ?>poets_profile_controller/deletecomments/<?php echo $aresult->comments_id ?>" onclick="return checkDelete();"><b style="color: tomato;">Remove The Comment</b></a>
                        </div>

                        <div id="comments_data">

                            <div id="image">
                                <?php
                                if (!empty($aresult->picture_small)) {
                                    ?>   

                                    <img  height="50" width="50" style=" float: left; transform: translate(-27px , -111px); box-shadow: 0px 1px 21px 1px gray; border: white solid 5px; border-radius: 50px; margin: 21px 0px 0px 0px;" src="<?php echo base_url() ?><?php echo $aresult->picture_small; ?>"/>

                                    <?php
                                } else {
                                    ?>
                                    <img title="" height="50px" width="50px" style=" float: left; transform: translate(-27px , -111px); box-shadow: 0px 1px 21px 1px gray; border: white solid 5px; border-radius: 50px; margin: 21px 0px 0px 0px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                                <?php } ?>
                            </div> 


                            <div id="poem_to_comments">
                                <p style="  padding:15px; color: #666; "><b style="color:  #444;">Poem : </b><a style="color: mediumblue; " href="<?php echo base_url() ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id ?>"><b style=" font-weight: normal; text-decoration:underline; color: tomato;"><?php echo $aresult->title; ?></b></a>
                                    </br> </br><b style="color:  #666;">Member : </b><a style="color:   mediumblue; " href="<?php echo base_url() ?>poems/poet_personal_info/<?php echo $aresult->user_id; ?>"><b style=" font-weight: normal; text-decoration:underline;  color: tomato;"><?php echo ucfirst($aresult->member); ?></b></a>
                                    </br> </br><b style="color:  #666;">Comment : </b><b style="text-align:  justify; font-weight:  normal;"><?php echo $aresult->comments; ?></b></p>
                            </div>

                        </div>

                    </div>
                <?php } ?>

<!--            <table border="1" align="center" style=" background-color:  ivory; color: black;  text-align: left ">
    <tr>
        <th>Date & Time:</th>
        <th>Poem:</th>
        <th>Member:</th> 
        <th>Comment: </th>
    </tr>

     comments's view start !

                <?php
                foreach ($result as $aresult) {     // poem comments info view !
                    ?>
                                                    <tr>
                                                        <td><?php echo $aresult->comments_post_date; ?></td>
                                                        <td><a style="color: blue; " href="<?php echo base_url() ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id ?>"><?php echo $aresult->title; ?></a></td>
                                                        <td><a style="color: blue; " href="<?php echo base_url() ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id ?>"><?php echo $aresult->member; ?></a></td>
                                                        <td><?php echo $aresult->comments; ?></td>
                                                        <td>
                                                            <a style="color: blue;" href="<?php echo base_url() ?>poets_profile_controller/deletecomments/<?php echo $aresult->comments_id ?>" onclick="return checkDelete();">Remove</a>
                                                        </td>
                                                    </tr>
                <?php } ?>

    poem comments's view end !
</table> -->


            </div>
        </div>
    </div>    
</div>