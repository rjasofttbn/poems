 
<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>
<!-- Log in Application form !-->

<!--<div id="all_poem_of_day_view_title">-->
<h1 style="float: left; ">Poem view for Trending</h1>
<!--</div>-->
<div id="trending_pagination">
    <div id="title_trending">
        <b style="float:left; padding:7px; color: #333; font: bold 15px/17px sans-serif; margin: 0px 0px 0px 131px; ">Poem Name</b>
        <b style="float:left; padding:7px; color: #333; font: bold 15px/17px sans-serif; margin: 0px 0px 0px 167px; ">Rate</b>
        <!--<b style="float:left; padding:7px; color: #333; font: bold 15px/17px sans-serif; margin: 0px 0px 0px 33px; ">Trending</b>-->
        <b style="float:left; padding:7px; color: #333; font: bold 15px/17px sans-serif; margin: 0px 0px 0px 61px; ">Submit Date</b>
        <b style="float:left; padding:7px; color: #333; font: bold 15px/17px sans-serif; margin: 0px 0px 0px 37px; ">Action</b>

    </div>
    <?php foreach ($trending_poem_paginate as $rows) { ?>
        <div id="trending_wrapper">
            <div id="title_value">              
                <div style=" "> <?Php echo ucfirst(substr($rows->title, 0, 27)); ?></div>
            </div>
            <div id="body">                
                <div style=" ">  <?Php echo $rows->top_poem; ?></div>
            </div>
<!--            <div id="trending">
                <?php echo $rows->trending; ?>
            </div>-->
            <div id="submit_date">
                <?php echo $rows->poem_submit_date; ?>
            </div>
            <div id="action">
                <a style=" float: left; text-align:  center; color: blue; border-radius: 5px;" href="<?php echo base_url() ?>administrator_controller/poem_select_for_tranding/<?php echo $rows->poem_id ?>">Edit</a>
                <!--|<a style="color: blue; border-radius: 5px;" href="<?php echo base_url() ?>user_admin_controller/message_delete/<?php echo $rows->poem_id ?>" onclick="return checkDelete();">Delete</a>-->
            </div>
        </div>
    <?php } ?>

    <div id="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>