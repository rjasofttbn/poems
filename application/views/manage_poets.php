
<!-- front end for manage poet's !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="poets_page">
    <div id="managepoem_poet_name_view">
        <div id="poet_name">
            <div id="wrapper_login_wellcome_manage"> <!-- this div for well come message show !-->
                <?php require_once "wellcome_manage.php"; ?>                
            </div>
        </div>  
        <div id="managepoem_date_time"><!-- this div for system time show !-->

            <?php
            date_default_timezone_set("Asia/Dhaka");
            echo date("d/m/Y H:i:s a");
            ?>
        </div> 
        <div id="poets_feeling_caption"><!-- this div for application domain name in manage poem page !-->
            <a style=" text-decoration: none; font-family:cursive;
               font-size:39px;
               color:  maroon;"href="<?php echo base_url(); ?>welcome/index.php" class="link">
                <div id="poets_feeling_caption_poem_p">p</div><div id="poets_feeling_caption_poem">oets</div>
                <div id="poets_feeling_caption_poem_f">f</div><div id="poets_feeling_caption_felling">eeling</div>
                <div id="poets_feeling_caption_com">.com </div></a>
        </div>
    </div>

    <!-- this code for view menu in manage page !-->

    <div id="managepoem_menu">
        <div id="managepoem_menu_font">
            <a style="  text-decoration: none; color:  #B57430; font-weight: bolder; font-family:initial;" href="<?php echo base_url(); ?>poems/managepoem.php" id="active">Manage All</a>  
        </div> 

        <div id="managepoem_menu_poem_font">
            <a style="text-decoration: none; color: #B57430; font-weight: bolder; font-family: initial;" href="<?php echo base_url(); ?>user_admin_controller/searchallpoemsby_user_poet_page.php" id="active">Poems</a>
        </div>
        <div id="managepoem_menu_font_profile">
            <a style="text-decoration: none; color: #B57430; font-weight: bolder; font-family: initial;" href="<?php echo base_url(); ?>poets_profile_controller/poets_profile_poet_page.php" id="active">Poets Profile</a>
        </div>

        <div id="managepoem_menu_poets_font">
            <a style="text-decoration: none; color: #B57430; font-weight: bolder; font-family: initial;" href="<?php echo base_url(); ?>poems/poet_personal_info_log_in.php" id="active">Poets</a>
        </div>
    </div> 
    <div id="poets_page_maincontents">
        <?php echo $maincontents; ?>
    </div>
</div>


