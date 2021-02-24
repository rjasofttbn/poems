
<!-- 

develop date and time: 17.07.2014.

Objective of this page: Add control.

controller name:Administrator controller. 

model name : Administrator Model.

tabel name: Advertise.

css: administrator.css.

mother page and menu name:  Poetry Contest .

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        


<h1 style="text-align: left; margin-left: 5px; color:  #6666ff;">Poetry Contest page</h1> 

<div id ="poetry_contest_content" >
    <div id ="contest_menu" >
        <div id ="contest_menu_insert" >
            <div id="contest_menu_insert_caption">Control Page's</div>
            <div id="contest_insert_content_menu">
                <li style="color: #333; ; margin: 21px 0px 0px 3px;"><a style="color: #333;" href="<?php echo base_url(); ?>administrator_controller/poetry_contest_add.php" class="link">Contest advertise</a></li>
                <li style="color: #333; ; margin: 21px 0px 0px 3px;"><a style="color: #333;" href="<?php echo base_url(); ?>administrator_controller/poetry_contest_page.php" class="link">Contest date Insert</a></li>
                <li style="color: #333; ; margin: 21px 0px 0px 3px;"><a style="color: #333;" href="<?php echo base_url(); ?>administrator_controller/selected_poetry_contest.php" class="link">Selected poetry contest</a></li>
            </div>
        </div>        
    </div>
    <div id ="contest_home_content" >
        <?php echo $poetry_contest ?>
    </div>

</div>