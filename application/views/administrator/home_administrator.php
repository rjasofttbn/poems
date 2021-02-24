
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


<h2 style="text-align: left; margin-left: 5px">Control</h2> 

<div id ="home_administrator_content" >
    <div id ="home_menu" >
        <div id ="home_menu_insert" ><!-- control home page sub menu link start !-->
            <div id ="home_menu_insert_title" >
                Control Pages                
            </div>
            <div id ="administrator_menu_insert_home_link" >
                <li style="color: burlywood"><a href="<?php echo base_url(); ?>administrator_controller/user_show.php" class="link">User Control</a></li>
                <li style="color: burlywood"><a href="<?php echo base_url(); ?>administrator_controller/poem_show.php" class="link">Poem Control</a></li>
                <li style="color: burlywood"><a href="<?php echo base_url(); ?>administrator_controller/add_in_application.php" class="link">Home Advertise</a></li>
                <li style="color: burlywood"><a href="<?php echo base_url(); ?>administrator_controller/category_poems.php" class="link">Poems Category</a></li>
                <li style="color: burlywood"><a href="<?php echo base_url(); ?>administrator_controller/user_type.php" class="link">User Type</a></li>
            </div>

        </div>
        
        
        
        <!--<div id ="home_menu_update" >-->
<!--            <div id ="home_menu_update_title" >
                Update Link
            </div>
            <div id ="administrator_menu_update_home_link">
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/home_poem_day_update.php" class="link">Poem of The Day</a></li>

                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/home_poem_day_member_update" class="link">Poem of The Day / Member</a></li>
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/home_poem_month_update.php" class="link">Poem of The Month</a></li>
            </div>-->
        <!--</div>-->
    </div><!-- control home page sub menu link end !-->
    
    <div id ="home_content_administrator" >
        <?php echo $home_insert_update ?>
    </div>
</div>