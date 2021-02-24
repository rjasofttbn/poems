
<div id="poet_poem_search">

    <div id="poet_poem_banner_search">

    </div>

    <!--    <div id="poet_poem_result_title">
    
        </div>-->

    <div id="poet_poem_wrapper">
        <div id="heading">
            <div id="font">
                Search Result Below :
            </div>
        </div>
        <div id="data_title">
            <div id="poet_name_font">Name</div>
            <div id="poem_name_font">Poem</div>
            <div id="submit_date_font">Submit Date</div>
        </div>
        
        <div id="name_date">
            <?php foreach ($result as $result) { ?>
                <div id="poet_poem_result">
                    <div id="name">
                        <a style="float: left; color: #777; margin: 9px 0px 0px 7px; font: bold 13px/13px sans-serif;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $result->user_id; ?>" ><?php echo ltrim(ucfirst($result->first_name)); ?> <?php
                            $string_name = $result->last_name;

                            $new_string = trim($string_name);

                            echo $new_string;
                            ?></a>                    

                    </div>
                    <div id="title">          
                        <a style="float: left; color: #777; margin: 9px 0px 0px 7px; font: bold 13px/13px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $result->poem_id; ?>"><?php echo ltrim($result->title); ?></a>
                    </div> 
                    <div id="submit_date">
                        <b style="float:right; text-align: center; margin: 9px 7px 0px 0px; color: #666; font: bold 13px/13px sans-serif;"><?php echo $result->poem_submit_date ?></b> 
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>
    <!--    <div id="poet_poem_result_name">
            <div id="poet_poem_result_name_font">
    
        <li style="font-size: 14px;"><a href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $result->user_id; ?>" ><?php echo $result->aboutP; ?></a></li><!-- link with poems detail  !
    
            </div>
        </div>-->
</div>