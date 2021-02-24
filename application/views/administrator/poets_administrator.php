<div id ="home_administrator_content" >
    <div id ="home_menu" >
        <div id ="home_menu_insert" ><!-- control home page sub menu link start !-->
            <div id ="home_menu_insert_title" >
                Control Page's                
            </div>
            <div id ="administrator_menu_insert_home_link" >
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/add_in_poets_page.php" class="link">Poet's Page Advertise</a></li>                
            </div>

        </div>
<!--        <div id ="home_menu_update" >
            <div id ="home_menu_update_title" >
                Update Link
            </div>
            <div id ="administrator_menu_update_home_link">
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/home_poem_day_update.php" class="link">Poem of The Day</a></li>

                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/home_poem_day_member_update" class="link">Poem of The Day / Member</a></li>
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/home_poem_month_update.php" class="link">Poem of The Month</a></li>
            </div>
        </div>-->
    </div><!-- control home page sub menu link end !-->
    
    <div id ="home_content_administrator" >
        <?php echo $home_insert_update ?>
    </div>
</div>