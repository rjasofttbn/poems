
<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>   
</div> 
<!--<div id="new_poets_caption">
    Poet's
</div>  -->

<div id="new_poets_Page_title">
    <div id="font">
        Poet's
    </div>    
</div>
<div id="new_poets"> 
    <div id="new_poets_to_registration_batton">
        <div id="new_poets_registration_batton">
            <div id="poets_registration_batton_font">
                <a  style="color: tomato;" href="<?php echo base_url(); ?>welcome/signup.php" id="active">New Registration</br>
                    and Publish Your Poems</br>
                    On www.poetsfelling.com</a>                  
            </div> 
        </div> 
        <div id="new_poetss">
            <div id="new_poetss_caption">
                <div id="new_poetss_caption_font">
                    New Poet's
                </div>
            </div> 
            <div style="height: auto; background-color: red; margin-top: 1px;">
                <?php
                $cnt = 1;      //<!-- Sl no start !-->
                foreach ($last_poets_view as $last_poets_view) {
                    ?>     
                    <div id="new_poets_to_sl_no_wrapper">
                        <div id="new_poets_sl_no"><?php
                            echo $cnt;
                            $cnt++;
                            ?>. </div>  <!-- Sl no end !-->
                        <div id="new_poets_name_poem_data">
                            <p><a  style=" font-weight:  normal;  color: indianred; font-size: 13px; font-family: cursive" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $last_poets_view->name; ?>" ><?php echo ucfirst($last_poets_view->name); ?></a></p> &nbsp &nbsp<!-- link with poems detail  !-->
                        </div>

                        <div id="new_poets_totalpoem_data">
                            <div id="new_poets_totalpoem_data_font">
                                (<?php echo $last_poets_view->totalpoem; ?>&nbsp;poem)
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            </div>
            <form >                 
                <a style="float:left;
                   height:  28px;
                   width: 160px;
                   background-color:  whitesmoke  ; 
                   color:tomato;

                   box-shadow:0px 0px 0px 1px silver  ; /* add shadow */
                   margin:  15px 7px 11px 47px;" href=" <?php echo base_url(); ?>welcome/all_new_poets_page.php" class="link"><div id="all_new_poets_page_batton_font">All New Poets »</div></a>

            </form>
        </div> 

        <div id="poets_page_first_add">
            <?php
            foreach ($poets_add as $poets_add) {
                ?> 
                <img style="height: 250px; width: 276px;" src="<?php echo base_url() ?><?php echo $poets_add->poets_page_first_add; ?>"/>
            <?php } ?>
        </div>

        <div id="poets_page_poet_about">

        </div>

        <div id="poets_page_second_add">
            <img style="height: 247px; width: 273px; margin: 1px 1px 0px 0px;" src="<?php echo base_url() ?><?php echo $poets_second_add->poets_page_second_add; ?>"/> 
        </div>

    </div>

    <div id="poets_popular">       
        <div id="popular_poets_title">
            <div id="popular_poets_title_font">
                Popular Poet's
            </div>
        </div>
        <div style="float: left; height: 835px; background-color: whitesmoke; margin-top: 1px;">
            <?php if (count($result) > 0) { ?>

                <?php
                $i = $this->uri->segment(3);
                if ($i == NULL) {
                    $i = 0;
                } foreach ($result as $row) {
                    $i++;
                    ?>

                    <div id="all_new_poets_sl_no_to_image">
                        <div id="all_new_poets_sl_no"><?php echo $i; ?>.</div>  <!-- Sl no end !-->
                        <div id="all_new_poets_name_poem_data">
                            <p><a style="  text-align: left;  color: indianred; font: normal 14px/14px sans-serif;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>" ><?php echo ucfirst($row->name); ?></a></p> &nbsp &nbsp<!-- link with poems detail  !-->
                        </div>
                        <div id="all_new_poets_totalpoem_data">
                            <div id="all_new_poets_totalpoem_data_font">
                                (<?php echo $row->totalpoem; ?>&nbsp;poem)
                            </div>
                        </div>
                        <div id="all_new_poets_image_data">   
                            <?php if (!empty($row->picture_small)) { ?>
                            <img height="50" width="50" style="border-radius: 100%;" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>                        
                            <?php } else { ?>
                             <img title="" height="50px" width="50px" style="margin: 0px 0px 0px 0px; border-radius: 100%;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    

                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php echo $this->pagination->create_links(); ?>
        </div>
        <!-- <div id="all_new_poets_pagination">
             <div id="all_new_poets_page_batton_font">
                 
             </div>!-->

        <div id="popular_poets_bottom_batton">
            <div id="popular_poets_bottom_batton_font">
                <a style="color: tomato;" href="" title="The Complete List of Top 500 Poets" class="more-link">The Complete List of Top 500 Poets &raquo;</a>
            </div>
        </div>
    </div> 
</div> 
</div> 



