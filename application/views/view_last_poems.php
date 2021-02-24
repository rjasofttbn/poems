

<!-- front end for last poems--!-->

<!-- poems_home.css start --!-->
<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="hot_poems">
    <?php foreach ($result as $aresult) { ?></br>
    <!-- front end for poems detail show --!-->
        <a href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $aresult->aboutP; ?>" ><?php echo $aresult->aboutP; ?></a>
    <?php } ?>            
</div>

