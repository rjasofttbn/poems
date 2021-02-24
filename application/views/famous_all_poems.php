

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
        Famous Poem's
    </div>    
</div>

<!--<div id="new_poets_caption">
    Famous Poems
</div>  -->
<div id="famous_poems"> 
    <div style="height: auto; width: auto; float: left;">
        <div id="left">  
            <div id="caption">
                <div style="margin: 11px 0px 0px 45px; text-align: left; font-size: 21px; color:  #B57340; background-color: #ddd;">
                    <b>Poems</b>
                </div>
            </div>
            <div style=" float: left; text-align: left; height: 238px; 
                 border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;
                 border-width: 1px;
                 border-style: solid;
                 border-color: steelblue; 
                 width: 261px; background-color: #eee ; padding: 5px; margin-left: 1px; ">
                <ul >
                    » &nbsp; <a  style="color: #555;" title="Classical Poems" href="">Classical Poems</a><br>
                    »  &nbsp; <a style="color: #555;" title="Famous Poems" href="">Famous Poems</a><br>
                    »  &nbsp; <a style="color: #555;" title="Famous Poems" href="">Topics - Famous Poems</a><br>
                    » &nbsp;  <a style="color: #555;" title="Random Poem" href="">Poem of the Day</a><br>
                    » &nbsp;  <a style="color: #555;" title="New Poems" href="">New Poems</a><br>
                    » &nbsp;  <a style="color: #555;" title="Random Poem" href="">Random Poem</a><br>
                    » &nbsp;  <a style="color: #555;" title="Poems About" href="">Poems About</a><br>
                    » &nbsp;  <a style="color: #555;" title="My Poems" href="">My  Poems</a><br>
                    » &nbsp;  <a style="color: #555;" title="Popular Poets" href="">My Favourite Poems</a>
                </ul>
            </div>
        </div>

        <div> <?php foreach ($home_add_small as $row) { ?>
                <img style="padding-top:  11px; box-shadow:0px 0px 21px 01px   gray ;  " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div> 
    </div>
    <div id="content">
        <div id="banner_f">
            <div id="banner_caption">
                <div id="title">
                    <b style="float: left; margin-top: 3px; font: bold 17px/17px sans-serif; color: #B57340; ">Poem</b>  
                </div>

                <div id="poets">
                    <b style=" float: left; margin-top: 3px; font: bold  17px/17px sans-serif; color: #B57340; ">Poet Name </b>
                </div>
            </div>
        </div>

        <?php if (count($row) > 0) { ?>
            <?php
            $i = $this->uri->segment(3);
            if ($i == NULL) {
                $i = 0;
            }
            foreach ($result as $row) {
                $i++;
                ?>
                <div id="data_famous_poems">
                    <div style=" float: left; font: normal 14px/14px sans-serif; color: #555; margin-top: 25px; height: 29px; width: 60px; ">
                        <?php echo $i; ?>.</div>
                    <div id="sl_poem">
                        <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" > <b style="color: tomato; font: normal 14px/14px sans-serif;"  ><?php echo $row->title; ?></b> <br></a>


                        <b style="font: normal 12px/12px sans-serif; color:   #555; " > <?php echo substr("$row->body", 0, 35); ?> </b> ------- 
                    </div>

                    <div id="poet">
                        <b style="font: normal 13px/13px sans-serif; color:   #555;">by</b><b style="color: tomato; font: 13px/13px  sans-serif;"> <?php echo $row->Name; ?></b><br>

                        <span>

                            <b style="font: normal 12px/12px sans-serif; color: #555; ">on </b> <b style="font: normal 13px/13px sans-serif; color: #555;">
                                <?php
                                $row->insert_date;
                                $date = date('j- F- y');
//                $date = date( 'j F, Y, a g:i',strtotime($publisheddate) ) ;
//                $date = getBanglaDate($date);
                                echo $date;
                                ?>  </span></b>
                    </div>

                    <div style=" float: left; height: 53px; width: 53px; margin-top: 10px;  border-width: 1px; border-color:red;  background-color: #cccccc;
                         border-radius:3px; ">
                        <img height="50px" width="50px"  style="border-radius: 3px; border-width:1px; border-color: darkblue; border-style:solid;" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/> 
                    </div>

                </div>
            <?php } ?> 
        <?php } ?>
    </div>
    <?php echo $this->pagination->create_links(); ?>
</div> 
</div> 

