
<!-- link form start !-->

<div id="registration_caption">
    Update Personal Info
</div>   
<div id="registration_info">
    <div id="registration_info_font">  
        <p>You can create a membership on Poems within a few minutes by entering your name, last name, e-mail address and country.
            Once you fill out the membership form, your member password will be sent to the e-mail address you specified.</p> 
    </div>
</div>
<div id="registration">
    <div id="registration_font">
        <?php
        $message = $this->session->userdata('message');
//echo '-----'.$message;
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        if (isset($_SESSION['exception'])) {
            echo $_SESSION['exception'];
            unset($_SESSION['exception']);
        }
        ?>

        <style type="text/css">
            .error{
                color: red;
            }
        </style>    <!-- link form for save users info !-->
        <form action="<?php echo base_url(); ?>welcome/saveuser.php" method="post" onsubmit="return validateStandard(this);">
            <table align="center" border="0">
                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="first_name" size="30px" maxlength="20" required="1" err="Please enter valid first name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input type="text" name="last_name" size="30px" maxlength="20" required="1" err="Please enter valid last name" regexp="JSVAL_RX_ALPHA" /><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td>
                        <input type="text" name="email_address" size="30px" maxlength="20" required="1" err="Please enter valid Email address" regexp="JSVAL_RX_EMAIL" /><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" size="30px" maxlength="20" required="1" err="Please enter valid password" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" /><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" size="30px" maxlength="20" required="1" err="Confirm password mustbe same as password" equals="password" /><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="address" rows="4" cols="23"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        Male <input type="radio" name="gender" value="Male" />&nbsp;
                        Female <input type="radio" name="gender" value="Female" />
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <input type="text" name="city" size="30px" maxlength="20" />
                    </td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>
                        <select name="country" required="1" exclude=" ">
                            <option value=" ">+ Select a country...</option>
                            <script type="text/javascript" language="javascript">
                                printCountryOptions();
                            </script>
                        </select><span class="required">*</span>
                    </td>
                </tr>
                <tr>
                    <td>zip code</td>
                    <td>
                        <input type="text" name="zip_code" size="30px" maxlength="20" required="1" /><span class="required">*</span>
                    </td>
                </tr>
                       <!--<tr>
                          <td>I Agree</td>
                          <td>
                              <input type="checkbox" name="agree" />

                          </td>
                      </tr>-->
                <tr>
                    <td>Upload Picture</td>     <!-- image upload start !-->
                    <td>
                        <input type="file" name="pictures"/>
                        <span>Allowed Types:*.jpg,*.gif,*.png,*.bmp,*.tif</span>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="btnsave" value="Save" />
                        <input type="reset" name="btnreset" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>