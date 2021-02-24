

<!-- 

Develop date and time: .
Objective of this page: .
controller name : 
model name : .
tabel name: tbl_.
css: administrator.css.
mother page and menu name:  page and menu .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        




<h2 style="text-align: left; margin-left: 5px">Poem's data control</h2> 

<div id ="home_administrator_content" >
    <div id ="home_menu" >
        <div id ="home_menu_insert" ><!-- control home page sub menu link start !-->
            <div id ="home_menu_insert_title" >
                Control Page's                
            </div>
            <div id ="administrator_menu_insert_home_link" >
                <!--<li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/user_show.php" class="link">User Control</a></li>
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/poem_show.php" class="link">Poem Control</a></li>
                              
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/user_type.php" class="link">User Type</a></li>!-->
                <li style="color: #0000ff"><a  class="addOne" href="<?php echo base_url(); ?>administrator_controller/add_in_poem_page.php" class="link">Poem Page Advertise</a></li>
                                
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/poem_view_for_tranding.php" class="link">Trending Poem's</a></li>
                
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/poem_select_for_day.php" class="link">Poem of The Day</a></li>
                
                 <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/poem_select_for_member.php" class="link">Poem of Day Member</a></li>
                
                <li style="color: #0000ff; "><a href="<?php echo base_url(); ?>administrator_controller/poem_select_for_month.php" class="link">Poem of The Month</a></li>
                <hr style="width: 80%">
                <li style="color: #0000ff"><a href="<?php echo base_url(); ?>administrator_controller/selected_trending_poems.php" class="link">Selected Trending Poem</a></li>
                <li style="color: #0000ff; font-size: 14px;"><a href="<?php echo base_url(); ?>administrator_controller/select_last_fiften_poem_of_day.php" class="link">Selected Poem of The Day</a></li>
                <li style="color: #0000ff; "><a href="<?php echo base_url(); ?>administrator_controller/selected_poem_of_day_member.php" class="link">Selected Poem Member</a></li>
                <li style="color: #0000ff; "><a href="<?php echo base_url(); ?>administrator_controller/selected_poem_of_month.php" onclick="" class="link">Selected Poem Month</a></li>
                </br>
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

  