
<!-- Log in Application code !-->

<!-- Log in check code start!-->

<form action="<?php echo base_url(); ?>login_controller/logincheck.php" method="post" onsubmit="return validateStandard(this);">
    
    <!-- Log in check code end!-->
    
    <div id ="banner_search_email">
        Email 
    </div> 
    <div id ="banner_search_email_text" >
        <input type="text" style=" background:  #999; border-radius:7px; /* round corners */ " name="email_address" size="20px" required="1" err="Please enter valid Email address"/>
    </div>
    <div id ="banner_search_password" >
        Password
    </div>
    <div id ="banner_search_password_text" >
        <input type="password" style=" background:  #999; border-radius:7px;" name="password" size="20px" required="1" err="Please enter valid password"/>
    </div>
    <div id ="banner_search_batton" >
        <input type="submit" style="height: 20px; background: grey; font-size: 10px;border-radius:3px;" name="btnlogin" value="LOGIN" />                        
    </div>
    <div id ="banner_search_become_member" ><!-- this link for registration!-->
        <a style="color:  #999;" href="<?php echo base_url(); ?>welcome/signup.php">Become a member</a>
    </div>
</form>