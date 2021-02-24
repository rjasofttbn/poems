<div style="width: 100%; min-height: 551px;  ">
    <div style="width: 50%; min-height: 451px; text-align: left; background-color: #eee; padding:10%; margin-left: 15%; border-radius: 5px;">
        <?php
        foreach ($poet_picture as $poet_picture) {
            ?>
            <?php if (!empty($poet_picture->biography)) { ?>
        <h3 style="color:  #7f612e; font: 19px/19px sans-serif;">Biography Of  &nbsp;<?php echo ucfirst("$poet_picture->name"); ?> </h3>
                <p style="float: left;  "> <?php echo ucfirst("$poet_picture->biography"); ?> </p>
            <?php } ?> 
        <?php } ?>
    </div>
</div>         