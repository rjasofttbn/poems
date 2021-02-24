
<!-- poets personal comments control !-->

<div id="registration_caption">
    Promote Your Poems
</div>   
<div id="registration_info">
    <div id="registration_info_font">  
        <p>If you find a comment inappropriate, you can remove (delete) it using the 'Remove this comment' link</p> 
    </div>
</div>
<div id="registration">
    <div id="registration_font">

        <form  name= "manage_comments_about_you" action="<?php echo base_url(); ?>poets_profile_controller/manage_comments_about_you11.php" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this);">
            <table align="center" border="0">

                <p><font color="#FF0000" size="3"><b>1. Share Your Poems on Social Media</b></font></p>
                <p>You can promote each poem on social media.
                    <br>Click here to list and share your poems on your social media pages.

                    <br><br>
                    <a href="http://www.facebook.com/sharer.php?title=Md. Faruk&amp;u=http://www.poemhunter.com/md-faruk/" target="_blank">- Share on Facebook</a>
                    <br>
                    <a href="http://twshot.com/share.aspx?url=http://www.poemhunter.com/md-faruk/&amp;Md. Faruk" target="_blank">- Share on Twitter</a>

                </p>
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