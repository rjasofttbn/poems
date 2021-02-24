<div id="wrapper_bottom_main">
    <div id="wrapper_bottom_top">
        <a title="Home" style="color: #555;" href="<?php echo base_url(); ?>welcome/index.php" class="link" ><div id="wrapper_bottom_top_home">
                <div id="wrapper_bottom_top_font">
                    Home
                </div>
            </div></a>

        <a title="Poets" style="color: #555;" href="<?php echo base_url(); ?>welcome/new_poets.php" class="link"><div id="wrapper_bottom_top_poets">
                <div id="wrapper_bottom_top_font">
                    Poets
                </div>
            </div></a>

        <a title="Poems" style="color: #555;" href="<?php echo base_url(); ?>welcome/all_poem_show_page_small.php" class= "link"><div id="wrapper_bottom_top_poems">
                <div id="wrapper_bottom_top_font">
                    Poems
                </div>
            </div></a>

        <a title="Member Area" style="color: #555;" href="<?php echo base_url(); ?>poems/login.php" id="active"> <div id="wrapper_bottom_top_memberarea">
                <div id="wrapper_bottom_top_font">
                    Member Area
                </div>
            </div></a>

        <a  title="Poetry Contest" style="color: #555;" href="<?php echo base_url(); ?>poems/poetry_contest.php" id="active"> <div id="wrapper_bottom_top_poetry_contest">

                <div id="wrapper_bottom_top_font">Poetry Contest
                </div>
            </div></a>
        <div id="social_title">
            Social Media
        </div>
    </div>
    <div id="wrapper_bottom_middle">                               
        <div id="poem_title">
            <div style="float: right; height:75px; width: 207px;  margin: 1px 1px 0px 1px; ">
                <div style="float: left; height: 21px; width: 189px; padding: 1px; margin: 4px 0px 0px 3px;">
                    <div style="margin: 11px 0px 0px 0px;"><a style="color: #555;" href="<?php echo base_url(); ?>user_admin_controller/poem_submit.php" id="active">Submit a Poem</a></div>
                </div>
                <div style="float: left; height: 21px; width: 189px; padding: 1px;    margin: 4px 0px 0px 3px;">
                    <div style="margin: 11px 0px 0px 0px;"><a style="color: #555;" title="Create a free account to start adding poem"  href="<?php echo base_url(); ?>welcome/signup.php"> Become a Member</a></div>
                </div>
            </div>
            <?php foreach ($bottom_poem_category as $poem_category_row) { ?>

                <div id="category_data">
                    <!--<div style="margin: 11px 0px 0px 0px;"><a style="font:  normal 13px/15px sans-serif; color: #555;" href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $poem_category_row->poems_category_id; ?>"><?php echo ucfirst($poem_category_row->poems_category_name); ?>&nbsp;Poem  </a></div>-->
                    <div style="margin: 11px 0px 0px 0px;"><a title="Hot Poem" style="font:  normal 13px/15px sans-serif; color: #555;" href="<?php echo base_url(); ?>user_admin_controller/categorywise_poem/<?php echo $poem_category_row->poems_category_id; ?>" ><?php echo ucfirst($poem_category_row->poems_category_name); ?>&nbsp;Poem  </a></div>
                                                                                                                      
                </div>
            <?php } ?>

        </div>
        <div id="social_image">
            <div style="height: 47px; width: 175px; margin: 19px 0px 0px 29px; ">
                <a href="https://plus.google.com/108823020310938828096/posts" target="_blank"><div id="poem_social_link_google"></div></a>


                <a href="https://twitter.com/"  target="_blank"> <div id="poem_social_link_twitter"> 
                    </div></a>


                <a href="https://www.facebook.com/profile.php?id=100008480385622" target="_blank">
                    <div id="poem_social_link_facebok"></div></a>

            </div>
        </div>
    </div>
    <div id="wrapper_bottom_last">
        <div id="wrapper_bottom_last_menu_font">
            <b style=" font-weight: normal;  text-align: left; font: normal 13px/15px sans-serif; color:   #666;"> <p>&nbsp;© Poems are the property of their respective owners. All information has been reproduced here for educational and informational purposes to benefit site visitors, and is &nbsp;provided at no charge...
                    <?php
                    date_default_timezone_set("Asia/Dhaka");
                    echo date("d/m/Y H:i:s a");
                    ?>
                    &nbsp;<span>You Are Here :</b> <strong style="color: #444;">Best Poems</strong></span>

            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<a title="About Us" href=" "><b style=" color: #555; font: bold 12px/14px sans-serif; border-right-style: solid; border-right-width: 1px; border-right-color: #999; padding: 3px; ">About Us</b></a>
            <a title="Copyright notice" href=" "><b style="color: #555; font: bold 12px/14px sans-serif; border-right-style: solid; border-right-width: 1px; border-right-color: #999; padding: 3px;">Copyright notice</b></a>
            <a title="Privacy statement" href=" "><b style="color: #555; font: bold 12px/14px sans-serif;  border-right-style: solid; border-right-width: 1px; border-right-color: #999; padding: 3px;">Privacy statement</b></a>
            <a title="Help" href=" "><b style="color: #555; font: bold 12px/14px sans-serif; border-right-style: solid; border-right-width: 1px; border-right-color: #999; padding: 3px;">Help</b></a>
            <a title="Contact Us" href=" "><b style="color: #555; font: bold 12px/14px sans-serif;  ">Contact Us</b></a></p>    
            <!-- .links --></div>
    </div>

</div> 
<div style=" text-align: right; color: #444; margin-top: 3px;"><a style="color: #333;" title="Back to Top" href="#top">Back to Top ↑</a></div>

                <!--<div class="modal-body ajax-content links-only"><img src='http://s1.hellopoetry.com/img/loading.gif'/></div></div><div id="notinview">&nbsp;</div><div id="invisblock"></div><div id="backtotop" class="subtle" title="Back to top"><i class="fa fa-fw fa-arrow-up"></i></div><div id="reusable"><div id="post-write"><div class="pads btop">To comment on this poem, please <a href="/log-in/?next=/poems/latest/" class="nocolor">log in</a> or <a href="/register/?next=/poems/latest/" class="">create a free account</a></div></div><div id="comment-write" class="comment cmmt-write rowws"><div class="s"><a href="/log-in/?next=/poems/latest/">Log in</a> or <a href="/register/?next=/poems/latest/">register</a> to comment</div></div></div><div id="messages"></div><script type="text/javascript">var DEBUG=false;;var MEDIA_DOMAIN="http://s1.hellopoetry.com";var LOGGED_IN=false;</script><script src="http://s1.hellopoetry.com/js/hp.external.js?1.0" type="text/javascript"></script><script src="http://s1.hellopoetry.com/js/hp.js?ce31509c02d7" type="text/javascript"></script><script type="text/javascript">-->



