

<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>   
</div> 


<div id="new_poets_caption">
    Send Message
</div>  
<div id="famous_poems">  
    <div id="left">  
        <div id="caption">
            <div style="margin: 11px 0px 0px 45px; text-align: left; font-size: 21px; color:  darkblue ;">
                <b>Poet'sFeeling.com</b>
            </div>
        </div>
        <div style=" float: left; text-align: left; height: 238px; 
             border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;
             border-width: 1px;
             border-style: solid;
             border-color: steelblue;
             width: 261px; background-color: #D0D0D0 ; padding: 5px; margin-left: 1px; ">
            <ul >
                » &nbsp; <a href="" title="About Us">About Us</a><br>
                »  &nbsp; <a href="" title="Copyright Notice">Copyright Notice</a><br>
                »  &nbsp; <a href="" title="Privacy Statement">Privacy Statement</a><br>
                » &nbsp;  <a href="" title="Contact Us">Contact Us</a><br>
                » &nbsp;  <a href="" title="Help">Help</a>
            </ul>
        </div>

        <div> <?php foreach ($home_add_small as $row) { ?>
                <img style="padding-top:  11px; box-shadow:0px 0px 21px 01px   gray ;  " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/><!-- link with poems detail  !-->
            <?php } ?>
        </div> 
    </div>
    <div id="content">
        <div id="send_message_banner_f">
            <div id="banner_caption">
                <!--<b style="margin-top: 3px; color: darkblue;">Contact With Admin</b>-->
            </div>
        </div>

        <div id="send_message">
<!--            <div style=" float: center; text-align: center; height: auto; width:  170px; border-radius: 100px; box-shadow: 0px 0px 31px 0px black; margin: 0px 0px 0px 250px; " >
                <?php
                $message = $this->session->userdata('message');
                if ($message) {
                   echo $message;
                    $this->session->unset_userdata('message');
                }
                ?>
            </div>-->
            <div style=" padding: 21px;  font-weight:  bold; color: #990000;  margin:  0px 0px 11px 0px;"></div>

                             
                     
            <!--<form name="signup" enctype="multipart/form-data"  action="http://localhost:80/poems/welcome/saveuser.php" method="post" onsubmit="return validateStandard(this);">-->
            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/send_message_poet/<?php echo $poets_id ?>" method="post">           

                <input type="hidden" name="poets_id" size="30px" maxlength="20" value="<?php echo $poets_id ?>" />
                <!-- poet's registration form connection end  !-->
                <div style="height: auto ; width: auto; margin:  0px 0px 11px 0px;"> <!-- this div for pic view start !-->
                    <?php
                    foreach ($poet_picture as $poet_picture) {
                        ?>
                        <img style="border-radius:  100px ;" height="70" width="70" src="<?php echo base_url() ?><?php echo $poet_picture->picture_small; ?>"/>
                    <?php } ?><br>
                    <b style="font: bold 17px/19px sans-serif;">To :</b> <b style=" font: bold 17px/19px musfiq; color:   brown;"> <?php echo ucfirst($poet_picture->name); ?></b>.

                </div>
                <table style="padding: 31px" align="center" border="0">
                    <tr>
                        <td style="text-align: left;  color: #444; font-weight: bold;">Subject : </td>
                        <td> 
                            <input  type="text" name="subject" placeholder="Subject" style="float: left;  text-align: center; height: 33px; width:350px;   border-radius: 7px; border-style: solid; border-width: 3px; border-color: #999; outline: none; margin:11px 0px 0px 0px;" size="30px" maxlength="" required="1" err="Please enter Subject" regexp="JSVAL_RX_ALPHA" /><span style="float: left;" class="required">*</span>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align: left;  color: #444; font-weight: bold;" >Message :</td>
                        <td >
                            <textarea placeholder="Message Content"  style=" border-radius: 9px; text-align: center; border-style: solid; border-width: 3px; border-color: #999; outline: none; text-align: left; " required="1" err="Please enter data" regexp="JSVAL_RX_ALPHA" name="message_detail" cols="54" rows="13" ></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                    </tr>
                </table>

                <div style=" float: left; text-align: left; margin-left: 140px;  " >
                    <input style=" float: left;cursor: pointer;  height: 41px; margin:  0px 0px 31px 0px; font: bold 13px/15px sans-serif; width: 155px;  border-radius: 100px; background-color:whitesmoke; color: #222; " type="submit" name="btnsave" value="Send Message" />
                
                 <!--<input style=" float: left; height: 41px; margin:  0px 0px 31px 0px; font: bold 13px/15px sans-serif; width: 155px;  border-radius: 100px; background-color:whitesmoke; color: #222; " type="submit" name="btnsdraft" value="Insert Draft" />-->
                </div>
                <!--<a href="<?php echo base_url(); ?>user_admin_controller/draft_data_insert/"> <div style=" float:  left;  height: 41px; width: 41px; background-color: #999; border-bottom-left-radius: 20%; border-style: solid; border-width: 3px; border-color:  #555; border-top: none; border-bottom-right-radius: 20%; margin: 0px 0px 0px 150px;"><b style="padding-top: 31px; margin-top: 121px; color: whitesmoke;">Draft</b></div>  </a>-->
            </form>
            <!--<form action="" method="">-->
<!--             <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/draft_data_insert/" method="post">               
                 <input style=" float: left; height: 41px; margin:  0px 0px 31px 0px; font: bold 13px/15px sans-serif; width: 155px;  border-radius: 100px; background-color:whitesmoke; color: #222; " type="submit" name="btnsave" value="Insert Draft" />
                <a href="<?php echo base_url(); ?>user_admin_controller/draft_data_insert/"> <div style=" float:  left;  height: 41px; width: 41px; background-color: #999; border-bottom-left-radius: 20%; border-style: solid; border-width: 3px; border-color:  #555; border-top: none; border-bottom-right-radius: 20%; margin: 0px 0px 0px 150px;"><b style="padding-top: 31px; margin-top: 121px; color: whitesmoke;">Draft</b></div>  </a>
            </form>-->

        </div>

    </div> 
</div> 

