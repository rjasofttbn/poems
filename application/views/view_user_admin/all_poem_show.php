
<!-- poem detail and voting interface !-->

<!-- css locale connection start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>      

<!-- css locale connection end!-->

<!--<div id="all_poem_view_head">
    <h1 style=" color: darkslateblue;">New Poems</h1> 
</div>-->

<div id="new_poets_Page_title">
    <div id="font">
        New Poem's
    </div>    
</div>

<div style=" height: auto; width: auto; float: left; ">
    <div style="height: auto; width: auto; float: left;background-color: white  ">
        <div style=" background-color: white">
            <div style=" border-bottom-color: white;box-shadow: 0px 1px 1px 1px silver; background-color:#eee; height: 49px; width: 275px;  border-bottom-style:  solid; border-bottom-width: 1px;">
                <div style="float: left; margin-bottom: 1px; padding: 0px; margin: 12px 0px 0px 65px; text-align: left; font-size: 21px;   color:  #B57340 ;">
                    <b>Poem's</b>
                </div>
            </div>
            <div style=" float: left; text-align: left; box-shadow: 0px 1px 1px 1px silver; height: 238px; 
                 border-bottom-left-radius: 7px; border-bottom-right-radius: 7px;
                 margin-top: 1px;
                 width: 265px; margin-top: 1px;  background-color: whitesmoke ; padding: 5px;  ">
                <ul>
                    » &nbsp; <a style="color: #333;" title="Classical Poems" href="">Classical Poems</a><br>
                    »  &nbsp; <a style="color: #333;" title="Famous Poems" href="">Famous Poems</a><br>
                    »  &nbsp; <a style="color: #333;" title="Famous Poems" href="">Topics - Famous Poems</a><br>
                    » &nbsp;  <a style="color: #333;" title="Poem of the Day" href="<?php echo base_url(); ?>user_admin_controller/all_poem_of_day/">Poem of the Day</a><br>
                    » &nbsp;  <a style="color: #333;" title="New Poems" href="<?php echo base_url(); ?>user_admin_controller/all_poem_view.php">New Poems</a><br>
                    » &nbsp;  <a style="color:#333;" title="Random Poem" href="">Random Poem</a><br>
                    » &nbsp;  <a style="color: #333;" title="Poems About" href="">Poems About</a><br>
                    » &nbsp;  <a style="color: #333;" title="My Poems" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user_poet_page.php">My  Poems</a><br>
                    » &nbsp;  <a style="color: #333;" title="Popular Poets" href="">My Favourite Poems</a>
                </ul>
            </div>

        </div>
        <div>
            <?php foreach ($home_add_small as $row) { ?>
                <img style=" margin-top: 21px; box-shadow:0px 0px 21px 01px   gray ;  " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div> 


    </div>  
    <?php if (count($result) > 0) { ?>
        <div style=" float: left; margin: 0px 0px 0px 21px;">

            <div id="all_poem_view">
                <div id="all_poem_view_four_caption">
                    <div id="all_poem_view_title_caption">
                        Title 
                    </div>
                    <div id="all_poem_view_poet_caption">
                        Poet
                    </div>
                </div>
                <div style=" float: left; background-color: white; height: auto;border-bottom-left-radius: 7px; border-bottom-right-radius: 7px;">
                    <?php
                    $i = $this->uri->segment(3);
                    if ($i == NULL) {
                        $i = 0;
                    }
                    foreach ($result as $aresult) {
                        $i++;
                        ?>
                        <div id="all_poem_view_four_content">
                            <div style=" float: left; margin-top: 31px; text-align: center; font: normal 12px/12px sans-serif; color: #555; width: 50px ;  height: auto; " >
                                <?php echo $i; ?>.
                            </div>
                            <div id="all_poem_view_by_title">

                                <a style="color: tomato; font: normal 13px/13px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id; ?>" ><strong><?php echo $aresult->title; ?></strong></a>
                                </br>
                                <b style="width: 250px; font: normal 12px/12px sans-serif; color: #555; text-align: justify;"><?php echo substr("$aresult->body", 0, 81); ?>  -----</b>
                            </div>
                            <div id="all_poem_view_poet_date">
                                <b style="font: normal 13px/13px sans-serif;  color:  #555;">by </b> <a style=" font-weight:  normal; color: tomato; font: normal 13px/13px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id; ?>" > <strong><?php echo $aresult->name; ?><strong></a></br>
                                            <b style="font: normal 13px/13px sans-serif;  color:  #555;">on </b><b style="font: normal 12px/12px sans-serif; color:  #555;"><?php echo $aresult->poem_submit_date; ?></b>
                                            </div>
                                            <div id="all_poem_view_by_image">
                                                <?php if (!empty($aresult->picture_small)) { ?>
                                                    <img  style="border-radius: 5px;  margin:2px 0px 0px 2px;" height="51" width="51" src="<?php echo base_url() ?><?php echo $aresult->picture_small; ?>"/> <!-- image show !-->
                                                <?php } else { ?>
                                                    <img title="" height="50px" width="50px" style="margin: 0px 0px 0px 0px; " src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    
                                                <?php } ?>

                                            </div>
                                            </div>
                                        <?php } ?>

                                    <?php } ?>
                                    <div id="pagination">
                                        <?php echo $this->pagination->create_links(); ?>
                                    </div>
                                    </div>

                                    </div>
                                    </div>
                                    </div>


