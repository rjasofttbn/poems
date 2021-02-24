
<div id="add_up">

</div>
<div style="margin-top: 21px;">

</div>
<div id="famous_poet_total">
    <?php foreach ($member_poet_total as $row){ ?>
    
   
    <h1 style=" text-align: left; color: skyblue; ">Member Poet's :<b style="color: #B57430;"> ( <?php echo $row->member_poet; ?> )</b>.</h1>
     <?php } ?>
    <div id="left">
        <div id="poems_menu"> 
            <div id="title">
                <b style=" float: left; margin: 27px 0px 0px 27px; color: #333;">Poems Menus</b> 
            </div>
            <div id="menu" > 
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
    <div id="middle">
        <?php if (count($result) > 0) { ?>
            <?php
            $i = $this->uri->segment(3);
            if ($i == NULL) {
                $i = 0;
            } foreach ($result as $row) {
                $i++;
                ?>
                <div id="value">
                    <div id="serial_no">  
                        <?php echo $i; ?>.
                    </div>            
                    <div id="name">
                        <a title="Member Poet" style="font: normal 14px/14px sans-serif; color:tomato;" href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo substr("$row->name", 0, 101); ?>...</a>
                    </div>
                    <div id="picture">
                        <?php if (!empty($row->picture_small)){ ?>
                        
                        <img height="50px" width="50px" style=" margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url() ?><?php echo $row->picture_small; ?>"/>
                        <?php } else { ?>
                     <img title="" height="50px" width="50px" style=" margin: 2px 0px 0px 0px; border-radius:100px;" src="<?php echo base_url(); ?>/button_image/fixed_poet.JPG"/>                    
                        <?php }?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>

        <?php echo $this->pagination->create_links(); ?>
    </div>
    <div id="right">
        <div id="right_title">
            <div id="value">Member Poem's</div>
        </div>
        <?php foreach ($poem_member as $row) { ?>
            <div id="famous_poems_total">
                <div id="serial_no"><li></li></div>
                <div id="poem_title"><a title="Hot Poem" style="  font: normal 12px/12px sans-serif; color: tomato;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $row->poem_id; ?>" ><?php echo substr("$row->title", 0, 21); ?></div>
                <div id="poet_name"><a title="Famous Poet" style="font: normal 12px/12px sans-serif; color:  #555; " href="<?php echo base_url(); ?>poems/poet_personal_info/<?php echo $row->user_id; ?>"><?php echo substr("$row->name", 0, 11); ?>...</a></div>
            </div>
        <?php } ?>
    </div>
</div>
