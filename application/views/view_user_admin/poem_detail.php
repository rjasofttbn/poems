<!-- 5 Star rating  !-->

<!-- poem detail and voting interface !-->

<!-- css locale connection start !-->

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>
<link href="<?php echo base_url(); ?>/css/styles_rate.css" rel="stylesheet" type="text/css"></link>

<!-- css locale connection end !-->

<div id="poem_vote">
    <!--<div id="poet_picture">
        <img src="<?php echo base_url() ?><?php echo $result->user_pictures; ?>" width="200" height="200" />
    </div>!-->
    <!-- poem title show start !-->

    <div title="Poem Name" id="poem_detail_title">
        <?php echo $result->title; ?></br></br></br>
    </div>
    <!--    <div id="poem_detail_poet_rank">
    <?php foreach ($poet_rank_result as $poet_rank_result) { ?>                                                                                                                                                                                               Poet Rank :<?php echo $row->serial_number; ?>
        <?php echo $poet_rank_result->rank_no; ?>
    <?php } ?>
        </div>-->
    <!-- poem title show end !-->

    <div id="poem_votin_w">
        <div id="poem_detail_main"><!-- this code for poem detail show start !-->
            <div id="poem_detail">
                <!--                <div id="poem_detail_colorerase">
                                </div>-->
                                <!--<textarea name="body"  style="color: background; font-size: 16px;  background:ivory; border: 0; overflow: auto; border-top-color: ivory ; border-top-style: solid; text-align: " disabled="disabled" rows="39" cols="63"><?php echo $result->body ?></textarea>-->
                <!--                <video width="320" height="240" controls autoplay>

                        <source src="video/gizmo.webm" type="video/webm" />
                                </video>          -->
                <div title="Poem detail" style=" float: left; min-width: 351px; font: normal 13px/14px;  color: #555; text-align: left; line-height:   23px;">
                    <b style="font: normal 14px/14px sans-serif;"> <?php echo $result->body ?> </b>
                </div>
                <div id="poem_date">
                    <span style="float:left;" title="Poem Submit Date.">
                        Submit Date :
                        <?php
                        date_default_timezone_set('Europe/London');
                        $currentDateTime = $result->poem_submit_date;
                        $newDateTime = date('d/m/Y H:i:s a', strtotime($currentDateTime));
                        echo $newDateTime;
                        ?>  </span>

                </div>

                <!-- poem rating  start !-->

<!--                <script>
                    function check() {
                    var content = document.getElementById("$poem_poem_details").value;
                    alert(content);
                    }
                </script> onload="check"-->

                <div id="poem_rate">
                    <div id="poem_star">
                        <div style="float: left; border-radius: 100%; padding: 3px; margin-left: 31px; height: 21; width: auto;  color: tomato;">
                        </div>
                        <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/savevotes" method="post">
                            <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
                            <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />
                            <input type="hidden" id="ip" name="ip" size="50" value="" maxlength="180">
                            <!--<input type="hidden" name="poem_woner_id" size="30px" maxlength="20" value="<?php echo $poem_woner_id->poem_woner_id ?>" />-->
                            <input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />
                            <div class="poll2" align="center">
                                <div  class="rating_message" style="height:15px;color: #555; "></div>
                                <div class="heading">Rate The Poem</div>
                                <div  id="star-holder">
                                    <div  class="simpleRatings">
                                        <div  style="margin: 23px 0px 0px 0px;"  class="starsmediumorange">
                                            <input title="1" type="submit" name="poem_vote" value="1" class="stars1" /><span class="tip"> star rating: Poor</span>
                                            <input title="2" type="submit" name="poem_vote" value="2" class="stars2" /><span class="tip"> star rating: Average</span>
                                            <input autofocus="" title="3" type="submit" name="poem_vote" value="3" class="stars3" /><span class="tip"> star rating: Good</span>
                                            <input title="4" type="submit" name="poem_vote" value="4" class="stars4" /><span class="tip"> star rating: Very Good</span>
                                            <input title="5" type="submit" name="poem_vote" value="5" class="stars5" /><span class="tip"> star rating: Excellent</span>

                                            <input title="6" type="submit" autofocus="" name="poem_vote" value="6" class="stars6" /><span class="tip"> star rating: Poor</span>
                                            <input title="7" type="submit" name="poem_vote" value="7" class="stars7" /><span class="tip"> star rating: Average</span>
                                            <input title="8" type="submit" name="poem_vote" value="8" class="stars8" /><span class="tip"> star rating: Good</span>
                                            <input title="9" type="submit" name="poem_vote" value="9" class="stars9" /><span class="tip"> star rating: Very Good</span>
                                            <input title="10" type="submit" name="poem_vote" value="10" class="stars10" /><span class="tip"> star rating: Excellent</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="poem_rate_view">
                        <div title="Avarage Vote Rate Of The Poem." style="width: auto; height: 9px; color: #555;">
                            <span style="float: left; margin:0px 10px 5px 0px;  font-size:17px; font-weight:bold;">Rating:</span>
                            <?php
                            foreach ($poem_poem_details as $poem_poem_details) {
                                ?>
                                <strong><?php echo $poem_poem_details->rate; ?>
                                <?php } ?>/10</strong>
                            <strong>(<?php echo $total_voter->id; ?> votes cast)</strong>
                        </div>
                    </div>

                    <div id="poem_social_link">
