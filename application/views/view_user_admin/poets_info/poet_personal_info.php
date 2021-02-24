
<!-- 

Develop date and time:
Objective of this page:
controller name : 
model name : 
tabel name:
css:
mother page menu name:

!-->

<!-- css locale start !-->

<link href="<?php echo base_url(); ?>/login/registration_login.css" rel="stylesheet" type="text/css"></link> 

<!-- css locale end !-->


<!-- front end for manage poems !-->


<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>   
</div> 

<div id="poet_personal_information">
    <div id="poet_personal_information_font">
        <?php
        foreach ($poet_personal_detail as $poet_personal_detail) {
            ?>
            <?php echo ucfirst($poet_personal_detail->poet_info); ?> 

        <?php } ?> 
    </div>
    <div style="float: right;margin: 7px 0px 0px 0px;">
        <div id="poet_rank">
            <?php
            if (empty($famous_poet_total) || !empty($poet_rank_result)) {
                ?>
                <?php foreach ($poet_rank_result as $row) { ?>
                    <div id="font" title="Position create by this <?php echo $row->rank_value; ?> Point's" >#
                    <?php } ?>
                    <!--this loop for rank value.-->
                    <?php
                    if (isset($poet_rank_result)) {
                        foreach ($poet_rank_result as $row) {
                            echo $row->rank_no;
                        }
                    }
                    ?>
                    <?php if (!empty($poet_rank_result)) { ?>             
                        on top 
                        <?php
                        if (isset($total_top_poet)) {
                            foreach ($total_top_poet as $row) {
                                echo $row->total_top_poet;
                            }
                        }
                        ?> poets 
                    <?php } ?>
                </div> 
            <?php }
            ?>
        </div>
    </div><!-- this div for rank view end !-->
</div>
<div id="poet_personal_main">
    <div id="poet_personal_poem_menu">
        <div id="poet_personal_poem_menu_image"> <!-- this div for pic view start !-->
            <?php
            foreach ($poet_picture as $poet_picture) {
                ?>

                <?php
                if (!empty($poet_picture->picture_small)) {
                    ?> 
                    <img style=" float: left; border-radius:  50% ;  border:  white solid 5px; margin-bottom: 3px;" height="60" width="60" src="<?php echo base_url() ?><?php echo $poet_picture->picture_small; ?>"/>
                    <?php
                } else {
                    ?>
                    <img title="" height="50px" width="50px" style=" float: left; border-radius:  50% ;  border:  white solid 5px; margin-bottom: 3px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                <?php } ?>

            <?php } ?>
        </div> <!-- this div for pic view end !-->

        <div id="poet_personal_menu_detail"><!-- this div for poet personal info view start !-->
            <div  id="poet_personal_menu_poets_page">
                <div  id="poet_personal_menu_poets_page_font">
                    <a style="  color: #B57340;font:bold 15px/16px sans-serif ; " href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $user_id; ?>" class="link">Poet's page</a>

                </div> 
            </div> 
            <div id="poet_personal_menu_poems">
                <div id="poet_personal_menu_poems_font">
                    <a style=" color: #B57340;font:bold 15px/16px sans-serif ;" href="<?php echo base_url(); ?>poems/personal_poem_page_data/<?php echo $user_id; ?>" class="link">Poems</a>                                                                      
                </div> 
            </div>
            <div id="poet_personal_menu_comments">
                <div id="poet_personal_menu_comments_font">
                    <a  style="   color: #B57340; font:bold 15px/16px sans-serif;" href="<?php echo base_url(); ?>poems/poets_personal_comments/<?php echo $user_id; ?>" class="link">Comments</a>
                </div> 
            </div>

            <div id="poet_message">
                <div id="poet_message_font">
                    <a style="font:bold 14px/16px sans-serif; color: #B57340;"  href="<?php echo base_url(); ?>user_admin_controller/send_message/<?php echo $user_id; ?>" class="link">Send Message</a>
                </div> 
            </div>
        </div> <!-- this div for poet personal info view end !-->

    </div>
    <div id="poet_personal_poem_to_add"><!-- poet personal info view by sub page's!-->
        <div id="poet_personal_add_to_poem_wrapper">           
            <?php echo $poets_details; ?>       
        </div>
        <!--        <div id="poet_personal_poem_add">
                   poem_add
                </div> -->
    </div>
</div>






