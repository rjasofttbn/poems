

<!-- this code home page --!-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link>

<div id="managepoem_caption">

</div>
<div id ="add_home" ><!-- this code for view add in home page start !-->
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>
</div><!-- this code for view add in home page end !-->
<div id="poems_home">
    <div id="poems_four_content">
        <div id="home_first_caption">  <!-- Hot Poems to New Poets caption start  !-->
            <div id="hot_poem_caption" style="  font-family:initial; ">
                Hot Poem's
            </div>
            <div id="famous_poet_caption" style=" font-family:initial; " >
                Popular Poet's
            </div>
            <div id="popular_poet_caption" style=" font-family:initial ">
                Popular Member's
            </div>
            <div id="new_poet_caption" style=" font-family:initial ">
                New Member's
            </div>
        </div>

        <!-- Hot Poems to New Poets caption end  !-->
        <div id="detail">
            <div id="hot_poems">   <!-- #2ae this code for hot poems by total vote !-->

                <?php foreach ($result_top_poem as $result_top_poem) { ?>
                    <ul><li  style="color: #333"><p>
                <a title="Top Poem" style="color: #333; font: normal 13px/13px sans-serif;line-height:.9;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $result_top_poem->poem_id; ?>" ><?php echo substr("$result_top_poem->title", 0, 21); ?></a></p></li></ul> <!-- link with poems detail  !-->
                <?php } ?>
            </div>

            <div id="famous_poet">  <!-- this code for famous poets by avg vote !-->

                <?php foreach ($result_famous_poets as $result_famous_poets) { ?>
                    <ul><li style="color: #333"><p><a title="Popular Poet <?php echo $result_famous_poets->user_rank; ?>"  style="color: #333; font: normal 13px/13px sans-serif;line-height:.9;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $result_famous_poets->user_id; ?>"><?php echo ucfirst(substr("$result_famous_poets->Name", 0, 25)); ?></a></p></li></ul> <!-- link with poems detail  !-->
                <?php } ?>
            </div>

            <div id="top_member_poet">  <!-- this code for popular poets by total vote !-->
                <?php foreach ($popular_members as $popular_members) { ?>
                    <ul><li style="color: #333"><p><a title="Popular Member <?php echo $popular_members->user_rank; ?>" style="color: #333; font: normal 13px/13px sans-serif;line-height:.9;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $popular_members->user_id; ?>"  ><?php echo ucfirst(substr("$popular_members->Name", 0, 25)); ?></a></p></li></ul><!-- link with poems detail  !-->
                <?php } ?>
            </div>

            <div id="new_member">
                <div id="new_member_font">  <!-- this code for showing new members !-->
                    <?php foreach ($results as $aresults) { ?>
                        <ul><li style="color: #333"><p><a title="New Member" style="color: #333; font: normal 13px/13px sans-serif;line-height:.9;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $aresults->user_id; ?>" ><?php echo ucfirst(substr("$aresults->member", 0, 25)); ?></a></p></li></ul>  <!-- link with poems detail  !-->
                    <?php } ?>
                </div>
            </div>
            <div id="home_first_caption_bottom">

            </div>
        </div>
    </div>

    <div id="poems_three_content"><!-- this code for view div title start !-->

        <!-- this code for view poem of the day in index page start !-->

        <div id="three_report_view">

            <div id="poemofday">
                <div id="poemofday_titls">
                    <div style="margin-left: 5px; margin-top: 9px; text-align: left;  color: #B57340; font-family: initial;">Poem of The Day</div>
                </div>
                <div id="poemofday_pic_to_name">
                    <div id="poemofday_pic">
                        <?php foreach ($poem_of_the_day as $poem_of_the_day) { ?>   

                            <?php
                            if (!empty($row->poem_of_the_day)) {
                                ?>                                                                        <!-- <a href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" ><img height="50px" width="50px" src="<?php echo base_url() ?><?php echo $poem_of_the_day->picture_small; ?>"/></a>link with poems detail  !-->
                                <img height="50px" width="50px" style=" margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poem_of_the_day->picture_small; ?>"/><!-- link with poems detail  !-->

                                <?php
                            } else {
                                ?>
                                <img title="" height="50px" width="50px" style="margin: 0px 0px 0px 0px; " src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div id="poemofday_name">
                        <div id="poemofday_name_font">
                            <a title="Poem Name" style="text-decoration: underline;font: bold 13px/13px sans-serif; color: darkgreen;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" ><?php echo $poem_of_the_day->title; ?></a></br> <b style=" font-weight: normal; color: #555;">by</b> <!-- link with poems detail  !-->
                            <b title="Poet Name" style=" color: #555; font: bold 13px/13px sans-serif;"><?php echo substr(ucfirst($poem_of_the_day->name), 0, 13); ?></b> 
                        </div>
                    </div>
                </div>
                <div id="poem_day_poem_view"style="overflow: scroll; ">
                    <div  id="poem_day_poem_view_font" >
                        <p title="Poem" ><?php echo substr($poem_of_the_day->body, 0, 155); ?>  -----</p>

                    </div>
                </div>

                <div id="poem_day_poem_details">
                    <div id="poem_day_poem_details_font">
                        <a style="font: bold 12px/12px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" >More »</a>
                    </div>
                </div>

                <div id="all_poem_day">

                    <a style=" float: right; padding: 3px; color:  tomato;  font: bold 12px/12px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/" >All poem of the day »</a>

                </div>
            </div>

            <div id="member_poems_day">
                <div id="member_poems_titls">
                    <div   style=" text-align:  left; margin-left: 4px; margin-top: 9px; color: #B57340;"> Poem of The Day / Member</div>
                </div>
                <div id="poemofday_member_pic_to_name">
                    <div id="poemofday_member_pic">
                        <?php foreach ($poem_of_the_member as $poem_of_the_member) { ?>
                            <?php
                            if (!empty($poem_of_the_member->picture_small)) {
                                ?>

                                <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poem_of_the_member->picture_small; ?>"/><!-- link with poems detail  !--> 

                                <?php
                            } else {
                                ?>
                                <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>  

                            <?php } ?>
                        <?php } ?>



                    </div>
                    <div id="poemofday_member_name">
                        <div id="poemofday_member_name_font">
                            <a title="Poem Name" style="text-decoration: underline; font: bold 13px/13px sans-serif; color:darkgreen; " href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_member->poem_id; ?>" ><?php echo $poem_of_the_member->title; ?></a></br> <b style=" font-weight: normal; color: #555;">by</b> <!-- link with poems detail  !-->
                            <b title="Poet Name" style=" color: #555; font: bold 13px/13px sans-serif;"> <?php echo substr(ucfirst($poem_of_the_member->name), 0, 13); ?></b>
                        </div>
                    </div>
                </div>
                <div id="poem_day_member_poem_view" style="overflow: scroll; ">
                    <div id="poem_day_member_view_font">
                        <p title="Poem" ><?php echo substr("$poem_of_the_member->body", 0, strpos($poem_of_the_member->body, ' ', 185)); ?>  -----</p>
                    </div>
                </div>
                <div id="poem_day_member_details">
                    <div id="poem_day_member_details_font">
                        <a style="font: bold 12px/12px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_member->poem_id; ?>" >More »</a>
                    </div>
                </div>
            </div>

            <div id="poemofthe_month"><!-- this code for view poem of the month in index page start !-->
                <div id="month_poems_titls">
                    <div style="float: left; margin-left: 5px; text-align: left; margin-top: 9px; color:#B57340;"> Poem of The Month</div>
                </div> 
                <div id="poem_month_pic_to_name">
                    <div id="poemofday_month_pic">
                        <?php 
                         
                        foreach (

                                 
                                 
                                $poet_of_month as $poet_of_montha) { 
                           
                            ?>
                        
                            <?php
                            if (!empty($poet_of_montha->picture_small)) {
                                ?>
                                <img title="<?php echo !isset($poet_of_montha->read_value); ?>+<?php echo !isset($poet_of_montha->user_vote); ?> =<?php echo !isset($poet_of_montha->vote); ?>" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poet_of_montha->picture_small; ?>"/><!-- link with poems detail  !-->
                                <?php
                            } else {
                                ?>
                                <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>
                            <?php } ?>
                        <?php } ?>

                    </div>                                    
                    <div id="poemof_month_name">
                        <div id="poemof_month_name_font">
                            <a title="Poem Name" style="text-decoration: underline; font: bold 13px/13px sans-serif; color:darkgreen;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo !isset($poet_of_month->poem_id); ?>" ><?php echo !isset($poet_of_month->title); ?></a></br> <b style=" font-weight: normal; color: #555;">by</b> <!-- link with poems detail  !-->
                            <b title="Poet Name" style=" color: #555; font: bold 13px/13px sans-serif; "> <?php echo ucfirst(!isset($poet_of_month->name)); ?></b> 
                        </div>
                    </div>
                </div>                               
                <div id="poem_month_member_poem_view" style="overflow: scroll; ">
                    <div id="poem_month_member_view_font">
                        <!--<p title="Poem"><?php echo substr("!isset($poet_of_month->body)", 0, strpos(!isset($poet_of_month->body), ' ', 230)); ?>  -----</p>-->
                        <p title="Poem"><?php echo 'Neee check data'; ?>  -----</p>
                    </div>
                </div>
                <div id="poem_month_member_details">
                    <div id="poem_month_member_details_font">
                        <a style="font: bold 12px/12px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo !isset($poet_of_month->poem_id); ?>" >More »</a>
                    </div>
                </div>
            </div>
            <div id="poem_manage_list_view">
                <div id="poem_manage_home_batton">
                    <div id="poem_manage_home_batton_mange">
                        <div id="poem_manage_home_batton_mange_font">
                            <a style="text-decoration: none; color: #B57340; " href="" class="manage-poems-button" title="Manage your poems">MANAGE</a>                            
                        </div>
                    </div>

                    <div id="poem_manage_home_batton_poem">
                        <div id="poem_manage_home_batton_poem_font">                            
                            <a style="text-decoration: none; color: #B57340; " href="" class="manage-poems-button" title="Manage your poems">YOUR POEMS</a>
                        </div>
                    </div>
                </div>
                <div id="poem_manage_list">
                    <ul id="promos">
                        <li>»<a style="color: #555;"    title="My Favorite Poems" href=""> My Favorite Poems</a></li>
                        <li>»<a style="color: #555;"    title="Classical Poets" href=""> Classical Poets</a></li>
                        <li>»<a style="color: #555;"    title="Poem of the Day" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/"> Poem of the Day <i class="icon exclamation"></i></a></li>
                        <li>»<a style="color: #555;"    title="Random Poem" href=""> Random Poem</a></li>
                        <li>»<a style="color: #555;"    title="Poetry Forum" href=""> Poetry Forum</a></li>
                        <li>»<a style="color: #555;"    title="Contests" href="<?php echo base_url() ?>poems/poetry_contest.php"> Contests</a></li>
                        <li>»<a style="color: #555;"    title="Help" href=""> Help</a></li>
                    </ul>
                </div> 
            </div>
        </div>


        <!-- <div id="index_category_to_add">
        </div>
this code for view poem of the month in index page end !-->

        <div id="newpoems_to_link">
            <div id="new_poems">    <!-- this code for showing new poems order by submit_date desc!-->
                <div id="new_poems_titls">                    
                    <div style=" margin: 9px 0px 0px 59px; color:#B57340;"> Last Poems</div>
                </div>
                <div id="new_poems_font">
                    <?php foreach ($result as $aresult) { ?>
                        <div style="background-color: #eee; height: auto;line-height: 0px;">
                            <ul><b style="color:tomato;">→</b><a  title="New Poem" style="  font:  normal 14px/14px sans-serif; color:#333; " href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id; ?>" > <?php echo substr($aresult->title, 0, 19); ?> </a></ul> <!-- link with poems detail  !-->
                        </div>
                    <?php } ?>
                </div>

                <div id="all_new_poems_btn">    <!-- this code for showing all new poems order by submit_date desc !-->
                    <form>
                        <a style="float:left;
                           color:  tomato;
                           height:  21px;                           
                           background-color:  whitesmoke;
                           width: auto; 
                           font-weight: bold;
                           box-shadow:0px 0px 5px 0px silver  ; /* add shadow */
                           margin:  3px 0px 0px 0px;" href=" <?php echo base_url(); ?>user_admin_controller/all_poem_view.php" class="link">&nbsp;Click here to list all new poems »&nbsp;</a>
                    </form>
                </div>
            </div>
            <div id="add_to_link">
                <!--                <div id="some_category">
                                    <div  id="some_category_titls">
                                        <div style="margin-left: 35px; margin-top: 9px; color: #B57340; ">Poems About</div>                        
                                    </div> 
                                    <div  id="some_category_detail">
                <?php foreach ($category_view as $row) { ?>
                                                    <div id="some_category_font">
                                                        <div id="some_category_font_position">
                                                            <li><a style="color: #333;" title="Poem Category" href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $row->poems_category_id; ?>" ><?php echo $row->poems_category_name; ?></a></li>  link with poems detail  !
                                                        </div>
                                                    </div>
                <?php } ?>
                                        <div style="float:left;
                                             height:  23px;
                                             width: 121px;
                                             text-align: center;
                                             background-color: whitesmoke;                             
                                             border-radius: 3px;
                                             box-shadow:0px 0px 5px 0px silver ; /* add shadow */
                                             margin:  15px 0px 0px 289px;" id="category_btn">
                                            <a style="font:bold 13px/13px sans-serif; color: tomato; "  href=" <?php echo base_url(); ?>welcome/category_detail_view.php" class="link">More Topics »</a>
                                        </div>
                                    </div> 
                                </div>-->

                <?php

                function timeAgo($time_ago) {
                    $time_ago = strtotime($time_ago);
                    $cur_time = time();
                    $time_elapsed = $cur_time - $time_ago;
                    $seconds = $time_elapsed;
                    $minutes = round($time_elapsed / 60);
                    $hours = round($time_elapsed / 3600);
                    $days = round($time_elapsed / 86400);
                    $weeks = round($time_elapsed / 604800);
                    $months = round($time_elapsed / 2600640);
                    $years = round($time_elapsed / 31207680);
                    // Seconds
                    if ($seconds <= 60) {
                        return "just now";
                    }
                    //Minutes
                    else if ($minutes <= 60) {
                        if ($minutes == 1) {
                            return "one minute ago";
                        } else {
                            return "$minutes minutes ago";
                        }
                    }
                    //Hours
                    else if ($hours <= 24) {
                        if ($hours == 1) {
                            return "an hour ago";
                        } else {
                            return "$hours hrs ago";
                        }
                    }
                    //Days
                    else if ($days <= 7) {
                        if ($days == 1) {
                            return "yesterday";
                        } else {
                            return "$days days ago";
                        }
                    }
                    //Weeks
                    else if ($weeks <= 4.3) {
                        if ($weeks == 1) {
                            return "a week ago";
                        } else {
                            return "$weeks weeks ago";
                        }
                    }
                    //Months
                    else if ($months <= 12) {
                        if ($months == 1) {
                            return "a month ago";
                        } else {
                            return "$months months ago";
                        }
                    }
                    //Years
                    else {
                        if ($years == 1) {
                            return "one year ago";
                        } else {
                            return "$years years ago";
                        }
                    }
                }
                ?>

                <?php foreach ($trending as $row) { ?>

                    <div id="trending_home_page">
                        <div id="titls">
                            <div id="image">
                                <img height="50px" width="50px" style=" float: left; margin:2px 0px 0px 2px;  border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                            </div>
                            <div id="submit_date">
                                <b style="float: left ; text-align: center; font: normal 13px/13px sans-serif;margin-top: 8px; color: #333;"><?php echo timeAgo("$row->poem_submit_date", true); ?></b>
                            </div>
                            <div id="trending_image">
                                <!--<b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b>-->

                            </div>
                            <div id="trending_date">
                                <b style="float: left; text-align: center; margin-left: 3px; font: normal 13px/13px sans-serif;margin-top: 9px; color: #555;"><?php echo timeAgo("$row->trending_date", true); ?></b>
                            </div>
                            <div id="name">
                                <b style="float: left; margin:3px 0px 0px 3px ;"><a  style=" font: bold 14px/14px sans-serif; color: #666;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo ucfirst($row->name); ?></a></b>
                            </div>
                        </div>
                        <div id="detail">
                            <div id="title">
                                <a style=" float: left; text-align: center; font: bold 15px/15px sans-serif;margin: 5px 0px 0px 255px  ;  color: #666;"  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><?php echo $row->title; ?></a>
                            </div>
                            <div id="data" style="overflow: scroll; ">
                                <b style="font: normal 13px/13px sans-serif; color: #333;"><?php echo substr("$row->body", 0, 447); ?></b>

                                <!--<?php
                                $file1 = "./$row->body.txt";
                                $lines = file($file1);
                                $count = count($lines);
                                echo($count);
                                ?>!-->

                            </div>
                            <div id="button">
                                <a style="float: right;margin-top: 7px; text-align: center; margin-right: 25px;  font: normal 14px/14px sans-serif; color: tomato;"  href="<?php echo base_url(); ?>user_admin_controller/all_trending_poem_view/"> All trending poem's view »</a> 

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--                    <div> <?php foreach ($home_add_small as $row) { ?>
                                                                                                                                                                        <img height="295" width="297px"src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/> link with poems detail  !
                <?php } ?></div>-->


            </div>

            <div id="add_to_social_link">
                <div id="add_second_home">
                    <?php foreach ($home_add_second as $row) { ?>
                        <img height="260px" width="525px" src="<?php echo base_url() ?><?php echo $row->second_add_home; ?>"/><!-- link with poems detail  !-->
                    <?php } ?>
                </div>
                <div id="home_link_social">
                    <div id="social_facebok">                       
                    </div>

                    <div id="social_twitter">                       
                    </div>

                    <div id="total_info">   
                        <div id="title">
                            <div id="font">
                                User Partition :
                            </div>

                        </div>
                        <div id="detail">
                            <div style="line-height: 19px; padding: 5px">
                                <?php foreach ($famous_poet_total as $row) { ?>

                                    <p> <b style="font: normal 14px/14px sans-serif; color: #333;">Poet's : </b><a style=" font: bold 14px/14px sans-serif; color: tomato;" title="Total Famous Poet"href="<?php echo base_url(); ?>welcome/total_famous_poet_view_home/"><?php echo $row->famous_poet; ?>.</p></a>

                                <?php } ?>                               

                                <?php foreach ($member_total as $row) { ?>

                                    <b style="font: normal 14px/14px sans-serif; color: #333;">Member's : </b><a style="font: bold 14px/14px sans-serif; color: tomato;" title="Total Member Poet"href="<?php echo base_url(); ?>welcome/total_member_view_home/"><?php echo $row->member; ?>.</a>

                                <?php } ?>
                            </div>
                        </div>
                    </div>   

                </div>
            </div>
        </div>

        <div id="famous_poet_poems">
            <div id="famous_poet_top">
                <div id="famous_poet_top_title"> 

                    <div id="famous_poet_top_title_design"> 
                        <div style="float: left; font:  bold 17px/17px sans-serif ; margin-top: 11px; padding: 7px; text-align: left; color:#B57340;">Famous Poet's</div>
                    </div>               

                </div>  
                <div id="famous_poet_top_data">

                    <?php foreach ($poet_famous as $row) { ?>
                        <div id="famous_poet_top_data_cover">

                            <div id="famous_poet_top_data_font">
                                <div style="height: auto; width: auto;">
                                    <div style="float: left;  height: 54px; width: 54px; margin:  11px 0px 0px 0px; border-color:#ccc; border-style:  solid; border-width: 1px; border-radius: 3px; background-color:whitesmoke;">
                                        <div id="image">
                                            <?php
                                            if (!empty($row->picture_small)) {
                                                ?>
                                                <img height="50px" width="50px" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                                                <?php
                                            } else {
                                                ?>
                                                <img title="" height="50px" width="50px" style="margin: 0px 0px 0px 0px; " src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div style=" float: left;  height: 60px;  width: 166px; margin:  13px 0px 0px 5px;">
                                        <!--<a #b64e76; style="font-weight: bold;"> <?php echo $row->name; ?></a><br>-->

                                        <a title="Famous Poet" style="font:  normal 14px/14px sans-serif ; color: tomato  " href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo ucfirst($row->name); ?></a>

                                        <div style="font:  normal 11px/11px sans-serif ; color: #333;"><?php echo $row->date_of_birth; ?></div>                                       
                                    </div>

                                </div>

                            </div>

                        </div>
                    <?php } ?>

                    <div  id="famous_poet_btn">
                        <div id="font">
                            <a style="color: tomato;font:  normal 15px/15px sans-serif ;  " href="<?php echo base_url(); ?>welcome/famous_poets_all.php" title="The Complete List of Famous Poets">The Complete List of Famous Poets »</a>
                        </div>
                    </div>
                </div>
            </div>


            <div id="famous_poems_top">
                <div id="famous_poems_top_title"> 
                    <div id="famous_poems_top_title_design"> 
                        <div style="font-weight: bold; font:  bold 17px/17px sans-serif ; margin-left: 6px; margin-top: 11px; padding: 7px; text-align: left; color:#B57340; ">Famous Poem's</div>;

                    </div>  
                </div>  
                <div id="famous_poems_top_data">
                    <?php
                    $cnt = 1;
                    foreach ($poem_famous as $row) {
                        ?>
                        <div id="famous_poet_top_data_cover" style=" border-bottom:  #ddd  dotted 1px;">
                            <div style=" float:  left;  width:477px;   margin-top:7px; text-align: left; ">
                                <div style=" float:left; width:27px; margin: 0px 0px 7px 11px;font:  normal 14px/14px sans-serif ; color: #555;"> <?php
                                    echo $cnt;
                                    $cnt++;
                                    ?>.</div>

                                <a title="Famous Poem" style=" float: left; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" ><div style=" float:left; height:auto;  font: bold 14px/14px sans-serif;  width:auto; margin: 0px 0px 0px 1px;"><?php echo $row->title; ?></a> ,&nbsp; </div>
                            <b style=" float: left;font:  normal 14px/14px sans-serif ; color: #333;"><?php echo ucfirst($row->name); ?></b>
                        </div>
                    </div>
<?php } ?>

                <div  id="famous_poems_btn">
                    <div id="font">
                        <a style=" color:  tomato; font:  normal 15px/15px sans-serif ;  " href="<?php echo base_url(); ?>welcome/famous_poems_all.php" title="The Complete List of Famous Poems">The Complete List of Famous Poems »</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
