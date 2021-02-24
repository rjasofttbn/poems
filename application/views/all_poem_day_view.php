
<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>

<div id="add_up">

</div>

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>
</div>

<!--<div id="all_trending_poem_title">
    <h1>All trending poem's view.</h1>
</div>-->
<div id="new_poets_Page_title">
    <div id="font">
        All poem of the day view.
    </div>
</div>

<?php

function get_time_difference_php($created_time) {
    date_default_timezone_set('Europe/London'); //Change as per your default time
    $str = strtotime($created_time);
    $today = strtotime(date('Y-m-d H:i:s'));

    // It returns the time difference in Seconds...
    $time_differnce = $today - $str;

    // To Calculate the time difference in Years...
    $years = 60 * 60 * 24 * 365;

    // To Calculate the time difference in Months...
    $months = 60 * 60 * 24 * 30;

    // To Calculate the time difference in Days...
    $days = 60 * 60 * 24;

    // To Calculate the time difference in Hours...
    $hours = 60 * 60;

    // To Calculate the time difference in Minutes...
    $minutes = 60;

    if (intval($time_differnce / $years) > 1) {
        return intval($time_differnce / $years) . " years ago";
    } else if (intval($time_differnce / $years) > 0) {
        return intval($time_differnce / $years) . " year ago";
    } else if (intval($time_differnce / $months) > 1) {
        return intval($time_differnce / $months) . " months ago";
    } else if (intval(($time_differnce / $months)) > 0) {
        return intval(($time_differnce / $months)) . " month ago";
    } else if (intval(($time_differnce / $days)) > 1) {
        return intval(($time_differnce / $days)) . " days ago";
    } else if (intval(($time_differnce / $days)) > 0) {
        return intval(($time_differnce / $days)) . " day ago";
    } else if (intval(($time_differnce / $hours)) > 1) {
        return intval(($time_differnce / $hours)) . " hours ago";
    } else if (intval(($time_differnce / $hours)) > 0) {
        return intval(($time_differnce / $hours)) . " hour ago";
    } else if (intval(($time_differnce / $minutes)) > 1) {
        return intval(($time_differnce / $minutes)) . " minutes ago";
    } else if (intval(($time_differnce / $minutes)) > 0) {
        return intval(($time_differnce / $minutes)) . " minute ago";
    } else if (intval(($time_differnce)) > 1) {
        return intval(($time_differnce)) . " seconds ago";
    } else {
        return "few seconds ago";
    }
}
?>

<div id="all_trending">
    <div id="trending_poems_title_name">

        <link href="<?php echo base_url(); ?>/css/normalize.css" rel="stylesheet"  >
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
        <script src="http://www.apus.edu/bin/l/y/jquery-1.3.2.min.js" type="text/javascript"></script>
        <!-- accordian -->
        <script type="text/javascript">
            $(document).ready(function()
            {
                $(".accordian>li.expanded").removeClass("expanded");
                $(".accordian>li h2").addClass("jse").click(function() {
                    var doOpen = !$(this).parent().hasClass('expanded');
                    var openContainers = $(".accordian>li.expanded").length > 0;
                    var targetNode = this;
                    if (openContainers) {
                        $(".accordian>li.expanded h2")
                                .parent()
                                .removeClass('expanded')
                                .end()
                                .nextAll()
                                .slideUp(100, function() {
                                    if ($(".accordian>li.expanded").length == 0)
                                        performOpen(doOpen, targetNode);
                                });
                    }
                    else {
                        performOpen(doOpen, targetNode);
                    }
                    // if containers are open, proceed on callback
                    // else proceed immediately
                }).nextAll().slideUp(100);
            });

            function performOpen(doOpen, whichNode) {
                if (doOpen) {
                    $('html,body').animate({scrollTop: $(whichNode).offset().top}, 1000); //target code
                    $(whichNode).nextAll().slideDown(1000).parent().addClass('expanded');
                }
            }
        </script>
        <div id="title">
            <div id="value">
                Poem Of The Day
            </div>

        </div>
        <div id="title_name">
            <?php foreach ($poem_of_day_result as $rows) { ?>
                <div style=" width: 100%; background-color:white; color: #333; min-height: 33px;  margin-top: 0px;">
                    <div id="titleall_trending">
                        <a  style=" float: left; color:indianred; font: normal 13px/13px sans-serif;   padding-left:  3px; margin-top: 9px;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $rows->poem_id; ?>"><?php echo substr($rows->title, 0, 19); ?>... ,</a>
                    </div>
                    <div id="nameall_trending">
                        <a  style="float: left; color: #555; font: normal 13px/13px sans-serif; margin-top: 9px;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $rows->user_id; ?>"><?php echo substr($rows->name, 0, 9); ?>...</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <!-- Two poem view start -->

    <?php
    require_once('poem_of_day_pages/all_poem_day_two_poems.php');
    ?>
    <!-- Two poem view end -->
    
    

    <?php
    require_once('poem_of_day_pages/all_poem_day_all_poems.php');
    ?>

    <!-- after two poems all poem view end -->

    






















