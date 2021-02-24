
<!-- 

Develop date and time: .
Objective of this page: home page data control.
controller name : 
model name : .
tabel name: .
css: administrator.css.
mother page and menu name: administrator page and home menu.

!-->

<link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        

<!-- front end for administrator poems !-->

<div id="administrator">
    <div style="text-align:left; margin: 0px 0px 0px 3px; color:  #6666ff; " id="administrator_caption">
        <h1>Administrator</h1>    
    </div>
    <div id="administrator_content"><!-- administrator menu link !-->
        <div id="menus">
            <ul>
                <li><a href="<?php echo base_url(); ?>administrator_controller/home_administrator.php">Home</a></li>
                <li>
                    <a href="<?php echo base_url(); ?>administrator_controller/poets_administrator.php">Poets</a>                
                </li>
                <li><a href="<?php echo base_url(); ?>administrator_controller/poems_administrator.php">Poems</a></li>
                <li><a href="<?php echo base_url(); ?>administrator_controller/poetry_contest_administrator.php">Poetry Contest</a></li>
                <li><a href="<?php echo base_url(); ?>administrator_controller/manage_poems_administrator.php">Manage Poem</a></li>               
            </ul>
        </div>
        <div id="content">       
            <?php echo $administrator_content; ?>
        </div>
    </div>
</div> 



