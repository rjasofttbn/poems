<script type="text/javascript" src="<?php echo base_url(); ?>scripts/gen_validatorv31.js" language="javascript"></script>
<!-- poets personal biography view,edit,update start !-->

<!--<div id="registration_caption">
    Your Poet Name and Biography
</div>   -->


<div style=" margin: 16px 0px 0px 10px;">

    <div id="wrapper_profile">
        <div id="profile_edit">
            <div id="profile_edit_font">  
                <p style="color: coral;"> If you want to modify your Profession, Education etc, make changes and press Submit button.</p> 
            </div>
        </div>
        <div id="wrapper_profile_font">
            <?php
            $message = $this->session->userdata('message');
//echo '-----'.$message;
            if (isset($sesData)) {
                echo $sesData;
                $this->session->unset_userdata('message');
            }
            if (isset($_SESSION['exception'])) {
                echo $_SESSION['exception'];
                unset($_SESSION['exception']);
            }
            ?>
            <?php
            $your_email = 'yourname@your-website.com'; // <<=== update to your email address


            $errors = '';
            $name = '';
            $visitor_email = '';
            $user_message = '';

            if (isset($_POST['submit'])) {


                if (empty($_SESSION['6_letters_code']) ||
                        strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0) {
                    //Note: the captcha code is compared case insensitively.
                    //if you want case sensitive match, update the check above to
                    // strcmp()
                    $errors .= "\n The captcha code does not match!";
                }
            }
            ?>

            <!-- a helper script for vaidating the form-->
            <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>	

            <?php
            if (!empty($errors)) {
                echo "<p class='err'>" . nl2br($errors) . "</p>";
            }
            ?>

            <form  action="<?php echo base_url(); ?>poets_profile_controller/eduction_profession_update.php" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);">

                <div style=" float: left; margin: 21px 0px 0px 201px; text-align: left; ">
                    <table align="center"  >
                        <tr>
                            <?php
                            foreach ($result as $aresult) {
                                ?>
                            <td style="color:  #333;">First Name</td>
                                <td>
                                    <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $aresult->user_id ?>" />
                                    <input type="text" disabled="first_name" name="first_name" size="30px" maxlength="20"  value="<?php echo $aresult->first_name ?>"/><span class="required">*</span>
                                </td>
                            </tr>

                            <tr>
                                <td style="color:  #333;">Last Name</td>
                                <td>
                                    <input type="text" disabled="last_name" name="last_name"  size="30px" maxlength="20"  value="<?php echo $aresult->last_name ?>" /><span class="required">*</span>
                                </td>
                            </tr>                            
                            <tr style="color:  #333;">
                                <td>Place of Birth</td>
                                <td>
                                    <input type="text" disabled="place_of_birth" name="place_of_birth" size="30px" maxlength="30" value="<?php echo $aresult->place_of_birth ?>"/>
                                </td>
                            </tr>

                            <tr style="color:  #333;">
                                <td>Profession</td>
                                <td>
                                    <input type="text" name="profession" size="30px" maxlength="50" value="<?php echo $aresult->profession ?>"/>
                                </td>
                            </tr>
                            <tr style="color:  #333;">
                                <td>Education</td>
                                <td>
                                    <input type="text" name="education" size="30px" maxlength="50" value="<?php echo $aresult->education ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td style="color: tomato;">Password</td>
                                <td >
                                    <input type="text" style="background-color:  tomato; margin: 0px 0px 0px 2px; border-style:  none; height: 27px; width: 243px; color: white; text-align:  center; font: bold 15px/15px sans-serif;" name="password" size="30px" maxlength="50" value="<?php echo $aresult->password ?>"/>

                                    </br>  <b style="font: normal 11px/11px sans-serif;color:  #333;">If you want to change your password? You can it !</b>                            
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  style="color: red; text-align: center; border-radius: 50%;  "> <?php
                                    $profession_Data = $this->session->userdata('profession');
                                    //echo '-----'.$message;
                                    if (isset($profession_Data)) {
                                        echo $profession_Data;
                                        $this->session->unset_userdata('profession');
                                    }

                                    if (isset($_SESSION['exception'])) {
                                        echo $_SESSION['exception'];
                                        unset($_SESSION['exception']);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
        <!--                            <td>Enter the verification code</td>-->
                                <td>
                                    <div id='contact_form_errorloc' class='err'></div>
                                    <p>
                                        <img src="<?php echo base_url(); ?>captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>

                                        <label style="color:  #333;" for='message'>Enter the code above here :</label><br>
                                        <input id="6_letters_code" name="verification_code" required="1" type="text"><br>
                                        <small style="color:  #333;">Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
                                    </p>

                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input style="color: tomato; font: bold 14px/14px sans-serif;" type="submit" name="submit" value="Update" />
                                <!--<input type="reset" name="btnreset" value="Reset" />--!-->
                            </td>
                        </tr>
                    </table>
                </div>
            </form>

            <script language='JavaScript' type='text/javascript'>
                function refreshCaptcha()
                {
                    var img = document.images['captchaimg'];
                    img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
                }
            </script>
        </div>
    </div>
</div>