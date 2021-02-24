

<link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>   
<b style="color:   coral;">Messages you receive from other members can be viewed on this page.</b><br>
<div id="message_title">
    <div id="caption" style="text-align: left; margin: 19px 0px 0px 7px; color: #B57340; ">From</div>

    <div id="caption" style="text-align: left; margin: 19px 0px 0px 21px; color: #B57340;  ">Subject</div>
    <div id="caption" style="text-align: left; margin: 19px 0px 0px 25px;  color: #B57340; ">Message Detail</div>
    <div id="caption" style="text-align: left; margin: 19px 0px 0px 159px;  color: #B57340; ">Sent</div>
    <!--<div id="caption" style="text-align: left; margin: 11px 0px 0px 159px; ">Read</div>-->
</div>
<?php foreach ($inbox_content as $row) { ?>
    <div  style="margin: 0px 0px 0px 10px; ">
        <a href="<?php echo base_url(); ?>user_admin_controller/message_detail/<?php echo $row->message_id; ?>"><div id="inbox_data_design">    
                <div style=" float: left; width: 154px; padding: 3px; margin: 11px 0px 0px 3px;"> <b style="font: normal 14px/16px sans-serif; color: tomato"><?php echo ucfirst(substr("$row->name", 0, 17)); ?></b></div>  
                <div style=" float: left; width: 160px; margin: 11px 0px 0px 0px;"><b style="font: normal 14px/16px sans-serif; color: #111;"><?php echo ucfirst(substr("$row->subject", 0, 19)); ?>-</b></div> 

                <div style=" float: left; width: 293px; margin: 11px 0px 0px 0px;"><b style="font: normal 14px/16px sans-serif; color: #111"><?php echo substr("$row->message_detail", 0, 41); ?></b> </div>
                <div style=" float: left; width: 140px; margin: 11px 0px 0px 0px;"><b style=" font: normal 14px/16px sans-serif; text-align: right;color: #111"><?php echo $row->message_date; ?></b>  </div> 
            </div></a></div>
<?php } ?>




