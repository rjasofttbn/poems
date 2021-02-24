<!--<script type="text/javascript" src ="<?php echo base_url(); ?>/scroll/js/jquery-ias.min.js" language="javascript"></script>-->  
<!--<link href="<?php echo base_url(); ?>/scroll/css/style_scroll.css" rel="stylesheet" type="text/css"></link>-->
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scroll/js/jquery.jscroll.min.js" language="javascript"></script>-->
<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>
<!-- Log in Application form !-->

      
	

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

//$limit = 10; #item per page
//$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
////# sql query
//$sql = "SELECT * FROM actor_info ORDER BY id DESC";
//# find out query stat point
//$start = ($page * $limit) - $limit;
//# query for page navigation
//if( mysql_num_rows(mysql_query($sql)) > ($page * $limit) ){
//	$next = ++$page;
//}
//$query = mysql_query( $sql . " LIMIT {$start}, {$limit}");
//if (mysql_num_rows($query) < 1) {
//	header('HTTP/1.0 404 Not Found');
//	echo 'Page not found!';
//	exit();
//}
?>

<!--<div style="float: left; height: auto; width: auto; background-color:  #D893A1;">-->
<div id="all_trending">
    <div id="trending_poems_title_name">

        <link href="<?php echo base_url(); ?>/css/normalize.css" rel="stylesheet"  >
                <!--<link href="<?php echo base_url(); ?>/css/styleacc.css" rel="stylesheet" >-->
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

    <!-- fade -->
    <!-- fade -->

    <div style="float: left;   height: auto; width: 660px; margin-top: 0px; ">

        <!-- Two poems of day view start -->

        <?php foreach ($two_poem_of_day as $row) { ?>

            <div id="all_trending_poem_wrapper">

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
                    <div  class="accordianContainer">
                        <ul style="margin-left: 0px; height: auto; width: auto;" class="accordian">
                            <li ><h2> <b style="font: bold 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 150); ?></b></h2>
                                <ul>
                                    <li>
                                        <b style="font: bold 13px/13px sans-serif; color:#555;"> <?php echo substr("$row->body", 151, 7000); ?></b>
                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                            <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> <?php echo $row->read_value; ?></b>.
                                                    <b style="margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                                    <b style="margin:0px 0px 0px 7px;">Comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- Two trending poems view end --> 
        <!-- Two trending poems view end --> 
        <!-- Two trending poems view end --> 

<!--        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1.7.1.js" language="javascript"></script>
        <style type="text/css">
            #container
            {
                height:2000px;    
            }
            #container DIV
            { 
                margin:50px; 
                padding:50px; 
                background-color:lightgreen; 
            }
            .hideme
            {
                opacity:0;
            }

        </style>
        ajax fade 
        <script type="text/javascript">
            //<![CDATA[ 
            $(document).ready(function() {

                /* Every time the window is scrolled ... */
                $(window).scroll(function() {

                    /* Check the location of each desired element */
                    $('.hideme').each(function(i) {

                        var bottom_of_object = $(this).position().top + $(this).outerHeight();
                        var bottom_of_window = $(window).scrollTop() + $(window).height();

                        /* If the object is completely visible in the window, fade it it */
                        if (bottom_of_window > bottom_of_object) {

                            $(this).animate({'opacity': '7'}, 900);
                        }
                    });
                });
            });
            //]]>  

        </script>
        Fade end!

        Fade end!
        <?php foreach ($result as $row) { ?>

            <div class="hideme"   id="all_trending_poem_wrapper">

                <div id="image">
                    <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                    <div id="name">
                        <a  style=" font: normal 13px/13px sans-serif; color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
                    </div>
                    <div id="submit_date">
                        <b style="float: left; margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                        <b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b>
                        <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_of_day_date", true); ?>.</b>
                    </div>                    
                </div>               

                <div id="poem_title">
                    <div id="poem_title_value">
                        <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
                    </div>
                </div>
                <div id="poem_detail">
                    <div  class="accordianContainer">
                        <ul  class="accordian">

                            <li ><h2 ><b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 150); ?></b></h2>
                                <ul>
                                    <li>
                                        <b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 150, 70000); ?></b>  

                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                            <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> <?php echo $row->read_value; ?></b>.
                                                    <b style="margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                                    <b style="margin:0px 0px 0px 7px;">Comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                        </div>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>           
    </div>
