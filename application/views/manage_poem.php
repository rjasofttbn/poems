
<!-- front end for manage poems !-->

<!--<div id="managepoem_caption">
    Manage My Poems
</div>  -->

<canvas id="myCanvas" width="auto" height="70px"
style="text-align: left; float: left; ">
Your browser does not support the canvas element.
</canvas>

<script>
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
ctx.font = "31px Arial red";
ctx.strokeText("Manage My Poems",1,51);
</script>


<div id="managepoem_info">
    <div id="managepoem_info_font">  
        <p style=" color: #333; font: bold 17px/19px serif;">You can add, edit or delete your poems on this page. Also on this page you can view your poet profile, statistics and other tools.
            You have
            <?php foreach ($total_poem as $row) { ?>
            
            <a style=" color: tomato; font: bolder 19px/27px sans-serif; text-decoration:  underline; text-decoration-style:  dotted; text-decoration-color: black;" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user.php" id="active"><?php echo $row->total_poem;?> </a>
            
            <?php }?>  
            poem(s) published on <b style=" color: #777;">Poetsfeeling.com.</b></p> 
    </div>
</div>
<div id="manage_poem">
    <div id="poem_profile">
        <div id="poems">
            <div id="poem_font_caption">
                POEMS
            </div>

            <!-- poem's insert,edit,update,delete start !-->
            <div id="poems_fonts">
                <td><a style="color: #555;" href="<?php echo base_url(); ?>user_admin_controller/poem_submit.php" id="active">Submit a new poem</a></td><br>                          
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user.php" id="active">Edit (or delete) your poems</a></td> <br>
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>poets_profile_controller/view_poem_comments.php" id="active">Manage comments about your poems </a></td> 
                <!-- poem's insert,edit,update,delete end !-->

            </div>
        </div>
        <div id="profile">
            <div id="poem_font_caption">
                POET PROFILE
            </div>

            <!-- poet personal information update start !-->
            <div id="poems_fonts">
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>poets_profile_controller/edityourbiography.php" id="active">Edit your biography</a></td><br>                          
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>poets_profile_controller/picture_edit.php" id="active">Edit your pictures</a></td><br>
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>poets_profile_controller/view_poet_comments.php" id="active">Manage comments about you</a></td> 
            </div> 
            <!-- poet personal information update end !-->

        </div>
    </div>
    <div id="tools_reports">
        <div id="tools">
            <div id="poem_font_caption">
                TOOLS
            </div>

            <!-- poems e_book,download start !-->
            <div id="tools_font">
                <!--<td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/message.php" id="active">Update e-Book</a></td><br>-->   
                <!--<td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/download_your_poems.php" id="active">Download your poems</a></td><br>-->                          
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/most_popular_poets.php" id="active">Promote your poems </a></td><br>
                <!--<td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/message.php" id="active">Download e-book</a></td>--> 
            </div>
            <!-- poems e_book,download end !-->

        </div>
        <div id="reports">
            <div id="poem_font_caption">
                REPORTS
            </div></br>

            <!-- poems reports start !-->
            <div id="tools_font">
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/poem_status.php" id="active">Status</a></td><br>                          
                <!--<td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/message.php" id="active">More Status</a></td> <br>-->
            </div>
            <!-- poems reports end !-->

        </div>
       <!-- <div id="options">

            <!-- post comments enable/disable start
            <div id="poem_font_caption">
                OPTIONS
            </div> !-->
            <!-- post comments enable/disable end !-->

            <!--<div id="tools_font">
                <td><a  style="color: #555;"  href="<?php echo base_url(); ?>user_admin_controller/message.php" id="active">Options</a></td><br>  
            </div>
        </div>!-->
    </div>
</div>


