
<!-- Log out form !-->

<div id="header_logout_poet"> 

    <!-- poet first and last name add & display from mysql start  !-->

    <div id="header_login">    
        Welcome <?php echo $first_name . ' ' . $last_name; ?>        
    </div>
    
    <!-- poet first and last name add & display from mysql end  !-->
</div>
<div id="wrapper_login_logout"> <!-- this code for log out  !-->
    <a style=" text-decoration: none; color: orange; font-weight: bolder;" href="<?php echo base_url() ?>login_controller/logout" class="nav_contact">Logout</a>
</div>