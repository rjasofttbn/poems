<script type="text/javascript" src="<?php echo base_url(); ?>scripts/gen_validatorv31.js" language="javascript"></script>
<!-- poets personal biography view,edit,update start !-->

<div id="new_poets_Page_title">
    <div id="font">
        <!--        Your Poet Name and Biography-->
        POET PROFILE
    </div>    
</div>

<!--<div id="registration_caption">
    Your Poet Name and Biography
</div>   -->
<div id="registration_info">
    <div id="registration_info_font">  
        <p>Your profile (as a poet) is shown below. If you want to modify your name, biography etc, make changes and press Submit button.</p> 
    </div>
</div>



<div style=" margin: 81px 0px 0px 150px;">
    <div style="float: left; height: auto; width: auto;">
        <div style="  height: 31px;  width: 100%;">
            <div style="float: left; "><a style=" float: left;  border-top-left-radius: 7px; height: 31px; width: 175px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/edityourbiography.php" id="active"><b style="float: left; margin: 7px 0px 0px 17px; text-align: center;">Edit your biography</b></a></div>
            <div style=" float: left;"><a style="float: left; height: 31px; width: 247px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;" href="<?php echo base_url(); ?>poets_profile_controller/picture_edit.php" id="active"><b style="float: left; margin: 7px 0px 0px 63px;  text-align: center;">Edit your pictures</b></a> </div>
            <div style="float: left;"> <a style="float: left;  border-top-right-radius: 7px;  height: 31px; width: 245px;  background-color: #eee; margin: 0px 0px 0px 0px;  box-shadow: 0px 0px 5px 0px;  font: bold 14px/14px sans-serif;color: #333;"   href="<?php echo base_url(); ?>poets_profile_controller/view_poet_comments.php" id="active"><b style="float: left; margin: 7px 0px 0px 23px; text-align: center; ">Manage comments about you</b></a></div>
            <!-- poem's insert,edit,update,delete end !-->
        </div>
        <div id="registration">
            <div id="registration_font">
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
                $biography = $this->session->userdata('biography');
                $your_email = 'yourname@your-website.com'; // <<=== update to your email address
//if ($verification_code->count == 0)
//{
//    echo "You must submit the word that appears in the image";
//}

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

                <form  action="<?php echo base_url(); ?>poets_profile_controller/update_user_biography.php" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);">


                    <table align="center" >
                        <tr>
                            <?php
                            foreach ($result as $aresult) {
                                ?>
                                <td>First Name</td>
                                <td>
                                    <input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $aresult->user_id ?>" />
                                    <input type="text" name="first_name" size="30px" maxlength="20"  value="<?php echo $aresult->first_name ?>"/><span class="required">*</span>
                                </td>
                            </tr>

                            <tr>
                                <td>Last Name</td>
                                <td>
                                    <input type="text" name="last_name"  size="30px" maxlength="20"  value="<?php echo $aresult->last_name ?>" /><span class="required">*</span>
                                </td>
                            </tr>                            
                            <tr>
                                <td>Place of Birth</td>
                                <td>
                                    <input type="text" name="place_of_birth" size="30px" maxlength="51" value="<?php echo $aresult->place_of_birth ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td >Date of Birth
                                    (-if applicable- Date of Death)</td>
                                <td>
                                    <input type="text" name="date_of_birth" size="30px" maxlength="50" value="<?php echo $aresult->date_of_birth ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Biography</td>
                                <td>
                                    <!--<textarea name="biography" rows="7" cols="33"><?php echo $aresult->biography ?></textarea>-->
                               
                                    <textarea id="txtInput" name="biography" cols="33" rows="7"><?php echo $aresult->biography ?></textarea><?php echo display_ckeditor($check_editor['ckeditor']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Published Books</td>
                                <td>
                                    <textarea name="published_books" rows="7" cols="33"><?php echo $aresult->published_books ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  style="color: red; text-align: center; border-radius: 50%;  ">
                                    <?php
                                    $biography_Data = $this->session->userdata('biography');
                                    //echo '-----'.$message;
                                    if (isset($biography_Data)) {
                                        echo $biography_Data;
                                        $this->session->unset_userdata('biography');
                                    }

                                    if (isset($_SESSION['exception'])) {
                                        echo $_SESSION['exception'];
                                        unset($_SESSION['exception']);
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Enter the verification code</td>
                                <td>
                                 <!--<input type="text" name="verification_code" size="30px" maxlength="20" value="<?php echo $aresult->verification_code ?>"/>-->

                                    <div id='contact_form_errorloc' class='err'></div>

                                    <p>
                                        <img src="<?php echo base_url(); ?>captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>

                                        <label for='message'>Enter the code above here :</label><br>
                                        <input id="6_letters_code" required="1" name="verification_code" type="text"><br>
                                        <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
                                    </p>

                                </td>

                            </tr>
                        <?php } ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input style="cursor: pointer; " type="submit" name="submit" value="Submit" />
                                <!--<input type="reset" name="btnreset" value="Reset" />--!-->
                            </td>
                        </tr>
                    </table>
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
</div>