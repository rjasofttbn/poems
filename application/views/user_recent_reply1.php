<?php
for ($i = 1; $i <= $count; $i++) { {
        ?>
        <div style="float: left; min-height: 50px; width: 473px; margin: 31px 0px 0px 0px;">
            <div style="float: left; min-height: 50px; border-radius: 100%; width: 50px; ">
                <img  height="50px" width="50px" style=" float: left; margin: 0px 7px 0px 0px; border-radius: 100px;"src="<?php echo base_url() ?><?php echo $userinfo->picture_small; ?>"/>
            </div>
            <div style="float: left; min-height: 50px;  width: 423px; ">
                <div style="float:left; height: 31px; width: 423px;">
                    <div style="float: left;   text-align: justify; font: normal 15px/15px 'Josefin Slab',Georgia; color:  firebrick;   margin: 3px 0px 0px 12px; text-shadow: 1px 1px 1px #fff; display: block; position: relative;"> <?php echo $userinfo->name . '</br>'; ?></div> 
                    <div style="float: left; min-height: 50px;  width: auto; margin: 3px 0px 0px 0px; ">
                        <div style="float: left; margin: 3px 0px 0px 5px;  text-align: justify;   font: normal 13px/13px 'Josefin Slab',Georgia; color: #999; text-shadow: 1px 1px 1px #fff; display: block; position: relative; ">
                            <?php
                            echo date('M d Y');
                            ?>
                        </div>
                    </div>  
                </div>
                <div style="float: left;  font: normal 15px/15px 'Josefin Slab',Georgia; color: #333;  padding: 11px; text-align: justify; text-shadow: 1px 1px 1px #fff; display: block; position: relative; "> <?php
                    echo $this->session->userdata('recent_all_reply' . $i);
                    '</br>';
                    ?></div><br>  
            </div>
        </div>
        <?php
    }
}?>