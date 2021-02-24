
<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 
<style type="text/css">
    .cnteZaman{
        margin:-70px 0px 0px 660px;
        font-size: 30px;
        font-weight:bold;
        color:#8e1a1d;
        //<!--background-image: url('/gift/post-more-comments/images/PoemSayacBg3.png');!-->
        width: 235px;
        height: 90px;
    }
    .cnteZaman .cnteZamanDays{float:left;color: indianred; margin:30px 0px 0px 10px;}
    .cnteZaman .cnteZamanHours{float:left;margin-left:28px;color:indianred; margin:30px 0px 0px 30px;}
    .cnteZaman .cnteZamanMinutes{float:left;margin-left:28px;color:indianred; margin:30px 0px 0px 28px;}
    .cnteZaman .cnteZamanSeconds{float:left;margin-left:28px;color:indianred; margin:30px 0px 0px 28px;}
</style>

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>   
</div> 

<div id="new_poets_Page_title">
    <div id="font">
        Poetry Contest
    </div>    
</div> 
<!--<div id="managepoem_caption">
    Poetry Contest
</div>  -->
<div id="poems_home">
    <div id="poetry_contest_date_time">  <!-- poetry contest date show 
        <h2>Contest Date : 01 April  --- >>> 31 April, 2014</h> !-->

        <div style="float:right; margin-top:10px"></div>				
        <div class="text2" style=" -webkit-box-shadow: 0px 0px 31px 0px black   ;
             -moz-box-shadow: 0px 0px 31px 0px black; color: #8e1a1d; box-shadow: 0px 0px 31px 0px black; ">

            <h2>
                <?php foreach ($poetry_contest_data as $poetry_contest_data) { ?>
                    <?php echo $poetry_contest_data->poetry_contest_from_date_to_date; ?>                
                </h2>
            </div>
        </div>		

        <div class="cnteZaman">
            <script type="text/javascript">
                // TargetDate = "09/15/2013 23:59";
                //TargetDate = "08/31/2014 23:59";
                TargetDate = "<?php echo $poetry_contest_data->poetry_contest_end_date; ?>"<?php } ?>;
            BackColor = "white";
            ForeColor = "black";
            CountActive = true;
            CountStepper = -1;
            LeadingZero = true;

            DisplayFormat = "<div class='cnteZamanDays'>%%D%%</div><div class='cnteZamanHours'>%%H%%</div><div class='cnteZamanMinutes'>%%M%%</div><div class='cnteZamanSeconds'>%%S%%</div>";
            FinishMessage = "It is finally here!";
        </script>
        <!--<script type="text/javascript" src="post-more-comments_files/countdown.js"></script><span id="cntdwn" style="background-color:white; color:black"><div class="cnteZamanDays"><b>00</b></div><div class="cnteZamanHours"><b>08</b></div><div class="cnteZamanMinutes"><b>11</b></div><div class="cnteZamanSeconds"><b>36</b></div></span>!-->
        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/countdown.js" language="javascript"></script>
        <div id="poetry_contest_time">
            <h10>Days  &nbsp  &nbsp &nbsp &nbsp &nbsp Hours &nbsp &nbsp &nbsp &nbsp Minutes &nbsp &nbsp Seconds</h10>
        </div>
    </div>
    <div id="poetry_contest">
        <div id="add_poetry_contest_one">           <!-- Advertise!-->
            <?php foreach ($contest_first_add as $row) { ?>
                <img height="390" width="226px" style=" border-radius: 10px;" src="<?php echo base_url() ?><?php echo $row->contest_first_add; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div>
        <div id="poetry_contest_sl_to_picture">
            <div id="poetry_contest_title" style="font-weight: bold; background-color: #eee; color: #B57340;">
                <div id="poetry_contest_sl_no">
                    <!--Sl No.-->
                </div>
                <div id="poetry_contest_poem_title">
                    Poem Title
                </div>

                <div id="poetry_contest_poem_total">
                    Voter 
                </div>

                <div id="poetry_contest_rating">
                    Rating
                </div>

                <div id="poetry_contest_name">
                    Name
                </div>
                <div id="poetry_contest_picture">
                    <!--Picture-->
                </div>
            </div>
            <?php
            $cnt = 1;      //<!-- Sl no start !-->
            foreach ($result as $aresult) {
                ?>     
                <div id="poetry_contest_sl_to_picture_wrapper">
                    <div id="poetry_contest_sl_no_data"><?php
                        echo $cnt;
                        $cnt++;
                        ?>. </div>  <!-- Sl no end !-->

                    <div id="poetry_contest_poem_title_data">  <!-- data show from tbl_poems start !-->
                        <a style="color:  tomato; font-weight: bold; font-size: 12px; " href="<?php echo base_url() ?>user_admin_controller/poemdetail/<?php echo $aresult->poem_id ?>"><?php echo ucfirst($aresult->Poem); ?></a>                                     
                    </div>
                    <div id="poetry_contest_total_data">
                        <b style=" font-weight:  normal; color: #333; font-size: 14px;"> <?php echo $aresult->total_voter; ?></b>
                    </div>
                    <div id="poetry_contest_rating_data">
                        <b style=" font-weight:  normal; color: #333; font-size: 14px;"><?php echo $aresult->avg_vote; ?></b>
                    </div>

                    <div id="poetry_contest_name_data">                        
                        <a style="color: tomato; font-weight: bold; font-size: 12px; " href="<?php echo base_url() ?>poems/poet_personal_info/<?php echo $aresult->user_id ?>"><?php echo ucfirst($aresult->Name); ?></a>                                     
                    </div>

                    <div id="poetry_contest_picture_data">
                        <?php if (!empty($aresult->picture_small)) { ?>
                            <img height="50" width="50" style=" border-radius: 5px; margin: 2px 0px 0px 2px;" src="<?php echo base_url() ?><?php echo $aresult->picture_small; ?>"/>
                        <?php } else { ?>
                            <img title="" height="50px" width="50px" style="margin: 0px 0px 0px 0px; " src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    
    <?php } ?>
                    </div>
                </div>

<?php } ?> <!-- data show from tbl_poems end !-->
        </div>        
        <div id="add_poetry_contest_two"> 

            <?php foreach ($contest_second_add as $row) { ?>
                <img height="390" width="226px" style=" border-radius: 10px;" src="<?php echo base_url() ?><?php echo $row->contest_second_add; ?>"/><!-- link with poems detail  !-->
<?php } ?> 

        </div>
    </div> 

</div> 

