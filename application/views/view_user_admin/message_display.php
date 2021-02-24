<div style="height: auto; width: 760px;  border-radius: 7px;">
    <?php foreach ($message_detail_view as $data) { ?>

        <img style="  height:100px; width:100px; border-radius: 100%; " src="<?php echo base_url() ?><?php echo $data->user_pictures; ?>"/>
        <b style="font: bold 17px/19px sans-serif; color: #555;"> <?php echo ucfirst("$data->name")?>&nbsp;/<?php echo $data->country ?>/<?php echo ucfirst($data->city) ?>.</b></br></br>

        <div style="float: left; padding: 11px; text-align: left; color: #444;  width: 650px; background-color: whitesmoke;"><b style="font: bold 14px/15px sans-serif;">Subject :</b>  <b style=" font: normal 13px/14px sans-serif; color: #333;"><?php echo ucfirst($data->subject) ?>.</b></br></div> 
        <div style=" float: left; height: auto; padding: 11px; width: 650px; text-align:  justify; margin-top: 31px; background-color: whitesmoke;">

            <p>  <b style="color: #444; font: bold 14px/15px sans-serif;">Message Detail :</b>   <b style=" font: normal 13px/14px sans-serif; color: #333;"><?php echo ucfirst($data->message_detail) ?></b></br></p>

        </div>

        <div style="float: left; margin-top: 51px; padding: 13px; margin-bottom: 21px; font: bold 11px/13px sans-serif; color: #777;">
           <b style="color: #444; font: bold 14px/15px sans-serif;">Date : </b> <?php echo $data->message_date ?></br>
        </div>


    <?php } ?>

</div>
