
<div style="float: left;  min-height: 75px; margin-top: 7px; width: 100%;">
    <div style="float: left; min-height: 50px; border-radius: 100%; width: 50px; ">
        <img  height="50px" width="50px" style=" float: left; margin: 0px 7px 0px 0px; border-radius: 100px;"src="<?php echo base_url().$userinfo->picture_small; ?>"/>
    </div>
    <div style="float: left;   text-align: justify; font: normal 15px/15px 'Josefin Slab',Georgia; color:  firebrick;   margin: 3px 0px 0px 12px; text-shadow: 1px 1px 1px #fff; display: block; position: relative;">
        <?php echo $userinfo->name . '</br>'; ?></div> 
    <div style="float: left; min-height: 50px;  width: auto; margin: 3px 0px 0px 0px; ">
        <div style="float: left; margin: 3px 0px 0px 5px;  text-align: justify;   font: normal 13px/13px 'Josefin Slab',Georgia; color: #999; text-shadow: 1px 1px 1px #fff; display: block; position: relative; ">
            <?php
            echo date('M d Y');
            ?>
        </div>
    </div>    
    <div style="float: left;  font: normal 15px/15px 'Josefin Slab',Georgia; color: #333; width: 70%;  padding: 11px; text-align: justify; text-shadow: 1px 1px 1px #fff; display: block; position: relative; "> <b style="float: left;font-weight:  normal; margin-left: 51px;"> 
            <?php echo $reply_data; ?></b></div><br>  
</div>    