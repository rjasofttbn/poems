<div id="poets_personal_biography">
    <div id="poets_personal_biography_font">

        <?php
        foreach ($poet_picture as $poet_picture) {
            ?>
            <?php echo ucfirst(substr("$poet_picture->biography", 0, 600)); ?>  <a style="font-weight: bold; text-decoration: underline; color:  #660033;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poet_picture->user_id; ?>" >more »</a>           
        <?php } ?>

    </div>
    <div id="biography_details">
        <div id="biography_details_font">

        </div>
    </div>
</div>