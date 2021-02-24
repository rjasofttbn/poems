

<!-- this code for all new poets view !-->


<!-- local css connection start !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<!-- local css connection end !-->


<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>

        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>

    <?php } ?>   
</div> 

<div id="new_poets_Page_title">
    <div id="font">
        New Poet's
    </div>    
</div>  


<div id="new_poet_page">
    <div id="left">
        <div id="link">

            <div id="title">
                <a  href="<?php echo base_url(); ?>poems/login.php" id="active"><b style=" float: left; margin: 9px 0px 0px 43px; color: #B57340;">MANAGE</br> YOUR POEMS</b></a>
            </div>
            <div id="menu" > 
                <div id="font">
                    <ul style=" text-align: left;">
                        <li style="color:  #333;"><a style="color:  #333;" title="Classical Poems" href="">Classical Poems</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="Top Poems" href="">Top Poems</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="Top Poems" href="">Topics - Top Poems</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="Random Poem" href="">Poem of the Day</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="New Poems" href=" <?php echo base_url(); ?>welcome/all_poems_view_mains.php">New Poems</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="Random Poem" href="">Random Poem</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="Poems About" href="">Poems About</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="My Poems" href="">My Poems</a></li>
                        <li style="color:  #333;"><a style="color:  #333;" title="Popular Poets in Turkey" href="">My Favourite Poems</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
    <div id="right">
        <div id="title">
            <div id="title_name">Name</div>
            <div id="title_poem">Total Poem</div>
        </div>
        <div id="data">
             <?php if (count($result) > 0) { ?>
                <?php
                $i = $this->uri->segment(3);
                if ($i == NULL) {
                    $i = 0;
                }     //<!-- Sl no start !-->
                foreach ($result as $all_poets_view) {
                    $i++;
                    ?>     
                    <div id="all_new_poets_sl_no_to_image">
                        <div id="all_new_poets_sl_no"><?php echo $i; ?>. </div>  <!-- Sl no end !-->
                        <div id="all_new_poets_name_poem_data">
                            <p><a style="  text-align: left; color: indianred; font: normal 14px/14px sans-serif; " href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $all_poets_view->name; ?>" ><?php echo $all_poets_view->name; ?></a></p> &nbsp &nbsp<!-- link with poems detail  !-->
                        </div>
                        <div id="all_new_poets_totalpoem_data">
                            <div id="all_new_poets_totalpoem_data_font">
                                (&nbsp;<?php echo $all_poets_view->totalpoem; ?>&nbsp;poem&nbsp;)
                            </div>
                        </div>
                        <div id="all_new_poets_image_data">                                                   
                            <img height="50" width="50" src="<?php echo base_url() ?><?php echo $all_poets_view->picture_small; ?>"/>                        
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>

</div>