</div>-->


<link rel="stylesheet" href="/scroll/css/style_scroll.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="/scroll/js/jquery-ias.min.js"></script>
        	
    <script type="text/javascript">
        $(document).ready(function() {
        	// Infinite Ajax Scroll configuration
            jQuery.ias({
                container : '.wrap', // main container where data goes to append
                item: '.item', // single items
                pagination: '.nav', // page navigation
                next: '.nav a', // next page selector
                loader: '<img src="<?php echo base_url(); ?>/scroll/css/ajax-loader.gif"/>', // loading gif
                triggerPageThreshold: 3 // show load more if scroll more than this
            });
        });
    </script>

<div class="wrap">
<?php foreach ($result as $row) { ?>

    <div  id="all_trending_poem_wrapper">

        <div id="image">
            <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
            <div id="name">
                <a  style=" font: normal 13px/13px sans-serif; color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
            </div>
            <div id="submit_date">
                <b style="float: left; margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                <b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b>
                <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_of_day_date", true); ?>.</b>
            </div>                    
        </div>               

        <div id="poem_title">
            <div id="poem_title_value">
                <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
            </div>
        </div>
        <div id="poem_detail">
            <div  class="accordianContainer">
                <ul  class="accordian">

                    <li ><h2 ><b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 150); ?></b></h2>
                        <ul>
                            <li>
                                <b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 150, 70000); ?></b>  

                                <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                    <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> <?php echo $row->read_value; ?></b>.
                                            <b style="margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                            <b style="margin:0px 0px 0px 7px;">Comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                </div>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
<!--page navigation-->
	<?php if (isset($next)): ?>
	<div class="nav">
		<a href='index.php?p=<?php echo $next?>'>Next</a>
	</div>
	<?php endif?>
</div><!--.wrap-->



03-03-15
===================================



<!--<script type="text/javascript" src ="<?php echo base_url(); ?>/scroll/js/jquery-ias.min.js" language="javascript"></script>-->  
<!--<link href="<?php echo base_url(); ?>/scroll/css/style_scroll.css" rel="stylesheet" type="text/css"></link>-->
<!--<script type="text/javascript" src="<?php echo base_url(); ?>scroll/js/jquery.jscroll.min.js" language="javascript"></script>-->
<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>
<!-- Log in Application form !-->




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

//$limit = 10; #item per page
//$page = (int) (!isset($_GET['p'])) ? 1 : $_GET['p'];
////# sql query
//$sql = "SELECT * FROM actor_info ORDER BY id DESC";
//# find out query stat point
//$start = ($page * $limit) - $limit;
//# query for page navigation
//if( mysql_num_rows(mysql_query($sql)) > ($page * $limit) ){
//	$next = ++$page;
//}
//$query = mysql_query( $sql . " LIMIT {$start}, {$limit}");
//if (mysql_num_rows($query) < 1) {
//	header('HTTP/1.0 404 Not Found');
//	echo 'Page not found!';
//	exit();
//}
?>

