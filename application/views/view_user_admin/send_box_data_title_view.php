

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link> 
<b style="color:  coral">Messages you have sent to other members can be viewed on this page.</b>&nbsp;

<div id="message_title">
    <div id="caption" style="text-align: left; margin: 19px 0px 0px 7px;  ">To</div>

    <div id="caption" style="text-align: left; margin: 19px 0px 0px 17px; ">Subject</div>
    <div id="caption" style="text-align: left; margin: 19px 0px 0px 25px; ">Message Detail</div>
    <div id="caption" style="text-align: left; margin: 19px 0px 0px 159px; ">Sent</div>
    <!--<div id="caption" style="text-align: left; margin: 11px 0px 0px 159px; ">Read</div>-->
</div>


<?php foreach ($send_mail_title as $row) { ?>
    <div  style="margin: 0px 0px 0px 10px; ">
        <a href="<?php echo base_url(); ?>user_admin_controller/send_mail_detail/<?php echo $row->message_id; ?>"><div id="inbox_data_design">    
                <div style=" float: left; width: 157px; margin: 11px 0px 0px 3px;"> <b style="font: normal 14px/16px sans-serif; color:  tomato"><?php echo ucfirst(substr("$row->name", 0, 17)); ?></b></div>  
                <div style=" float: left; width: 160px; margin: 11px 0px 0px 0px;"><b style="font: normal 14px/16px sans-serif; color: #111;"><?php echo ucfirst(substr("$row->subject", 0, 19)); ?>-</b></div> 

                <div style=" float: left; width: 293px; margin: 11px 0px 0px 0px;"><b style="font: normal 14px/16px sans-serif; color: #111"><?php echo substr("$row->message_detail", 0, 37); ?></b> </div>
                <div style=" float: left; width: 141px; margin: 11px 0px 0px 0px;"><b style=" font: normal 14px/16px sans-serif; text-align: right;color: #111"><?php echo $row->message_date; ?></b>  </div> 
            </div></a>
    </div>
<?php } ?>
