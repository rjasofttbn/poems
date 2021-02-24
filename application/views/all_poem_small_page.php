
<!-- all poem small interface !-->

<!-- css locale connection start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>      
<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link>
<!-- css locale connection end !-->

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>    
</div> 

<!--<div style=" color: #03579E; font-size: 35px;" id="all_poem_page_head">
    Poem's
</div>-->

<div id="new_poets_Page_title">
    <div id="font">
        Poem's
    </div>    
</div>

<div id="new_poem_content_page">
    <div id="mange_poem_to_poem_about">
        <div id="mange_to_registration">
            <div id="login"> 
                <div id="title">
                    <a  href="<?php echo base_url(); ?>poems/login.php" id="active"><b style=" float: left; margin: 9px 0px 0px 43px; color: #B57340;">MANAGE</br> YOUR POEMS</b></a>
                </div>
                <div id="menu" > 
                    <ul style=" text-align: left;">
                        <li style="color:  #555;"><a style="color:  #555;" title="Classical Poems" href="">Classical Poems</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="Top Poems" href="">Top Poems</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="Top Poems" href="">Topics - Top Poems</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="Random Poem" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/">Poem of the Day</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="New Poems" href="<?php echo base_url(); ?>user_admin_controller/all_poem_view.php">New Poems</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="Random Poem" href="">Random Poem</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="Poems About" href="">Poems About</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="My Poems" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user_poet_page.php">My Poems</a></li>
                        <li style="color:  #555;"><a style="color:  #555;" title="My Favourite Poems" href="">My Favourite Poems</a></li>
                    </ul>
                </div>
            </div>

            <div id="reg_menu_button">
                <div id="reg_menu_button_reg_info">          
                    <b style="float: left; margin: 7px 0px 0px 23px;"><a style=" color: tomato; font: bold 13px/13px sans-serif; padding: 5px;"  href="<?php echo base_url(); ?>welcome/signup.php">Registration Now</br>
                            and Publish your</br> Poems on</br>www.poetsfeeling.com</a></b>
                </div>
                <div id="reg_menu_button_reg_free">
                    Free
                </div>
            </div>
        </div>
        <div id="poem_day_to_month">

            <div id="poem_day_poem_page">
                <div id="poemofday">
                    <div id="poemofday_titls">
                        <div style="margin-left: 5px; margin-top: 9px; text-align: left;  color: #B57340;">Poem of The Day</div>
                    </div>
                    <div id="poemofday_pic_to_name">
                        <div id="poemofday_pic">
                            <?php foreach ($poem_of_the_day as $poem_of_the_day) { ?> 
                                                                                               <!-- <a href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" ><img height="50px" width="50px" src="<?php echo base_url() ?><?php echo $poem_of_the_day->picture_small; ?>"/></a>link with poems detail  !-->
                                <?php if (!empty($poem_of_the_day->picture_small)) { ?>    
                                    <img height="50px" width="50px" style=" margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poem_of_the_day->picture_small; ?>"/><!-- link with poems detail  !-->
                                <?php } else { ?>
                                    <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>
                                <?php } ?>

                            <?php } ?>
                        </div>
                        <div id="poemofday_name">
                            <div id="poemofday_name_font">
                                <a title="Poem Name" style="text-decoration: underline;font: bold 13px/13px sans-serif; color: darkgreen;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" ><?php echo $poem_of_the_day->title; ?></a></br> <b style=" font-weight: normal; color: #333;">by</b> <!-- link with poems detail  !-->
                                <b title="Poet Name" style=" color: #555; font: bold 13px/13px sans-serif;"><?php echo substr(ucfirst($poem_of_the_day->name), 0, 13); ?></b> 
                            </div>
                        </div>
                    </div>
                    <div id="poem_day_poem_view" style="overflow: scroll;">
                        <div  id="poem_day_poem_view_font">
                            <p title="Poem"><?php echo substr($poem_of_the_day->body, 0, 155); ?>  -----</p>

                        </div>
                    </div>
                    <div id="poem_day_poem_details">
                        <div id="poem_day_poem_details_font">
                            <a style="font: normal 13px/13px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" >More »</a>
                        </div>
                    </div>
                    <div id="all_poem_day">

                        <a style=" float: right; padding: 3px; color:  tomato;  font: normal 13px/14px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/" >All poem of the day »</a>

                    </div>
                </div>
            </div>

            <div id="poem_month_poem_page">
                <div id="poemofthe_month"><!-- this code for view poem of the month in index page start !-->
                    <div id="month_poems_titls">
                        <div style="float: left; margin-left: 5px; text-align: left; margin-top: 9px; color:#B57340;"> Poem of The Month</div>
                    </div> 
                    <div id="poem_month_pic_to_name">
                        <div id="poemofday_month_pic">
                            <?php foreach ($poet_of_month as $poet_of_month) { ?>

                                <?php if (!empty($poet_of_month->picture_small)) { ?>                            

                                    <img title="<?php echo $poet_of_month->read_value; ?>+<?php echo $poet_of_month->user_vote; ?> =<?php echo $poet_of_month->vote; ?>" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poet_of_month->picture_small; ?>"/><!-- link with poems detail  !-->
                                <?php } else { ?>  
                                    <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                                <?php } ?>

                            <?php } ?>
                        </div>                                    
                        <div id="poemof_month_name">
                            <div id="poemof_month_name_font">
                                <a title="Poem Name" style="text-decoration: underline; font: bold 13px/13px sans-serif; color:darkgreen;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poet_of_month->poem_id; ?>" ><?php echo $poet_of_month->title; ?></a></br> <b style=" font-weight: normal; color: #333;">by</b> <!-- link with poems detail  !-->
                                <b title="Poet Name" style=" color: #555; font: bold 13px/13px sans-serif; "> <?php echo ucfirst($poet_of_month->name); ?></b> 
                            </div>
                        </div>
                    </div>                               
                    <div id="poem_month_member_poem_view" style="overflow: scroll;">
                        <div id="poem_month_member_view_font">
                            <p title="Poem"><?php echo substr("$poet_of_month->body", 0, strpos($poet_of_month->body, ' ', 230)); ?>  -----</p>

                        </div>
                    </div>
                    <div id="poem_month_member_details">
                        <div id="poem_month_member_details_font">
                            <a style="font: normal 13px/13px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poet_of_month->poem_id; ?>" >More »</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="poem_category">
            <div id="poem_category_title"> 
                <div id="poem_category_title_font"> 
                    Poem on / about :  
                </div> 
            </div> 
            <div id="poem_category_image"> 
                <?php
                foreach ($categorys as $categorys) {    // <!-- show all poems from tbl_poems start !-->
                    ?>

                    <div id="poem_category_detail">
                        <div id="poem_category_detail_font">                            
                            <li><a  style=" color:#555;" href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $categorys->poems_category_id; ?>" ><?php echo $categorys->poems_category_name; ?></a></li><!-- link with poems detail  !-->
                        </div>
                    </div>
                <?php } ?>
                <div id="poem_category_more_topic">
                    <div id="font">
                        <a style="float: left;font: normal 14px/14px sans-serif;  color:tomato;" href="<?php echo base_url(); ?>welcome/category_detail_view">More Topics »</a>
                    </div>
                </div>
            </div> 
            <div id="poem_category_add">

            </div>
        </div>
    </div>
    <div id="new_poems_to_top_poems">
        <div id="all_new_poems_view">
            <div id="all_new_poems_view_caption">
                <div style=" font:  bold 17px/17px sans-serif ;" id="font">
                    New Poems  
                </div> 
            </div> 
            <div id="all_new_poems_view_title">
                <div id="title">
                    Title  
                </div>
                <div  id="poet">
                    poet   
                </div> 
                <div id="date"> 
                    Submit Date
                </div>
            </div>
            <div id="all_new_poems_page"> 
                <?php
                foreach ($poem_page as $poem_page) {    // <!-- show all poems from tbl_poems start !-->
                    ?>
                    <div id="sub_date">
                        <div id="all_poem_page_title">
                            <a style=" color: indianred;  font: normal 14px/14px sans-serif; " href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_page->poem_id; ?>" ><?php echo substr("$poem_page->Poem", 0, 25); ?></a></br></br>

                        </div>
                        <div id="all_poem_page_date">
                            <a style="  color: indianred; font: normal 14px/14px sans-serif;  " href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $poem_page->user_id; ?>" ><?php echo ucfirst($poem_page->Name); ?></a></br>

                        </div>
                        <div id="all_poems_page_submit_date">
                            <a style=" text-decoration:  none; font: normal 12px/12px sans-serif;  color: #555;  "> <?php echo $poem_page->poem_submit_date; ?></a>
                        </div>
                    </div>
                <?php } ?>
                <!--<div id="all_poems_page_pagination"> 
                
                </div>!-->
                <div id="all_new_poems_page_batton">
                    <form>
                        <a style=" float:  left;  color:  tomato ; font: normal 15px/15px   sans-serif; margin-top: 9px; margin-left: 11px; "  href=" <?php echo base_url(); ?>user_admin_controller/all_poem_view.php" class="link">&nbsp;Click here to list all new poems »&nbsp;</a>
                    </form>
                </div>
            </div>
        </div>

        <div id="famous_poems_top">
            <div id="famous_poems_top_title"> 
                <div id="famous_poems_top_title_design"> 
                    <div style=" font:  bold 17px/17px sans-serif ; margin-top: 11px; padding: 7px; text-align: left; color:#B57340; margin-left: 6px; ">Famous Poems</div>;

                </div>  
            </div>  
            <div id="famous_poems_top_data">
                <?php
                $cnt = 1;
                foreach ($poem_famous as $row) {
                    ?>
                    <div id="famous_poet_top_data_cover">
                        <div style=" float:  left;  width:477px;   margin-top:11px; text-align: left; ">
                            <div style=" float:left; color:#555; font: normal 13px/13px sans-serif; width:27px; margin: 0px 0px 0px 11px;"> <?php
                                echo $cnt;
                                $cnt++;
                                ?>.</div>

                            <a title="Famous Poem" style="color:tomato;  " href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" ><div style=" float:left; height:auto;  font: 14px/14px sans-serif;  width:auto; margin: 0px 0px 0px 1px;"><?php echo $row->title; ?></a> ,&nbsp; </div>
                        <b style="color:#555; font: normal 14px/14px sans-serif;  ">   <?php echo ucfirst($row->name); ?></b>
                    </div>
                </div>
<?php } ?>

            <div  id="famous_poems_btn">
                <div id="font">
                    <a style="color:  tomato; " href="<?php echo base_url(); ?>welcome/famous_poems_all.php" title="The Complete List of Famous Poems">The Complete List of Famous Poems »</a>
                </div>
            </div>
        </div>
    </div>

</div>
</div>





