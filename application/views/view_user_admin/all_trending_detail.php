<link href="<?php echo base_url(); ?>/css/demo_accrodion.css" rel="stylesheet" type="text/css"></link>   
<link href="<?php echo base_url(); ?>/css/style_accrodion.css" rel="stylesheet" type="text/css"></link>   
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/modernizr.custom.29473.js" language="javascript"></script>


<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>
<!-- Log in Application form !-->


<div id="add_up">

</div>

<?php

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>
</div>

<div id="all_trending_poem_title">
    <h1>Trending poem's detail view.</h1>
</div>


<div id="all_trending">
    <div id="trending_poems_title_name">
        <div id="title">
            <div id="value">
                Trending Poem's
            </div>
        </div>
        <div id="title_name">
            <?php foreach ($trending_poem_result as $row_trending) { ?>
                <div style=" width: 100%; background-color:  #666; margin-top: 1px;">
                    <div id="titleall_trending">
                        <a  style=" color: #333;"  href="<?php echo base_url(); ?>user_admin_controller/all_trending_detail_view/<?php echo $row_trending->poem_id; ?>"><?php echo substr($row_trending->title, 0, 19); ?>...</a>,
                    </div>
                    <div id="nameall_trending">
                        <a  style=" color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row_trending->user_id; ?>"><?php echo substr($row_trending->name, 0, 9); ?>...</a>          
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php foreach ($result as $row) { ?>

        <div id="all_trending_poem_wrapper">

            <div id="image">
                <img height="50px" width="50px" style=" float: right; margin: 3px 7px 0px 0px;  border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                <div id="name">
                    <a  style=" font: bold 16px/16px sans-serif; color: #444;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
                </div>
            </div>

            <div id="name_date">
                <div id="submit_date">
                    <b style="float: left; margin-top:  11px; font-weight: normal; color: #555;">Submit date: <?php echo time_elapsed_string("$row->poem_submit_date", true); ?>.</b></br>
                </div>
                <b style="float: left; margin: 3px 0px 0px 70px;"><div id="trending_image"></div></b>
                <div id="trending_date">
                    <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;">Trending date: <?php echo time_elapsed_string("$row->trending_date", true); ?>.</b>
                </div>
            </div>

            <div id="poem_title">
                <div id="poem_title_value">
                    <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; margin-top:  7px;"><?php echo $row->title; ?></b></a>
                </div>
            </div>

            <div id="poem_detail">
                <?php echo substr($row->body, 0); ?>
            </div>


            <div style="float: left; min-height:127px; min-width: 660px;  margin: 0 auto;">
                <div class="container">
                    <section class="ac-container">
                        <div>
                            <input id="ac-1" name="accordion-1" type="checkbox" />
                            <label for="ac-1">Continue Reading</label>
                            <article class="ac-small">
<!--                                <div id="poem_detail">
                                    <?php echo substr($row->body, 171); ?>
                                </div>-->

                                <div style="float: left; min-height:122px; margin: 4px 0px 0px 0px;  width: 660px;  background-color: whitesmoke;">

                                    <b style=" float: left; font: bold 17px/15px sans-serif; color: #666; text-align: left; margin:41px 0px 0px 150px; "> <p>Total read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 7px;"> <?php echo $row->read_value; ?></b>.
                                            <b style="margin:0px 0px 0px 7px;">Total vote:</b><b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;"> <?php echo $row->poem_vote; ?></b>.
                                            <b style="margin:0px 0px 0px 7px;"> Total  comments:</b> <b style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;"><?php echo $row->total_comments; ?></b>.</p></b>
                                </div>
                        </div> 
                        </article>
                    </section>
                </div>
            </div>

        </div>
    <?php } ?>


</div>