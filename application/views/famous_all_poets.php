

<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>   
</div> 
<div id="new_poets_Page_title">
    <div id="font">
        Famous Poet's
    </div>    
</div>

<!--<div id="new_poets_caption">
    Famous Poets
</div> -->

<div id="famous_poets"> 
    <div style="height: auto; width: auto; float: left;">
        <div id="famous_poets_left">  

            <div style=" margin-top: 3px; background-color:  whitesmoke ; width: 271px;  height: 38px;border-bottom: #ddd solid 1px; margin-left: 3px; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                <div style="float: left; margin: 3px 0px 0px 50px; text-align: left;  font:bold 19px/19px sans-serif; color:#B57340;">
                    <b style=" float: left;padding: 11px;">Poet's</b>
                </div>
            </div>

            <ul style="text-align: left;border-top: #ddd solid 1px; height:  239px; color: #5F78AB; width: 231px; background-color: #eee; margin-left: 3px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; ">
                <div style="padding-top:41px; ">
                    » &nbsp; <a  style="color: #555;" title="Classical Poets" href="">Classical Poets</a><br>
                    » &nbsp; <a  style="color: #555;" title="Top 500 Poets" href="">Top 500 Poets</a><br>
                    » &nbsp; <a  style="color: #555;" title="New Poets" href="<?php echo base_url(); ?>user_admin_controller/all_poem_view.php"> New Poets</a><br>
                    » &nbsp; <a  style="color: #555;" title="Random Poet" href=""> Random Poet</a><br>
                    » &nbsp; <a  style="color: #555;" title="Poet of the day" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/">Poet of the Day</a>
                </div>

            </ul>
        </div>

        <div> <?php foreach ($home_add_small as $row) { ?>
                <img style="padding-top:  41px; box-shadow:0px 0px 21px 01px   gray ; " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div>  
    </div>

    <div id="famous_poets_contents">
        <div id="title">
            <div style=" float: left; margin-left: 9px; font: bold 17px/17px sans-serif; color:  #B57340; margin-top: 9px; padding: 7px;">Famous Poet's</div></div>
        <?php if (count($row) > 0) { ?>
            <div id="famous_poet_data_details">

                <?php
                $i = $this->uri->segment(3);
                if ($i == NULL) {
                    $i = 0;
                }
                foreach ($result as $row) {
                    $i++;
                    ?>
                    <div id="famous_poet_detail_data_covers">

                        <div id="famous_poet_detail_data_fonts">
                            <div style="float:left; height: auto; font: normal 12px/12px sans-serif; color:  #555; width: auto; margin:15px 0px 0px 3px ;"> <?php echo $i; ?>.</div>
                            <div style="height: auto; width: auto;">

                                <div style="float: left; height: 54px; width: 54px; border-style:  solid; border-width: 1px; border-color:#ddd; border-radius: 3px; margin:  11px 0px 0px 13px; background-color:whitesmoke;">
                                    <div style="margin:  2px 0px 0px 2px;"><img height="50px" width="50px" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/></div>
                                </div>
                                <div style=" float: left; height: 60px;  width: auto; margin:  15px 0px 0px 11px;">
                                    <a style="font: normal 13px/13px sans-serif; color: tomato;"href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"> <?php echo $row->name; ?></a><br>
                                    <div style="font: normal 12px/12px sans-serif; color:  #555;"><?php echo $row->date_of_birth; ?></div>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <!--!<div  id="famous_poet_btn"><div style="font-weight: bold; color:darkslategray; margin-top: 5px;">Page :</div>
          </div>!--> 
        <?php echo $this->pagination->create_links(); ?>

    </div>
</div> 



</div> 

