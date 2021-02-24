
<!-- Log out form !-->

<div id="logout_poet"> 
    <!-- poet first and last name add & display from mysql start  !-->
    <div id="wrapper_login_wellcome">
        <?php
        foreach ($manage_poet_name_view as $manage_poet_name_view) {
            ?>
            <?php echo ucfirst($manage_poet_name_view->name); ?>
        <?php } ?>
        &nbsp;
<!--        Manage Poem's -->
    </div>
    <!-- poet first and last name add & display from mysql end  !-->
</div>
