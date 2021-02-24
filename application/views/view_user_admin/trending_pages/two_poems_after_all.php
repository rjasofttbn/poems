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
        <!--ajax fade start-->

        <script type="text/javascript">
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
        </script>
        <!--Fade end!-->
  
 <?php foreach ($result as $row) { ?>
            <div class="hideme"   id="all_trending_poem_wrapper">
                <div id="image">
                    <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                    <div id="name">
                        <a  style=" font: normal 14px/14px 'Josefin Slab',Georgia; color: #333; text-shadow: 1px 1px 1px #fff; display: block; position: relative;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
                    </div>
                    <div id="submit_date">
                        <b style="float: left; margin-top:  11px; font-weight: normal; color: #555; text-shadow: 1px 1px 1px #fff; display: block; position: relative; font: normal 14px/14px 'Josefin Slab',Georgia;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                        <b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_image"></div></b><b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;text-shadow: 1px 1px 1px #fff; display: block;   position: relative;font: normal 14px/14px 'Josefin Slab',Georgia;"><?php echo get_time_difference_php("$row->trending_date", true); ?>.</b>
                    </div>                     
                </div>  
                <div id="poem_title">
                    <div id="poem_title_value">
                        <a  href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>"><b style=" color: #333; font: bold 17px/17px 'Josefin Slab',Georgia; margin-top:  7px; padding:  7px; text-shadow: 1px 1px 1px #fff; text-shadow: 1px 1px 1px #fff; display: block; position: relative;"><?php echo $row->title; ?></b></a>
                    </div>
                </div>
                <div id="poem_detail">
                    <div  class="accordianContainer">
                        <ul  class="accordian">
                            <li  style="list-style-type: none; margin: 0; "><h2><b style="padding: 7px;font: normal 14px/14px 'Josefin Slab',Georgia; text-shadow: 1px 1px 1px #fff; text-shadow: 1px 1px 1px #fff; display: block; position: relative; line-height: 27px; word-spacing: 2px; color:#444; margin: 0 0 0 0;">
                                        <?php
                                        $aContent = explode(' ', $row->body);
                                        $cContent = '';
                                        $nCount = count($aContent);
                                        for ($nI = 0; ($nI < 20 && $nI < $nCount); $nI++) {
                                            $cContent .= $aContent[$nI] . ' ';
                                        }
                                        trim($cContent, ' ');
                                        echo '<p>' . $cContent . '</p>';
                                        ?>
                                        <!--last word view by this syntax-->

                                    </b></h2>

                                <ul  style="list-style-type: none; margin: 0;padding: 0; ">
                                    <li  style="list-style-type: none; margin: 0;padding: 7px; ">
                                        <b style="font: normal 14px/14px 'Josefin Slab',Georgia; color:#444;line-height: 27px; text-shadow: 1px 1px 1px #fff;  word-spacing: 2px;  margin: 0;  padding: 0; ">
                                            <?php
                                            $aContent = explode(' ', $row->body);
                                            $cContent = '';
                                            $nCount = count($aContent);
                                            for ($nI = 20; ($nI < 40000 && $nI < $nCount); $nI++) {
                                                $cContent .= $aContent[$nI] . ' ';
                                            }
                                            trim($cContent, ' ');
                                            echo '<p>' . $cContent . '</p>';
                                            ?>
                                            <!--last word view by this syntax-->
                                        </b>
                                        <hr style=" float: left; display: block; width: 95%; border: #ddd dotted 1px ;">
                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%;    background-color: whitesmoke;">
                                            <b style=" float: left; padding: 15px;  font: bold 15px/15px sans-serif; color: #666; text-align: left; margin:15px 0px 0px 87px; "> 
                                                <p>Read: <b style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 0px;">
                                                        <?php echo $row->read_value; ?> </b>.

                                                    <b style="margin:0px 0px 0px 7px;">Vote:</b>
                                                    <!--total vote view in this div-->
                                                    <b id="new_total_vote<?php echo $row->poem_id; ?>" 
                                                       style=" font: normal 15px/15px sans-serif; color: tomato;  margin:0px 0px 0px 5px;">
                                                        <?php echo $row->total_vote; ?></b>.                                                

                                                    <b style="margin:0px 0px 0px 7px;">Comments:</b>                                                    
                                                    <!--total comments view in this div-->
                                                    <b id="new_total_comments<?php echo $row->poem_id; ?>" 
                                                       style=" font: normal 15px/15px sans-serif; color: tomato; margin:0px 0px 0px 5px;">
                                                           <?php echo $row->total_comments; ?>
                                                    </b>.
                                                </p>
                                            </b>
                                        </div> 
                                        <hr style=" float: left; display: block; width: 95%; border: #ddd dotted 1px ;">
                                        <div id="poem_rate"> 
                                            <div id="poem_star">
                                                <div style="float: left; border-radius: 100%; padding: 3px; margin-left: 3px; height: 21; width: auto;  color: tomato;">
                                                </div>

                                                <!--star rating start-->

                <script type="text/javascript">
                //<!--- browser validation end  --> 

                function saveVote(poemRate, newRate, totalVote, totalVoter, poemId, user_id) {
                //alert(poemId);
                //alert(totalVote);
                // alert(user_id);
                var newTotalVote = Number(totalVote) + Number(newRate);
                        var newTotalVoter = Number(totalVoter) + 1;
                        var newAverageVote = (newTotalVote / newTotalVoter);
                        //                                                                
                        serverPage = '<?php echo base_url(); ?>user_admin_controller/save_votes_trending/' + newRate + '/' + poemId + '/' + user_id;
                        xmlhttp.open("GET", serverPage);
                        xmlhttp.onreadystatechange = function()
                        {
    //                                                        alert(xmlhttp.readyState);
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                        if (xmlhttp.responseText == '1'){
                        document.getElementById('new_total_vote' + poemId).innerHTML = newTotalVote;
                                document.getElementById('new_total_voter' + poemId).innerHTML = newTotalVoter;
    //                                                                var num = newAverageVote;
                                document.getElementById('new_average_vote' + poemId).innerHTML = newAverageVote.toFixed(2);
                                alert('thank you for voteing');
                        } else if (xmlhttp.responseText == '2'){
                        alert("You can't give second time vote!");
                        } else if (xmlhttp.responseText == '3'){
                        window.location.assign("<?php echo base_url(); ?>poems/login");
                        }

                        }
                        }
                xmlhttp.send(null);                                  }
                                                </script>
                                                <!-- end function save reply!-->  

                                                <!--                                                
                                                                                                <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/save_votes_trending1" method="post">
                                                                                                    <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $row->user_id ?>" />
                                                                                                    <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $row->poem_id ?>" />
                                                                                                    <input type="hidden" id="ip" name="ip" size="50" value="" maxlength="180">-->
                                                                                                                                                                                                            <!--<input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />-->
                                                <div class="poll2" align="center">
                                                    <div  class="rating_message" style="height:15px;color: #555; "></div> 
                                                    <h3 style="color:  steelblue; font: normal 15px/15px 'Josefin Slab',Georgia; text-shadow: 1px 1px 1px #fff; display: block; position: relative; ">Rate The Poem</h3>  
                                                    <div  id="star-holder">
                                                        <div  class="simpleRatings">
                                                            <div  style="margin: 3px 0px 0px 0px;"  class="starsmediumorange">

                                                                <input title="1" type="a" name="poem_vote" value="1" class="stars1" onclick="saveVote('<?php echo $row->Average_vote; ?>', '1', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);" />
                                                                <span class="tip"> star rating: Poor</span>
                                                                <input title="2" type="submit" name="poem_vote" value="2" class="stars2" onclick="saveVote('<?php echo $row->Average_vote; ?>', '2', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);"/>
                                                                <span class="tip"> star rating: Average</span>
                                                                <input autofocus="" title="3" type="submit" name="poem_vote" value="3" class="stars3" onclick="saveVote('<?php echo $row->Average_vote; ?>', '3', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);" />
                                                                <span class="tip"> star rating: Good</span>
                                                                <input title="4" type="submit" name="poem_vote" value="4" class="stars4" onclick="saveVote('<?php echo $row->Average_vote; ?>', '4', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);"/>
                                                                <span class="tip"> star rating: Very Good</span>
                                                                <input title="5" type="submit" name="poem_vote" value="5" class="stars5" onclick="saveVote('<?php echo $row->Average_vote; ?>', '5', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);" />
                                                                <span class="tip"> star rating: Excellent</span>

                                                                <input title="6" type="submit" autofocus="" name="poem_vote" value="6" class="stars6" onclick="saveVote('<?php echo $row->Average_vote; ?>', '6', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);" />
                                                                <span class="tip"> star rating: Poor</span>
                                                                <input title="7" type="submit" name="poem_vote" value="7" class="stars7" onclick="saveVote('<?php echo $row->Average_vote; ?>', '7', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);"/>
                                                                <span class="tip"> star rating: Average</span>
                                                                <input title="8" type="submit" name="poem_vote" value="8" class="stars8" onclick="saveVote('<?php echo $row->Average_vote; ?>', '8', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);"/>
                                                                <span class="tip"> star rating: Good</span>
                                                                <input title="9" type="submit" name="poem_vote" value="9" class="stars9" onclick="saveVote('<?php echo $row->Average_vote; ?>', '9', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);" />
                                                                <span class="tip"> star rating: Very Good</span>
                                                                <input title="10" type="submit" name="poem_vote" value="10" class="stars10" onclick="saveVote('<?php echo $row->Average_vote; ?>', '10', '<?php echo $row->total_vote; ?>', '<?php echo $row->total_voter; ?>',<?php echo $row->poem_id; ?>,<?php echo $row->user_id; ?>);"/>
                                                                <span class="tip"> star rating: Excellent</span>
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--</form>-->
                                                <!--star rating end-->

                                            </div>
                                            <div style="float: left;  margin: 35px 0px 0px 5px;">
                                                <div title="Avarage Vote Rate Of The Poem." style="width: auto; height: 9px; color: #555;">
                                                    <span style="float: left; margin:0px 10px 5px 0px;  font: normal 15px/15px 'Josefin Slab',Georgia; color: #333; text-shadow: 1px 1px 1px #fff; display: block; position: relative; ">Rating:</span>

                                                    <!--this div for average rating -->
                                                    <strong style="font:normal 15px/15px sans-serif;">
                                                        <b  id="new_average_vote<?php echo $row->poem_id; ?>" 
                                                            style="color:  tomato; "><?php echo $row->Average_vote; ?></b>/10
                                                    </strong>

                                                    <!--this div for total voter-->
                                                    <strong style="font:normal 15px/15px sans-serif;">
                                                        (<b id="new_total_voter<?php echo $row->poem_id; ?>" 
                                                            style="color: tomato; font:normal 14px/14px sans-serif;">                                                            
    <?php echo $row->total_voter; ?></b> votes cast)
                                                    </strong>.                                                   
                                                </div>
                                            </div>
                                            <div id="poem_social_link">
                                            </div>
                                        </div>
                                        <!---rate poem end !-->

                                        <hr style=" float: left; display: block; width: 95%; border: #ddd dotted 1px ;">
                                        <!--- Comments Insert and view javascript start !-->

                                        <script lang="javascript">
                                                    var xmlhttp = false;
                                                    //Check if we are using IE.
                                                    try {
                                                    //If the Javascript version is greater than 5.
                                                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                                                            //alert ("You are using Microsoft Internet Explorer.");
                                                    } catch (e) {

                                            //If not, then use the older active x object.
                                            try {
                                            //If we are using Internet Explorer.
                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    //alert ("You are using Microsoft Internet Explorer");
                                            } catch (E) {
                                            //Else we must be using a non-IE browser.
                                            xmlhttp = false;
                                            }
                                            }
                                            //If we are using a non-IE browser, create a javascript instance of the object.
                                            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                                            xmlhttp = new XMLHttpRequest();
                                                    //alert ("You are not using Microsoft Internet Explorer");
                                            }

                                            function saveComment(comment, poemId, userId, objId, totalComments, totalCommentsId) {
    //                                                    alert(comment);
                                            var node = document.getElementById(objId);
                                                    var newNode = document.createElement("div");
    //                                                var encoded = encodeURIComponent(str);
                                                    var id = 'result' + Math.random();
                                                    newNode.setAttribute("id", id);
                                                    serverPage = '<?php echo base_url(); ?>user_admin_controller/save_comment/' + comment + '/' + poemId + '/' + userId;
                                                    xmlhttp.open("GET", serverPage);
                                                    xmlhttp.onreadystatechange = function()
                                                    {
                                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                                                    {
    //                                                            alert(xmlhttp.responseText);
                                                    node.appendChild(newNode);
                                                            document.getElementById(totalCommentsId).innerHTML = Number(totalComments) + 1;
                                                            document.getElementById(id).innerHTML = unescape(xmlhttp.responseText);
                                                    }
                                                    }
                                            xmlhttp.send(null);
                                            }
                                        </script>
                                        <!-- end function save comment!-->

                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%;    background-color: whitesmoke;">
                                            <div id="poem_comments">  
                                                <div style=" text-align: left; margin : 7px 0px 0px 0px;">
    <?php $comment_of = 'comment' . $row->poem_id; ?>
                                                    <?php
                                                    $user_id = $this->session->userdata('user_id');
                                                    if ($user_id > 0) {
                                                        ?>
                                                        <textarea placeholder="Write a comment" title="Write a comment" name="comments" id="<?php echo $comment_of; ?>" style="float: left; height: 95px; width: 451px; border-radius: 7px; display: block; position: relative; outline: none;"></textarea><br><br><br><br><br><br>
                                                        <button title="Click for comment post" type="button" style="float: left; font:  bold 15px/15px 'Josefin Slab',Georgia; text-shadow: 1px 1px 1px #fff; display: block; position: relative; height: 29px; width: 91px; border-radius: 7px; outline: none;" name="button" 
                                                                onclick="saveComment(<?php echo $comment_of . '.value'; ?>, <?php echo $row->poem_id; ?>, <?php echo $row->user_id; ?>, '<?php echo $comment_of . 'result'; ?>', '<?php echo $row->total_comments; ?>', '<?php echo 'new_total_comments' . $row->poem_id; ?>');">
                                                            Post</button>
    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--- Comments Insert end !--> 

                                        <!--<hr style=" float: left; display: block; width: 95%; border: #ddd dotted 1px ;">-->  

                                        <div id="<?php echo $comment_of . 'result'; ?>" style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%;"> </div>
                                        <!--- Comments view in div by ajax end !-->

                                        <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%;">

                                            <!--- Comments view from database start !-->
    <?php foreach ($comments[$row->poem_id] as $v_comments) { ?>
                                                <div style="float: left; min-height: 50px; width: 473px; margin: 3px 0px 0px 0px;">
                                                    <div style="float: left; min-height: 50px; border-radius: 100%; width: 50px; ">
                                                        <img  height="50px" width="50px" style=" float: left; margin: 0px 7px 0px 0px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $v_comments->picture_small; ?>"/>
                                                    </div>
                                                    <div style="float: left; min-height: 50px;  width: 423px; ">
                                                        <div style="float:left; height: 31px; width: 423px;">
                                                            <div style="float: left;   text-align: justify; font: normal 15px/15px 'Josefin Slab',Georgia; color:  firebrick;   margin: 3px 0px 0px 12px; text-shadow: 1px 1px 1px #fff; display: block; position: relative;"> <?php echo $v_comments->name . '</br>'; ?></div> 
                                                            <div style="float: left; min-height: 50px;  width: auto; margin: 3px 0px 0px 0px; ">
                                                                <div style="float: left; margin: 3px 0px 0px 5px;  text-align: justify;   font: normal 13px/13px 'Josefin Slab',Georgia; color: #999; text-shadow: 1px 1px 1px #fff; display: block; position: relative; ">
        <?php
        $cls_date = new DateTime($v_comments->comments_post_date);
        echo $cls_date->format('M d Y');
        ?>
                                                                </div>
                                                            </div> 

                                                            <!--- reply text drew with comments id !--> 
                                                            <script>
                                                                        $(document).ready(function() {
                                                                $("#b<?php echo $v_comments->comments_id; ?>").click(function() {
                                                                $("#a<?php echo $v_comments->comments_id; ?>").slideDown(500);
                                                                });
                                                                });</script>                                                                                                                                                    <!--<a href="javascript:dispHandle(<?php echo $v_comments->comments_id; ?>)">Hide Show</a>-->
                                                            <style> 
                                                                #a<?php echo $v_comments->comments_id; ?>,#b<?php echo $v_comments->comments_id; ?>
                                                                {
                                                                }
                                                                #a<?php echo $v_comments->comments_id; ?>
                                                                {
                                                                    display:none;
                                                                }
                                                            </style>
        <?php
        $user_id = $this->session->userdata('user_id');
        if ($user_id > 0) {
            ?>
                                                                <div id="b<?php echo $v_comments->comments_id; ?>" style="float:right; height:25px; width: 55px; border:  #ddd solid 3px; border-radius: 31px; margin: 1px 0px 0px 0px;"><b style="float:left; margin: 5px 0px 0px 11px; color: #555; font: normal 13px/13px 'Josefin Slab',Georgia; cursor: pointer; ">Reply</b></div>                                                           
                                                            <?php } ?>
                                                        </div>
                                                        <div style="float: left;  font: normal 15px/15px 'Josefin Slab',Georgia; color: #333;  padding: 11px; text-align: justify; text-shadow: 1px 1px 1px #fff; display: block; position: relative; "> <?php echo rawurldecode($v_comments->comments); ?></div><br>  
                                                        <!--- Comments data view from data base end !-->

        <?php $reply_of = 'replyData' . $row->poem_id . $v_comments->comments_id; ?>
                                                                <script type="text/javascript">
                                                                //Create a boolean variable to check for a valid Internet Explorer instance.
                                                                        var xmlhttp = false;
                                                                        //Check if we are using IE.
                                                                        try {
                                                                        //If the Javascript version is greater than 5.
                                                                                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                                                                        //alert ("You are using Microsoft Internet Explorer.");
                                                                } catch (e) {

                                                                //If not, then use the older active x object.
                                                                try {
                                                                //If we are using Internet Explorer.
                                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                                //alert ("You are using Microsoft Internet Explorer");
                                                                } catch (E) {
                                                                //Else we must be using a non-IE browser.
                                                                xmlhttp = false;
                                                                }
                                                                }
                                                                //If we are using a non-IE browser, create a javascript instance of the object.
                                                                if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                                                               xmlhttp = new XMLHttpRequest(); //alert ("You are not using Microsoft Internet Explorer");
                                                                }
                                                                //<!--- browser validation end  --> 

                                                            function saveReply(comment, poemId, CommentsId, userId, objId) {
        //                                                                alert(comment);
                                                                var node = document.getElementById(objId);
                                                                var newNode = document.createElement("div");                                                                
                                                                var id = 'result' + Math.random();
                                                                newNode.setAttribute("id", id);
        //                                                                var encoded = encodeURIComponent(str);
                                                                serverPage = '<?php echo base_url(); ?>user_admin_controller/save_reply/' + comment + '/' + poemId + '/' + CommentsId + '/' + userId;
                                                                xmlhttp.open("GET", serverPage);
                                                                xmlhttp.onreadystatechange = function()
                                                                {
                                                                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                                                                    {
        //                                                                        alert(xmlhttp.responseText);
                                                                        node.appendChild(newNode);
                                                                        document.getElementById(id).innerHTML = xmlhttp.responseText;
                                                                    }
                                                                }
                                                                xmlhttp.send(null);
                                                            }
                                                        </script>
                                                        <!-- end function save reply!-->                                                        

                                                        <div id="a<?php echo $v_comments->comments_id; ?>">                                                            
        <?php $reply_of = 'replyData' . $row->poem_id . $v_comments->comments_id; ?>
                                                            <!--- comments id wise text drew end !-->

                                                            <textarea placeholder="Write a reply" title="Write a reply" name="<?php echo $reply_of; ?>" id="<?php echo 'replyData' . $row->poem_id . $v_comments->comments_id; ?>"  style="float: left; height: 65px; width: 381px; border-radius: 7px; display: block; position: relative; outline: none;"></textarea><br><br><br><br><br><br>
                                                            <button title="Click for reply post" type="button" style="float: left; font:  bold 13px/13px 'Josefin Slab',Georgia; text-shadow: 1px 1px 1px #fff; display: block; position: relative; height: 29px; width: 71px; border-radius: 7px; outline: none; margin-top: 11px;"
                                                                    name="button" onclick="saveReply(<?php echo $reply_of . '.value'; ?>, '<?php echo $row->poem_id; ?>', '<?php echo $v_comments->comments_id; ?>', '<?php echo $row->user_id; ?>', '<?php echo $reply_of . 'replyData'; ?>')
                                                                                        ;">Post</button>
                                                        </div>                                                        
                                                        <div id="<?php echo $reply_of . 'replyData'; ?>" style="float: left;  min-height: 75px; margin-top: 7px; width: 100%;"> 
                                                            <!--- reply view by ajax in div end !-->
        <?php foreach ($reply[$v_comments->poem_id][$v_comments->comments_id] as $reply_row) { ?>
                                                                <div style="float: left;  min-height: 75px; margin-top: 7px; width: 100%;">
                                                                    <div style="float: left; min-height: 50px; border-radius: 100%; width: 50px; ">
                                                                        <img  height="50px" width="50px" style=" float: left; margin: 0px 7px 0px 0px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $reply_row->picture_small; ?>"/>
                                                                    </div>
                                                                    <div style="float: left;   text-align: justify; font: normal 15px/15px 'Josefin Slab',Georgia; color:  firebrick;   margin: 3px 0px 0px 12px; text-shadow: 1px 1px 1px #fff; display: block; position: relative;"> <?php echo $reply_row->name . '</br>'; ?></div> 
                                                                    <div style="float: left; min-height: 50px;  width: auto; margin: 3px 0px 0px 0px; ">
                                                                        <div style="float: left; margin: 3px 0px 0px 5px;  text-align: justify;   font: normal 13px/13px 'Josefin Slab',Georgia; color: #999; text-shadow: 1px 1px 1px #fff; display: block; position: relative; ">
            <?php
            $cls_date = new DateTime($reply_row->reply_date);
            echo $cls_date->format('M d Y');
            ?>
                                                                        </div>
                                                                    </div>    
                                                                    <div style="float: left;  font: normal 15px/15px 'Josefin Slab',Georgia; color: #333; width: 70%;  padding: 11px; text-align: justify; text-shadow: 1px 1px 1px #fff; display: block; position: relative; "> <b style="float: left;font-weight:  normal; margin-left: 51px;"><?php echo rawurldecode($reply_row->reply_data) . '</br>'; ?></b></div><br>  
                                                                </div>    
        <?php } ?>
                                                            <hr style=" float: left; display: block; width: 95%; border: #ddd dotted 1px ;">                                    
                                                            <!--reply data view from database end -->
                                                        </div>
                                                        <!--- reply view by ajax end !-->
                                                    </div>
                                                </div>
    <?php } ?>                                  