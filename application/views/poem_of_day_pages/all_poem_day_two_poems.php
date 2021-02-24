<div style="float: left;   height: auto; width: 660px; margin-top: 0px; ">
    <?php foreach ($two_poem_of_day as $row) { ?>
        <div id="all_trending_poem_wrapper">
            <div class="container ">
                <section id="demo">
                    <article>
                        <div id="image">
                            <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px;   border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                            <div id="name">
                                <a  style=" font: normal 13px/13px sans-serif; color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
                            </div>
                            <div id="submit_date">
                                <b style="float: left; margin-top:  11px;  font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                                <b style="float: left; margin: 3px 0px 0px 0px;"><div id="box"></div></b>
                                <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_of_day_date", true); ?>.</b>
                            </div>
                        </div>

                        <div id="poem_title">
                            <div id="poem_title_value">
                                <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
                            </div>
                        </div>

                        <div id="poem_detail">
                            <span class="body"> <?php echo $row->body; ?>
                                <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                    <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> <?php echo $row->read_value; ?></b>.
                                    <b style="margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                    <b style="margin:0px 0px 0px 7px;">Comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                </div>
                            </span>
                    </article>
                </section>
            </div>
        </div>
    </div>
<?php } ?>