<!--<div style="float: left; height: auto; width: auto; background-color:  #D893A1;">-->
<div id="all_trending">
    <div id="trending_poems_title_name">

        <link href="<?php echo base_url(); ?>/css/normalize.css" rel="stylesheet"  >
                <!--<link href="<?php echo base_url(); ?>/css/styleacc.css" rel="stylesheet" >-->
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

    <!-- fade -->
    <!-- fade -->

    <div style="float: left;   height: auto; width: 660px; margin-top: 0px; ">

        <!-- Two poems of day view start -->

        <?php foreach ($two_poem_of_day as $row) { ?>

            <div id="all_trending_poem_wrapper">

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
                    <div  class="accordianContainer">
                        <ul style="margin-left: 0px; height: auto; width: auto;" class="accordian">
                            <li ><h2> <b style="font: bold 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 150); ?></b></h2>
                                <ul>
                                    <li>
                                        <b style="font: bold 13px/13px sans-serif; color:#555;"> <?php echo substr("$row->body", 151, 7000); ?></b>
                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                            <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> <?php echo $row->read_value; ?></b>.
                                                    <b style="margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                                    <b style="margin:0px 0px 0px 7px;">Comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- Two trending poems view end --> 
        <!-- Two trending poems view end --> 
        <!-- Two trending poems view end --> 

        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1.7.1.js" language="javascript"></script>
        <style type="text/css">
            #container
            {
                height:2000px;    
            }
            #container DIV
            { 
                margin:50px; 
                padding:50px; 
                background-color:lightgreen; 
            }
            .hideme
            {
                opacity:0;
            }

        </style>
        <!--ajax fade -->
        <script type="text/javascript">
            //<![CDATA[ 
            $(document).ready(function() {

                /* Every time the window is scrolled ... */
                $(window).scroll(function() {

                    /* Check the location of each desired element */
                    $('.hideme').each(function(i) {

                        var bottom_of_object = $(this).position().top + $(this).outerHeight();
                        var bottom_of_window = $(window).scrollTop() + $(window).height();

                        /* If the object is completely visible in the window, fade it it */
                        if (bottom_of_window > bottom_of_object) {

                            $(this).animate({'opacity': '7'}, 900);
                        }
                    });
                });
            });
            //]]>  

        </script>
        <!--Fade end!-->

        <!--Fade end!-->



        <?php foreach ($result as $row) { ?>
            <style media="screen">
                body { font: 16px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif; color: #444; }
                code { color: #777; font-family: "Source Code Pro", "Menlo", "Courier New", monospace;}
                a { color: #178DB1; }
                .container { margin: 0 auto; max-width: 960px; }
                #info + .readmore-js-toggle { padding-bottom: 1.5em; border-bottom: 1px solid #999; font-weight: bold;}
                #demo { padding: 0 10%; }
            </style>
            <div class="container">    
                <section id="demo">   
                    <article> 
                        <div class="hideme"   id="all_trending_poem_wrapper">
                            <div id="image">
                                <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                                <div id="name">
                                    <a  style=" font: normal 13px/13px sans-serif; color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
                                </div>
                                <div id="submit_date">
                                    <b style="float: left; margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                                    <b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b>
                                    <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_of_day_date", true); ?>.</b>
                                </div>                    
                            </div>               

                            <div id="poem_title">
                                <div id="poem_title_value">
                                    <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
                                </div>
                            </div>
                            <div id="poem_detail">
                                <p <?php echo $row->poem_id; ?>> <b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 150); ?></b></p>

                                <p <?php echo $row->poem_id; ?>><?php echo substr("$row->body", 150, 70000); ?>  </p>

                                <div id="test" name="test" style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                    <b style=" float: left; padding: 15px;  font: bold 15px/15px 'Josefin Slab',Georgia; color: #666; text-align: left; margin:15px 0px 0px 87px;  text-shadow: 1px 1px 1px #fff; display: block; position: relative; "> 

                                        <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> 
                                                <?php echo $row->read_value; ?></b>.
                                            <b style="font: bold 15px/15px 'Josefin Slab',Georgia; color: #666; text-align: left; margin:15px 0px 0px 87px;  text-shadow: 1px 1px 1px #fff; display: block; position: relative; margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> 
                                                <?php echo $row->poem_vote; ?></b>.
                                            <b style="font: bold 15px/15px 'Josefin Slab',Georgia; color: #666; text-align: left; margin:15px 0px 0px 87px;  text-shadow: 1px 1px 1px #fff; display: block; position: relative; margin:0px 0px 0px 7px;">
                                                Comments:
                                            </b> 
                                            <b id="<?php echo 'new_total_comments' . $row->poem_id; ?>" style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;">
                                                <?php echo $row->total_comments; ?>
                                            </b>.

                                        </p>
                                    </b>
                                </div>                           

                            </div>
                        </div>
                    </article>

                </section>
            </div>

        <?php } ?> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/readmore.js" language="javascript"></script>


        <script>
            $('#info').readmore({
                moreLink: '<a href="#">Usage, examples, and options</a>',
                collapsedHeight: 384,
                afterToggle: function(trigger, element, expanded) {
                    if (!expanded) { // The "Close" link was clicked
                        $('html, body').animate({scrollTop: $(element).offset().top}, {duration: 100});
                    }
                }
            });
            $('article').readmore({speed: 500});
        </script>
    </div>

</div>
</div>


<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
    <script type="text/javascript">
        $(document).ready(function() {
                // Infinite Ajax Scroll configuration
            jQuery.ias({
                container : '.wrap', // main container where data goes to append
                item: '.item', // single items
                pagination: '.nav', // page navigation
                next: '.nav a', // next page selector
                loader: '<img src="<?php echo base_url(); ?>/scroll/css/ajax-loader.gif"/>', // loading gif
                triggerPageThreshold: 3 // show load more if scroll more than this
            });
        });
    </script>

<div class="wrap">
<?php foreach ($result as $row) { ?>

                            <div  id="all_trending_poem_wrapper">

                                <div id="image">
                                    <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                                    <div id="name">
                                        <a  style=" font: normal 13px/13px sans-serif; color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
                                    </div>
                                    <div id="submit_date">
                                        <b style="float: left; margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                                        <b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b>
                                        <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_of_day_date", true); ?>.</b>
                                    </div>                    
                                </div>               

                                <div id="poem_title">
                                    <div id="poem_title_value">
                                        <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
                                    </div>
                                </div>
                                <div id="poem_detail">
                                    <div  class="accordianContainer">
                                        <ul  class="accordian">

                                            <li ><h2 ><b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 150); ?></b></h2>
                                                <ul>
                                                    <li>
                                                        <b style="font: normal 13px/13px sans-serif; color:#555;"><?php echo substr("$row->body", 150, 70000); ?></b>  

                                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                                            <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;"> <?php echo $row->read_value; ?></b>.
                                                                    <b style="margin:0px 0px 0px 7px;">Vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                                                    <b style="margin:0px 0px 0px 7px;">Comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
<?php } ?>
page navigation
<?php if (isset($next)): ?>
                                <div class="nav">
                                        <a href='all_poem_of_day.php?p=<?php echo $next ?>'>Next</a>
                                </div>
<?php endif ?>
</div>.wrap-->


<style media="screen">
    body { font: 16px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif; color: #444; }
    code { color: #777; font-family: "Source Code Pro", "Menlo", "Courier New", monospace;}
    a { color: #178DB1; }
    .container { margin: 0 auto; max-width: 960px; }
    #info + .readmore-js-toggle { padding-bottom: 1.5em; border-bottom: 1px solid #999; font-weight: bold;}
    #demo { padding: 0 10%; }
</style>



<?php foreach ($result as $row) { ?>  
    <div class="container ">    
        <section id="demo">   
            <article>
                <div id="poem_title">
                    <div id="poem_title_value">
                        <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
                    </div>
                </div>
                <p><?php echo substr("$row->body", 0, 150); ?></p>

                <p><?php echo substr("$row->body", 150, 70000); ?>
                </p>

            </article>

        </section>
    </div>
<?php } ?> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>scripts/readmore.js" language="javascript"></script>

<script>
          $('#info').readmore({
              moreLink: '<a href="#">Usage, examples, and options</a>',
              collapsedHeight: 384,
              afterToggle: function(trigger, element, expanded) {
                  if (!expanded) { // The "Close" link was clicked
                      $('html, body').animate({scrollTop: $(element).offset().top}, {duration: 100});
                  }
              }
          });
          $('article').readmore({speed: 500});
</script>


==================================
==================================
====================================


<?php foreach ($result as $row) { ?>  
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.js" type="text/javascript"></script>
<script type="text/javascript">
            $(document).ready(function() {
                $(".message<?php echo $row->poem_id; ?>").hide();
                $("span.readmore<?php echo $row->poem_id; ?>").click(function() {
                    $(".message<?php echo $row->poem_id; ?>").show("slow");
                    $(this).hide();
                });
            });
</script>
    <div id="poem_title">
        <div id="poem_title_value">
            <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
        </div>
    </div>
    <div<?php echo $row->poem_id; ?>>
        <?php echo substr("$row->body", 0, strpos($row->body, ' ', 150)); ?>
        
    </div>

    <span class="readmore<?php echo $row->poem_id; ?>">Read More...</span>
    
    
    <div class="message<?php echo $row->poem_id; ?>">
        <?php echo substr("$row->body", 151, 70000); ?>
    </div>

<?php } ?> 
    
    <?php foreach ($poem_of_the_member as $poem_of_the_member) { ?>
                            <?php if (isSet($poem_of_the_member->picture_small)) { ?> 
                                <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $poem_of_the_member->picture_small; ?>"/><!-- link with poems detail  !-->
                            <?php } else { ?>
                                <img title="" height="50px" width="50px" style="margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>
                            <?php }
                        } ?>

                                
index page change===04042015


 <div id="add_to_link">
<!--                <div id="some_category">
                    <div  id="some_category_titls">
                        <div style="margin-left: 35px; margin-top: 9px; color: #B57340; ">Poems About</div>                        
                    </div> 
                    <div  id="some_category_detail">
                        <?php foreach ($category_view as $row) { ?>
                            <div id="some_category_font">
                                <div id="some_category_font_position">
                                    <li><a style="color: #333;" title="Poem Category" href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $row->poems_category_id; ?>" ><?php echo $row->poems_category_name; ?></a></li>  link with poems detail  !
                                </div>
                            </div>
                        <?php } ?>
                        <div style="float:left;
                             height:  23px;
                             width: 121px;
                             text-align: center;
                             background-color: whitesmoke;                             
                             border-radius: 3px;
                             box-shadow:0px 0px 5px 0px silver ; /* add shadow */
                             margin:  15px 0px 0px 289px;" id="category_btn">
                            <a style="font:bold 13px/13px sans-serif; color: tomato; "  href=" <?php echo base_url(); ?>welcome/category_detail_view.php" class="link">More Topics »</a>
                        </div>
                    </div> 
                </div>-->

                <?php

                function timeAgo($time_ago) {
                    $time_ago = strtotime($time_ago);
                    $cur_time = time();
                    $time_elapsed = $cur_time - $time_ago;
                    $seconds = $time_elapsed;
                    $minutes = round($time_elapsed / 60);
                    $hours = round($time_elapsed / 3600);
                    $days = round($time_elapsed / 86400);
                    $weeks = round($time_elapsed / 604800);
                    $months = round($time_elapsed / 2600640);
                    $years = round($time_elapsed / 31207680);
                    // Seconds
                    if ($seconds <= 60) {
                        return "just now";
                    }
                    //Minutes
                    else if ($minutes <= 60) {
                        if ($minutes == 1) {
                            return "one minute ago";
                        } else {
                            return "$minutes minutes ago";
                        }
                    }
                    //Hours
                    else if ($hours <= 24) {
                        if ($hours == 1) {
                            return "an hour ago";
                        } else {
                            return "$hours hrs ago";
                        }
                    }
                    //Days
                    else if ($days <= 7) {
                        if ($days == 1) {
                            return "yesterday";
                        } else {
                            return "$days days ago";
                        }
                    }
                    //Weeks
                    else if ($weeks <= 4.3) {
                        if ($weeks == 1) {
                            return "a week ago";
                        } else {
                            return "$weeks weeks ago";
                        }
                    }
                    //Months
                    else if ($months <= 12) {
                        if ($months == 1) {
                            return "a month ago";
                        } else {
                            return "$months months ago";
                        }
                    }
                    //Years
                    else {
                        if ($years == 1) {
                            return "one year ago";
                        } else {
                            return "$years years ago";
                        }
                    }
                }
                ?>

                <?php foreach ($trending as $row) { ?>

                    <div id="trending_home_page">
                        <div id="titls">
                            <div id="image">
                                <img height="50px" width="50px" style=" float: left; margin:0px 0px 0px 0px;  border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                            </div>
                            <div id="submit_date">
                                <b style="float: left ; text-align: center; font: normal 13px/13px sans-serif;margin-top: 8px; color: #333;"><?php echo timeAgo("$row->poem_submit_date", true); ?></b>
                            </div>
                            <div id="trending_image">
                                <!--<b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b>-->

                            </div>
                            <div id="trending_date">
                                <b style="float: left; text-align: center; margin-left: 3px; font: normal 13px/13px sans-serif;margin-top: 9px; color: #555;"><?php echo timeAgo("$row->trending_date", true); ?></b>
                            </div>
                            <div id="name">
                                <b style="float: left; margin:3px 0px 0px 3px ;"><a  style=" font: bold 14px/14px sans-serif; color: #666;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo ucfirst($row->name); ?></a></b>
                            </div>
                        </div>


                        <div id="detail">
                            <div id="title">
                                <a style=" font: bold 15px/15px sans-serif; color: #666;"  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><?php echo $row->title; ?></a>
                            </div>
                            <div id="data" style="overflow: scroll; ">
                                <b style="font: normal 13px/13px sans-serif; color: #333;"><?php echo substr("$row->body", 0, 447); ?></b>

                                <!--<?php
                                $file1 = "./$row->body.txt";
                                $lines = file($file1);
                                $count = count($lines);
                                echo($count);
                                ?>!-->


                            </div>
                            <div id="button">
                                <a style="float: left;margin-top: 7px; text-align: center; margin-left: 65px;  font: normal 14px/14px sans-serif; color: tomato;"  href="<?php echo base_url(); ?>user_admin_controller/all_trending_poem_view/"> All trending poem's view »</a> 

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--                    <div> <?php foreach ($home_add_small as $row) { ?>
                                                                                                                                                                <img height="295" width="297px"src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/> link with poems detail  !
                <?php } ?></div>-->


            </div>


index page change===04042015 === end

<style type="text/css">
                        .box{
                            padding: 20px;
                            display: none;
                            height:95px;
                            width:371px;
                            margin-top: 20px;
                            border: 0px solid #000;
                        }
                        .comments_image{ }

                    </style>
                    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>

                    <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('input[type="button"]').click(function() {
                                            if ($(this).attr("id") == "comments_image") {
                                                $(".box").hide();
                                                $(".comments_image").show();
                                            }

                                        });
                                    });
                    </script>                         

                    <div>
                        <input type="button" id="comments_image" style="border-style: none; outline:  none; "  name="comments_image" value="">
                    </div>
                    <div class="comments_image box"><textarea placeholder="Write a reply" title="Write a reply" name="" id=""  style="float: left; height: 65px; width: 381px; border-radius: 7px; display: block; position: relative; outline: none;"></textarea><br>
                        <button title="Click for reply post" type="button" style="float: left; font:  bold 13px/13px 'Josefin Slab',Georgia; text-shadow: 1px 1px 1px #fff; display: block; position: relative; height: 29px; width: 71px; border-radius: 7px; outline: none; margin-top: 11px;"  name="button">Post
                        </button>
                    </div>