

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>      
<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link>

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>  
</div> 
<!--<h1 style="color:  #006699; text-align: left; margin-left: 5px">Poem Category Details</h1>-->
<div id="new_poets_Page_title">
    <div id="font">
        Poem Category 
    </div>    
</div>
<div id="category_detail">
    <div id="category_detail_reg_to_add">

        <div id="category_detail_new_poets"> 

            <div id="new_poets_to_registration_batton">
                <div id="new_poets_registration_batton">
                    <div id="poets_registration_batton_font">
                        <a  style="color: tomato;" href="<?php echo base_url(); ?>welcome/signup.php" id="active">New Registration</br>
                            and Publish Your Poems</br>
                            On www.poetsfelling.com</a>                  
                    </div> 
                </div> 
                <div id="new_poetss">
                    <div id="new_poetss_caption">
                        <div id="new_poetss_caption_font">
                            New Poet's
                        </div>
                    </div> 
                    <div style="height: auto; background-color: red; margin-top: 1px;">
                        <?php
                        $cnt = 1;      //<!-- Sl no start !-->
                        foreach ($last_poets_view as $last_poets_view) {
                            ?>     
                            <div id="new_poets_to_sl_no_wrapper">
                                <div id="new_poets_sl_no"><?php
                                    echo $cnt;
                                    $cnt++;
                                    ?>. </div>  <!-- Sl no end !-->
                                <div id="new_poets_name_poem_data">
                                    <p><a  style=" font:  normal 13px/13px sans-serif;  color: indianred; ;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $last_poets_view->name; ?>" ><?php echo $last_poets_view->name; ?></a></p> &nbsp &nbsp<!-- link with poems detail  !-->
                                </div>

                                <div id="new_poets_totalpoem_data">
                                    <div id="new_poets_totalpoem_data_font">
                                        (&nbsp;<?php echo $last_poets_view->totalpoem; ?>&nbsp;poem&nbsp;)
                                    </div>
                                </div>
                            </div>
                        <?php } ?> 
                    </div>

                    <form >                 
                        <a style="float:left;
                           height:  28px;
                           width: 160px;
                           background-color:  whitesmoke  ; 
                           color:tomato;

                           box-shadow:0px 0px 0px 1px silver  ; /* add shadow */
                           margin:  15px 7px 11px 47px;" href=" <?php echo base_url(); ?>welcome/all_new_poets_page.php" class="link"><div id="all_new_poets_page_batton_font">All New Poets »</div></a>

                    </form>
                </div>
            </div>
        </div>

        <div id="category_detail_add">                            
            <img style="width: 276px; height: 250px;" src="<?php echo base_url() ?><?php echo $first_add->poem_page_add_first; ?>"/>
        </div>

        <div id="category_detail_poem_of_day">
            <div id="poemofday">
                <div id="poemofday_titls">
                    <div style="margin-left: 5px; margin-top: 9px; text-align: left;  color: #B57340;">Poem of The Day</div>
                </div>
                <div id="poemofday_pic_to_name">
                    <div id="poemofday_pic">
                        <?php foreach ($poem_of_the_day as $poem_of_the_day) { ?>                                                                                        <!-- <a href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" ><img height="50px" width="50px" src="<?php echo base_url() ?><?php echo $poem_of_the_day->picture_small; ?>"/></a>link with poems detail  !-->
                            <?php if (!empty($poem_of_the_day->picture_small)) { ?>    
                                <img height="50px" width="50px" style=" margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poem_of_the_day->picture_small; ?>"/><!-- link with poems detail  !-->
                            <?php } else { ?>
                                 <img title="" height="50px" width="50px" style="margin: 0px 0px 0px 0px; " src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    
                            <?php } ?>

                        <?php } ?>
                    </div>
                    <div id="poemofday_name">
                        <div id="poemofday_name_font">
                            <a title="Poem Name" style="text-decoration: underline;font: bold 13px/13px sans-serif; color: darkgreen;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" ><?php echo $poem_of_the_day->title; ?></a></br> <b style=" font-weight: normal; color: #333;">by</b> <!-- link with poems detail  !-->
                            <b title="Poet Name" style=" color: #333; font: bold 13px/13px sans-serif;"><?php echo substr(ucfirst($poem_of_the_day->name), 0, 13); ?></b> 
                        </div>
                    </div>
                </div>
                <div id="poem_day_poem_view">
                    <div  id="poem_day_poem_view_font">
                        <p title="Poem"><?php echo substr($poem_of_the_day->body, 0, 155); ?>  -----</p>

                    </div>
                </div>

                <div id="poem_day_poem_details">
                    <div id="poem_day_poem_details_font">
                        <a style="font: bold 12px/12px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poem_of_the_day->poem_id; ?>" >More »</a>
                    </div>
                </div>

                <div id="all_poem_day">
                    <a style=" float: right; padding: 3px; color:  tomato;  font: bold 13px/14px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/" >All poem of the day »</a>
                </div>
            </div>
        </div>

        <div id="category_detail_add_bottom">
            <img style="height: 250px; width: 276px;" src="<?php echo base_url() ?><?php echo $second_add->poem_page_add_Second; ?>"/>

        </div>
    </div>
    <div id="category_detail_view">
        <div id="poem_category_detail_title">
            <div id="poem_category_detail_title_font">
                Poem Topic's :
            </div>
        </div>
        <div id="detail_category">
            <?php
            foreach ($category_detail as $category_row) {    // <!-- show all poems from tbl_poems start !-->
                ?>
                <div id="data">
                    <li style="font-size: 14px; color: #666; margin-left: 21px; padding: 9px; text-align:left; "><a style=" font: normal 15px/15px sans-serif; color: #666; text-align:left;"  href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $category_row->poems_category_id; ?>" ><?php echo $category_row->poems_category_name; ?></a></li><!-- link with poems detail  !-->
                </div>                
            <?php } ?>
        </div>


    </div>
</div>
