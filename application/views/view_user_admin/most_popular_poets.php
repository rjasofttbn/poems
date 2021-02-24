

<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>   
</div> 


<div id="new_poets_caption">
    Most Popular Poets
</div>  
<div id="famous_poems"> 
    <div style="height: 800px; width: auto; float: left; ">
        <div id="most_popular_poet_left">  
            <div id="caption">
                <div style="margin: 11px 0px 0px 45px; text-align: left; font-size: 21px; color:  #03579E; ;">
                    <b>Poems</b>
                </div>
            </div>
            <div style=" float: left; text-align: left; height: 238px; 
                 border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;
                 border-width: 1px;
                 border-style: solid;
                 border-color: steelblue; 
                 width: 261px; background-color: #D0D0D0 ; padding: 5px; margin-left: 1px; ">
                <!--                <ul >
                                    » &nbsp; <a style="color: #03579E;" title="Classical Poems" href="">Classical Poems</a><br>
                                    »  &nbsp; <a style="color: #03579E;" title="Famous Poems" href="">Famous Poems</a><br>
                                    »  &nbsp; <a style="color: #03579E;" title="Famous Poems" href="">Topics - Famous Poems</a><br>
                                    » &nbsp;  <a style="color: #03579E;" title="Random Poem" href="">Poem of the Day</a><br>
                                    » &nbsp;  <a style="color: #03579E;" title="New Poems" href="">New Poems</a><br>
                                    » &nbsp;  <a style="color: #03579E;" title="Random Poem" href="">Random Poem</a><br>
                                    » &nbsp;  <a style="color: #03579E;" title="Poems About" href="">Poems About</a><br>
                                    » &nbsp;  <a style="color: #03579E;" title="My Poems" href="">My  Poems</a><br>
                                    » &nbsp;  <a style="color: #03579E;" title="Popular Poets" href="">My Favourite Poems</a>
                                </ul>-->
            </div>
        </div>

        <div> <?php foreach ($home_add_small as $row) { ?>
                <img style="padding-top:  11px; box-shadow:0px 0px 21px 01px   gray ;  " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div> 
    </div>
    <div id="most_popular_poets_content">
        <div id="banner_s">
            <div id="banner_captions">
                <div id="most_popular_poets_title">
                    <b style="font-size: 17px; ">Poet Name</b>  
                </div>

                <div id="most_popular_poets_poets">
                    <b style="font-size: 17px; ">Popularity</b>
                </div>
            </div>
        </div>      
        <?php if (count($row) > 0) { ?>

            <?php
            $i = $this->uri->segment(3);
            if ($i == NULL) {
                $i = 0;
            }
            foreach ($most_popular_poets as $row) {
                $i++;
                ?>

                <div id="most_popular_poets">

                    <div id="most_popular_poets_font">
                        <div style="float:left; height: auto;  text-align: left; font: 13px/18px sans-serif;  color:royalblue; font-weight:  bold; width: 71px; margin:0px 0px 0px 3px ;"><?php echo $i; ?>.</div>
                        <div style="float: left; height: auto; text-align: left; color:#333; font: 13px/17px sans-serif; width:  300px; margin:0px 0px 0px 53px ;">
                            <?php echo $row->name; ?>
                        </div>
                        <div style=" float: left; height: auto; text-align:justify; color:#333;  width:  100px; margin: 0px 0px 0px 47px ;">
                            <?php echo $row->read_value; ?>
                        </div>
                    </div>
                </div>

            <?php } ?>

        <?php } ?>
        <div style="float:right;
             height:  24px;
             width: 265px;
             /*background: url(../images/top_poems_title.png)repeat;*/ 
             background-color:  #D0D0D0;
             border-top-left-radius: 3px;
             //border-bottom-right-radius: 7px;                     
             border-color:  tan;
             border-bottom-color: white;
             //border-top-right-radius: 3px;
             box-shadow:0px 0px 1px 0px   royalblue; /* add shadow */
             padding: 2px;
             " id="famous_poet_btn">
            <a style="color:   royalblue; font-size: 14px; font-weight: bold;" href="<?php echo base_url(); ?>user_admin_controller/most_popular_detail_view.php" title="The Complete List of Famous Poems">The Complete List of Popular Poet's »</a>
        </div>
    </div>
    <!--    <div style="float: left; height: 39px;border-width: 1px;
                     border-style: solid;
                     border-color: steelblue; border-radius: 11px; width:  660px; background-color: rosybrown; box-shadow:0px 0px 21px 01px   gray ; margin:  23px 0px 0px 21px;
                     
                     
                      <li style=" margin-top: 31px;"> Poem wise most popularity???</li>
                     
                     "></div>-->
    <div id="most_popular_poetbatton">
        <ul>
            <li style=" margin-top: 31px;"><a href="<?php echo base_url(); ?>user_admin_controller/poem_wise_most_popular_poet.php" title="The Poems">Poem wise most popularity.</a></li>            
        </ul>
    </div>
</div> 


