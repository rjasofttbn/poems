
<div id="add_up">

</div>

<div id="new_poets_Page_title">
    <div id="font">
        <?php foreach ($bottom_poem_category_title as $row) { ?>
            <?php echo strtoupper($row->poems_category_name); ?> POEM'S
        <?php } ?>
    </div>    
</div>
<div id="category_wise_poem_view">
    <div id="poems_about">
        <div id="poems_menu"> 
            <div id="title">
                <b style=" float: left;  font: bold 19px/19px sans-serif; margin: 27px 0px 0px 23px; color: #B57340;">Poem's Menu</b> 
            </div>
            <div id="menu" > 
                <ul style=" text-align: left;">
                    <li style="color:  #333;"><a style="color:  #333;" title="Classical Poems" href="">Classical Poems</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="Top Poems" href="">Top Poems</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="Top Poems" href="">Topics - Top Poems</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="Random Poem" href="">Poem of the Day</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="New Poems" href=" <?php echo base_url(); ?>welcome/all_poems_view_mains.php">New Poems</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="Random Poem" href="">Random Poem</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="Poems About" href="">Poems About</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="My Poems" href="">My Poems</a></li>
                    <li style="color:  #333;"><a style="color:  #333;" title="Popular Poets in Turkey" href="">My Favourite Poems</a></li>
                </ul>
            </div>
        </div>
        <div id="about"> 
            <div id="title"> 
                <b style=" float: left; font: bold 19px/19px sans-serif; margin: 27px 0px 0px 21px; color: #B57340;"> Poem's on / about :</b> 
            </div>
            <div id="detail"> 
                <?php
                foreach ($category_detail as $category_row) {    // <!-- show all poems from tbl_poems start !-->
                    ?>
                    <div id="accordion"> <div style="  float: left; text-align: left; padding: 3px; height: 17px; width: 47%; background-color:  whitesmoke; margin: 1px 0px 0px 1px; ">

                            <li style="color: #555; margin:0px 0px 0px 10px; "><a style="color: #555;color: #555;font: normal 14px/14px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $category_row->poems_category_id; ?>" ><?php echo $category_row->poems_category_name; ?></a></li><!-- link with poems detail  !-->
                        </div></div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div id="title_name">
        <?php foreach ($category_wise_poem_view as $row) { ?>        

            <div style=" margin: 21px 0px 0px 0px;  box-shadow:0px 0px 31px 0px silver;  background-color:  white; ">

                <div style=" padding: 21px; border-bottom: 1px  white solid; height: 13px; border-bottom: 1px whitesmoke solid; margin: 21px 0px 21px 0px; "><a style="font: bold 21px/21px sans-serif; color: #444; margin-top: 1px;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" > <?php echo $row->title; ?></a></div>

                <b style="font: normal 14px/14px sans-serif; color: #555;   "><?php echo substr($row->body, 0, 251) ?></b> &nbsp; </br> </br> <a style=" cursor:  pointer;  color:    orangered;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" >read more </a>»

                <div style=" padding: 11px;   margin: 11px 0px 11px 0px; "> <a style="color: #333; font: bold 13px/13px sans-serif;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo ucfirst($row->name); ?></a></div>
            </div>
        <?php } ?>     
    </div>
    <div id="category_wise_new_poems">
        <div id="title">
            <?php foreach ($bottom_poem_category_title as $row) { ?>
                <div style="float: left; font: bold 19px/19px sans-serif; color:  #333; margin: 11px 0px px 17px; "><b style=" float: left; margin: 27px 0px 0px 19px; color: #B57340;"><?php echo ucfirst($row->poems_category_name); ?> Poem's</b></div>
            <?php } ?>
        </div>
        <div id="details">
            <?php foreach ($category_wise_poem_view as $row) { ?>
                <div style="float: left; width: 284px; padding: 7px; text-align: left; background-color:  whitesmoke; margin: 1px 0px 0px 0px; ">
                    <li style="color: #555; margin: 0px 0px 0px 13px;"><a style="color: #555; font: bold 13px/13px sans-serif; "  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" > <?php echo substr("$row->title", 0, 13); ?></a>,
                        <a style="color: #555;font: bold 13px/13px sans-serif;"  href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo substr("$row->name", 0, 11); ?></a></li>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


