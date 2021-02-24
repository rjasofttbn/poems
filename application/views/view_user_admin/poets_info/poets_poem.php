
<!-- 

Develop date and time:
Objective of this page: poet poem view.
controller name : 
model name : 
tabel name:tbl_poems.
css:
mother page and menu name: poet_personal_info page and poems menu.

!-->



<div id="poet_poem_page"><!-- poet poem view by loop start !-->
    <?php
    $cnt = 1;
    foreach ($poets_poem as $poets_poem) {
        ?>
        <div id="poets_poem_date">                         
            <div id="poet_poems_page_no">
                <?php
                echo $cnt;
                $cnt++;
                ?>.
            </div>
            <div id="poets_poem_font">
                <a style=" text-align: left; width: 350px; color: #777; font:bold 14px/14px sans-serif;" href="<?php echo base_url(); ?>user_admin_controller/poemdetail/<?php echo $poets_poem->poem_id; ?>" > <?php echo ucfirst($poets_poem->title); ?></a>


            </div>
            <div id="poets_poem_font_date">                
                <?php echo $poets_poem->poem_submit_date; ?>

            </div>
        </div> 
    <?php } ?>

    <!--<button onclick="_gaq.push(['_trackEvent', 'button3', 'clicked'])">Click here</button>-->
</div> <!-- poet poem view by loop end !-->
