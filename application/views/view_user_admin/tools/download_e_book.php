
<!-- poets personal comments control !-->

<div id="registration_caption">
    Manage Comments About Your Poems
</div>   
<div id="registration_info">
    <div id="registration_info_font">  
        <p>If you find a comment inappropriate, you can remove (delete) it using the 'Remove this comment' link</p> 
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
        </style>
        <form  name= "manage_comments_about_you" action="<?php echo base_url(); ?>poets_profile_controller/manage_comments_about_you11.php" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);">
            <table align="center" border="0">


                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="address" rows="4" cols="23"></textarea>
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