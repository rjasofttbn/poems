
<!-- poets personal comments control !-->

<div id="registration_caption">
    Manage Comments About Your Poems
</div>   
<div id="comments_info">
    <div id="comments_info_font">  
        <td bgcolor="#EFEFEF">
            This page list comments about you as a poet.<br>
            <a href="/members/mpoems/default.asp?show=commentspoet&amp;t=4/30/2014 12:59:00 AM"><u>Click here</u></a> to read comments about YOUR POEMS
            not about YOU.</td>
    </div>
</div>
<div id="comments_rule"> 
    If you find a comment inappropriate, you can remove (delete) it using the 'Remove this comment' link
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