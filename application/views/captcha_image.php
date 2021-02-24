

<?php
$your_email = 'yourname@your-website.com'; // <<=== update to your email address
//session_start();
$errors = '';
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

<div id="poem_commant_page">




    <div id="poem_commant_captcha">
        <form enctype="multipart/form-data" action="<?php echo base_url(); ?>user_admin_controller/savecomments" method="post">
      <!--<input type="hidden" name="user_id" size="30px" maxlength="20" value="<?php echo $result->user_id ?>" />
      <input type="hidden" name="poem_id" size="30px" maxlength="20" value="<?php echo $result->poem_id ?>" />!-->
            <div id="poet_poem_commant_caption">
                <b>Add a comment below</b>
            </div>
            <tr>
                <td>
                    <textarea style="margin : 7px 0px 0px 13px" name="comments"  rows="5" cols="37"></textarea>
                </td>
            </tr>
            <div id="poem_commant_captcha_tools">
                <?php
                if (!empty($errors)) {
                    echo "<p class='err'>" . nl2br($errors) . "</p>";
                }
                ?>
                <div id='contact_form_errorloc' class='err'></div>
                <form method="POST" name="contact_form" 
                      action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 
                    <p>
                        <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
                        <label for='message'>Enter the code above here :</label><br>
                        <input id="6_letters_code" name="6_letters_code" type="text" maxlength="6" ><br>
                        <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>


                    </p>


                    <!--<input type="submit" value="Submit" name='submit'>!-->
                    <input type="submit" style="margin : 15px 0px 10px 53px" value="Comments Submit" name="comment_submit" />                
                </form>

                <script language='JavaScript' type='text/javascript'>
                    function refreshCaptcha()
                    {
                    var img = document.images['captchaimg'];
                    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
                    }
                </script>
            </div>


        </form>
    </div>

    <form>
        <?php
        foreach ($poem_comments as $poem_comments) {
            ?>

            <div id="poet_poem_comments"> 
                <div id="poem_comments_font">
                    <p> 
                        <a style=" text-align: left;  font-weight:  normal; width: 350px; font-size: 13px; font-family: cursive; text-decoration: none;"> <?php echo $poem_comments->comments; ?></a>

                    </p>
                </div>
                <div id="poem_comments_font_date">                
                    <?php echo $poem_comments->comments_post_date; ?>
                    </p>
                </div>
            </div>
        <?php } ?>
</div> 
</form>