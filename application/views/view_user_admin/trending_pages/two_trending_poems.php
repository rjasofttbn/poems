 
<?php foreach ($two_tranding_poem as $row) { ?>
    <div id="all_trending_poem_wrapper">
        <div id="image">
            <img  height="50px" width="50px" style=" float: left; margin: 3px 7px 0px 1px;   border-radius: 100px;"src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
            <div id="name">
                <a  style=" font: bold 13px/13px sans-serif; color: #333;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><b style="float: left; margin: 3px 3px 0px 0px;"></b><?php echo ucfirst($row->name); ?></a>
            </div>
            <div id="submit_date">
                <b style="float: left; margin-top:  11px;  font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->poem_submit_date", true); ?>.</b></br>
                <b style="float: left; margin: 3px 0px 0px 0px;"><div id="trending_page_image"></div></b>
                <b style="float: left;  margin-top:  11px; font-weight: normal; color: #555;"><?php echo get_time_difference_php("$row->trending_date", true); ?>.</b>
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
                    <li ><h2> <b style="font: normal 14px/14px sans-serif; color:#555;"><?php echo substr("$row->body", 0, 151); ?></b></h2>
                        <ul>
                            <li>
                                <b style="font: normal 14px/14px sans-serif; color: #555;"> <?php echo substr("$row->body", 151, 70000); ?></b>

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

                                <div style="float: left; min-height:73px; margin: 0px 0px 15px 0px;  width: 93%; box-shadow: 0px 1px 17px 1px silver;   background-color: whitesmoke;">
                                    <div id="poem_rate"> 
                                        <div id="poem_star">
                                            <div style="float: left; border-radius: 100%; padding: 3px; margin-left: 3px; height: 21; width: auto;  color: tomato;">
                                            </div>

                                            <!-- star rating start -->
                                            <form  enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/save_votes_trending1" method="post">
                                                <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $row->user_id ?>" />
                                                <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $row->poem_id ?>" />
                                                <input type="hidden" id="ip" name="ip" size="50" value="" maxlength="180">
                                                                                                                                                                                                    <!--<input type="hidden" name="poem_owner_id" size="30px" maxlength="20" value="<?php echo $poem_owner_id->poem_owner_id ?>" />-->
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
                                            <!-- star rating end -->
                                        </div>
                                        <div id="poem_social_link">
                                        </div>
                                    </div><!---rate poem end !-->
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>