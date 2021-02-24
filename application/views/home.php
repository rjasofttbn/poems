<!--===Main page of this application===!-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- favicons for project start !-->

        <link rel="icon" type="image/PNG" href="<?php echo base_url(); ?>/button_image/favicons.PNG">

            <!-- favicons for project end !-->

            <link type="" href="" rel="" ></link>
            <title>Poet's Feeling</title>

            <!--  Link with css start  !-->
            <link href="<?php echo base_url(); ?>/css/bootstrap.min1.css" rel="stylesheet" type="text/css"></link>        
            <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" type="text/css"></link>        
            <link href="<?php echo base_url(); ?>/login/button.css" rel="stylesheet" type="text/css"></link>        
            <link href="<?php echo base_url(); ?>/login/registration_login.css" rel="stylesheet" type="text/css"></link>      			
            <link href="<?php echo base_url(); ?>/css/administrator.css" rel="stylesheet" type="text/css"></link>        
            <link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link>     
            <link href="<?php echo base_url(); ?>/css/user_admin.css" rel="stylesheet" type="text/css"></link>      

            <!--  Link with css start  !-->

            <style type="text/css"></style>

            <!-- Link with css end !-->

            <!-- Link with java script start  !-->
            <script type="text/javascript" src="<?php echo base_url(); ?>scripts/country.js" language="javascript"></script>
            <!-- java script for country and text validation  !-->
            <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jsval.js" language="javascript"></script>

            <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap" language="javascript"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min" language="javascript"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1.8.1.min.js" language="javascript"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery-1" language="javascript"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>scripts/gen_validatorv31.js" language="javascript"></script>
            <!--===Link with java script end ===!-->



            <!-- Session destroy start  !-->
            <script>
                if (time() - $_SESSION['timestamp'] > 10) { //15 minute subtract new timestamp from the old one
                    $_SESSION['logged_in'] = false;
                    session_destroy();
                    header("<?php echo base_url(); ?>".poems / login.php); //redirect to index.php
                    exit;
                } else {
                    $_SESSION['timestamp'] = time(); //set new timestamp
                }
            </script>

            <!-- Session destroy end  !-->



            <!-- Delete script start !-->
            <script type="text/javascript">
                function checkDelete()
                {
                    var chk = confirm("Are you sure to delete this user?");
                    if (chk)
                    {
                        return true;
                    }
                    else {
                        return false;
                    }

                }
            </script> 
            <script type="text/javascript">
                function vote()
                {
                    var chk = confirm('Than you for voting!');
                    if (chk)
                    {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
            </script>
            <!-- Delete script end  !-->

            <!-- !-->
            
            
            <!-- !-->

    </head>

    <body >
        <!--<div class= "responsive">  !-->
        <div id="wrapper">  
            <div id ="search" >	

                <?php
                $user_id = $this->session->userdata('user_id');
                $admin_info = $this->session->userdata('admin_info');
                $first_name = $this->session->userdata('first_name');
                $last_name = $this->session->userdata('last_name');
                $activation_status = $this->session->userdata('activation_status');
                $poems_category_id = $this->session->userdata('poems_category_id');

                if (!$user_id) {
                    ?>

                    <form action="<?php echo base_url(); ?>login_controller/logincheck.php" method="post" onsubmit="return validateStandard(this);">

                        <!-- Log in check code end!-->

                        <div id ="banner_search_email">
                            Email 
                        </div> 
                        <div id ="banner_search_email_text" >
                            <input title="Enter Email Address" type="email"  placeholder="Email Address" style=" outline: 0; border-width:  thin; color: whitesmoke;  border-style:  solid; background:  #666; border-radius:7px; text-align: center; /* round corners */ " name="email_address" size="20px" required="1" err="Please enter valid Email address"/>
                        </div>
                        <div id ="banner_search_password" >
                            Password
                        </div>
                        <div id ="banner_search_password_text" >
                            <input title="Enter Password" type="password" placeholder="Password" style=" outline: 0; border-width:  thin; color: whitesmoke;  border-style:  solid; background:  #666; border-radius:7px; text-align: center;" name="password" size="20px"  required="1" err="Please enter valid password"/>
                        </div>
                        <div id ="banner_search_batton" >
                            <input type="submit" style="height: 23px; width: 49px; outline: 0; background-color:#666; color: gainsboro; font: bold 10px/10px  sans-serif  ; border-radius:5px;" name="btnlogin" value="LOGIN" />                        
                        </div>
                        <div id ="banner_search_become_member" ><!-- this link for registration!-->
                            <a title="Create a free account to start adding poem" style="color:  #777; text-decoration:underline;" href="<?php echo base_url(); ?>welcome/signup.php">Become a member</a>
                        </div>
                    </form>


                    <?php
                } elseif ($user_id) {
                    ?>
                    <div id="header_logout_poet"> 

                        <!-- poet first and last name add & display from mysql start  !-->

                        <div title="<?php echo ucfirst($first_name . ' ' . $last_name); ?>" style=" color:  #777; " id="header_login">
                            Welcome <?php echo ucfirst($first_name . ' ' . $last_name); ?>
                        </div>
                        <!-- poet first and last name add & display from mysql end  !-->
                    </div>
                    <div id="wrapper_login_logout"> <!-- this code for log out  !-->
                        <a title="Logout" style=" text-decoration: none; color: orange; font-weight: bolder;" href="<?php echo base_url() ?>login_controller/logout" class="nav_contact">Logout</a>
                    </div>
                <?php } ?>

                <div id="invalid_message">

                    <?php
                    $message = $this->session->userdata('exception');
                    if ($message) {
                        echo $message;
                        $this->session->unset_userdata('exception');
                    }
                    ?>

                </div>
            </div> 

            <!-- form call by menu's start !-->

            <div id ="banner">
                <div id ="banner_search" >
                    <div id ="banner_logo" >

                        <a title="poetsfeeling.com" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>welcome/index.php" class="link" ><div id ="banner_domain_poets" >Poets</div>
                            <div id ="banner_domain_feeling" >Feeling</div>
                            <div id ="banner_domain_com" >.com</div></a>

                        <div id ="banner_name_to_contact" >

                            <div id ="banner_search_text" >
                                <!-- poem's search by text control start !-->

                                <form name="poet_poem" action="<?php echo base_url(); ?>administrator_controller/search_poet_poems" method="post">
                                    <input placeholder=" Search by poem and poet name." style="float: left; height: 30px; border-width:  thin; border-color:  #999; background-color:  window;  outline-style: none; border-radius:7px 0px 0px 7px ; width: 270px; margin: 11px 0px 0px 19px; text-align: left; " type="text" name="search_text"  required="1" err="Please enter valid first name" regexp="JSVAL_RX_ALPHA" />
                                    <input style=" text-align: left; height: 34px; border-width:   thin; border-color:  #999;  background-color:gainsboro; outline: none; width: 53px; border-radius:0px 7px 7px 0px ;  margin: 11px 0px 0px 0px; font: bold 15px/15px sans-serif; color:   #777;" type="submit" name="btn" value="Find"/>
                                </form>

                                <!-- poem's search by text control end !-->
                            </div> 
                            <div id ="banner_contact_us" >
                                <div id ="banner_contact_us_font" >
                                    <a style=" color: #777;" title="Contact Us" href="<?php echo base_url(); ?>welcome/contact_us">Contact Us</a>     
                                </div> 
                            </div> 
                        </div> 
                        <a href="<?php echo base_url(); ?>welcome/index.php" class="link"></a>
                    </div>   
                </div>

                <ul> 
                    <div id ="banner_menu" >

                        <td><a title="Home" style=" cursor: pointer; text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>welcome/index.php" class="link" > <div id ="button_home" ><div id ="buttonf">Home</div> </div></a></td>

                        <td><a title="Poets" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>welcome/new_poets.php" class="link"><div id ="button" > <div id ="buttonf" >Poets</div></div></a></td>

                        <td><a title="Poems" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>welcome/all_poem_show_page_small.php" class= "link"><div id ="button" ><div id ="buttonf" >Poems</div></div></a></td>

                        <!-- Validation for user admin  start !-->

                        <?php
                        if ($admin_info == '3') {
                            ?>

                            <td><a title="Manage Poem" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>poems/managepoem.php" id="active"><div id ="button" ><div id ="buttonf" >Manage Poem</div> </div></a></td>                            

                            <td><a title="Member Info" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>user_admin_controller/member_information.php" id="active"><div id ="button" > <div id ="buttonf" >Member Info</div></div></a></td>                            

                            <?php
                        } elseif ($admin_info == '7') {
                            ?>

                            <td><a title="Manage Poem" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>poems/managepoem.php" id="active"><div id ="button" ><div id ="buttonf" >Manage Poem </div></div></a></td>                            

                            <td><a title="Member Info" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>user_admin_controller/member_information.php" id="active"><div id ="button" > <div id ="buttonf" >Member Info</div></div></a></td>                            

                            <!-- <div id ="button" >
                                 <div id ="buttonf" >
                                     <a style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url() ?>login_controller/logout" class="nav_contact">Logout</a>
                                 </div>
                             </div>!-->
                            <!-- Administrator page  start !-->

                            <a title="Administrator" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url() ?>administrator_controller/administrator" class="nav_contact"><div id ="button" ><div id ="buttonf" >Administrator</div></div></a>


                            <?php
                        } else {
                            ?>
                            <div id ="banner_menu" >

                                <td><a title="Member Area" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>poems/login.php" id="active"> <div id ="button" ><div id ="buttonf" >Member Area</div></div> </a></td>                            

                            </div>
                        <?php } ?>

                        <!-- Validation for user_admin  end !-->

                        <a  title="Poetry Contest" style=" text-decoration: none; color: maroon; font-weight: bolder; font-family:  initial;" href="<?php echo base_url(); ?>poems/poetry_contest.php" id="active"> <div id ="button" ><div id ="buttonf" >Poetry Contest</div> </div> </a>

                        <!-- form call by menu's end !-->

                    </div>
                </ul>
            </div> 

            <!-- main page main content !-->


            <div id ="middle_wrapper" >
                <?php echo $maincontent; ?>
            </div>

            <div style=" float: left;height:auto; width:500px;">
                <div id="hit">
                    <!--                    hitwebcounter Code START <em>Blog Counters</em>-->
                    <a href="http://www.hitwebcounter.com/" target="_blank">
                        <img src="http://hitwebcounter.com/counter/counter.php?page=5814748&style=0006&nbdigits=9&type=page&initCount=0" title="Amazing and shiny stats" Alt="Amazing and shiny stats"   border="0" >
                    </a><br/>
                    <!--                   hitwebcounter.com --><a href="http://www.hitwebcounter.com/countersiteservices.php" title="Blog Counters" 
                                                                   target="_blank" style="font-family: Arial, Helvetica, sans-serif; 
                                                                   font-size: 9px; color: #736C65; text-decoration: none ;"><em>Total Hit's</em>
                    </a> 
                </div>
            </div>

            <div id="wrapper_bottom"><!-- this div for bottom in home page start !-->
                <?php require "bottom_info.php"; ?>
            </div> <!-- this div for bottom in home page end !-->           
        </div> 
        <!-- </div>   !-->	

    </body>

</html>