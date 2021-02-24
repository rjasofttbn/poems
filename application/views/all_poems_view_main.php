
<!-- all poems interface !-->

<!-- css locale connection start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>      

<!-- css locale connection end !-->

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>  
</div> 

<div style=" font-weight:  bold; font-size: 27px;  color:   #03579E; "  id="all_poem_page_head">
    New Poems
</div>
<div id="poems_page">
    <div id="all_poem_view_page_add">

    </div>
    <div id="all_poem_view_page">

        <div id="all_poem_view_page_caption">
            <div id="all_poem_page_title_caption">
                Title 
            </div>
            <div id="all_poem_page_poet_caption">
                Poet
            </div>
        </div>
        <?php
        foreach ($result as $aresult) {    // <!-- show all poems from tbl_poems start !-->
            ?>
            <div id="all_poem_page_four_content">
                <div id="all_poem_page_by_title">
                    <a style="  font-weight:  normal; color: black; font-size: 13px; font-family: cursive" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id; ?>" ><?php echo $aresult->Poem; ?></a></br></br>

                </div>
                <div id="all_poem_page_poet_date">
                    by&nbsp;<a style="  font-weight:  normal; color: black; font-size: 13px; font-family: cursive" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $aresult->poem_id; ?>" ><?php echo $aresult->Name; ?></a></br>
                    on &nbsp;<a style=" text-decoration: none; font-weight:  normal; color: black; font-size: 13px; font-family: cursive" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id; ?>" ><?php echo $aresult->poem_submit_date; ?></a>
                </div>
                <div id="all_poem_page_image">
                    <img height="50" width="50" src="<?php echo base_url() ?><?php echo $aresult->pictures; ?>"/> <!-- image show !-->
                </div>
            </div>
        <?php } ?>
    </div>
</div>




