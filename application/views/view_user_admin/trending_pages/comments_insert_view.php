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
                                                        //alert ("You are using Microsoft Internet Explorer");                                                             } catch (E) {
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



                                                        <div id="<?php echo urldecode($reply_of . 'replyData'); ?>" style="float: left;  min-height: 75px; margin-top: 7px; width: 100%;"> 


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