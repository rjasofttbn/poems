<!-- 

Develop date and time:
Objective of this page: poet personal info view.
controller name : 
model name : 
tabel name:tbl_comments.
css:
mother page and menu name: poet_personal_info and comments.

!-->

<div id="poem_commant_page">
    <div id="poem_commant_captcha">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>poems/poet_comments_insert" method="post">           
            <!--<input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $poet_comments->user_id ?>" />-->

            <input type="hidden" name="poets_id" size="30px" maxlength="20" value="<?php echo $user_id ?>" />

            <div id="poet_poem_commant_caption">
                <b style="float: left; margin-left: 33px; color: #777;  ">Add a comment below.</b>
            </div>
            <tr>
                <td>
                    <textarea autofocus="" style="  outline:  none;  margin : 7px 0px 0px 0px; background-color:  #eee; border-style:   solid;  border-radius: 10px; border-color:   #CFCFCF; " name="comments_poet" required="21" rows="9" cols="75"></textarea>
                </td>
            </tr>
            <div id="poem_commant_captcha_tools">
                <input type="submit"  style=" float: right;  cursor: pointer; outline:  none; height:31px; border-color:none; margin : 15px 0px 0px 0px; color: #666; font:  bold 13px/13px sans-serif; background-color: whitesmoke; border-radius:13px;" value="Comment Submit" name="comment_submit" />                
            </div>
        </form>
    </div>
    <form>
        <!-- data view by loop start !-->
        <?php
        foreach ($poet_comments as $poet_comments) {
            ?>
            <div id="poet_poem_comments"> 
                <div id="poem_comments_name_date">  
                    <div id="poem_comments_picture_small">
                        <div style=" float: left; transform: translate(-35px,-29px); ">  <img style=" float:  left; border-radius:  100px ; transform: translate (-51px,-51px);border:  solid 7px whitesmoke; box-shadow:0px 1px 17px 0px  #333 ;" height="60" width="60" src="<?php echo base_url() ?><?php echo $poet_comments->picture_small; ?>"/></div>
                    </div>                     
                    <div style=" padding: 7px; margin: 11px 0px 0px 11px; ">
                        <div id="poem_comments_name">  
                            <?php echo ucfirst($poet_comments->name); ?></br></br>
                            <b style=" float: left; font: bold 11px/11px sans-serif; margin: 0px 0px 0px 0px;"> <?php echo $poet_comments->date_comments_poet; ?></b>
                        </div>

<!--                        <div id="poem_comments_date">
                            
                        </div>-->
                    </div>
                </div>
                <div id="poem_comments_font">
                    <p> 
                        <b style=" font: normal 13px/13px sans-serif;"> <?php echo ucfirst($poet_comments->comments_poet); ?></b>
                    </p>
                </div>
            </div>
        <?php } ?>
        <!-- data view by loop end !-->
</div> 
</form>