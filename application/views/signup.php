
<!-- poet's registration form start !-->

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>   
</div>

<!--<div id="registration_caption">
    Sign Up
</div> -->
<div id="new_poets_Page_title">
    <div id="font">
        Sign Up
    </div>    
</div>


<div id="registration_info">
    <div id="registration_info_font">  
        <p>You can create a membership on Poems within a few minutes by entering your name, last name, e-mail address and country.
            Once you fill out the membership form, your member password will be sent to the e-mail address you specified.</p> 
    </div>
</div>
<div style=" margin: 81px 0px 0px 100px; box-shadow: 0px 0px 7px 0px;">

    <div id="signup">
        <div id="registration_font">

            <!-- successful message start !-->
            <div style=" float: center; text-align: center; height: auto; width:  270px; border-radius: 100px; box-shadow: 0px 0px 31px 0px black; margin: 0px 0px 0px 250px; " >
                <?php
                $message = $this->session->userdata('message_sign');
//echo '-----'.$message;
                if (isset($message)) {
                    echo $message;
                    $this->session->unset_userdata('message_sign');
                }
                if (isset($_SESSION['exception'])) {
                    echo $_SESSION['exception'];
                    unset($_SESSION['exception']);
                }
                ?>
            </div>
            <!-- successful message end !-->

<!--            <style type="text/css">
                .error{
                    color: red;
                }
            </style>-->

            <!-- poet's registration form connection start  !-->

            <form name="signup" enctype="multipart/form-data"  action="<?php echo base_url(); ?>welcome/saveuser.php" method="post" onsubmit="return validateStandard(this);">

                <!-- poet's registration form connection end  !-->

                <table align="center" border="0">

                    <h1 style=" text-align: center; color:#777;">Create an account</br>
                        to submit your poems</h1>
                    <h5 style="text-align: center; color: #666; font: normal 15px/19px sans-serif; margin: 31px 0px 31px 0px; ">Already have an account?  <a style="color:  sienna; " href="<?php echo base_url(); ?>poems/login.php"><b style="color: indianred; font-weight: normal;">Log in</b> </a></h5>


                    <tr>
                        <td></td>
                        <td>
                            <input type="text" name="first_name"  placeholder="First Name" style="  text-align: center; height: 33px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" size="30px" maxlength="20" required="1" err="Please enter valid first name" autofocus regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="text" name="last_name" placeholder="Last Name" style="  text-align: center; height: 33px; width:350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" size="30px" maxlength="20" required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="email" name="email_address" placeholder="Email Address" style="  text-align: center; height: 33px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" size="30px" maxlength="100" required="1" err="Please enter valid Email address" regexp="JSVAL_RX_EMAIL" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="password" name="password" placeholder="Password" style="  text-align: center; height: 27px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" size="30px" maxlength="20" required="1" err="Please enter valid password" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="password" name="confirm_password" placeholder="Confirm Password" style="  text-align: center; height: 27px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" size="30px" maxlength="20" required="1" err="Confirm password mustbe same as password" equals="password" /><span class="required">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <textarea name="address" placeholder="Address" style="  text-align: center; height: 27px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" rows="4" cols="23"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: center; color: #555; margin:11px 0px 0px 0px;">
                            Male <input type="radio" name="gender" value="Male" />&nbsp;
                            Female <input type="radio" name="gender" value="Female" />
                        </td>
                    </tr>
                   <!-- <tr>
                        <td>City</td>
                        <td>
                            <input type="text" name="city" size="30px" maxlength="20" />
                        </td>
                    </tr>!-->
                    <tr>
                        <td></td>
                        <td>
                            <select name="country" style="  text-align: center; height: 33px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:11px 0px 0px 0px;" required="1" exclude=" ">
                                <option value=" ">+ Select a country...</option>
                                <script type="text/javascript" language="javascript">
                                    printCountryOptions();
                                </script>
                            </select><span class="required">*</span>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>zip code</td>
                        <td>
                            <input type="text" name="zip_code" size="30px" maxlength="20" required="1" /><span class="required">*</span>
                        </td>
                    </tr>!-->
                           <!--<tr>
                              <td>I Agree</td>
                              <td>
                                  <input type="checkbox" name="agree" />
    
                              </td>
                          </tr>
                   <tr>
                        <td>Upload Picture</td>
                        <td>
                            <input type="file" name="user_pictures"/>
                            <span>Allowed Types:*.jpg,*.gif,*.png,*.bmp,*.tif</span>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <input  type="file" name="picture_small" value="<?php echo base_url(); ?>url(../button_image/default.jpg)"/>                           
                            <img  src="<?php echo base_url(); ?>/button_image/default.jpg" name="picture_small" id="picture_small" style="width:50px; height:50px">
                        </td>
                    </tr>-->
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" style=" cursor: pointer; background-color: #ddd; font: bold 21px/25px sans-serif; color: #666; text-align: center; height: 35px; width: 350px; outline:  0;  border-radius: 35px; border-width: 2px; border-color:  #CCC; margin:41px 0px 0px 0px;" name="btnsave" value="Create my account" />
<!--                            <input type="reset" name="btnreset" value="Reset" />-->
                        </td>
                    </tr>
                </table>
                <h3 style=" font-weight: normal; text-align: center; margin:31px 0px 31px 0px; color: #999; ">We <b style="font-weight: normal; text-decoration: underline;">never</b> sell your information or spam you.</h5>
            </form>
        </div>
    </div>
</div>