<!--                        <div id="poem_social_link_caption"> <strong> Share this poem :</strong></div>

                        <a href="https://plus.google.com/share?url=URL" target="_blank"><div id="poem_social_link_google"></div></a>


                        <a href="https://plus.google.com/share?url={}" onclick="javascript:window.open(this.href,
                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                return false;"> <div id="poem_social_link_twitter">
                            </div></a>

                        <a href="https://poetsfeeling.com/user_admin_controller/poemdetail/<?php echo $poem_poem_details->title; ?>"  > <div id="poem_social_link_facebok"></div></a>

<div class="fb-share-button" data-href="https://poetsfeeling.com/user_admin_controller/poemdetail/<?php echo $poem_poem_details->title; ?>/" data-layout="link"></div>-->

                    </div>
                </div>
                <!-- rate insert and view end !-->


                <div style=" float: left; min-height: 121px; margin-top: 31px; width: 664px;">
                    <div style="float: left; height: 121px; width: 165px;">

                        <div style="float: left; height: 71px; width: 165px;">
                            <div  title="This poem has been viewed <?php echo $total_read->total_read_value; ?> times " id="read_value_image" style=" float: left; margin: 27px  0px  0px  59px "></div>

                        </div> 
                        <div style="float: left; height: 50px; width: 165px;">
                            <div style="float: left;font: normal 13px/15px sans-serif; border-radius: 100px; text-align: center;  margin : 1px 0px 0px 61px;">

                                <div title="This poem has been viewed <?php echo $total_read->total_read_value; ?> times " style=" font: bold 17px/27px sans-serif;  padding: 5px; color: #555;"> <?php echo $total_read->total_read_value; ?> </div>
                            </div>   
                        </div>

                    </div>
                    <div style="float: left; height: 121px; width: 165px;margin-left: 1px;">
                        <div style="float: left; height: 71px; width: 165px;">

                            <div title="Like this poem <?php foreach ($like_data as $row) { ?> <?php echo $row->total_like; ?><?php } ?> " id="like_value_image" style=" float: left; margin: 27px  0px  0px  59px "></div>
                        </div> 
                        <div style="float: left; height: 50px; width: 165px;">
                            <div style="float: left;font: normal 13px/15px sans-serif; border-radius: 100px; text-align: center;  margin : 1px 0px 0px 71px;">
                                <?php foreach ($like_data as $row) { ?>
                                    <div title="Like this poem <?php echo $row->total_like; ?>" style=" font: bold 17px/27px sans-serif;  padding: 5px; color: #555;"><?php echo $row->total_like; ?></div>
                                <?php } ?> 
                            </div>   
                        </div>                         
                    </div>
                    <div style="float: left; height: 121px; width: 165px; margin-left: 1px;">
                        <div style="float: left; height: 71px; width: 165px;">
                            <div title="comments on this poem  <?php foreach ($total_comments as $row) { ?> <?php echo $row->total_comments; ?><?php } ?> " id="comments_image" style=" float: left; margin: 27px  0px  0px  59px "></div>
                        </div> 
                        <div style="float: left; height: 50px; width: 165px;">
                            <div style="float: left;font: normal 13px/15px sans-serif; border-radius: 100px; text-align: center;  margin : 1px 0px 0px 73px;">
                                <?php foreach ($total_comments as $row) { ?>
                                    <div title="comments on this poem <?php echo $row->total_comments; ?>" style=" font: bold 17px/27px sans-serif;  padding: 5px; color: #555;"><?php echo $row->total_comments; ?></div>
                                <?php } ?> 
                            </div>   
                        </div>                         
                    </div>

                    <!--                    <div style="float: left; height: 121px; width: 165px; margin-left: 1px;">
                                            <div style="float: left; height: 71px; width: 165px;">
                                                <div title="add this poem to a collection  <?php foreach ($total_collection as $row) { ?> <?php echo $row->total_collection; ?><?php } ?> " id="collection_image" style=" float: left; margin: 27px  0px  0px  59px "></div>
                                                <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/save_collection" method="post">
                                                    <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
                                                    <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />                                
                                                    <input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />
                    
                                                    <button autofocus="Like" title="Collection this poem<?php foreach ($total_collection as $row) { ?>  <?php echo $row->total_collection; ?><?php } ?> " type="submit" style="float: left; background-color:rgba(255,255,255,0.0); outline: none; cursor: pointer; border:none; margin: 27px  0px  0px  59px;" id="Like"><div id="collection_image"></div></button>
                                                </form>
                                            </div> 
                                            <div style="float: left; height: 50px; width: 165px;">
                                                <div style="float: left;font: normal 13px/15px sans-serif; border-radius: 100px; text-align: center;  margin : 1px 0px 0px 77px;">
                    <?php foreach ($total_collection as $row) { ?>
                                                                    <div title="add this poem to a collection  <?php echo $row->total_collection; ?>" style=" font: bold 17px/27px sans-serif;  padding: 5px; color: #555;"><?php echo $row->total_collection; ?></div>
                    <?php } ?> 
                                                </div>   
                                            </div>                         
                                        </div>-->

                </div>
                <hr style=" float: left; display: block; width: 80%; border: #ddd dotted 1px ; margin-top: 1px;">
                <!--total info view end !-->  
                <!-- <div style=" float: left; min-height: 121px; margin-top: 71px;">
                    <div  style=" float: left; height: auto; width: 621px;  "  >
                        <div style="float: left;">
                            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/save_collection" method="post">
                                <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
                                <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />                                
                                <input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />

                                <button autofocus="Like" title="Collection this poem<?php foreach ($total_collection as $row) { ?>  <?php echo $row->total_collection; ?><?php } ?> " type="submit" style="background-color:rgba(255,255,255,0.0); outline: none; cursor: pointer; border:none;" id="Like"><div id="collection_image"></div></button>
                            </form>
                        </div>
                    </div>
                    <div style="float: left; margin-top: 31px; ">
                <?php foreach ($poet_collection_pic as $row) { ?>                                   
                                            <a title="Popular Poet" style="color: #333; font: normal 13px/13px sans-serif;line-height:.9;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>">
                                                <div style="float: left;  margin-left: 5px;"> <img height="50px"  title="<?php echo ucfirst($row->name); ?>" width="50px" style=" border-radius: 100px; cursor:  pointer; margin: 2px 0px 0px 2px;" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/></div>
                                            </a>
                <?php } ?> 
                    </div>
                </div>
                <hr style=" float: left; display: block; width: 100%; border: #ddd dotted 1px ; margin-top: 19px;">
                collection insert and view end !-->   


                <div style=" float: left; min-height: 121px; margin-top: 71px;">
                    <div  style=" float: left; height: auto; width: 621px;  "  >
                        <div style="float: left;">
                            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/save_like" method="post">
                                <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
                                <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />

                                <input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />
                                <button autofocus="" title="Like this poem <?php foreach ($like_data as $row) { ?> <?php echo $row->total_like; ?><?php } ?>" type="submit" style="background-color:rgba(255,255,255,0.0); outline: none; cursor: pointer; border:none;" id="Like" onclick="showResults();"><div id="like_value_image"></div></button>
                            </form>
                        </div>
                        <!--                        <div style="float: left;font: normal 13px/15px sans-serif; border-radius: 100px; text-align: center; min-height: 37px; min-width: 37px;  margin : 0px 0px 0px 7px;color: #555; background-color:  #D0D0D0;">
                        <?php foreach ($like_data as $row) { ?>
                                                                                    <div title="Total like" style=" font: bold 17px/27px sans-serif;  color: #555; padding: 3px;   margin : 3px 0px 0px 0px;"><?php echo $row->total_like; ?></div>
                        <?php } ?>
                                                </div>                            -->
                    </div>
                    <div style="float: left; margin-top: 31px; ">
                        <?php foreach ($poet_like_pic as $row) { ?>                                   
                            <a title="Popular Poet" style="color: #333; font: normal 13px/13px sans-serif;line-height:.9;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>">
                                <div style="float: left;  margin-left: 5px;"> <img height="50px"  title="<?php echo ucfirst($row->name); ?>" width="50px" style=" border-radius: 100px; cursor:  pointer; margin: 2px 0px 0px 2px;" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/></div>
                            </a>
                        <?php } ?> 
                    </div>
                </div>
                <hr style=" float: left; display: block; width: 80%; border: #ddd dotted 1px ; margin-top: 19px;">
                <!-- like insert and view end !-->              


                <!-- poem comments start !-->
                <div style="float: left; margin-top: 31px;">
                    <div style=" float: center; text-align: center; height: auto; width:  170px; border-radius: 100px; box-shadow: 0px 0px 31px 0px black; margin:31px 0px 0px 400px; " >
                        <?php
                        $message = $this->session->userdata('message_poem_comments');
                        if ($message) {
                            echo $message;
                            $this->session->unset_userdata('message_poem_comments');
                        }
                        ?>
                    </div>

                    <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/savecomments" method="post">
                        <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
                        <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />
                        <input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />

                        <!--                    <h3 style="color:green">
                        <?php
                        $msg = $this->session->userdata('message');
                        if ($msg) {
                            echo $msg;
                            $this->session->unset_userdata('message');
                        }
                        ?>
                                            </h3>-->
                        <div id="poem_comments">
                            <div id="poem_comments_caption">
                                <b  style="margin : 3px 0px 13px 3px; color: #555; ">Write comment here.</b>
                            </div>
                            <div style=" text-align: left; margin : 11px 0px 0px 0px;">
                                <textarea  title="Write Your Comment's About This Poem." style=" outline: none; border-style: solid; border-width: 1px; border-color: #D0D0D0; box-shadow: 0px 0px 3px 0px;    border-radius: 7px;  " name="comments" required="1"   rows="9" cols="79"></textarea>
                                <input title="Click Here For Inserting Comment's." type="submit" style=" font: bold 13px/15px sans-serif; cursor:  pointer; background-color: whitesmoke; border-radius: 3px;  margin : 15px 0px 0px 421px;height:27px; width:145px; color: #333; " value="Submit" name="comment_submit" />
                            </div>
                        </div>
                    </form>
                </div>
                <!-- comments insert end !-->
                <div id="poem_detail_comments">
                    <div  style=" float: left;height: auto; margin-bottom: 21px; "  >
                        <div title="comments on this poem  <?php foreach ($total_comments as $row) { ?> <?php echo $row->total_comments; ?><?php } ?>" id="">

                        </div>
                        <!--<b title="Total Comments" style="float: left; font: bolder 17px/27px sans-serif;  color: #555;">Comments </b>-->

                        <!--                        <div  style="float: left; border-radius: 100px; text-align: center; color: #555;min-height: 37px; min-width: 37px; background-color:  #D0D0D0; margin:7px 0px 0px 7px;"  >
                        <?php foreach ($total_comments as $row) { ?>
                                                                                    <b title="Total Comments" style="float: left; font: bolder 17px/27px sans-serif;  color: #555;padding: 3px; margin-left: 9px;"><?php echo $row->total_comments; ?></b>
                        <?php } ?>
                                                </div>-->

                    </div>
                    <!--                    <div id="comments_data">
                    <?php foreach ($poem_comments_display as $rows) { ?>
                                                            <div style=" background-color: #eee; width: 659px; height: auto; margin: 31px 0px 0px 0px; border-top-right-radius: 7px; border-bottom-left-radius: 7px; border-bottom-right-radius: 31px; box-shadow:0px 1px 17px 0px  #333 ; ">
                                                                <div style=" background-color:#eee; height: 85px;border-top-right-radius: 7px; ">
                                
                                                                    <div  title="Picture" style=" float: left; height: 75px;transform: translate(-25px,-25px); "><img height="75px" width="75px" style=" border-radius: 100px; margin: 2px 0px 0px 2px;  border:  solid 7px whitesmoke; box-shadow:0px 1px 17px 0px  #333 ; " src="<?php echo base_url() ?><?php echo $rows->picture_small; ?>"/></div>
                                                                    <div title="Comment's Post Date" style=" float: left; height: 67px;  margin-left: 3px;  padding: 7px;"  ><p><strong style=" color:  #666; float: left; font: bold  13px/13px sans-serif;" title="Name"><?php echo strtoupper($rows->name) ?></strong></br> <b style=" color:  #777; font:  normal 11px/11px sans-serif; "><?php echo $rows->comments_post_date ?></b> </p> </div>
                                                                    <div style=" float: right; height: 67px; "> <p style=" padding: 7px;"><b style="font-weight:  normal; font: 12px/14px sans-serif; color:  #555; text-align: right;">
                                
                        <?php echo $rows->comments_post_date; ?></b></p></br></div>
                                                                </div>
                                                                <div style="min-height:  90px;  color:  #555; padding: 7px; "> <p><b style=" font: normal 14px/14px sans-serif;  text-align:  justify; " title="Comment's"> <?php echo $rows->comments ?></b></p></div>
                                                            </div>
                    <?php } ?>
                     </div>-->
                    <?php require_once 'poemdetail_comments.php'; ?>  
                </div>
                <!-- comments view end !-->
            </div>
        </div>
        <!-- poem vote start !-->

        <div id="vote_manage">

            <?php
            foreach ($poem_detail_pics as $poem_detail_pics) {
                ?>
                <img   style="  height:240px; width:240px; border-radius: 200px; " src="<?php echo base_url() ?><?php echo $poem_detail_pics->user_pictures; ?>"/>
            <?php } ?>

            <b title="Poet Name" style=" color:  #555;;"><?php echo ucfirst($poem_detail_pics->name); ?></b>
        </div>
        <!-- poem vote end !-->
    </div>
</div>








