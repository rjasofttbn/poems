<html>
    <table height>
        <tr height="">
        <body>
        <td height="">
            Hello <?php echo $first_name ?> <?php echo $last_name ?>,
        </td>
    </tr>
    <tr>
        <td>
            Your login information:
            <br>User Name: <?php echo $email_address ?><br>
            Password: <?php echo $password ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Activate Your Account</b>
            <br/>
            <span>Please click the link bellow:</span><br/>
            <a href="<?php echo base_url();?>login_controller/updateUserStatus/<?php echo $user_id;?>"><?php echo base_url();?>login_controller/updateUserStatus/<?php echo $user_id;?></a>
        </td>
    </tr>
    <tr>
        <td>
            Thanks to join our comunity.
        </td>
    </tr>
</table>

</body>
</html>