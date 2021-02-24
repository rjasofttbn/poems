
<!-- 

Develop date and time: .
Objective of this page: home page data control.
controller name : 
model name : .
tabel name: tbl_.
css: administrator.css.
mother page and menu name: administrator page and home menu .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        

<div id ="member_info_content" >
    <div id ="member_info_menu" >
        <div id="title"><div id="value">Menu</div></div>
        <div id ="left_menu_member_info" ><!-- control home page sub menu link start !-->

            <div id ="administrator_menu_insert_home_link" >
                <li style="  list-style:  none; "><a style="color: #444; font-weight: bold; " href="<?php echo base_url(); ?>user_admin_controller/inbox_data_show.php"  class="link"><div id="menu_message">Inbox</div></a>
                    <?php foreach ($inbox as $row) { ?>
                        <b style="color: #777;">(<?php echo $row->user_id; ?>)</b> <?php } ?></li>
<!--                
 </li>&nbsp; &nbsp;<div style=" float: left; height: auto; width: 11px; border-radius: 20%; background-color: tomato; color: white;"></br>-->

                
                <li style="list-style:  none;"><a style=" color: #444; font-weight: bold;" href="<?php echo base_url(); ?>user_admin_controller/send_mail_data_title.php" class="link"><div id="menu_message">Sent Message</div></a>
                    <?php foreach ($send as $row) { ?><b style="color: #777;">(<?php echo $row->send_id; ?>)</b>                
                    <?php } ?></li>

                <!--<li style="list-style:  none;"><a style=" color: #444; font-weight: bold;" href="<?php echo base_url(); ?>user_admin_controller/profile_edit.php" class="link"><div id="menu_message">Draft</div></a></li>&nbsp;-->
                <li style="list-style:  none;"><a style=" color: #444; font-weight: bold;" href="<?php echo base_url(); ?>user_admin_controller/profile_edit.php"" class="link"><div id="menu_message">Profile</div></a></li>&nbsp;
                <li style="list-style:  none; "><a style=" color: #444; font-weight: bold;" href="<?php echo base_url(); ?>" class="link"><div id="menu_message">Help</div></a></li>
            </div>

        </div>

    </div><!--<?php echo $member_info ?> control home page sub menu link end !-->

    <div id ="message_detail_view" >
        <!--        How is it ???-->
        <?php echo $inbox_data ?> 
    </div>
</div>